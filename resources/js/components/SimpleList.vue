<template>
    <ul>
        <li
            v-for="item in data"
            v-bind:key="item.name"
            :name="item.name"
            class="cursor-pointer py-1 px-2 my-1 hover:bg-gray-200 transition-colors duration-300"
            :class="item.name === selected ? 'bg-gray-200' : ''"
            @click="setSelected(item.name)"
        >
            <font-awesome-icon :icon="item.icon" class="mr-3 text-gray-600" />
            {{item.text}}
        </li>
    </ul>
</template>

<script>
    export default {
        name: "SimpleList",
        props: {
            data: Array
        },
        data() {
            return {
                selected: null
            }
        },
        methods: {
            setSelected (name) {
                this.$emit('selected', name);
                this.selected = name;
            }
        }
    }
</script>
