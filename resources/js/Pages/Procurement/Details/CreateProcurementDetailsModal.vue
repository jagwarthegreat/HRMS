<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  procurement: Array,
  stocks:Array,
});

const procurementDetailsForm = useForm({
  stock_id: "",
  quantity: "",
  cost: "",
  amount: "",
});

const submitDetailsForm = () => {
  procurementDetailsForm.post(route("procurement.store"), {
    onSuccess: () => {
      procurementDetailsForm.reset("stock_id");
      procurementDetailsForm.reset("quantity");
      procurementDetailsForm.reset("cost");
      procurementDetailsForm.reset("amount");
      $("#createProcurementDetailsModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createProcurementDetailsModal"
    tabindex="-1"
    aria-labelledby="createProcurementDetailsModal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form @submit.prevent="submitDetailsForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createProcurementDetailsModal">Add Procurement Details</h5>
            <button
              type="button"
              class="btn-close"
              data-coreui-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <h6>Add Stock</h6>
            <div class="row g-3">
              <div class="col-4">
                <label for="stock_id" class="form-label">Item</label>
                <input
                  type="text"
                  class="form-control"
                  id="stock_id"
                  v-model="procurementDetailsForm.stock_id"
                />
                <div
                  class="invalid-feedback"
                  v-show="procurementDetailsForm.errors.stock_id"
                  style="display: block"
                >
                  {{ procurementDetailsForm.errors.stock_id }}
                </div>
              </div>
              <div class="col-4">
                <label for="quantity" class="form-label">Qty</label>
                <input
                  type="text"
                  class="form-control"
                  id="quantity"
                  v-model="procurementDetailsForm.quantity"
                />
                <div
                  class="invalid-feedback"
                  v-show="procurementDetailsForm.errors.quantity"
                  style="display: block"
                >
                  {{ procurementDetailsForm.errors.quantity }}
                </div>
              </div>
              <div class="col-4">
                <label for="cost" class="form-label">Cost</label>
                <input
                  type="text"
                  class="form-control"
                  id="cost"
                  v-model="procurementDetailsForm.cost"
                />
                <div
                  class="invalid-feedback"
                  v-show="procurementDetailsForm.errors.cost"
                  style="display: block"
                >
                  {{ procurementDetailsForm.errors.cost }}
                </div>
              </div>
            </div>
            <br><br>
            <h6>Stock Lists</h6>
            <div class="col-md-12">
              <div class="row">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Stock Name</th>
                      <th>Qty</th>
                      <th>Cost</th>
                      <th>Amount</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': procurementDetailsForm.processing }"
              :disabled="procurementDetailsForm.processing"
            >
              Finish Procurement
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>