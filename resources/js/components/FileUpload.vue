<template>
    <div class="w-full">
        <label class="w-3/4 mx-auto flex flex-col items-center px-4 py-6 bg-white text-green-600 rounded-lg shadow-lg uppercase border border-green-900 cursor-pointer hover:bg-green-600 hover:text-white">
            <font-awesome-icon icon="upload" />
            <span class="mt-2 text-base leading-normal" v-text="label"></span>
            <input type="file" ref="file" class="hidden" v-on:change="handleFileUpload()" />
        </label>
    </div>
</template>

<script>
    export default {
        name: "FileUpload",
        props: {
            value: File,
            url: String
        },
        data () {
            return {
                file: null,
                label: 'Select a File'
            };
        },
        methods: {
            handleFileUpload () {
                this.file = this.$refs.file.files[0];
                this.label = this.file.name;
                this.input = this.file;
            }
        },
        mounted() {
            if (this.url) {
                this.label = this.url;
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
