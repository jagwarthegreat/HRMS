<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateNoticeModal from "./CreateNoticeModal.vue";
import { ref, onMounted } from 'vue'

const props = defineProps({
  notices: Array,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('notice.destroy', id));
  }
}

onMounted(() => {
  $('.noticetbl').DataTable();
  $('.noticetbl').attr('style', 'border-collapse: collapse !important');
})
</script>
<style scoped>
td {
	padding: 3px;
	vertical-align: middle;
}
</style>
<template>
	<Head title="Notices" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Notices</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
				class="btn btn-dark btn-sm"
				@click="openClickedModal('createNoticeModal')"
			>
				Create New Notice
			</button>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Notice List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover noticetbl">
								<thead>
									<tr>
										<th>Date</th>
										<th>Notice For</th>
										<th>Subject</th>
										<th style="width: 100px"></th>
									</tr>
								</thead>
								<tbody v-if="notices.length > 0">
									<tr v-for="(notice, keyNotice) in notices" :key="keyNotice">
										<td style="width: 100px; vertical-align: baseline">
											{{ notice.notice_date }}
										</td>
										<td style="width: 200px; vertical-align: baseline">
											{{ notice.notice_for }}
										</td>
										<td style="width: 200px; vertical-align: baseline">
											{{ notice.subject }}
										</td>
										<td style="width: 100px; vertical-align: baseline">
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="destroy(notice.id)"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"
													></use>
												</svg>
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<CreateNoticeModal :props="props" />
	</AuthenticatedLayout>
</template>