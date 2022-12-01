<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  stock_transfer_id:'',
  stocks:[],
});

const stockTransferDetailsForm = useForm({
  stock_transfer_id:props.stock_transfer_id,
  stock_id: "",
  quantity: "",
  cost: "",
  amount: "",
});

const submitDetailsForm = () => {
  stockTransferDetailsForm.post(route("stock.transfer.details.store"), {
    onSuccess: () => {
      stockTransferDetailsForm.reset("stock_id");
      stockTransferDetailsForm.reset("quantity");
      stockTransferDetailsForm.reset("cost");
      stockTransferDetailsForm.reset("amount");
    },
  });
};


// const stock_transferFinishForm = useForm({
//   stock_transfer_id:props.stock_transfer.id
// });

// const finishForm = () => {
//   stock_transferFinishForm.post(route("stock.transfer.finish"), {
//     onSuccess: () => {
//     },
//   });
// };

const computeAmount = () => {
  stockTransferDetailsForm.amount = stockTransferDetailsForm.quantity * stockTransferDetailsForm.cost;
};
</script>

<template>
  <div class="card mb-4">
    <div class="card-header">Add Stock</div>
    <div class="card-body">
      <form @submit.prevent="submitDetailsForm">
        <div class="col-12">
          <label for="stock_id" class="form-label">Stocks</label>
          <select
            class="form-select select2"
            id="stock_id"
            v-model="stockTransferDetailsForm.stock_id"
          >
            <option
              v-for="(stock, keyStocks) in stocks"
              :key="keyStocks"
              :value="stock.stock_id"
            >
              {{ stock.quantity }}
            </option>
          </select>
          <div
            class="invalid-feedback"
            v-show="stockTransferDetailsForm.errors.stock_id"
            style="display: block"
          >
            {{ stockTransferDetailsForm.errors.stock_id }}
          </div>
        </div>
        <div class="col-12">
          <label for="quantity" class="form-label">Qty</label>
          <input
            type="number"
            class="form-control"
            id="quantity"
            v-model="stockTransferDetailsForm.quantity"
            @keyup="computeAmount"
          />
          <div
            class="invalid-feedback"
            v-show="stockTransferDetailsForm.errors.quantity"
            style="display: block"
          >
            {{ stockTransferDetailsForm.errors.quantity }}
          </div>
        </div>
        <div class="col-12">
          <label for="cost" class="form-label">Cost</label>
          <input
            type="number"
            class="form-control"
            id="cost"
            v-model="stockTransferDetailsForm.cost"
            @keyup="computeAmount"
          />
          <div
            class="invalid-feedback"
            v-show="stockTransferDetailsForm.errors.cost"
            style="display: block"
          >
            {{ stockTransferDetailsForm.errors.cost }}
          </div>
        </div>
        <div class="col-12">
          <label for="amount" class="form-label">Amount</label>
          <input
            type="number"
            class="form-control"
            id="amount"
            v-model="stockTransferDetailsForm.amount"
            readonly
          />
          <div
            class="invalid-feedback"
            v-show="stockTransferDetailsForm.errors.amount"
            style="display: block"
          >
            {{ stockTransferDetailsForm.errors.amount }}
          </div>
        </div>
        <div class="col-md-12">
          <button
            type="submit"
            class="btn btn-sm btn-secondary"
            :class="{
              'opacity-25': stockTransferDetailsForm.processing,
            }"
            :disabled="stockTransferDetailsForm.processing"
          >
            Add Stock
          </button>
        </div>
      </form>
    </div>
  </div>
</template>