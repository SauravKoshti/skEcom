<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class CategoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $return = new Category([
            'name'     => $row['name'],
            'parent_id' => $row['parent_id'],
            'status' => $row['status'],
        ]);
        return $return;
    }
}
