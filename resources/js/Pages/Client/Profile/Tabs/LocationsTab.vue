<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const newprops = defineProps({
  props: Object,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

console.log(newprops.props.client);

const delform = useForm({
  client_id: newprops.props.client.id
});

function destroyClientLoc(id) {
  if (confirm("Are you sure you want to Delete")) {
      delform.delete(route('client.location.destroy', id));
  }
}
</script>

<style scoped>
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

button.btn.btn-sm.btn-default.ms-auto.me-1 {
    border: 1px solid #0000002e !important;
    box-shadow: none !important;
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
    padding: 5px;
}
</style>

<template>
    <div class="accordion mb-3" id="jobDetailAccordion">
        <!-- employment type -->
        <div v-if="props.client.locations.length < 1">No Location found.</div>
        <div
            v-else
            class="accordion-item mb-3"
            v-for="(location, keyLocations) in props.client.locations"
            :key="keyLocations"
        >
            <h2
                class="accordion-header"
                :id="'panelsStayOpen-heading' + location.id"
            >
                <button
                    class="accordion-button p-2"
                    type="button"
                    data-coreui-toggle="collapse"
                    :data-coreui-target="
                        '#panelsStayOpen-collapse' + location.id
                    "
                    aria-expanded="true"
                    :aria-controls="'panelsStayOpen-collapse' + location.id"
                >
                    {{
                        location.title + " (" + location.employees.length + ")"
                    }}
                </button>
            </h2>
            <div
                :id="'panelsStayOpen-collapse' + location.id"
                class="accordion-collapse collapse"
                :aria-labelledby="'panelsStayOpen-heading' + location.id"
            >
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-12">
                            <table
                                class="table table-hover"
                                style="border: 1px solid #ddd"
                            >
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="location.employees.length < 1">
                                        <td colspan="2">No Employee found.</td>
                                    </tr>
                                    <tr
                                        v-else
                                        v-for="(
                                            emploc, keyEmployee
                                        ) in location.employees"
                                        :key="keyEmployee"
                                    >
                                        <td>
                                            {{
                                                emploc.employee.firstname +
                                                " " +
                                                emploc.employee.middlename +
                                                " " +
                                                emploc.employee.lastname
                                            }}
                                        </td>
                                        <td>
                                            {{ emploc.departments.title }}
                                        </td>
                                        <td>
                                            {{ emploc.positions.title }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /employment type -->
    </div>
</template>