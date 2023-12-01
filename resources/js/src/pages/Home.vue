<template>
    <div class="parallax-container" ref="parallaxContainer">
        <BlockWelcome></BlockWelcome>
        <BlockWorks></BlockWorks>
    </div>

</template>

<script>


import BlockWorks from "@/src/components/PageHome/BlockWorks.vue";
import Parallax from 'vue-parallaxy'
import BlockWelcome from "@/src/components/PageHome/BlockWelcome/BlockWelcome.vue";
import Footer from "@/src/components/Footer.vue";

export default {
    name: "Home",
    components: {
        BlockWelcome,
        BlockWorks,
        Footer
    },
    mounted() {
        window.addEventListener('scroll', this.parallaxEffect);
        if (this.$route.fullPath.includes('#BlockWorks')) {
            const myEl = document.getElementById('BlockWorks')

            if (myEl) {
                setTimeout(() => {
                    this.$smoothScroll({
                        scrollTo: myEl, // scrollTo is also allowed to be number
                        duration: 1000,       // animation duration in ms
                        offset: -300,           // offset in px from scroll element, can be positive or negative
                        easingFunction: 'easeInOutCubic'
                    })
                }, 1500)

            }
        }
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.parallaxEffect);
    },
    methods: {
        parallaxEffect() {
            if (window.outerWidth > 768) {
                const parallaxContainer = this.$refs.parallaxContainer;
                const welcome = document.getElementById('BlockWelcome');
                const works = document.getElementById('BlockWorks');

                // Вычисляем значение для параллакса (можно настроить под свои нужды)
                const scrollPosition = window.scrollY;
                const parallaxValue = scrollPosition * 0.5;


                // Применяем эффект параллакса
                welcome.style.transform = `translateY(${parallaxValue}px)`;
                works.style.transform = `translateY(-${parallaxValue}px)`;

                // Устанавливаем высоту контейнера равной сумме высот блоков,
                // чтобы компенсировать изменение высоты при скролле
                if ((window.innerHeight + Math.round(window.scrollY)) < document.body.offsetHeight) { // Если не конец страницы
                    parallaxContainer.style.height = welcome.offsetHeight - Math.round(parallaxValue) + works.offsetHeight + 'px';
                }
            }

        },
    },
}
</script>

<style scoped>

</style>
