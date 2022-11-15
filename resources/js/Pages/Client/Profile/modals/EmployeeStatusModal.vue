<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  employee_id: String,
  employee_statuses: Array,
});

const esform = useForm({
  trans_date: "",
  employee_status: "",
  comment: "",
  employee_id: props.employee_id,
});

const updateEmployeeStatus = () => {
  esform.post(route("employee.statushistory.store"), {
    onSuccess: () => {
      esform.reset(["trans_date", "employee_status", "comment"]);
      $("#employeeStatusModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="employeeStatusModal"
    tabindex="-1"
    aria-labelledby="employeeStatusModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="updateEmployeeStatus">
          <div class="modal-header">
            <h5 class="modal-title" id="employeeStatusModal">
              Update Employee Status
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
                  v-model="esform.trans_date"
                />
              </div>
              <div class="col-12">
                <label for="employee_status" class="form-label"
                  >Employee Status</label
                >
                <select
                  class="form-select"
                  id="employee_status"
                  v-model="esform.employee_status"
                >
                  <option
                    v-for="(empstatus, keyEmployeestats) in employee_statuses"
                    :key="keyEmployeestats"
                    :value="empstatus.id"
                  >
                    {{ empstatus.title }}
                  </option>
                </select>
              </div>
              <div class="col-12">
                <label for="comment" class="form-label"> Comment </label>
                <input
                  type="text"
                  class="form-control"
                  id="comment"
                  v-model="esform.comment"
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