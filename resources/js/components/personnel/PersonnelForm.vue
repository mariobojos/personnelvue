<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Personnel</h5>
        <h6 class="card-subtitle mb-2 text-muted">Create record</h6>
        <hr>
        <form novalidate @submit.prevent="validateData" autocomplete="off">
          <div class="form-row mt-3">
            <div class="form-group col-4" :class="{ 'form-group--error': $v.form.firstName.$error }">
              <label for="firstName">First name <span class="text-danger">*</span></label>
              <input type="text" id="firstName" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.firstName) }"
                     v-model.trim="$v.form.firstName.$model">
              <div class="invalid-feedback" v-if="!$v.form.firstName.required">First name is required.</div>
              <div class="invalid-feedback" v-if="!$v.form.firstName.minLength">
                First name must have at least {{ $v.form.firstName.$params.minLength.min }} letters.
              </div>
              <div class="invalid-feedback" v-if="!$v.form.firstName.maxLength">
                First name must have at most {{ $v.form.firstName.$params.maxLength.max }} letters.
              </div>
            </div> <!-- ./firstName -->
            <div class="form-group col-4" :class="{ 'form-group--error': $v.form.lastName.$error }">
              <label for="lastName">Last name <span class="text-danger">*</span></label>
              <input type="text" id="lastName" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.lastName) }"
                     v-model.trim="$v.form.lastName.$model">
              <div class="invalid-feedback" v-if="!$v.form.lastName.required">Last name is required.</div>
              <div class="invalid-feedback" v-if="!$v.form.lastName.minLength">
                Last name must have at least {{ $v.form.lastName.$params.minLength.min }} letters.
              </div>
              <div class="invalid-feedback" v-if="!$v.form.lastName.maxLength">
                Last name must have at most {{ $v.form.lastName.$params.maxLength.max }} letters.
              </div>
            </div> <!-- ./lastName -->
            <div class="form-group col-4" :class="{ 'form-group--error': $v.form.midName.$error }">
              <label for="midName">Middle name</label>
              <input type="text" id="midName" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.midName) }"
                     v-model.trim="$v.form.midName.$model">
              <div class="invalid-feedback" v-if="!$v.form.midName.maxLength">
                Middle name must have at most {{ $v.form.midName.$params.maxLength.max }} letters.
              </div>
            </div> <!-- ./midName -->
          </div> <!-- ./form-row -->
          <div class="form-row">
            <div class="form-group col-4">
              <label for="dob">Date of Birth <span class="text-danger">*</span></label>
              <input type="text" id="dob" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.dob) }"
                     v-model.trim="$v.form.dob.$model">
              <div class="invalid-feedback" v-if="!$v.form.dob.required">The date of birth is required.</div>
            </div>
            <div class="form-group col-4">
              <label for="gender">Gender <span class="text-danger">*</span></label>
              <select name="gender" id="gender" class="form-control"
                      :class="{ 'is-invalid': validationStatus($v.form.gender) }" v-model="form.gender">
                <option></option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
              </select>
              <div class="invalid-feedback" v-if="!$v.form.gender.required">The gender is
                required.
              </div>
            </div>
            <div class="form-group col-4">
              <label for="civilStatus">Civil Status <span class="text-danger">*</span></label>
              <select name="civilStatus" id="civilStatus" class="form-control"
                      :class="{ 'is-invalid': validationStatus($v.form.civilStatus) }" v-model="form.civilStatus">
                <option></option>
                <option value="SIN">Single</option>
                <option value="MAR">Married</option>
                <option value="SEP">Legally Separated</option>
                <option value="DIV">Divorced</option>
                <option value="WID">Widow/er</option>
              </select>
              <div class="invalid-feedback" v-if="!$v.form.civilStatus.required">The civil
                status is required.
              </div>
            </div>
          </div> <!-- ./form-row -->
          <div class="form-row">
            <div class="form-group col-4">
              <label for="dateHired">Date Hired <span class="text-danger">*</span></label>
              <input type="text" id="dateHired" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.dateHired) }" v-model="form.dateHired">
              <div class="invalid-feedback" v-if="!$v.form.dateHired.required">The date hired is required.</div>
            </div>
            <div class="form-group col-4">
              <label for="empStatus">Employee Status <span class="text-danger">*</span></label>
              <select name="empStatus" id="empStatus" class="form-control"
                      :class="{ 'is-invalid': validationStatus($v.form.empStatus) }" v-model="form.empStatus">
                <option></option>
                <option value="PRB">PROBATIONARY</option>
                <option value="REG">REGULAR</option>
              </select>
              <div class="invalid-feedback" v-if="!$v.form.empStatus.required">The employee status is required.</div>
            </div>
            <div class="form-group col-4">
              <label for="department">Department <span class="text-danger">*</span></label>
              <select name="department" id="department" class="form-control"
                      :class="{ 'is-invalid': validationStatus($v.form.department) }" v-model="form.department">
                <option></option>
                <option value="IT">IT</option>
                <option value="MKT">Marketing</option>
                <option value="HR">Human Resource</option>
                <option value="SVC">Services</option>
              </select>
              <div class="invalid-feedback" v-if="!$v.form.department.required">The
                department is required.
              </div>
            </div>
          </div> <!-- ./form-row -->
          <div class="form-row">
            <div class="form-group col-4">
              <label for="email">Position</label>
              <input type="text" id="position" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.position) }"
                     v-model.trim="$v.form.position.$model">
              <div class="invalid-feedback" v-if="!$v.form.position.required">The position is required.</div>
              <div class="invalid-feedback" v-else-if="!$v.form.position.minLength">
                Position must have at least {{ $v.form.position.$params.minLength.min }} letters.
              </div>
            </div>
            <div class="form-group col-8">
              <label for="email">Email</label>
              <input type="text" id="email" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.email) }"
                     v-model.trim="$v.form.email.$model">
              <div class="invalid-feedback" v-if="!$v.form.email.required">The email address is required.</div>
              <div class="invalid-feedback" v-else-if="!$v.form.email.email">Invalid email.</div>
            </div>
          </div> <!-- /.form-row -->

          <div class="form-row mt-2">
            <div class="form-group col">
              <label for="address1">Address Line 1</label>
              <input type="text" id="address1" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.address1) }"
                     v-model.trim="$v.form.address1.$model">
              <div class="invalid-feedback" v-if="!$v.form.address1.required">The address is required.</div>
            </div>
          </div> <!-- /.form-row -->

          <div class="form-row mt-2">
            <div class="form-group col">
              <label for="address2">Address Line 2</label>
              <input type="text" id="address2" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.address2) }"
                     v-model.trim="form.address2">
            </div>
          </div> <!-- /.form-row -->

          <md-button type="submit">Create personnel</md-button>
          <md-button>
            <router-link to="/" class="nav-link">Cancel</router-link>
          </md-button>
        </form>
      </div>
    </div>
    <div v-if="showSuccess">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Record saved!</h4>
        <p>Personnel record has been saved.</p>
        <hr>
        <p v-text="message"></p>
      </div>
    </div>
  </div>
