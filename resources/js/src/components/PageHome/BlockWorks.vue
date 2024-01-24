<template>
    <section id="BlockWorks" class="works-block-wrap">
        <div class="width-restricted">
            <h2 class="section-title">{{$t("main_page.welcome.last_works")}}</h2>
            <div class="works-wrap">
                <BlockAppearance v-for="work in works">
                    <MainPageWorkCard
                        :key="index"
                        :work="work">
                    </MainPageWorkCard>
                </BlockAppearance>
                <Link target="_blank" href="https://github.com/nikolaimoiseev01" class="black simple">{{$t('main_page.welcome.more_examples')}}</Link>
            </div>

        </div>

    </section>
</template>

<script>
import MainPageWorkCard from "@/src/components/PageHome/MainPageWorkCard.vue";
import axios from 'axios';
import index from "vuex";
import store from "@/src/store/store.js";
import BlockAppearance from "@/src/components/ui/BlockAppearance.vue";
import Link from "@/src/components/ui/Link.vue";

export default {
    name: "BlockWorks.vue",
    computed: {
        index() {
            return index
        }
    },
    components: {
        Link,
        BlockAppearance,
        MainPageWorkCard
    },
    data() {
        return {
            works: []
        };
    },
    created() {
        axios.get('/api/all-works') // Ваш маршрут из Laravel
            .then(response => {
                this.works = response.data;
                setTimeout(() => {
                    store.commit('setPageTransitionVisible', false)
                }, 1000)
            })
            .catch(error => {
                console.error(error);
            });
    }
}
</script>

<style lang="scss" scoped>
.works-block-wrap {
    /*height: 100vh;*/
    background: #F3F3F3;
    padding: 50px 0;

    .works-wrap {
        display: flex;
        flex-direction: column;
        gap: 50px;
        align-items: center;
        justify-content: center;
    }
}
</style>
