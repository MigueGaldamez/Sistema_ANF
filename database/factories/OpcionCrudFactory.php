<?php

namespace Database\Factories;

use App\Models\OpcionCrud;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpcionCrudFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OpcionCrud::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            OpcionCrud::create([
                'idOpcion'=>1,
                'opcion'=>'Subir Catalogo de cuentas'
            ]),
            OpcionCrud::create([
                'idOpcion'=>2,
                'opcion'=>'Subir Estados Financieros'
            ]),
            OpcionCrud::create([
                'idOpcion'=>3,
                'opcion'=>'Ver Estados Financieros'
            ]),

            OpcionCrud::create([
                'idOpcion'=>4,
                'opcion'=>'Calcular Ratios'
            ]),
            OpcionCrud::create([
                'idOpcion'=>5,
                'opcion'=>'Ver Ratios'
            ]),
            OpcionCrud::create([
                'idOpcion'=>6,
                'opcion'=>'Comparar Ratios'
            ]),
            OpcionCrud::create([
                'idOpcion'=>7,
                'opcion'=>'Catalogo Tipos Empresa'
            ]),
            OpcionCrud::create([
                'idOpcion'=>8,
                'opcion'=>'Catalogo Empresas'
            ]),
            OpcionCrud::create([
                'idOpcion'=>9,
                'opcion'=>'Catalogo Ratios'
            ]),
            OpcionCrud::create([
                'idOpcion'=>10,
                'opcion'=>'Analisis Vertical y Horizontal'
            ]),
            OpcionCrud::create([
                'idOpcion'=>11,
                'opcion'=>'Variacion de Cuentas'
            ]),
            OpcionCrud::create([
                'idOpcion'=>12,
                'opcion'=>'Ver Permisos'
            ]),
           
        ];
    }
}
