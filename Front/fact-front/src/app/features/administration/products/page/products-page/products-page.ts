import { ChangeDetectorRef, Component, OnInit, Output } from '@angular/core';
import { Table } from 'primeng/table';
import { TagModule } from 'primeng/tag';
import { IconFieldModule } from 'primeng/iconfield';
import { InputIconModule } from 'primeng/inputicon';
import { InputTextModule } from 'primeng/inputtext';
import { MultiSelectModule } from 'primeng/multiselect';
import { SelectModule } from 'primeng/select';
import { CommonModule } from '@angular/common';
import { TableModule } from 'primeng/table';
import { catchError, exhaustMap, finalize, of } from 'rxjs';
import { ProductService } from '../../services/product-service';
import { ButtonModule } from 'primeng/button';
import { FormProducts } from "../../components/form-products/form-products";
import { CardNewComponent } from "../../../../../shared/components/card-new/card-new.component";
import { DialogDeleteConfirm } from "../../../../../shared/components/dialog-delete-confirm/dialog-delete-confirm";
import { Toast } from '../../../../../shared/services/toast';
import { LoadingService } from '../../../../../shared/components/loading/loading.service';
@Component({
  selector: 'app-products-page',
  imports: [CommonModule, TableModule,
    TagModule, IconFieldModule, InputIconModule,
    InputTextModule,
    MultiSelectModule, SelectModule, ButtonModule,
    FormProducts, CardNewComponent,
    DialogDeleteConfirm],
  templateUrl: './products-page.html',
  styleUrl: './products-page.scss'
})
export class ProductsPage implements OnInit {
  products: any[] = [];
  @Output() product: any;
  @Output() newEditProduct: boolean = false;
  deleteProduct: boolean = false;

  constructor(
    private productService: ProductService,
    private toast: Toast,
    private cdr: ChangeDetectorRef,
    private loadingService: LoadingService
  ) { }

  ngOnInit(): void {
    this.loadingService.show('loading products...');
    this.getAllProducts();
  }

  getAllProducts(): void {

    this.productService.getProducts().pipe(
      catchError((error) => {
        console.error('Error fetching products:', error);
        return of(null);
      }),
      finalize(() => {
        this.loadingService.close();
      })
    ).subscribe((result: any) => {
      if (result) {
        this.products = result || [];
      }
      this.cdr.markForCheck();
    });
  }

  getSeverity(status: string) {
    switch (status) {
      case 'I':
        return 'danger';

      case 'A':
        return 'success';
      default:
        return null;
    }
  }

  handleNewProduct() {
    this.newEditProduct = true;
    this.product = null;
  }

  handleEditProduct(product: any) {
    this.product = product;
    this.newEditProduct = true;
  }

  handleDeleteProduct(product: any) {
    this.product = product;
    this.deleteProduct = true;
  }

  confirmDelete() {
    this.loadingService.show('Deleting product...');
    this.productService.delete(this.product.id).pipe(
      catchError((error) => {
        console.error('Error deleting product:', error);
        return of(null);
      }),
      finalize(() => {
        this.loadingService.close();
      })
    ).subscribe((result: any) => {
      if (result) {
        this.deleteProduct = false;
        this.toast.showSuccess(result?.message);
        this.getAllProducts();
      }
      this.cdr.markForCheck();
    });
  }
}
