<template>
    <div>
        <h2 class="w-full text-gray-800 text-sm ml-2 font-bold uppercase mb-1">{{ label }}</h2>
        <textarea class="ml-4 w-1/4 text-sm" v-model="value">
        </textarea>
    </div>
</template>

<script>
    export default {
        name: "HtmlSnippetView",
        props: {
            label: String,
            value: String
        },
    }
</script>
