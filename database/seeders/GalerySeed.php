<?php

namespace Database\Seeders;

use App\Models\Galery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GalerySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'user_id' => '1',
                'id_unik' => '2131233',
                'name' => 'yayaya',
                'description' => 'ini adalah foto kewfgasdifgsfgsdjfgsdfkgdf  sufsdfuisdd sduofhsdffuisd dsuds igsdgsduisdgfsdiguifgis',
                'image' => 'images/premium_photo-1668130718429-7abf7b186f2f.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '1',
                'id_unik' => '9345743',
                'name' => 'yayaya',
                'description' => 'ini adalah foto',
                'image' => 'images/Screenshot 2025-01-18 191242.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '1',
                'id_unik' => '3429857',
                'name' => 'yayaya',
                'description' => 'ini adalah foto',
                'image' => 'images/Screenshot 2025-01-24 194548.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '1',
                'id_unik' => '5378356',
                'name' => 'yayaya',
                'description' => 'ini adalah foto',
                'image' => 'images/Screenshot 2025-01-19 121155.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '1',
                'id_unik' => '238947',
                'name' => 'yayaya',
                'description' => 'ini adalah foto',
                'image' => 'images/premium_photo-1668130718429-7abf7b186f2f.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '1',
                'id_unik' => '934825',
                'name' => 'yayaya',
                'description' => 'ini adalah foto',
                'image' => 'images/download.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '1',
                'id_unik' => '324895295',
                'name' => 'yayaya',
                'description' => 'ini adalah foto',
                'image' => 'images/premium_photo-1668130718429-7abf7b186f2f.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '1',
                'id_unik' => '3982563',
                'name' => 'yayaya',
                'description' => 'ini adalah foto',
                'image' => 'images/Screenshot 2025-01-18 191242.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('galeries')->insert($images);
    }
}
