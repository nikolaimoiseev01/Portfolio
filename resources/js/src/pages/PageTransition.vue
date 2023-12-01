<template>
    <div :class="computedClasses" v-bind="$attrs" class="page-transition-wrap">
        <div class="layers">
            <div :class="computedClasses" class="left-layer"></div>
            <div :class="computedClasses" class="left-layer left-layer--2"></div>
            <div :class="computedClasses" class="left-layer left-layer--3"></div>
            <div :class="computedClasses" class="left-layer left-layer--4"></div>
            <div :class="computedClasses" class="loader-content">
                <div class="stripe-loader">
                    <div class="stripe"></div>
                    <div class="stripe"></div>
                    <div class="stripe"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from "@/src/store/store.js";

export default {
    name: "PageTransition.vue",
    props: {
        transitionMode: {
            type: Boolean,
            default: false
        }
    },
    computed: {
        computedClasses() {
            return {
                'active': store.state.pageTransitionVisible || this.transitionMode,
                'disabled': !store.state.pageTransitionVisible && !this.transitionMode,
            };
        },
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/app";

.page-transition-wrap {
    left: 0;
    top: 0;
    visibility: visible;
    transition: .3s all ease-in-out;
    z-index: 999;

    &.full-page {
        width: 100vw;
        height: 100vh;
        position: fixed;
    }

    &.part-page {
        width: 100%;
        height: 100%;
        position: absolute;
    }

    &.disabled {
        visibility: hidden;
    }

    .layers {
        position: relative;
        width: 100%;
        height: 100%;

        .left-layer {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            bottom: auto;
            right: auto;
            z-index: 100;
            background: #4d606e;
            transition: all .3s cubic-bezier(0.645, 0.045, 0.355, 1);
            visibility: hidden;

            &.active {
                left: 0;
                visibility: visible;
            }

            &--2 {
                background: #d3d4d8;
                transition-delay: .1s;
                z-index: 101;
            }

            &--3 {
                background: #d3d4d8;
                transition-delay: .5s;
                z-index: 102;
            }

            &--4 {
                background: #26408b;
                transition-delay: .2s;
                z-index: 103;
            }
        }

        .loader-content {
            position: absolute;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 300px;
            height: 90px;
            overflow: hidden;
            opacity: 1;
            visibility: visible;
            transition-delay: 1s;
            transition: all 0.25s ease;
            z-index: 700;

            &.disabled {
                opacity: 0;
                visibility: hidden;
            }

            .stripe-loader {
                width: 100%;
                height: 90px;

                .stripe {
                    height: 30px;
                    width: 0;
                    background: #ffffff;
                    position: relative;
                    margin: 0;

                    &:first-child {
                        -webkit-animation: stripe 1.5s cubic-bezier(0.694, 0.048, 0.335, 1) infinite;
                        animation: stripe 1.5s cubic-bezier(0.694, 0.048, 0.335, 1) infinite;
                    }

                    &:nth-child(2) {
                        -webkit-animation: stripe 1.5s cubic-bezier(0.694, 0.048, 0.335, 1) 0.1s infinite;
                        animation: stripe 1.5s cubic-bezier(0.694, 0.048, 0.335, 1) 0.1s infinite;
                    }

                    &:nth-child(3) {
                        -webkit-animation: stripe 1.5s cubic-bezier(0.694, 0.048, 0.335, 1) 0.2s infinite;
                        animation: stripe 1.5s cubic-bezier(0.694, 0.048, 0.335, 1) 0.2s infinite;
                    }
                }
            }

        }
    }

}

@keyframes stripe {

    0% {
        left: 0;
        width: 0px;
    }

    25% {
        left: 0;
        width: 100%;
    }
    50% {
        left: 100%;
        width: 0px;
    }
    75% {
        left: 0;
        width: 100%;
    }
    100% {
        left: 0;
        width: 0px;
    }

}

</style>
