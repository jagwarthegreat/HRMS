<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({
  employeeTypes: Array,
  employee_status: Array,
  departments: Array,
  positions: Array,
  locations: Array,
  employees: Array,
  paytypes: Array,
});

const empform = useForm({
  firstname: "",
  middlename: "",
  lastname: "",
  contact: "",
  email: "",
  address: "",
  dob: "",
  gender: "",
  civil_status: "",
  sss: "",
  tin: "",
  pagibig: "",
  philhealth: "",
  employeeType: "",
  employeeStatus: "",
  doh: "",
  ced: "",
  department: "",
  jobTitle: "",
  location: "",
  payRate: "",
  payType: "",
});

const submit = () => {
  empform.post(route("employee.store"), {
    onSuccess: () => {
      empform.reset(
        "firstname",
        "middlename",
        "lastname",
        "contact",
        "email",
        "address",
        "dob",
        "gender",
        "civil_status",
        "sss",
        "tin",
        "pagibig",
        "philhealth",
        "employeeType",
        "employeeStatus",
        "doh",
        "ced",
        "department",
        "jobTitle",
        "location",
        "payRate",
        "payType",
        "shift",
      );
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
	<Head title="Create Employee" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item">
				<Link :href="route('employee')">User</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Create</li>
		</template>

		<div class="container">
			<div class="col-md-12 text-start mb-2">
				<Link class="btn btn-dark btn-sm" :href="route('employee')">
					Go back
				</Link>
			</div>

			<div class="col-md-12 mb-4">
				<div class="row">
					<div class="col-md-12">
						<form @submit.prevent="submit">
							<div class="accordion mb-3" id="employeeDetailAccordion">
								<!-- personal detial -->
								<div class="accordion-item mb-3">
									<h2 class="accordion-header" id="panelsStayOpen-headingOne">
										<button
											class="accordion-button p-2"
											type="button"
											data-coreui-toggle="collapse"
											data-coreui-target="#panelsStayOpen-collapseOne"
											aria-expanded="true"
											aria-controls="panelsStayOpen-collapseOne"
										>
											Personal Detail
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
													<label for="firstname" class="form-label">
														Firstname<span class="text-danger">*</span>
													</label>
													<input
														type="text"
														class="form-control"
														id="firstname"
														v-model="empform.firstname"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.firstname"
														style="display: block"
													>
														{{ empform.errors.firstname }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="middlename" class="form-label"
														>Middlename<span class="text-danger">*</span></label
													>
													<input
														type="text"
														class="form-control"
														id="middlename"
														v-model="empform.middlename"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.middlename"
														style="display: block"
													>
														{{ empform.errors.middlename }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="lastname" class="form-label"
														>Lastname<span class="text-danger">*</span></label
													>
													<input
														type="text"
														class="form-control"
														id="lastname"
														v-model="empform.lastname"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.lastname"
														style="display: block"
													>
														{{ empform.errors.lastname }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="contact" class="form-label"
														>Contact<span class="text-danger">*</span></label
													>
													<input
														type="text"
														class="form-control"
														id="contact"
														v-model="empform.contact"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.contact"
														style="display: block"
													>
														{{ empform.errors.contact }}
													</div>
												</div>
												<div class="col-md-8">
													<label for="email" class="form-label"
														>E-mail Address</label
													>
													<input
														type="email"
														class="form-control"
														id="email"
														v-model="empform.email"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.email"
														style="display: block"
													>
														{{ empform.errors.email }}
													</div>
												</div>
												<div class="col-12">
													<label for="address" class="form-label">
														Address<span class="text-danger">*</span>
													</label>
													<input
														type="text"
														class="form-control"
														id="address"
														v-model="empform.address"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.address"
														style="display: block"
													>
														{{ empform.errors.address }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="dob" class="form-label">
														Date of Birth<span class="text-danger">*</span>
													</label>
													<input
														type="date"
														class="form-control"
														id="dob"
														v-model="empform.dob"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.dob"
														style="display: block"
													>
														{{ empform.errors.dob }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="gender" class="form-label">
														Gender<span class="text-danger">*</span>
													</label>
													<select
														class="form-select"
														id="gender"
														v-model="empform.gender"
													>
														<option value="M">Male</option>
														<option value="F">Female</option>
													</select>
													<div
														class="invalid-feedback"
														v-show="empform.errors.gender"
														style="display: block"
													>
														{{ empform.errors.gender }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="civil_status" class="form-label">
														Civil Status<span class="text-danger">*</span>
													</label>
													<select
														class="form-select"
														id="civil_status"
														v-model="empform.civil_status"
													>
														<option value="Married">Married</option>
														<option value="Divorced">Divorced</option>
														<option value="Separated">Separated</option>
														<option value="Widowed">Widowed</option>
														<option value="Single">Single</option>
													</select>
													<div
														class="invalid-feedback"
														v-show="empform.errors.civil_status"
														style="display: block"
													>
														{{ empform.errors.civil_status }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="sss" class="form-label">SSS Number</label>
													<input
														type="text"
														class="form-control"
														id="sss"
														v-model="empform.sss"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.sss"
														style="display: block"
													>
														{{ empform.errors.sss }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="tin" class="form-label">TIN Number</label>
													<input
														type="text"
														class="form-control"
														id="tin"
														v-model="empform.tin"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.tin"
														style="display: block"
													>
														{{ empform.errors.tin }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="pagibig" class="form-label"
														>HDMF Number</label
													>
													<input
														type="text"
														class="form-control"
														id="pagibig"
														v-model="empform.pagibig"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.pagibig"
														style="display: block"
													>
														{{ empform.errors.pagibig }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="philhealth" class="form-label"
														>PHILHEALTH Number</label
													>
													<input
														type="text"
														class="form-control"
														id="philhealth"
														v-model="empform.philhealth"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.philhealth"
														style="display: block"
													>
														{{ empform.errors.philhealth }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="employeeType" class="form-label"
														>Employee Type</label
													>
													<select
														class="form-select"
														id="employeeType"
														v-model="empform.employeeType"
													>
														<option
															v-for="(
																employeetype, keyEmployeetype
															) in employeeTypes"
															:key="keyEmployeetype"
															:value="employeetype.id"
														>
															{{ employeetype.title }}
														</option>
													</select>
													<div
														class="invalid-feedback"
														v-show="empform.errors.employeeType"
														style="display: block"
													>
														{{ empform.errors.employeeType }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="employeeStatus" class="form-label"
														>Employee Status</label
													>
													<select
														class="form-select"
														id="employeeStatus"
														v-model="empform.employeeStatus"
													>
														<option
															v-for="(status, keyStatus) in employee_status"
															:key="keyStatus"
															:value="status.id"
														>
															{{ status.title }}
														</option>
													</select>
													<div
														class="invalid-feedback"
														v-show="empform.errors.employeeStatus"
														style="display: block"
													>
														{{ empform.errors.employeeStatus }}
													</div>
												</div>
												<div class="col-md-4">
													<label for="dob" class="form-label"
														>Date of Hire</label
													>
													<input
														type="date"
														class="form-control"
														id="doh"
														v-model="empform.doh"
													/>
													<div
														class="invalid-feedback"
														v-show="empform.errors.doh"
														style="display: block"
													>
														{{ empform.errors.doh }}
													</div>
												</div>
												<!-- <div class="col-md-4">
                                                    <label
                                                        for="dob"
                                                        class="form-label"
                                                        >Contract End
                                                        Date</label
                                                    >
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                        id="ced"
                                                        v-model="empform.ced"
                                                    />
                                                    <div
                                                        class="invalid-feedback"
                                                        v-show="
                                                            empform.errors.ced
                                                        "
                                                        style="display: block"
                                                    >
                                                        {{ empform.errors.ced }}
                                                    </div>
                                                </div> -->
											</div>
										</div>
									</div>
								</div>
								<!-- /personal detial -->

								<!-- work detial -->
								<div class="accordion-item mb-3">
									<h2
										class="accordion-header"
										id="panelsStayOpen-headingWorkAdd"
									>
										<button
											class="accordion-button p-2"
											type="button"
											data-coreui-toggle="collapse"
											data-coreui-target="#panelsStayOpen-collapseWorkAdd"
											aria-expanded="true"
											aria-controls="panelsStayOpen-collapseWorkAdd"
										>
											Work
										</button>
									</h2>
									<div
										id="panelsStayOpen-collapseWorkAdd"
										class="accordion-collapse collapse"
										aria-labelledby="panelsStayOpen-headingWorkAdd"
									>
										<div class="accordion-body">
											<div class="row g-3">
												<div class="col-md-4">
													<label for="department" class="form-label"
														>Department</label
													>
													<select
														class="form-select"
														id="department"
														v-model="empform.department"
													>
														<option
															v-for="(department, keyDepartment) in departments"
															:key="keyDepartment"
															:value="department.id"
														>
															{{ department.title }}
														</option>
													</select>
												</div>
												<div class="col-md-4">
													<label for="jobTitle" class="form-label"
														>Job Title</label
													>
													<select
														class="form-select"
														id="jobTitle"
														v-model="empform.jobTitle"
													>
														<option
															v-for="(position, keyPosition) in positions"
															:key="keyPosition"
															:value="position.id"
														>
															{{ position.title }}
														</option>
													</select>
												</div>
												<div class="col-md-4">
													<label for="location" class="form-label"
														>Location</label
													>
													<select
														class="form-select"
														id="location"
														v-model="empform.location"
													>
														<option
															v-for="(location, keylocation) in locations"
															:key="keylocation"
															:value="location.id"
														>
															{{ location.title }}
														</option>
													</select>
												</div>
												<div class="col-md-4">
													<label for="payRate" class="form-label"
														>Pay Rate</label
													>
													<input
														type="text"
														class="form-control"
														id="payRate"
														v-model="empform.payRate"
													/>
												</div>
												<div class="col-md-4">
													<label for="payType" class="form-label"
														>Pay Type</label
													>
													<select
														class="form-select"
														id="payType"
														v-model="empform.payType"
													>
														<option
															v-for="(paytype, keypaytype) in paytypes"
															:key="keypaytype"
															:value="paytype.id"
														>
															{{ paytype.title }}
														</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /work detial -->
							</div>

							<div class="col-12">
								<button
									type="submit"
									class="btn btn-sm btn-primary"
									:class="{
										'opacity-25': empform.processing,
									}"
									:disabled="empform.processing"
								>
									Create Employee
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>