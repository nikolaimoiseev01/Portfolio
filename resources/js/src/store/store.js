import {createApp} from 'vue'
import {createStore} from 'vuex'

// Create a new store instance.
const store = createStore({
    state() {
        return {
            pageFullyLoaded: false,
            mainPageHidden: false,
            footerVisible: false,
            contactFormVisible: false,
            pageTransitionVisible: true,
            mobileMenuVisible: false
        }
    },
    mutations: {
        setPageFullyLoaded(state, value) {
            state.pageFullyLoaded = value;
        },
        setMainPageHidden(state, value) {
            state.mainPageHidden = value;
        },
        setFooterVisible(state, value) {
            state.footerVisible = value;
        },
        setContactFormVisible(state, value) {
            state.contactFormVisible = value;
        },
        setPageTransitionVisible(state, value) {
            state.pageTransitionVisible = value;
        },
        setMobileMenuVisible(state, value) {
            state.mobileMenuVisible = value;
        }
    }
})

export default store;
