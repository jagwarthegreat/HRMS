<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  employee_id: String,
  employment_types: Array,
});

const etform = useForm({
  trans_date: "",
  employment_type: "",
  comment: "",
  employee_id: props.employee_id,
});

const updateEmploymentType = () => {
  etform.post(route("employee.typehistory.store"), {
    onSuccess: () => {
      etform.reset(["trans_date", "employment_type", "comment"]);
      $("#employeeTypeModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="employeeTypeModal"
    tabindex="-1"
    aria-labelledby="employeeTypeModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="updateEmploymentType">
          <div class="modal-header">
            <h5 class="modal-title" id="employeeTypeModal">
              Update Employment Type
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
                  v-model="etform.trans_date"
                />
              </div>
              <div class="col-12">
                <label for="employee_status" class="form-label"
                  >Employee Status</label
                >
                <select
                  class="form-select"
                  id="employee_status"
                  v-model="etform.employment_type"
                >
                  <option
                    v-for="(emptype, keyEmptype) in employment_types"
                    :key="keyEmptype"
                    :value="emptype.id"
                  >
                    {{ emptype.title }}
                  </option>
                </select>
              </div>
              <div class="col-12">
                <label for="comment" class="form-label"> Comment </label>
                <input
                  type="text"
                  class="form-control"
                  id="comment"
                  v-model="etform.comment"
                />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>