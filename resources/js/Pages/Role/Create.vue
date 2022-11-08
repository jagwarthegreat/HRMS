<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({
  permissions: Array,
});

const roleform = useForm({
  roletitle: "",
  rolepermission: "",
});

const roleStore = () => {
  roleform.post(route("role.store"), {
    onFinish: () => {
      roleform.reset("roletitle");
      roleform.reset("rolepermission");
    },
  });
};

onMounted(() => {
  $("#rolepermission").select2();

  $("#rolepermission").change(
      function () {
        roleform.rolepermission = $("#rolepermission").val();
      }.bind(this)
  );
});
</script>

<template>
  <Head title="Create Role" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item"><Link :href="route('dashboard')">Dashboard</Link></li>
      <li class="breadcrumb-item"><Link :href="route('role')">Role</Link></li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
    </template>

    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('role')"> Go back </Link>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">Role Detail</div>
        <div class="card-body">
          <form @submit.prevent="roleStore">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="roletitle" class="form-label">Title</label>
                  <input type="text" class="form-control" id="roletitle" v-model="roleform.roletitle" />
                </div>
                <div class="mb-3">
                  <label for="rolepermission" class="form-label"
                    >Permissions</label
                  >
                  <select
                    class="form-control"
                    multiple
                    data-coreui-search="true"
                    v-if="permissions.length > 0"
                    id="rolepermission" 
                    v-model="roleform.rolepermission"
                  >
                    <option 
                      v-for="(permission, keyPermission) in permissions" 
                      :key="keyPermission" 
                      :value="permission.id">
                      {{ permission.title }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-12 text-base">
                <button class="btn btn-dark px-4" type="submit">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>