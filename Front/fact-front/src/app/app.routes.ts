import { Routes } from '@angular/router';

export const routes: Routes = [
    {
        path: '',
        redirectTo: '/home',
        pathMatch: 'full'
    },
    {
        path: 'home',
        loadComponent: () => import('./features/home/home-page/home-page').then(m => m.HomePage)
    },
    {
        path: 'administration/products',
        loadComponent: () => import('./features/administration/products/page/products-page/products-page').then(m => m.ProductsPage)
    },
    {
        path: 'administration/clients',
        loadComponent: () => import('./features/administration/clients/page/clients-page/clients-page').then(m => m.ClientsPage)
    },
    {
        path: 'facts',
        loadComponent: () => import('./features/facts/page/facts-page/facts-page').then(m => m.FactsPage)
    },
    // {
    //     path: '**',
    //     loadComponent: () => import('./not-found/not-found.component').then(m => m.NotFoundComponent)
    // }
];
