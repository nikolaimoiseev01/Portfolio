<template>
    <header v-bind="$attrs" class="header-wrap">
        <div class="width-restricted header">
            <router-link to="/">
                <LogoWhite></LogoWhite>
            </router-link>
            <div class="menu-wrap">
                <router-link v-if="show_main" class="link" to="/">Главная</router-link>
                <router-link @click="goToWorks" class="link" to="/#BlockWorks">Работы</router-link>
                <a class="link" @click="openContactForm">Контакты</a>
                <a class="link" @click="openContactForm">Обо мне</a>

                <div @click="setMobileMenu(true)" class="nav-toggle">
                    <span class="menu-trigger">
                        <i class="menu-trigger-bar top"></i><i class="menu-trigger-bar middle"></i>
                        <i class="menu-trigger-bar bottom"></i>
                    </span>
                </div>
            </div>
        </div>
    </header>

    <nav :class="computedClasses" class="mobile-menu">
        <span @click="setMobileMenu(false)" class="close-trigger">
            <i class="close-trigger-bar left"></i>
            <i class="close-trigger-bar right"></i>
        </span>
        <ul class="mobile-nav-links">
            <router-link @click="setMobileMenu(false)" v-if="show_main" class="link" to="/">Главная</router-link>
            <router-link @click="goToWorks" class="link" to="/#BlockWorks">Работы</router-link>
            <a class="link" @click="openContactForm">Контакты</a>
            <a class="link" @click="openContactForm">Обо мне</a>
        </ul>
        <Socials class="bottom-row"></Socials>
    </nav>
</template>

<script>
import Header from "@/src/App.vue";
import LogoWhite from "@/src/components/ui/LogoWhite.vue";
import store from "@/src/store/store.js";
import Socials from "@/src/components/PageHome/BlockWelcome/Socials.vue";

