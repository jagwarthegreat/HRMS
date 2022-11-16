<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  employee_id: String,
  locations: Array,
  departments: Array,
  positions: Array,
  reportingto: Array,
});

const cform = useForm({
  trans_date: "",
  location: "",
  department: "",
  position: "",
  employee_id: props.employee_id,
});

const updateEmploymentJobInfo = () => {
  cform.post(route("employee.jobinfohistory.store"), {
    onSuccess: () => {
      cform.reset("trans_date", "location", "department", "position");
      $("#jobInfoModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="jobInfoModal"
    tabindex="-1"
    aria-labelledby="jobInfoModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="updateEmploymentJobInfo">
          <div class="modal-header">
            <h5 class="modal-title" id="jobInfoModal">
              Update Job Information
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
                <label for="trans_date" class="form-label"> Date </label>
                <input
                  type="date"
                  class="form-control"
                  id="trans_date"
                  v-model="cform.trans_date"
                />
                <div
                  class="invalid-feedback"
                  v-show="cform.errors.trans_date"
                  style="display: block"
                >
                  {{ cform.errors.trans_date }}
                </div>
              </div>
              <div class="col-12">
                <label for="location" class="form-label"> Location </label>
                <select
                  class="form-select"
                  id="location"
                  v-model="cform.location"
                >
                  <option
                    v-for="(location, keyLocation) in locations"
                    :key="keyLocation"
                    :value="location.id"
                  >
                    {{ location.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="cform.errors.location"
                  style="display: block"
                >
                  {{ cform.errors.location }}
                </div>
              </div>
              <div class="col-12">
                <label for="department" class="form-label">Department</label>
                <select
                  class="form-select"
                  id="department"
                  v-model="cform.department"
                >
                  <option
                    v-for="(department, keyDepartment) in departments"
                    :key="keyDepartment"
                    :value="department.id"
                  >
                    {{ department.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="cform.errors.department"
                  style="display: block"
                >
                  {{ cform.errors.department }}
                </div>
              </div>
              <div class="col-12">
                <label for="position" class="form-label">Job Title</label>
                <select
                  class="form-select"
                  id="position"
                  v-model="cform.position"
                >
                  <option
                    v-for="(position, keyPosition) in positions"
                    :key="keyPosition"
                    :value="position.id"
                  >
                    {{ position.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="cform.errors.position"
                  style="display: block"
                >
                  {{ cform.errors.position }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': cform.processing }"
              :disabled="cform.processing"
            >
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>