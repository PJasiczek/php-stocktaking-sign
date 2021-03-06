import { Component, OnInit } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { OrderDialogComponent } from '../../order-dialog/order-dialog.component';
import { HttpOrdersService } from 'src/app/services/http-orders.service';

@Component({
  selector: 'app-orders',
  templateUrl: './orders.component.html',
  styleUrls: ['./orders.component.scss']
})
export class OrdersComponent implements OnInit {

  orders = [];
  result = "result"
  filterOrders = [];
  constructor(public dialog: MatDialog,
    private httpService: HttpOrdersService) { 

  }
  openDialog(): void {
    const dialogRef = this.dialog.open(OrderDialogComponent, {
      width: '300px',
      height: '800px',
      data: {data: this.result}
    });

    dialogRef.afterClosed().subscribe(result => {
    
      console.log(result)
      this.orders.push(result);
      this.httpService.newOrder(JSON.stringify(result));
    });
  }


  ngOnInit() {
    this.httpService.getOrders().subscribe((data: any) => {
      data.forEach(item => {
        this.orders.push(item);
      })
      
    })
  }

  removeOrder(i) {
    this.httpService.deleteOrder(this.orders[i].event_code);
    window.location.reload();
  }
  editOrder(i) {
    console.log(this.orders[i]);
    const dialogRef = this.dialog.open(OrderDialogComponent, {
      width: '250px',
      data: {data: this.result}
    });

    dialogRef.afterClosed().subscribe(result => {
    
      console.log(result);
      this.httpService.editOrder(JSON.stringify(result));
    });
  }

  logOut() {
    
  }
}
