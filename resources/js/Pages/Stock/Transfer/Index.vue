<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateStockTransferModal from "./CreateStockTransferModal.vue";

defineProps({
  stock_transfers: [],
  locations:[],
});

const openStockTransferModal = () => {
	$("#createStockTransferModal").modal('show');
}

const form = useForm();
const destroy = (id) => {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('stock.transfer.destroy', id));
  }
};

</script>

<template>
	<Head title="Stock Transfer" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Stock Transfer</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
			class="btn btn-dark btn-sm"
			@click="openStockTransferModal"
			>
			<svg class="icon">
			  <use
			    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"
			  ></use>
			</svg>
			Create Stock Transfer
			</button>
		</div>
		<div class="card mb-4">
			<div class="card-header">Stocks Transfers</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Reference</th>
									<th>Date</th>
									<th>From</th>
									<th>To</th>
									<th>Remarks</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody v-if="stock_transfers.length > 0">
								<tr v-for="(stock_transfer, keyStockTransfer) in stock_transfers" :key="keyStockTransfer">
									<td>
										{{ keyStockTransfer + 1 }}
									</td>
									<td>
										{{ stock_transfer.reference }}
									</td>
									<td>
										{{ stock_transfer.date }}
									</td>
									<td>
										{{ stock_transfer.location_from.title }}
									</td>
									<td>
										{{ stock_transfer.location_to.title }}
									</td>
									<td>
										{{ stock_transfer.remarks }}
									</td>
									<td>
                      <span v-show="stock_transfer.status" class="badge text-bg-success">Finished</span>
                      <span v-show="!stock_transfer.status" class="badge text-bg-warning">Saved</span>
									</td>
									<td>
										<Link
											class="btn btn-sm btn-ghost-success ms-auto me-1"
											:href="route('stock.transfer.show', stock_transfer.id)"
										>
											<svg class="icon">
												<use
													xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
												></use>
											</svg>
										</Link>
											<button
												v-show="!stock_transfer.status" 
                        class="btn btn-sm btn-ghost-danger ms-auto me-1"
                        @click="destroy(stock_transfer.id)"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                      >
                        <svg class="icon">
                          <use
                            xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"
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
	<CreateStockTransferModal :locations="locations"></CreateStockTransferModal>
	</AuthenticatedLayout>
</template>