import { ref } from 'vue'
import axios from "axios";

export default function useOrders() {
    const orders = ref([])
    const order = ref([])

    const getOrders = async () => {
        let response = await axios.get('/api/orders')
        orders.value = response.data.data;
    }

    const getOrder = async (id) => {
        let response = await axios.get('/api/orders/' + id)
        order.value = response.data.data;
    }

    return {
        orders,
        order,
        getOrders,
        getOrder
    }
}
