<template>
    <div>
        <label class="w-full text-gray-800 text-sm ml-2 font-bold uppercase mb-1">{{ label }}</label>
        <input type="text" class="ml-4 w-full outline-none border ring-gray-500 focus:border-gray-800 py-2 px-4 rounded-3xl text-sm" :placeholder="placeholder" v-model="input">
    </div>
</template>

<script>
    export default {
        name: "Input",
        props: {
            label: String,
            placeholder: String,
            value: String
        },
        computed: {
            input: {
                get() {
                  return this.value;
                },
                set(newValue) {
                  this.$emit('input', newValue);
                }
            }
        }
    }
</script>
