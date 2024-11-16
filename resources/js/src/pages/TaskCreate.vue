<template>
    <div>
        <h1>Create Task</h1>
        <form @submit.prevent="createTask">
            <input v-model="title" placeholder="Title" required />
            <textarea v-model="description" placeholder="Description"></textarea>
            <select v-model="status" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: '',
            description: '',
            status: 'pending'
        };
    },
    methods: {
        async createTask() {
            const response = await fetch('/api/tasks', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    title: this.title,
                    description: this.description,
                    status: this.status
                })
            });
            if (response.ok) {
                this.$router.push('/tasks');
            }
        }
    }
};
</script>
