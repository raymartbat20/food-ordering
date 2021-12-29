<template>
    <div class="flex justify-between w-full">
        <div class="flex flex-col">
            <heading-component
                v-if="!menus.length"
                text="SELECT A FOOD CATEGORY FIRST TO VIEW AVAILABLE MENUS" 
            />
            <div v-else class="flex flex-col">
                <heading-component 
                    text="HERE ARE THE AVAILABLE MENUS"
                />
                <div
                 v-for="menu in menus"
                 :key="menu.id"
                 class="bg-green-300 mb-2 text-white rounded-md py-3 px-2 font-bold text-center cursor-pointer"
                 @click="addOrder(menu)"
                >
                    <p class="bg-green-300 mb-2 text-white rounded-md py-3 px-2 font-bold">{{ menu.name }}</p>
                    <p>₱{{ menu.price }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import HeadingComponent from './extra/HeadingComponent.vue';
export default {
  components: { HeadingComponent },
    data(){
        return{
            menus: [],
        }
    },
    methods:{
        setNewMenu(newMenu){
            this.menus = newMenu;
        },
        addOrder(meal){
            this.$emit('addOrder',meal)
        }
    },
    mounted(){
        console.log("I'm the food menu component being mounted")
    }
}
</script>