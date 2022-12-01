<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import CreateStockTransferModal from "./CreateStockTransferModal.vue";

defineProps({
  stock_transfers: [],
  locations:[],
});

const openStockTransferModal = () => {
	$("#createStockTransferModal").modal('show');
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
			@click="openStockTransferModal"
			>
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
										{{ stock_transfer.status }}
									</td>
									<td>
										<Link
											class="btn btn-sm btn-default ms-auto me-1"
											:href="route('stock.transfer.show', stock_transfer.id)"
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
	<CreateStockTransferModal :locations="locations"></CreateStockTransferModal>
	</AuthenticatedLayout>
</template>