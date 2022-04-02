<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportsProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'ProductName' => $row[0],
            'ProductPrice' => $row[1],
            'ProductImage' => $row[2],
            'ProductCount' => $row[3],
            'Size' => $row[4],
            'Type' => $row[5],
            'Brand' => $row[6],
            'Sale' => $row[7],
            'Note' => $row[8],
            'ProductCreatedDate' => $row[9],
            'Status' => $row[10],
            'DefaultPrice' => $row[11],
            'Action' => $row[12],
           
        ]);
    }
}