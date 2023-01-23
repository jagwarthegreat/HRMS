<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue'

export default {
	data: () => ({
      
  }),
	mounted() {
		this.init_map()
	  // $('.usertbl').DataTable();
	  // $('.usertbl').attr('style', 'border-collapse: collapse !important');

	  let testScript = document.createElement('script')
	      testScript.setAttribute('src', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC232qKEVqI5x0scuj9UGEVUNdB98PiMX0&callback=init_map')
	      document.head.appendChild(testScript)
	},
	methods: {
		init_map() {
		  var long = 10.648516;
		  var lat = 122.965087;

		  var pos = {
		    lng: long,
		    lat: lat
		  };

		  var options = {
		    zoom: 16,
		    center: pos,
		    mapTypeId: "roadmap",
		    styles: [{
		      featureType: "poi",
		      elementType: "labels",
		      stylers: [{
		        visibility: "off"
		      }]
		    }]
		  };

		  var map = new google.maps.Map(document.getElementById("map_canvas"), options);

		  var marker;
		  marker = new google.maps.Marker({
		    position: new google.maps.LatLng(long, lat),
		    map: map,
		    draggable: true,
		    animation: new google.maps.Animation.DROP,
		    label: "Main"
		  });

		  var circle = new google.maps.Circle({
		    radius: 10 * 1000,
		    center: new google.maps.LatLng(long, lat),
		    fillColor: '#FF0000',
		    fillOpacity: 0.2,
		    strokeColor: '#FF0000',
		    strokeOpacity: 0.6
		  });

		  circle.setMap(map);
		}
  }
}
</script>

<style scoped>
.badge {
	font-weight: 400;
	line-height: normal;
}
</style>
<template>
	<Head title="Login Parameter" />

	<AuthenticatedLayout>
		<template #breadcrumbs>
			<li class="breadcrumb-item">
				<Link :href="route('dashboard')">Dashboard</Link>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				Login Parameter
			</li>
		</template>
		<!-- {Auth::user()->can('user_management_access')} -->
		<div class="col-md-12 text-end mb-2" v-if="canCreate">
			<Link class="btn btn-dark btn-sm" :href="route('user.create')">
				Create User
			</Link>
		</div>

		<div class="col-12">
			<div class="card mb-4">
				<div class="card-header">User List</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div id="map_canvas"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>