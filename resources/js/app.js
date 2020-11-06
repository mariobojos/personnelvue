require('./bootstrap');
// window.moment = require('moment');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import MdApp from 'vue-material/dist/components/MdApp';
import MdButton from 'vue-material/dist/components/MdButton';
import MdCard from 'vue-material/dist/components/MdCard';
import MdContent from 'vue-material/dist/components/MdContent';
import MdDatepicker from 'vue-material/dist/components/MdDatepicker';
import MdDialog from 'vue-material/dist/components/MdDialog';
import MdDrawer from 'vue-material/dist/components/MdDrawer';
import MdField from 'vue-material/dist/components/MdField';
import MdIcon from 'vue-material/dist/components/MdIcon';
import MdList from 'vue-material/dist/components/MdList';
import MdMenu from 'vue-material/dist/components/MdMenu';
import MdSnackbar from 'vue-material/dist/components/MdSnackbar';
import MdToolbar from 'vue-material/dist/components/MdToolbar';
// import { MdApp, MdButton, MdCard, MdContent, MdDatepicker, MdDrawer, MdField, MdIcon, MdList, MdMenu, MdSnackbar, MdToolbar }
// import { MdApp, MdButton, MdCard, MdContent, MdDatepicker, MdDrawer, MdField, MdIcon, MdList, MdMenu, MdSnackbar, MdToolbar }
//   from 'vue-material/dist/components';
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

Vue.use(VueRouter);

Vue.use(MdApp);
Vue.use(MdButton);
Vue.use(MdCard);
Vue.use(MdContent);
Vue.use(MdDatepicker);
Vue.use(MdDialog);
Vue.use(MdDrawer);
Vue.use(MdField);
Vue.use(MdIcon);
Vue.use(MdList);
Vue.use(MdMenu);
Vue.use(MdSnackbar);
Vue.use(MdToolbar);

import FormValidation from './components/FormValidation.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import BaseLayout from './components/BaseLayout.vue';
import MainLayout from './components/MainLayout.vue';
import PersonnelList from './components/personnel/PersonnelList.vue';
import PersonnelForm from './components/personnel/PersonnelForm.vue';
import EmployeeForm from "./components/personnel/EmployeeForm";
import SkillForm from "./components/skill/SkillForm";
import NotFound from './components/NotFound.vue';

const router = new VueRouter({
  routes: [
    // { path: '/', component: ExampleComponent },
    // { path: '/', component: MainLayout },
    {path: '/', component: BaseLayout, name: 'home'},
    {path: '/add', component: PersonnelForm},
    {path: '/addSkill', component: SkillForm},
    {path: '/example', component: FormValidation},
    {path: '/emp', component: EmployeeForm},
    {path: '/empList', component: PersonnelList},
    {path: '*', component: NotFound},
  ],

  mode: 'history',

});

const app = new Vue({
  router,

  el: '#app',

  components: {
    FormValidation,
    ExampleComponent,
    BaseLayout,
    MainLayout,
    PersonnelForm,
    PersonnelList,
    SkillForm,
    EmployeeForm,
    NotFound
  },

  data: {
    title: ''
  },

  methods: {}
}).$mount('#app');
