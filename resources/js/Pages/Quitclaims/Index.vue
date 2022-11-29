<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateQuitClaimsModal from "./CreateQuitclaimsModal.vue";

const props = defineProps({
  qclaims: Array,
  employees: Array,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('memo.destroy', id));
  }
}
</script>
<style scoped>
td {
	padding: 3px;
	vertical-align: middle;
}
</style>
<template>
	<Head title="Position" />

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
				@click="openClickedModal('createQuitClaimsModal')"
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
							<table class="table table-hover">
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
												@click="destroy(memo.id)"
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
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-print"
													></use>
												</svg>
											</button>
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