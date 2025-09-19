import { ChangeDetectionStrategy, Component, EventEmitter, Input, Output } from '@angular/core';
import { ButtonModule } from 'primeng/button';

@Component({
  selector: 'app-card-new',
  imports: [ButtonModule],
  templateUrl: './card-new.component.html',
  styleUrl: './card-new.component.css',
  changeDetection: ChangeDetectionStrategy.OnPush,
})
export class CardNewComponent {
  @Input() title: string = "New Item";
  @Input() icon: string = "pi pi-plus";
  @Input() buttonLabel: string = "Add New";
  @Input() description: string = "Fill in the details to add a new item.";
  @Output() handleNew: EventEmitter<void> = new EventEmitter<void>();


  itsNew() {
    this.handleNew.emit();
  }

}
