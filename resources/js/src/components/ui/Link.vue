<template>
    <router-link @click="scrollToTop" :to="to" tag="button" v-bind="$attrs" class="linkButton">
        <span class="button-text"><slot></slot></span>
        <div class="button-mask"></div>
        <span class="button-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 476.213 476.213">
                <path d="M405.606 167.5l-21.212 21.213 34.393 34.393H0v30h418.787L384.394 287.5l21.212 21.213 70.607-70.607"></path>
            </svg>
        </span>
    </router-link>
</template>

<script>
export default {
    name: "Link",
    props: {
        to: {
            type: [String, Object],
            default: '/'
        }
    },
    inheritAttrs: false, // Чтобы предотвратить автоматическую передачу атрибутов
    methods: {
        // Метод для плавной прокрутки до верха страницы
        scrollToTop() {
            console.log('test')
            // Ваш код для плавной прокрутки, например, с использованием requestAnimationFrame
            const scrollToTop = () => {
                const c = document.documentElement.scrollTop || document.body.scrollTop;
                if (c > 0) {
                    window.requestAnimationFrame(scrollToTop);
                    window.scrollTo(0, c - c / 8);
                }
            };
            scrollToTop();
        },
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/app";

a.linkButton {
    font-size: .875em;
    letter-spacing: 3px;
    padding: 12px 20px;
    background-color: #f06449;
    background: linear-gradient(270deg, #f06449, #ef3636);
    color: #fff;
    position: relative;
    transition: all .3s;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    width: fit-content;
    text-decoration: none;

    .button-text {
        position: relative;
        z-index: 10;
    }

    .button-mask {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;

        &:before, &:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            transform: translateX(-110%);
        }

        &:before {
            width: 100%;
            background-color: #1b2e63;
            background: linear-gradient(270deg, #235aa6, #101b3b);
            transition: -webkit-transform .6s cubic-bezier(.694, .048, .335, 1) .05s;
            transition: transform .6s cubic-bezier(.694, .048, .335, 1) .05s;
            transition: transform .6s cubic-bezier(.694, .048, .335, 1) .05s, -webkit-transform .6s cubic-bezier(.694, .048, .335, 1) .05s;
            z-index: 1;
            will-change: transform;
        }

        &:after {
            content: "";
            position: absolute;
            background: linear-gradient(270deg, #235aa6, #213777);
            top: 0;
            left: 0;
            height: 100%;
            transition: -webkit-transform .75s cubic-bezier(.694, .048, .335, 1);
            transition: transform .75s cubic-bezier(.694, .048, .335, 1);
            transition: transform .75s cubic-bezier(.694, .048, .335, 1), -webkit-transform .75s cubic-bezier(.694, .048, .335, 1);
        }
    }

    .button-icon {
        position: absolute;
        top: 3px;
        right: -25px;
        width: 35px;
        height: 35px;
        -webkit-transform: translateX(0);
        transform: translateX(0);
        transition: -webkit-transform .3s cubic-bezier(.694, .048, .335, 1);
        transition: transform .3s cubic-bezier(.694, .048, .335, 1);
        transition: transform .3s cubic-bezier(.694, .048, .335, 1), -webkit-transform .3s cubic-bezier(.694, .048, .335, 1);

        svg {
            width: 35px;
            height: 35px;

            path {
                fill: #fff;
            }
        }

    }

    &:hover {
        .button-icon {
            -webkit-transform: translateX(7px);
            transform: translateX(7px);
        }

        .button-mask:before {
            -webkit-transform: translateX(200%);
            transform: translateX(200%);
            transition: -webkit-transform .75s cubic-bezier(.694, .048, .335, 1) .05s;
            transition: transform .75s cubic-bezier(.694, .048, .335, 1) .05s;
            transition: transform .75s cubic-bezier(.694, .048, .335, 1) .05s, -webkit-transform .75s cubic-bezier(.694, .048, .335, 1) .05s;
        }

        .button-mask:after {
            -webkit-transform: translateX(200%);
            transform: translateX(200%);
            transition: -webkit-transform .75s cubic-bezier(.694, .048, .335, 1);
            transition: transform .75s cubic-bezier(.694, .048, .335, 1);
            transition: transform .75s cubic-bezier(.694, .048, .335, 1), -webkit-transform .75s cubic-bezier(.694, .048, .335, 1);
        }

    }

    &.simple {
        background: transparent;
        border: 2px solid hsla(0, 0%, 100%, .6);
        color: #fff;
        transition: all .3s;

        .button-mask {
            display: none;
        }

        &:hover {
            background-color: #fff;
            color: #1c1d25;
        }
    }

    &.black {
        background: transparent;
        border: 2px solid $color-main-dark;
        color: $color-main-dark;
        transition: all .3s;

        .button-icon svg path {
            fill: $color-main-dark;
        }

        &:hover {
            background-color: $color-main-dark;
            color: white;
        }
    }
}
</style>
