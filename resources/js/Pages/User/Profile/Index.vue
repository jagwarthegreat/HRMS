<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";


const dprops = defineProps({
  user: Object,
  canCreate: Boolean
});

const userform = useForm({
  username: dprops.user.username,
  password: dprops.user.password,
  name: dprops.user.name,
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
  width: 150px;
  height: 150px;
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
				
				<form @submit.prevent="updateUserInfo">
					<div class="card-body">
							<div class="row">
								<div class="col-12 mb-3">
									<h6>Account</h6>
									<hr>
								</div>
								<div class="col-12 mb-3">
									<h6>Photo</h6>
									<div class="avatar">
										<img
											class="avatar-img"
											id="user_avatar_img"
											:src="avatar"
											style="object-fit: cover"
										/>
									</div>
									<br>
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
										class="btn btn-sm btn-dark mt-2 px-3"
										for="user_avatar"
									>
										Upload photo
									</label>
									<hr>
								</div>
								<div class="col-12 mb-3">
									<h6>Personal info</h6>
									<div class="col-12">
										<label
											for="password"
											class="form-label"
										>
											Name
										</label>
											<input
												type="text"
												class="form-control"
												v-model="userform.name"
												disabled
											/>
									</div>
									<div class="col-12 mt-3">
										<label
											for="password"
											class="form-label"
										>
											Preferred username
										</label>
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
									<hr>
								</div>
								<div class="col-12 mb-3">
									<h6>Password</h6>
									<small class="text-secondary">Leave blank if you don't want to update your password.</small>
									<input
										type="password"
										class="form-control"
										id="password"
										v-model="userform.password"
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
							</div>
					</div>
					<div class="card-footer">
				    <div clas="col-12">
							<button
								type="submit"
								class="btn btn-sm btn-primary"
								:class="{
									'opacity-25': userform.processing,
								}"
								:disabled="userform.processing"
							>
								Update changes
							</button>
						</div>
				  </div>
				</form>
			</div>
		</div>
	</AuthenticatedLayout>
</template>