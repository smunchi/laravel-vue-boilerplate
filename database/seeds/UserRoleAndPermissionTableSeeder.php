<?php

use Illuminate\Database\Seeder;

class UserRoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->generateRolebasePermissions();
    }

    public function generateRolebasePermissions()
    {
        foreach (config('acl.roles') as $role) {
            $getRole = \Spatie\Permission\Models\Role::where('name', $role)->first();
            $sl = 0;
            $formatRoles = [];
            foreach (config('acl.permissions') as $permission => $roles) {
                if (in_array($role, $roles)) {
                    $formatRoles[$sl++] = $permission;
                }
            }
            $getRole->syncPermissions($formatRoles);
        }
    }
}
