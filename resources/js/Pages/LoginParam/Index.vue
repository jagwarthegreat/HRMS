<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue'

const newprops = defineProps({
  aoa: Array,
});

const aoaForm = useForm({
  coordinates: newprops.aoa[0].coordinates,
  radius: newprops.aoa[0].radius,
});

const submitForm = () => {
    aoaForm.post(route("aoa.update", newprops.aoa[0].id), {
    preserveScroll: true,
    onSuccess: () => {
      alert("Changes saved.");
    },
  });
};
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
		<div class="col-md-12 text-end mb-2" v-if="canCreate">
			<Link class="btn btn-dark btn-sm" :href="route('user.create')">
				Create User
			</Link>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Area of Access</div>
				<div class="card-body">
					<form @submit.prevent="submitForm">
						<div class="row g-3">
							<div class="col-4">
								<label for="coordinates" class="form-label">Coordinates</label>
								<input
								  type="text"
								  class="form-control"
								  id="coordinates"
								  v-model="aoaForm.coordinates"
								/>
							</div>
							<div class="col-4">
								<label for="radius" class="form-label">Radius</label>
								<input
								  type="text"
								  class="form-control"
								  id="radius"
								  v-model="aoaForm.radius"
								/>
							</div>
							<div class="col-4">
								<label for="action" class="form-label">Action</label>
					            <button
					              type="submit"
					              class="form-control btn btn-primary"
					            >
					              Save Changes
					            </button>
							</div>
						</div>
					</form>
					<div class="row">
						<div class="col-md-12">
							<div id="map_canvas"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>