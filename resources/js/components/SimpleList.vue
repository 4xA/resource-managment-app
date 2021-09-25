<template>
    <ul>
        <li
            v-for="item in data"
            v-bind:key="item.name"
            :name="item.name"
            class="cursor-pointer py-2 px-2 my-1 hover:bg-gray-200 transition-colors duration-300 flex items-center"
            :class="item.name === selected ? 'bg-gray-200' : ''"
            @click="setSelected(item.name)"
        >
            <font-awesome-icon :icon="item.icon" class="mr-3 text-gray-600" />
            {{item.text}}

            <div class="flex-grow" v-if="editable">
                <div class="float-right">
                    <Button
                        icon="edit"
                        type="primary"
                        @click="$emit('edit', item.name)"
                    />
                    <Button
                        icon="trash"
                        type="danger"
                        @click="$emit('delete', item.name)"
                    />
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    import Button from './Button';

    export default {
        name: "SimpleList",
        components: {
            Button
        },
        props: {
            data: Array,
            selectable: {
                type: Boolean,
                default: true
            },
            editable: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                selected: null,
            }
        },
        methods: {
            setSelected (name) {
                if (this.selectable) {
                    this.$emit('selected', name);
                    this.selected = name;
                }
            }
        }
    }
</script>
