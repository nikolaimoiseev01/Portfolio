<template>
    <kinesis-container  id="BlockWelcome" class="kinesis-container">
        <div class="welcome-wrap">
            <LightCircle></LightCircle>
            <Header class="main"></Header>
            <WelcomeInfo></WelcomeInfo>
            <LogoBlue></LogoBlue>
            <Socials class="right-column"></Socials>
            <WelcomeShapes></WelcomeShapes>
            <GoToWorks></GoToWorks>
        </div>
    </kinesis-container>
</template>

<script>



import Header from "@/src/components/Header.vue";
import WelcomeShapes from "@/src/components/PageHome/BlockWelcome/WelcomeShapes.vue";
import WelcomeInfo from "@/src/components/PageHome/BlockWelcome/WelcomeInfo.vue";
import LogoBlue from "@/src/components/ui/LogoBlue.vue";
import Socials from "@/src/components/PageHome/BlockWelcome/Socials.vue";
import LightCircle from "@/src/components/PageHome/BlockWelcome/LightCircle.vue";
import GoToWorks from "@/src/components/PageHome/BlockWelcome/GoToWorks.vue";

export default {
    name: "BlockWelcome.vue",
    components: {
        Header,
        WelcomeShapes,
        WelcomeInfo,
        LogoBlue,
        Socials,
        LightCircle,
        GoToWorks
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/app";

.kinesis-container {
    overflow: hidden;
    .welcome-wrap {
        height: 100vh;
        width: 100vw;
        background: $color-main-dark;
        display: flex;
        align-items: center;
    }
}

</style>
