<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  categories: Array,
});

const procurementForm = useForm({
  invoice: "",
  supplier: "",
  remarks: "",
  status: "",
  date: "",
});

const submitForm = () => {
  procurementForm.post(route("procurement.store"), {
    onSuccess: () => {
      procurementForm.reset("invoice");
      procurementForm.reset("supplier");
      procurementForm.reset("remarks");
      procurementForm.reset("status");
      procurementForm.reset("date");
      $("#createProcurementModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createProcurementModal"
    tabindex="-1"
    aria-labelledby="createProcurementModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createProcurementModal">Add Procurement</h5>
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
                <label for="invoice" class="form-label">PO Invoice #</label>
                <input
                  type="text"
                  class="form-control"
                  id="invoice"
                  v-model="procurementForm.invoice"
                />
                <div
                  class="invalid-feedback"
                  v-show="procurementForm.errors.invoice"
                  style="display: block"
                >
                  {{ procurementForm.errors.invoice }}
                </div>
              </div>
              <div class="col-12">
                <label for="date" class="form-label">Date Procured</label>
                <input
                  type="date"
                  class="form-control"
                  id="date"
                  v-model="procurementForm.date"
                />
                <div
                  class="invalid-feedback"
                  v-show="procurementForm.errors.date"
                  style="display: block"
                >
                  {{ procurementForm.errors.date }}
                </div>
              </div>
              <div class="col-12">
                <label for="supplier" class="form-label">Supplier</label>
                <input
                  type="text"
                  class="form-control"
                  id="supplier"
                  v-model="procurementForm.supplier"
                />
                <div
                  class="invalid-feedback"
                  v-show="procurementForm.errors.supplier"
                  style="display: block"
                >
                  {{ procurementForm.errors.supplier }}
                </div>
              </div>
              <div class="col-12">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea
                  class="form-control"
                  id="remarks"
                  v-model="procurementForm.remarks"
                >
              </textarea>
                <div
                  class="invalid-feedback"
                  v-show="procurementForm.errors.remarks"
                  style="display: block"
                >
                  {{ procurementForm.errors.remarks }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': procurementForm.processing }"
              :disabled="procurementForm.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>