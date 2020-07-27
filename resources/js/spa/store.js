import Vue from 'vue'
import Vuex from 'vuex'
import router from './router'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        user: {}
    },
    getters: {
        auth(state) {
            return  !!state.user.first_name;
        }
    },
    mutations: {
        setUser (state, payload) {
            state.user = payload;
        }
    },
    actions: {
        checkAuth({commit, state, getters}) {
            if(!getters.auth) {
                axios.get('/api/user')
                    .then(({data}) => {
                        commit('setUser', data)
                        router.push({ name: 'Tasks'})
                    })
                    .catch((res) => console.log(res));
            }
        }
    }
})
