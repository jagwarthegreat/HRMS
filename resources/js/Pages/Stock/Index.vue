<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateStockModal from "./CreateStockModal.vue";
import { ref, onMounted } from 'vue'

const form = useForm();

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

onMounted(() => {
  $('.stockstbl').DataTable();
  $('.stockstbl').attr('style', 'border-collapse: collapse !important');
})

function addModal(modalId) {
	$("#createStockModalTitle").html('Add Stock');
	$("#stock_id").val('');
	$("#name").val('');
	$("#unit").val('');
	$("#category_id").val('');
	
	openClickedModal(modalId);
}

function updateModal(stock_id, stock_name, stock_unit, stock_category_id) {
	$("#createStockModalTitle").html('Edit Stock');
	$("#stock_id").val(stock_id);
	$("#name").val(stock_name);
	$("#unit").val(stock_unit);
	$("#category_id").val(stock_category_id);

	openClickedModal('createStockModal');
}
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
				@click="addModal('createStockModal')"
			>
				Create Stocks
			</button>
		</div>
		<div class="card mb-4">
			<div class="card-header">Stocks List</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">
						<table class="table table-hover stockstbl">
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
										<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="updateModal(stock.id, stock.name, stock.unit, stock.stock_category.id)"
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
		<CreateStockModal :categories="categories"></CreateStockModal>
	</AuthenticatedLayout>
</template>