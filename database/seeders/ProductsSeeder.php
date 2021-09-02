<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        //創建 30 个产品
        $products = Product::factory()->count(30)->create();

        foreach ($products as $product) {
            // 每个产品创建 3 个 SKU ，并且每个 SKU 的 `product_id` 字段都设为当前循环的产品 id
            $skus = ProductSku::factory()->count(3)->create(['product_id' => $product->id]);

            // 找出价格最低的SKU 价格，作为该商品的价格
            $product->update(['price' => $skus->min('price')]);
        }
    }
}
