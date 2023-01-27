<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateSettlementModal from "./CreateSettlementModal.vue";
import { ref, onMounted } from 'vue'

const props = defineProps({
  lawsuit: Object,
  settlements: Object,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm({
	lawsuit_id: props.lawsuit.id,
});
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('lawsuit.settlement.destroy', id));
  }
}

function htmlDecode(value) {
    return $("<textarea/>").html(value).text();
}

onMounted(() => {
  $('.settlementtbl').DataTable();
  $('.settlementtbl').attr('style', 'border-collapse: collapse !important');
})
</script>
<style scoped>
td {
	padding: 3px;
	vertical-align: middle;
}
</style>
<template>
	<Head title="Settlements" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item">
				<Link :href="route('lawsuit')">Lawsuit/Cases</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Settlements</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<a class="btn btn-default btn-sm me-2" :href="route('lawsuit')">
				Go Back
			</a>
			<button
				class="btn btn-dark btn-sm"
				@click="openClickedModal('createSettlementModal')"
			>
				Create Settlement
			</button>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">
					Settlement List For:
					<b>
						<u>{{ lawsuit.case }}</u>
					</b>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover settlementtbl">
								<thead>
									<tr>
										<th>Content</th>
										<th>Date</th>
										<th style="width: 100px"></th>
									</tr>
								</thead>
								<tbody v-if="settlements.length > 0">
									<tr
										v-for="(settlement, keySettlement) in settlements"
										:key="keySettlement"
									>
										<td
											style="vertical-align: baseline"
											v-html="htmlDecode(settlement.content)"
										></td>
										<td style="width: 200px; vertical-align: baseline">
											{{ settlement.date }}
										</td>
										<td style="width: 100px; vertical-align: baseline">
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="destroy(settlement.id)"
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
		<CreateSettlementModal :props="props" />
	</AuthenticatedLayout>
</template>