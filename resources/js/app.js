require('./bootstrap');

import Vue from 'vue';
import axios from 'axios';

let app = new Vue({
    el: '#app',
    data: {
        user: [],
    },
    mounted() {
        axios.get('http://127.0.0.1:8000/api/user')
        .then( (response) => {
            console.log(response);
        } );
    }
});
