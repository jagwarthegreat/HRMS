<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
</script>

<style scoped>
th,
td {
  padding: 5px;
}
</style>
<template>
  <div class="col-m-12 mb-3">
    <a class="btn btn-sm btn-primary ms-auto me-1 text-light" href="">
      <svg class="icon">
        <use
          xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-cloud-upload"
        ></use>
      </svg>
      Upload
    </a>
  </div>
  <div class="col-12">
    <table class="table table-hover" style="border: 1px solid #ddd">
      <thead>
        <tr>
          <th></th>
          <th>Modified</th>
          <th>Created by</th>
          <th>File size</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>contract.docx</td>
          <td>2017-07-23</td>
          <td>Rino Carton</td>
          <td>2,3775.50 KB</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>