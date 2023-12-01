<template>
    <div class="page-work">

        <section class="welcome-wrap">
            <Header class="work-page-header"></Header>
            <div class="info-wrap">

                <TextOverlay>
                    <h1>{{ work.title }}</h1>
                </TextOverlay>

                <TextOverlay>
                    <i>
                        <div class="subtitle" v-html="work.desc_card"></div>
                    </i>
                </TextOverlay>

            </div>
        </section>

        <section class="intro-block-wrap">
            <div class="intro-wrap">
                <BlockAppearance>
                    <p v-html="work.desc_full"></p>
                </BlockAppearance>
                <BlockAppearance style="text-align: center; margin-top: 50px;">
                    <Link target="_blank" :href="work.link" class="simple">Посетить сайт</Link>
                </BlockAppearance>
            </div>

        </section>

        <section class="width-restricted detailed-info-wrap">
            <BlockAppearance>
                <h2 class="section-title">Подробнее</h2>
            </BlockAppearance>

            <div class="info-wrap">
                <BlockAppearance>
                    <div class="block-general">
                        <div class="text">
                            <h3>Сделано с любовью</h3>
                            <div class="divider"></div>
                            <p v-html="work.text_detailed_1"></p>
                        </div>
                        <!--                        <zoom-lens-image-->
                        <!--                            id="cover_desc_detailed_1_small"-->
                        <!--                            :size="{ height: '150px', width: '300px' }"-->
                        <!--                            :width="width_detailed_1"-->
                        <!--                            :height="height_detailed_1"-->
                        <!--                            :image="{ full: work.cover_desc_detailed_1_full, small: work.cover_desc_detailed_1_small }"-->
                        <!--                            v-if="work.cover_desc_detailed_1_small && width_detailed_1"-->
                        <!--                            alttext="Supernova"-->
                        <!--                            zoomlevel="1.5"-->
                        <!--                        ></zoom-lens-image>-->

                        <img :src="work.cover_desc_detailed_1_small" alt="">

                        <!--                        <ImageZoom :image1="work.cover_desc_detailed_1_small" :image2="work.cover_desc_detailed_1_full">-->

                        <!--                        </ImageZoom>-->
                    </div>
                </BlockAppearance>

                <BlockAppearance>
                    <div class="block-stacks">
                        <h3>Технологии</h3>
                        <div class="divider"></div>
                        <div class="stacks-wrap">
                    <span class="stack" v-for="stack in work.stacks" :style="{'background-color':stack.color}">
                        {{ stack.name }}
                    </span>
                        </div>
                    </div>
                </BlockAppearance>

                <div class="block-examples">
                    <h3>Примеры страниц</h3>
                    <div class="divider"></div>

                    <zoom-lens-image
                        id="cover_desc_detailed_2_small"
                        :size="{ height: '300px', width: '500px' }"
                        :width="width_detailed_2"
                        :height="height_detailed_2"
                        :image="{ full: work.cover_desc_detailed_2_full, small: work.cover_desc_detailed_2_small }"
                        v-if="show_image"
                        alttext="Supernova"
                        zoomlevel="1.5"
                    ></zoom-lens-image>

                    <p v-html="work.text_detailed_2"></p>
                </div>

            </div>
        </section>

        <BlockAppearance>
            <router-link :to="'/work/' + next_work.id" class="next-work">
                <div class="content width-restricted">
                    <h5 class="next-work-lead">Следующая работа</h5>
                    <h4 class="next-work-title">{{ next_work.title }}</h4>
                    <div class="next-work-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 476.213 476.213">
                            <path
                                d="M405.606 167.5l-21.212 21.213 34.393 34.393H0v30h418.787L384.394 287.5l21.212 21.213 70.607-70.607"></path>
                        </svg>
                    </div>
                </div>
            </router-link>
        </BlockAppearance>
    </div>
</template>

<script lang="ts">
import store from "../store/store.js";
import axios from "axios";
import {Work} from "../interfaces/Work";
import Header from "../components/Header.vue";
import TextOverlay from "../components/ui/TextOverlay.vue";
import Button from "../components/ui/Button.vue";
import Link from "../components/ui/Link.vue";
import BlockAppearance from "../components/ui/BlockAppearance.vue";
import ZoomLensImage from "../components/ui/zoomLensImage.vue";

