import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class LoadingService {
    private loadingSubject = new BehaviorSubject<{ show: boolean, text?: string }>({ show: false });
    loadingState$ = this.loadingSubject.asObservable();

    show(text?: string) {
        this.loadingSubject.next({ show: true, text });
    }

    close() {
        this.loadingSubject.next({ show: false });
    }
}
