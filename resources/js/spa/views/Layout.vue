<template>
    <div>
        <b-navbar toggleable="lg">
            <b-container>
                <b-navbar-brand href="#">etodo</b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>


                    <!-- Right aligned nav items -->
                    <b-navbar-nav class="ml-auto">
                        <b-nav-item-dropdown :text="user.name" right v-if="auth">
                            <b-dropdown-item @click="handleLogout">Logout</b-dropdown-item>
                        </b-nav-item-dropdown>

                    </b-navbar-nav>
                </b-collapse>
            </b-container>
        </b-navbar>
        <main class="py-4">
            <b-container>
                <b-overlay :show="isLoading">
                    <login-component v-if="!auth"/>
                    <dashboard-component v-else/>
                </b-overlay>
            </b-container>

        </main>
    </div>
</template>
<script>
import {mapActions, mapGetters, mapState, mapMutations} from "vuex";
import LoginComponent from "./components/LoginComponent";
import DashboardComponent from "./components/DashboardComponent";


export default {
    components: {DashboardComponent, LoginComponent},
    data() {
        return {}
    },
    beforeMount() {
        this.checkAuth();
    },
    computed: {
        ...mapState(["user", "isLoading", "tasks"]),
        ...mapGetters(["auth"]),
    },
    methods: {
        ...mapActions(['checkAuth', 'handleLogout']),
        ...mapMutations(['toggleLoading']),

    }
}
</script>
