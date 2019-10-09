import "core-js/stable";
import "regenerator-runtime/runtime";
import Vue from 'vue'
import store from './store'
import Home from './views/Home'
import ChooseCoffee from './views/ChooseCoffee'

new Vue({
    el: '#app',
    store,
    components: {
        Home,
        ChooseCoffee
    }
});