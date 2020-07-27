<template>
    <div>
        <div class="row mt-4" v-if="!auth">
            <div class="col-6">
                <form action="#" @submit.prevent="handleLogin">
                    <div class="form-row mt-3">
                        <input type="text" name="username" v-model="from.username" class="form-control">
                    </div>
                    <div class="form-row mt-3">
                        <input type="password" name="password" v-model="from.password" class="form-control">
                    </div>
                    <div class="from-row mt-3">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>

            </div>
        </div>
        <div v-else>logged {{user}}</div>
    </div>
</template>

<script>
import { mapMutations, mapState, mapActions, mapGetters } from 'vuex'
export default {
    name: "Login",
    data() {
        return {
            secrets: [],
            token: null,
            from: {
                username: '',
                password: '',
            }
        }
    },
    beforeMount() {
      this.checkAuth();
    },
    computed: {
        ...mapState(["user"]),
        ...mapGetters(["auth"]),
    },
    methods: {
        ...mapMutations(['setUser']),
        ...mapActions(['checkAuth']),
        handleLogin() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/login', this.from).then(() => {
                        this.checkAuth();
                    })
                })

        },
    }
}
</script>

<style scoped>

</style>
