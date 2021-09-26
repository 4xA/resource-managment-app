<template>
    <main class="mx-20 mt-10">
        <heading title="Admin View" />

        <Button
            text="Create Resource"
            icon="plus"
            @click="showCreateForm()"
            class="mb-4"
        />

        <simple-list
            :data="resourceList"
            :selectable="false"
            :editable="true"
            @edit="showEditForm"
            @delete="deleteResource"
        />

        <modal v-if="showModal" @hideModal="hideModal()">
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
                        @click="createResource()"
                    />
                </div>
            </template>
        </modal>

        <modal v-if="showEditModal" @hideModal="hideModal()">
            <template v-slot:header>
                <subheading title="Edit resource..." />
            </template>
            <template v-slot:body>
                <pdf-form
                    :resource="form"
                    v-if="page === 'pdf'"
                    @change="updateForm"
                />
                <html-form
                    :resource="form"
                    v-if="page === 'html'"
                    @change="updateForm"
                />
                <link-form
                    :resource="form"
                    v-if="page === 'link'"
                    @change="updateForm"
                />
            </template>
            <template v-slot:footer>
                <div class="float-right">
                    <Button
                        text="save"
                        @click="updateResource()"
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
            HtmlForm
        },
        data() {
            return {
                showModal: false,
                showEditModal: false,
                form: {
                    type: null,
                },
                page: null,
                resources: [],
                resourceList: []
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
            createResource () {
                let formData = new FormData();

                for (let key in this.form) {
                    formData.append(key, this.form[key]);
                }   

                axios.post(process.env.MIX_API_URL + '/resource/', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {
                        if (response.status === 201) {
                            this.hideModal();
                            this.refreshResources();
                        }
                    });
            },
            updateResource () {
                let formData = new FormData();

                for (let key in this.form) {
                    formData.append(key, this.form[key]);
                }

                formData.append('_method', 'PUT');

                axios.post(process.env.MIX_API_URL + '/resource/' + this.form.resource_id, formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {
                        if (response.status === 200) {
                            this.hideModal();
                            this.refreshResources();
                        }
                    });
            },
            deleteResource (name) {
                 axios.delete(process.env.MIX_API_URL + '/resource/' + name)
                    .then((response) => {
                        if (response.status === 204) {
                            this.refreshResources();
                        }
                    });               
            },
            showCreateForm () {
                this.form = {};
                this.showModal = true;
            },
            showEditForm (name) {
                this.showEditModal = true;
                axios.get(process.env.MIX_API_URL + '/resource/' + name)
                    .then((response) => {
                        if (response.status === 200) {
                            this.form = response.data.data;
                            this.page = this.form.type;
                        }
                    });
            },
            hideModal () {
                this.page = null;
                this.form.type = null;
                this.showModal = false;
                this.showEditModal = false;
            },
            refreshResources () {
                // TODO: extract all resource access logic to class
                axios.get(process.env.MIX_API_URL + '/resource')
                    .then((response) => {
                        if (response.status === 200) {
                            this.resourceList = [];
                            this.resources = response.data.data;

                            for (let resource of this.resources) {
                                this.resourceList.push({
                                    name: resource.resource_id,
                                    text: resource.title,
                                    icon: this.getIcon(resource.type)
                                });
                            }
                        }
                    });
            },
            getIcon (type) {
                switch (type) {
                    case 'pdf':
                        return 'file-pdf';
                    case 'html':
                        return 'file-code';
                    case 'link':
                        return 'link';
                }
                return '';
            }
        },
        created () {
            this.refreshResources(); 
        }
    }
</script>
