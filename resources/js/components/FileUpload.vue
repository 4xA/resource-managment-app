<template>
    <div class="w-full">
        <label ref="label" class="w-3/4 mx-auto flex flex-col items-center px-4 py-6 bg-white text-green-600 rounded-lg shadow-lg uppercase border border-green-900 cursor-pointer hover:bg-green-600 hover:text-white">
            <font-awesome-icon icon="upload" />
            <span class="mt-2 text-base leading-normal">Select a file</span>
            <input type="file" ref="file" class="hidden" v-on:change="handleFileUpload()" />
        </label>
    </div>
</template>

<script>
    export default {
        name: "FileUpload",
        props: {
            value: File
        },
        data () {
            return {
                file: null
            };
        },
        methods: {
            handleFileUpload () {
                this.file = this.$refs.file.files[0];
                this.$refs.label.innerHTML = this.file.name;
                this.input = this.file;
            }
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
