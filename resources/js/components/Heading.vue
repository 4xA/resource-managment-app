<template>
    <h1 class="text-gray-700 text-3xl font-bold uppercase mb-10">
        {{ title }}
    </h1>
</template>

<script>
    export default {
        name: "Heading",
        props: {
            title: String
        }
    }
</script>
