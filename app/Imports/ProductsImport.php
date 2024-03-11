<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $return = new Product([
        'name' => $row['name'],
        'description' => $row['description'],
        'category_id' => $row['category_id'],
        'price' => $row['price'],
        'stock' => $row['stock'],
        'images' => $row['images'],
        ]);
        return $return;
    }
}
