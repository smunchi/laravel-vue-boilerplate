<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /** Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define Products Name
        $names = [
            'Pay Day / 1 Month',
            '1-3 Months',
            '2-6 Month Installment',
            '7-12 Months',
            '7-12 Month Installment',
            '25+ Month'
        ];

        foreach ($names as $key => $name) {
            // seed product
            $product = factory(\App\Models\Products\Product::class)
                ->create([ 'name' => $name]);

            //seed buckets associate with product
            $random = rand(2, 4);
            for ($start = 1; $start < $random; $start++) {
                $bucket = factory(\App\Models\Buckets\Bucket::class)->create([
                    'product_id' => $product->id,
                    'name' => 'bucket '.$start
                ]);
                $bucket->color()->save(factory(\App\Models\Media::class)->create([
                    'mediable_id' => $bucket->id,
                    'src' => \Faker\Factory::create()->randomElement(config('enums.bucket_color_links'))['src']
                ]));
            }
        }
    }
}
