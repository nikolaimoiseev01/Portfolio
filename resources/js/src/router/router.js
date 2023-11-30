import {createMemoryHistory, createRouter, createWebHistory} from "vue-router";
import routes from "@/src/router/routes.js";

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createMemoryHistory(),
    routes, // short for `routes: routes`
})


export default router;
