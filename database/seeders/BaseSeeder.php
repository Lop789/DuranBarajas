<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BaseSeeder extends Seeder
{
    public function run(): void
    {
        // CATEGORIAS
        $transporte = DB::table('categorias')->insertGetId([
            'nombre' => 'Transporte',
            'descripcion' => 'Actividades relacionadas con los medios de transporte.',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $energia = DB::table('categorias')->insertGetId([
            'nombre' => 'Energia',
            'descripcion' => 'Actividades relacionadas con el consumo de energia.',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $alimentacion = DB::table('categorias')->insertGetId([
            'nombre' => 'Alimentacion',
            'descripcion' => 'Actividades relacionadas con el consumo de alimentos.',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // USUARIOS
        $juan = DB::table('usuarios')->insertGetId([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'correo' => 'juan@ejemplo.com',
            'telefono' => '3312345678',
            'contrasena' => Hash::make('12345678'),
            'direccion' => 'Guadalajara',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $maria = DB::table('usuarios')->insertGetId([
            'nombre' => 'Maria',
            'apellido' => 'Lopez',
            'correo' => 'maria@ejemplo.com',
            'telefono' => '3398765432',
            'contrasena' => Hash::make('12345678'),
            'direccion' => 'Zapopan',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // ADMINISTRADORES
        DB::table('administradores')->insert([
            [
                'nombre' => 'Administrador',
                'apellido' => 'Principal',
                'correo' => 'admin@huella.com',
                'usuario' => 'admin',
                'contrasena' => Hash::make('12345678'),
                'rol' => 'superadmin',
                'imagen' => null,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Ramirez',
                'correo' => 'carlos@huella.com',
                'usuario' => 'capturista',
                'contrasena' => Hash::make('12345678'),
                'rol' => 'capturista',
                'imagen' => null,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        // ACTIVIDADES
        $automovil = DB::table('actividades')->insertGetId([
            'categoria_id' => $transporte,
            'nombre' => 'Uso de automovil',
            'descripcion' => 'Distancia recorrida utilizando un automovil.',
            'unidad' => 'kilometros',
            'factor_emision' => 0.2100,
            'tipo' => 'Transporte',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $autobus = DB::table('actividades')->insertGetId([
            'categoria_id' => $transporte,
            'nombre' => 'Uso de autobus',
            'descripcion' => 'Distancia recorrida utilizando autobus.',
            'unidad' => 'kilometros',
            'factor_emision' => 0.0890,
            'tipo' => 'Transporte',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $electricidad = DB::table('actividades')->insertGetId([
            'categoria_id' => $energia,
            'nombre' => 'Consumo electrico',
            'descripcion' => 'Consumo de energia electrica.',
            'unidad' => 'kWh',
            'factor_emision' => 0.4300,
            'tipo' => 'Energia',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $carne = DB::table('actividades')->insertGetId([
            'categoria_id' => $alimentacion,
            'nombre' => 'Consumo de carne',
            'descripcion' => 'Consumo de productos derivados de carne.',
            'unidad' => 'kilogramos',
            'factor_emision' => 27.0000,
            'tipo' => 'Alimentacion',
            'imagen' => null,
            'estado' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // REGISTROS DE HUELLA
        DB::table('registro_huellas')->insert([
            [
                'usuario_id' => $juan,
                'actividad_id' => $automovil,
                'cantidad' => 25,
                'unidad' => 'kilometros',
                'impacto_calculado' => 5.25,
                'fecha' => now()->toDateString(),
                'observaciones' => 'Recorrido diario.',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => $maria,
                'actividad_id' => $electricidad,
                'cantidad' => 120,
                'unidad' => 'kWh',
                'impacto_calculado' => 51.60,
                'fecha' => now()->toDateString(),
                'observaciones' => 'Consumo mensual.',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}