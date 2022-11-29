<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({
	asset_categories:Array,
});

const assetForm = useForm({
  name: "",
  unit: "",
  asset_category_id: "",
});

const submit = () => {
  assetForm.post(route("asset.store"), {
    onSuccess: () => {
      assetForm.reset(["name", "unit", "asset_category_id"]);
    },
  });
};
</script>

<style scoped>
.avatar {
	width: 100%;
	height: 100%;
}

.avatar-img {
	width: 100%;
	height: 100%;
	border-radius: 50em;
}

.accordion-button {
	font-weight: 600;
	color: #272829;
	background-color: rgb(255 255 255 / 87%);
}

.accordion-item {
	border-top: 1px solid #ddd;
}

.accordion {
	--cui-accordion-active-color: #768192;
}

.accordion-body {
	overflow-y: auto;
}

a.btn.btn-sm.btn-default.ms-auto.me-1 {
	border: 1px solid #ddd !important;
}

.basicInfoLabel {
	width: 200px;
	vertical-align: baseline;
	display: flex;
	justify-content: space-between;
	color: #768192;
}

.basicInfoData {
	padding-left: 10px;
	font-weight: 500;
}

th,
td {
	padding: 7px;
}
</style>

<template>
	<Head title="Create Asset" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item">
				<Link :href="route('asset')">Asset</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Create</li>
		</template>

		<div class="container">
			<div class="col-md-12 text-start mb-2">
				<Link class="btn btn-dark btn-sm" :href="route('asset')">
					Go back
				</Link>
			</div>

			<div class="col-md-12 mb-4">
				<div class="row">
					<div class="col-md-12">
						<form @submit.prevent="submit">
							<div
								class="accordion mb-3"
								id="employeeDetailAccordion"
							>
								<!-- personal detial -->
								<div class="accordion-item mb-3">
									<h2
										class="accordion-header"
										id="panelsStayOpen-headingOne"
									>
										<button
											class="accordion-button p-2"
											type="button"
											data-coreui-toggle="collapse"
											data-coreui-target="#panelsStayOpen-collapseOne"
											aria-expanded="true"
											aria-controls="panelsStayOpen-collapseOne"
										>
											Asset Detail
										</button>
									</h2>
									<div
										id="panelsStayOpen-collapseOne"
										class="accordion-collapse collapse show"
										aria-labelledby="panelsStayOpen-headingOne"
									>
										<div class="accordion-body">
											<div class="row g-3">
												<div class="col-md-4">
													<label
														for="name"
														class="form-label"
													>
														Name<span
															class="text-danger"
															>*</span
														>
													</label>
													<input
														type="text"
														class="form-control"
														id="name"
														v-model="
															assetForm.name
														"
													/>
													<div
														class="invalid-feedback"
														v-show="
															assetForm.errors
																.name
														"
														style="display: block"
													>
														{{
															assetForm.errors
																.name
														}}
													</div>
												</div>
												<div class="col-md-4">
													<label
														for="unit"
														class="form-label"
													>
														Unit<span
															class="text-danger"
															>*</span
														>
													</label>
													<input
														type="text"
														class="form-control"
														id="unit"
														v-model="
															assetForm.unit
														"
													/>
													<div
														class="invalid-feedback"
														v-show="
															assetForm.errors
																.unit
														"
														style="display: block"
													>
														{{
															assetForm.errors
																.unit
														}}
													</div>
												</div>
                        <div class="col-md-4">
                            <label
                                for="asset_category_id"
                                class="form-label"
                                >Employee Status</label
                            >
                            <select
                                class="form-select"
                                id="asset_category_id"
                                v-model="
                                    assetForm.asset_category_id
                                "
                            >
                                <option
                                    v-for="(
                                        asset_category,
                                        keyStatus
                                    ) in asset_categories"
                                    :key="keyStatus"
                                    :value="asset_category.id"
                                >
                                    {{ asset_category.name }}
                                </option>
                            </select>
                            <div
                                class="invalid-feedback"
                                v-show="
                                    assetForm.errors
                                        .asset_category_id
                                "
                                style="display: block"
                            >
                                {{
                                    assetForm.errors
                                        .asset_category_id
                                }}
                            </div>
                        </div>
											</div>
										</div>
									</div>
								</div>
								<!-- /personal detial -->
							</div>

							<div class="col-12">
								<button
									type="submit"
									class="btn btn-sm btn-primary"
									:class="{
										'opacity-25': assetForm.processing,
									}"
									:disabled="assetForm.processing"
								>
									Create asset
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>