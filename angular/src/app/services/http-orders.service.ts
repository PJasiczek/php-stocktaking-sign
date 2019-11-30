import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class HttpOrdersService {

  url = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/create_event.php'
  constructor(private http: HttpClient) { }

  newOrder(order) {
    console.log("order is " +order);
    return this.http.post(this.url, order, {responseType: 'text'}).toPromise().then(data => {
      console.log(data);
    });
  }

  getOrders() {
    return this.http.get('http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/events_list.php').pipe(map(data => {
      return data;
    }));
  }

  deleteOrder(event_code) {
    let obj = [{
      "event_code": event_code.toString(),
    }]
    return this.http.post('http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/delete_event.php', JSON.stringify(obj[0]),  {responseType: 'text'} ).toPromise().then(data => {
      console.log(data);
    });
  }

  editOrder(order) {
    console.log(order);
    return this.http.post("http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/modify_event.php", order, {responseType: 'text'}).toPromise().then(data => {
      console.log(data);
    })
  }
}
