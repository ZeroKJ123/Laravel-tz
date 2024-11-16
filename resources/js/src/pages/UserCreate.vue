<template>
    <div>
        <h1>Create User</h1>
        <form @submit.prevent="createUser">
            <div>
                <label>Name</label>
                <input v-model="user.name" type="text" required />
            </div>
            <div>
                <label>Email</label>
                <input v-model="user.email" type="email" required />
            </div>
            <div>
                <label>Password</label>
                <input v-model="user.password" type="password" required />
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {
                name: '',
                email: '',
                password: '',
            },
        };
    },
    methods: {
        async createUser() {
            const response = await fetch('/api/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(this.user),
            });
            if (response.ok) {
                this.$router.push('/');
            } else {
                alert('Failed to create user.');
            }
        },
    },
};
</script>
