<template>
    <div class="flex flex-col">
        <heading-component 
            text="SELECT A FOOD CATEGORY"
        />
        <button 
            v-for="category in categories"
            :key="category.id"
            class="bg-green-300 mb-2 text-white rounded-md py-3 px-2 font-bold text-center cursor-pointer"
            @click="setMenu(category)"
        >
            {{ category.category_name }}
        </button>
    </div>
</template>

<script>
import HeadingComponent from './extra/HeadingComponent.vue';
    export default {
  components: { HeadingComponent },
        props: {
            categories: {
                type: Array,
                required: true,
            }
        },
        methods:{
            setMenu(category){
                this.$emit('setMenu',category.menus);
            }
        }
    }
</script>
