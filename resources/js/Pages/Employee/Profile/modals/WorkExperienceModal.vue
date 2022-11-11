<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  employee_id: String,
});

const workform = useForm({
  prev_company: "",
  jobTitle: "",
  from_date: "",
  to_date: "",
  job_desc: "",
  employee_id: props.employee_id,
});

const workExpStore = () => {
  workform.post(route("employee.workexp.store"), {
    onSuccess: () => {
      workform.reset([
        "prev_company",
        "jobTitle",
        "from_date",
        "to_date",
        "job_desc",
      ]);
      $("#workExperienceModal").modal("hide");
    },
  });
};
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="workExperienceModal"
    tabindex="-1"
    aria-labelledby="workExperienceModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="workExpStore">
          <div class="modal-header">
            <h5 class="modal-title" id="workExperienceModal">
              Work Experience
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
                <label for="prev_company" class="form-label"
                  >Previous Company</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="prev_company"
                  v-model="workform.prev_company"
                />
              </div>
              <div class="col-12">
                <label for="jobTitle" class="form-label">Job Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="jobTitle"
                  v-model="workform.jobTitle"
                />
              </div>
              <div class="col-12">
                <label for="from_date" class="form-label">From</label>
                <input
                  type="date"
                  class="form-control"
                  id="from_date"
                  v-model="workform.from_date"
                />
              </div>
              <div class="col-12">
                <label for="to_date" class="form-label">To</label>
                <input
                  type="date"
                  class="form-control"
                  id="to_date"
                  v-model="workform.to_date"
                />
              </div>
              <div class="col-12">
                <label for="job_desc" class="form-label">Job description</label>
                <input
                  type="text"
                  class="form-control"
                  id="job_desc"
                  v-model="workform.job_desc"
                />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary">
              Create Experience
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>