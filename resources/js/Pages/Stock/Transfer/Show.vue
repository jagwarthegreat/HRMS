<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ShowStockTransferDetails from "./Details/ShowStockTransferDetails.vue";
import CreateStockTransferDetails from "./Details/CreateStockTransferDetails.vue";

const props = defineProps({
  details:[],
  stock_transfer:[],
  stocks:[],
});

</script>

<style scoped>
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
  <Head title="stock_transfers Details" />

  <AuthenticatedLayout>

    <template #breadcrumbs>
      <li class="breadcrumb-item">
        <Link :href="route('dashboard')">Dashboard</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Stock Transfer</li>
    </template>
    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('stock.transfer')">
        Go back
      </Link>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">Stock Transfer Info</div>
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
                      {{ stock_transfer.reference }}
                    </td>
                  </tr>
                  <tr>
                    <td class="basicInfoLabel">
                      <span>Date</span>
                      <span>:</span>
                    </td>
                    <td class="basicInfoData">
                      {{ stock_transfer.date }}
                    </td>
                  </tr>
                </table>
              </div>
              <div class="col-md-4">
                <table>
                  <tr>
                    <td class="basicInfoLabel">
                      <span>From</span>
                      <span>:</span>
                    </td>
                    <td class="basicInfoData">
                      {{ stock_transfer.location_from.title }}
                    </td>
                  </tr>
                  <tr>
                    <td class="basicInfoLabel">
                      <span>To</span>
                      <span>:</span>
                    </td>
                    <td class="basicInfoData">
                      {{ stock_transfer.location_to.title }}
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
                      {{ stock_transfer.remarks }}
                    </td>
                  </tr>
                  <tr>
                    <td class="basicInfoLabel">
                      <span>Status</span>
                      <span>:</span>
                    </td>
                    <td class="basicInfoData">
                      <span v-show="stock_transfer.status" class="badge text-bg-success">Finished</span>
                      <span v-show="!stock_transfer.status" class="badge text-bg-danger">Saved</span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4" v-show="stock_transfer.status == 0">
          <CreateStockTransferDetails :stock_transfer_id="stock_transfer.id" :stocks="stocks"></CreateStockTransferDetails>
        </div>
        <div :class="props.stock_transfer.status == 0 ?'col-md-8':'col-md-12'">
          <ShowStockTransferDetails :details="details"></ShowStockTransferDetails>
        </div>
      </div>
    </div>
<!--     <div class="row" v-show="stock_transfer.status == 0">
      <div class="col-md-12">
        <button
          type="button"
          class="btn btn-primary rounded-pill"
          style="float:right"
          @click="finishForm"
          :class="{ 'opacity-25': stock_transferFinishForm.processing }"
          :disabled="stock_transferFinishForm.processing"
        >
          Finish stock_transfer
        </button>
      </div>
    </div> -->
  </AuthenticatedLayout>
</template>