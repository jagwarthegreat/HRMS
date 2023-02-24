<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  clients: Array,
});

const locationform = useForm({
  title: "",
  client: "",
  loc_id: "",
});

const submitForm = () => {
  locationform.title = $("#title").val();
  locationform.client = $("#client").val();
  locationform.loc_id = $("#loc_id").val();

  locationform.post(route("location.store"), {
    onSuccess: () => {
      locationform.reset("title");
      $("#createLocationModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createLocationModal"
    tabindex="-1"
    aria-labelledby="createLocationModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <input type="hidden" id="loc_id">
          <div class="modal-header">
            <h5 class="modal-title" id="createLocationModalTitle">Add Location</h5>
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
                />
                <div
                  class="invalid-feedback"
                  v-show="locationform.errors.title"
                  style="display: block"
                >
                  {{ locationform.errors.title }}
                </div>
              </div>
              <div class="col-12">
                <label for="client" class="form-label">Client</label>
                <select
                  class="form-select select2"
                  id="client"
                >
                  <option
                    v-for="(client, keyClient) in clients"
                    :key="keyClient"
                    :value="client.id"
                  >
                    {{ client.name }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="locationform.errors.client"
                  style="display: block"
                >
                  {{ locationform.errors.client }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': locationform.processing }"
              :disabled="locationform.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>