import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-order-dialog',
  templateUrl: './order-dialog.component.html',
  styleUrls: ['./order-dialog.component.scss']
})
export class OrderDialogComponent {
  minDate = new Date(2000, 0, 1);
  maxDate = new Date(2020, 0, 1);
  constructor(
    public dialogRef: MatDialogRef<OrderDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any) {
      data.event_code = Math.floor((Math.random() * 1000000) + 1);
    }

  onNoClick(): void {
    this.dialogRef.close();
  }

}
