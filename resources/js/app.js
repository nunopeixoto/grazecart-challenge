require('./bootstrap');

import { createApp } from 'vue';
import OrdersContainer from './components/orders/OrdersContainer';
import OrdersList from './components/orders/OrdersList';
import Order from './components/orders/Order';
import Loader from './components/loader/Loader';

const app = createApp({});

app.component('OrdersContainer', OrdersContainer);
app.component('OrdersList', OrdersList);
app.component('Order', Order);
app.component('Loader', Loader);
app.mount('#app');
