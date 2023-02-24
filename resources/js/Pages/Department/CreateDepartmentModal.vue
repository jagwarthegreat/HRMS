<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const deptform = useForm({
  title: "",
  dept_id: "",
});

const submitForm = () => {
  deptform.title = $("#title").val();
  deptform.dept_id = $("#dept_id").val();

  deptform.post(route("department.store"), {
    onSuccess: () => {
      deptform.reset("title");
      $("#createDepartmentModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createDepartmentModal"
    tabindex="-1"
    aria-labelledby="createDepartmentModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <input type="hidden" id="dept_id">
          <div class="modal-header">
            <h5 class="modal-title" id="createDepartmentModalTitle">
              Add Department
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
                />
                <div
                  class="invalid-feedback"
                  v-show="deptform.errors.title"
                  style="display: block"
                >
                  {{ deptform.errors.title }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': deptform.processing }"
              :disabled="deptform.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>