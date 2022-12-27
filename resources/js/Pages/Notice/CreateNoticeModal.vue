<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const dprops = defineProps({
  props: Array
});

const noticeform = useForm({
  notice_for: "",
  subject: "",
  content: "",
  notice_date: dateNow,
});

const submitForm = () => {
  noticeform.post(route("notice.store"), {
    onSuccess: () => {
      noticeform.reset("notice_for", "subject", "content", "notice_date");
      $("#createNoticeModal").modal("hide");
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
            noticeform.content = contents
          }
        }
      });

  const myMutliSelect = document.getElementById('notice_for_select')
		myMutliSelect.addEventListener('changed.coreui.multi-select', event => {
	  // Get the list of selected options.
	  const selected = event.value;
	  noticeform.notice_for = selected;

	  console.log(event);
	})
});
</script>

<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createNoticeModal"
    tabindex="-1"
    aria-labelledby="createNoticeModal"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form @submit.prevent="submitForm">
          <div class="modal-header">
            <h5 class="modal-title" id="createNoticeModal">Add Notice</h5>
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
                <label for="notice_date" class="form-label">Notice Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="notice_date"
                  v-model="noticeform.notice_date"
                />
                <div
                  class="invalid-feedback"
                  v-show="noticeform.errors.notice_date"
                  style="display: block"
                >
                  {{ noticeform.errors.notice_date }}
                </div>
              </div>
              <div class="col-md-8">
                <label for="subject" class="form-label">Subject</label>
                <input
                  type="text"
                  class="form-control"
                  id="subject"
                  v-model="noticeform.subject"
                />
                <div
                  class="invalid-feedback"
                  v-show="noticeform.errors.subject"
                  style="display: block"
                >
                  {{ noticeform.errors.subject }}
                </div>
              </div>
              <div class="col-12">
                <label for="notice_for" class="form-label">Notice For</label>
                <input
                  type="hidden"
                  class="form-control"
                  id="notice_for"
                  v-model="noticeform.notice_for"
                />
                <select
                  class="form-multi-select"
                  id="notice_for_select"
                  multiple
                >
                  <optgroup label="Employees">
                    <option
                      v-for="(employees, keyEmployees) in props.employees"
                      :key="keyEmployees"
                      :value="'E-' + employees.id"
                    >
                      {{ employees.firstname + " " + employees.lastname }}
                    </option>
                  </optgroup>
                  <optgroup label="Clients">
                    <option
                      v-for="(clients, keyClients) in props.clients"
                      :key="keyClients"
                      :value="'C-' + clients.id"
                    >
                      {{ clients.name }}
                    </option>
                  </optgroup>
                </select>
                <div
                  class="invalid-feedback"
                  v-show="noticeform.errors.notice_for"
                  style="display: block"
                >
                  {{ noticeform.errors.notice_for }}
                </div>
              </div>
              <div class="col-md-12">
                <label for="content" class="form-label">Content</label>
                <textarea
                  type="text"
                  class="form-control summernote"
                  name="content"
                ></textarea>
                <div
                  class="invalid-feedback"
                  v-show="noticeform.errors.content"
                  style="display: block"
                >
                  {{ noticeform.errors.content }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-primary"
              :class="{ 'opacity-25': noticeform.processing }"
              :disabled="noticeform.processing"
            >
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>