import Home from "@/src/pages/Home.vue";
import Works from "@/src/pages/Works.vue";
import PageWork from "@/src/pages/PageWork.vue";

const routes = [
    {
        path: '/',
        component: Home,
        meta: { transition: 'slide-right' },
    },
    {
        path: '/works',
        component: Works,
        meta: { transition: 'slide-right' },
    },
    {
        path: '/work/:id',
        component: PageWork,
        meta: { transition: 'slide-right' },
    }
]

export default routes
