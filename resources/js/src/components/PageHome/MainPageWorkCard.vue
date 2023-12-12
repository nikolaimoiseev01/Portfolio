<template>
    <a :href="'/work/' + work.id">
        <div ref="card"
             class="card-wrap">
            <div class="background-image"></div>
            <div :class="{ 'hidden': !isVisible}" class="work-reveal-mask"></div>
            <div class="work-mask"></div>
            <div class="work-mask-number">
                <div class="work-mask-back">{{ work.order }}</div>
                <div class="work-mask-front">
                    <div :data-index=" work.order " class="work-mask-overlay">{{ work.order }}</div>
                </div>
            </div>
            <div class="work-text-section">
                <h1 itemprop="name" class="work-title">{{ work.title }}</h1>
                <p itemprop="description" v-html="work.desc_card" class="work-subtitle"></p>
                <Link @click="closeMenu()" :to="'/work/' + work.id">Подробнее</Link>
            </div>
        </div>
    </a>
</template>

<script lang="ts">


import Button from "../ui/Button.vue";
import {Work} from "../../interfaces/Work";
import Link from "../ui/Link.vue";
import store from "../../store/store.js";

export default {
    name: "MainPageWorkCard.vue",
    props: {
        work: {
            type: Object as () => Work,
        },
    },
    data() {
        return {
            cover_card: "url(" + this.work.cover_card + ")",
            isVisible: false,
        }
    },
    components: {
        Link
    },
    mounted() {
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5, // Порог видимости
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                this.isVisible = entry.isIntersecting;
            });
        }, options);

        observer.observe(this.$refs.card);
    },
    methods: {
        closeMenu() {
            store.commit('setMobileMenuVisible', false)
        }
    }
}
</script>


<style lang="scss">
@import "/resources/scss/_variables";

.work-text-section {
    p {
        font-family: 'EB Garamond', serif;
        line-height: 30px;
        letter-spacing: 2px;
        font-style: italic;
        font-size: 22px;
        color: $color-main-bright;
    }
}
</style>

<style lang="scss" scoped>
@import "/resources/scss/app";

.card-wrap {
    //background-image: url(assets/img/pervajakniga_card.png);
    width: 90%;
    height: 460px;
    max-width: 900px;
    border-radius: 10px;
    display: block;
    opacity: 1;
    //background-color: #1c1d25;
    position: relative;
    box-shadow: 0 20px 80px 0 rgba(0, 0, 0, .45);
    margin-left: auto;
    margin-right: auto;
    transition: all .35s ease;
    cursor: pointer;
    border-radius: 20px;

    &:before {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        display: block;
        content: " ";
        background: #1c1d25;
        opacity: .6;
        transition: opacity .3s ease;
        z-index: 2;
        border-radius: 20px;
    }

    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-position: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: v-bind('cover_card');
        /* Add the blur effect */
        border-radius: 20px;
    }

    .work-reveal-mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
        z-index: 100;

        &.hidden {
            &:after {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }

        }

        &:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #1c1d25;
            background: linear-gradient(270deg, #235aa6, #101b3b);
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            transition: -webkit-transform .4s cubic-bezier(.694, .048, .335, 1) .15s;
            transition: transform .4s cubic-bezier(.694, .048, .335, 1) .15s;
            transition: transform .4s cubic-bezier(.694, .048, .335, 1) .15s, -webkit-transform .4s cubic-bezier(.694, .048, .335, 1) .15s;
            z-index: 101;
        }
    }

    .work-mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
        border-radius: 20px;

        &:after {
            content: "";
            position: absolute;
            top: 0;
            opacity: 1;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(28, 29, 37, .9);
            background: linear-gradient(270deg, rgba(35, 90, 166, .9), rgba(16, 27, 59, .9));
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
            transition: opacity .2s, -webkit-transform .35s cubic-bezier(.694, .048, .335, 1) .2s;
            transition: transform .35s cubic-bezier(.694, .048, .335, 1) .2s, opacity .2s;
            transition: transform .35s cubic-bezier(.694, .048, .335, 1) .2s, opacity .2s, -webkit-transform .35s cubic-bezier(.694, .048, .335, 1) .2s;
            z-index: 9;
        }
    }

    .work-mask-number {
        display: block;
        position: absolute;
        top: -40px;
        right: -45px;
        width: 265px;
        height: 198px;
        font-size: 150px;
        overflow: hidden;
        color: #99999d;
        -webkit-transform: translateY(15px);
        transform: translateY(15px);
        opacity: 0;
        transition: opacity .3s, -webkit-transform .45s cubic-bezier(.694, .048, .335, 1);
        transition: opacity .3s, transform .45s cubic-bezier(.694, .048, .335, 1);
        transition: opacity .3s, transform .45s cubic-bezier(.694, .048, .335, 1), -webkit-transform .45s cubic-bezier(.694, .048, .335, 1);
        z-index: 90;
        overflow: hidden;

        .work-mask-back, .work-mask-front {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .work-mask-overlay {
            overflow: hidden;
            position: relative;
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
            color: transparent;
            transition: transform .6s cubic-bezier(.694, .048, .335, 1) 0s, -webkit-transform .6s cubic-bezier(.694, .048, .335, 1) 0s;

            &:before {
                content: attr(data-index);
                position: absolute;
                top: 0;
                left: 0;
                color: #fff;
                text-shadow: 5px 5px 11px rgba(74, 74, 74, .5);
                width: 100%;
                height: 100%;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
                transition: transform .6s cubic-bezier(.694, .048, .335, 1) 0s, -webkit-transform .6s cubic-bezier(.694, .048, .335, 1) 0s;
            }

        }
    }

    .work-text-section {
        position: absolute;
        left: 90px;
        top: 50%;
        color: #fff;
        z-index: 10;
        max-width: 100%;
        -webkit-transform: scale(1) translateX(0);
        transform: scale(1) translateX(0) translateY(-30%);
        transition: transform .45s, opacity .25s, -webkit-transform .45s;
        opacity: 1;
        transition-delay: .4s;
        display: flex;
        flex-direction: column;
        gap: 20px;

    }

    @media (min-width: 1024px) {
        &:hover {
            .work-mask:after {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }

            .work-mask-number {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            .work-mask-overlay {
                transition-delay: .4s;
                -webkit-transform: translateZ(0);
                transform: translateZ(0);

                &:before {
                    transition-delay: .4s;
                    -webkit-transform: translateZ(0);
                    transform: translateZ(0);
                }
            }

            .work-text-section {
                -webkit-transform: scale(1.05) translateX(0) translateY(-50%);
                transform: scale(1.05) translateX(0) translateY(-50%);
                transition-delay: .6s;
            }
        }
    }

    @include media-tablets-768 {
        //display: flex;

        .work-text-section {
            left: 50%;
            width: 90%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            align-items: center;
        }

        .work-mask-number {
            display: none;
        }
    }
}
</style>
