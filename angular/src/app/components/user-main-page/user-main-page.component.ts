import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/services/http.service';
import { Router } from '@angular/router';
import { HttpOrdersService } from 'src/app/services/http-orders.service';
import { UserService } from 'src/app/services/user.service';

@Component({
  selector: 'app-user-main-page',
  templateUrl: './user-main-page.component.html',
  styleUrls: ['./user-main-page.component.scss']
})
export class UserMainPageComponent implements OnInit {

  user = [];
  orders = [];
  userFlag = false;
  disabledButton = false;
  accept = false;
  constructor(private httpService: HttpService,
    private router: Router,
    private httpOrderService: HttpOrdersService,
    private userService: UserService) { }

  ngOnInit() {
    this.user = this.httpService.getUserData();
    console.log(this.user)
    this.httpOrderService.getOrders().subscribe((data: any) => {
      data.forEach(item => {
        this.orders.push(item);
      })})}
  logOut() {
    this.router.navigate(['/login']);
  }
  
  addPerson(event_id, i) {
    this.userService.singUpForTheOrder(this.user['user_id'], event_id).subscribe(data => {
      if(data === '"true"') {
        this.orders[i].free_places_count++;
        this.accept = true;
        setTimeout(() => 
{
    this.accept = false;
},
5000);
      }
      else {  console.log("jestem już zapisany ")}
    })
    
  }
  showUser() {
    this.userFlag = true;
  }
}

