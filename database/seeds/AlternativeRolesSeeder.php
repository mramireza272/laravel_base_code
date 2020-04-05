<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class AlternativeRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::updateOrCreate(['name' => 'index_home'],['description' => 'Pagina Principal']);

        Permission::updateOrCreate(['name' => 'index_log'],['description' => 'Ver Bitacora del Sistema']);
        Permission::updateOrCreate(['name' => 'create_permissions'],['description' => 'Crear Permisos']);
        Permission::updateOrCreate(['name' => 'delete_permissions'],['description' => 'Eliminar Permisos']);
        Permission::updateOrCreate(['name' => 'edit_permissions'],['description' => 'Editar Permisos']);
        Permission::updateOrCreate(['name' => 'index_permissions'],['description' => 'Ver Permisos']);
        Permission::updateOrCreate(['name' => 'show_permissions'],['description' => 'Detalle Permisos']);

        $role = Role::firstOrCreate(['name' => 'Administrador Project']);
        $role->syncPermissions(Permission::all());
        $role->revokePermissionTo('create_permissions');
        $role->revokePermissionTo('delete_permissions');
        $role->revokePermissionTo('edit_permissions');
        $role->revokePermissionTo('index_permissions');
        $role->revokePermissionTo('show_permissions');

        $user = User::findOrFail(2);
        $user->roles()->sync($role->id);

        $role = Role::findOrFail(1);
        $role->syncPermissions(Permission::all());

        $role = Role::firstOrCreate(['name' => 'Solo Lectura']);
		$role->givePermissionTo('index_user');
        $role->givePermissionTo('index_home');
    }
}
