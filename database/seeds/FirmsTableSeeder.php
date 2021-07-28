<?php

use App\Firm;
use Illuminate\Database\Seeder;

class FirmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firmNames = ['Nike', 'Puma', 'Adidas', 'Timberland', 'Diesel'];
        $firmPIva = [32038960699, 57425610938, 40568170241, 72680490504, 18491830073];
        for ($i = 0; $i < 5; $i++) { 
            $newFirm = new Firm;
            $newFirm->name = $firmNames[$i];
            $newFirm->partita_iva = $firmPIva[$i];
            $newFirm->save();
        }
    }
}
