<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const reqform = useForm({
  title: "",
});

const submitForm = () => {
  reqform.post(route("settings.requirement.store"), {
    onSuccess: () => {
      reqform.reset("title");
      $("#createHiringReqModal").modal("hide");
    },
  });
};
</script>

<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="createHiringReqModal"
        tabindex="-1"
        aria-labelledby="createHiringReqModal"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="submitForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createHiringReqModal">
                            Add Requirement
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
                                    v-model="reqform.title"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-show="reqform.errors.title"
                                    style="display: block"
                                >
                                    {{ reqform.errors.title }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-sm btn-primary"
                            :class="{ 'opacity-25': reqform.processing }"
                            :disabled="reqform.processing"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>