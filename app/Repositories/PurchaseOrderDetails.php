<?php

namespace App\Repositories;

use App\Models\PurchaseOrderDetailsModel;
use Illuminate\Support\Facades\DB;

class PurchaseOrderDetails extends PurchaseOrderDetailsModel
{
    public static function findAllByParentIdAndPaginate($parentId)
    {
        return DB::table('purchase_order_details')
            ->join('products', 'products.id', '=', 'purchase_order_details.product_id')
            ->select('purchase_order_details.*', 'products.name as product_name')
            ->where('purchase_order_id', $parentId)
            ->paginate(10);
    }

    public static function findAllProductByParentId($parentId)
    {
        return DB::table('purchase_order_details')
            ->join('products', 'products.id', '=', 'purchase_order_details.product_id')
            ->select('products.id', 'products.name')
            ->where('purchase_order_id', g('parent_id'))
            ->get();
    }
}
