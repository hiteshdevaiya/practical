<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data[] = ['brand_id' => '1', 'name' => 'G 50-70', 'price' => '99.99', 'stock' => '50'];
        $data[] = ['brand_id' => '1', 'name' => 'G 40-70', 'price' => '89.99', 'stock' => '80'];
        $data[] = ['brand_id' => '1', 'name' => 'G 50-80', 'price' => '59.99', 'stock' => '500'];
        $data[] = ['brand_id' => '2', 'name' => 'Inspiron 3540', 'price' => '134.99', 'stock' => '70'];
        $data[] = ['brand_id' => '2', 'name' => 'Inspiron 4152', 'price' => '122.99', 'stock' => '60'];
        $data[] = ['brand_id' => '2', 'name' => 'Inspiron 2202', 'price' => '67.99', 'stock' => '35'];
        $data[] = ['brand_id' => '3', 'name' => 'Victus 2253', 'price' => '55.99', 'stock' => '80'];
        $data[] = ['brand_id' => '3', 'name' => 'Victus 5448', 'price' => '64.99', 'stock' => '30'];
        $data[] = ['brand_id' => '3', 'name' => 'Victus 2789', 'price' => '222.99', 'stock' => '60'];

        foreach($data as $one){
            Product::updateOrCreate(
                ['name' => $one['name']],
                $one
            );
        }
    }
}
