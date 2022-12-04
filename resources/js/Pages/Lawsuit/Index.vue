<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateLawsuitModal from "./CreateLawsuitModal.vue";

const props = defineProps({
  lawsuits: Array,
  employees: Array,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('lawsuit.destroy', id));
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
	<Head title="Lawsuit/Cases" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Lawsuit/Cases</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
				class="btn btn-dark btn-sm"
				@click="openClickedModal('createLawsuitModal')"
			>
				Create New Lawsuit
			</button>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Lawsuit List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Date</th>
										<th>Case</th>
										<th>Complianant</th>
										<th>Respondent</th>
										<th>Status</th>
										<th style="width: 100px"></th>
									</tr>
								</thead>
								<tbody v-if="lawsuits.length > 0">
									<tr
										v-for="(lawsuit, keyLawsuit) in lawsuits"
										:key="keyLawsuit"
									>
										<td style="width: 100px; vertical-align: baseline">
											{{ lawsuit.case_date }}
										</td>
										<td style="vertical-align: baseline">
											<a :href="route('lawsuit.settlement', lawsuit.id)">
												{{ lawsuit.case }}
											</a>
										</td>
										<td style="vertical-align: baseline">
											{{ lawsuit.complainant }}
										</td>
										<td style="vertical-align: baseline">
											{{ lawsuit.respondent }}
										</td>
										<td style="vertical-align: baseline">
											{{ lawsuit.status }}
										</td>
										<td style="width: 100px; vertical-align: baseline">
											<!-- <button
												class="btn btn-sm btn-ghost-secondary text-dark"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
													></use>
												</svg>
											</button> -->
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="destroy(lawsuit.id)"
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
		<CreateLawsuitModal :props="props" />
	</AuthenticatedLayout>
</template>