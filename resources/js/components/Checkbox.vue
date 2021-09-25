<template>
    <label class="inline-flex items-center ml-4">
        <input
            type="checkbox"
            class="form-checkbox h-5 w-5 text-gray-600"
            v-model="input"
        >
        <span class="ml-2 text-gray-700">{{ label }}</span>
    </label>
</template>

<script>
    export default {
        name: "Checkbox",
        props: {
            label: String,
            value: Boolean
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
