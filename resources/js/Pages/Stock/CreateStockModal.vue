<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  categories: Array,
});

const stockForm = useForm({
  name: "",
  unit: "",
  stock_category_id: "",
});

const submitForm = () => {
  stockForm.post(route("stock.store"), {
    onSuccess: () => {
      stockForm.reset("name");
      stockForm.reset("unit");
      stockForm.reset("stock_category_id");
      $("#createStockModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createStockModal"
    tabindex="-1"
    aria-labelledby="createStockModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createStockModal">Add Stock</h5>
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
                <label for="name" class="form-label">Stock Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  v-model="stockForm.name"
                />
                <div
                  class="invalid-feedback"
                  v-show="stockForm.errors.name"
                  style="display: block"
                >
                  {{ stockForm.errors.name }}
                </div>
              </div>
              <div class="col-12">
                <label for="unit" class="form-label">Unit</label>
                <input
                  type="text"
                  class="form-control"
                  id="unit"
                  v-model="stockForm.unit"
                />
                <div
                  class="invalid-feedback"
                  v-show="stockForm.errors.unit"
                  style="display: block"
                >
                  {{ stockForm.errors.unit }}
                </div>
              </div>
              <div class="col-12">
                <label for="client" class="form-label">Category</label>
                <select
                  class="form-select select2"
                  id="client"
                  v-model="stockForm.stock_category_id"
                >
                  <option
                    v-for="(category, keyCategory) in categories"
                    :key="keyCategory"
                    :value="category.id"
                  >
                    {{ category.name }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="stockForm.errors.stock_category_id"
                  style="display: block"
                >
                  {{ stockForm.errors.stock_category_id }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': stockForm.processing }"
              :disabled="stockForm.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>