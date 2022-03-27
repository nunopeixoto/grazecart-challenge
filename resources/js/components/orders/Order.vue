<template>
    <div class="bg-white shadow-sm sm:rounded-lg py-4 px-4">
        <div v-if="loading" class="text-center">
            <Loader></Loader>
        </div>
        <div v-else>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Order #{{order.id}}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Created at {{ order.created_at }} </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Customer</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <p> {{ order.customer_first_name }} {{ order.customer_last_name }} </p>
                                <p> {{ order.customer_email }} </p>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ order.status }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Total</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> ${{ order.total / 100 }} </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Products</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="pb-2" v-for="product in order.items" :key="product.id">
                                    <span> Item #{{product.id}} </span>
                                    <ul class="list-disc pl-4 ">
                                        <li> Title: {{ product.title }} </li>
                                        <li> Quantity: {{ product.quantity }} </li>
                                        <li> Unit: {{ product.unit_of_issue }} </li>
                                        <li> Subtotal: ${{ product.subtotal / 100 }} </li>
                                    </ul>
                                </div>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Total</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> ${{ order.total / 100 }} </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import useOrders from "../../composables/orders";
export default {
    props: ['orderId'],
    watch: {
        orderId(newId) {
            this.loading = true;
            this.order = this.getOrder(newId).then(() => {
                this.loading = false;
                this.renderedOrderId = newId;
            });
        }
    },
    setup() {
        const { order, getOrder } = useOrders();
        return {
            order,
            getOrder
        }
    },
    data() {
        return {
            renderedOrderId: null,
            loading: true
        }
    }
}
</script>
