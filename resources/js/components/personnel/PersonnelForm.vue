<!--<template>-->
<!--  <div>-->
<!--    <form novalidate class="md-layout" @submit.prevent="validatePersonnel">-->
<!--      <md-card class="md-layout-item md-size-100 md-small-size-100">-->
<!--        <md-card-header>-->
<!--            <div class="md-title">Personnel-->
<!--            </div>-->
<!--        </md-card-header>-->

<!--        <md-card-content>-->
<!--          <div class="md-layout md-gutter">-->
<!--            <div class="md-layout-item md-small-size-100">-->
<!--              <md-field :class="getValidationClass('firstName')">-->
<!--                <label for="first-name">First Name</label>-->
<!--                <md-input name="first-name" id="first-name" autocomplete="given-name" v-model="form.firstName" :disabled="sending" />-->
<!--                <span class="md-error" v-if="!$v.form.firstName.required">The first name is required</span>-->
<!--                <span class="md-error" v-else-if="!$v.form.firstName.minlength">Invalid first name</span>-->
<!--              </md-field>-->
<!--            </div>-->

<!--            <div class="md-layout-item md-small-size-100">-->
<!--              <md-field :class="getValidationClass('lastName')">-->
<!--                <label for="last-name">Last Name</label>-->
<!--                <md-input name="last-name" id="last-name" autocomplete="family-name" v-model="form.lastName" :disabled="sending" />-->
<!--                <span class="md-error" v-if="!$v.form.lastName.required">The last name is required</span>-->
<!--                <span class="md-error" v-else-if="!$v.form.lastName.minlength">Invalid last name</span>-->
<!--              </md-field>-->
<!--            </div>-->
<!--          </div>-->
<!--        </md-card-content>-->

<!--        <md-progress-bar md-mode="indeterminate" v-if="sending" />-->

<!--        <md-card-actions>-->
<!--          <md-button type="submit" class="md-primary" :disabled="sending">Create Personnel</md-button>-->
<!--          <md-button><router-link to="/" class="nav-link">Cancel</router-link></md-button>-->
<!--        </md-card-actions>-->
<!--      </md-card>-->

<!--      <md-snackbar :md-active.sync="userSaved">The personnel {{ lastEmployee }} was successfully saved!</md-snackbar>-->
<!--    </form>-->
<!--  </div>-->
<!--</template>-->

<!--<script>-->
<!--import { validationMixin } from 'vuelidate'-->
<!--import {-->
<!--  required,-->
<!--  email,-->
<!--  minLength,-->
<!--  maxLength-->
<!--} from 'vuelidate/lib/validators'-->

<!--export default {-->
<!--    name: 'personnel-form',-->

<!--    mixins: [ validationMixin ],-->

<!--    data: () => ({-->
<!--      form: {-->
<!--        lastName: null,-->
<!--        firstName: null,-->
<!--        midName: null,-->
<!--        gender: null,-->
<!--        dob: null,-->
<!--        dateHired: null,-->
<!--        empStatus: null,-->
<!--        civilStatus: null,-->
<!--        department: null,-->
<!--        address1: null,-->
<!--        address2: null,-->
<!--        email: null-->
<!--      },-->
<!--      // flag determine whether to display 'saved' message-->
<!--      userSaved: null,-->
<!--      // personnel name to display in 'saved' message-->
<!--      lastEmployee: null,-->
<!--      // flag for disabling inputs-->
<!--      sending: null,-->
<!--    }),-->

<!--    validations: {-->
<!--      form: {-->
<!--        firstName: {-->
<!--          required,-->
<!--          minLength: minLength(3),-->
<!--          maxLength: maxLength(50)-->
<!--        },-->
<!--        lastName: {-->
<!--          required,-->
<!--          minLength: minLength(3)-->
<!--        },-->
<!--        dob: {-->
<!--          required-->
<!--        },-->
<!--        gender: {-->
<!--          required-->
<!--        },-->
<!--        email: {-->
<!--          required,-->
<!--          email-->
<!--        }-->
<!--      }-->
<!--    },-->

<!--    methods: {-->
<!--      getValidationClass(fieldName) {-->
<!--        const field = this.$v.form[fieldName]-->

<!--        if (field) {-->
<!--          return {-->
<!--            'md-field': field.$invalid && field.$dirty-->
<!--          }-->
<!--        }-->
<!--      },-->

<!--      validatePersonnel() {-->
<!--        this.$v.$touch()-->

<!--        if (! this.$v.$invalid) {-->
<!--          console.log('sending Personnel')-->
<!--          this.savePersonnel()-->
<!--        }-->
<!--      },-->

<!--      savePersonnel() {-->
<!--        this.sending = true-->

<!--        // use axios for sending-->
<!--      },-->

<!--      clearForm() {-->
<!--        this.$v.reset()-->

<!--        this.form.lastName = null-->
<!--        this.form.firstName = null-->
<!--        this.form.midName = null-->
<!--        this.form.gender = null-->
<!--        this.form.dob = null-->
<!--        this.form.dateHired = null-->
<!--        this.form.empStatus = null-->
<!--        this.form.civilStatus = null-->
<!--        this.form.department = null-->
<!--        this.form.address1 = null-->
<!--        this.form.address2 = null-->
<!--        this.form.email = null-->
<!--      }-->

<!--    } // ./methods-->

<!--}-->
<!--</script>-->


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
          </div>

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
                  <md-option value="SINGLE">Single</md-option>
                  <md-option value="MARRIED">Married</md-option>
                  <md-option value="SEPARATED">Legally Separated</md-option>
                  <md-option value="DIVORCED">Divorced</md-option>
                  <md-option value="WIDOW/ER">Widow/er</md-option>
                </md-select>
                <span class="md-error">The civil status is required</span>
              </md-field>
            </div>
          </div>

          <md-field :class="getValidationClass('email')">
            <label for="email">Email</label>
            <md-input type="email" name="email" id="email" autocomplete="email" v-model="form.email" :disabled="sending" />
            <span class="md-error" v-if="!$v.form.email.required">The email is required</span>
            <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
          </md-field>
        </md-card-content>

        <md-progress-bar md-mode="indeterminate" v-if="sending" />

        <md-card-actions>
          <md-button type="submit" class="md-primary" :disabled="sending">Create user</md-button>
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
      this.form.age = null
      this.form.gender = null
      this.form.email = null
    },
    saveUser () {
      this.sending = true

      // Instead of this timeout, here you can call your API
      window.setTimeout(() => {
        this.lastUser = `${this.form.firstName} ${this.form.lastName}`
        this.userSaved = true
        this.sending = false
        this.clearForm()
      }, 1500)
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
