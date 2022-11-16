<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import addDocumentModal from "./../modals/AddDocumentModal.vue";

const newprops = defineProps({
  props: Array,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}
</script>

<style scoped>
th,
td {
  padding: 5px;
}
</style>
<template>
  <div class="col-m-12 mb-3">
    <button
      class="btn btn-sm btn-primary ms-auto me-1 text-light"
      @click="openClickedModal('addDocumentModal')"
    >
      <svg class="icon">
        <use
          xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-cloud-upload"
        ></use>
      </svg>
      Upload
    </button>
  </div>
  <div class="col-12">
    <table class="table table-hover" style="border: 1px solid #ddd">
      <thead>
        <tr>
          <th></th>
          <th>Filename</th>
          <th>Modified</th>
          <th>Created by</th>
          <th>File size</th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="props.client.documents.length < 1">
          <td colspan="5">No documents found.</td>
        </tr>
        <tr
          v-else
          v-for="(clientdoc, keyClientdoc) in props.client.documents"
          :key="keyClientdoc"
        >
          <td>{{ clientdoc.document_category.title }}</td>
          <td>
            {{ clientdoc.filename }}
            <!-- <img :src="'/storage/' + empdocument.slug" style="width: 40px;"> -->
          </td>
          <td>{{ clientdoc.created_at }}</td>
          <td>
            {{
              clientdoc.created_by.firstname +
              " " +
              clientdoc.created_by.lastname
            }}
          </td>
          <td>{{ clientdoc.filesize + "KB" }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <addDocumentModal
    :client_id="props.client.id"
    :docTypes="props.docCategories"
  />
</template>