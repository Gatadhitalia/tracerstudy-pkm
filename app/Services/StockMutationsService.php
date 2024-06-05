<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\StockMutations;
use crocodicstudio\crudbooster\helpers\CB;

class StockMutationsService extends StockMutations
{
    public static function sales($sales_order_detail_id): void
    {
        $child = DB::table('sales_order_details')
            ->where('id', $sales_order_detail_id)
            ->first();

        $parent = DB::table('sales_orders')
            ->where('id', $child->sales_order_id)
            ->first();

        $ref_table = 'sales_orders';
        $ref_id = $parent->id;
        $ref_code = $parent->so_number;
        $ref_child_table = 'sales_order_details';
        $ref_child_id = $child->id;
        $product_id = $child->product_id;
        $flag = 'O';
        $quantity = $child->quantity;

        $is_exists = DB::table('stock_mutations')
            ->where([
                'ref_table' => $ref_table,
                'ref_id' => $ref_id,
                'product_id' => $product_id,
                'flag' => $flag,
            ])
            ->exists();

        if ($is_exists) {
            DB::table('stock_mutations')
                ->where([
                    'ref_table' => $ref_table,
                    'ref_id' => $ref_id,
                    'product_id' => $product_id,
                    'flag' => $flag,
                ])
                ->update([
                    'is_valid' => false,
                    'note' => 'Replace with new mutation by ' . CB::myName(),
                ]);
        }

        $data = [
            'date' => now(),
            'ref_table' => $ref_table,
            'ref_id' => $ref_id,
            'ref_code' => $ref_code,
            'ref_child_table' => $ref_child_table,
            'ref_child_id' => $ref_child_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'flag' => $flag,
            'is_valid' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'note' => 'Created by ' . CB::myName(),
        ];

        $last_mutation = DB::table('stock_mutations')
            ->where([
                'product_id' => $product_id,
                'is_valid' => true,
            ])
            ->orderBy('id', 'desc')
            ->first();

        $data['actual_quantity'] = $last_mutation
            ? ($flag == 'I' ? $last_mutation->actual_quantity + $quantity : $last_mutation->actual_quantity - $quantity)
            : $quantity;

        DB::table('stock_mutations')->insert($data);
    }

    public static function purchase($purchase_order_detail_id): void
    {
        $child = DB::table('purchase_order_details')
            ->where('id', $purchase_order_detail_id)
            ->first();

        $parent = DB::table('purchase_orders')
            ->where('id', $child->purchase_order_id)
            ->first();

        $ref_table = 'purchase_orders';
        $ref_id = $parent->id;
        $ref_code = $parent->po_number;
        $ref_child_table = 'purchase_order_details';
        $ref_child_id = $child->id;
        $product_id = $child->product_id;
        $flag = 'O';
        $quantity = $child->quantity;

        $is_exists = DB::table('stock_mutations')
            ->where([
                'ref_table' => $ref_table,
                'ref_id' => $ref_id,
                'product_id' => $product_id,
                'flag' => $flag,
            ])
            ->exists();

        if ($is_exists) {
            DB::table('stock_mutations')
                ->where([
                    'ref_table' => $ref_table,
                    'ref_id' => $ref_id,
                    'product_id' => $product_id,
                    'flag' => $flag,
                ])
                ->update([
                    'is_valid' => false,
                    'note' => 'Replace with new mutation by ' . CB::myName(),
                ]);
        }

        $data = [
            'date' => now(),
            'ref_table' => $ref_table,
            'ref_id' => $ref_id,
            'ref_code' => $ref_code,
            'ref_child_table' => $ref_child_table,
            'ref_child_id' => $ref_child_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'flag' => $flag,
            'is_valid' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'note' => 'Created by ' . CB::myName(),
        ];

        $last_mutation = DB::table('stock_mutations')
            ->where([
                'product_id' => $product_id,
                'is_valid' => true,
            ])
            ->orderBy('id', 'desc')
            ->first();

        $data['actual_quantity'] = $last_mutation
            ? ($flag == 'I' ? $last_mutation->actual_quantity + $quantity : $last_mutation->actual_quantity - $quantity)
            : $quantity;

        DB::table('stock_mutations')->insert($data);
    }

    public static function setInvalidSales($sales_order_detail_id)
    {
        $detail = DB::table('sales_order_details')
            ->where('id', $sales_order_detail_id)
            ->first();

        $ref_table = 'sales_orders';
        $ref_id = $detail->sales_order_id;
        $product_id = $detail->product_id;

        DB::table('stock_mutations')
            ->where(compact('ref_table', 'ref_id', 'product_id'))
            ->update([
                'is_valid' => false,
                'updated_at' => now(),
                'note' => 'Deleted by ' . CB::myName(),
            ]);
    }

    public static function setInvalidPurchase($purchase_order_detail_id)
    {
        $detail = DB::table('purchase_order_details')
            ->where('id', $purchase_order_detail_id)
            ->first();

        $ref_table = 'purchase_orders';
        $ref_id = $detail->purchase_order_id;
        $product_id = $detail->product_id;

        DB::table('stock_mutations')
            ->where(compact('ref_table', 'ref_id', 'product_id'))
            ->update([
                'is_valid' => false,
                'updated_at' => now(),
                'note' => 'Deleted by ' . CB::myName(),
            ]);
    }
}
