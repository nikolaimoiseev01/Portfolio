<template>
    <div v-bind="$attrs" ref="text_overlay" class="text-loading-mask">
        <div :class="{ 'loaded': isVisible}" class="text-loading-overlay"></div>
        <slot></slot>
    </div>
</template>

<script>
import store from "@/src/store/store.js";

export default {
    name: "TextOverlay.vue",
    data() {
        return {
            isVisible: false,
        };
    },
    watch: {
        '$store.state.pageTransitionVisible': function () {
            if (!store.state.pageTransitionVisible) {
                this.goTextOverlay()
            }
        }
    },
    methods: {
        goTextOverlay() {
            const options = {
                root: null,
                rootMargin: '0px',
                threshold: 0.5, // Порог видимости
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    setTimeout(() => {
                        if (entry.isIntersecting) {
                            this.isVisible = true;
                        }
                    }, 1000);

                });
            }, options);

            observer.observe(this.$refs.text_overlay);
        }
    }
}
</script>

<style lang="scss" scoped>
.text-loading-mask {
    display: inline-block;
    position: relative;
    padding-top: 10px;
    padding-right: 10px;
    overflow: hidden;
    width: fit-content;
    transition: all .2s ease;

    .text-loading-overlay {
        display: block;
        position: absolute;
        top: -10px;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fff;
        -webkit-transform: translateX(0);
        transform: translateX(0);
        transition: -webkit-transform .65s cubic-bezier(.694, .048, .335, 1);
        transition: transform .65s cubic-bezier(.694, .048, .335, 1);
        transition: transform .65s cubic-bezier(.694, .048, .335, 1), -webkit-transform .65s cubic-bezier(.694, .048, .335, 1);
        z-index: 60;

        &.loaded {
            opacity: 1;
            -webkit-transform: translateX(105%);
            transform: translateX(105%);
        }
    }
}
</style>
