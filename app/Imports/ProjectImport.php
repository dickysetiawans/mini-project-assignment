<?php

namespace App\Imports;

use App\Models\Tb_m_project;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tb_m_project([
            'project_name' => $row['project_name'],
            'client_id' => $row['client_id'], 
            'project_start' => $row['project_start'],
            'project_end' => $row['project_end'], 
            'project_status' => $row['project_status'], 
        ]);
    }
}
