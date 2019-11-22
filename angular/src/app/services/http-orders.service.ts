import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class HttpOrdersService {

  url = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/create_event.php'
  constructor(private http: HttpClient) { }

  newOrder(order) {
    return this.http.post(this.url, JSON.stringify(order), {responseType: 'text'}).toPromise().then(data => {
      console.log(data);
    });
  }
}
