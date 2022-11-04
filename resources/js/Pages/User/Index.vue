<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    users: Array
});

const createUser = () =>  {
    alert("create user");
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb my-0 ms-2">
                      <li class="breadcrumb-item">
                          <!-- if breadcrumb is single--><span>Dashboard</span>
                      </li>
                      <li class="breadcrumb-item active"><span>User</span></li>
                  </ol>
              </nav>
        </template>

        <div class="col-md-12 text-end mb-2">
            <Link class="btn btn-dark btn-sm" :href="route('user.create')" method="get" as="button">
                Create User
            </Link>
        </div>
    
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">User List</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody v-if="users.length > 0">
                                <tr v-for="(user, keyUser) in users" :key="keyUser">
                                    <td>{{user.name}}</td>
                                    <td>{{user.username}}</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </AuthenticatedLayout>
</template>