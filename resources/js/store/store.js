import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        bursary: sessionStorage.getItem('bursary') ? JSON.parse(sessionStorage.getItem('bursary')) : [],
        orders: sessionStorage.getItem('orders') ? JSON.parse(sessionStorage.getItem('orders')) : [],
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
        }
    },
    actions: {
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
