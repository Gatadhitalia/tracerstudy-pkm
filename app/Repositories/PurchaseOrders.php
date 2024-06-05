<?php

namespace App\Repositories;

use App\Models\PurchaseOrdersModel;
use Illuminate\Support\Facades\DB;

class PurchaseOrders extends PurchaseOrdersModel
{
    public static function sumTotalBeforeDiscountById($id)
    {
        return DB::table('purchase_order_details')->where('purchase_order_id', $id)->sum('total');
    }

    public static function sumTotalAfterDiscountById($id)
    {
        $total = self::sumTotalBeforeDiscountById($id);

        $purchase_order = DB::table('purchase_orders')->where('id', $id)->first();
        $discount_type = $purchase_order->discount_type;
        $discount_value = $purchase_order->discount_value;

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

        $purchase_order = DB::table('purchase_orders')->where('id', $id)->first();
        $ppn = $purchase_order->ppn;

        return $ppn ? round($total * $ppn / 100) : 0;
    }

    public static function calculateDiscountById($id)
    {
        $total = self::sumTotalBeforeDiscountById($id);

        $purchase_order = DB::table('purchase_orders')->where('id', $id)->first();
        $discount_type = $purchase_order->discount_type;
        $discount_value = $purchase_order->discount_value;

        if ($discount_type == 'Percentage') {
            return round($total * $discount_value / 100);
        } else if ($discount_type == 'Cash') {
            return $discount_value;
        } else {
            return 0;
        }
    }
}
