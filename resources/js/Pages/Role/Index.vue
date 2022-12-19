<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { unref, ref, onMounted } from 'vue'

const props = defineProps({
  roles: Array,
  canCreate: Boolean,
});

const createUser = () => {
  alert("create role");
};

onMounted(() => {
  $('.roletbl').DataTable();
  $('.roletbl').attr('style', 'border-collapse: collapse !important');
})
</script>

<style scoped>
.badge {
	font-weight: 400;
	line-height: normal;
}
</style>
<template>
	<Head title="Role" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Role</li>
		</template>

		<div class="col-md-12 text-end mb-2" v-if="canCreate">
			<Link
				class="btn btn-dark btn-sm"
				:href="route('role.create')"
				method="get"
				as="button"
			>
				Create Role
			</Link>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Role List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover roletbl">
								<thead>
									<tr>
										<th>ID</th>
										<th style="width: 20%">TITLE</th>
										<th>PERMISSIONS</th>
									</tr>
								</thead>
								<tbody v-if="roles.length > 0">
									<tr
										v-for="(role, keyRole) in roles"
										:key="keyRole"
										v-show="role.id != 1"
									>
										<td>{{ role.id }}</td>
										<td>{{ role.title }}</td>
										<td>
											<span
												v-for="(permission, keyPermission) in role.permissions"
												:key="keyPermission"
												class="badge bg-dark ms-1 pt-0"
											>
												{{ permission.title }}
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>