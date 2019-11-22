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
  filterOrders = [];
  constructor(public dialog: MatDialog,
    private httpService: HttpOrdersService) { 
    this.orders = [{
      id: 0,
      free_places_count: 0,
      places_count: 14,
      name: 'Inwentaryzacja magazynu',
      city: 'Wroclaw',
      date: new Date('2019/02/25'),
      start_time: '18:30',
      end_time: '22:30',
      address: 'Braniborska 32',
      hour_price: 18,
      description: 'Brak dodatkowych informacji'
    },
  ]
  }
  openDialog(): void {
    const dialogRef = this.dialog.open(OrderDialogComponent, {
      width: '250px',
      data: {data: this.orders}
    });

    dialogRef.afterClosed().subscribe(result => {
    
      //this.orders.push(result => );
      //JSON.stringify(this.orders);
      //console.log(this.orders);
      this.httpService.newOrder(JSON.stringify(this.orders));
      
    });
  }


  ngOnInit() {
  }

  removeOrder(i) {
    this.filterOrders = this.orders.filter(order => {order !== i });
    this.orders = this.filterOrders;
  }

}
