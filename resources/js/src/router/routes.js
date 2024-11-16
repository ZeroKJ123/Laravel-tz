import TaskList from "../pages/TaskList.vue";
import TaskCreate from "../pages/TaskCreate.vue";
import TaskView from "../pages/TaskView.vue";
import TaskEdit from "../pages/TaskEdit.vue";
import AssignTask from "../pages/AssignTask.vue";
import UserCreate from "../pages/UserCreate.vue";

const routes= [
    {
        path: '/tasks',
        redirect: '/'
    },
    {
        path: '/',
        component: TaskList
    },
    {
        path: '/tasks/create',
        component: TaskCreate
    },
    {
        path: '/tasks/:id',
        component: TaskView
    },
    {
        path: '/tasks/:id/edit',
        component: TaskEdit
    },
    {
        path: '/assign',
        component: AssignTask
    },
    {
        path: '/users/create',
        component: UserCreate
    }
];

export default routes;
