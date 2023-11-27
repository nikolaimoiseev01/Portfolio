<template>
    <div :class="computedClasses" class="contact-about-block-wrap">
        <div class="contact-about-wrap">
            <div class="about-wrap">
                <div class="giga-text">Обо мне</div>
                <h2>Обо мне</h2>
                <p>
                    Я - Коля. Уже 7 лет занимаюсь WEB-програмированием.
                    Начал с сайтов на <strong>Wix, Tilda</strong> и дошел до полностью самописных онлайн платформ.
                    Я использую разные технологии, но чаще всего в своих проектах использую связку
                    <strong>Laravel+Vue</strong>.
                    <br>
                    В моей команде есть <strong>дизайнеры и SEO-специалисты</strong>. Так мы можем охватить весь
                    жизненный цикл сайта,
                    начиная от дизайна с нуля до выведения сайта в ТОП-10 поисковых платформ.
                    Помимо фриланса, сейчас работаю в <strong>Тинькофф</strong> и увлекаюсь барабанами.
                </p>
                <ul class="about-me-list">
                    <li class="vue">
                        <div class="about-me-list-label">React.js</div>
                        <svg id="svg8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 55.5">
                            <path id="path4" class="cls-1" d="m39.33,0l-7.33,12.83L24.67,0H0l32,55.5L64,0h-24.67Z"/>
                            <path id="path6" class="cls-2"
                                  d="m39.33,0l-7.33,12.83L24.67,0h-11.83l19.17,33.33L51.17,0h-11.83Z"/>
                        </svg>
                    </li>
                    <li class="uiux">
                        <div class="about-me-list-label">UI/UX</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128">
                            <path
                                d="M74.6 96.7c1 0 1.9-.8 1.9-1.9s-.9-1.8-1.9-1.8H50.4c-1 0-1.9.8-1.9 1.9s.8 1.9 1.9 1.9h24.2zM83.9 100.4H41.1c-1 0-1.9.8-1.9 1.9s.8 1.9 1.9 1.9H84c1 0 1.9-.8 1.9-1.9s-.9-1.9-2-1.9zM20.6 12.8c-4.1 0-7.5 3.3-7.5 7.5s3.3 7.5 7.5 7.5 7.5-3.3 7.5-7.5-3.4-7.5-7.5-7.5zm0 11.2c-2.1 0-3.7-1.7-3.7-3.7s1.7-3.7 3.7-3.7 3.7 1.7 3.7 3.7-1.7 3.7-3.7 3.7zM37.3 12.8c-4.1 0-7.5 3.3-7.5 7.5s3.3 7.5 7.5 7.5 7.5-3.3 7.5-7.5-3.4-7.5-7.5-7.5zm0 11.2c-2.1 0-3.7-1.7-3.7-3.7s1.7-3.7 3.7-3.7c2.1 0 3.7 1.7 3.7 3.7S39.4 24 37.3 24zM54.1 12.8c-4.1 0-7.5 3.3-7.5 7.5s3.3 7.5 7.5 7.5 7.5-3.3 7.5-7.5-3.4-7.5-7.5-7.5zm0 11.2c-2.1 0-3.7-1.7-3.7-3.7s1.7-3.7 3.7-3.7c2.1 0 3.7 1.7 3.7 3.7S56.2 24 54.1 24z"></path>
                            <path
                                d="M7.5 7.2V119h111.8V7.2H7.5zm3.7 3.8h104.4v18.6H11.2V11zm104.4 104.3H11.2v-82h104.4v82z"></path>
                            <path
                                d="M47.5 81.4l1.7 1.4c.1 0 .1.1.2.1.4.3.7.5 1.1.7.2.1.5.3.7.4.4.2.7.4 1.1.6.3.2.6.3.9.5.3.1.6.3.9.4.6.3 1.3.5 1.9.7.2.1.5.1.7.2.5.1 1 .3 1.5.4.3.1.5.1.8.2.5.1 1 .2 1.5.2.2 0 .5.1.7.1.7.1 1.5.1 2.2.1s1.5 0 2.2-.1c.2 0 .5-.1.7-.1.5-.1 1-.1 1.5-.2.3 0 .5-.1.8-.1.5-.1 1-.2 1.5-.4.2-.1.4-.1.7-.2.6-.2 1.3-.4 1.9-.7.3-.1.6-.3.9-.4.3-.2.7-.3 1-.5.4-.2.7-.4 1-.6.2-.1.5-.3.7-.4.4-.2.7-.5 1.1-.7.1 0 .1-.1.2-.1l1.9-1.4-.1-.1c5.1-4.4 8.3-10.9 8.3-18.2C87.7 49.8 76.8 39 63.5 39S39.2 49.8 39.2 63.1c0 7.3 3.2 13.8 8.3 18.3zM58.4 83c-.7-.2-1.5-.4-2.2-.7-.1 0-.2-.1-.2-.1-.7-.3-1.5-.6-2.2-1l4.5-2.5c1.4-.8 2.3-2.2 2.3-3.8v-3.1l-.4-.5s-1.5-1.8-2.1-4.3l-.2-.9-.6-.4.1-2.8.6-.6v-4.9c0-.1-.1-1.4.8-2.5.9-1 2.5-1.5 4.8-1.5s3.9.5 4.8 1.5c1 1.1.8 2.4.8 2.5v4.1l.1.9.6.6v2.7c0 .1-.1.1-.1.1l-.9.3-.3.9c-.4 1.3-1 2.5-1.8 3.5-.2.2-.3.5-.5.6l-.5.5V75c0 1.6.9 3.1 2.4 3.9l4.8 2.4h-.1c-.7.3-1.3.6-2 .9-.1 0-.2.1-.3.1-.7.3-1.4.5-2.2.7-3.4.8-6.7.8-10 0 .1 0 0 0 0 0zm5-40.4c11.3 0 20.5 9.2 20.5 20.5 0 6.4-2.9 12.1-7.5 15.8-.1-.1-.2-.1-.3-.2l-6.5-3.2c-.2-.1-.3-.3-.3-.5v-1.9c.1-.1.2-.2.3-.4.8-1.1 1.5-2.4 2-3.8 1.1-.7 1.8-1.9 1.8-3.3v-2.7c0-.8-.2-1.5-.7-2.2v-3.1c.1-.7.1-3.1-1.7-5.2-1.6-1.8-4.2-2.8-7.6-2.8s-6 .9-7.6 2.8C54 54.5 54 57 54.1 57.6v3.1c-.4.6-.7 1.4-.7 2.2v2.7c0 1 .4 2 1.1 2.7.6 2.1 1.6 3.8 2.2 4.6V75c0 .2-.1.4-.3.5l-6 3.3c-.1 0-.1.1-.2.1-4.5-3.8-7.4-9.4-7.4-15.8.1-11.3 9.3-20.5 20.6-20.5z"></path>
                        </svg>
                    </li>
                    <li class="laravel">
                        <div class="about-me-list-label">Laravel</div>
                        <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 49.65 51.12">
                            <path class="cls-1"
                                  d="m49.63,11.56c.02.07.03.14.03.21v10.97c0,.29-.15.55-.4.69l-9.21,5.3v10.51c0,.29-.15.55-.4.69l-19.22,11.07s-.09.04-.14.06c-.02,0-.03.02-.05.02-.13.04-.28.04-.41,0-.02,0-.04-.02-.06-.03-.04-.02-.09-.03-.13-.05L.4,39.94c-.25-.14-.4-.41-.4-.69V6.33c0-.07,0-.14.03-.21,0-.02.02-.04.03-.07.02-.04.03-.09.05-.12.02-.03.04-.05.05-.07.02-.03.04-.07.07-.09.02-.02.05-.04.08-.06.03-.02.06-.05.09-.07h0L10.01.11c.25-.14.55-.14.8,0l9.61,5.53h0s.06.05.09.07c.03.02.06.04.08.06.03.03.05.06.07.09.02.02.04.05.05.07.02.04.04.08.05.12,0,.02.02.04.03.07.02.07.03.14.03.21v20.56l8.01-4.61v-10.51c0-.07.01-.14.03-.21,0-.02.02-.05.03-.07.02-.04.03-.09.05-.12.01-.03.04-.05.05-.07.02-.03.04-.06.07-.09.02-.02.05-.04.08-.06.03-.02.06-.05.09-.07h0l9.61-5.53c.25-.14.55-.14.8,0l9.61,5.53s.06.05.09.07c.03.02.05.04.08.06.03.03.05.06.07.09.02.02.04.05.05.07.02.04.04.08.05.12,0,.02.02.04.03.07Zm-1.57,10.72v-9.12l-3.36,1.94-4.65,2.67v9.12l8.01-4.61h0Zm-9.61,16.51v-9.13l-4.57,2.61-13.05,7.45v9.22s17.62-10.14,17.62-10.14ZM1.6,7.72v31.07l17.62,10.14v-9.21l-9.2-5.21h0s0,0,0,0c-.03-.02-.06-.04-.09-.07-.02-.02-.05-.04-.08-.06h0s-.04-.06-.07-.09c-.02-.03-.04-.05-.06-.08h0s-.03-.07-.04-.1c-.01-.03-.03-.06-.04-.09h0s-.01-.08-.02-.12c0-.03-.01-.06-.01-.09h0V12.33l-4.64-2.68-3.36-1.93h0ZM10.41,1.72L2.4,6.33l8,4.61,8.01-4.61L10.41,1.72h0Zm4.16,28.76l4.65-2.67V7.72l-3.36,1.94-4.65,2.68v20.1s3.36-1.94,3.36-1.94ZM39.24,7.16l-8.01,4.61,8.01,4.61,8.01-4.61s-8.01-4.61-8.01-4.61Zm-.8,10.6l-4.65-2.68-3.36-1.94v9.12l4.65,2.67,3.36,1.94s0-9.12,0-9.12Zm-18.42,20.56l11.74-6.7,5.87-3.35-8-4.61-9.21,5.3-8.4,4.83s7.99,4.52,7.99,4.52Z"/>
                        </svg>
                    </li>
                    <li class="django">
                        <div class="about-me-list-label">Django</div>
                        <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 470.25 600">
                            <path class="cls-1"
                                  d="m213.5,0h99.13v454.23c-42.31,8.68-85.38,13.16-128.57,13.37C63,467.48,0,413.4,0,309.55s66.82-165,170.4-165c14.53-.28,29.02,1.4,43.1,5V0h0Zm0,228.55c-10.78-3.55-22.08-5.25-33.42-5-50,0-79.08,30.58-79.08,84.15s27.68,80.98,78.45,80.98c11.4,0,22.78-.84,34.05-2.5v-157.63Z"/>
                            <path class="cls-1"
                                  d="m470.12,151.48v227.5c0,78.32-5.88,115.97-23.08,148.45-17.55,33.02-46.26,58.74-81,72.57l-91.95-43.32c33.4-11.44,61.38-34.86,78.53-65.72,14.15-28.03,18.63-60.5,18.63-145.92v-193.55h98.87Z"/>
                            <rect class="cls-1" x="371.15" y=".5" width="99.1" height="100.7"/>
                        </svg>
                    </li>
                </ul>

                <div class="detailed-contacts-wrap">
                    <p>Telegram: <strong style="color: #0088cc;">tomas232</strong></p>
                    <p>Email: <strong style="color: #f2a60c">nikolaimoiseev01@gmail.com</strong></p>
                    <p>Instagram: <strong style="color: #d6249f">kick__nick</strong></p>
                </div>

            </div>
            <div class="contact-wrap">
                <PageTransition class="part-page" :transitionMode="transitionMode"/>
                <div class="giga-text">Связаться</div>
                <form v-if="!formSubmitted" @submit.prevent="submitForm" action="">
                    <h2>Давайте обсудим ваш проект</h2>
                    <InputText v-model="formData.name">Имя</InputText>
                    <InputText v-model="formData.contacts">
                        Ваши контакты
                        <span>(Телефон/Telegram/Email)</span>
                    </InputText>
                    <InputText v-model="formData.desc">Кратко опишите ваш проект</InputText>
                    <Button :buttonMode="buttonMode">Отправить сообщение</Button>
                </form>

                <div v-if="formSubmitted" class="form-submitted-wrap">
                    <h2>Спасибо! Я скоро с вами свяжусь.</h2>
                    <a @click="makeFormBack" class="link">Заполнить еще раз</a>
                </div>
                <div @click="closeContactForm" class="close-contact"><span></span><span></span></div>
            </div>
        </div>
    </div>


