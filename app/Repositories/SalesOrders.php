<?php

namespace App\Repositories;

use App\Models\SalesOrdersModel;
use Illuminate\Support\Facades\DB;

class SalesOrders extends SalesOrdersModel
{
    public static function findById($id)
    {
        return DB::table('sales_orders')->where('id', $id)->first();
    }

    public static function sumTotalBeforeDiscountById($id)
    {
        return DB::table('sales_order_details')->where('sales_order_id', $id)->sum('total');
    }

    public static function sumTotalAfterDiscountById($id)
    {
        $total = self::sumTotalBeforeDiscountById($id);

        $sales_order = DB::table('sales_orders')->where('id', $id)->first();
        $discount_type = $sales_order->discount_type;
        $discount_value = $sales_order->discount_value;

        if ($discount_type == 'Percentage') {
            $total = $total - ($total * $discount_value / 100);
        } else if ($discount_type == 'Cash') {
            $total = $total - $discount_value;
        }

        return $total;
    }

    public static function calculatePpnById($id)
    {
        $total = self::sumTotalBeforeDiscountById($id);

        $sales_order = DB::table('sales_orders')->where('id', $id)->first();
        $ppn = $sales_order->ppn;

        return $ppn ? round($total * $ppn / 100) : 0;
    }

    public static function calculateDiscountById($id)
    {
        $total = self::sumTotalBeforeDiscountById($id);

        $sales_order = DB::table('sales_orders')->where('id', $id)->first();
        $discount_type = $sales_order->discount_type;
        $discount_value = $sales_order->discount_value;

        if ($discount_type == 'Percentage') {
            return round($total * $discount_value / 100);
        } else if ($discount_type == 'Cash') {
            return $discount_value;
        } else {
            return 0;
        }
    }
}
