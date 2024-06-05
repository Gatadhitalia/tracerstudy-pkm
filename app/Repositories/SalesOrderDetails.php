<?php

namespace App\Repositories;

use App\Models\SalesOrderDetailsModel;
use Illuminate\Support\Facades\DB;

class SalesOrderDetails extends SalesOrderDetailsModel
{
    public static function findAllBySalesOrderIdAndPaginate($sales_order_id)
    {
        return DB::table('sales_order_details')
            ->join('products', 'products.id', '=', 'sales_order_details.product_id')
            ->select('sales_order_details.*', 'products.name as product_name')
            ->where('sales_order_id', $sales_order_id)
            ->paginate(10);
    }

    public static function findAllProductBySalesOrderId($sales_order_id)
    {
        return DB::table('sales_order_details')
            ->join('products', 'products.id', '=', 'sales_order_details.product_id')
            ->select('products.id', 'products.name')
            ->where('sales_order_id', $sales_order_id)
            ->get();
    }
}
