import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';
import Login from './views/Login'
import Tasks from './views/Tasks'
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Login,
            name: 'Login',
            meta: {
                title: 'Login'
            }
    },
        {
            path: '/tasks',
            component: Tasks,
            name: 'Tasks',
            meta: {
                title: 'Tasks'
            }
    },
    ]
});

router.beforeEach((to, from, next) => {
    if (to.name !== 'Login' && !store.state.user.first_name) next({ name: 'Login' })
    else next()
})

export default router;
