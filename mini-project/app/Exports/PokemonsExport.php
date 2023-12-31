<?php

namespace App\Exports;

use App\Models\Pokemon;
use Maatwebsite\Excel\Concerns\FromCollection;

class PokemonsExport implements FromCollection
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pokemon::all();
    }
}
