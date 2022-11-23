<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({
  roles: Array,
  employees: Array
});

const userform = useForm({
    employee: "",
    roles: "",
    username: "",
    password: "",
});

const userStore = () => {
    userform.post(route("user.store"), {
        onFinish: () => {
            userform.reset("employee");
            userform.reset("roles");
            userform.reset("username");
            userform.reset("password");
        },
    });
};

onMounted(() => {
  $("#employees_select2").select2();
  $("#roles_select2").select2();

  $("#roles_select2").change(
      function () {
        userform.roles = $("#roles_select2").val();
      }.bind(this)
  );

  $("#employees_select2").change(
      function () {
        userform.employee = $("#employees_select2").val();
      }.bind(this)
  );
});
</script>

<template>
	<Head title="Create User" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item"><Link :href="route('user')">User</Link></li>
			<li class="breadcrumb-item active" aria-current="page">Create</li>
		</template>

		<div class="col-md-12 text-start mb-2">
			<Link class="btn btn-dark btn-sm" :href="route('user')"> Go back </Link>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">User Detail</div>
				<div class="card-body">
					<form @submit.prevent="userStore">
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<label for="employees" class="form-label">Employee</label>
									<select
										class="form-control"
										data-coreui-search="true"
										v-if="employees.length > 0"
										id="employees_select2"
										v-model="userform.employee"
										style="width: 100%"
									>
										<option
											v-for="(employee, keyEmployee) in employees"
											:key="keyEmployee"
											:value="employee.id"
										>
											{{
												employee.firstname +
												" " +
												employee.middlename +
												" " +
												employee.lastname +
												" (" +
												employee.gender +
												")"
											}}
										</option>
									</select>
									<div class="row" v-else>
										<small class="text-danger ms-1">No Employee found.</small>
									</div>
								</div>
								<div class="mb-3">
									<label for="roletitle" class="form-label">Username</label>
									<input
										type="text"
										class="form-control"
										id="username"
										v-model="userform.username"
									/>
								</div>
								<div class="mb-3">
									<label for="roletitle" class="form-label">Password</label>
									<input
										type="password"
										class="form-control"
										id="password"
										v-model="userform.password"
									/>
								</div>
								<div class="mb-3">
									<label for="roles" class="form-label">Roles</label>
									<select
										class="form-control"
										multiple
										data-coreui-search="true"
										v-if="roles.length > 0"
										id="roles_select2"
										v-model="userform.roles"
										style="width: 100%"
									>
										<option
											v-for="(role, keyRole) in roles"
											:key="keyRole"
											:value="role.id"
										>
											{{ role.title }}
										</option>
									</select>
									<div class="row" v-else>
										<small class="text-danger ms-1">No Roles found.</small>
									</div>
								</div>
							</div>
							<div class="col-12 text-base">
								<button class="btn btn-dark px-4" type="submit">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>