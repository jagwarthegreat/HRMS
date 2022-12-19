<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateDepartmentModal from "./CreateDepartmentModal.vue";
import { ref, onMounted } from 'vue'

defineProps({
  departments: Array,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('department.destroy', id));
  }
}

onMounted(() => {
  $('.departmenttbl').DataTable();
  $('.departmenttbl').attr('style', 'border-collapse: collapse !important');
})
</script>
<style scoped>
td {
	padding: 3px;
	vertical-align: middle;
}
</style>
<template>
	<Head title="Department" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Department</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
				class="btn btn-dark btn-sm"
				@click="openClickedModal('createDepartmentModal')"
			>
				Create Department
			</button>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Department List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover departmenttbl">
								<thead>
									<tr>
										<th>TITLE</th>
										<th style="width: 100px"></th>
									</tr>
								</thead>
								<tbody v-if="departments.length > 0">
									<tr
										v-for="(department, keyDepartment) in departments"
										:key="keyDepartment"
									>
										<td>{{ department.title }}</td>
										<td>
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="destroy(department.id)"
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
		<CreateDepartmentModal />
	</AuthenticatedLayout>
</template>