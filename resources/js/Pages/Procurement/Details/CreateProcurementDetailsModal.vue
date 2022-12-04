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
  procurementDetailsForm.post(route("procurement.details.store"), {
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

<style scoped>
.accordion-button {
  font-weight: 600;
  color: #272829;
  background-color: rgb(255 255 255 / 87%);
}

.accordion-item {
  border-top: 1px solid #ddd;
}

.accordion {
  --cui-accordion-active-color: #768192;
}

.accordion-body {
  overflow-y: auto;
}

button.btn.btn-sm.btn-default.ms-auto.me-1 {
  border: 1px solid #0000002e !important;
  box-shadow: none !important;
}

.basicInfoLabel {
  width: 30%;
  vertical-align: baseline;
  display: flex;
  justify-content: space-between;
  color: #768192;
}

.basicInfoData {
  padding-left: 10px;
  font-weight: 500;
}

th,
td {
  padding: 7px;
}
</style>
<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createProcurementDetailsModal"
    tabindex="-1"
    aria-labelledby="createProcurementDetailsModal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createProcurementDetailsModal">
            Add Procurement Details
          </h5>
          <button
            type="button"
            class="btn-close"
            data-coreui-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="accordion mb-3" id="employeeDetailAccordion">
            <!-- basic info -->
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="panelsStayOpen-headingBasic">
                <button
                  class="accordion-button p-2"
                  type="button"
                  data-coreui-toggle="collapse"
                  data-coreui-target="#panelsStayOpen-collapseBasic"
                  aria-expanded="true"
                  aria-controls="panelsStayOpen-collapseBasic"
                >
                  Procurement Info
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseBasic"
                class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingBasic"
              >
                <div class="accordion-body">
                  <div class="row">
                    <div class="col-md-4">
                      <table>
                        <tr>
                          <td class="basicInfoLabel">
                            <span>Reference</span>
                            <span>:</span>
                          </td>
                          <td class="basicInfoData">
                            {{ procurement.reference }}
                          </td>
                        </tr>
                        <tr>
                          <td class="basicInfoLabel">
                            <span>Date</span>
                            <span>:</span>
                          </td>
                          <td class="basicInfoData">
                            {{ procurement.date }}
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-4">
                      <table>
                        <tr>
                          <td class="basicInfoLabel">
                            <span>Invoice</span>
                            <span>:</span>
                          </td>
                          <td class="basicInfoData">
                            {{ procurement.invoice }}
                          </td>
                        </tr>
                        <tr>
                          <td class="basicInfoLabel">
                            <span>Supplier</span>
                            <span>:</span>
                          </td>
                          <td class="basicInfoData">
                            {{ procurement.supplier }}
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-4">
                      <table>
                        <tr>
                          <td class="basicInfoLabel">
                            <span>Remarks</span>
                            <span>:</span>
                          </td>
                          <td class="basicInfoData">
                            {{ procurement.remarks }}
                          </td>
                        </tr>
                        <tr>
                          <td class="basicInfoLabel">
                            <span>Status</span>
                            <span>:</span>
                          </td>
                          <td class="basicInfoData">
                            {{ procurement.status }}
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /basic info -->
          </div>

          <div class="row">
            <div class="col-md-4">
              <mark>Add Stock</mark>
              <form @submit.prevent="submitDetailsForm">
                <div class="col-12">
                  <label for="stock_id" class="form-label">Stocks</label>
                  <select
                    class="form-select select2"
                    id="stock_id"
                    v-model="procurementDetailsForm.stock_id"
                  >
                    <option
                      v-for="(stock, keyStocks) in stocks"
                      :key="keyStocks"
                      :value="stock.id"
                    >
                      {{ stock.name }}
                    </option>
                  </select>
                  <div
                    class="invalid-feedback"
                    v-show="procurementDetailsForm.errors.stock_id"
                    style="display: block"
                  >
                    {{ procurementDetailsForm.errors.stock_id }}
                  </div>
                </div>
                <div class="col-12">
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
                <div class="col-12">
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
                <div class="col-12">
                  <label for="amount" class="form-label">Amount</label>
                  <input
                    type="text"
                    class="form-control"
                    id="amount"
                    v-model="procurementDetailsForm.amount"
                    readonly
                  />
                  <div
                    class="invalid-feedback"
                    v-show="procurementDetailsForm.errors.amount"
                    style="display: block"
                  >
                    {{ procurementDetailsForm.errors.amount }}
                  </div>
                </div>
                <div class="col-md-12">
                  <button
                    type="submit"
                    class="btn btn-sm btn-primary"
                    :class="{
                      'opacity-25': procurementDetailsForm.processing,
                    }"
                    :disabled="procurementDetailsForm.processing"
                  >
                    Add Stock
                  </button>
                </div>
              </form>
            </div>
            <div class="col-md-8">
              <mark>Stock Lists</mark>
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
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-sm btn-primary"
            :class="{ 'opacity-25': procurementDetailsForm.processing }"
            :disabled="procurementDetailsForm.processing"
          >
            Finish Procurement
          </button>
        </div>
      </div>
    </div>
  </div>
</template>