<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const dprops = defineProps({
  props: Array
});

const lawsuitform = useForm({
  complainant: "",
  respondent: "",
  case_date: dateNow,
  case_name: "",
  status: "Ongoing",
  content: "",
});

const submitForm = () => {
  lawsuitform.post(route("lawsuit.store"), {
    onSuccess: () => {
    	$('#selectinput').prop('checked', false);
			changeInput();
			$('.summernote').summernote('reset');
      lawsuitform.reset("complainant", "respondent", "case_date", "case_name", "status", "content");
      $("#createLawsuitModal").modal("hide");
    },
  });
};

onMounted(()=>{

  $('.summernote').summernote({
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
            lawsuitform.content = contents
          }
        }
      });

  // const myMutliSelect = document.getElementById('complainant_employee')
	// 	myMutliSelect.addEventListener('changed.coreui.multi-select', event => {
	//   // Get the list of selected options.
	//   const selected = event.value
	//   lawsuitform.complainant = selected
	// })
});

function changeInput() {
	if($("#selectinput").is(':checked')){
		// $(".form-multi-select").show();
		$("#complainant_employee").show();
		$("#complainant").hide();
	}else{
		lawsuitform.complainant = "";
		// $(".form-multi-select").hide();
		$("#complainant_employee").hide();
		$("#complainant").show();
	}
}
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createLawsuitModal"
    tabindex="-1"
    aria-labelledby="createLawsuitModal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createLawsuitModal">
              Add Lawsuit/Case
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
              <div class="col-md-4">
                <label for="complainant_container" class="form-label"
                  >Complainant</label
                >
                <div class="input-group mb-3" id="complainant_container">
                  <div class="input-group-text">
                    <input
                      class="form-check-input mt-0"
                      type="checkbox"
                      id="selectinput"
                      aria-label="Checkbox for following text input"
                      @change="changeInput()"
                    />
                  </div>
                  <input
                    type="text"
                    class="form-control"
                    id="complainant"
                    v-model="lawsuitform.complainant"
                    aria-label="selectinput"
                  />
                  <select
                    class="form-control"
                    id="complainant_employee"
                    v-model="lawsuitform.complainant"
                    aria-label="selectinput"
                    style="display: none"
                    multiple
                  >
                    <optgroup label="Employees">
                      <option
                        v-for="(employees, keyEmployees) in props.employees"
                        :key="keyEmployees"
                        :value="employees.firstname + ' ' + employees.lastname"
                      >
                        {{ employees.firstname + " " + employees.lastname }}
                      </option>
                    </optgroup>
                  </select>
                </div>
                <div
                  class="invalid-feedback"
                  v-show="lawsuitform.errors.complainant"
                  style="display: block"
                >
                  {{ lawsuitform.errors.complainant }}
                </div>
              </div>
              <div class="col-md-4">
                <label for="respondent" class="form-label">Respondent</label>
                <input
                  type="text"
                  class="form-control"
                  id="respondent"
                  v-model="lawsuitform.respondent"
                />
                <div
                  class="invalid-feedback"
                  v-show="lawsuitform.errors.respondent"
                  style="display: block"
                >
                  {{ lawsuitform.errors.respondent }}
                </div>
              </div>
              <div class="col-md-4">
                <label for="case_date" class="form-label">Case Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="case_date"
                  v-model="lawsuitform.case_date"
                />
                <div
                  class="invalid-feedback"
                  v-show="lawsuitform.errors.case_date"
                  style="display: block"
                >
                  {{ lawsuitform.errors.case_date }}
                </div>
              </div>
              <div class="col-8">
                <label for="case_name" class="form-label">Case Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="case_name"
                  v-model="lawsuitform.case_name"
                />
                <div
                  class="invalid-feedback"
                  v-show="lawsuitform.errors.case_name"
                  style="display: block"
                >
                  {{ lawsuitform.errors.case_name }}
                </div>
              </div>
              <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select
                  class="form-select"
                  id="status"
                  v-model="lawsuitform.status"
                >
                  <option value="Ongoing">Ongoing</option>
                  <option value="Resolved">Resolved</option>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="lawsuitform.errors.case_date"
                  style="display: block"
                >
                  {{ lawsuitform.errors.case_date }}
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
                  v-show="lawsuitform.errors.content"
                  style="display: block"
                >
                  {{ lawsuitform.errors.content }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': lawsuitform.processing }"
              :disabled="lawsuitform.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>