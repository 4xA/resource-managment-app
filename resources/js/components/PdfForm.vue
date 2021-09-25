<template>
    <div>
        <Input
            label="Title"
            placeholder="Title"
            v-model="form.title"
            class="mb-4"
        />
        <file-upload
            v-model="form.file"
            :url="form.url"
        />
    </div>
</template>

<script>
    import FileUpload from './FileUpload.vue';
    import Input from './Input';

    export default {
        name: "Button",
        props: {
            resource: Object
        },
        components: {
            Input,
            FileUpload
        },
        data() {
            return {
                form: {
                    title: this.resource ? this.resource.title : '',
                    file: null,
                    url: this.resource ? this.resource.url : ''
                }
            }
        },
        watch: {
            form: {
                handler () {
                    this.$emit('change', this.form);
                },
                deep: true
            }
        }
    }
</script>
