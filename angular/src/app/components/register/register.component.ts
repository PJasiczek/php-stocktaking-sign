import { Component, OnInit } from '@angular/core';
import { FormControl, Validators, FormGroup, FormBuilder } from '@angular/forms';


@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {

  startDate = new Date(1990, 0, 1);
  sex: string;
  modelForm: FormGroup;
  

  constructor(private formBuilder: FormBuilder) { }

  ngOnInit() {
    this.modelForm = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
    password: ['', [Validators.required, Validators.min(3)]],
    firstName:['', [Validators.required, Validators.pattern('^[a-zA-Z]*$')]],
    lastName: ['', [Validators.required, Validators.pattern('^[a-zA-Z]*$')]],
    tel: ['', [Validators.required, Validators.minLength(9), Validators.maxLength(9), Validators.pattern('^[0-9]{6,9}$')]],
    bank:['', [Validators.required, Validators.maxLength(26), Validators.pattern('^[0-9]{6,9}$')]],
    })

    
  }

  onSubmit() {
    // TODO: Use EventEmitter with form value
    console.log(this.modelForm)
  }

}
