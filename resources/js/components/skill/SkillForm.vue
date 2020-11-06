<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Skill</h5>
        <h6 class="card-subtitle mb-2 text-muted">Create record</h6>
        <hr>
        <form novalidate @submit.prevent="validateSkill" autocomplete="off">
          <div class="form-row mt-3">
            <div class="form-group col" :class="{ 'form-group--error': $v.form.skill.$error }">
              <label for="skill">Skill <span class="text-danger">*</span></label>
              <input type="text" id="skill" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.skill) }"
                     v-model.trim="$v.form.skill.$model">
              <div class="invalid-feedback" v-if="!$v.form.skill.required">Skill is required</div>
              <div class="invalid-feedback" v-if="!$v.form.skill.minLength">
                Skill must have at least {{ $v.form.skill.$params.minLength.min }} letters.
              </div>
              <div class="invalid-feedback" v-if="!$v.form.skill.maxLength">
                Skill must have at most {{ $v.form.skill.$params.maxLength.max }} letters.
              </div>
            </div>
          </div>
          <div class="form-row mt-2">
            <div class="form-group col" :class="{ 'form-group--error': $v.form.category.$error }">
              <label for="category">Skill category <span class="text-danger">*</span></label>
              <select id="category" class="form-control"
                     :class="{ 'is-invalid': validationStatus($v.form.category) }"
                     v-model.trim="$v.form.category.$model">
                <option></option>
                <option value="TECHNICAL">Technical</option>
                <option value="ATTITUDE">Attitude</option>
                <option value="FUNCTIONAL">Functional</option>
              </select>
              <div class="invalid-feedback" v-if="!$v.form.category.required">Category is required</div>
            </div>
          </div>

          <md-button type="submit">Create skill</md-button>
          <md-button><router-link to="/" class="nav-link">Cancel</router-link></md-button>
        </form>
      </div>
    </div>
    <div v-if="showSuccess">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Record saved!</h4>
        <p>Skill record has been saved.</p>
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
  name: "skill-form",

  mixins: [validationMixin],

  validations: {
    form: {
      skill: {
        required,
        minLength: minLength(3),
        maxLength: maxLength(50)
      },
      category: {
        required
      }
    }
  },

  data: () => ({
    form: {
      skill: null,
      category: null
    },
    showSuccess: false,
    message: ''
  }),

  methods: {
    validationStatus: (validation) => {
      return typeof validation === 'undefined' ? false : validation.$error
    },

    validateSkill () {
      this.$v.$touch()
      if (this.$v.$invalid) {
        // invalid-feedback validating
        console.log('failed skill validation')
      } else {
        console.log('passed skill validation')
        this.saveSkill()
      }
    },

    saveSkill () {
      axios
        .post(
          '/api/skills',
          {
            skill: this.form.skill,
            category: this.form.category,
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

    clearForm () {
      this.$v.$reset()
      this.skill = null
      this.category = null
    }
  },

}
</script>

<style scoped>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>
