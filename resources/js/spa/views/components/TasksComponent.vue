<template>
    <div>
        <div v-if="groupBy">
            <div v-for="(taskGroup,name) in tasks">
                <h3 class="mt-3">{{ name }}</h3>
                <task-list-component :tasks="taskGroup"/>
            </div>
        </div>
        <div v-else>
            <task-list-component :tasks="tasks"/>
        </div>
    </div>

</template>

<script>
import TaskListComponent from "./TaskListComponent";

export default {
    components: {TaskListComponent},
    props: ['tasks', 'groupBy'],
    name: "TasksComponent"
}
</script>

<style scoped>

</style>
