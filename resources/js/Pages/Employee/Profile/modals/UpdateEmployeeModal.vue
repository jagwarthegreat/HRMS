<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const dprops = defineProps({
  props: Array,
});

const empform = useForm({
  firstname: dprops.props.employee.firstname,
  middlename: dprops.props.employee.middlename,
  lastname: dprops.props.employee.lastname,
  contact: dprops.props.employee.contact,
  email: dprops.props.employee.email,
  address: dprops.props.employee.address,
  dob: dprops.props.employee.date_of_birth,
  gender: dprops.props.employee.gender,
  civil_status: dprops.props.employee.civil_status,
  sss: dprops.props.employee.sss_number,
  tin: dprops.props.employee.tin_number,
  pagibig: dprops.props.employee.pagibig_number,
  philhealth: dprops.props.employee.philhealth_number,
  doh: dprops.props.employee.date_of_hire,
  emp_avatar: "",
  ced: dprops.props.employee.contract_end_date,
});

const updateEmployee = () => {
  empform.post(route("employee.update", dprops.props.employee.id), {
  	preserveScroll: true,
    onSuccess: () => {
    	// const  =;
    	// empform.processing
    	// location.reload();
      // empform.reset(
      //   "firstname",
      //   "middlename",
      //   "lastname",
      //   "contact",
      //   "email",
      //   "address",
      //   "dob",
      //   "gender",
      //   "civil_status",
      //   "sss",
      //   "tin",
      //   "pagibig",
      //   "philhealth",
      //   "employeeType",
      //   "employeeStatus",
      //   "doh",
      //   "ced",
      //   "department",
      //   "jobTitle",
      //   "location",
      //   "payRate",
      //   "payType",
      // );
      $("#updateEmployeeModal").modal("hide");
    },
  });
};


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#emp_avatar_img')
                .attr('src', e.target.result);
                // .width(150)
                // .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

const avatar = (dprops.props.employee.avatar != null)?'/storage/' + dprops.props.employee.avatar.slug:"/theme/assets/img/avatars/default_avatar.jpeg";
</script>
<style scoped>
.avatar {
    width: 100%;
    height: 240px;
}

