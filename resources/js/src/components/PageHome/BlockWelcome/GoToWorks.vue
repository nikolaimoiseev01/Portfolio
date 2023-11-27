<template>
    <a @click="goToWorks" class="hero-go-next">
        <p>Работы</p>
        <span class="arrow"></span>
    </a>
</template>

<script>
import {ref} from "vue";
import Vue3SmoothScroll from "vue3-smooth-scroll";

export default {
    name: "GoToWorks.vue",
    methods: {
        goToWorks() {

            const myEl = document.getElementById('BlockWorks')

            this.$smoothScroll({
                scrollTo: myEl, // scrollTo is also allowed to be number
                duration: 1000,       // animation duration in ms
                offset: -300,           // offset in px from scroll element, can be positive or negative
                easingFunction: 'easeInOutCubic'
            })


            //
            // const id = 'BlockWorks';
            // const yOffset = -300;
            // const element = document.getElementById(id);
            // const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;
            //
            // if (element) {
            //     window.scrollTo({
            //         top: y,
            //         behavior: 'smooth',
            //         block: 'start',
            //         inline: 'nearest',
            //         // Используем кубическую функцию времени для медленной прокрутки в начале и быстрой в конце
            //         timingFunction: 'cubic-bezier(4, 100, 100.2, 101)'
            //     });
            // }
        }
    }
}
</script>

<style lang="scss" scoped>
.hero-go-next {
    position: absolute;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    bottom: 10px;
    padding: 20px;
    opacity: .5;
    color: #fff;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    transition: opacity .35s ease-in-out;
    z-index: 7;
    display: flex;
    cursor: pointer;
    flex-direction: column;
    align-items: center;

    p {
        color: #fff;
    }

    .arrow {
        position: relative;
        display: inline-block;
        background: #f3f3f3;
        opacity: .8;
        height: 1px;
        width: 33px;
        top: 20px;
        transition: all .3s;
        transform: rotate(-90deg);

        &:before, &:after {
            opacity: 1;
            content: "";
            position: absolute;
            background: #f3f3f3;
            height: 1px;
            width: 10px;
            left: -1px;
            margin-right: 0;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transition: all .3s;
        }
    }

    &:hover {
        opacity: 1;
    }
}
</style>
