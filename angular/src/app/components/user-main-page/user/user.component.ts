import { Component, OnInit, Input } from '@angular/core';
import { UserService } from 'src/app/services/user.service';


@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.scss']
})
export class UserComponent implements OnInit {

  @Input() user;
  orders = [];
  dialogFlag = false;
  constructor(private userService: UserService) { }

  ngOnInit() {
    this.userService.getUserOrders(this.user.user_id).subscribe(data => {
      //console.log(data);
      this.orders.push(JSON.parse(data));  
    })
  

  }

  singOut(event_id, i) {
    
    this.userService.removeUserOrder(this.user['user_id'], event_id).subscribe(data => {
    
    })
    }

    confirmProfilChanges() {
      this.userService.editUserData(this.user);
    }

    payOff() {
      this.dialogFlag = true;
      setTimeout(() => 
{
    this.dialogFlag = false;
},3000)}
    

}
