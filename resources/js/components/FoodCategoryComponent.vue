<template>
    <div class="flex justify-between w-full">
        <div class="flex flex-col">
            <h1 class="font-extrabold tracking-wide text-black mb-5">SELECT A FOOD CATEGORY</h1>
            <button 
                v-for="category in categories"
                :key="category.id"
                class="bg-green-300 mb-2 text-white rounded-md py-3 px-2 font-bold text-center cursor-pointer"
            >
                {{ category.category_name }}
            </button>
        </div>
        <div>
            <h1>This is the order menu</h1>
        </div>
        <div>
            <h1>This is the order summary</h1>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            categories: {
                type: Array,
                required: true,
            }
        },
    }
</script>