export default {
    name: "PageWork.vue",
    components: {
        ZoomLensImage,
        BlockAppearance,
        Link,
        Header,
        TextOverlay,
        Button,
        Image
    },
    data() {
        return {
            work: {} as Work,
            next_work: {} as Work,
            cover_card: "",
            all_works: [],
            height_detailed_1: "",
            width_detailed_1: "",
            height_detailed_2: 0,
            width_detailed_2: 0,
            show_image: false,
        };
    },
    watch: {
        '$route.params.id': 'fetchData'
    },
    methods: {

        get_image_size(path) {
            // Получаем размеры изображений
            const photoUrl = path;
            const image = new Image();
            return new Promise((resolve, reject) => {
                image.onload = () => {
                    const dimensions = {
                        height: image.height,
                        width: image.width,
                    };
                    const result = {
                        height: dimensions.height,
                        width: dimensions.width,
                    };
                    resolve(result);
                };
                image.onerror = (error) => {
                    reject(error);
                };
                image.src = photoUrl;
            });
        },

        async fetchData() {
            store.commit('setPageTransitionVisible', true)
            axios.get('/api/all-works')
                .then(async response => {
                    this.all_works = response.data;
                    this.work = this.all_works[this.$route.params.id - 1];
                    if (this.work) {
                        this.cover_card = "url(" + this.work.cover_full + ")";

                        if (this.$route.params.id < this.all_works.length) {
                            this.next_work = this.all_works[this.$route.params.id];
                        } else {
                            this.next_work = this.all_works[this.$route.params.id - 2];
                        }

                        const dimensions_1 = await this.get_image_size(this.work.cover_desc_detailed_1_small);
                        const dimensions_2 = await this.get_image_size(this.work.cover_desc_detailed_2_small);

                        this.height_detailed_1 = dimensions_1.height
                        this.width_detailed_1 = dimensions_1.width
                        this.height_detailed_2 = dimensions_2.height
                        this.width_detailed_2 = dimensions_2.width

                    }


                    this.show_image = true

                    setTimeout(() => {
                        store.commit('setPageTransitionVisible', false)
                    }, 1000)
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.fetchData(); // Вызывается при первой загрузке компонента

    }
}
</script>

<style lang="scss">
@import "/resources/scss/app";

.page-work .welcome-wrap .info-wrap p {
    font-family: 'EB Garamond', serif;
    line-height: 30px;
    letter-spacing: 2px;
    font-size: 26px;
    color: $color-main-bright;

}

ul {
    li {
        margin-top: 20px;

        @include media-tablets-768 {
            list-style-type: none;
        }
    }

    @include media-tablets-768 {
        padding: 0;
    }
}
</style>

<style lang="scss" scoped>
@import "/resources/scss/app";

//img {
//    transition: -webkit-transform .3s;
//    transition: transform .3s;
//    transition: transform .3s, -webkit-transform .3s;
//
//    &:hover {
//        -webkit-transform: scale(1.01);
//        transform: scale(1.01);
//    }
//
//}

.welcome-wrap {
    position: relative;
    height: 90vh;
    width: 100%;
    background-position: 50%;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: v-bind('cover_card');

    .work-page-header {
        background: rgba(28, 29, 37, .95) /*  10% opaque green */
    }

    &:before {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        display: block;
        content: " ";
        background: #000;
        opacity: .55;
        transition: opacity .3s ease;
        z-index: 2;
    }

    &:after {
        content: "";
        position: absolute;
        z-index: 1;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 30%;
        background-size: 100%;
        background-image: linear-gradient(0deg, rgba(0, 0, 0, .7), transparent);
    }

    .info-wrap {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
        z-index: 2;

        h1 {
            font-size: 60px;
            margin-bottom: 20px;

            @include media-tablets-768 {
                font-size: 40px;
            }


            @media (max-width: 400px) {
                font-size: 30px;
            }
        }

        @include media-tablets-768 {
            width: 90%;
        }
    }
}

.intro-block-wrap {
    width: 100%;
    padding: 50px 5%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 30px;
    background: $color-main-dark;

    p {
        color: white;
        width: 90%;
        max-width: 1000px;

        @include media-tablets-768 {
            text-align: center;
            margin: auto;
        }
    }
}

.divider {
    width: 30%;
    height: 6px;
    background-color: #168dd9;
    margin: 20px 0;
}

.detailed-info-wrap {
    padding: 50px 0;

    .info-wrap {
        display: flex;
        flex-direction: column;
        gap: 60px;

        .block-general {
            display: flex;
            flex-direction: row;
            gap: 10px;

            .text {
                width: 50%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                //gap: 20px;
            }

            img {
                width: 50%;
                height: min-content;

                @include media-desktops-1200 {
                    width: 60%;
                }
            }


            @include media-laptops-1024 {
                flex-direction: column;
                align-items: center;

                .text, img {
                    width: 90%;
                    align-items: center;
                }

                img {
                    max-width: 550px;
                }
            }
        }

        .block-stacks {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;

            .stacks-wrap {
                display: flex;
                gap: 20px;
                flex-wrap: wrap;

                .stack {
                    padding: 5px 20px;
                    border-radius: 10px;
                    color: white;
                }
            }

            @include media-tablets-768 {
                &, .stacks-wrap {
                    align-items: center;
                    justify-content: center;
                }


            }
        }

        .block-examples {
            img {
                //width: 100%;
            }

            @include media-tablets-768 {
                display: flex;
                flex-direction: column;
                align-items: center;

                img {
                    max-width: 90%;
                }
            }
        }
    }


}

.next-work {
    display: block;
    width: 100%;
    padding: 45px 0;
    position: relative;
    overflow: hidden;
    background-color: #fff;
    border-top: 1px solid #eee;

    .content {
        position: relative;
        z-index: 20;

        .next-work-lead, .next-work-title {
            transition: color .4s ease .25s;
        }

        .next-work-lead {
            text-transform: uppercase;
            color: #b19386;
            font-size: .75em;
            font-weight: 400;
            margin-bottom: 25px;
        }

        .next-work-title {
            font-size: 30px;
            color: $color-main-dark;

            @include media-tablets-768 {
                font-size: 25px;
                max-width: 60%;
            }
        }
    }

    &:after, &:before {
        content: "";
        position: absolute;
        top: 0;
        display: block;
        width: 100%;
        left: 0;
        height: 100%;
        transition: -webkit-transform .38s cubic-bezier(.694, .048, .335, 1);
        transition: transform .38s cubic-bezier(.694, .048, .335, 1);
        transition: transform .38s cubic-bezier(.694, .048, .335, 1), -webkit-transform .38s cubic-bezier(.694, .048, .335, 1);
        -webkit-transform: translateY(-100%);
        transform: translateY(-100%);
    }

    &:after {
        background-color: #060c10;
        z-index: 1;
    }

    &:before {
        background-color: #00c8e7;
        transition-delay: .12s;
        z-index: 2;
    }

    .next-work-arrow {
        position: absolute;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 100px;
        top: 65%;
        width: 150px;
        height: 70px;
        opacity: .7;
        transition: -webkit-transform .25s cubic-bezier(.694, .048, .335, 1);
        transition: transform .25s cubic-bezier(.694, .048, .335, 1);
        transition: transform .25s cubic-bezier(.694, .048, .335, 1), -webkit-transform .25s cubic-bezier(.694, .048, .335, 1);
        z-index: 2;

        svg {
            width: 150px;
            height: 70px;
        }

        @include media-tablets-768 {
            right: 10px;
        }

        @include media-mobiles-480 {
            right: 0;
        }
    }


    &:hover {
        &:after, &:before {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .next-work-arrow {
            transition-delay: .3s;
            -webkit-transform: translate(20%, -50%);
            transform: translate(20%, -50%);
        }

        .next-work-lead, .next-work-title {
            color: #fff;
        }
    }


}

.footer {
    opacity: 0;
}
</style>
