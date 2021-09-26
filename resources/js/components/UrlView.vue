<template>
    <div>
        <h2 class="w-full text-gray-800 text-sm ml-2 font-bold uppercase mb-1">{{ label }}</h2>
        <span class="ml-4 w-full text-sm">
            <a
                :target="isOpenNewTab ? '_blank' : ''"
                :href="value"
                class="text-blue-800"
            >
                    {{ value }}
            </a>
        </span>
    </div>
</template>

<script>
    export default {
        name: "UrlView",
        props: {
            label: String,
            value: String,
            isOpenNewTab: {
                type: Boolean,
                default: false
            }
        },
    }
</script>
