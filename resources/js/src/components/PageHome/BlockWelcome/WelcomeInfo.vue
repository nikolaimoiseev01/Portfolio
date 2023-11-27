<template>
    <div class="info-wrap width-restricted">
        <TextOverlay>
            <h1>Моисеев Николай</h1>
        </TextOverlay>

        <TextOverlay>
            <p>FullStack разработчик. Делаю сайты с любовью</p>
        </TextOverlay>

        <TextOverlay id="welcome-cta">
            <Button @click="openContactForm">Обо мне</Button>
        </TextOverlay>

    </div>

</template>

<script>
import Button from "@/src/components/ui/Button.vue";
import TextOverlay from "@/src/components/ui/TextOverlay.vue";
import store from "@/src/store/store.js";

export default {
    name: "WelcomeInfo.vue",
    components: {
        Button,
        TextOverlay
    },
    methods: {
        openContactForm() {
            store.commit('setContactFormVisible', true)
        }
    }
}
</script>

<style lang="scss" scoped>
.info-wrap {
    position: absolute !important;
    top: 50%;
    left: 50%;
    width: 90%;
    z-index: 20;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    gap: 20px;

    h1 {
        color: white;
        font-size: 60px;
        display: inline-block;
    }

    p {
        font-style: italic;
        font-weight: 300;
        color: white;
    }

    #welcome-cta {
        width: 170px;
    }
}

</style>
