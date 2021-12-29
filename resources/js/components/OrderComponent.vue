<template>
    <div class="flex justify-between w-full">
        <div>
            <food-category-component 
                :categories="categories"
                @setMenu="showMenu"
            />
        </div>
        <div>
            <food-menu-component 
                ref="foodMenu"
                @addOrder="addOrder"
            />
        </div>
        <div>
            <order-summary-component
                ref="orderSummary"
                :addOrder="addOrder"
            />
        </div>
    </div>
</template>

<script>
import CheckoutConfirmationModal from './extra/CheckoutConfirmationModal.vue'
export default {
  components: { CheckoutConfirmationModal },
    props:{
        categories:{
            type: Array,
            required: true,
        }
    },
    methods: {
        showMenu(menus){
            this.$refs.foodMenu.setNewMenu(menus)
        },
        addOrder(meal){
            this.$refs.orderSummary.addOrder(meal)
        }
    }
}
</script>