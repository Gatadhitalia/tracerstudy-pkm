<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\PurchaseOrders;
use Illuminate\Support\Facades\Log;

class PurchaseOrdersService extends PurchaseOrders
{
    public static function recalculateTotalByDetail($purchase_order_detail_id)
    {
        $total = 0;
        try {
            $purchase_order_id = DB::table('purchase_order_details')->where('id', $purchase_order_detail_id)->value('purchase_order_id');
            $purchase_order = DB::table('purchase_orders')->where('id', $purchase_order_id)->first();

            $total = DB::table('purchase_order_details')->where('purchase_order_id', $purchase_order_id)->sum('total');
            $discount_type = $purchase_order->discount_type;
            $discount_value = $purchase_order->discount_value;

            if ($discount_type == 'Percentage') {
                $total = $total - ($total * $discount_value / 100);
            } else if ($discount_type == 'Cash') {
                $total = $total - $discount_value;
            }

            if ($purchase_order->ppn) {
                $total = $total + ($total * $purchase_order->ppn / 100);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        DB::table('purchase_orders')->where('id', $purchase_order_id)->update(['total' => $total]);
    }

    public static function recalculateTotal($id)
    {
        $price_total = 0;
        try {
            $purchase_order = DB::table('purchase_orders')->where('id', $id)->first();
            $total = (int) DB::table('purchase_order_details')->where('purchase_order_id', $id)->sum('total');
            $discount_type = $purchase_order->discount_type;
            $discount_value = $purchase_order->discount_value;
            if ($discount_type == 'Percentage') {
                $total = $total - ($total * $discount_value / 100);
            } else if ($discount_type == 'Cash') {
                $total = $total - $discount_value;
            }

            if ($purchase_order->ppn) {
                $total = $total + ($total * $purchase_order->ppn / 100);
            }

            $price_total = $total;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $price_total = 0;
        }

        DB::table('purchase_orders')->where('id', $id)->update(['total' => $price_total]);
    }
}
