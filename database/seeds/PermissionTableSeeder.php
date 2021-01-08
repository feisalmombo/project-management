<?php

use Illuminate\Database\Seeder;
use App\Permissions\HasPermissionsTrait;
use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev_role = Role::where('slug','developer')->first();
        $admin_role = Role::where('slug', 'administrator')->first();
        $marketpersonnel_role = Role::where('slug', 'market')->first();
        $projectmanager_role = Role::where('slug', 'manager')->first();
        $hod_role = Role::where('slug', 'hod')->first();
        $opd_role = Role::where('slug', 'opd')->first();
        $finance_role = Role::where('slug', 'finance')->first();
        $ceo_role = Role::where('slug', 'ceo')->first();



        $handleSystem = new Permission();
        $handleSystem->slug = 'create_system';
        $handleSystem->name = 'Create System';
        $handleSystem->save();
        $handleSystem->roles()->attach($dev_role);

        $manageUsers = new Permission();
        $manageUsers->slug = 'manage_users';
        $manageUsers->name = 'Manage Users';
        $manageUsers->save();
        $manageUsers->roles()->attach($admin_role);

        $createPurchaseOrder = new Permission();
        $createPurchaseOrder->slug = 'create_po';
        $createPurchaseOrder->name = 'Create Purchase Order';
        $createPurchaseOrder->save();
        $createPurchaseOrder->roles()->attach($marketpersonnel_role);

        $createBudget = new Permission();
        $createBudget->slug = 'create_budget';
        $createBudget->name = 'Create Budget';
        $createBudget->save();
        $createBudget->roles()->attach($projectmanager_role);

        $approveBudget = new Permission();
        $approveBudget->slug = 'approve_budget';
        $approveBudget->name = 'Approve Budget';
        $approveBudget->save();
        $approveBudget->roles()->attach($hod_role);

        $viewBudget = new Permission();
        $viewBudget->slug = 'view_budget';
        $viewBudget->name = 'View Budget';
        $viewBudget->save();
        $viewBudget->roles()->attach($opd_role);

        $sendBudget = new Permission();
        $sendBudget->slug = 'send_budget';
        $sendBudget->name = 'Send Budget';
        $sendBudget->save();
        $sendBudget->roles()->attach($finance_role);

        $commentBudget = new Permission();
        $commentBudget->slug = 'comment_budget';
        $commentBudget->name = 'Comment Budget';
        $commentBudget->save();
        $commentBudget->roles()->attach($ceo_role);

    }
}
