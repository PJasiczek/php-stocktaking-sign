import { Component, OnInit } from '@angular/core';
import { FormControl, Validators, FormGroup, FormBuilder } from '@angular/forms';
import { HttpService } from 'src/app/services/http.service';


@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {

  startDate = new Date(1990, 0, 1);
  sex: string;
  is_pregnant: string;
  modelForm: FormGroup;
  

  constructor(private formBuilder: FormBuilder,
    private httpService: HttpService) { }

  ngOnInit() {
    this.modelForm = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.min(3)]],
      password_confirm: [],
      first_name:['', [Validators.required, Validators.pattern('^[a-zA-Z]*$')]],
      last_name: ['', [Validators.required, Validators.pattern('^[a-zA-Z]*$')]],
      telephone_number: ['', [Validators.required, Validators.minLength(9), Validators.maxLength(9), Validators.pattern('^[0-9]{6,9}$')]],
      bank_account_number:['', [Validators.required, Validators.maxLength(26), Validators.pattern('^[0-9]{6,9}$')]],
      sex: [],
      is_pregnant: ['0'],
      date_of_birth: [],
      balance: [],
      city_name: ['', [Validators.pattern('^[a-zA-Z]*$')]],
    })

    
  }

  onSubmit() {
    // TODO: Use EventEmitter with form value
    if (this.modelForm.value['password']== this.modelForm.value['password_confirm']) {
      this.httpService.addUser(this.modelForm.value);
    }
    else {
      console.log('różme hasła')
    }


  }

}
