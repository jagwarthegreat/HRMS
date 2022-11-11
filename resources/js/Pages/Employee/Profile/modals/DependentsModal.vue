<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  employee_id: String,
});

const dform = useForm({
  dependent_name: "",
  dependent_relationship: "",
  dependent_contact: "",
  dependent_dob: "",
  employee_id: props.employee_id,
});

const dependentStore = () => {
  dform.post(route("employee.dependent.store"), {
    onSuccess: () => {
      dform.reset([
        "dependent_name",
        "dependent_relationship",
        "dependent_contact",
        "dependent_dob",
      ]);
      $("#dependentsModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="dependentsModal"
    tabindex="-1"
    aria-labelledby="dependentsModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="dependentStore">
          <div class="modal-header">
            <h5 class="modal-title" id="dependentsModal">Dependent</h5>
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
                <label for="dependent_name" class="form-label"> Name </label>
                <input
                  type="text"
                  class="form-control"
                  id="dependent_name"
                  v-model="dform.dependent_name"
                />
              </div>
              <div class="col-12">
                <label for="dependent_relationship" class="form-label"
                  >Relationship</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="dependent_relationship"
                  v-model="dform.dependent_relationship"
                />
              </div>
              <div class="col-12">
                <label for="dependent_contact" class="form-label">
                  Contact
                </label>
                <input
                  type="text"
                  class="form-control"
                  id="dependent_contact"
                  v-model="dform.dependent_contact"
                />
              </div>
              <div class="col-12">
                <label for="dependent_dob" class="form-label">
                  Date of Birth
                </label>
                <input
                  type="date"
                  class="form-control"
                  id="dependent_dob"
                  v-model="dform.dependent_dob"
                />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary">
              Add Dependent
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>