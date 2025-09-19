
import { Component, OnDestroy, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProgressSpinnerModule } from 'primeng/progressspinner';
import { LoadingService } from './loading.service';
import { Subscription } from 'rxjs';

@Component({
    selector: 'app-loading',
    standalone: true,
    imports: [CommonModule, ProgressSpinnerModule],
    templateUrl: './loading.component.html',
    styleUrls: ['./loading.component.scss']
})
export class LoadingComponent implements OnInit, OnDestroy {
    show = false;
    text = '';
    private sub!: Subscription;

    constructor(private loadingService: LoadingService) { }

    ngOnInit() {
        this.sub = this.loadingService.loadingState$.subscribe(state => {
            this.show = state.show;
            this.text = state.text || '';
        });
    }

    ngOnDestroy() {
        this.sub?.unsubscribe();
    }
}
