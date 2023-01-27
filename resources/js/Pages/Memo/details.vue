<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
  memo: Object,
  canCreate: Boolean,
});


function printdiv(divName){
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;

}

function htmlDecode(value) {
    return $("<textarea/>").html(value).text();
}
</script>
<style scoped>
.basicInfoLabel {
	width: 70px;
	vertical-align: baseline;
	display: flex;
	justify-content: space-between;
	color: #768192;
}

.basicInfoData {
	padding-left: 10px;
	font-weight: 500;
}

th,
td {
	padding: 3px;
}

@media print {
	.myDivToPrint {
		background-color: white;
		height: 100%;
		width: 100%;
		position: fixed;
		top: 0;
		left: 0;
		margin: 0;
		padding: 15px;
		font-size: 14px;
		line-height: 18px;
	}
}
</style>
<template>
	<Head title="Print Memo" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item">
				<Link :href="route('memo')">Memo</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Print</li>
		</template>

		<div class="container">
			<div class="col-md-12 text-end mb-2">
				<button class="btn btn-dark btn-sm" @click="printdiv('myDivToPrint')">
					Print Memo
				</button>
			</div>

			<div class="card mb-4">
				<div class="card-body" id="myDivToPrint">
					<center>
						<h3>MEMORANDUM</h3>
					</center>

					<table>
						<tr>
							<td class="basicInfoLabel">
								<span>To</span>
								<span>:</span>
							</td>
							<td class="basicInfoData">
								{{ memo.employee.firstname + " " + memo.employee.lastname }}
							</td>
						</tr>
						<tr>
							<td class="basicInfoLabel">
								<span>From</span>
								<span>:</span>
							</td>
							<td class="basicInfoData">
								{{ memo.from }}
							</td>
						</tr>
						<tr>
							<td class="basicInfoLabel">
								<span>Date</span>
								<span>:</span>
							</td>
							<td class="basicInfoData">
								{{ memo.memo_date }}
							</td>
						</tr>
						<tr>
							<td class="basicInfoLabel">
								<span>Re</span>
								<span>:</span>
							</td>
							<td class="basicInfoData">
								{{ memo.subject }}
							</td>
						</tr>
					</table>
					<hr />
					<div
						v-html="htmlDecode(memo.content)"
						style="width: 100%; font-weight: 500"
					></div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>