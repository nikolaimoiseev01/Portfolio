<template>
    <header v-bind="$attrs" class="header-wrap">
        <div class="header">
            <router-link to="/">
                <LogoWhite></LogoWhite>
            </router-link>
            <div class="menu-wrap">
                <router-link v-if="show_main" class="link" to="/">Главная</router-link>
                <router-link @click="goToWorks" class="link" to="/#BlockWorks">Работы</router-link>
                <a class="link" @click="openContactForm">Контакты</a>
                <a class="link" @click="openContactForm">Обо мне</a>
            </div>
        </div>

    </header>
</template>

<script>
import Header from "@/src/App.vue";
import LogoWhite from "@/src/components/ui/LogoWhite.vue";
import store from "@/src/store/store.js";

export default {
    name: "Header.vue",
    components: {LogoWhite},
    data() {
        return {
            show_main: Boolean
        }
    },
    methods: {
        openContactForm() {
            store.commit('setContactFormVisible', true)
        },
        goToWorks() {

            const myEl = document.getElementById('BlockWorks')

            if(myEl) {
                this.$smoothScroll({
                    scrollTo: myEl, // scrollTo is also allowed to be number
                    duration: 1000,       // animation duration in ms
                    offset: -300,           // offset in px from scroll element, can be positive or negative
                    easingFunction: 'easeInOutCubic'
                })
            }
        }
    },
    mounted() {
        if(this.$route.fullPath === '/' || this.$route.fullPath === '/#BlockWorks') {
            this.show_main = false
        } else {
            this.show_main = true
        }
    }
}
</script>

<style lang="scss" scoped>
.header-wrap {
    display: flex;
    justify-content: center;
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 5;

    .header {
        width: 1000px;
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
        }
    }


}
</style>
