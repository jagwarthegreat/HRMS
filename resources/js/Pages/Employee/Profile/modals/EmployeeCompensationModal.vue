<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  employee_id: String,
  paytypes: Array,
});

const cform = useForm({
  trans_date: "",
  pay_rate: "",
  pay_type: "",
  reason: "",
  comment: "",
  employee_id: props.employee_id,
});

const updateEmploymentCompensation = () => {
  cform.post(route("employee.compensationhistory.store"), {
    onSuccess: () => {
      cform.reset(["trans_date", "employment_type", "comment"]);
      $("#compensationModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="compensationModal"
    tabindex="-1"
    aria-labelledby="compensationModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="updateEmploymentCompensation">
          <div class="modal-header">
            <h5 class="modal-title" id="compensationModal">
              Update Compensation
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
              </div>
              <div class="col-12">
                <label for="trans_date" class="form-label"> Pay Rate </label>
                <input
                  type="text"
                  class="form-control"
                  id="pay_rate"
                  v-model="cform.pay_rate"
                />
              </div>
              <div class="col-12">
                <label for="pay_type" class="form-label">Employee Status</label>
                <select
                  class="form-select"
                  id="pay_type"
                  v-model="cform.pay_type"
                >
                  <option
                    v-for="(paytype, keyPaytype) in paytypes"
                    :key="keyPaytype"
                    :value="paytype.id"
                  >
                    {{ paytype.title }}
                  </option>
                </select>
              </div>
              <div class="col-12">
                <label for="reason" class="form-label">Reason</label>
                <select class="form-select" id="reason" v-model="cform.reason">
                  <option value="Promotion">Promotion</option>
                  <option value="Performance">Performance</option>
                  <option value="Increment">Increment</option>
                </select>
              </div>
              <div class="col-12">
                <label for="comment" class="form-label"> Comment </label>
                <input
                  type="text"
                  class="form-control"
                  id="comment"
                  v-model="cform.comment"
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