<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  employee_id: String,
  docTypes: Array,
});

const docform = useForm({
  doc_category: "",
  doc_file: "",
  employee_id: props.employee_id,
});

const uploadDocument = () => {
  docform.post(route("docs.store"), {
    forceFormData: true,
    onSuccess: () => {
      docform.reset("doc_category", "doc_file", "employee_id");
      $("#addDocumentModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="addDocumentModal"
    tabindex="-1"
    aria-labelledby="addDocumentModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="uploadDocument" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="addDocumentModal">Upload Document</h5>
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
                <label for="employee_status" class="form-label">Category</label>
                <select
                  class="form-select"
                  id="doc_category"
                  v-model="docform.doc_category"
                >
                  <option
                    v-for="(docType, keyDocType) in docTypes"
                    :key="keyDocType"
                    :value="docType.id"
                  >
                    {{ docType.title }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="docform.errors.doc_category"
                  style="display: block"
                >
                  {{ docform.errors.doc_category }}
                </div>
              </div>
              <div class="col-12">
                <label for="doc_file" class="form-label"> File </label>
                <input
                  type="file"
                  class="form-control"
                  id="doc_file"
                  name="doc_file"
                  @input="docform.doc_file = $event.target.files[0]"
                />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': docform.processing }"
              :disabled="docform.processing"
            >
              Upload
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>