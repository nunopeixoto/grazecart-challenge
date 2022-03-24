require('./bootstrap');

import { createApp } from 'vue';
import OrdersContainer from './components/orders/OrdersContainer';
import OrdersList from './components/orders/OrdersList';
import Loader from './components/loader/Loader';

const app = createApp({});

app.component('OrdersContainer', OrdersContainer);
app.component('OrdersList', OrdersList);
app.component('Loader', Loader);
app.mount('#app');
