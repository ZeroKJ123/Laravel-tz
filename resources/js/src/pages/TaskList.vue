<template>
    <div>
        <h1>Task List</h1>
        <ul>
            <li v-for="task in tasks" :key="task.id">
                <router-link :to="`/tasks/${task.id}`">{{ task.title }}</router-link>
            </li>
        </ul>
        <router-link :to="`/tasks/create`">Create Task</router-link>
    </div>
    <div>
        <router-link :to="`/users/create`">Create User</router-link>
    </div>
    <div>
        <router-link :to="`/assign`">Assign</router-link>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: []
        };
    },
    async created() {
        const response = await fetch('/api/tasks');
        this.tasks = await response.json();
    }
};
</script>
