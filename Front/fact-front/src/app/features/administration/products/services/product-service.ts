import { Injectable } from '@angular/core';
import { environment } from '../../../../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  private apiUrl = environment.apiUrl + '/products';

  constructor(private http: HttpClient) { }

  getProducts(): Observable<any> {
    return this.http.get(`${this.apiUrl}/`);
  }

  create(product: any): Observable<any> {
    return this.http.post(`${this.apiUrl}`, product);
  }

  update(product: any): Observable<any> {
    return this.http.put(`${this.apiUrl}/${product.id}`, product);
  }

  delete(productId: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${productId}`);
  }

}
