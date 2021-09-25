<template>
    <main class="mx-20 mt-10">
        <heading title="Admin View" />

        <Button
            text="Create Resource"
            icon="plus"
            @click="showModal = true"
        />

        <modal v-if="showModal" @hideModal="showModal=false">
            <template v-slot:header>
                <subheading v-if="page === null" title="Select resource type..." />
                <subheading v-if="page !== null" title="Please fill fields..." />
            </template>
            <template v-slot:body>
                <simple-list
                    @selected="selectResource"
                    v-if="page === null"
                    :data="[
                        {
                            name: 'pdf',
                            text: 'PDF Resource',
                            icon: 'file-pdf'
                        },
                        {
                            name: 'html',
                            text: 'HTML Snippet Resource',
                            icon: 'file-code'
                        },
                        {
                            name: 'link',
                            text: 'Link Resource',
                            icon: 'link'
                        },
                    ]"
                />
                <pdf-form
                    v-if="page === 'pdf'"
                    @change="updateForm"
                />
                <html-form
                    v-if="page === 'html'"
                    @change="updateForm"
                />
                <link-form
                    v-if="page === 'link'"
                    @change="updateForm"
                />
            </template>
            <template v-slot:footer>
                <div class="float-right">
                    <Button
                        v-if="page === null"
                        text="next"
                        @click="selectForm()"
                    />
                    <Button
                        v-if="page !== null"
                        text="create"
                        @click="saveForm()"
                    />
                </div>
            </template>
        </modal>
    </main>
</template>

<script>
    import Heading from '../../components/Heading';
    import Modal from '../../components/Modal';
    import Button from '../../components/Button';
    import SimpleList from '../../components/SimpleList';
    import PdfForm from '../../components/PdfForm';
    import HtmlForm from '../../components/HtmlForm';

    export default {
        components: {
            Heading,
            Modal,
            Button,
            SimpleList,
            PdfForm,
            HtmlForm,
        },
        data() {
            return {
                showModal: false,
                form: {
                    type: null,
                },
                page: null
            }
        },
        methods: {
            selectResource (type) {
                this.form.type = type;
            },
            selectForm () {
                if (this.form.type === null) {
                    return;
                }
                this.page = this.form.type;
            },
            updateForm (form) {
                this.form = {
                    ...this.form,
                    ...form
                };
            },
            saveForm () {

            }
        }
    }
</script>
