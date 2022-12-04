<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
  stocks: Array,
  date_now:'',
});
</script>
<style scoped>
td {
    padding: 3px;
    vertical-align: middle;
}
</style>
<template>
    <Head title="Location" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('dashboard')">Report</Link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Inventory Report
            </li>
        </template>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header p-5">
                    <center>
                        <h3>SJS MANPOWER</h3>
                        <h4>Suntal Village, Circumferential Road</h4>
                        <h5>Inventory Report</h5>
                        <h6>{{ date_now }}</h6>
                    </center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>STOCK</th>
                                        <th>UNIT</th>
                                        <th>QUANTITY</th>
                                    </tr>
                                </thead>
                                <tbody v-if="stocks.length > 0">
                                    <tr
                                        v-for="(stock, keyStocks) in stocks"
                                        :key="keyStocks"
                                    >
                                        <td>
                                            {{ keyStocks + 1 }}
                                        </td>
                                        <td>
                                            {{ stock.stock.name }}
                                        </td>
                                        <td>
                                            {{ stock.stock.unit }}
                                        </td>
                                        <td>
                                            {{ stock.quantity }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>