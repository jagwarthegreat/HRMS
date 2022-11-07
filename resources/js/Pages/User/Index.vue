<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  users: Array,
});

const createUser = () => {
  alert("create user");
};
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item"><Link :href="route('dashboard')">Dashboard</Link></li>
      <li class="breadcrumb-item active" aria-current="page">User</li>
    </template>

    <div class="col-md-12 text-end mb-2">
      <Link
        class="btn btn-dark btn-sm"
        :href="route('user.create')"
      >
        Create User
      </Link>
    </div>

    <div class="col-12">
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
                    <td>{{ user.name }}</td>
                    <td>{{ user.username }}</td>
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