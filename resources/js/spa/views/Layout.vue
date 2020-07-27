<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light blue lighten-4">
            <div class="container">
                <ul class="navbar-nav">
                    <router-link tag="li" class="nav-item" active-class="active" to="/tasks">
                        <a class="nav-link"> Tasks</a>
                    </router-link>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            name <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                logout
                            </a>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <router-view></router-view>
            </div>
        </main>
    </div>
</template>
<script>
export default {
    watch: {
        '$route'(to) {
            document.title = to.meta.title
        }
    },
}
</script>
