/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import NotesIndex from './components/NotesIndex.vue';
import CreateNote from './components/CreateNote.vue';
import EditNote from './components/EditNote.vue';

const routes = [
    {
        path: '/',
        components: {
            notesIndex: NotesIndex
        }
    },
    {path: '/notes/create', component: CreateNote, name: 'createNote'},
    {path: '/notes/edit/:id', component: EditNote, name: 'editNote'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')