<template>
    <transition name="modal">
        <div class="fixed left-0 top-0 z-40 w-full h-full flex items-center justify-center">
            <div class="absolute bg-gray-200 opacity-50 w-full h-full "></div>
            <div class="z-50 p-10 bg-white border-gray-600 border rounded-lg">
                <div class="border-b border-gray-400">
                    <slot name="header">
                    </slot>
                </div>
                <div class="my-10">
                    <slot name="body">
                    </slot>
                </div>
                <div class="border-t border-gray-400 pt-3">
                    <slot name="footer">
                    </slot>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "Modal",
    }
</script>
