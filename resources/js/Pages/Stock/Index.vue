<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import CreateStockModal from "./CreateStockModal.vue";

defineProps({
  stocks: [],
  categories:[],
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const createEmployee = () => {
  alert("create client");
};
</script>

<template>
	<Head title="Stocks" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Stocks</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
			class="btn btn-dark btn-sm"
			@click="openClickedModal('createStockModal')"
			>
			Create Stocks
			</button>
		</div>
		<div class="card mb-4">
			<div class="card-header">Stocks List</div>
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
							<tbody v-if="stocks.length > 0">
								<tr v-for="(stock, keystock) in stocks" :key="keystock">
									<td>
										{{ stock.name }}
									</td>
									<td>
										{{ stock.unit }}
									</td>
									<td>
										{{ stock.stock_category.name }}
									</td>
									<td>
										<!-- <Link
											class="btn btn-sm btn-default ms-auto me-1"
											:href="route('client.show', stock.id)"
										>
											<svg class="icon">
												<use
													xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
												></use>
											</svg>
											view
										</Link> -->
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<CreateStockModal :categories="categories"></CreateStockModal>
	</AuthenticatedLayout>
</template>