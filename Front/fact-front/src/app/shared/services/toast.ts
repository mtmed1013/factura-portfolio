import { Injectable } from '@angular/core';
import { MessageService } from 'primeng/api';

@Injectable({
  providedIn: 'root'
})
export class Toast {
  constructor(private messageService: MessageService) { }

  showSuccess(detail: string = '') {
    this.messageService.add({ severity: 'success', summary: 'Correcto', detail: detail });
  }

  showInfo(detail: string = '') {
    this.messageService.add({ severity: 'info', summary: 'Información', detail: detail });
  }

  showWarn(detail: string = '') {
    this.messageService.add({ severity: 'warn', summary: 'Advertencia', detail: detail });
  }

  showError(detail: string = '') {
    this.messageService.add({ severity: 'error', summary: 'Error', detail: detail });
  }
}
