<template>
    <b-row class="justify-content-md-center" >
        <b-col md="8">
            <b-card no-body title="Tasks">
                <b-card-body>
                    <b-row class="mb-3">
                        <b-col sm="auto">
                            Group by
                        </b-col>
                        <b-col>
                            <b-button-group>
                                <b-button variant="outline-primary"
                                          @click="loadTasks('date')"
                                          :pressed="groupBy==='date'"
                                >
                                    By date
                                </b-button>
                                <b-button variant="outline-primary"
                                          @click="loadTasks('name')"
                                          :pressed="groupBy==='name'"
                                >By responsible</b-button>
                                <b-button variant="outline-primary"
                                          @click="loadTasks()"
                                          :pressed="groupBy===''"
                                >Without groups</b-button>
                            </b-button-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col>
                            <tasks-component :tasks="tasks" :groupBy="groupBy"></tasks-component>
                        </b-col>
                    </b-row>
                </b-card-body>
                <b-card-footer class="text-right">
                    <create-task-component :group-by="groupBy"/>
                </b-card-footer>
            </b-card>
        </b-col>
    </b-row>
</template>

<script>
import TasksComponent from "./TasksComponent";
import { mapState, mapActions} from "vuex";
import CreateTaskComponent from "./CreateTaskComponent";

export default {
    components: {CreateTaskComponent, TasksComponent},
    name: "DashboardComponent",
    data() {
        return {
            groupBy: ''
        }
    },
    computed: {
        ...mapState(["isLoading", "tasks"]),
    },
    methods: {
        ...mapActions(["getTasks"]),
        loadTasks(groupBy='') {
            this.groupBy = groupBy;
            this.getTasks(this.groupBy);
        }
    }
}
</script>

<style scoped>

</style>
