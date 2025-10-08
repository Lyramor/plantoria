<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plants = [
            [
                'name' => 'Monstera Deliciosa',
                'scientific_name' => 'Monstera deliciosa',
                'description' => 'Tanaman hias populer dengan daun berlubang yang unik. Sangat mudah perawatannya dan cocok untuk pemula.',
                'benefits' => 'Menyerap polutan udara, memberikan kesan tropis pada ruangan, dan mudah diperbanyak.',
                'category_id' => 1
            ],
            [
                'name' => 'Lidah Buaya',
                'scientific_name' => 'Aloe vera',
                'description' => 'Tanaman sukulen yang memiliki banyak manfaat untuk kesehatan dan kecantikan.',
                'benefits' => 'Menyembuhkan luka bakar, melembabkan kulit, antiinflamasi, dan meredakan iritasi kulit.',
                'category_id' => 2
            ],
            [
                'name' => 'Mangga',
                'scientific_name' => 'Mangifera indica',
                'description' => 'Pohon buah tropis yang menghasilkan buah manis dan berair dengan kandungan vitamin C tinggi.',
                'benefits' => 'Sumber vitamin C, antioksidan, serat, dan dapat meningkatkan sistem kekebalan tubuh.',
                'category_id' => 3
            ],
            [
                'name' => 'Bayam',
                'scientific_name' => 'Spinacia oleracea',
                'description' => 'Sayuran hijau yang kaya akan zat besi dan vitamin. Dapat tumbuh dengan cepat.',
                'benefits' => 'Tinggi zat besi, vitamin K, folat, dan antioksidan yang baik untuk kesehatan mata.',
                'category_id' => 4
            ],
            [
                'name' => 'Basil',
                'scientific_name' => 'Ocimum basilicum',
                'description' => 'Tanaman rempah aromatik yang sering digunakan dalam masakan Italia dan Asia.',
                'benefits' => 'Antioksidan, antibakteri, meredakan stress, dan memberikan aroma segar pada masakan.',
                'category_id' => 5
            ],
            [
                'name' => 'Sansevieria',
                'scientific_name' => 'Sansevieria trifasciata',
                'description' => 'Tanaman hias yang sangat tahan banting dan dapat hidup dalam kondisi cahaya rendah.',
                'benefits' => 'Menyaring udara 24 jam, menghasilkan oksigen di malam hari, dan sangat mudah perawatan.',
                'category_id' => 1
            ],
            [
                'name' => 'Jahe',
                'scientific_name' => 'Zingiber officinale',
                'description' => 'Tanaman rimpang yang memiliki rasa pedas dan hangat, sering digunakan sebagai obat tradisional.',
                'benefits' => 'Meredakan mual, antiinflamasi, meningkatkan pencernaan, dan menghangatkan tubuh.',
                'category_id' => 2
            ],
            [
                'name' => 'Tomat Cherry',
                'scientific_name' => 'Solanum lycopersicum var. cerasiforme',
                'description' => 'Varietas tomat berukuran kecil yang manis dan cocok untuk salad atau camilan.',
                'benefits' => 'Tinggi lycopene, vitamin C, antioksidan, dan baik untuk kesehatan jantung.',
                'category_id' => 4
            ]
        ];

        foreach ($plants as $plant) {
            Plant::create($plant);
        }
    }
}
