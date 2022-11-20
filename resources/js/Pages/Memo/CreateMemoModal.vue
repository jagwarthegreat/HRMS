<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const memoform = useForm({
  to: "",
  from: "",
  memo_date: "",
  subject: "",
  content: "",
});

const submitForm = () => {
  // memoform.post(route("memo.store"), {
  //   onSuccess: () => {
  //     memoform.reset("to", "from", "memo_date", "subject", "content");
  //     $("#createMemoModal").modal("hide");
  //   },
  // });
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
        ]
      });
});

function testMethod(val) {
  console.log(val);
}
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
                <label for="to" class="form-label">To</label>
                <input
                  type="text"
                  class="form-control"
                  id="to"
                  v-model="memoform.to"
                />
                <div
                  class="invalid-feedback"
                  v-show="memoform.errors.to"
                  style="display: block"
                >
                  {{ memoform.errors.to }}
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
                  @change="testMethod(this)"
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