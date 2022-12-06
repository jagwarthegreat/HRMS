<script setup>
import AuthenticatedLayout from "../../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";
import GeneralInfoTab from "./Tabs/GeneralInfoTab.vue";
import DocumentsTab from "./Tabs/DocumentsTab.vue";
import LocationsTab from "./Tabs/LocationsTab.vue";
import SuppliesTab from "./Tabs/SuppliesTab.vue";

const props = defineProps({
  client: Array,
  locations: Array,
  docCategories: Array,
});

const clientform = useForm({
  tab: "",
});

function tabSwitchTo(tabName) {
  axios.post(route("client.tabSwitchTo", tabName)).catch((error) => {
    console.log(error);
  });
}

const activeTab = sessionClientActiveTab;
</script>

<style scoped>
.avatar {
	width: 150px;
	height: 100%;
}

.avatar-img {
	width: 100%;
	height: 100%;
	border-radius: 0;
	border: 1px solid #aaa;
}

a.nav-link {
	color: #505050;
}
</style>

<template>
	<Head title="Client Profile" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item">
				<Link :href="route('client')">Client</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Profile</li>
		</template>

		<div class="col-md-12 text-start mb-2">
			<Link class="btn btn-dark btn-sm" :href="route('client')"> Go back </Link>
		</div>

		<div class="col-md-12 mb-4">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-md-9">
							<div
								class="card mb-2"
								style="background: transparent; box-shadow: none"
							>
								<div class="card-body d-flex" style="overflow-y: auto">
									<div class="d-flex flex-column justify-content-center ms-4">
										<h4>
											<b>{{ client.name }}</b>
										</h4>
										<a href="#">{{ client.email }}</a>
										<span>
											<svg class="icon">
												<use
													xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-screen-smartphone"
												></use>
											</svg>
											{{ client.contact }}
										</span>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="col-md-3">
							<div class="card mb-4">
								<div class="card-header">Actions</div>
								<div class="card-body">
									<a
										class="btn btn-sm btn-primary ms-auto me-1 text-light"
										href=""
									>
										<svg class="icon">
											<use
												xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
											></use>
										</svg>
										Edit
									</a>
								</div>
							</div>
						</div> -->
					</div>
				</div>

				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs">
								<li class="nav-item">
									<Link
										@click="tabSwitchTo('generalInfo')"
										:class="
											activeTab == 'generalInfo'
												? 'nav-link active'
												: 'nav-link'
										"
										id="nav-home-tab"
										data-coreui-toggle="tab"
										data-coreui-target="#nav-home"
										type="button"
										role="tab"
										aria-controls="nav-home"
										aria-selected="true"
										>General Info
									</Link>
								</li>
								<li class="nav-item">
									<Link
										@click="tabSwitchTo('documents')"
										:class="
											activeTab == 'documents' ? 'nav-link active' : 'nav-link'
										"
										id="nav-document-tab"
										data-coreui-toggle="tab"
										data-coreui-target="#nav-document"
										type="button"
										role="tab"
										aria-controls="nav-document"
										aria-selected="true"
										>Documents
									</Link>
								</li>
								<li class="nav-item">
									<Link
										@click="tabSwitchTo('locations')"
										:class="
											activeTab == 'locations' ? 'nav-link active' : 'nav-link'
										"
										id="nav-locations-tab"
										data-coreui-toggle="tab"
										data-coreui-target="#nav-locations"
										type="button"
										role="tab"
										aria-controls="nav-locations"
										aria-selected="true"
										>Locations
									</Link>
								</li>
								<!-- <li class="nav-item">
									<Link
										@click="tabSwitchTo('supplies')"
										:class="
											activeTab == 'supplies'
												? 'nav-link active'
												: 'nav-link'
										"
										id="nav-supplies-tab"
										data-coreui-toggle="tab"
										data-coreui-target="#nav-supplies"
										type="button"
										role="tab"
										aria-controls="nav-supplies"
										aria-selected="true"
										>Supplies
									</Link>
								</li> -->
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="nav-tabContent">
								<div
									class="tab-pane fade show"
									:class="activeTab == 'generalInfo' ? 'active' : ''"
									id="nav-home"
									role="tabpanel"
									aria-labelledby="nav-home-tab"
									tabindex="0"
								>
									<GeneralInfoTab :client="client" />
								</div>
								<div
									class="tab-pane fade show"
									:class="activeTab == 'documents' ? 'active' : ''"
									id="nav-document"
									role="tabpanel"
									aria-labelledby="nav-document-tab"
									tabindex="0"
								>
									<DocumentsTab :props="props" />
								</div>
								<div
									class="tab-pane fade show"
									:class="activeTab == 'locations' ? 'active' : ''"
									id="nav-locations"
									role="tabpanel"
									aria-labelledby="nav-locations-tab"
									tabindex="0"
								>
									<LocationsTab :props="props" />
								</div>
								<!-- <div
									class="tab-pane fade show"
									:class="
										activeTab == 'supplies' ? 'active' : ''
									"
									id="nav-supplies"
									role="tabpanel"
									aria-labelledby="nav-supplies-tab"
									tabindex="0"
								>
									<SuppliesTab :props="props" />
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>