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
        />
    </div>
</template>

<script>
    import FileUpload from './FileUpload.vue';
    import Input from './Input';

    export default {
        name: "Button",
        components: {
            Input,
            FileUpload
        },
        data() {
            return {
                form: {
                    title: null,
                    file: null
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
