import { Component, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { MenuItem } from 'primeng/api';
import { Menubar } from 'primeng/menubar';
import { ToastModule } from 'primeng/toast';
import { LoadingComponent } from './shared/components/loading/loading.component';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, Menubar, ToastModule, LoadingComponent],
  templateUrl: './app.html',
  styleUrl: './app.scss'
})
export class App {
  protected readonly title = signal('fact-front');
  menuItems: MenuItem[] = [
    {
      icon: 'pi pi-home',
      label: 'Home',
      routerLink: '/'
    },
    {
      icon: 'pi pi-shopping-bag', // icono de compras
      label: 'Compras',
      routerLink: '/facts'
    },
    {
      icon: 'pi pi-box',
      label: 'Products',
      routerLink: '/administration/products'
    },
    {
      icon: 'pi pi-user',
      label: 'Clients',
      routerLink: '/administration/clients'
    },
  ];
}
