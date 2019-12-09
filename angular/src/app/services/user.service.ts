import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  userOrdersUrl = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/user_events.php';
  singUpUrl = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/event_sign_up.php';
  deleteUrl = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/events_sign_off.php'
  constructor(private http: HttpClient) { }

  getUserOrders(user_id) {
    let obj = [ {
      "user_id" : user_id
    }
    ]
    return this.http.post(this.userOrdersUrl, JSON.stringify(obj[0]), {responseType: 'text'} )
  }

  singUpForTheOrder(user_id, event_id) {
    let obj = [{
      "user_id" : user_id.toString(),
      "event_id": event_id.toString()
    }]
    console.log(JSON.stringify(obj[0]))
    return this.http.post(this.singUpUrl,  JSON.stringify(obj[0]),  {responseType: 'text'} );
  }

  removeUserOrder(user_id, event_id) {
    let obj = {
      "user_id": user_id.toString(),
      "event_id": event_id.toString()
    }
    
    return this.http.post(this.deleteUrl, JSON.stringify(obj) );
  }

  editUserData(user) {
    console.log('works')
    return this.http.post('http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/user_profile_modify.php', JSON.stringify(user),  {responseType: 'text'} ).toPromise().then(data => {
      console.log(data);
    });
  }
}
