<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({
  props: Array
});

const userform = useForm({
  user_id: "",
  employee: "",
  roles: "",
  username: "",
  limited_access: 0,
});

const submitForm = () => {
  userform.user_id = $("#user_id").val();
  userform.username = $("#username").val();

  if($("#limited_access").is(":checked")){
    userform.limited_access = 1;
  }else{
    userform.limited_access = 0;
  }

  userform.post(route("user.update"), {
    onSuccess: () => {
      userform.reset("employee", "roles", "username");
      $("#updateUserModal").modal("hide");
    },
  });
};

onMounted(() => {
  const myMutliSelect = document.getElementById('employees_select2')
  myMutliSelect.addEventListener('changed.coreui.multi-select', event => {
    // Get the list of selected options.

    const selected = event.value;
    userform.employee = selected;
  })

  new coreui.MultiSelect(myMutliSelect, {
    multiple: false,
    search: true
  });

  const myMutliSelect2 = document.getElementById('roles_select2')
  myMutliSelect2.addEventListener('changed.coreui.multi-select', event => {
    // Get the list of selected options.

    const selected2 = event.value;
    userform.roles = selected2;
  })

  new coreui.MultiSelect(myMutliSelect2, {
    multiple: true,
    search: true
  });
 
});
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="updateUserModal"
    tabindex="-1"
    aria-labelledby="updateUserModal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <input type="hidden" id="user_id">
          <div class="modal-header">
            <h5 class="modal-title" id="updateUserModalTitle">Update User</h5>
            <button
              type="button"
              class="btn-close"
              data-coreui-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="employees" class="form-label">Employee</label>
                  <select
                    class="form-multi-select"
                    data-coreui-search="true"
                    data-coreui-multiple="false"
                    v-if="props.employees.length > 0"
                    id="employees_select2"
                    style="width: 100%"
                  >
                    <option
                      v-for="(employee, keyEmployee) in props.employees"
                      :key="keyEmployee"
                      :value="employee.id"
                    >
                      {{
                        employee.firstname +
                        " " +
                        employee.middlename +
                        " " +
                        employee.lastname +
                        " (" +
                        employee.gender +
                        ")"
                      }}
                    </option>
                  </select>
                  <div class="row" v-else>
                    <small class="text-danger ms-1">No Employee found.</small>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="roletitle" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                  />
                </div>
                <div class="mb-3">
                  <label for="roles" class="form-label">Roles</label>
                  <select
                    class="form-multi-select"
                    multiple
                    data-coreui-search="true"
                    data-coreui-multiple="true"
                    data-coreui-selection-type="tags"
                    v-if="props.roles.length > 0"
                    id="roles_select2"
                    style="width: 100%"
                  >
                    <option
                      v-for="(role, keyRole) in props.roles"
                      :key="keyRole"
                      :value="role.id"
                    >
                      {{ role.title }}
                    </option>
                  </select>
                  <div class="row" v-else>
                    <small class="text-danger ms-1">No Roles found.</small>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="limited_access"
                    />
                    <label class="form-check-label" for="limited_access">
                      Limited Area of Access
                    </label>
                  </div>

                </div>
              </div>
              <div class="col-12 text-end">
                <button class="btn btn-dark px-4" type="submit">Save changes</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>