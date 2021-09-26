<template>
    <div
        ref="tooltip"
        class="bg-green-600 text-white font-bold py-1 px-2 rounded-lg text-xs"
        id="tooltip"
    >
        <div data-popper-arrow id="arrow"></div>
        {{ label }}
    </div>
</template>

<style>
    #arrow,
    #arrow::before {
      position: absolute;
      width: 8px;
      height: 8px;
      background: inherit;
    }

    #arrow {
      visibility: hidden;
    }

    #arrow::before {
      visibility: visible;
      content: '';
      transform: rotate(45deg);
    }

    #tooltip[data-popper-placement^='top'] > #arrow {
      bottom: -4px;
    }

    #tooltip[data-popper-placement^='bottom'] > #arrow {
      top: -4px;
    }

    #tooltip[data-popper-placement^='left'] > #arrow {
      right: -4px;
    }

    #tooltip[data-popper-placement^='right'] > #arrow {
      left: -4px;
    }
</style>

<script>
    export default {
        name: 'tooltip',
        props: {
            label: String,
            domElementId: String,
            placement: {
                type: String,
                default: 'right'
            }
        },
        mounted () {
            createPopper(
                document.getElementById(this.domElementId),
                this.$refs.tooltip,
                {
                    placement: this.placement,
                    modifiers: [
                        {
                            name: 'offset',
                            options: {
                                offset: [0, 8],
                            },
                        },
                    ]
                } 
            );
        },
    }
</script>
