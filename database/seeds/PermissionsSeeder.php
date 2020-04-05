<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Permission::updateOrCreate(['name' => 'create_user'],['description' => 'Crear Usuarios']);
    	Permission::updateOrCreate(['name' => 'delete_user'],['description' => 'Eliminar Usuarios']);
    	Permission::updateOrCreate(['name' => 'edit_user'],['description' => 'Editar Usuarios']);
    	Permission::updateOrCreate(['name' => 'index_user'],['description' => 'Ver Usuarios']);

        Permission::updateOrCreate(['name' => 'create_roles'],['description' => 'Crear Roles']);
        Permission::updateOrCreate(['name' => 'delete_roles'],['description' => 'Eliminar Roles']);
        Permission::updateOrCreate(['name' => 'edit_roles'],['description' => 'Editar Roles']);
        Permission::updateOrCreate(['name' => 'index_roles'],['description' => 'Ver Roles']);
        Permission::updateOrCreate(['name' => 'show_roles'],['description' => 'Detalle Roles']);

        Permission::updateOrCreate(['name' => 'validate_report'],['description' => 'Validar Reportes']);

        Permission::updateOrCreate(['name' => 'create_patient'],['description' => 'Crear Paciente']);
        Permission::updateOrCreate(['name' => 'index_patient'],['description' => 'Ver Pacientes']);
        Permission::updateOrCreate(['name' => 'edit_patient'],['description' => 'Editar Pacientes']);
        Permission::updateOrCreate(['name' => 'show_patient'],['description' => 'Detalle Pacientes']);
        Permission::updateOrCreate(['name' => 'delete_patient'],['description' => 'Eliminar Pacientes']);

        $role = Role::firstOrCreate(['name' => 'Administrador']);
        $role->syncPermissions(Permission::all());

        $user = User::findOrFail(1);
        $user->roles()->sync($role->id);
    }
}
