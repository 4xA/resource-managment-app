<template>
    <main class="mx-20 mt-10">
        <heading title="Vistor View" />

        <simple-list
            :data="resourceList"
            @selected="showResource"
        />
    </main>
</template>

<script>
    import Heading from '../../../components/Heading';
    import SimpleList from '../../../components/SimpleList';

    export default {
        components: {
            Heading,
            SimpleList,
        },
        props: {
            resources: Array
        },
        data () {
            return {
                resourceList: this.parseResources()
            }
        },
        methods: {
            parseResources () {
                // TODO: extract all resource access logic to class
                let resourceList = [];

                for (let resource of this.resources) {
                    resourceList.push({
                        name: resource.resource_id,
                        text: resource.title,
                        icon: this.getIcon(resource.type)
                    });
                }

                return resourceList;
            },
            showResource (name) {
                // TODO: Create a routes enum
                window.location.href = process.env.MIX_APP_URL + '/resource/' + name;
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
        }
    }
</script>
