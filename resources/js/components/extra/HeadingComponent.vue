<template>
    <h1 class="font-extrabold tracking-wide text-black mb-5">
        {{ text }}
    </h1>
</template>

<script>
export default {
    props:{
        text: {
            type: String,
            required: true,
        }
    }
}
</script>