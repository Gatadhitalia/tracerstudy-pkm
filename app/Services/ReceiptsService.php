<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\Receipts;

class ReceiptsService extends Receipts
{
    public static function saveData()
    {
        $date = g('date');
        $description = g('description');
        $ref_id = g('ref_id');
        $ref_table = g('ref_table');
        $items = g('items');

        $receipts_id = DB::table('receipts')->insertGetId([
            'date' => $date,
            'description' => $description,
            'ref_id' => $ref_id,
            'ref_table' => $ref_table,
            'items' => json_encode($items),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        foreach ($items as $item) {
            DB::table('receipt_products')->insert([
                'receipt_id' => $receipts_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
