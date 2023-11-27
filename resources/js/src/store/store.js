import { createApp } from 'vue'
import { createStore } from 'vuex'

// Create a new store instance.
const store = createStore({
    state () {
        return {
            footerVisible: false,
            contactFormVisible: false,
            pageTransitionVisible: true
        }
    },
    mutations: {
        setFooterVisible (state, value) {
            state.footerVisible = value;
        },
        setContactFormVisible (state, value) {
            state.contactFormVisible = value;
        },
        setPageTransitionVisible (state, value) {
            state.pageTransitionVisible = value;
        }
    }
})

export default store;
