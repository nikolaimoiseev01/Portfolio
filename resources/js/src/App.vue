<template>
    <contact-form></contact-form>
    <main class="main">
        <router-view v-slot="{ Component }">
            <transition name="page-opacity" mode="out-in">
                <component :is="Component"/>
            </transition>
        </router-view>
    </main>
    <Footer></Footer>
    <PageTransition  class="full-page"/>
</template>

<script>
import Header from "@/src/components/Header.vue";
import PageTransition from "@/src/pages/PageTransition.vue";
import Footer from "@/src/components/Footer.vue";
import ContactForm from "@/src/components/PageHome/ContactForm.vue";
import store from "@/src/store/store.js";

export default {
    name: "App.vue",
    components: {
        Header,
        PageTransition,
        Footer,
        ContactForm
    },
    watch: {
        '$route'(to, from) {

            if (!to.fullPath.includes('#BlockWorks')) {
                this.scrollToTop();
                store.commit('setPageTransitionVisible', true);
            }
        }
    },
    methods: {
        // Метод для плавной прокрутки до верха страницы
        scrollToTop() {
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
    },
    mounted() {
        console.log("%cПриветствую тебя на %cтёмной%c технической стороне сайта! :)", "", "text-decoration: line-through;", "");
    }
}
</script>

<style lang="less" scoped>
.page-opacity-enter-active,
.page-opacity-leave-active {
    transition: 500ms ease all;
}

.page-opacity-enter-from,
.page-opacity-leave-to {
    opacity: 0;
}
</style>
