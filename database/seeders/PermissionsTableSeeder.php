<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = array(
            array(
                "id" => 1,
                "title" => "user_management_access",
                "created_at" => "2022-11-07 05:33:52",
                "updated_at" => "2022-11-07 05:33:52",
            ),
            array(
                "id" => 2,
                "title" => "permission_access",
                "created_at" => "2022-11-07 05:42:47",
                "updated_at" => "2022-11-07 05:42:47",
            ),
            array(
                "id" => 3,
                "title" => "permission_create",
                "created_at" => "2022-11-07 05:44:29",
                "updated_at" => "2022-11-07 05:44:29",
            ),
            array(
                "id" => 4,
                "title" => "permission_edit",
                "created_at" => "2022-11-07 05:44:40",
                "updated_at" => "2022-11-07 05:44:40",
            ),
            array(
                "id" => 5,
                "title" => "permission_show",
                "created_at" => "2022-11-07 05:44:48",
                "updated_at" => "2022-11-07 05:44:48",
            ),
            array(
                "id" => 6,
                "title" => "permission_delete",
                "created_at" => "2022-11-07 05:44:57",
                "updated_at" => "2022-11-07 05:44:57",
            ),
            array(
                "id" => 7,
                "title" => "role_create",
                "created_at" => "2022-11-07 05:45:19",
                "updated_at" => "2022-11-07 05:45:19",
            ),
            array(
                "id" => 8,
                "title" => "role_edit",
                "created_at" => "2022-11-07 05:45:26",
                "updated_at" => "2022-11-07 05:45:26",
            ),
            array(
                "id" => 9,
                "title" => "role_show",
                "created_at" => "2022-11-07 05:45:34",
                "updated_at" => "2022-11-07 05:45:34",
            ),
            array(
                "id" => 10,
                "title" => "role_delete",
                "created_at" => "2022-11-07 05:45:40",
                "updated_at" => "2022-11-07 05:45:40",
            ),
            array(
                "id" => 11,
                "title" => "role_access",
                "created_at" => "2022-11-07 05:45:49",
                "updated_at" => "2022-11-07 05:45:49",
            ),
            array(
                "id" => 12,
                "title" => "user_create",
                "created_at" => "2022-11-07 05:45:59",
                "updated_at" => "2022-11-07 05:45:59",
            ),
            array(
                "id" => 13,
                "title" => "user_edit",
                "created_at" => "2022-11-07 05:46:06",
                "updated_at" => "2022-11-07 05:46:06",
            ),
            array(
                "id" => 14,
                "title" => "user_show",
                "created_at" => "2022-11-07 05:46:14",
                "updated_at" => "2022-11-07 05:46:14",
            ),
            array(
                "id" => 15,
                "title" => "user_delete",
                "created_at" => "2022-11-07 05:46:22",
                "updated_at" => "2022-11-07 05:46:22",
            ),
            array(
                "id" => 16,
                "title" => "user_access",
                "created_at" => "2022-11-07 05:46:29",
                "updated_at" => "2022-11-07 05:46:29",
            ),
            array(
                "id" => 17,
                "title" => "employee_management_access",
                "created_at" => "2022-11-08 07:27:26",
                "updated_at" => "2022-11-08 07:27:26",
            ),
            array(
                "id" => 18,
                "title" => "position_access",
                "created_at" => "2022-11-08 08:26:52",
                "updated_at" => "2022-11-08 08:26:52",
            ),
            array(
                "id" => 19,
                "title" => "position_create",
                "created_at" => "2022-11-08 08:27:05",
                "updated_at" => "2022-11-08 08:27:05",
            ),
            array(
                "id" => 20,
                "title" => "position_edit",
                "created_at" => "2022-11-08 08:27:18",
                "updated_at" => "2022-11-08 08:27:18",
            ),
            array(
                "id" => 21,
                "title" => "position_show",
                "created_at" => "2022-11-08 08:27:29",
                "updated_at" => "2022-11-08 08:27:29",
            ),
            array(
                "id" => 22,
                "title" => "position_delete",
                "created_at" => "2022-11-08 08:27:41",
                "updated_at" => "2022-11-08 08:27:41",
            ),
            array(
                "id" => 23,
                "title" => "Master Data",
                "created_at" => "2023-02-23 08:02:23",
                "updated_at" => "2023-02-23 08:02:23",
            ),
            array(
                "id" => 24,
                "title" => "clients_access",
                "created_at" => "2023-02-23 08:03:32",
                "updated_at" => "2023-02-23 08:03:32",
            ),
            array(
                "id" => 25,
                "title" => "locations_access",
                "created_at" => "2023-02-23 08:03:41",
                "updated_at" => "2023-02-23 08:03:41",
            ),
            array(
                "id" => 26,
                "title" => "employee_status_access",
                "created_at" => "2023-02-23 08:03:49",
                "updated_at" => "2023-02-23 08:03:49",
            ),
            array(
                "id" => 27,
                "title" => "employment_types_access",
                "created_at" => "2023-02-23 08:04:07",
                "updated_at" => "2023-02-23 08:04:07",
            ),
            array(
                "id" => 28,
                "title" => "compensation_types_access",
                "created_at" => "2023-02-23 08:04:23",
                "updated_at" => "2023-02-23 08:04:23",
            ),
            array(
                "id" => 29,
                "title" => "document_category_access",
                "created_at" => "2023-02-23 08:04:36",
                "updated_at" => "2023-02-23 08:04:36",
            ),
            array(
                "id" => 30,
                "title" => "hiring_requirements_access",
                "created_at" => "2023-02-23 08:04:54",
                "updated_at" => "2023-02-23 08:04:54",
            ),
            array(
                "id" => 31,
                "title" => "stocks_access",
                "created_at" => "2023-02-23 08:05:06",
                "updated_at" => "2023-02-23 08:05:06",
            ),
            array(
                "id" => 32,
                "title" => "stock_category_access",
                "created_at" => "2023-02-23 08:05:19",
                "updated_at" => "2023-02-23 08:05:19",
            ),
            array(
                "id" => 33,
                "title" => "department_access",
                "created_at" => "2023-02-23 08:05:53",
                "updated_at" => "2023-02-23 08:05:53",
            ),
            array(
                "id" => 34,
                "title" => "positions_access",
                "created_at" => "2023-02-23 08:06:03",
                "updated_at" => "2023-02-23 08:06:03",
            ),
            array(
                "id" => 35,
                "title" => "deployment_access",
                "created_at" => "2023-02-23 08:09:25",
                "updated_at" => "2023-02-23 08:09:25",
            ),
            array(
                "id" => 36,
                "title" => "memo_access",
                "created_at" => "2023-02-23 08:09:41",
                "updated_at" => "2023-02-23 08:09:41",
            ),
            array(
                "id" => 37,
                "title" => "notice_access",
                "created_at" => "2023-02-23 08:09:49",
                "updated_at" => "2023-02-23 08:09:49",
            ),
            array(
                "id" => 38,
                "title" => "lawsuit_cases_access",
                "created_at" => "2023-02-23 08:10:03",
                "updated_at" => "2023-02-23 08:10:03",
            ),
            array(
                "id" => 39,
                "title" => "quit_claims_access",
                "created_at" => "2023-02-23 08:10:15",
                "updated_at" => "2023-02-23 08:10:15",
            ),
            array(
                "id" => 40,
                "title" => "hr_management__access",
                "created_at" => "2023-02-23 08:10:40",
                "updated_at" => "2023-02-23 08:10:40",
            ),
            array(
                "id" => 41,
                "title" => "transaction_access",
                "created_at" => "2023-02-23 08:10:49",
                "updated_at" => "2023-02-23 08:10:49",
            ),
            array(
                "id" => 42,
                "title" => "procurement__access",
                "created_at" => "2023-02-23 08:11:00",
                "updated_at" => "2023-02-23 08:11:00",
            ),
            array(
                "id" => 43,
                "title" => "stock_transfer_access",
                "created_at" => "2023-02-23 08:11:09",
                "updated_at" => "2023-02-23 08:11:09",
            ),
            array(
                "id" => 44,
                "title" => "reports_access",
                "created_at" => "2023-02-23 08:11:17",
                "updated_at" => "2023-02-23 08:11:17",
            ),
            array(
                "id" => 45,
                "title" => "inventory_access",
                "created_at" => "2023-02-23 08:11:26",
                "updated_at" => "2023-02-23 08:11:26",
            ),
            array(
                "id" => 46,
                "title" => "contract_report",
                "created_at" => "2023-02-23 08:11:38",
                "updated_at" => "2023-02-23 08:11:38",
            ),
            array(
                "id" => 47,
                "title" => "employee_status_access",
                "created_at" => "2023-02-23 08:11:46",
                "updated_at" => "2023-02-23 08:11:46",
            ),
        );


        Permission::insert($permissions);
    }
}
