<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({
  permissions: Array,
  rolesChecks: Array,
});

const roleform = useForm({
  roletitle: "",
  rolepermission: [],
});

const roleStore = () => {
  var selectedRole = $('input[name="role[]"]:checked');
  // var selectedRoleValues = [];
  selectedRole.each(function() {
    roleform.rolepermission.push($(this).val());
  });

  console.log(roleform.rolepermission);

  roleform.post(route("role.store"), {
    onFinish: () => {
      roleform.reset("roletitle");
      roleform.reset("rolepermission");
    },
  });
};

onMounted(() => {
  // $("#rolepermission").select2();

  // $("#rolepermission").change(
  //     function () {
  //       roleform.rolepermission = $("#rolepermission").val();
  //     }.bind(this)
  // );
});
</script>

<style scoped>
  ul {
    list-style-type: none;
  }

  .form-check-label {
    font-weight: 500;
  }
</style>

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

    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header">Role Detail</div>
        <div class="card-body">
          <form @submit.prevent="roleStore">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="roletitle" class="form-label">Title</label>
                  <input type="text" class="form-control" id="roletitle" v-model="roleform.roletitle" autocomplete="off"/>
                </div>
                <div class="mb-3">
                  <label for="rolepermission" class="form-label"
                    >Permissions</label
                  >
                  <!-- <select
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
                  </select> -->
                  <ul>

                    <li 
                      class="mt-3"
                      v-for="(role, keyRole) in rolesChecks"
                      :key="keyRole"
                    >
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          name="role[]"
                          :value="role.parent"
                          :id="'role'+role.parent"
                        />
                        <label class="form-check-label" :for="'role'+role.parent">
                          {{ keyRole }}
                        </label>
                      </div>

                      <ul
                        v-for="(roleChild, keyRoleChild) in role.child"
                        :key="keyRoleChild"
                      >
                        <li>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              name="role[]"
                              :value="roleChild"
                              :id="'role'+roleChild"
                            />
                            <label class="form-check-label" :for="'role'+roleChild">
                              {{ keyRoleChild }}
                            </label>
                          </div>
                        </li>
                      </ul>
                    </li>

                  </ul>
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