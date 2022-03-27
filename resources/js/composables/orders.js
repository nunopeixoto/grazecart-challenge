import { ref } from 'vue'
import axios from "axios";

export default function useOrders() {
    const orders = ref([])
    const order = ref([])
    const pagination = ref([])

    const getOrders = async (page) => {
        let response = await axios.get('/api/orders', {
            params : {
                page: page ? page : 1
            }
        });
        orders.value = response.data.data;
        pagination.value = response.data.meta;
    }

    const getOrder = async (id) => {
        let response = await axios.get('/api/orders/' + id)
        order.value = response.data.data;
    }

    return {
        orders,
        order,
        getOrders,
        getOrder,
        pagination
    }
}
