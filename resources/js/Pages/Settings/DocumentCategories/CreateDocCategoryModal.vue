<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const docform = useForm({
  title: "",
});

const submitForm = () => {
  docform.post(route("settings.doc.category.store"), {
    onSuccess: () => {
      docform.reset("title");
      $("#createDocCatModal").modal("hide");
    },
  });
};
</script>

<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="createDocCatModal"
        tabindex="-1"
        aria-labelledby="createDocCatModal"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="submitForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createDocCatModal">
                            Add Document Category
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
                                    v-model="docform.title"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-show="docform.errors.title"
                                    style="display: block"
                                >
                                    {{ docform.errors.title }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-sm btn-primary"
                            :class="{ 'opacity-25': docform.processing }"
                            :disabled="docform.processing"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>