<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateQuitClaimsModal from "./CreateQuitclaimsModal.vue";
import { ref, onMounted } from 'vue'

const props = defineProps({
  qclaims: Object,
  employees: Object,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('quitclaims.destroy', id));
  }
}

onMounted(() => {
  $('.qclaims').DataTable();
  $('.qclaims').attr('style', 'border-collapse: collapse !important');
})

function addModal(modalId) {
	$("#createQuitClaimsModalTitle").html('Add Quit Claims');
	$("#qclaimsid").val('');
	$("#employee").val('');
	$("#amount").val('');
	$("#resignation_date").val('');
	$("#claims_date").val('');
	
	openClickedModal(modalId);
}

function updateModal(qclaimsid, employee, amount, resignation_date, claims_date) {
	$("#createQuitClaimsModalTitle").html('Edit Quit Claims');
	$("#qclaimsid").val(qclaimsid);
	$("#employee").val(employee);

	var multiselect = coreui.MultiSelect.getInstance(document.querySelector("#employee"));
  document.querySelector(`#employee option[value='${employee}']`).setAttribute("selected", "selected")
	multiselect.update();

	// $("#employee").trigger('checked');
	$("#amount").val(amount);
	$("#resignation_date").val(resignation_date);
	$("#claims_date").val(claims_date);

	openClickedModal('createQuitClaimsModal');
}
</script>
<style scoped>
td {
	padding: 3px;
	vertical-align: middle;
}
</style>
<template>
	<Head title="Quit Claims" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Quit Claims</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
				class="btn btn-dark btn-sm"
				@click="addModal('createQuitClaimsModal')"
			>
				Create Quit Claims
			</button>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Quit CLaim List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover qclaims">
								<thead>
									<tr>
										<th>Date</th>
										<th>Employee</th>
										<th>Amount</th>
										<th style="width: 100px"></th>
									</tr>
								</thead>
								<tbody v-if="qclaims.length > 0">
									<tr v-for="(qclaim, keyQclaim) in qclaims" :key="keyQclaim">
										<td style="width: 100px; vertical-align: baseline">
											{{ qclaim.claims_effective_date }}
										</td>
										<td style="width: 200px; vertical-align: baseline">
											{{
												qclaim.employee.firstname +
												" " +
												qclaim.employee.middlename +
												" " +
												qclaim.employee.lastname
											}}
										</td>
										<td style="width: 200px; vertical-align: baseline">
											{{ qclaim.amount }}
										</td>
										<td style="width: 100px; vertical-align: baseline">
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="destroy(qclaim.id)"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"
													></use>
												</svg>
											</button>
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="updateModal(qclaim.id, qclaim.employee.id, qclaim.amount, qclaim.resgnation_effective_date, qclaim.claims_effective_date)"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
													></use>
												</svg>
											</button>
											<a
												:href="route('quitclaims.show', qclaim.id)"
												class="btn btn-sm btn-ghost-secondary text-dark"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-print"
													></use>
												</svg>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<CreateQuitClaimsModal :props="props" />
	</AuthenticatedLayout>
</template>