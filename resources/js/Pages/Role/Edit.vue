<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  selectedRole: Array,
  rolesChecks: Array,
});

const roleform = useForm({
  role_id: props.selectedRole.id,
  roletitle: props.selectedRole.title,
  rolepermission: [],
});

const roleUpdate = () => {
  var selectedRole = $('input[name="role[]"]:checked');
  // var selectedRoleValues = [];
  selectedRole.each(function() {
    roleform.rolepermission.push($(this).val());
  });

  roleform.post(route("role.update"), {
    onFinish: () => {
      roleform.reset("roletitle");
      roleform.reset("rolepermission");
    },
  });
};

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
          <form @submit.prevent="roleUpdate">
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
                          :value="role.parent.value"
                          :id="'role'+role.parent.value"
                          v-if="role.parent.isCheck == 'checked'"
                          checked
                        />
                        <input
                          v-else
                          class="form-check-input"
                          type="checkbox"
                          name="role[]"
                          :value="role.parent.value"
                          :id="'role'+role.parent.value"
                        />
                        <label class="form-check-label" :for="'role'+role.parent.value">
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
                              :value="roleChild.value"
                              :id="'role'+roleChild.value"
                              v-if="roleChild.isCheck == 'checked'"
                              checked
                            />
                            <input
                              v-else
                              class="form-check-input"
                              type="checkbox"
                              name="role[]"
                              :value="roleChild.value"
                              :id="'role'+roleChild.value"
                            />
                            <label class="form-check-label" :for="'role'+roleChild.value">
                              {{ keyRoleChild }}
                            </label>
                          </div>
                        </li>
                      </ul>
                    </li>

                  </ul>
                </div>
              </div>
              <div class="col-12 text-base mt-2">
                <button class="btn btn-dark px-4" type="submit">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>