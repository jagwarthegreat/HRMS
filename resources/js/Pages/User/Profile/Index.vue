<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";


const dprops = defineProps({
  user: Array,
  canCreate: Boolean
});

const userform = useForm({
  username: dprops.user.username,
  password: dprops.user.password,
  user_avatar: ""
});

const updateUserInfo = () => {
  userform.post(route("user.profile.update", dprops.user.id), {
    preserveScroll: true,
    onSuccess: () => {
      alert("Changes saved.");
      // $("#updateEmployeeModal").modal("hide");
    },
  });
};

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#user_avatar_img')
                .attr('src', e.target.result);
                // .width(150)
                // .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

const avatar = (dprops.user.avatar_slug === null || dprops.user.avatar_slug === "")?"/theme/assets/img/avatars/default_avatar.jpeg":'/storage/' + dprops.user.avatar_slug;
</script>

<style scoped>
.avatar {
	width: 100%;
	height: 240px;
}

.avatar-img {
	width: 100%;
	height: 100%;
	border-radius: 0;
	border: 1px solid #aaa;
}

.accordion-button {
	font-weight: 600;
	color: #272829;
	background-color: rgb(255 255 255 / 87%);
}

.accordion-item {
	border-top: 1px solid #ddd;
}

.accordion {
	--cui-accordion-active-color: #768192;
}

.accordion-body {
	overflow-y: auto;
}

a.btn.btn-sm.btn-default.ms-auto.me-1 {
	border: 1px solid #ddd !important;
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
			<li class="breadcrumb-item active" aria-current="page">Profile</li>
		</template>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">My Profile</div>
				<div class="card-body">
					<form @submit.prevent="updateUserInfo">
						<div class="row">
							<div class="col-3 text-center d-flex flex-column">
								<div class="avatar">
									<img
										class="avatar-img"
										id="user_avatar_img"
										:src="avatar"
										style="object-fit: cover"
									/>
								</div>
								<input
									type="file"
									id="user_avatar"
									@input="
										userform.user_avatar =
											$event.target.files[0]
									"
									style="display: none"
									accept="image/*"
									@change="readURL($event.target)"
								/>
								<label
									class="btn btn-sm btn-dark mt-2"
									for="user_avatar"
								>
									Change Avatar
								</label>
							</div>
							<div class="col-9">
								<div
									class="accordion mb-3"
									id="updateEmployeeDetailAccordion"
								>
									<!-- personal detial -->
									<div class="accordion-item mb-3">
										<h2
											class="accordion-header"
											id="panelsStayOpen-headingUpdateEmp"
										>
											<button
												class="accordion-button p-2"
												type="button"
												data-coreui-toggle="collapse"
												data-coreui-target="#panelsStayOpen-collapseUpdateEmp"
												aria-expanded="true"
												aria-controls="panelsStayOpen-collapseUpdateEmp"
											>
												Security
											</button>
										</h2>
										<div
											id="panelsStayOpen-collapseUpdateEmp"
											class="accordion-collapse collapse show"
											aria-labelledby="panelsStayOpen-headingUpdateEmp"
										>
											<div class="accordion-body">
												<div class="row g-3">
													<div class="col-md-4">
														<label
															for="password"
															class="form-label"
														>
															Password<span
																class="text-danger"
																>*</span
															>
														</label>
														<input
															type="password"
															class="form-control"
															id="password"
															v-model="
																userform.password
															"
														/>
														<div
															class="invalid-feedback"
															v-show="
																userform.errors
																	.password
															"
															style="
																display: block;
															"
														>
															{{
																userform.errors
																	.password
															}}
														</div>
													</div>
													<div class="col-md-4">
														<label
															for="username"
															class="form-label"
															>Username<span
																class="text-danger"
																>*</span
															></label
														>
														<input
															type="text"
															class="form-control"
															id="username"
															v-model="
																userform.username
															"
														/>
														<div
															class="invalid-feedback"
															v-show="
																userform.errors
																	.username
															"
															style="
																display: block;
															"
														>
															{{
																userform.errors
																	.username
															}}
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /personal detial -->
								</div>
								<div clas="col-12">
									<button
										type="submit"
										class="btn btn-sm btn-primary"
										:class="{
											'opacity-25': userform.processing,
										}"
										:disabled="userform.processing"
									>
										Save Changes
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>