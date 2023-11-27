<template>
    <header v-bind="$attrs" class="header-wrap">
        <div class="header">
            <router-link to="/">
                <LogoWhite></LogoWhite>
            </router-link>
            <div class="menu-wrap">
                <router-link class="link" to="/">Главная</router-link>
                <router-link class="link" to="#BlockWorks">Работы</router-link>
                <a class="link" @click="openContactForm">Контакты</a>
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
    methods: {
        openContactForm() {
            store.commit('setContactFormVisible', true)
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
