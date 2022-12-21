<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const dprops = defineProps({
  props: Array
});

const dployForm = useForm({
  employees: "",
  trans_date: "",
  location: "",
  department: "",
  position: ""
});

const submitForm = () => {
	console.log(dployForm);
  dployForm.post(route("deployment.store"), {
    onSuccess: () => {
      dployForm.reset("employees", "trans_date", "location", "department", "position");
      $("#createDeployementModal").modal("hide");
    },
  });
};

onMounted(() => {
  const myMutliSelect = document.getElementById('employees')
		myMutliSelect.addEventListener('changed.coreui.multi-select', event => {
	  // Get the list of selected options.
	  const selected = event.value
	  dployForm.employees = selected
	})
});
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createDeployementModal"
    tabindex="-1"
    aria-labelledby="createDeployementModal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createDeployementModal">
              Add Deployment
            </h5>
            <button
              type="button"
              class="btn-close"
              data-coreui-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-12">
                <label for="employees" class="form-label"> Employees </label>
                <select
                  class="form-multi-select"
                  id="employees"
                  multiple
                  data-coreui-search="true"
                  v-model="dployForm.employees"
                >
                  <option
                    v-for="(employee, keyEmployee) in props.employees"
                    :key="keyEmployee"
                    :value="employee.id"
                  >
                    {{ employee.firstname + " " + employee.lastname }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="dployForm.errors.employees"
                  style="display: block"
                >
                  {{ dployForm.errors.employees }}
                </div>
              </div>

              <div class="col-12">
                <label for="trans_date" class="form-label"> Date </label>
                <input
                  type="date"
                  class="form-control"
                  id="trans_date"
                  v-model="dployForm.trans_date"
                />
                <div
                  class="invalid-feedback"
                  v-show="dployForm.errors.trans_date"
                  style="display: block"
                >
                  {{ dployForm.errors.trans_date }}
                </div>
              </div>
              <div class="col-12">
                <label for="location" class="form-label"> Location </label>
                <select
                  class="form-select"
                  id="location"
                  v-model="dployForm.location"
                >
                  <option
                    v-for="(location, keyLocation) in props.locations"
                    :key="keyLocation"
                    :value="location.id"
                  >
                    {{ location.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="dployForm.errors.location"
                  style="display: block"
                >
                  {{ dployForm.errors.location }}
                </div>
              </div>
              <div class="col-12">
                <label for="department" class="form-label">Department</label>
                <select
                  class="form-select"
                  id="department"
                  v-model="dployForm.department"
                >
                  <option
                    v-for="(department, keyDepartment) in props.departments"
                    :key="keyDepartment"
                    :value="department.id"
                  >
                    {{ department.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="dployForm.errors.department"
                  style="display: block"
                >
                  {{ dployForm.errors.department }}
                </div>
              </div>
              <div class="col-12">
                <label for="position" class="form-label">Job Title</label>
                <select
                  class="form-select"
                  id="position"
                  v-model="dployForm.position"
                >
                  <option
                    v-for="(position, keyPosition) in props.positions"
                    :key="keyPosition"
                    :value="position.id"
                  >
                    {{ position.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="dployForm.errors.position"
                  style="display: block"
                >
                  {{ dployForm.errors.position }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': dployForm.processing }"
              :disabled="dployForm.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>