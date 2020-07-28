<template>
    <b-row class="justify-content-md-center">
        <b-col md="8">
            <b-card title="Login">
                <b-card-text>
                    <b-form @submit.prevent="handleLogin">
                        <b-form-group
                            id="input-group-1"
                            label="Username"
                            label-for="username"
                        >
                            <b-form-input
                                id="username"
                                v-model="form.username"
                                type="text"
                                required
                                placeholder="Username"
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group id="input-group-2" label="Password" label-for="password">
                            <b-form-input
                                id="password"
                                type="password"
                                v-model="form.password"
                                required
                            ></b-form-input>
                        </b-form-group>

                        <b-button type="submit" variant="primary">Submit</b-button>
                        <b-button type="reset" variant="danger">Reset</b-button>
                    </b-form>
                </b-card-text>
            </b-card>
        </b-col>


    </b-row>
</template>

<script>
import { mapMutations, mapState, mapActions, mapGetters } from 'vuex'
export default {
    name: "LoginComponent",
    data() {
        return {
            form: {
                username: 'aroslava99',
                password: 'password',
            },
        }
    },

    computed: {
        ...mapState(["user", "isLoading"]),
        ...mapGetters(["auth"]),
    },
    methods: {
        ...mapActions(['checkAuth', 'handleLogout']),
        ...mapMutations(['toggleLoading']),
        handleLogin() {
            this.toggleLoading(true)
            axios.get('/sanctum/csrf-cookie')
                .then(() => {
                    axios.post('/login', this.form).then(() => {
                        this.checkAuth();
                    })
                })
                .catch(response => console.log(response))
                .finally(() => this.toggleLoading(false))
        },
    }
}
</script>

<style scoped>

</style>
