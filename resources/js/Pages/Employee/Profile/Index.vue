<script setup>
import AuthenticatedLayout from "../../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";
import GeneralInfoTab from "./Tabs/GeneralInfoTab.vue";
import JobTab from "./Tabs/JobTab.vue";
import LeaveTab from "./Tabs/LeaveTab.vue";
import PerformanceTab from "./Tabs/PerformanceTab.vue";
import DocumentsTab from "./Tabs/DocumentsTab.vue";
import RequirementsTab from "./Tabs/RequirementsTab.vue";
import MemosTab from "./Tabs/MemosTab.vue";
import UpdateEmployeeModal from "./modals/UpdateEmployeeModal.vue";

const props = defineProps({
  employee: Array,
  employeeTypes: Array,
  employee_status: Array,
  departments: Array,
  positions: Array,
  locations: Array,
  paytypes: Array,
  employees: Array,
  docCategories: Array,
  hiringRequirements: Array,
});

const empform = useForm({
  tab: "",
});

function tabSwitchTo(tabName) {
  axios.post(route("employee.tabSwitchTo", tabName)).catch((error) => {
    console.log(error);
  });
}

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const job_title = props.employee.emp_job_histories[0] == null
    ? "---"
    : props.employee.emp_job_histories[0].positions.title;
const job_department = props.employee.emp_job_histories[0] == null
    ? "---"
    : props.employee.emp_job_histories[0].departments.title;

const avatar = (props.employee.avatar != null)?'/storage/' + props.employee.avatar.slug:"/theme/assets/img/avatars/default_avatar.jpeg";
const activeTab = sessionEmployeeActiveTab;
</script>

<style scoped>
.avatar {
	width: 150px;
	height: 150px;
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
	<Head title="Employee Profile" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item">
				<Link :href="route('employee')">Employee</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Profile</li>
		</template>

		<div class="col-md-12 text-start mb-2">
			<Link class="btn btn-dark btn-sm" :href="route('employee')">
				Go back
			</Link>
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
									<div class="avatar">
										<img
											id="emp_avatar_pp"
											class="avatar-img"
											:src="avatar"
											style="object-fit: cover"
										/>
									</div>
									<div class="d-flex flex-column justify-content-center ms-4">
										<h4>
											<b>{{ employee.firstname + " " + employee.lastname }}</b>
										</h4>
										<p class="mb-0">
											&mdash;
											{{ job_department + " : " + job_title }}
										</p>
										<a href="#">{{ employee.email }}</a>
										<span>
											<svg class="icon">
												<use
													xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-screen-smartphone"
												></use>
											</svg>
											{{ employee.contact }}
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="card mb-4">
								<div class="card-header">Actions</div>
								<div class="card-body">
									<button
										class="btn btn-sm btn-primary ms-auto me-1 text-light"
										@click="openClickedModal('updateEmployeeModal')"
									>
										<svg class="icon">
											<use
												xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
											></use>
										</svg>
										Edit
									</button>

									<a
										class="btn btn-sm btn-danger ms-auto me-1 text-light"
										href=""
									>
										<svg class="icon">
											<use
												xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-x-circle"
											></use>
										</svg>
										Terminate
									</a>
								</div>
							</div>
						</div>
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
										@click="tabSwitchTo('job')"
										:class="activeTab == 'job' ? 'nav-link active' : 'nav-link'"
										id="nav-job-tab"
										data-coreui-toggle="tab"
										data-coreui-target="#nav-job"
										type="button"
										role="tab"
										aria-controls="nav-job"
										aria-selected="true"
										>Job
									</Link>
								</li>
								<!-- <li class="nav-item">
                  <Link
                    @click="tabSwitchTo('leave')"
                    :class="
                      activeTab == 'leave' ? 'nav-link active' : 'nav-link'
                    "
                    id="nav-leave-tab"
                    data-coreui-toggle="tab"
                    data-coreui-target="#nav-leave"
                    type="button"
                    role="tab"
                    aria-controls="nav-leave"
                    aria-selected="true"
                    >Leave
                  </Link>
                </li> -->
								<!-- <li class="nav-item">
                  <Link
                    @click="tabSwitchTo('performance')"
                    :class="
                      activeTab == 'performance'
                        ? 'nav-link active'
                        : 'nav-link'
                    "
                    id="nav-performance-tab"
                    data-coreui-toggle="tab"
                    data-coreui-target="#nav-performance"
                    type="button"
                    role="tab"
                    aria-controls="nav-performance"
                    aria-selected="true"
                    >Performance
                  </Link>
                </li> -->
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
										@click="tabSwitchTo('requirements')"
										:class="
											activeTab == 'requirements'
												? 'nav-link active'
												: 'nav-link'
										"
										id="nav-requirements-tab"
										data-coreui-toggle="tab"
										data-coreui-target="#nav-requirements"
										type="button"
										role="tab"
										aria-controls="nav-requirements"
										aria-selected="true"
										>Requirements
									</Link>
								</li>
								<li class="nav-item">
									<Link
										@click="tabSwitchTo('memos')"
										:class="
											activeTab == 'memos' ? 'nav-link active' : 'nav-link'
										"
										id="nav-memos-tab"
										data-coreui-toggle="tab"
										data-coreui-target="#nav-memos"
										type="button"
										role="tab"
										aria-controls="nav-memos"
										aria-selected="true"
										>Memo
									</Link>
								</li>
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
									<GeneralInfoTab :employee="employee" />
								</div>
								<div
									class="tab-pane fade show"
									:class="activeTab == 'job' ? 'active' : ''"
									id="nav-job"
									role="tabpanel"
									aria-labelledby="nav-job-tab"
									tabindex="0"
								>
									<JobTab :props="props" />
								</div>
								<div
									class="tab-pane fade show"
									:class="activeTab == 'leave' ? 'active' : ''"
									id="nav-leave"
									role="tabpanel"
									aria-labelledby="nav-leave-tab"
									tabindex="0"
								>
									<LeaveTab :employee="employee" />
								</div>
								<div
									class="tab-pane fade show"
									:class="activeTab == 'performance' ? 'active' : ''"
									id="nav-performance"
									role="tabpanel"
									aria-labelledby="nav-performance-tab"
									tabindex="0"
								>
									<PerformanceTab :employee="employee" />
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
									:class="activeTab == 'requirements' ? 'active' : ''"
									id="nav-requirements"
									role="tabpanel"
									aria-labelledby="nav-requirements-tab"
									tabindex="0"
								>
									<RequirementsTab :props="props" />
								</div>
								<div
									class="tab-pane fade show"
									:class="activeTab == 'memos' ? 'active' : ''"
									id="nav-memos"
									role="tabpanel"
									aria-labelledby="nav-memos-tab"
									tabindex="0"
								>
									<MemosTab :props="props" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<UpdateEmployeeModal :props="props" />
		</div>
	</AuthenticatedLayout>
</template>