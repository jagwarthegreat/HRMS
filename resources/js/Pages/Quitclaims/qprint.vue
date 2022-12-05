<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
  qclaim: Array,
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
	<Head title="Print Claims" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item">
				<Link :href="route('quitclaims')">Claims</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Print</li>
		</template>

		<div class="container">
			<div class="col-md-12 text-end mb-2">
				<button class="btn btn-dark btn-sm" @click="printdiv('myDivToPrint')">
					Print Claims
				</button>
			</div>

			<div class="card mb-4">
				<div class="card-body" id="myDivToPrint">
					<center style="margin-bottom: 40px">
						<h3>QUIT CLAIM AND RELEASE</h3>
					</center>
					<div style="display: flex; flex-direction: column">
						<div style="font-weight: 500; font-size: 18px">
							KNOW ALL MEN BY THESE PRESENTS:
						</div>
						<div style="font-weight: 500; font-size: 18px; margin-top: 20px">
							<span style="padding-left: 40px">&nbsp;</span>
							I,
							<u>
								{{ qclaim.employee.firstname + " " + qclaim.employee.lastname }}
							</u>
							, of legal age, single and residing at
							<u>
								{{ qclaim.employee.address }}
							</u>
							, for and in consideration of the amount of
							<u>{{ qclaim.amount }}</u> paid to me by <u>SJS Manpower</u> and
							receipt of which is hereby acknowledged to my full and complete
							satisfaction, do hereby release and forever discharge said
							Company, its officers and stockholders from any and all claims
							arising out of and in connection with my resignation.
						</div>
						<div style="font-weight: 500; font-size: 18px; margin-top: 20px">
							<span style="padding-left: 40px">&nbsp;</span>
							I acknowledge that I have voluntarily tendered my resignation from
							the company effective
							<u>{{ qclaim.resgnation_effective_date }}</u> that was accepted
							and approved by the management effective
							<u>{{ qclaim.claims_effective_date }}</u>
						</div>
						<div style="font-weight: 500; font-size: 18px; margin-top: 20px">
							<span style="padding-left: 40px">&nbsp;</span>
							IN WITNESS WHEREOF, I have hereunto sign these presents this '' at
							''.
						</div>
						<div style="font-weight: 500; font-size: 18px; margin-top: 50px">
							<table style="width: 100%">
								<tr>
									<td style="text-decoration: overline">
										Name and signature of Resigned Employee
									</td>
									<td style="text-decoration: overline">
										SIGNED IN THE PRESENCE OF
									</td>
								</tr>
							</table>
						</div>
						<div style="font-weight: 500; font-size: 18px; margin-top: 50px">
							<span style="padding-left: 40px">&nbsp;</span>
							SUBSCRIBED AND SWORN to before me, ____________ at __________,
							affiant exhibiting to me his Social Security System (SSS) No.
							_________ issued at Makati City.
						</div>
						<div style="font-weight: 500; font-size: 18px; margin-top: 30px">
							Doc. No. _____; <br />
							Page No._____;<br />
							Book No.______;<br />
							Series of ______.<br />
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>