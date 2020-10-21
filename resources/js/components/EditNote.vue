<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit Note</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Title</label>
                            <input type="text" v-model="note.title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Body</label>
                            <input type="text" v-model="note.body" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.noteId = id;
            axios.get('/api/v1/notes/' + id)
                .then(function (resp) {
                    app.note = resp.data;
                })
                .catch(function () {
                    alert("Could not load note")
                });
        },
        data: function () {
            return {
                noteId: null,
                note: {
                    title: '',
                    body: '',
                  
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newNote = app.note;
                axios.patch('/api/v1/notes/' + app.noteId, newNote)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create note now");
                    });
            }
        }
    }
</script>