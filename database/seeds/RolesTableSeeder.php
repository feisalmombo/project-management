<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Role;
use App\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$dev_permission = Permission::where('slug','create_system')->first(); // Developer
        $admin_permission = Permission::where('slug', 'manage_users')->first(); // Admin
        $marketpersonnel_permission = Permission::where('slug', 'create_po')->first(); // Market Personnel
        $projectmanager_permission = Permission::where('slug', 'create_budget')->first(); // Project Manager (PM)
        $hod_permission = Permission::where('slug', 'approve_budget')->first(); // Head of Department (HOD)
        $opd_permission = Permission::where('slug', 'view_budget')->first(); // Operation Director (OPD)
        $finance_permission = Permission::where('slug', 'send_budget')->first(); // Finance
        $ceo_permission = Permission::where('slug', 'comment_budget')->first(); // Chief Excecutive Officer (CEO)

        // RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'developer';
        $dev_role->name = 'Developer';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $admin_role=new Role();
    	$admin_role->slug = 'administrator';
    	$admin_role->name = 'Administrator';
    	$admin_role->save();
        $admin_role->permissions()->attach($admin_permission);

        $marketpersonnel_role=new Role();
    	$marketpersonnel_role->slug = 'market';
    	$marketpersonnel_role->name = 'Market Personnel';
    	$marketpersonnel_role->save();
        $marketpersonnel_role->permissions()->attach($marketpersonnel_permission);

        $projectmanager_role=new Role();
    	$projectmanager_role->slug = 'manager';
    	$projectmanager_role->name = 'Project Manager';
    	$projectmanager_role->save();
        $projectmanager_role->permissions()->attach($projectmanager_permission);

        $hod_role=new Role();
    	$hod_role->slug = 'hod';
    	$hod_role->name = 'Head of Department';
    	$hod_role->save();
        $hod_role->permissions()->attach($hod_permission);

        $opd_role=new Role();
    	$opd_role->slug = 'opd';
    	$opd_role->name = 'Operation Director';
    	$opd_role->save();
        $opd_role->permissions()->attach($opd_permission);

        $finance_role = new Role();
        $finance_role->slug = 'finance';
        $finance_role->name = 'Finance';
        $finance_role->save();
		$finance_role->permissions()->attach($finance_permission);

		$ceo_role=new Role();
    	$ceo_role->slug = 'ceo';
    	$ceo_role->name = 'Chief Executive Officer';
    	$ceo_role->save();
		$ceo_role->permissions()->attach($ceo_permission);

    }
}
