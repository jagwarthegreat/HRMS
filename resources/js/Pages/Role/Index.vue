<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { unref, ref } from 'vue'

const props = defineProps({
  roles: Array,
  permissions: Array
});

const createUser = () => {
  alert("create role");
};

function getPermisionTitle(id) {

  props.permissions.forEach((permission, index) => {
    if(permission.id == id){
      console.log("MATCHED :: (" + id+") queried form loop :: in array (" + permission.id + ")");
      return permission.title;
    }
  });
}
</script>

<template>
  <Head title="Role" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item"><Link :href="route('dashboard')">Dashboard</Link></li>
      <li class="breadcrumb-item active" aria-current="page">Role</li>
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
                    <td>
                      <span v-for="(permission, keyPermission) in role.permissions.split(',')" :key="keyPermission" class="badge bg-dark ms-1">
                        {{ permission }}
                      </span>  
                    </td>
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