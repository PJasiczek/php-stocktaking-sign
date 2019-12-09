import { Component, OnInit } from '@angular/core';
import { FormControl, Validators, FormGroup, FormBuilder } from '@angular/forms';
import { HttpService } from 'src/app/services/http.service';
import { Router } from '@angular/router';


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

  private validationMessages = {
    email: {
      required: 'Pole wymagane',
      email: 'Podaj email'
    },
    password: {
      required: 'Pole wymagane',
      min: 'Conajmniej 3 znaki'
    },
    first_name: {
      required: 'Pole wymagane',
      pattern: 'tylko litery'
    },
    last_name: {
      required: 'Pole wymagane',
      pattern: 'tylko litery'
    },
    telephone_number: {
      required: 'Pole wymagane',
      pattern: 'tylko liczby'
    },
    bank_account_number: {
      required: 'Pole wymagane',
    }

  }

  formErrors = {
    email: 'Nieprawidłowy email',
    password: 'Zbyt krótkie hasło',
    first_name: 'Nieprawidłowe imię',
    last_name: 'Nieprawidłowe nazwisko',
    telephone_number: 'Nieprawidłowy nr telefonu',
    bank_account_number: 'Nieprawidłowy nr bankowy',
  }
  

  constructor(private formBuilder: FormBuilder,
    private httpService: HttpService,
    private router: Router) { }

  ngOnInit() {
    this.modelForm = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.min(3)]],
      password_confirm: [],
      first_name:['', [Validators.required, Validators.pattern('^[a-zA-Z]*$')]],
      last_name: ['', [Validators.required, Validators.pattern('^[a-zA-Z]*$')]],
      telephone_number: ['', [Validators.required, Validators.minLength(9), Validators.maxLength(9), Validators.pattern('^[0-9]{6,9}$')]],
      bank_account_number: ['', [Validators.required] ],
      sex: [],
      is_pregnant: ['0'],
      date_of_birth: [],
      balance: [],
      city_name: ['', [Validators.pattern('^[a-zA-Z]*$')]],
    })

    this.modelForm.valueChanges.subscribe(value => {
      this.onControlValueChanged();
    });
    this.onControlValueChanged();
  }

  onSubmit() {
    // TODO: Use EventEmitter with form value
    if (this.modelForm.value['password']== this.modelForm.value['password_confirm']) {
      this.httpService.addUser(this.modelForm.value);
      setTimeout( () => { this.router.navigate(['/login']) }, 3000 );

    }
    else {
      console.log('różme hasła')
    }
  }

  onControlValueChanged(): void {
    const form = this.modelForm;
    for (let field in this.formErrors) {
      this.formErrors[field] = '';
      let control = form.get(field);
      if (control && control.dirty &&! control.valid) {
        const validationMessages = this.validationMessages[field];
        for (const key in control.errors) {
          this.formErrors[field] += validationMessages[key] + ''; 
          
        }
      }
    }
  }

}
