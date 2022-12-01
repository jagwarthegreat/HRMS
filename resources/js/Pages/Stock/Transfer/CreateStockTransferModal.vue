<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  locations: Array,
});

const stockTransferForm = useForm({
  date: "",
  from: "",
  to: "",
  remarks: "",
});

const submitForm = () => {
  stockTransferForm.post(route("stock.transfer.store"), {
    onSuccess: () => {
      location.reload();
      stockTransferForm.reset("from");
      stockTransferForm.reset("to");
      stockTransferForm.reset("remarks");
      stockTransferForm.reset("date");
      $("#createStockTransferModal").modal("hide");
    },
  }).then((response)=>function(){
    console.log(response);
  });
};

</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createStockTransferModal"
    tabindex="-1"
    aria-labelledby="createStockTransferModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createStockTransferModal">
              Add Stock Transfer
            </h5>
            <button
              type="button"
              class="btn-close"
              data-coreui-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-12">
                <label for="date" class="form-label">Date Transfer</label>
                <input
                  type="date"
                  class="form-control"
                  id="date"
                  v-model="stockTransferForm.date"
                />
                <div
                  class="invalid-feedback"
                  v-show="stockTransferForm.errors.date"
                  style="display: block"
                >
                  {{ stockTransferForm.errors.date }}
                </div>
              </div>
              <div class="col-12">
                <label for="from" class="form-label">From</label>
                <select
                  class="form-select select2"
                  id="from"
                  v-model="stockTransferForm.from"
                >
                  <option
                    v-for="(location, keyLocation) in locations"
                    :key="keyLocation"
                    :value="location.id"
                  >
                    {{ location.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="stockTransferForm.errors.from"
                  style="display: block"
                >
                  {{ stockTransferForm.errors.from }}
                </div>
              </div>
              <div class="col-12">
                <label for="to" class="form-label">To</label>
                <select
                  class="form-select select2"
                  id="to"
                  v-model="stockTransferForm.to"
                >
                  <option
                    v-for="(location, keyLocation) in locations"
                    :key="keyLocation"
                    :value="location.id"
                  >
                    {{ location.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="stockTransferForm.errors.to"
                  style="display: block"
                >
                  {{ stockTransferForm.errors.to }}
                </div>
              </div>
              <div class="col-12">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea
                  class="form-control"
                  id="remarks"
                  v-model="stockTransferForm.remarks"
                >
                </textarea>
                <div
                  class="invalid-feedback"
                  v-show="stockTransferForm.errors.remarks"
                  style="display: block"
                >
                  {{ stockTransferForm.errors.remarks }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': stockTransferForm.processing }"
              :disabled="stockTransferForm.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>