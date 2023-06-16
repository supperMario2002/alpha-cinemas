import './bootstrap';
import  router  from '../js/router/router.js';
import { createApp } from 'vue';
import Antd from 'ant-design-vue';
import axios from 'axios';


window.axios = axios;

import App from '../js/App.vue';

import 'ant-design-vue/dist/antd.css';
import './static/fontawesome/css/all.min.css';
import 'bootstrap/dist/css/bootstrap-grid.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';


const app = createApp(App);
app.use(router);
app.use(Antd);
app.mount('#app');