.avatar-img {
    width: 100%;
    height: 100%;
    border-radius: 0;
    border: 1px solid #aaa;
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
</style>
<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="updateEmployeeModal"
        tabindex="-1"
        aria-labelledby="updateEmployeeModal"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form @submit.prevent="updateEmployee">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateEmployeeModal">
                            Update Employee Detail
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-coreui-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3 text-center d-flex flex-column">
                                <div class="avatar">
                                    <img
                                        class="avatar-img"
                                        id="emp_avatar_img"
                                        :src="avatar"
                                        style="object-fit: cover"
                                    />
                                </div>
                                <input
                                    type="file"
                                    id="emp_avatar"
                                    @input="
                                        empform.emp_avatar =
                                            $event.target.files[0]
                                    "
                                    style="display: none"
                                    accept="image/*"
                                    @change="readURL($event.target)"
                                />
                                <label
                                    class="btn btn-sm btn-dark mt-2"
                                    for="emp_avatar"
                                >
                                    Upload Avatar
                                </label>
                            </div>
                            <div class="col-9">
                                <div
                                    class="accordion mb-3"
                                    id="updateEmployeeDetailAccordion"
                                >
                                    <!-- personal detial -->
                                    <div class="accordion-item mb-3">
                                        <h2
                                            class="accordion-header"
                                            id="panelsStayOpen-headingUpdateEmp"
                                        >
                                            <button
                                                class="accordion-button p-2"
                                                type="button"
                                                data-coreui-toggle="collapse"
                                                data-coreui-target="#panelsStayOpen-collapseUpdateEmp"
                                                aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseUpdateEmp"
                                            >
                                                Personal Detail
                                            </button>
                                        </h2>
                                        <div
                                            id="panelsStayOpen-collapseUpdateEmp"
                                            class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-headingUpdateEmp"
                                        >
                                            <div class="accordion-body">
                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <label
                                                            for="firstname"
                                                            class="form-label"
                                                        >
                                                            Firstname<span
                                                                class="text-danger"
                                                                >*</span
                                                            >
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="firstname"
                                                            v-model="
                                                                empform.firstname
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .firstname
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .firstname
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="middlename"
                                                            class="form-label"
                                                            >Middlename<span
                                                                class="text-danger"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="middlename"
                                                            v-model="
                                                                empform.middlename
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .middlename
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .middlename
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="lastname"
                                                            class="form-label"
                                                            >Lastname<span
                                                                class="text-danger"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="lastname"
                                                            v-model="
                                                                empform.lastname
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .lastname
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .lastname
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="contact"
                                                            class="form-label"
                                                            >Contact<span
                                                                class="text-danger"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="contact"
                                                            v-model="
                                                                empform.contact
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .contact
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .contact
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label
                                                            for="email"
                                                            class="form-label"
                                                            >E-mail
                                                            Address</label
                                                        >
                                                        <input
                                                            type="email"
                                                            class="form-control"
                                                            id="email"
                                                            v-model="
                                                                empform.email
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .email
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .email
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label
                                                            for="address"
                                                            class="form-label"
                                                        >
                                                            Address<span
                                                                class="text-danger"
                                                                >*</span
                                                            >
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="address"
                                                            v-model="
                                                                empform.address
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .address
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .address
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="dob"
                                                            class="form-label"
                                                        >
                                                            Date of Birth<span
                                                                class="text-danger"
                                                                >*</span
                                                            >
                                                        </label>
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="dob"
                                                            v-model="
                                                                empform.dob
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .dob
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .dob
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="gender"
                                                            class="form-label"
                                                        >
                                                            Gender<span
                                                                class="text-danger"
                                                                >*</span
                                                            >
                                                        </label>
                                                        <select
                                                            class="form-select"
                                                            id="gender"
                                                            v-model="
                                                                empform.gender
                                                            "
                                                        >
                                                            <option value="M">
                                                                Male
                                                            </option>
                                                            <option value="F">
                                                                Female
                                                            </option>
                                                        </select>
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .gender
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .gender
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="civil_status"
                                                            class="form-label"
                                                        >
                                                            Civil Status<span
                                                                class="text-danger"
                                                                >*</span
                                                            >
                                                        </label>
                                                        <select
                                                            class="form-select"
                                                            id="civil_status"
                                                            v-model="
                                                                empform.civil_status
                                                            "
                                                        >
                                                            <option
                                                                value="Married"
                                                            >
                                                                Married
                                                            </option>
                                                            <option
                                                                value="Divorced"
                                                            >
                                                                Divorced
                                                            </option>
                                                            <option
                                                                value="Separated"
                                                            >
                                                                Separated
                                                            </option>
                                                            <option
                                                                value="Widowed"
                                                            >
                                                                Widowed
                                                            </option>
                                                            <option
                                                                value="Single"
                                                            >
                                                                Single
                                                            </option>
                                                        </select>
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .civil_status
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .civil_status
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="sss"
                                                            class="form-label"
                                                            >SSS Number</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="sss"
                                                            v-model="
                                                                empform.sss
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .sss
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .sss
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="tin"
                                                            class="form-label"
                                                            >TIN Number</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="tin"
                                                            v-model="
                                                                empform.tin
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .tin
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .tin
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="pagibig"
                                                            class="form-label"
                                                            >HDMF Number</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="pagibig"
                                                            v-model="
                                                                empform.pagibig
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .pagibig
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .pagibig
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="philhealth"
                                                            class="form-label"
                                                            >PHILHEALTH
                                                            Number</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="philhealth"
                                                            v-model="
                                                                empform.philhealth
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .philhealth
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .philhealth
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="dob"
                                                            class="form-label"
                                                            >Date of Hire</label
                                                        >
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="doh"
                                                            v-model="
                                                                empform.doh
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .doh
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .doh
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label
                                                            for="ced"
                                                            class="form-label"
                                                            >Contract End
                                                            Date</label
                                                        >
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="ced"
                                                            v-model="
                                                                empform.ced
                                                            "
                                                        />
                                                        <div
                                                            class="invalid-feedback"
                                                            v-show="
                                                                empform.errors
                                                                    .ced
                                                            "
                                                            style="
                                                                display: block;
                                                            "
                                                        >
                                                            {{
                                                                empform.errors
                                                                    .ced
                                                            }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /personal detial -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-sm btn-primary"
                            :class="{ 'opacity-25': empform.processing }"
                            :disabled="empform.processing"
                        >
                            Update Employee
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>