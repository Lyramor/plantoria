<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tanaman Hias',
                'description' => 'Tanaman yang digunakan untuk memperindah rumah dan taman'
            ],
            [
                'name' => 'Tanaman Herbal',
                'description' => 'Tanaman yang memiliki khasiat obat dan dapat digunakan untuk pengobatan tradisional'
            ],
            [
                'name' => 'Tanaman Buah',
                'description' => 'Tanaman yang menghasilkan buah yang dapat dikonsumsi'
            ],
            [
                'name' => 'Tanaman Sayuran',
                'description' => 'Tanaman yang menghasilkan sayuran untuk konsumsi sehari-hari'
            ],
            [
                'name' => 'Tanaman Rempah',
                'description' => 'Tanaman yang digunakan sebagai bumbu masakan dan rempah-rempah'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
