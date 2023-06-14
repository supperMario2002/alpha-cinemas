import './bootstrap';
import  router  from 'vue-router';
import { createApp } from 'vue';
import axios from 'axios';
window.axios = axios;

import App from '../js/App.vue';

import './static/fontawesome/css/all.min.css';
import 'bootstrap/dist/css/bootstrap-grid.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.min.css';

const app = createApp(App);
app.use(router);
app.mount('#app');