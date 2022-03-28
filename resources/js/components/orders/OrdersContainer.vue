<template>
    <div class="gap-4 py-12 px-12 grid grid-cols-1 md:px-0 md:grid-cols-3">
        <div class="ml-8 xl:ml-24">
            <OrdersList @update-order="updateOrder"></OrdersList>
        </div>
        <div class="ml-8 md:col-span-2 md:mr-24 xl:mr-24 md:block">
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
