import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class HttpService {
  user = [];

  url = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/user_registration.php';         
  loginUrl = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/user_data_values.php';
  constructor(private http: HttpClient) { }

  addUser (user) {
    return this.http.post(this.url, JSON.stringify(user), {responseType: 'text'}).toPromise().then(data => {
      console.log(data);
    });   
  }

  login(email) {
    return this.http.post(this.loginUrl, JSON.stringify(email), {responseType: 'text'});
  }
  setUserData(data) {
   
    this.user = data;

    

  }
  getUserData() {
    return this.user;
  }
}
