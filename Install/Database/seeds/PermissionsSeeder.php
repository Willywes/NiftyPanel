<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [];
        ////////////////////////////////////////
        ///  test
        ///////////////////////////////////////
        $permissions[] = [
            'name' => 'intranet.config.tests.index',
            'public_group' => 'Test',
            'public_name' => 'Listar test',
            'public_description' => 'Permite ver la lista de test.'
        ];

        $permissions[] = [
            'name' => 'intranet.config.tests.create',
            'public_group' => 'Test',
            'public_name' => 'Crear test',
            'public_description' => 'Permite crear test.'
        ];

        $permissions[] = [
            'name' => 'intranet.config.tests.edit',
            'public_group' => 'Test',
            'public_name' => 'Editar test',
            'public_description' => 'Permite editar test.'
        ];

        $permissions[] = [
            'name' => 'intranet.config.tests.show',
            'public_group' => 'Test',
            'public_name' => 'Ver test',
            'public_description' => 'Permite ver detalles de test.'
        ];

        $permissions[] = [
            'name' => 'intranet.config.tests.destroy',
            'public_group' => 'Test',
            'public_name' => 'Eliminar test',
            'public_description' => 'Permite eliminar de test.'
        ];

        $permissions[] = [
            'name' => 'intranet.config.tests.active',
            'public_group' => 'Test',
            'public_name' => 'Activar/Desactivar test',
            'public_description' => 'Permite activar y desactivar test.'
        ];



    }
}
