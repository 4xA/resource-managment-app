<template>
    <button 
        class="rounded-lg transition-colors duration-300 px-8 py-1 border-0 outline-none text-white uppercase text-sm"
        :class="theme"
        @click="$emit('click')"
    >
        {{ text }}
    </button>
</template>

<script>
    export default {
        name: "Button",
        props: {
            text: String,
            type: String
        },
        data() {
            return {
                theme: this.getTheme()
            };
        },
        methods: {
            getTheme() {
                if (this.type === 'primary') {
                    return 'bg-green-600 hover:bg-green-800 ';
                } else if (this.type === 'danger') {
                    return 'bg-red-600 hover:bg-red-800 ';
                } else {
                    return 'bg-gray-600 hover:bg-gray-800 ';
                }
            }
        }
    }
</script>
