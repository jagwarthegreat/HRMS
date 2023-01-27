<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateMemoModal from "./CreateMemoModal.vue";
import { ref, onMounted } from 'vue'

const props = defineProps({
  memos: Object,
  employees: Object,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('memo.destroy', id));
  }
}

function htmlDecode(value) {
    return $("<textarea/>").html(value).text();
}

onMounted(() => {
  $('.memotbl').DataTable();
  $('.memotbl').attr('style', 'border-collapse: collapse !important');
})
</script>
<style scoped>
td {
	padding: 3px;
	vertical-align: middle;
}
</style>
<template>
	<Head title="Position" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Memo</li>
		</template>

		<div class="col-md-12 text-end mb-2">
			<button
				class="btn btn-dark btn-sm"
				@click="openClickedModal('createMemoModal')"
			>
				Create Memo
			</button>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">Memo List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover memotbl">
								<thead>
									<tr>
										<th>Date</th>
										<th>Subject</th>
										<th>Employee</th>
										<th>Content</th>
										<th style="width: 130px"></th>
									</tr>
								</thead>
								<tbody v-if="memos.length > 0">
									<tr v-for="(memo, keyMemo) in memos" :key="keyMemo">
										<td style="width: 100px; vertical-align: baseline">
											{{ memo.memo_date }}
										</td>
										<td style="vertical-align: baseline">
											{{ memo.subject }}
										</td>
										<td style="width: 200px; vertical-align: baseline">
											{{
												memo.employee.firstname + " " + memo.employee.lastname
											}}
										</td>
										<td>
											<div
												v-if="memo.content.length < 100"
												v-html="htmlDecode(memo.content)"
											></div>
											<div
												v-if="memo.content.length >= 100"
												v-html="
													htmlDecode(memo.content.substring(0, 100) + '...')
												"
											></div>
										</td>
										<td style="width: 100px; vertical-align: baseline">
											<!-- <button
												class="btn btn-sm btn-ghost-secondary text-dark"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-notes"
													></use>
												</svg>
											</button> -->
											<button
												class="btn btn-sm btn-ghost-secondary text-dark"
												@click="destroy(memo.id)"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"
													></use>
												</svg>
											</button>
											<a
												:href="route('memo.show', memo.id)"
												class="btn btn-sm btn-ghost-secondary text-dark"
												:class="{ 'opacity-25': form.processing }"
												:disabled="form.processing"
											>
												<svg class="icon">
													<use
														xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-print"
													></use>
												</svg>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<CreateMemoModal :props="props" />
	</AuthenticatedLayout>
</template>