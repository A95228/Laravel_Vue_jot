import Vue from "vue";
import VueRouter from "vue-router";
import ExampleComponent from "./components/ExampleComponent";
import ContactsCreate from "./views/ContactsCreate";
import ContactsShow from "./views/ContactsShow";
import ContactsEdit from "./views/ContactsEdit";
import ContactsIndex from "./views/ContactsIndex";
import BirthdaysIndex from "./views/BirthdaysIndex";
import Logout from "./Actions/Logout";
Vue.use(VueRouter);
export default new VueRouter({
    routes: [
        {
            path: '/', component: ExampleComponent,
            meta:{title:'welcome'},
        },
        {
            path: '/contacts', component: ContactsIndex,
            meta:{title:'Contacts'},
        },
        {
            path: '/contacts/create', component: ContactsCreate,
            meta:{title:'Add New Create'},
        },
        {
            path: '/birthdays', component: BirthdaysIndex,
            meta:{title:'This is month\'s birthdays'},
        },
        {
            path: '/contacts/:id', component: ContactsShow,
            meta:{title:'Details for contact'},
        },
        {
            path: '/contacts/:id/edit', component: ContactsEdit,
            meta:{title:'Edit contact'},
        },
        {
            path: '/logout', component: Logout,
        }
    ],
    mode: 'history'
})
