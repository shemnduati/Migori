import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        bursary: sessionStorage.getItem('bursary') ? JSON.parse(sessionStorage.getItem('bursary')) : [],
        orders: sessionStorage.getItem('orders') ? JSON.parse(sessionStorage.getItem('orders')) : [],
        user: sessionStorage.getItem('user') ? JSON.parse(sessionStorage.getItem('user')) : [],
        scholar: sessionStorage.getItem('scholar') ? JSON.parse(sessionStorage.getItem('scholar')) : [],
    },
    mutations: {
        SET_BURSARY(state, bursary){
            state.bursary = bursary
        },
        SAVE_BURSARY_DATA(state){
            window.sessionStorage.setItem('bursary', JSON.stringify(state.bursary));
        },
        SET_ORDERS(state, orders){
            state.orders = orders
        },
        SAVE_ORDERS_DATA(state){
            window.sessionStorage.setItem('orders', JSON.stringify(state.orders));
        },
        SET_USERS(state, user){
            state.user = user
        },
        SAVE_USER_DATA(state){
            window.sessionStorage.setItem('user', JSON.stringify(state.user));
        },
        SET_SCHOLARSHIP(state, scholar){
            state.scholar = scholar
        },
        SAVE_SCHOLARSHIP_DATA(state){
            window.sessionStorage.setItem('scholar', JSON.stringify(state.scholar));
        },
    },
    actions: {
        getAwarded({commit}) {
            try {
                axios.get('/api/getApp').then(data =>{
                    commit('SET_BURSARY', data.data);
                    commit('SAVE_BURSARY_DATA')
                })
            }catch (e) {
                throw new Error(e);
            }
        },
        getBursarySub({commit}) {
            try {
                axios.get('/api/getbusary').then(data =>{
                    commit('SET_BURSARY', data.data);
                    commit('SAVE_BURSARY_DATA')
                })
            }catch (e) {
                throw new Error(e);
            }
        },
        getUsers({commit}) {
            try {
                axios.get('/api/user').then(data =>{
                    commit('SET_USERS', data.data);
                    commit('SAVE_USER_DATA')
                })
            }catch (e) {
                throw new Error(e);
            }
        },
        getScholarshipSub({commit}) {
            try {
                axios.get('/api/scholarshipApps').then(data =>{
                    commit('SET_SCHOLARSHIP', data.data);
                    commit('SAVE_SCHOLARSHIP_DATA')
                })
            }catch (e) {
                throw new Error(e);
            }
        },
        getBursaryOfficial({commit}) {
            try {
                axios.get('/api/getCountyBursary').then(data =>{
                    commit('SET_BURSARY', data.data);
                    commit('SAVE_BURSARY_DATA')
                })
            }catch (e) {
                throw new Error(e);
            }
        }

    },
    modules: {},
    getters: {}
})
