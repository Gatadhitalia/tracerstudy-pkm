<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\SalesOrders;
use Illuminate\Support\Facades\Log;

class SalesOrdersService extends SalesOrders
{
    public static function recalculateTotalByDetail($sales_order_detail_id)
    {
        $total = 0;
        try {
            $sales_order_id = DB::table('sales_order_details')->where('id', $sales_order_detail_id)->value('sales_order_id');
            $sales_order = DB::table('sales_orders')->where('id', $sales_order_id)->first();

            $total = DB::table('sales_order_details')->where('sales_order_id', $sales_order_id)->sum('total');
            $discount_type = $sales_order->discount_type;
            $discount_value = $sales_order->discount_value;

            if ($discount_type == 'Percentage') {
                $total = $total - ($total * $discount_value / 100);
            } else if ($discount_type == 'Cash') {
                $total = $total - $discount_value;
            }

            if ($sales_order->ppn) {
                $total = $total + ($total * $sales_order->ppn / 100);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        DB::table('sales_orders')->where('id', $sales_order_id)->update(['total' => $total]);
    }

    public static function recalculateTotal($id)
    {
        $price_total = 0;
        try {
            $sales_order = DB::table('sales_orders')->where('id', $id)->first();
            $total = (int) DB::table('sales_order_details')->where('sales_order_id', $id)->sum('total');
            $discount_type = $sales_order->discount_type;
            $discount_value = $sales_order->discount_value;
            if ($discount_type == 'Percentage') {
                $total = $total - ($total * $discount_value / 100);
            } else if ($discount_type == 'Cash') {
                $total = $total - $discount_value;
            }

            if ($sales_order->ppn) {
                $total = $total + ($total * $sales_order->ppn / 100);
            }

            $price_total = $total;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $price_total = 0;
        }

        DB::table('sales_orders')->where('id', $id)->update(['total' => $price_total]);
    }
}
