<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  procurement_id:'',
  stocks:[],
});

const procurementDetailsForm = useForm({
  procurement_id:props.procurement_id,
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

const computeAmount = () => {
  procurementDetailsForm.amount = procurementDetailsForm.quantity * procurementDetailsForm.cost;
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
	        <div class="row">
	          <div class="col-6">
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
	          <div class="col-6">
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
	        <div class="col-md-12 mt-2">
	          <button
	            type="submit"
				class="btn btn-sm btn-success rounded-pill"
	            :class="{
	              'opacity-25': procurementDetailsForm.processing,
	            }"
	            :disabled="procurementDetailsForm.processing"
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