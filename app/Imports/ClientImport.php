<?php

namespace App\Imports;

use App\Models\tb_m_client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tb_m_client([
            'client_name' => $row['client_name'],
            'client_address' => $row['client_address'], 
        ]);
    }
}
