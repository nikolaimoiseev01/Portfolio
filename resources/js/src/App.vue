<template>

    <main :class="computedClasses" class="main">
        <contact-form></contact-form>
        <router-view v-slot="{ Component }">
            <transition name="page-opacity" mode="out-in">
                <component :is="Component"/>
            </transition>
        </router-view>
        <Footer></Footer>
        <PageTransition class="full-page"/>
    </main>

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
    data() {
        return {
            hasJustScrolled: false,
        };
    },
    watch: {
        '$route'(to) {
            // Прерываем, если уже недавно скроллили
            if (this.hasJustScrolled) return;
            // Пропускаем якорные переходы и главную страницу
            if (to.fullPath.includes('#BlockWorks') || to.fullPath === '/') return;

            // Устанавливаем флаг и выполняем скролл с задержкой
            this.hasJustScrolled = true;
            setTimeout(() => {
                window.scrollTo({ top: 0, behavior: 'smooth' });

                // Сбрасываем флаг после небольшой паузы
                setTimeout(() => {
                    this.hasJustScrolled = false;
                }, 1000); // 1 сек достаточно для любого smooth scroll
            }, 100); // Задержка, чтобы подождать отрисовку нового контента
        }
    },
    methods: {
        scrollToTop() {
            this.isScrolling = true;
            const scrollToTop = () => {
                const c = document.documentElement.scrollTop || document.body.scrollTop;
                if (c > 0) {
                    window.requestAnimationFrame(scrollToTop);
                    window.scrollTo(0, c - c / 8);
                } else {
                    this.isScrolling = false; // сброс флага по завершению
                }
            };
            scrollToTop();
        },
    },
    mounted() {
        console.log("%cПриветствую тебя на %cтёмной%c технической стороне сайта! :)", "", "text-decoration: line-through;", "");
    },
    computed: {
        computedClasses() {
            return {
                'hidden': store.state.mainPageHidden,
            };
        },
    }
}
</script>

<style lang="less" scoped>
main.hidden {
    height: 100vh;
    overflow: hidden;
}

.page-opacity-enter-active,
.page-opacity-leave-active {
    transition: 500ms ease all;
}

.page-opacity-enter-from,
.page-opacity-leave-to {
    opacity: 0;
}
</style>
