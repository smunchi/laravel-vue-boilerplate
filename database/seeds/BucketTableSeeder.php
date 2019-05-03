<?php

use App\Models\Buckets\Bucket;
use Illuminate\Database\Seeder;
use App\Models\Users\Lender;

class BucketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lenders = Lender::with('products')->get();
        
        $lenders->each(function ($lender) {
            $lender->products->each(function ($product) use ($lender) {
                $parents = $product->buckets()->parent()->get();
                $selectedParentIds = $parents->random(rand(1, $parents->count()))->pluck('id');
                foreach ($selectedParentIds as $parentId) {
                    $bucket = factory(\App\Models\Buckets\Bucket::class)->create([
                        'user_id' => $lender->user_id,
                        'product_id' => $product->id,
                        'parent_id' => $parentId,
                        'name' => 'child bucket of '. $parentId
                    ]);
                    $bucket->color()->save(factory(\App\Models\Media::class)->create([
                        'mediable_id' => $bucket->id,
                        'src' => \Faker\Factory::create()->randomElement(config('enums.bucket_color_links'))['src']
                    ]));
                }
            });
        });
    }
}
