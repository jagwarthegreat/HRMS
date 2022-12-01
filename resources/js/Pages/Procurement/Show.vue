<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ShowProcurementDetails from "./Details/ShowProcurementDetails.vue";

const props = defineProps({
  details:[],
  procurement:[],
  stocks:[],
});

const procurementDetailsForm = useForm({
  procurement_id:props.procurement.id,
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
    },
  });
};


const procurementFinishForm = useForm({
  procurement_id:props.procurement.id
});

const finishForm = () => {
  procurementFinishForm.post(route("procurement.finish"), {
    onSuccess: () => {
    },
  });
};

const computeAmount = () => {
  procurementDetailsForm.amount = procurementDetailsForm.quantity * procurementDetailsForm.cost;
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
  <Head title="Procurements Details" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item">
        <Link :href="route('dashboard')">Dashboard</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Procurements</li>
    </template>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">Procurement Info</div>
          <div class="card-body">
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
                      <span v-show="procurement.status" class="badge text-bg-success">Finished</span>
                      <span v-show="!procurement.status" class="badge text-bg-danger">Saved</span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4" v-show="procurement.status == 0">
          <div class="card mb-4">
            <div class="card-header">Add Stock</div>
            <div class="card-body">
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
                    type="number"
                    class="form-control"
                    id="quantity"
                    v-model="procurementDetailsForm.quantity"
                    @keyup="computeAmount"
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
                    type="number"
                    class="form-control"
                    id="cost"
                    v-model="procurementDetailsForm.cost"
                    @keyup="computeAmount"
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
                    type="number"
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
                    class="btn btn-sm btn-secondary"
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
          </div>
        </div>
        <div :class="props.procurement.status == 0 ?'col-md-8':'col-md-12'">
          <ShowProcurementDetails :details="details"></ShowProcurementDetails>
        </div>
      </div>
    </div>
    <div class="row" v-show="procurement.status == 0">
      <div class="col-md-12">
        <button
          type="button"
          class="btn btn-primary rounded-pill"
          style="float:right"
          @click="finishForm"
          :class="{ 'opacity-25': procurementFinishForm.processing }"
          :disabled="procurementFinishForm.processing"
        >
          Finish Procurement
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>