import {createRouter, createWebHistory} from "vue-router";
import routes from "@/src/router/routes.js";

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        // back / forward
        if (savedPosition) {
            return savedPosition
        }

        // якоря
        if (to.hash) {
            return {
                el: to.hash,
                behavior: 'smooth'
            }
        }

        // обычный переход
        return { top: 0 }
    }
})

router.beforeEach((to, from, next) => {
    // Сохранение необходимых значений состояния
    const savedState = { scrollPosition: window.scrollY };

    // Замена состояния истории с сохраненными значениями
    history.replaceState(savedState, '');

    // Продолжение навигации
    next();
});

export default router;
