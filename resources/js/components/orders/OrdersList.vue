<template>
    <div class="bg-white shadow-sm sm:rounded-lg border-b border-gray-200 h-screen">
        <h1 class="border-b border-black text-xl font-semibold  py-4 px-4"> All orders </h1>
        <div v-if="loading" class="text-center py-2">
            <Loader></Loader>
        </div>
        <div v-else class="overflow-y-auto h-full">
            <div v-for="order in orders" :key="order.id" >
                <article class="border-b border-gray py-4 px-4 hover:bg-gray-100 cursor-pointer" @click='selectOrder(order.id)' >
                    <p> Order #{{order.id}} </p>
                    <p> {{order.customer_first_name}} {{order.customer_last_name}} </p>
                    <p> ${{order.total / 100}} </p>
                </article>
            </template>
        </div>
    </div>
</template>

<script>
import useOrders from "../../composables/orders";
export default {
    data() {
        return {
            loading: true,
            orders: []
        }
    },
    setup() {
        const { orders, getOrders } = useOrders();
        return {
            orders,
            getOrders
        }
    },
    mounted() {
        this.orders = this.getOrders().then(() => {
            this.loading = false;
            if (this.orders.length) {
                this.$emit('update-order', this.orders[0].id);
            }
        });
    },
    emits: {
        'update-order': Number
    },
    methods: {
        selectOrder(id) {
            this.$emit('update-order', id);
        }
    }
}
</script>
