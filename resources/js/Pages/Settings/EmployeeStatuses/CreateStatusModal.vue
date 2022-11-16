<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const statsform = useForm({
  title: "",
});

const submitForm = () => {
  statsform.post(route("settings.emp.statuses.store"), {
    onSuccess: () => {
      statsform.reset("title");
      $("#createStatusModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createStatusModal"
    tabindex="-1"
    aria-labelledby="createStatusModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createStatusModal">
              Add Employee Status
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
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  v-model="statsform.title"
                />
                <div
                  class="invalid-feedback"
                  v-show="statsform.errors.title"
                  style="display: block"
                >
                  {{ statsform.errors.title }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': statsform.processing }"
              :disabled="statsform.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>