<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!--
            Background overlay, show/hide based on modal state.

            Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
            Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!--
            Modal panel, show/hide based on modal state.

            Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
            Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <!-- Heroicon name: outline/exclamation -->
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Please provide the following details
                    </h3>
                    <div class="mt-2">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Customer Name
                            </label>
                            <input
                            required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text"
                            placeholder="Customer Name"
                            v-model="customerName"
                            >
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Total Price
                            </label>
                            <input
                            required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text"
                            placeholder="Total Price"
                            readonly
                            :value="newTotalPrice.toFixed(2)"
                            >
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Amount Tendered
                            </label>
                            <input
                            required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text"
                            placeholder="Amount Tendered"
                            v-model="amountTendered"
                            >
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Change
                            </label>
                            <input
                            required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text"
                            placeholder="Customer Name"
                            readonly
                            :value="amountTendered ? computedChange : 0"
                            >
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Coupon
                            </label>
                            <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text"
                            placeholder="Coupon"
                            v-model="coupon"
                            >
                            <small class="text-green-700" v-if="couponStatus">{{ couponStatus }}</small>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button
                 :disabled="disabledCheckoutButton"
                  type="button"
                  v-bind:class="{'cursor-not-allowed': disabledCheckoutButton}"
                  class="w-full
                  inline-flex justify-center
                  rounded-md border border-transparent
                  shadow-sm px-4 py-2 bg-green-600
                  text-base font-medium text-white
                  hover:bg-red-700 focus:outline-none
                  focus:ring-2 focus:ring-offset-2 focus:ring-red-500
                  sm:ml-3 sm:w-auto sm:text-sm"
                  @click="submit"
                >
                    Check Out
                </button>
                <button 
                 @click="closeModal"
                 type="button"
                 class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
            </div>
        </div>
    </div>
</template>
F
<script>
import _ from 'lodash'
import { getDecimalValue } from '../../helpers.js'
export default {
    props: {
        totalPrice:{
            type: Number,
            required: true,
        }
    },
    data(){
        return{
            customerName: '',
            amountTendered: '',
            coupon: '',
            disabledCheckoutButton: false,
            couponStatus: null,
            newTotalPrice: 0,
            discountedPrice: 0,
        }
    },
    computed:{
        computedChange(){
            return (this.amountTendered - this.newTotalPrice).toFixed(2);
        }
    },
    watch: {
        coupon: function (val) {
            if(val !== ''){
                this.checkCoupon();
            } else {
                this.resetDiscount();
            }
        },
    },
    methods:{
        submit(){
            if(this.customerName === ''){
                this.$swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: `Please provide a customer name!`,
                })
                return;
            }

            if(this.computedChange >= 0 && this.amountTendered !== ''){
                this.$emit('submit',{
                    customerName: this.customerName,
                    change: this.computedChange,
                    amountTendered: this.amountTendered,
                    coupon: this.coupon || null
                });
                this.closeModal();
            } else {
                this.$swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: `The amount tendered is not enough!`,
                })
            }
        },
        checkCoupon: _.debounce(function () {
            this.disabledCheckoutButton = true;
            if(this.coupon !== ''){
                axios.post('check-coupon',{
                    'coupon': this.coupon,
                })
                .then(res => {
                    if(res.data.status){
                        let discountedPrice = this.totalPrice * getDecimalValue(res.data.coupon.discount);
                        this.discountedPrice = discountedPrice;
                        this.newTotalPrice = this.totalPrice - discountedPrice;
                        this.couponStatus = `A coupon is available and there is a ${res.data.coupon.discount}% discount`;
                    } else {
                        if(this.discountedPrice){
                            this.resetDiscount();
                        }
                        this.$swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: `${res.data.message}!`,
                        })
                    }
                    this.disabledCheckoutButton = false;
                })
            }
        },1500),
        resetDiscount(){
            this.newTotalPrice += this.discountedPrice
            this.discountedPrice = 0;
            this.couponStatus = null;
        },
        closeModal(){
            this.$emit('closeModal')
        },
        resetData(){
            this.customerName = '';
            this.amountTendered = '';
            this.coupon = '';
            this.disabledCheckoutButton = false;
            this.couponStatus = null;
            this.newTotalPrice = 0;
            this.discountedPrice = 0;
        }
    },
    mounted(){
        this.newTotalPrice = this.totalPrice;
    }
}
</script>