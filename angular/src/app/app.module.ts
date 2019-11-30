import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { RouterModule } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MatNativeDateModule } from '@angular/material/core';




/* MATERIAL IMPORTS */
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';
import {MatButtonModule} from '@angular/material/button';
import {MatDatepickerModule} from '@angular/material/datepicker';
import {MatRadioModule} from '@angular/material/radio';
import {MatDialogModule} from '@angular/material/dialog';
import {MatTabsModule} from '@angular/material/tabs';
import {MatListModule} from '@angular/material/list';
import {MatToolbarModule} from '@angular/material/toolbar';



/* COMPONENTS */
import { AppComponent } from './app.component';
import { NavComponent } from './components/nav/nav.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HttpService } from './services/http.service';
import { AdminComponent } from './components/admin/admin.component';
import { OrdersComponent } from './components/admin/orders/orders.component';
import {MatCardModule} from '@angular/material/card';
import { HttpOrdersService } from './services/http-orders.service';
import { OrderDialogComponent } from './components/order-dialog/order-dialog.component';
import { UserMainPageComponent } from './components/user-main-page/user-main-page.component';
import { UserComponent } from './components/user-main-page/user/user.component';
import { UserService } from './services/user.service';


const appRoutes = [
  {path: '', component: NavComponent},
  {path: 'login', component: LoginComponent},
  {path: 'register', component: RegisterComponent},
  {path: 'orders', component: OrdersComponent},
  {path: 'user-main', component: UserMainPageComponent},
  {path: '**',  redirectTo: '/', pathMatch: 'full'},
];

@NgModule({
  declarations: [
    AppComponent,
    NavComponent,
    LoginComponent,
    RegisterComponent,
    AdminComponent,
    OrdersComponent,
    OrderDialogComponent,
    UserMainPageComponent,
    UserComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MatFormFieldModule,
    RouterModule.forRoot(appRoutes),
    HttpClientModule,
    FormsModule,
    MatInputModule,
    MatButtonModule,
    ReactiveFormsModule,
    MatDatepickerModule,
    MatNativeDateModule,
    MatRadioModule,
    MatCardModule,
    MatDialogModule,
    MatTabsModule,
    MatListModule,
    MatToolbarModule,
   
  ],
  providers: [HttpService, HttpOrdersService, UserService],
  bootstrap: [AppComponent],
  entryComponents: [OrderDialogComponent],
})
export class AppModule { }
