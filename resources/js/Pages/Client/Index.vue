<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue';
import UpdateClientModal from "./modals/UpdateClientModal.vue";

const props = defineProps({
  clients: Array,
});

onMounted(() => {
  $('.clienttbl').DataTable();
  $('.clienttbl').attr('style', 'border-collapse: collapse !important');
})

function openEditModal(id, name, address, contact, email) {
	// console.log(id+"::"+name+"::"+address+"::"+contact+"::"+email);
	$("#clientid").val(id);
	$("#name").val(name);
	$("#contact").val(contact);
	$("#email").val(email);
	$("#address").val(address);

  $("#updateClientModal").modal("show");
}
</script>

<template>
	<Head title="Clients" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Client</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<Link
				class="btn btn-dark btn-sm"
				:href="route('client.create')"
				method="get"
				as="button"
			>
				Create Client
			</Link>
		</div>
		<div class="card mb-4">
			<div class="card-header">Client List</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">
						<table class="table table-hover clienttbl">
							<thead>
								<tr>
									<th>Name</th>
									<th>Address</th>
									<th>Contact</th>
									<th>Email</th>
									<th></th>
								</tr>
							</thead>
							<tbody v-if="clients.length > 0">
								<tr v-for="(client, keyClient) in clients" :key="keyClient">
									<td>
										{{ client.name }}
									</td>
									<td>
										{{ client.address }}
									</td>
									<td>
										{{ client.contact }}
									</td>
									<td>
										{{ client.email }}
									</td>
									<td style="width: 100px; vertical-align: baseline">

										<Link
											class="btn btn-sm btn-ghost-secondary text-dark"
											:href="route('client.show', client.id)"
										>
											<svg class="icon">
												<use
													xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-file"
												></use>
											</svg>
										</Link>

										<button
											class="btn btn-sm btn-ghost-secondary text-dark"
											@click="openEditModal(client.id, client.name, client.address, client.contact, client.email)"
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
			<UpdateClientModal />
		</div>
	</AuthenticatedLayout>
</template>