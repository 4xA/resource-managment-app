<template>
    <main class="mx-20 mt-10 w-1/3">
        <heading :title="this.form.title" />

        <div v-if="this.form.type === 'link'">
            <input-view
                label="Link Title"
                :value="this.form.title"
            />
            <url-view
                label="Link URL"
                :value="this.form.url"
                :isOpenNewTab="this.form.isOpenNewTab"
            />
        </div>

        <div v-if="this.form.type === 'html'">
             <input-view
                label="HTML Snippet Title"
                :value="this.form.title"
            />
            <input-view
                label="HTML Snippet Description"
                :value="this.form.description"
            />
            <text-area
                label="HTML Snippet"
                :value="this.form.snippet"
                :readonly="true"
            />
            <Button
                text="Copy Html"
                icon="copy"
                class="ml-4 float-right"
                id="copybutton"
                @click="copyHtml"
            />
            <tooltip
                v-if="showCopiedTooltip"
                label="HTML Copied"
                domElementId="copybutton"
                placement="right"
            />
        </div>


        <div v-if="this.form.type === 'pdf'">
            <input-view
                label="PDF Title"
                :value="this.form.title"
            />
            <url-view
                label="PDF URL"
                :value="this.form.url"
                :isOpenNewTab="true"
            />
        </div>
    </main>
</template>



<script>
    import Heading from '../../../components/Heading';
    import InputView from '../../../components/InputView';
    import UrlView from '../../../components/UrlView';
    import TextArea from '../../../components/TextArea';
    import Button from '../../../components/Button';
    import Tooltip from '../../../components/Tooltip';

    export default {
        components: {
            Heading,
            InputView,
            UrlView,
            TextArea,
            Button,
            Tooltip
        },
        props: {
            resource: Object
        },
        data () {
            return {
                form: this.parseResource(),
                showCopiedTooltip: false
            }
        },
        methods: {
            copyHtml () {
                navigator.clipboard.writeText(this.form.snippet)
                    .then(() => {
                        this.showCopiedTooltip = true;
                    });
            },
            parseResource () {
                let form = {
                    title: this.resource.title,
                    type: this.resource.type
                };

                switch (this.resource.type) {
                    case 'link':
                        form = {
                            ...form,
                            url: this.resource.link,
                            isOpenNewTab: this.resource.is_open_new_tab
                        };
                        break;
                    case 'html':
                        form = {
                            ...form,
                            description: this.resource.description,
                            snippet: this.resource.snippet
                        };
                        break;               
                    case 'pdf':
                        form = {
                            ...form,
                            url: this.resource.url
                        };
                        break;               
                    default:
                        break;
                }

                return form;
            }
        }
    }
</script>
