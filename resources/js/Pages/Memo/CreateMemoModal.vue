<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const dprops = defineProps({
  props: Object
});

const memoform = useForm({
  employee_id: Number,
  from: "",
  memo_date: "",
  subject: "",
  content: "",
});

const submitForm = () => {
  memoform.post(route("memo.store"), {
    onSuccess: () => {
      memoform.reset("employee_id", "from", "memo_date", "subject", "content");
      $("#createMemoModal").modal("hide");
    },
  });
};

onMounted(()=>{
  $('.summernote').summernote({
  			maximumImageFileSize: 1048576,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']],
        ],
        callbacks: {
          onChange: function(contents, $editable) {
            memoform.content = contents
          }
        }
      });


	const myMutliSelect = document.getElementById('employee_id')
	myMutliSelect.addEventListener('changed.coreui.multi-select', event => {
	  // Get the list of selected options.

	  const selected = event.value;
	  memoform.employee_id = selected;
	})
	
  new coreui.MultiSelect(myMutliSelect, {
    multiple: false,
    search: true
  });
});
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createMemoModal"
    tabindex="-1"
    aria-labelledby="createMemoModal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createMemoModal">Add Memo</h5>
            <button
              type="button"
              class="btn-close"
              data-coreui-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-4">
                <label for="employee_id" class="form-label">Employee</label>
                <select
                  class="form-multi-select"
                  id="employee_id"
                  v-model="memoform.employee_id"
                >
                  <option
                    v-for="(employees, keyEmployees) in props.employees"
                    :key="keyEmployees"
                    :value="employees.id"
                  >
                    {{ employees.firstname + " " + employees.lastname }}
                  </option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="memoform.errors.employee_id"
                  style="display: block"
                >
                  {{ memoform.errors.employee_id }}
                </div>
              </div>
              <div class="col-md-4">
                <label for="from" class="form-label">From</label>
                <input
                  type="text"
                  class="form-control"
                  id="from"
                  v-model="memoform.from"
                />
                <div
                  class="invalid-feedback"
                  v-show="memoform.errors.from"
                  style="display: block"
                >
                  {{ memoform.errors.from }}
                </div>
              </div>
              <div class="col-md-4">
                <label for="memo_date" class="form-label">Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="memo_date"
                  v-model="memoform.memo_date"
                />
                <div
                  class="invalid-feedback"
                  v-show="memoform.errors.memo_date"
                  style="display: block"
                >
                  {{ memoform.errors.memo_date }}
                </div>
              </div>
              <div class="col-12">
                <label for="subject" class="form-label">Subject</label>
                <input
                  type="text"
                  class="form-control"
                  id="subject"
                  v-model="memoform.subject"
                />
                <div
                  class="invalid-feedback"
                  v-show="memoform.errors.subject"
                  style="display: block"
                >
                  {{ memoform.errors.subject }}
                </div>
              </div>
              <div class="col-12">
                <label for="content" class="form-label">Content</label>
                <textarea
                  type="text"
                  class="form-control summernote"
                  name="content"
                ></textarea>
                <div
                  class="invalid-feedback"
                  v-show="memoform.errors.content"
                  style="display: block"
                >
                  {{ memoform.errors.content }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': memoform.processing }"
              :disabled="memoform.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>