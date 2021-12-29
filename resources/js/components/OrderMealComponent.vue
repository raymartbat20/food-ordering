<template>
    <div class="mb-2">
        <span 
            class="bg-green-300 text-white rounded-md py-3 px-2 font-bold text-center cursor-pointer"
        >
            {{ order.name }} {{ order.qty }}
        </span>
    </div>
</template>

<script>
export default {
    props:{
        order:{
            type: Object,
            required: true,
        }
    },
    watch:{
        order:{
            deep: true,
            handler: function(newVal){
                console.log(newVal)
            }
        }
    },
}
</script>