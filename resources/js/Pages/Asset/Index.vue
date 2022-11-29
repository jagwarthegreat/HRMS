<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  assets: [],
});

const createEmployee = () => {
  alert("create client");
};
</script>

<template>
	<Head title="Assets" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Assets</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<Link
				class="btn btn-dark btn-sm"
				:href="route('client.create')"
				method="get"
				as="button"
			>
				Create Asset
			</Link>
		</div>
		<div class="card mb-4">
			<div class="card-header">Assets List</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Unit</th>
									<th>Category</th>
									<th></th>
								</tr>
							</thead>
							<tbody v-if="assets.length > 0">
								<tr v-for="(asset, keyAsset) in assets" :key="keyAsset">
									<td>
										{{ asset.name }}
									</td>
									<td>
										{{ asset.unit }}
									</td>
									<td>
										{{ asset_category.name }}
									</td>
									<td>
										<Link
											class="btn btn-sm btn-default ms-auto me-1"
											:href="route('client.show', asset.id)"
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