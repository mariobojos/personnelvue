<template>
  <div>
    <form novalidate class="md-layout" @submit.prevent="validateUser">
      <md-card class="md-layout-item md-size-100 md-small-size-100">
        <md-card-header>
          <div class="md-title">Add Personnel</div>
        </md-card-header>

        <md-card-content>
          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('firstName')">
                <label for="first-name">First Name</label>
                <md-input name="first-name" id="first-name" autocomplete="given-name" v-model="form.firstName" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.firstName.required">The first name is required</span>
                <span class="md-error" v-else-if="!$v.form.firstName.minlength">Invalid first name</span>
                <span class="md-error" v-else-if="!$v.form.firstName.maxlength">First name is at most 50 characters long.</span>
              </md-field>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('midName')">
                <label for="last-name">Middle Name</label>
                <md-input name="last-name" id="mid-name" autocomplete="family-name" v-model="form.midName" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.midName.minlength">Invalid middle name</span>
                <span class="md-error" v-else-if="!$v.form.midName.maxlength">Middle name is at most 50 characters long.</span>
              </md-field>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('lastName')">
                <label for="last-name">Last Name</label>
                <md-input name="last-name" id="last-name" autocomplete="family-name" v-model="form.lastName" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.lastName.required">The last name is required</span>
                <span class="md-error" v-else-if="!$v.form.lastName.minlength">Invalid last name</span>
                <span class="md-error" v-else-if="!$v.form.lastName.maxlength">Last name is at most 50 characters long.</span>
              </md-field>
            </div>
          </div> <!-- /.md-layout -->

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-datepicker name="dob" id="dob" v-model="form.dob" md-dense :disabled="sending" :class="getValidationClass('dob')">
                <span class="md-error">The date of birth is required.</span>
                <label for="dob">Date of Birth</label>
              </md-datepicker>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('gender')">
                <label for="gender">Gender</label>
                <md-select name="gender" id="gender" v-model="form.gender" md-dense :disabled="sending">
                  <md-option></md-option>
                  <md-option value="M">Male</md-option>
                  <md-option value="F">Female</md-option>
                  <md-option value="O">Other</md-option>
                </md-select>
                <span class="md-error">The gender is required</span>
              </md-field>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('civilStatus')">
                <label for="civilStatus">Civil Status</label>
                <md-select name="civilStatus" id="civilStatus" v-model="form.civilStatus" md-dense :disabled="sending">
                  <md-option></md-option>
                  <md-option value="SIN">Single</md-option>
                  <md-option value="MAR">Married</md-option>
                  <md-option value="SEP">Legally Separated</md-option>
                  <md-option value="DIV">Divorced</md-option>
                  <md-option value="WID">Widow/er</md-option>
                </md-select>
                <span class="md-error">The civil status is required</span>
              </md-field>
            </div>
          </div> <!-- /.md-layout -->

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-datepicker name="dateHired" id="dateHired" v-model="form.dateHired" md-dense :disabled="sending" :class="getValidationClass('dateHired')">
                <span class="md-error">The date hired is required.</span>
                <label for="dateHired">Date Hired</label>
              </md-datepicker>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('empStatus')">
                <label for="empStatus">Employee Status</label>
                <md-select name="empStatus" id="empStatus" v-model="form.empStatus" md-dense :disabled="sending">
                  <md-option></md-option>
                  <md-option value="PRB">PROBATIONARY</md-option>
                  <md-option value="REG">REGULAR</md-option>
                </md-select>
                <span class="md-error">The empStatus is required</span>
              </md-field>
            </div>
          </div> <!-- /.md-layout -->

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('department')">
                <label for="department">Department</label>
                <md-select name="department" id="department" v-model="form.department" md-dense :disabled="sending">
                  <md-option></md-option>
                  <md-option value="IT">IT</md-option>
                  <md-option value="MKT">Marketing</md-option>
                  <md-option value="HR">Human Resource</md-option>
                  <md-option value="SVC">Services</md-option>
                </md-select>
                <span class="md-error">The department is required</span>
              </md-field>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('email')">
                <label for="email">Email</label>
                <md-input type="email" name="email" id="email" autocomplete="email" v-model="form.email" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.email.required">The email is required</span>
                <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
              </md-field>
            </div>
          </div> <!-- /.md-layout -->

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('address1')">
                <label for="address1">Address Line 1</label>
                <md-input name="address1" id="address1" autocomplete="given-name" v-model="form.address1" :disabled="sending" />
                <span class="md-error">The address is required</span>
              </md-field>
            </div>
          </div> <!-- /.md-layout -->

          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('address2')">
                <label for="address2">Address Line 2</label>
                <md-input name="address2" id="address2" v-model="form.address2" :disabled="sending" />
              </md-field>
            </div>
          </div> <!-- /.md-layout -->
        </md-card-content>

        <md-progress-bar md-mode="indeterminate" v-if="sending" />

        <md-card-actions>
          <md-button type="submit" class="md-primary" :disabled="sending">Create personnel</md-button>
          <md-button><router-link to="/" class="nav-link">Cancel</router-link></md-button>
        </md-card-actions>
      </md-card>

      <md-snackbar :md-active.sync="userSaved">The user {{ lastUser }} was saved with success!</md-snackbar>
    </form>
  </div>
</template>

<script>
import { validationMixin } from 'vuelidate'
import {
  required,
  email,
  minLength,
  maxLength
} from 'vuelidate/lib/validators'

export default {
  name: 'FormValidation',
  mixins: [validationMixin],
  data: () => ({
    form: {
      firstName: null,
      lastName: null,
      midName: null,
      gender: null,
      dob: null,
      dateHired: null,
      empStatus: null,
      civilStatus: null,
      department: null,
      address1: null,
      address2: null,
      email: null
    },
    userSaved: false,
    sending: false,
    lastUser: null
  }),
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
      dateHired: {
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
      department: {
        required
      },
      email: {
        required,
        email
      },
      address1: {
        required
      }
    }
  },
  methods: {
    getValidationClass (fieldName) {
      const field = this.$v.form[fieldName]

      if (field) {
        return {
          'md-invalid': field.$invalid && field.$dirty
        }
      }
    },
    clearForm () {
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
    },
    saveUser () {
      this.sending = true

      // Instead of this timeout, here you can call your API
      axios.post('/api/personnels', {
        firstname: this.form.firstName,
        lastname: this.form.lastName,
        midname: this.form.midName,
        dob: this.form.dob,
        gender: this.form.gender,
        civil_status: this.form.civilStatus,
        emp_status: this.form.empStatus,
        date_hired: this.form.dateHired,
        department: this.form.department,
        email: this.form.email,
        address1: this.form.address1,
        address2: this.form.address2
      })
        .then(function (response) {
          console.log(response);
          this.lastUser = `${this.form.firstName} ${this.form.lastName}`
          this.userSaved = true
          this.sending = false
          this.clearForm()
        })
        .catch(function (error) {
          console.log(error);
        })
    },
    validateUser () {
      this.$v.$touch()

      if (!this.$v.$invalid) {
        this.saveUser()
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.md-progress-bar {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
}
</style>
