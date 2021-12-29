<template>
    <div>
        <checkout-confirmation-modal 
            v-if="checkingOut"
            :totalPrice="totalPrice"
            @closeModal="closeModal"
            @submit="checkOut"
        />
        <heading-component 
            v-if="!hasOrders"
            text="ADD AN ORDER"
        />
        <div v-else class="flex flex-col">
            <heading-component
                text="LIST OF ORDERS"
            />
            <div
             v-for="order in orders"
             :key="order.id"
             class="mb-2 flex justify-between"
             >
                <p class="bg-green-300 text-white rounded-md py-3 px-2 font-bold text-center cursor w-52">{{ order.name }} {{ order.qty }}x</p>
                <button
                 class="bg-red-500 text-white ml-1 py-3 px-2 font-bold rounded-lg cursor-pointer w-10"
                 @click="reduceOrder(order)"
                >X</button>
            </div>
            <h2 v-if="hasOrders" class="bg-blue-500 mb-1 text-white rounded-md py-3 px-2 font-bold text-center">Total Items: {{ totalItems }}</h2>
            <h2 v-if="hasOrders" class="bg-blue-500 mb-1 text-white rounded-md py-3 px-2 font-bold text-center">Tax: {{ displayTax }}</h2>
            <h2 v-if="hasOrders" class="bg-blue-500 mb-1 text-white rounded-md py-3 px-2 font-bold text-center">Total Price: {{ displayPrice }}</h2>
            <button @click="showCheckoutModal" v-if="hasOrders" class="bg-green-500 mb-1 text-white rounded-md py-3 px-2 font-bold text-center cursor-pointer">CHECKOUT</button>
        </div>
    </div>
</template>

<script>
import HeadingComponent from './extra/HeadingComponent.vue'
import OrderMealComponent from './OrderMealComponent.vue';
export default {
    components: { HeadingComponent, OrderMealComponent },
    data(){
        return {
            orders: [],
            totalItems: 0,
            tax: 0,
            totalPrice: 0,
            checkingOut: false,
        }
    },
    computed:{
        displayPrice(){
            return this.totalPrice.toFixed(2);
        },
        displayTax(){
            return this.tax.toFixed(2)
        },
        hasOrders(){
            return this.orders.length
        }
    },
    watch:{
        orders:{
            handler: function(val){
                console.log(val);
            },
            deep: true
        }
    },
    methods:{
        addOrder(meal){
            let mealOrdered = this.orders.find(order => order.id === meal.id);
            if(mealOrdered) mealOrdered.qty += 1;
            else{
                meal.qty = 1;
                this.orders.push(meal);
            }
            this.addOrderCompute(meal);
        },
        reduceOrder(meal){
            let mealOrdered = this.orders.find(order => order.id === meal.id)
            if(mealOrdered){
                if(mealOrdered.qty === 1){
                    const orderIndex = this.orders.findIndex(order => order.id === meal.id)
                    this.reduceOrderCompute(mealOrdered);
                    this.orders.splice(orderIndex,1);
                } else {
                    this.reduceOrderCompute(mealOrdered);
                }
            }
        },
        reduceOrderCompute(meal){
            meal.qty -= 1;
            this.totalItems -= 1;
            this.tax -= meal.price * (meal.tax / 100);
            let mealPriceWithTax = meal.price + (meal.tax / 100);
            this.totalPrice -= meal.price + mealPriceWithTax;
        },
        addOrderCompute(meal){
            this.totalItems += 1;
            this.tax +=  meal.price * (meal.tax / 100);
            let mealPriceWithTax = meal.price + (meal.tax / 100);
            this.totalPrice += meal.price + mealPriceWithTax;
        },
        checkOut(paymentDetails){
            let payload = new FormData();
            let ordersPayload = [];
            this.orders.forEach(order => {
                ordersPayload.push({
                    id: order.id,
                    name: order.name,
                    price: order.price,
                    tax: order.tax,
                    qty: order.qty,
                });
            });

            payload.append('orders', JSON.stringify(ordersPayload));
            payload.append('total_price',this.totalPrice);
            payload.append('tax',this.tax);
            payload.append('total_items',this.totalItems);
            payload.append('customer_name',paymentDetails.customerName);
            payload.append('amount_tendered',paymentDetails.amountTendered);
            payload.append('coupon_used',paymentDetails.coupon)
            payload.append('change',paymentDetails.change)

            axios.post('/order/checkout',payload,{
                header:{
                    'accept': 'application/json',
                    'Content-Type': 'application/json'
                },
            })
            .then(res => {
                if(res.data.status){
                    this.$swal({
                        icon: 'success',
                        title: 'Order Success',
                        text: 'You will be redirected on the order summary!'
                    })
                    this.orders = [];
                    this.totalItems = 0;
                    this.tax = 0;
                    this.totalPrice = 0;
                    this.checkingOut = false;
                    setTimeout(function(){
                        window.location.href = `/order/${res.data.order_id}`
                    },1000)
                }
            })
        },
        closeModal(){
            this.checkingOut = false;
        },
        showCheckoutModal(){
            this.checkingOut = true;
        },
        nameChange(newVal){
            console.log(newVal);
            this.customerName = newVal;
        },
        submit(customerName){

        }

    }
}
</script>