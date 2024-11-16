<template>
    <div>
        <h1>Edit Task</h1>
        <form @submit.prevent="updateTask">
            <input v-model="task.title" placeholder="Title" required />
            <textarea v-model="task.description" placeholder="Description"></textarea>
            <select v-model="task.status" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            task: {}
        };
    },
    async created() {
        const response = await fetch(`/api/tasks/${this.$route.params.id}`);
        this.task = await response.json();
    },
    methods: {
        async updateTask() {
            const response = await fetch(`/api/tasks/${this.task.id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(this.task)
            });
            if (response.ok) {
                this.$router.push('/tasks');
            }
        }
    }
};
</script>
