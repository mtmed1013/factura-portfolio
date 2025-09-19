import { Component, Input } from '@angular/core';
import { Output, EventEmitter } from '@angular/core';
import { ButtonModule } from 'primeng/button';
import { Dialog } from 'primeng/dialog';

@Component({
  selector: 'app-dialog-delete-confirm',
  imports: [Dialog, ButtonModule],
  templateUrl: './dialog-delete-confirm.html',
  styleUrl: './dialog-delete-confirm.scss'
})
export class DialogDeleteConfirm {
  @Input() visible: boolean = false;
  @Input() title: string = "Confirm Delete";
  @Input() message: string = "Are you sure you want to delete this item?";
  @Input() confirmText: string = "Delete";
  @Input() cancelText: string = "Cancel";
  @Output() confirmed = new EventEmitter<void>();
  @Output() visibleChange: EventEmitter<boolean> = new EventEmitter<boolean>();

  close() {
    this.visible = false;
    this.visibleChange.emit(this.visible);
  }

  confirm() {
    this.confirmed.emit();
  }
}
