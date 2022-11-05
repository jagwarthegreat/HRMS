<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  permissions: Array,
});

const createUser = () => {
  alert("create user");
};
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
          <li class="breadcrumb-item active"><span>Permissions</span></li>
        </ol>
      </nav>
    </template>

    <div class="col-md-12 text-end mb-2">
      <Link
        class="btn btn-dark btn-sm"
        :href="route('permission.create')"
        method="get"
        as="button"
      >
        Create Permission
      </Link>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">Permissions List</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                  </tr>
                </thead>
                <tbody v-if="permissions.length > 0">
                  <tr
                    v-for="(permission, keyPermission) in permissions"
                    :key="keyPermission"
                  >
                    <td>{{ permission.id }}</td>
                    <td>{{ permission.title }}</td>
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