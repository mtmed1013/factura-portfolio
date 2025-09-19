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
import { ClientService } from '../../services/client-service';
import { ButtonModule } from 'primeng/button';
import { FormClients } from "../../components/form-clients/form-clients";
import { CardNewComponent } from "../../../../../shared/components/card-new/card-new.component";
import { DialogDeleteConfirm } from "../../../../../shared/components/dialog-delete-confirm/dialog-delete-confirm";
import { Toast } from '../../../../../shared/services/toast';
import { LoadingService } from '../../../../../shared/components/loading/loading.service';
@Component({
  selector: 'app-clients-page',
  imports: [CommonModule, TableModule,
    TagModule, IconFieldModule, InputIconModule,
    InputTextModule,
    MultiSelectModule, SelectModule, ButtonModule,
    FormClients, CardNewComponent,
    DialogDeleteConfirm],
  templateUrl: './clients-page.html',
  styleUrl: './clients-page.scss'
})
export class ClientsPage implements OnInit {
  clients: any[] = [];
  @Output() client: any;
  @Output() newEditClient: boolean = false;
  deleteClient: boolean = false;

  constructor(
    private clientService: ClientService,
    private toast: Toast,
    private cdr: ChangeDetectorRef,
    private loadingService: LoadingService
  ) { }

  ngOnInit(): void {
    this.loadingService.show('loading clients...');
    this.getAllClients();
  }

  getAllClients(): void {

    this.clientService.getClients().pipe(
      catchError((error) => {
        console.error('Error fetching clients:', error);
        return of(null);
      }),
      finalize(() => {
        this.loadingService.close();
      })
    ).subscribe((result: any) => {
      if (result) {
        this.clients = result || [];
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

  handleNewClient() {
    this.newEditClient = true;
    this.client = null;
  }

  handleEditClient(client: any) {
    this.client = client;
    this.newEditClient = true;
  }

  handleDeleteClient(client: any) {
    this.client = client;
    this.deleteClient = true;
  }

  confirmDelete() {
    this.loadingService.show('Deleting client...');
    this.clientService.delete(this.client.id).pipe(
      catchError((error) => {
        console.error('Error deleting client:', error);
        return of(null);
      }),
      finalize(() => {
        this.loadingService.close();
      })
    ).subscribe((result: any) => {
      if (result) {
        this.deleteClient = false;
        this.toast.showSuccess(result?.message);
        this.getAllClients();
      }
      this.cdr.markForCheck();
    });
  }
}
