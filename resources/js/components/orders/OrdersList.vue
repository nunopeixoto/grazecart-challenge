<template>
    <div class="bg-white shadow-sm sm:rounded-lg border-b border-gray-200 h-70-full">
        <div class="border-b border-black">
            <h1 class="text-xl font-semibold  py-4 px-4"> All orders </h1>
        </div>
        <div v-if="loading" class="text-center py-2">
            <Loader></Loader>
        </div>
        <div v-else class="h-full">
            <div class="overflow-y-auto h-5/6">
                <div v-for="order in orders" :key="order.id" >
                    <article class="border-b border-gray py-4 px-4 hover:bg-gray-100 cursor-pointer" @click="selectOrder(order.id)" >
                        <p> Order #{{order.id}} </p>
                        <p> {{order.customer_first_name}} {{order.customer_last_name}} </p>
                        <p> ${{order.total / 100}} </p>
                    </article>
                </div>
            </div>
            <div class="py-2 px-2 flex justify-end flex items-center">
                <span
                    v-if="pagination.current_page > 1"
                    class="material-icons cursor-pointer hover:bg-gray-100 hover:rounded-full"
                    @click="previousPage()"
                >
                    navigate_before
                </span>
                <span class="mx-2"> Page {{ pagination.current_page }} of {{ pagination.last_page }} </span>
                <span
                    v-if="pagination.current_page < pagination.last_page"
                    class="material-icons cursor-pointer hover:bg-gray-100 hover:rounded-full"
                    @click="nextPage()"
                >
                    navigate_next
                </span>
            </div>
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
        const { orders, getOrders, pagination } = useOrders();
        return {
            orders,
            getOrders,
            pagination
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
        },
        nextPage() {
            const next = this.pagination.current_page + 1;
            this.loading = true;
            this.getOrders(next).then(() => {
                this.loading = false;
            });
        },
        previousPage() {
            const next = this.pagination.current_page - 1;
            this.loading = true;
            this.getOrders(next).then(() => {
                this.loading = false;
            });
        }
    }
}
</script>
