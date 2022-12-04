<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ShowStockTransferInfo from "./ShowStockTransferInfo.vue";
import ShowStockTransferDetails from "./Details/ShowStockTransferDetails.vue";
import CreateStockTransferDetails from "./Details/CreateStockTransferDetails.vue";

const props = defineProps({
  details:[],
  stock_transfer:[],
  stocks:[],
});

const stock_transferFinishForm = useForm({
  stock_transfer_id:props.stock_transfer.id
});

const finishForm = () => {
  stock_transferFinishForm.post(route("stock.transfer.finish"), {
    onSuccess: () => {
    },
  });
};
</script>
<template>
  <Head title="Stock Transfer Details" />

  <AuthenticatedLayout>

    <template #breadcrumbs>
      <li class="breadcrumb-item">
        <Link :href="route('dashboard')">Dashboard</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Stock Transfer</li>
    </template>
    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('stock.transfer')">
        <svg class="icon">
          <use
            xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-arrow-left"
          ></use>
        </svg>
        Go back
      </Link>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ShowStockTransferInfo :stock_transfer="stock_transfer"></ShowStockTransferInfo>
      </div>
      <div class="row">
        <div class="col-md-4" v-show="stock_transfer.status == 0">
          <CreateStockTransferDetails :stock_transfer_id="stock_transfer.id" :stocks="stocks"></CreateStockTransferDetails>
        </div>
        <div :class="stock_transfer.status == 0 ?'col-md-8':'col-md-12'">
          <ShowStockTransferDetails :details="details"></ShowStockTransferDetails>
        </div>
      </div>
    </div>
    <div class="row" v-show="stock_transfer.status == 0">
      <div class="col-md-12">
        <button
          type="button"
          class="btn btn-primary rounded-pill"
          style="float:right"
          @click="finishForm"
          :class="{ 'opacity-25': stock_transferFinishForm.processing }"
          :disabled="stock_transferFinishForm.processing"
        >
          <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-check"
              ></use>
            </svg>
          Finish Stock Transfer
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>