import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class HttpService {

  url = 'http://jasiu1041.unixstorm.org/ibd-stocktaking-backend/user_data_values.php';
  constructor() { }

}
