<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    users: Array
});

const createUser = () =>  {
    alert("create user");
}

</script>
<template>
    <Head title="User" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User
            </h2>
        </template>

        <div class="py-12">
            <div class="flex items-center justify-end max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- <PrimaryButton class="ml-4" @click="createUser"> Create User</PrimaryButton> -->
                
                    <Link :href="route('logout')" method="get" as="button">
                        Create User
                    </Link>
                
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ul v-if="users.length > 0">
                            <li v-for="(user, keyUser) in users" :key="keyUser">
                                {{ "&bull; "+ user.name + " | " + user.username + " | " + user.employee}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>