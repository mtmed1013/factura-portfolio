import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ClientService {
  private apiUrl = environment.apiUrl + '/clients';

  constructor(private http: HttpClient) { }

  getClients(): Observable<any> {
    return this.http.get(`${this.apiUrl}/`);
  }

  create(client: any): Observable<any> {
    return this.http.post(`${this.apiUrl}`, client);
  }

  update(client: any): Observable<any> {
    return this.http.put(`${this.apiUrl}/${client.id}`, client);
  }

  delete(clientId: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${clientId}`);
  }

}
