<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateDeployementModal from "./CreateDeployementModal.vue";
import { ref, onMounted } from 'vue'

const props = defineProps({
  departments: Object,
  positions: Object,
  locations: Object,
  employees: Object,
  deployments: Object,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('deployment.destroy', id));
  }
}

onMounted(() => {
  $('.deploymenttbl').DataTable();
  $('.deploymenttbl').attr('style', 'border-collapse: collapse !important');
})
</script>
<style scoped>
td {
	padding: 3px;
	vertical-align: middle;
}
</style>
<template>
	<Head title="Deployment" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Deployment</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
				class="btn btn-dark btn-sm"
				@click="openClickedModal('createDeployementModal')"
			>
				Create Deployment
			</button>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Deployment List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover deploymenttbl">
								<thead>
									<tr>
										<th>Date</th>
										<th>Employee</th>
										<th>Location</th>
										<th style="width: 100px"></th>
									</tr>
								</thead>
								<tbody>
									<tr
										v-for="(deployment, keyDeployment) in deployments"
										:key="keyDeployment"
									>
										<td style="width: 100px; vertical-align: baseline">
											{{ deployment.trans_date }}
										</td>
										<td style="width: 200px; vertical-align: baseline">
											{{
												deployment.employee.firstname +
												" " +
												deployment.employee.lastname
											}}
										</td>
										<td style="width: 200px; vertical-align: baseline">
											{{ deployment.locations.title }}
										</td>
										<td style="width: 100px; vertical-align: baseline">
											<button
												v-show="deployment.status == 1"
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="destroy(deployment.id)"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"
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
		<CreateDeployementModal :props="props" />
	</AuthenticatedLayout>
</template>