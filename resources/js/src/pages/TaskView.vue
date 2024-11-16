<template>
    <div>
        <h1>{{ task.title }}</h1>
        <p>{{ task.description }}</p>
        <p>Status: {{ task.status }}</p>
        <router-link :to="`/tasks/${task.id}/edit`">Edit</router-link>
        <button @click="deleteTask">Delete</button>
    </div>
</template>

<script>
export default {
    props: ['id'],
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
        async deleteTask() {
            const response = await fetch(`/api/tasks/${this.task.id}`, {
                method: 'DELETE'
            });
            if (response.ok) {
                this.$router.push('/tasks');
            }
        }
    }
};
</script>
