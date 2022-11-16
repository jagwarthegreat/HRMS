<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const typesform = useForm({
  title: "",
});

const submitForm = () => {
  typesform.post(route("settings.compensation.types.store"), {
    onSuccess: () => {
      typesform.reset("title");
      $("#createCompensationTypeModal").modal("hide");
    },
  });
};
</script>

<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="createCompensationTypeModal"
        tabindex="-1"
        aria-labelledby="createCompensationTypeModal"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="submitForm">
                    <div class="modal-header">
                        <h5
                            class="modal-title"
                            id="createCompensationTypeModal"
                        >
                            Add Compensation Type
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
                                <label for="title" class="form-label"
                                    >Title</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    v-model="typesform.title"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-show="typesform.errors.title"
                                    style="display: block"
                                >
                                    {{ typesform.errors.title }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-sm btn-primary"
                            :class="{ 'opacity-25': typesform.processing }"
                            :disabled="typesform.processing"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>