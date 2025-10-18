import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { IconFieldModule } from 'primeng/iconfield';
import { InputIconModule } from 'primeng/inputicon';
import { InputTextModule } from 'primeng/inputtext';
import { MultiSelectModule } from 'primeng/multiselect';
import { SelectModule } from 'primeng/select';
import { TableModule } from 'primeng/table';
import { TagModule } from 'primeng/tag';
import { CardNewComponent } from '../../../../shared/components/card-new/card-new.component';
import { DialogDeleteConfirm } from '../../../../shared/components/dialog-delete-confirm/dialog-delete-confirm';
import { FormClients } from '../../../administration/clients/components/form-clients/form-clients';

@Component({
  selector: 'app-facts-details-page',
  imports: [],
  templateUrl: './facts-details-page.html',
  styleUrl: './facts-details-page.scss'
})
export class FactsDetailsPage implements OnInit  {

}
