<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
});

const stockCategoryForm = useForm({
  name: "",
});

const submitForm = () => {
  stockCategoryForm.post(route("stock.category.store"), {
    onSuccess: () => {
      stockCategoryForm.reset("name");
      $("#createStockCategoryModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createStockCategoryModal"
    tabindex="-1"
    aria-labelledby="createStockCategoryModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createStockCategoryModal">Add Stock Category</h5>
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
                  v-model="stockCategoryForm.name"
                />
                <div
                  class="invalid-feedback"
                  v-show="stockCategoryForm.errors.name"
                  style="display: block"
                >
                  {{ stockCategoryForm.errors.name }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': stockCategoryForm.processing }"
              :disabled="stockCategoryForm.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>