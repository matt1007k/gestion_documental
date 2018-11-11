<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    public function run()
    {

        //permisos
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de rol',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de rol',
            'slug'          => 'roles.edit',
            'description'   => 'Editar los datos de cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar un rol',
            'slug'          => 'roles.destroy',
            'description'   => 'Eliminar los datos de cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Registrar un rol',
            'slug'          => 'roles.create',
            'description'   => 'Registrar un rol del sistema',
        ]);



        //users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Editar los datos de cualquier usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar una usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Eliminar los datos de cualquier usuario del sistema',
        ]);


        //offices
        Permission::create([
            'name'          => 'Navegar oficinas',
            'slug'          => 'offices.index',
            'description'   => 'Lista y navega todos los oficinas del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de oficina',
            'slug'          => 'offices.show',
            'description'   => 'Ver en detalle cada oficina del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de oficinas',
            'slug'          => 'offices.edit',
            'description'   => 'Editar los datos de cualquier oficina del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar una oficina',
            'slug'          => 'offices.destroy',
            'description'   => 'Eliminar los datos de cualquier oficina del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear una oficina',
            'slug'          => 'offices.create',
            'description'   => 'Crear una oficina en el sistema',
        ]);

        //type_document
        Permission::create([
            'name'          => 'Navegar tipo documentos',
            'slug'          => 'types.index',
            'description'   => 'Lista y navega todos los tipo documentos del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de tipo documento',
            'slug'          => 'types.show',
            'description'   => 'Ver en detalle cada tipo documento del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de tipo documentos',
            'slug'          => 'types.edit',
            'description'   => 'Editar los datos de cualquier tipo documento del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar una tipo documento',
            'slug'          => 'types.destroy',
            'description'   => 'Eliminar los datos de cualquier tipo documento del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear una tipo documento',
            'slug'          => 'types.create',
            'description'   => 'Crear una tipo documento en el sistema',
        ]);

        //documents
        Permission::create([
            'name'          => 'Navegar documentos',
            'slug'          => 'documents.index',
            'description'   => 'Lista y navega todos los documentos del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de documento',
            'slug'          => 'documents.show',
            'description'   => 'Ver en detalle cada documento del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de documentos',
            'slug'          => 'documents.edit',
            'description'   => 'Editar los datos de cualquier documento del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar una documento',
            'slug'          => 'documents.destroy',
            'description'   => 'Eliminar los datos de cualquier documento del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear una documento',
            'slug'          => 'documents.create',
            'description'   => 'Crear una documento en el sistema',
        ]);


        Permission::create([
            'name'          => 'Elaborar una documento',
            'slug'          => 'documents.elaborar',
            'description'   => 'Elaborar una documento en el sistema',
        ]);
        Permission::create([
            'name'          => 'Asignar una documento',
            'slug'          => 'documents.asignar',
            'description'   => 'Asignar una documento en el sistema',
        ]);
        Permission::create([
            'name'          => 'Documentos asignados',
            'slug'          => 'documents.asignados',
            'description'   => 'Ver los documentos asignados en el sistema',
        ]);
        Permission::create([
            'name'          => 'Atender un documento',
            'slug'          => 'documents.atender',
            'description'   => 'Atender una documento en el sistema',
        ]);
        Permission::create([
            'name'          => 'Enviar una documento',
            'slug'          => 'documents.enviar',
            'description'   => 'Enviar una documento en el sistema',
        ]);
        Permission::create([
            'name'          => 'Documentos enviados',
            'slug'          => 'documents.enviados',
            'description'   => 'Ver los documentos enviados en el sistema',
        ]);




    }
}
