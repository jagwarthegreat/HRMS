<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue'

defineProps({
  employees: [],
});

onMounted(() => {
  $('.employeetbl').DataTable();
  $('.employeetbl').attr('style', 'border-collapse: collapse !important');
})
</script>

<template>
	<Head title="Employee" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Employee</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<Link
				class="btn btn-dark btn-sm"
				:href="route('employee.create')"
				method="get"
				as="button"
			>
				Create Employee
			</Link>
		</div>
		<div class="card mb-4">
			<div class="card-header">
				<strong>Employee</strong><span class="small ms-1">List</span>
			</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">
						<table class="table table-hover employeetbl" id="employeetbl">
							<thead>
								<tr>
									<th>Employee Name</th>
									<th>Designation</th>
									<th>Department</th>
									<th>Employment Type</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody v-if="employees.length > 0">
								<tr
									v-for="(employee, keyEmployee) in employees"
									:key="keyEmployee"
								>
									<td>
										{{
											employee.firstname +
											" " +
											employee.middlename +
											" " +
											employee.lastname
										}}
									</td>
									<td>
										{{
											employee.emp_curr_work == null
												? "--"
												: employee.emp_curr_work.positions.title
										}}
									</td>
									<td>
										{{
											employee.emp_curr_work == null
												? "---"
												: employee.emp_curr_work.departments.title
										}}
									</td>
									<td>
										{{
											employee.emp_curr_type == null
												? "---"
												: employee.emp_curr_type.employee_types.title
										}}
									</td>
									<td>
										{{
											employee.emp_curr_status == null
												? "---"
												: employee.emp_curr_status.employee_statuses.title
										}}
									</td>
									<td>
										<Link
											class="btn btn-sm btn-default ms-auto me-1"
											:href="route('employee.show', employee.id)"
											style="padding: 0px 5px 0px 5px"
										>
											<svg class="icon">
												<use
													xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
												></use>
											</svg>
											view
										</Link>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>