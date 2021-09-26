<template>
    <div>
        <h2 class="w-full text-gray-800 text-sm ml-2 font-bold uppercase mb-1">{{ label }}</h2>
        <span class="ml-4 w-full text-sm">
            {{ value }}
        </span>
    </div>
</template>

<script>
    export default {
        name: "InputView",
        props: {
            label: String,
            value: String
        },
    }
</script>
