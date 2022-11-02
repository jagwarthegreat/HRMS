<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="decoration-4">HRMS</div>
                        “HRMS” stands for Human Resources Management System. It refers to a suite of software that organizations use to manage internal HR functions. From employee data management to payroll, recruitment, benefits, training, talent management, employee engagement, and employee attendance, HRMS software helps HR professionals manage the modern workforce. Also called a human resources information system (HRIS), HRMS systems put information about a company's most valuable assets in front of the people who need them.
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
