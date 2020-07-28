<template>
    <b-list-group>
        <b-list-group-item v-for="task in tasks" :key="task.id">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 " :class="task.css_class">
                    {{ task.title }}
                </h5>
                <small>'Priority': {{ task.priority }}</small>
            </div>
            <p>'Finish': {{ task.finish_at }}</p>
            <p>'Responsible': {{ task.name }}</p>

            <p>'Status': {{ task.status }}</p>
        </b-list-group-item>
    </b-list-group>
</template>

<script>
export default {
    props: ['tasks'],
    name: "TaskListComponent"
}
</script>

<style scoped>

</style>
