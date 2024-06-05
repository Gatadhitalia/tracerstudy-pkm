<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\StockOpnames;

class StockOpnamesService extends StockOpnames
{
    public static function saveData(
        $companyId,
        $date,
        $description,
        $items
    ) {
        DB::beginTransaction();
        try {
            $stockOpnameId = DB::table('stock_opnames')->insertGetId([
                'company_id' => $companyId,
                'date' => $date,
                'description' => $description,
            ]);

            foreach ($items as $item) {
                DB::table('stock_opname_products')->insert([
                    'company_id' => $companyId,
                    'stock_opname_id' => $stockOpnameId,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'quantity_system' => $item['quantity_system'],
                    'quantity_difference' => $item['quantity_difference'],
                ]);
            }

            DB::table('stock_mutations')->insert([
                'company_id' => $companyId,
                'date' => $date,
                'ref_table' => 'stock_opnames',
                'ref_id' => $stockOpnameId,
                'ref_code' => 'OPNAME',
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'actual_quantity' => $item['quantity_system'],
                'flag' => $item['quantity_difference'] > 0 ? 'I' : 'O', // ['I', 'O']
                'is_valid' => true,
                'note' => $description,
                'created_at' => now(),
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
