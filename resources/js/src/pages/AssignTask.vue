<template>
    <div>
        <h1>Assign Task</h1>
        <form @submit.prevent="assignTask">
            <div>
                <label>User</label>
                <select v-model="userId" required>
                    <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
                </select>
            </div>
            <div>
                <label>Task</label>
                <select v-model="taskId" required>
                    <option v-for="task in tasks" :key="task.id" :value="task.id">{{ task.title }}</option>
                </select>
            </div>
            <button type="submit">Assign</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: [],
            tasks: [],
            userId: null,
            taskId: null,
        };
    },
    async created() {
        const usersResponse = await fetch('/api/users');
        this.users = await usersResponse.json();

        const tasksResponse = await fetch('/api/tasks');
        this.tasks = await tasksResponse.json();
    },
    methods: {
        async assignTask() {
            const response = await fetch(`/api/users/${this.userId}/assign-task`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ task_id: this.taskId }),
            });
            if (response.ok) {
                alert('Task assigned successfully!');
            } else {
                alert('Failed to assign task.');
            }
        },
    },
};
</script>
