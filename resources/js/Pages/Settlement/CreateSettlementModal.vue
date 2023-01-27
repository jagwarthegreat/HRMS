<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const dprops = defineProps({
  props: Object
});

const settlementform = useForm({
  settlement_date: dateNow,
  content: "",
	lawsuit_id: dprops.props.lawsuit.id,
});

const submitForm = () => {
  settlementform.post(route("lawsuit.settlement.store"), {
    onSuccess: () => {
    	$('.summernote').summernote('reset');
      settlementform.reset("settlement_date", "content");
      $("#createSettlementModal").modal("hide");
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
            settlementform.content = contents
          }
        }
      });
});
</script>

<template>
	<!-- Modal -->
	<div
		class="modal fade"
		id="createSettlementModal"
		tabindex="-1"
		aria-labelledby="createSettlementModal"
		aria-hidden="true"
	>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form @submit.prevent="submitForm">
					<div class="modal-header">
						<h5 class="modal-title" id="createSettlementModal">
							Add Settlement
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
							<div class="col-md-12">
								<label for="settlement_date" class="form-label"
									>Settlement Date</label
								>
								<input
									type="date"
									class="form-control"
									id="settlement_date"
									v-model="settlementform.settlement_date"
								/>
								<div
									class="invalid-feedback"
									v-show="settlementform.errors.settlement_date"
									style="display: block"
								>
									{{ settlementform.errors.settlement_date }}
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
									v-show="settlementform.errors.content"
									style="display: block"
								>
									{{ settlementform.errors.content }}
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button
							type="submit"
							class="btn btn-sm btn-primary"
							:class="{ 'opacity-25': settlementform.processing }"
							:disabled="settlementform.processing"
						>
							Save Changes
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>