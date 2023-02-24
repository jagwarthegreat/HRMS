<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateStockCategoryModal from "./CreateStockCategoryModal.vue";
import { ref, onMounted } from 'vue'

const form = useForm();
defineProps({
  categories:[],
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const createEmployee = () => {
  alert("create client");
};

onMounted(() => {
  $('.stockcattbl').DataTable();
  $('.stockcattbl').attr('style', 'border-collapse: collapse !important');
})

function addModal(modalId) {
	$("#createStockCategoryModalTitle").html('Add Stock Category');
	$("#name").val('');
	$("#category_id").val('');
	
	openClickedModal(modalId);
}

function updateModal(category_id, category_name) {
	$("#createStockCategoryModalTitle").html('Edit Stock Category');
	$("#name").val(category_name);
	$("#category_id").val(category_id);

	openClickedModal('createStockCategoryModal');
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
				@click="addModal('createStockCategoryModal')"
			>
				Create Stocks
			</button>
		</div>
		<div class="card mb-4">
			<div class="card-header">Stocks List</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">
						<table class="table table-hover stockcattbl">
							<thead>
								<tr>
									<th>Name</th>
									<th></th>
								</tr>
							</thead>
							<tbody v-if="categories.length > 0">
								<tr v-for="(category, keystock) in categories" :key="keystock">
									<td>
										{{ category.name }}
									</td>
									<td>
										<button
											class="btn btn-sm btn-ghost-secondary text-dark"
											@click="updateModal(category.id, category.name)"
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
		<CreateStockCategoryModal
			:categories="categories"
		></CreateStockCategoryModal>
	</AuthenticatedLayout>
</template>