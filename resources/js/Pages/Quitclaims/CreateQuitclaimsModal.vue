<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const dprops = defineProps({
  props: Array
});

const qclaimsform = useForm({
  employee: "",
  amount: "",
  resignation_date: "",
  claims_date: "",
});

const submitForm = () => {
  qclaimsform.post(route("quitclaims.store"), {
    onSuccess: () => {
      qclaimsform.reset("employee", "amount", "resignation_date", "claims_date");
      $("#createQuitClaimsModal").modal("hide");
    },
  });
};

onMounted(()=>{
	const myMutliSelect = document.getElementById('employee')
	myMutliSelect.addEventListener('changed.coreui.multi-select', event => {
	  // Get the list of selected options.

	  const selected = event.value;
	  qclaimsform.employee = selected;
	})
});
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createQuitClaimsModal"
    tabindex="-1"
    aria-labelledby="createQuitClaimsModal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createQuitClaimsModal">
              Add Quit Claims
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
              <div class="col-md-12">
                <label for="employee" class="form-label">Employee</label>
                <select
                  class="form-multi-select"
                  data-coreui-search="true"
                  data-coreui-multiple="false"
                  id="employee"
                >
                  <option
                    v-for="(employees, keyEmployees) in props.employees"
                    :key="keyEmployees"
                    :value="employees.id"
                  >
                    {{ employees.firstname + " " + employees.lastname }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="qclaimsform.errors.employee"
                  style="display: block"
                >
                  {{ qclaimsform.errors.employee }}
                </div>
              </div>
              <div class="col-md-4">
                <label for="amount" class="form-label">Amount</label>
                <input
                  type="number"
                  class="form-control"
                  id="amount"
                  v-model="qclaimsform.amount"
                />
                <div
                  class="invalid-feedback"
                  v-show="qclaimsform.errors.amount"
                  style="display: block"
                >
                  {{ qclaimsform.errors.amount }}
                </div>
              </div>
              <div class="col-md-4">
                <label for="resignation_date" class="form-label"
                  >Resignation Date</label
                >
                <input
                  type="date"
                  class="form-control"
                  id="resignation_date"
                  v-model="qclaimsform.resignation_date"
                />
                <div
                  class="invalid-feedback"
                  v-show="qclaimsform.errors.resignation_date"
                  style="display: block"
                >
                  {{ qclaimsform.errors.resignation_date }}
                </div>
              </div>
              <div class="col-4">
                <label for="claims_date" class="form-label">Claims Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="claims_date"
                  v-model="qclaimsform.claims_date"
                />
                <div
                  class="invalid-feedback"
                  v-show="qclaimsform.errors.claims_date"
                  style="display: block"
                >
                  {{ qclaimsform.errors.claims_date }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': qclaimsform.processing }"
              :disabled="qclaimsform.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>