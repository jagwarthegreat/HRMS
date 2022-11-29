<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const dprops = defineProps({
  props: Array
});

const qclaimsform = useForm({
  to: "",
  from: "",
  memo_date: "",
  subject: "",
  content: "",
});

const submitForm = () => {
  // qclaimsform.post(route("memo.store"), {
  //   onSuccess: () => {
  //     qclaimsform.reset("to", "from", "memo_date", "subject", "content");
  //     $("#createMemoModal").modal("hide");
  //   },
  // });
};
</script>

<template>
	<!-- Modal -->
	<div
		class="modal fade"
		id="createQuitClaimsModal"
		tabindex="-1"
		aria-labelledby="createQuitClaimsModal"
		aria-hidden="true"
	>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form @submit.prevent="submitForm">
					<div class="modal-header">
						<h5 class="modal-title" id="createQuitClaimsModal">
							Add Quit Claims
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
								<label for="to" class="form-label">Employee</label>
								<select
									class="form-select"
									id="employee"
									v-model="qclaimsform.to"
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
									v-show="qclaimsform.errors.employee"
									style="display: block"
								>
									{{ qclaimsform.errors.to }}
								</div>
							</div>
							<div class="col-md-4">
								<label for="from" class="form-label">Amount</label>
								<input
									type="text"
									class="form-control"
									id="from"
									v-model="qclaimsform.from"
								/>
								<div
									class="invalid-feedback"
									v-show="qclaimsform.errors.from"
									style="display: block"
								>
									{{ qclaimsform.errors.from }}
								</div>
							</div>
							<div class="col-md-4">
								<label for="memo_date" class="form-label"
									>Resignation Date</label
								>
								<input
									type="date"
									class="form-control"
									id="memo_date"
									v-model="qclaimsform.memo_date"
								/>
								<div
									class="invalid-feedback"
									v-show="qclaimsform.errors.memo_date"
									style="display: block"
								>
									{{ qclaimsform.errors.memo_date }}
								</div>
							</div>
							<div class="col-4">
								<label for="subject" class="form-label">Claims Date</label>
								<input
									type="date"
									class="form-control"
									id="subject"
									v-model="qclaimsform.subject"
								/>
								<div
									class="invalid-feedback"
									v-show="qclaimsform.errors.subject"
									style="display: block"
								>
									{{ qclaimsform.errors.subject }}
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button
							type="submit"
							class="btn btn-sm btn-primary"
							:class="{ 'opacity-25': qclaimsform.processing }"
							:disabled="qclaimsform.processing"
						>
							Save Changes
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>