</template>

<script>
import {validationMixin} from "vuelidate";

const {
  required,
  url,
  email,
  maxLength,
  minLength
} = require("vuelidate/lib/validators");

export default {
  name: "personnel-form",

  mixins: [validationMixin],

  validations: {
    form: {
      firstName: {
        required,
        minLength: minLength(3),
        maxLength: maxLength(50)
      },
      lastName: {
        required,
        minLength: minLength(3),
        maxLength: maxLength(50)
      },
      midName: {
        maxLength: maxLength(50)
      },
      dob: {
        required
      },
      gender: {
        required
      },
      civilStatus: {
        required
      },
      empStatus: {
        required
      },
      dateHired: {
        required
      },
      department: {
        required
      },
      position: {
        required,
        minLength: minLength(3),
      },
      email: {
        required,
        email
      },
      address1: {
        required,
      },
    }
  },

  data: () => ({
    form: {
      firstName: null,
      lastName: null,
      midName: null,
      dob: null,
      gender: null,
      civilStatus: null,
      empStatus: null,
      dateHired: null,
      department: null,
      position: null,
      email: null,
      address1: null,
      address2: null,
    },
    showSuccess: false,
    message: ''
  }),

  methods: {
    validationStatus: (validation) => {
      return typeof validation === 'undefined' ? false : validation.$error
    },

    validateData() {
      this.$v.$touch()
      if (this.$v.$invalid) {
        // invalid-feedback validating
        console.log('failed firstName validation')
      } else {
        console.log('passed firstName validation')
        this.saveRecord()
      }
    },

    saveRecord() {
      axios
        .post(
          '/api/personnels',
          {
            firstname: this.form.firstName,
            lastname: this.form.lastName,
            midname: this.form.midName,
            dob: this.form.dob,
            gender: this.form.gender,
            civil_status: this.form.civilStatus,
            emp_status: this.form.empStatus,
            date_hired: this.form.dateHired,
            department: this.form.department,
            position: this.form.position,
            email: this.form.email,
            address1: this.form.address1,
            address2: this.form.address2
          }
        )
        .then((response) => {
          this.message = response.data.message
          this.showSuccess = true
          setTimeout(() => {
            this.$router.push({name: 'home'})
          }, 1300);
        })
        .catch((errors) => {
          console.log(errors)
        })
    },

    clearForm() {
      this.$v.$reset()
      this.form.firstName = null
      this.form.lastName = null
      this.form.midName = null
      this.form.dob = null
      this.form.gender = null
      this.form.civilStatus = null
      this.form.dateHired = null
      this.form.empStatus = null
      this.form.department = null
      this.form.email = null
      this.form.address1 = null
      this.form.address2 = null
    }
  },

}
</script>

<style scoped>

</style>
