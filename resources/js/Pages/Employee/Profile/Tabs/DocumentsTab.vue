<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import addDocumentModal from "./../modals/AddDocumentModal.vue";

const newprops = defineProps({
  props: Object,
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
				<tr v-if="props.employee.documents.length < 1">
					<td colspan="5">No documents found.</td>
				</tr>
				<tr
					v-else
					v-for="(empdocument, keyEmpdocument) in props.employee
						.documents"
					:key="keyEmpdocument"
				>
					<td>
						{{
							empdocument.document_category == null
								? "---"
								: empdocument.document_category.title
						}}
					</td>
					<td>
						{{ empdocument.filename }}
						<!-- <img :src="'/storage/' + empdocument.slug" style="width: 40px;"> -->
					</td>
					<td>{{ empdocument.created_at }}</td>
					<td>
						{{
							empdocument.created_by.firstname +
							" " +
							empdocument.created_by.lastname
						}}
					</td>
					<td>{{ empdocument.filesize + "KB" }}</td>
				</tr>
			</tbody>
		</table>
	</div>

	<addDocumentModal
		:employee_id="props.employee.id"
		:docTypes="props.docCategories"
	/>
</template>