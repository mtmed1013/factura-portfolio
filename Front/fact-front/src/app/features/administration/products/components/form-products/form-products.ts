import { CommonModule } from '@angular/common';
import { ChangeDetectorRef, Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { FormBuilder, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { ButtonModule } from 'primeng/button';
import { Dialog } from 'primeng/dialog';
import { ProductService } from '../../services/product-service';
import { InputText } from "primeng/inputtext";
import { catchError, exhaustMap, finalize, of, pipe } from 'rxjs';
import { InputMask } from 'primeng/inputmask';
import { InputNumber } from 'primeng/inputnumber';
import { SkeletonModule } from 'primeng/skeleton';
import { Toast } from '../../../../../shared/services/toast';
import { LoadingService } from '../../../../../shared/components/loading/loading.service';

@Component({
  selector: 'app-form-products',
  imports: [Dialog, ButtonModule, CommonModule, FormsModule, ReactiveFormsModule, InputText, InputNumber, SkeletonModule],
  templateUrl: './form-products.html',
  styleUrl: './form-products.scss'
})
export class FormProducts implements OnInit {
  @Input() visible: boolean = false;
  @Input() title: string = "New Product";
  @Input() product: any;
  @Output() visibleChange: EventEmitter<boolean> = new EventEmitter<boolean>();
  @Output() getAllProducts: EventEmitter<any> = new EventEmitter<any>();
  loading: boolean = false;
  form: any;

  constructor(
    private fb: FormBuilder,
    private productService: ProductService,
    private cdr: ChangeDetectorRef,
    private toast: Toast,
    private loadingService: LoadingService
  ) {

  }

  ngOnInit() {
    this.form = this.fb.group({
      name: ['', Validators.required],
      stock: ['', Validators.required],
      price: ['', Validators.required]
    });
    this.cdr.markForCheck();
  }
  ngOnChanges() {
    if (this.product) {
      this.form.patchValue(this.product);
    } else {
      this.form.reset();
    }
    this.cdr.markForCheck();
  }

  closeModal() {
    this.visible = false;
    this.visibleChange.emit(this.visible);
  }

  handleSave() {
    this.form.markAllAsTouched();
    if (this.form.valid) {
      this.loadingService.show('Saving product...');
      this.loading = true;
      const productData = this.form.value;
      of(productData).pipe(
        exhaustMap((data) =>
          this.productService.create(data).pipe(
            catchError((error) => {
              this.toast.showError(error.error.message);
              return of(null);
            }),
            finalize(() => {
              this.loadingService.close();
              this.loading = false;
            })
          )
        )
      ).subscribe((response) => {
        if (response) {
          this.loading = false;
          this.toast.showSuccess(response?.message);
          this.closeModal();
          this.getAllProducts.emit();
        }
      });
    }
  }

  handleEdit(): void {
    this.form.markAllAsTouched();
    if (this.form.valid) {
      this.loadingService.show('Updating product...');
      const productData = this.form.value;
      productData.id = this.product.id;
      of(productData).pipe(
        exhaustMap((data) =>
          this.productService.update(data).pipe(
            catchError((error) => {
              this.toast.showError(error.error.message);
              return of(null);

            }),
            finalize(() => {
              this.loadingService.close();
              this.loading = false;
            })
          )
        )
      ).subscribe((response) => {
        if (response) {
          this.toast.showSuccess(response?.message);
          this.closeModal();
          this.getAllProducts.emit();
        }
      });
    }
  }
}
