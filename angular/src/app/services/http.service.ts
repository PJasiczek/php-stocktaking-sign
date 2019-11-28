import { Injectable } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
import { catchError, retry } from 'rxjs/operators';
import { Observable, throwError } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class HttpService {
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json'
    }),
    observe: 'response'
};

  url = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/user_registration.php';         
  loginUrl = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/user_data_values.php';
  constructor(private http: HttpClient) { }

  addUser (user) {
    return this.http.post(this.url, JSON.stringify(user), {responseType: 'text'}).toPromise().then(data => {
      console.log(data);
    });   
  }

  login(email) {
    console.log(email)
    return this.http.post(this.loginUrl, JSON.stringify(email), {responseType: 'text'}).toPromise().then(data => {
      console.log(data);
    });   ;
  }

}
