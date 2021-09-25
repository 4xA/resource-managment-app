<template>
    <div>
        <Input
            label="Title"
            placeholder="Title"
            v-model="form.title"
            class="mb-4"
        />
        <text-area
            label="Description"
            placeholder="Snippet description"
            v-model="form.description"
            class="mb-4"
        />
        <text-area
            label="HTML Snippet"
            placeholder="HTML Snippet"
            v-model="form.snippet"
        />
    </div>
</template>

<script>
    import Input from './Input';
    import TextArea from './TextArea.vue';

    export default {
        name: "HtmlForm",
        props: {
            resource: Object
        },
        components: {
            Input,
            TextArea
        },
        data() {
            return {
                form: {
                    title: this.resource ? this.resource.title : '',
                    description: this.resource ? this.resource.description : '',
                    snippet: this.resource ? this.resource.snippet : ''
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
