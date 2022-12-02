<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  procurement: Array,
});

</script>
<style scoped>
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
	              <span v-show="!procurement.status" class="badge text-bg-warning">Saved</span>
	            </td>
	          </tr>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
</template>