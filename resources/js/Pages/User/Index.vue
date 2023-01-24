<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue'

defineProps({
  users: Array,
  canCreate: Boolean
});

const createUser = () => {
  alert("create user");
};

onMounted(() => {
  $('.usertbl').DataTable();
  $('.usertbl').attr('style', 'border-collapse: collapse !important');
})
</script>

<style scoped>
.badge {
	font-weight: 400;
	line-height: normal;
}
</style>
<template>
	<Head title="User" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">User</li>
		</template>
		<!-- {Auth::user()->can('user_management_access')} -->
		<div class="col-md-12 text-end mb-2" v-if="canCreate">
			<Link class="btn btn-dark btn-sm" :href="route('user.create')">
				Create User
			</Link>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">User List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover usertbl">
								<thead>
									<tr>
										<th>Fullname</th>
										<th>Username</th>
										<th>Area of Access</th>
										<th>Role</th>
									</tr>
								</thead>
								<tbody v-if="users.length > 0">
									<tr v-for="(user, keyUser) in users" :key="keyUser">
										<td>{{ user.name }}</td>
										<td>{{ user.username }}</td>
										<td v-if="user.limited_access_status == 1">Limited</td>
										<td v-else>Anywhere</td>
										<td>
											<span
												v-for="(role, keyRole) in user.roles"
												:key="keyRole"
												class="badge bg-dark ms-1 pt-0"
											>
												{{ role.title }}
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