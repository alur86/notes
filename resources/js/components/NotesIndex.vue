<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createNote'}" class="btn btn-success">Create Note</router-link>
        </div>
 
        <div class="panel panel-default">
            <div class="panel-heading">Companies list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="note, index in notes">
                        <td>{{ note.title }}</td>
                        <td>{{ company.body }}</td>
                        <td>
                            <router-link :to="{name: 'editNote', params: {id: note.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(note.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data: function () {
            return {
                notes: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/notes')
                .then(function (resp) {
                    app.notes = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load notes");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/notes/' + id)
                        .then(function (resp) {
                            app.notes.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete this note");
                        });
                }
            }
        }
    }
</script>