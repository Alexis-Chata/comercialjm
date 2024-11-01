<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ProductosImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $dataProducto = [
            'id' => $row['id'],
            'name' => $row['name'],
            'referencia_interna' => $row['referencia_interna'] ?? 'SN',
            'codigo_barra' => $row['codigo_barra'] ?? 'SN',
            'precio_caja' => $row['precio_caja'] ?? 0,
            'precio_display' => $row['precio_display'] ?? 0,
            'precio_unidad' => $row['precio_unidad'] ?? 0,
            'cantidad_en_caja' => $row['cantidad_en_caja'] ?? 0,
        ];
        return new Producto($dataProducto);
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function uniqueBy()
    {
        return ['id'];
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
