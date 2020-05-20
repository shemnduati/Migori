import swal from "sweetalert2";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
import uniq from 'lodash/uniq'
window.uniq = uniq;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination', require('laravel-vue-pagination'));


import jsPDF from 'jspdf';

window.jsPDF = jsPDF;

import 'jspdf-autotable';


import  Gate from "./Gate";
Vue.prototype.$gate =  new Gate(window.user);
//sweetalert
import Swal from 'sweetalert2';
window.Swal = Swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;
window.Fire =  new Vue();


//VueRouter
import VueRouter from 'vue-router'
Vue.use(VueRouter)
let routes = [
    { path: '/dashboard',meta:{student:false}, component: require('./components/dashboard.vue').default },
    { path: '/users', component: require('./components/users.vue').default },
    { path: '/county', component: require('./components/County.vue').default },
    { path: '/ward', component: require('./components/Ward.vue').default },
    { path: '/configuration', component: require('./components/Configuration.vue').default },
    { path: '/verified', component: require('./components/Verified.vue').default },
    { path: '/CountyApps', component: require('./components/CountyStats.vue').default },
    { path: '/ScholarshipApps', component: require('./components/ScholarshipStat.vue').default },
    { path: '/subadmin', component: require('./components/subadmin.vue').default },
    { path: '/accountant', component: require('./components/Accountant.vue').default },
    { path: '/OfficialUser', component: require('./components/OfficialUser.vue').default },
    { path: '/Applicants', component: require('./components/Applicants.vue').default },
    { path: '/ScholarApplicants', component: require('./components/ScholarshipApp.vue').default },
    // { path: '/application', component: require('./components/Application.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    //{ path: '*', component: require('./components/NotFound.vue').default },
    { path: '/Information', component: require('./components/Information.vue').default },
    { path: '/budget', component: require('./components/budget.vue').default },
    { path: '/informationview/:applicationId', component: require('./components/Informationview.vue').default },
    { path: '/print/:serial', component: require('./components/Verifiedform.vue').default },
    { path: '/scholarship-admin', component: require('./components/ScholarshipAdmin.vue').default },
    { path: '/scholarship-admin-details/:applicationId', component: require('./components/ScholarshipAdminDetails.vue').default },


]

Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate',function(created){
    return moment(created).format('MMMM Do YYYY');
});
const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
})

//progressbar
import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

router.beforeEach((to, from, next) => {

    if (to.meta.student) {

        return next({path:'/student'}); // '/' is home page for example
        // else then continue to next()
    }

    return next();
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('not-found', require('./components/NotFound.vue').default);
Vue.component('application', require('./components/Application.vue').default);
Vue.component('verifiedform', require('./components/Verifiedform.vue').default);
Vue.component('mystatus', require('./components/status.vue').default);
Vue.component('terms', require('./components/terms.vue').default);
Vue.component('scholarship', require('./components/Scholarship.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data:{
        search:''
    },
    methods:{
        searchit:_.debounce(()=>{
            Fire.$emit('searching');
        },1000),

    }
});
