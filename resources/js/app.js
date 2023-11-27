import {createApp} from "vue";
import App from "./src/App.vue";
import Router from "./src/router/router.js";
import Store from "./src/store/store.js";
import VueKinesis from "vue-kinesis";
import Vue3SmoothScroll from "vue3-smooth-scroll";

createApp(App)
    .use(Store)
    .use(Router)
    .use(Vue3SmoothScroll, {
        duration: 4000
    })
    .use(VueKinesis)
    .mount('#app')
