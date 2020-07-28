import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        isLoading: true,
        user: {},
        tasks: [],
    },
    getters: {
        auth(state) {
            return !!state.user.first_name;
        }
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        toggleLoading(state, payload) {
            state.isLoading = payload
        },
        setTasks(state, tasks) {
            state.tasks = tasks;
        },
    },
    actions: {
        checkAuth({commit, dispatch, getters}) {
            if (!getters.auth) {
                axios.get('/api/user')
                    .then(({data}) => {
                        commit('setUser', data)
                        dispatch('getTasks');

                    })
                    .catch((res) => console.log(res))
                    .finally(() => commit('toggleLoading', false))
            }
        },
        handleLogout({commit}) {
            commit('toggleLoading', true)
            axios.post('/logout')
                .then(() => {
                    commit('setUser', {})
                    commit('toggleLoading', false)
                })
        },
        getTasks({commit}, groupBy) {
            axios.get('api/tasks', {params: {groupBy}})
                .then(({data}) => {
                    commit('setTasks', data)
                })
        }

    }
})
