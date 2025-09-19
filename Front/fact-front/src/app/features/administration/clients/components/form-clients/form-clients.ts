import { ChangeDetectorRef, Component, EventEmitter, Input, Output } from '@angular/core';
import { ClientService } from '../../services/client-service';
import { FormBuilder, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';

import { of, exhaustMap, catchError, finalize } from 'rxjs';
import { LoadingService } from '../../../../../shared/components/loading/loading.service';
import { CommonModule } from '@angular/common';
import { ButtonModule } from 'primeng/button';
import { Dialog } from 'primeng/dialog';
import { InputNumber } from 'primeng/inputnumber';
import { InputText } from 'primeng/inputtext';
import { SkeletonModule } from 'primeng/skeleton';
import { Toast } from '../../../../../shared/services/toast';
import { InputMask } from 'primeng/inputmask';

@Component({
  selector: 'app-form-clients',
  imports: [Dialog, ButtonModule, CommonModule, FormsModule, ReactiveFormsModule,
    InputText, SkeletonModule, InputMask],
  templateUrl: './form-clients.html',
  styleUrl: './form-clients.scss'
})
export class FormClients {
  @Input() visible: boolean = false;
  @Input() title: string = "New Client";
  @Input() client: any;
  @Output() visibleChange: EventEmitter<boolean> = new EventEmitter<boolean>();
  @Output() getAllClients: EventEmitter<any> = new EventEmitter<any>();
  loading: boolean = false;
  form: any;

  constructor(
    private fb: FormBuilder,
    private clientService: ClientService,
    private cdr: ChangeDetectorRef,
    private toast: Toast,
    private loadingService: LoadingService
  ) {

  }

  ngOnInit() {
    this.form = this.fb.group({
      identification: ['', Validators.required],
      first_name: ['', Validators.required],
      last_name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      phone: ['', Validators.required]
    });
    this.cdr.markForCheck();
  }
  ngOnChanges() {
    if (!this.form) {
      this.form = this.fb.group({
        identification: ['', Validators.required],
        first_name: ['', Validators.required],
        last_name: ['', Validators.required],
        email: ['', [Validators.required, Validators.email]],
        phone: ['', Validators.required]
      });
    }
    if (this.client) {
      this.form.patchValue(this.client);
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
      this.loadingService.show('Saving client...');
      this.loading = true;
      const clientData = this.form.value;
      clientData.phone = clientData.phone.replaceAll('-', '');
      of(clientData).pipe(
        exhaustMap((data) =>
          this.clientService.create(data).pipe(
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
          this.getAllClients.emit();
        }
      });
    }
  }

  handleEdit(): void {
    this.form.markAllAsTouched();
    if (this.form.valid) {
      this.loadingService.show('Updating client...');
      const clientData = this.form.value;
      clientData.id = this.client.id;
      clientData.phone = clientData.phone.replaceAll('-', '');
      of(clientData).pipe(
        exhaustMap((data) =>
          this.clientService.update(data).pipe(
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
          this.getAllClients.emit();
        }
      });
    }
  }
}
