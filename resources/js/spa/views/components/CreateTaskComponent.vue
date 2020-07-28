<template>
    <div>

        <b-button v-b-modal="'create-task-modal'" variant="primary">'New task'</b-button>


        <b-modal id="create-task-modal" title="Adding Task" hide-footer>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fal fa-times" aria-hidden="true"></i>
            </button>
            <div class="modal-body">
                <b-form @submit.prevent="handleCreateTask" >
                    <b-form-group
                        id="input-group-1"
                        label="Task title"
                        label-for="title"
                    >
                        <b-form-input
                            id="title"
                            v-model="form.title"
                            type="text"
                            required
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group id="input-group-2" label="Task Description" label-for="text">
                        <b-form-textarea
                            id="text"
                            v-model="form.text"
                            rows="3"
                            max-rows="6"
                        ></b-form-textarea>
                    </b-form-group>

                    <b-form-group id="input-group-3" label="Priority" label-for="priority">
                        <b-form-select v-model="form.priority" class="mb-3">
                            <b-form-select-option value="low">low</b-form-select-option>
                            <b-form-select-option value="middle">middle</b-form-select-option>
                            <b-form-select-option value="high">high</b-form-select-option>
                        </b-form-select>
                    </b-form-group>

                    <b-form-group id="input-group-4" label="Responsible" label-for="priority">
                        <b-form-select v-model="form.user_id" class="mb-3">
                            <b-form-select-option :value="user.id">{{user.name}}</b-form-select-option>
                            <b-form-select-option value="middle">middle</b-form-select-option>
                            <b-form-select-option value="high">high</b-form-select-option>
                        </b-form-select>
                    </b-form-group>

                    <b-form-group id="input-group-5" label="Finish" label-for="finish_at">
                        <b-form-datepicker id="finish_at" v-model="form.finish_at" class="mb-2"></b-form-datepicker>
                    </b-form-group>

                    <b-button type="submit" variant="primary">Submit</b-button>
                </b-form>
            </div>

        </b-modal>
    </div>
</template>

<script>
import {mapState, mapActions} from "vuex";
export default {
    props: ['groupBy'],
    name: "CreateTaskComponent",
    data() {
        return {
            form: {
                title: '',
                text: '',
                priority: '',
                user_id: '',
                finish_at: '',
            }
        }
    },
    computed: {
        ...mapState(["user"])
    },
    methods: {
        ...mapActions(['getTasks']),
        handleCreateTask() {
            axios.post('/api/tasks', this.form)
            .then(({data}) => {
                this.getTasks(this.groupBy)
                this.$bvToast.toast(`Task created`, {
                    autoHideDelay: 3000,
                    appendToast: false,
                    variant: 'success'
                })
                this.$bvModal.hide('create-task-modal')

            })
        }
    }
}
</script>

<style scoped>

</style>
