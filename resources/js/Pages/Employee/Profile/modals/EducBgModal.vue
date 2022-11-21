<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  employee_id: String,
});

const eduform = useForm({
  school_name: "",
  degree: "",
  fieldOfStudy: "",
  completion_date: "",
  employee_id: props.employee_id,
});

const educBgStore = () => {
  eduform.post(route("employee.educbg.store"), {
    preserveScroll: true,
    onSuccess: () => {
      eduform.reset(
        "school_name",
        "degree",
        "fieldOfStudy",
        "completion_date",
      );
      $("#educBgModal").modal("hide");
    },
  });
};
</script>

<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="educBgModal"
        tabindex="-1"
        aria-labelledby="educBgModal"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="educBgStore">
                    <div class="modal-header">
                        <h5 class="modal-title" id="educBgModal">
                            Education Background
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-coreui-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="school_name" class="form-label">
                                    School Name
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="school_name"
                                    v-model="eduform.school_name"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-show="eduform.errors.school_name"
                                    style="display: block"
                                >
                                    {{ eduform.errors.school_name }}
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="degree" class="form-label"
                                    >Degree</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="degree"
                                    v-model="eduform.degree"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-show="eduform.errors.degree"
                                    style="display: block"
                                >
                                    {{ eduform.errors.degree }}
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="fieldOfStudy" class="form-label">
                                    Field of Study
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="fieldOfStudy"
                                    v-model="eduform.fieldOfStudy"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-show="eduform.errors.fieldOfStudy"
                                    style="display: block"
                                >
                                    {{ eduform.errors.fieldOfStudy }}
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="completion_date" class="form-label">
                                    Year of Completion
                                </label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="completion_date"
                                    v-model="eduform.completion_date"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-show="eduform.errors.completion_date"
                                    style="display: block"
                                >
                                    {{ eduform.errors.completion_date }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-sm btn-primary"
                            :class="{ 'opacity-25': eduform.processing }"
                            :disabled="eduform.processing"
                        >
                            Add Education
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>