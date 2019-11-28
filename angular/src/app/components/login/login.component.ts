import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/services/http.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  userLogin = [];
  password: string;
  constructor(private httpService: HttpService) {
    this.userLogin = [{
      email : '',
      password: '' }
    ];
   }

  ngOnInit() {
  }

  login() {
    this.httpService.login(this.userLogin[0]);
  }

}
