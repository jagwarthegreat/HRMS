<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  user: Array,
  employee_count: parseInt,
  client_count: parseInt,
  active_cases: parseInt,
});
</script>

<template>
	<Head title="Dashboard" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
		</template>

		<div class="col-12 mt-3">
			<div class="row">
				<div class="col-md-12 mb-3">
					<div class="card overflow-hidden">
						<div class="card-body p-5 d-flex align-items-center">
							<h1 style="font-weight: 400">Welcome back, {{ user.name }}</h1>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4 mb-3">
							<div class="card overflow-hidden">
								<div class="card-body p-0 d-flex align-items-center">
									<div class="bg-info text-white p-4 me-3">
										<svg class="icon icon-xl">
											<use
												xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-people"
											></use>
										</svg>
									</div>
									<div>
										<div class="fs-6 fw-semibold text-info">
											{{ employee_count }}
										</div>
										<div
											class="text-medium-emphasis text-uppercase fw-semibold small"
										>
											EMPLOYEES
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<div class="card overflow-hidden">
								<div class="card-body p-0 d-flex align-items-center">
									<div class="bg-info text-white p-4 me-3">
										<svg class="icon icon-xl">
											<use
												xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"
											></use>
										</svg>
									</div>
									<div>
										<div class="fs-6 fw-semibold text-info">
											{{ client_count }}
										</div>
										<div
											class="text-medium-emphasis text-uppercase fw-semibold small"
										>
											CLIENTS
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<div class="card overflow-hidden">
								<div class="card-body p-0 d-flex align-items-center">
									<div class="bg-info text-white p-4 me-3">
										<svg class="icon icon-xl">
											<use
												xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-briefcase"
											></use>
										</svg>
									</div>
									<div>
										<div class="fs-6 fw-semibold text-info">
											{{ active_cases }}
										</div>
										<div
											class="text-medium-emphasis text-uppercase fw-semibold small"
										>
											ACTIVE CASES
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
