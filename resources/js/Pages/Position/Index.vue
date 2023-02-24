<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreatePositionModal from "./CreatePositionModal.vue";
import { ref, onMounted } from 'vue'

defineProps({
  positions: Array,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('position.destroy', id));
  }
}

onMounted(() => {
  $('.positiontbl').DataTable();
  $('.positiontbl').attr('style', 'border-collapse: collapse !important');
})

function addModal(modalId) {
	$("#createPositionModalTitle").html('Add Position');
	$("#title").val('');
	$("#position_id").val('');
	
	openClickedModal(modalId);
}

function updateModal(position_id, position_title) {
	$("#createPositionModalTitle").html('Edit Position');
	$("#title").val(position_title);
	$("#position_id").val(position_id);

	openClickedModal('createPositionModal');
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
			<li class="breadcrumb-item active" aria-current="page">Position</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
				class="btn btn-dark btn-sm"
				@click="addModal('createPositionModal')"
			>
				Create Position
			</button>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Position List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover positiontbl">
								<thead>
									<tr>
										<th>TITLE</th>
										<th style="width: 100px"></th>
									</tr>
								</thead>
								<tbody v-if="positions.length > 0">
									<tr
										v-for="(position, keyPosition) in positions"
										:key="keyPosition"
									>
										<td>{{ position.title }}</td>
										<td>
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="destroy(position.id)"
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
												@click="updateModal(position.id, position.title)"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
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
		<CreatePositionModal />
	</AuthenticatedLayout>
</template>