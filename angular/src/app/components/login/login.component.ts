import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/services/http.service';
import { Router }  from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  userLogin = [];
  password: string;
  logIn = false;
  constructor(private httpService: HttpService,
    private router: Router) {
    this.userLogin = [{
      email : 'jasiu1059@wp.pl', //jasiu1059@wp.pl
      password: 'password1' }
    ];
   }

  ngOnInit() {
  }

  login() {
    console.log(this.userLogin[0])
    if(this.userLogin[0].email == 'admin' && this.userLogin[0].password ==='admin') {
        setTimeout( () => { this.router.navigate(['/orders']) }, 3000 );

    }
    else {
    this.httpService.login(this.userLogin[0]).subscribe(data => {
     

      let obj = JSON.parse(data);
      this.httpService.setUserData(obj[0]);
      
      if (obj[0].password === this.userLogin[0].password) {
        setTimeout( () => { this.router.navigate(['/user-main']) }, 3000 );

      }
    

    })};

  }

}
