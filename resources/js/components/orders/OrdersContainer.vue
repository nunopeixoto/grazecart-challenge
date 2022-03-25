<template>
    <div class="grid grid-cols-3 gap-4 py-12">
        <div class="ml-24">
            <OrdersList @update-order="updateOrder"></OrdersList>
        </div>
        <div class="col-span-2 ml-4 mr-24">
            <Order
                :orderId="selectedOrderId"
            ></Order>
        </div>
    </div>
</template>

<script>

import OrdersList from "./OrdersList";
import Order from "./Order";
export default {
    name: 'OrdersContainer',
    components: {
        OrdersList,
        Order
    },
    data() {
        return {
            selectedOrderId: null
        }
    },
    methods: {
        updateOrder (id) {
            this.selectedOrderId = id;
        }
    }
}
</script>
