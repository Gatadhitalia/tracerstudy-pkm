<?php

namespace App\Repositories;

use App\Models\ShipmentsModel;
use Illuminate\Support\Facades\DB;

class Shipments extends ShipmentsModel
{
    public static function findAllSalesOrderByRefId($id)
    {
        return DB::table('shipments')
            ->where('shipments.ref_id', $id)
            ->where('shipments.ref_table', 'sales_orders')
            ->select('shipments.*')
            ->get()
            ->map(function ($item) {
                $item->items = DB::select("
                    select
                        products.name as name,
                        shipment_products.quantity as quantity
                    from shipment_products
                    join products on products.id = shipment_products.product_id
                    where true
                        and shipment_products.shipment_id = $item->id
                ");
                return $item;
            });
    }
}
