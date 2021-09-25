<template>
    <div>
        <Input
            label="Title"
            placeholder="Title"
            v-model="form.title"
            class="mb-4"
        />
        <Input
            label="Link"
            placeholder="Link"
            v-model="form.link"
            class="mb-4"
        />
        <checkbox label="Open in new tab?" v-model="form.is_open_new_tab" />
    </div>
</template>

<script>
import Input from "./Input";
import TextArea from "./TextArea";
import Checkbox from "./Checkbox";

export default {
    name: "LinkForm",
    components: {
        Input,
        TextArea,
        Checkbox
    },
    data() {
        return {
            form: {
                title: null,
                link: null,
                is_open_new_tab: false
            }
        };
    },
    watch: {
        form: {
            handler() {
                this.$emit("change", this.form);
            },
            deep: true
        }
    }
};
</script>