</template>

<script>
import InputText from "@/src/components/ui/InputText.vue";
import Button from "@/src/components/ui/Button.vue";
import axios from "axios";
import store from "@/src/store/store.js";
import PageTransition from "@/src/pages/PageTransition.vue";

export default {
    name: "ContactForm",
    data() {
        return {
            formData: {
                name: '',
                contacts: '',
                desc: '',
            },
            transitionMode: false,
            formSubmitted: false
        };
    },
    computed: {
        buttonMode() {
            // Проверяем, все ли поля заполнены
            if (
                this.formData.name.trim() !== '' &&
                this.formData.contacts.trim() !== '' &&
                this.formData.desc.trim() !== ''
            ) {
                // Если все поля заполнены, делаем кнопку активной
                return 'active';
            } else {
                // Иначе делаем кнопку неактивной
                return 'disabled';
            }
        },
        computedClasses() {
            return {
                'active': store.state.contactFormVisible,
            };
        },

    },
    components: {
        InputText,
        Button,
        PageTransition
    },
    methods: {
        submitForm() {
            this.transitionMode = true
            // Здесь вы можете использовать значения переменных
            axios.post('/api/make-contact', this.formData) // Ваш маршрут из Laravel
                .then(response => {
                    setTimeout(() => {
                        this.formSubmitted = true
                        this.formData.name = ""
                        this.formData.contacts = ""
                        this.formData.desc = ""
                    }, 1000)
                    setTimeout(() => {
                        this.transitionMode = false
                    }, 2000)
                })
                .catch(error => {
                    console.error(error);
                });

            // Добавьте здесь логику для отправки сообщения
        },

        makeFormBack() {
            this.transitionMode = true
            setTimeout(() => {
                this.formSubmitted = false
            }, 1000)
            setTimeout(() => {
                this.transitionMode = false
            }, 2000)
        },

        closeContactForm() {
            store.commit('setContactFormVisible', false)
        }
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/app";

.contact-about-block-wrap {
    background: rgba(17, 17, 17, 0.82);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    visibility: hidden;
    opacity: 0;
    z-index: -1;
    transition: visibility 1s, opacity 1s, z-index 1s, box-shadow .3s;


    .contact-about-wrap {
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: flex;
        width: 1000px;
        height: 90%;
        position: fixed;
        overflow: hidden;
        /*visibility: hidden;*/
        transition: visibility 1s, z-index 1s, box-shadow .3s;
        z-index: 60;
        visibility: hidden;

        .giga-text {
            font-size: 100px;
            position: absolute;
            opacity: .07;
            font-family: 'Unbounded-ExtraBold';
            z-index: 0;
        }

        .about-wrap {
            width: 50%;
            background: $color-main-bright;
            display: flex;
            flex-direction: column;
            gap: 30px;
            padding: 80px 40px 0 40px;
            align-items: center;
            position: relative;
            overflow: hidden;
            top: 200px;
            transition: .45s cubic-bezier(.694, .048, .335, 1);
            opacity: 0;

            h2 {
                color: $color-main-dark;
            }

            .giga-text {
                top: -10px;
                left: 100px;
                color: #4a4a4a;
                text-wrap: nowrap;
            }

            p {
                color: $color-main-dark;

                strong {
                    color: #f06449;
                }
            }

            .about-me-list {
                list-style-type: none;
                display: flex;
                gap: 30px;
                padding: 0;

                li {
                    clear: none;
                    position: relative;
                    text-align: center;

                    svg {
                        filter: grayscale(100%);
                        width: 60px;
                        height: 60px;
                        margin: 0 auto;
                        display: block;
                        transition: all .3s;
                    }

                    .about-me-list-label {
                        position: absolute;
                        bottom: -25px;
                        left: 0;
                        width: 100%;
                        -webkit-transform: translateY(5px);
                        transform: translateY(5px);
                        font-size: .75em;
                        font-family: League Spartan, Helvetica, Arial, sans-serif;
                        opacity: 0;
                        transition: opacity .3s, -webkit-transform .3s cubic-bezier(.694, .048, .335, 1);
                        transition: opacity .3s, transform .3s cubic-bezier(.694, .048, .335, 1);
                        transition: opacity .3s, transform .3s cubic-bezier(.694, .048, .335, 1), -webkit-transform .3s cubic-bezier(.694, .048, .335, 1);
                    }


                    &:hover {
                        svg {
                            filter: none;
                        }

                        .about-me-list-label {
                            opacity: 1;
                            -webkit-transform: translateY(0);
                            transform: translateY(0);
                        }
                    }
                }

                .vue {
                    .cls-1 {
                        fill: #42b883;
                    }

                    .cls-2 {
                        fill: #35495e;
                    }
                }

                .uiux {
                    svg path {
                        fill: #26408b;
                    }
                }

                .laravel {
                    .cls-1 {
                        fill: #ff2d20;
                        fill-rule: evenodd;
                    }
                }

                .django {
                    //width: 80px;

                    .cls-1 {
                        fill: #44b78b;
                    }
                }


            }

            .detailed-contacts-wrap {
                margin-top: 20px;
            }
        }

        .contact-wrap {
            width: 50%;
            display: flex;
            flex-direction: column;
            gap: 30px;
            //justify-content: center;
            align-items: flex-start;
            //padding: 40px;
            position: relative;
            overflow: hidden;
            background-color: $color-main-dark;
            bottom: 200px;
            transition: .45s cubic-bezier(.694, .048, .335, 1);
            opacity: 0;

            .giga-text {
                bottom: 0;
                left: 100px;
                color: #fff;
                opacity: 0.03;
            }

            form {
                display: flex;
                padding: 80px 40px 0 40px;
                flex-direction: column;
                gap: 40px;

                h2 {
                    color: $color-main-bright;
                    text-align: center;
                    margin-bottom: 20px;
                }

                .button {
                    margin-top: 20px;
                }

                span {
                    font-size: 12px;
                    color: #b1b1b1;
                }
            }

            .close-contact {
                position: absolute;
                display: block;
                padding: 12px;
                top: 10px;
                right: 10px;
                cursor: pointer;
                color: #fff;
                width: 35px;
                height: 35px;
                transition: all .3s ease;
                z-index: 10;

                span {
                    position: absolute;
                    top: 18px;
                    width: 100%;
                    height: 3px;
                    background-color: #e3d8d3;
                    transition: all .4s cubic-bezier(.694, .048, .335, 1);

                    &:first-child {
                        left: 0;
                        -webkit-transform: rotate(45deg);
                        transform: rotate(45deg);
                    }

                    &:last-child {
                        right: 0;
                        -webkit-transform: rotate(-45deg);
                        transform: rotate(-45deg);
                    }

                    &:before, &:after {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 0;
                        height: 100%;
                    }

                    &:before {
                        background-color: #f06449;
                        transition: all .3s ease;
                    }

                    &:after {
                        background-color: #f3f3f3;
                        transition: all .3s ease .3s;
                    }

                }

                &:hover {
                    -webkit-transform: scale(1.1);
                    transform: scale(1.1);

                    span:first-child {
                        -webkit-transform: rotate(-45deg);
                        transform: rotate(-45deg);
                    }

                    span:last-child {
                        -webkit-transform: rotate(45deg);
                        transform: rotate(45deg);
                    }

                    span:before, span:after {
                        width: 100%;
                    }
                }
            }

            .form-submitted-wrap {
                display: flex;
                flex-direction: column;
                gap: 20px;
                align-items: center;
                justify-content: center;
                height: 100%;

                h2 {
                    color: $color-main-bright;
                    text-align: center;
                }
            }
        }


    }

    &.active {
        visibility: visible;
        opacity: 1;
        z-index: 10;

        .contact-about-wrap {
            visibility: visible;
            box-shadow: 0 20px 80px 0 rgba(0, 0, 0, .55);
            z-index: 60;
            transition: visibility 1s, z-index 1s, box-shadow .5s ease .4s;

            .about-wrap {
                top: 0;
                opacity: 1;
            }

            .contact-wrap {
                bottom: 0;
                opacity: 1;
            }
        }

    }


}

</style>
