<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  roles: Array,
});

const createUser = () => {
  alert("create role");
};
</script>

<template>
  <Head title="Role" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
          <li class="breadcrumb-item">
            <!-- if breadcrumb is single--><span>Dashboard</span>
          </li>
          <li class="breadcrumb-item active"><span>Role</span></li>
        </ol>
      </nav>
    </template>

    <div class="col-md-12 text-end mb-2">
      <Link
        class="btn btn-dark btn-sm"
        :href="route('role.create')"
        method="get"
        as="button"
      >
        Create Role
      </Link>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">Role List</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>PERMISSIONS</th>
                  </tr>
                </thead>
                <tbody v-if="roles.length > 0">
                  <tr v-for="(role, keyRole) in roles" :key="keyRole">
                    <td>{{ role.id }}</td>
                    <td>{{ role.title }}</td>
                    <td>{{ role.permissions }}</td>
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