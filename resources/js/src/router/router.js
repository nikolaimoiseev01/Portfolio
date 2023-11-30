import {createRouter, createWebHistory} from "vue-router";
import routes from "@/src/router/routes.js";

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
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
