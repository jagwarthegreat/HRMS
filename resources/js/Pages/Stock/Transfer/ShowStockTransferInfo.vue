<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  stock_transfer: Array,
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
                  <span v-show="!stock_transfer.status" class="badge text-bg-warning">Saved</span>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
</template>