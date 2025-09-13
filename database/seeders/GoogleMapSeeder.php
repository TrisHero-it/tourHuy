<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GoogleMap;

class GoogleMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoogleMap::create([
            'name' => 'Sinh Travel Office',
            'address' => '123 Đường ABC, Quận XYZ, Hà Nội, Việt Nam',
            'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0!2d105.8542!3d21.0285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDAxJzQyLjYiTiAxMDXCsDUxJzE1LjEiRQ!5e0!3m2!1svi!2s!4v1234567890123!5m2!1svi!2s',
            'status' => 'active',
        ]);
    }
}
