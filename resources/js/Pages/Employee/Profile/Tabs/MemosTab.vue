<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const newprops = defineProps({
  props: Array,
});

</script>

<style scoped>
th,
td {
	padding: 5px;
}
</style>
<template>
	<div class="col-12">
		<table class="table table-hover" style="border: 1px solid #ddd">
			<thead>
				<tr>
					<th>Subject</th>
					<th>Content</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="props.employee.memos.length < 1">
					<td colspan="5">No documents found.</td>
				</tr>
				<tr
					v-else
					v-for="(memo, keyMemo) in props.employee.memos"
					:key="keyMemo"
				>
					<td>
						{{ memo.subject }}
					</td>
					<td>
						<div v-if="memo.content.length < 100">
							{{ memo.content }}
						</div>
						<div v-if="memo.content.length >= 100">
							{{ memo.content.substring(0, 100) + "..." }}
						</div>
					</td>
					<td>{{ memo.memo_date }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>