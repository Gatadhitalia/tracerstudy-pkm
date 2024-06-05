<?php

namespace App\Repositories;

use App\Models\ReceiptsModel;
use Illuminate\Support\Facades\DB;

class Receipts extends ReceiptsModel
{
    public static function findAllPurchaseOrderByRefId($id)
    {
        return DB::table('receipts')
            ->where('receipts.ref_id', g('parent_id'))
            ->where('receipts.ref_table', 'purchase_orders')
            ->select('receipts.*')
            ->get()
            ->map(function ($item) {
                $item->items =  DB::select("
                    select
                        products.name as name,
                        receipt_products.quantity as quantity
                    from receipt_products
                    join products on products.id = receipt_products.product_id
                    where true
                        and receipt_products.receipt_id = $item->id
                ");
                return $item;
            });
    }
}
