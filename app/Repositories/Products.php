<?php

namespace App\Repositories;

use App\Models\ProductsModel;
use Illuminate\Support\Facades\DB;

class Products extends ProductsModel
{
    public static function findAllWithStockByCompanyIdAndName($companyId = null, $name = null)
    {
        return DB::table('products')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->select('products.id', 'products.name', 'units.name as unit_name')
            ->selectSub(function ($query) use ($companyId) {
                $query->selectRaw('COALESCE(stock_mutations.quantity, 0)')
                    ->from('stock_mutations')
                    ->whereColumn('stock_mutations.product_id', 'products.id')
                    ->when($companyId, function ($query, $companyId) {
                        $query->where('stock_mutations.company_id', $companyId);
                    })
                    ->where('stock_mutations.is_valid', 1)
                    ->orderByDesc('stock_mutations.id')
                    ->limit(1);
            }, 'quantity')
            ->when($name, function ($query, $name) {
                $query->where('products.name', 'like', "%$name%");
            })
            ->limit(20)
            ->get();
    }

    public static function findWithStockByCompanyIdAndId($companyId = null, $id = null)
    {
        return DB::table('products')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->select('id', 'name', 'units.name as unit_name')
            ->selectSub(function ($query) use ($companyId) {
                $query->selectRaw('COALESCE(stock_mutations.quantity, 0)')
                    ->from('stock_mutations')
                    ->whereColumn('stock_mutations.product_id', 'products.id')
                    ->when($companyId, function ($query, $companyId) {
                        $query->where('stock_mutations.company_id', $companyId);
                    })
                    ->where('stock_mutations.is_valid', 1)
                    ->orderByDesc('stock_mutations.id')
                    ->limit(1);
            }, 'quantity')
            ->where('id', $id)
            ->first();
    }
}
