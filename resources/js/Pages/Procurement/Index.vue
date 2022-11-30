<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import CreateProcurementModal from "./CreateProcurementModal.vue";
import CreateProcurementDetailsModal from "./Details/CreateProcurementDetailsModal.vue";

defineProps({
  procurements:[],
  procurement_data:[],
  stocks:[],
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const createEmployee = () => {
  alert("create client");
};
</script>

<template>
	<Head title="Procurements" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Procurements</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
			class="btn btn-dark btn-sm"
			@click="openClickedModal('createProcurementModal')"
			>
			Create Procurements
			</button>
		</div>
		<div class="card mb-4">
			<div class="card-header">Procurements List</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Reference</th>
									<th>Date</th>
									<th>Invoice</th>
									<th>Supplier</th>
									<th>Remarks</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody v-if="procurements.length > 0">
								<tr v-for="(procurement, keyProcurements) in procurements" :key="keyProcurements">
									<td>
										{{ keyProcurements + 1 }}
									</td>
									<td>
										{{ procurement.reference }}
									</td>
									<td>
										{{ procurement.date }}
									</td>
									<td>
										{{ procurement.invoice }}
									</td>
									<td>
										{{ procurement.supplier }}
									</td>
									<td>
										{{ procurement.remarks }}
									</td>
									<td>
										{{ procurement.status == 1 ? "Finished":"Saved" }}
									</td>
									<td>
										<button
										class="btn btn-default btn-sm"
										@click="openClickedModal('createProcurementDetailsModal')"
										>
											<svg class="icon">
												<use
													xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
												></use>
											</svg>
											View
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<CreateProcurementDetailsModal :procurement="procurement_data" :stocks="stocks"></CreateProcurementDetailsModal>
	<CreateProcurementModal></CreateProcurementModal>
	</AuthenticatedLayout>
</template>