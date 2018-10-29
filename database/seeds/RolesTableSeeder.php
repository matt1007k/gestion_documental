<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Acceso a todos los módulos del sistema',
            'special' => 'all-access',
        ]);

        Role::create([
            'name' => 'Suspendido',
            'slug' => 'suspendido',
            'description' => 'Sin acceso a los módulos del sistema',
            'special' => 'no-access',
        ]);

        Role::create([
            'name' => 'Jefe',
            'description' => 'Acceso a los módulos de documento, oficina, usuarios del sistemas',
            'slug' => 'jefe',
        ]);

        Role::create([
            'name' => 'Personal',
            'description' => 'Acceso a los módulos de documentos del sistemas',
            'slug' => 'personal',
        ]);
    }
}