export default {
    name: "Header.vue",
    components: {
        LogoWhite,
        Socials
    },
    data() {
        return {
            show_main: Boolean,
            show_mobile: false
        }
    },
    methods: {
        openContactForm() {
            store.commit('setMobileMenuVisible', false)
            store.commit('setContactFormVisible', true)
        },
        goToWorks() {

            const myEl = document.getElementById('BlockWorks')

            if (myEl) {
                window.history.replaceState(window.history.state, "", "/#BlockWorks");
                this.$smoothScroll({
                    scrollTo: myEl, // scrollTo is also allowed to be number
                    duration: 1000,       // animation duration in ms
                    offset: -300,           // offset in px from scroll element, can be positive or negative
                    easingFunction: 'easeInOutCubic'
                })
            }
        },
        setMobileMenu(value) {
            store.commit('setMobileMenuVisible', value)
        }
    },
    mounted() {
        if (this.$route.fullPath === '/' || this.$route.fullPath === '/#BlockWorks') {
            this.show_main = false
        } else {
            this.show_main = true
        }
    },
    computed: {
        computedClasses() {
            return {
                'opened': store.state.mobileMenuVisible,
            };
        },
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/app";

.header-wrap {
    display: flex;
    justify-content: center;
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 5;
    background: rgba(28, 29, 37, 0.95);

    .header {
        display: flex;
        padding: 20px 0;
        justify-content: end;

        svg {
            width: 40px;
            height: 40px;
        }

        .menu-wrap {
            display: flex;
            gap: 20px;
            margin-left: auto;

            .menu-trigger {
                display: none;
                width: 42px;
                height: 42px;
                cursor: pointer;

                .menu-trigger-bar {
                    display: block;
                    width: 100%;
                    height: 3px;
                    background-color: #dbdce4;
                    margin-bottom: 6px;
                    position: relative;

                    &:before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        display: block;
                        width: 0;
                        height: 100%;
                        background-color: #235aa6;
                        transition: all .3s cubic-bezier(.55, 0, .1, 1);
                    }

                    &.middle {
                        width: 85%;
                        margin-left: 15%;
                    }

                    &.bottom {
                        width: 60%;
                        margin-left: 40%;
                    }
                }
            }

            @include media-tablets-768 {
                a {
                    display: none;
                }

                .menu-trigger {
                    display: block;
                }
            }
        }
    }


}

.mobile-menu {
    display: block;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    visibility: hidden;
    transition: all .1s ease .5s;
    z-index: -1;

    &:after, &:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        transition: -webkit-transform .45s cubic-bezier(.694, .048, .335, 1);
        transition: transform .45s cubic-bezier(.694, .048, .335, 1);
        transition: transform .45s cubic-bezier(.694, .048, .335, 1), -webkit-transform .45s cubic-bezier(.694, .048, .335, 1);
    }

    &:before {
        transition-delay: .25s;
        background-color: #f06449;
        background: linear-gradient(270deg, #f06449, #ee2828);
        z-index: 24;
    }

    &:after {
        transition-delay: .15s;
        background-color: #1c1d25;
        background: linear-gradient(270deg, #235aa6, #101b3b);
        z-index: 25;
    }

    .close-trigger, .menu-trigger {
        display: block;
        width: 42px;
        height: 42px;
        cursor: pointer;
    }

    .close-trigger {
        position: absolute;
        top: 50px;
        right: 30px;
        display: none;
        -webkit-transform: scale(.75);
        transform: scale(.75);
        opacity: 0;
        transition: opacity .25s ease 0s, -webkit-transform .35s cubic-bezier(.694, .048, .335, 1) 0s;
        transition: opacity .25s ease 0s, transform .35s cubic-bezier(.694, .048, .335, 1) 0s;
        transition: opacity .25s ease 0s, transform .35s cubic-bezier(.694, .048, .335, 1) 0s, -webkit-transform .35s cubic-bezier(.694, .048, .335, 1) 0s;
        z-index: 46;

        .close-trigger-bar {
            display: block;
            width: 100%;
            height: 4px;
            background-color: white;
            position: relative;

            &.left {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg);
            }

            &.right {
                -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
                top: -3px;
            }
        }
    }

    .mobile-nav-links {
        position: absolute;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        top: 35%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 15%;
        width: 70%;
        text-align: center;
        margin: 0;
        padding: 0;
        list-style: none;
        opacity: 0;
        transition: opacity .3s ease, -webkit-transform .4s cubic-bezier(.694, .048, .335, 1);
        transition: opacity .3s ease, transform .4s cubic-bezier(.694, .048, .335, 1);
        transition: opacity .3s ease, transform .4s cubic-bezier(.694, .048, .335, 1), -webkit-transform .4s cubic-bezier(.694, .048, .335, 1);
        transition-delay: 0s;
        z-index: 26;

        a {
            color: white;
            font-size: 30px;
        }
    }

    .bottom-row {
        display: flex;
        position: absolute;
        bottom: 20%;
        left: 50%;
        width: 90%;
        margin: 0;
        padding: 0;
        -webkit-transform: translateY(-50%, 15px);
        transform: translate(-50%, 15px);
        opacity: 0;
        transition: opacity .3s ease, -webkit-transform .4s cubic-bezier(.694, .048, .335, 1);
        transition: opacity .3s ease, transform .4s cubic-bezier(.694, .048, .335, 1);
        transition: opacity .3s ease, transform .4s cubic-bezier(.694, .048, .335, 1), -webkit-transform .4s cubic-bezier(.694, .048, .335, 1);
        transition-delay: 0s;
        list-style: none;
        z-index: 26;
        max-width: 200px;
        gap: 20px;
    }

    &.opened {
        visibility: visible;
        transition-delay: .1s;
        z-index: 45;

        &:before {
            transition-delay: 0s;
        }

        &:after {
            transition-delay: .15s;
        }

        &:before, &:after {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        .mobile-nav-links {
            opacity: 1;
            transition-delay: .4s;
            -webkit-transform: translateY(-60%);
            transform: translateY(-60%);
        }

        .bottom-row {
            opacity: 1;
            transition-delay: .45s;
            -webkit-transform: translateY(0);
            transform: translate(-50%, 0);
        }

        .close-trigger {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
            transition-delay: .52s;
        }
    }
}

@include media-tablets-768 {


    .close-trigger, .mobile-menu, .nav-toggle {
        display: block !important;
    }
}
</style>
