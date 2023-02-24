<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue'
import updateUserModal from "./Update.vue";

const form = useForm();
const props = defineProps({
  users: Array,
  canCreate: Boolean,
  roles: Array,
  employees: Array
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

onMounted(() => {
  $('.usertbl').DataTable();
  $('.usertbl').attr('style', 'border-collapse: collapse !important');
})

function updateModal(user_id, employee_id, user_username, user_limited_access_status, roles) {
	$("#user_id").val(user_id);
  $("#employees_select2").val(employee_id);
  var multiselect = coreui.MultiSelect.getInstance(document.querySelector("#employees_select2"));
  document.querySelector(`#employees_select2 option[value='${employee_id}']`).setAttribute("selected", "selected")
	multiselect.update();

  $("#username").val(user_username);

  if(user_limited_access_status == 1){
    $("#limited_access").prop("checked", true);
  }else{
    $("#limited_access").prop("checked", false);
  }

	var oldValues = [];
	for (var i = roles.length - 1; i >= 0; i--) {
		oldValues[i] = roles[i].id;
		// var test = roles[i].id;
		// document.querySelector(`#roles_select2 option[value='${test}']`).setAttribute("selected", "selected");
	}

	// $("#roles_select2").val(oldValues);
	var multiselect2 = coreui.MultiSelect.getInstance(document.querySelector("#roles_select2"));
	// const selector = oldValues.map(value => `option[value='${value}']`).join(',');
	// console.log(selector);
	// document.querySelectorAll(`#roles_select2 ${selector}`).forEach(option => {
	//   option.setAttribute('selected', 'selected');
	// });
	document.querySelector(`#roles_select2 option[value='2']`).setAttribute("selected", "selected");
	document.querySelector(`#roles_select2 option[value='3']`).setAttribute("selected", "selected");
	multiselect2.update();

  

	openClickedModal('updateUserModal');
}
</script>

<style scoped>
.badge {
	font-weight: 500;
	line-height: normal;
	padding-top: 2px !important;
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
										<th></th>
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
												class="badge bg-dark ms-1"
											>
												{{ role.title }}
											</span>
										</td>
										<td>
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="updateModal(user.id, user.employee_id, user.username, user.limited_access_status, user.roles)"
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
		<updateUserModal
			:props="props"
		></updateUserModal>
	</AuthenticatedLayout>
</template>