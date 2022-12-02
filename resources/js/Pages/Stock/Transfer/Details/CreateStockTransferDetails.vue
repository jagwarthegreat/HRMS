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
  avail_quantity: 0,
});

const submitDetailsForm = () => {
  stockTransferDetailsForm.post(route("stock.transfer.details.store"), {
    onSuccess: () => {
      stockTransferDetailsForm.reset("stock_id");
      stockTransferDetailsForm.reset("quantity");
    },
  });
};

const computeAmount = () => {
  stockTransferDetailsForm.amount = stockTransferDetailsForm.quantity * stockTransferDetailsForm.cost;
};

const changeAvailQty = (e) => {
  stockTransferDetailsForm.avail_quantity = e.target.selectedOptions[0].dataset.quantity * 1;
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
            @change="changeAvailQty($event)"
          >
            <option
              v-for="(stock, keyStocks) in stocks"
              :key="keyStocks"
              :value="stock.stock_id"
              :data-quantity="stock.quantity"
            >
              {{ stock.stock.name }}
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
        <div class="row">
          <div class="col-6">
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
          <div class="col-6">
            <label for="avail_quantity" class="form-label">Available Qty</label>
            <input
              type="number"
              class="form-control"
              id="avail_quantity"
              v-model="stockTransferDetailsForm.avail_quantity"
              readonly
            />
            <div
              class="invalid-feedback"
              v-show="stockTransferDetailsForm.errors.avail_quantity"
              style="display: block"
            >
              {{ stockTransferDetailsForm.errors.avail_quantity }}
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-2">
          <button
            type="submit"
            class="btn btn-sm btn-success rounded-pill"
            :class="{
              'opacity-25': stockTransferDetailsForm.processing,
            }"
            :disabled="stockTransferDetailsForm.processing"
          >
          <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"
              ></use>
            </svg>
            Add Stock
          </button>
        </div>
      </form>
    </div>
  </div>
</template>