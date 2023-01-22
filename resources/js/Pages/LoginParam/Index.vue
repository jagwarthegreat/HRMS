<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue'

defineProps({
  canCreate: Boolean
});

const createUser = () => {
  alert("create user");
};

onMounted(() => {
  // $('.usertbl').DataTable();
  // $('.usertbl').attr('style', 'border-collapse: collapse !important');
})
</script>

<style scoped>
.badge {
	font-weight: 400;
	line-height: normal;
}
</style>
<template>
	<Head title="Login Parameter" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				Login Parameter
			</li>
		</template>
		<!-- {Auth::user()->can('user_management_access')} -->
		<!-- <div class="col-md-12 text-end mb-2" v-if="canCreate">
			<Link class="btn btn-dark btn-sm" :href="route('user.create')">
				Create User
			</Link>
		</div> -->

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Login Parameter</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div id="mapholder">
								<iframe
									width="100%"
									height="450"
									frameborder="0"
									style="border: 0"
									src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC232qKEVqI5x0scuj9UGEVUNdB98PiMX0&q=10.648516,122.965087&zoom=16"
									allowfullscreen
								></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>