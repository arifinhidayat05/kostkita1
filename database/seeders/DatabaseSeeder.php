<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Pastikan tabel pemilik sudah ada data
        $pemilikIds = DB::table('pemilik')->pluck('id')->toArray();
        if (empty($pemilikIds)) {
            DB::table('pemilik')->insert([
                'nama' => 'Pemilik Kost',
                'email' => 'pemilik@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $pemilikIds = [1];
        }

        $kategories = ['putra', 'putri', 'campur'];
        $kamarStatuses = ['tersedia', 'tidak tersedia'];

        $kostImages = [
            'https://images.unsplash.com/photo-1564013799919-ab600027ffc6',
            'https://images.unsplash.com/photo-1580587771525-78b9dba3b914',
            'https://images.unsplash.com/photo-1512917774080-9991f1c4c750',
            'https://images.unsplash.com/photo-1493809842364-78817add7ffb',
            'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688',
            'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267',
            'https://images.unsplash.com/photo-1484154218962-a197022b5858',
            'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6',
            'https://images.unsplash.com/photo-1529408632839-a54952c491e5',
            'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab',
        ];

        $kamarImages = [
            'https://images.unsplash.com/photo-1584622650111-993a426fbf0a',
            'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2',
            'https://images.unsplash.com/photo-1513694203232-719a280e022f',
            'https://images.unsplash.com/photo-1493809842364-78817add7ffb',
            'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688',
            'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267',
            'https://images.unsplash.com/photo-1484154218962-a197022b5858',
            'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6',
            'https://images.unsplash.com/photo-1529408632839-a54952c491e5',
            'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab',
        ];

        $cities = [
            'Jakarta',
            'Bandung',
            'Surabaya',
            'Medan',
            'Semarang',
            'Yogyakarta',
            'Malang',
            'Denpasar',
            'Makassar',
            'Palembang'
        ];

        $fasilitasKost = [
            'Dapur bersama, Laundry, Wifi, Kamar mandi dalam, AC',
            'Wifi, Kamar mandi luar, Parkiran motor, Dapur bersama',
            'AC, TV, Kamar mandi dalam, Laundry, Wifi, Dapur bersama',
            'Kipas angin, Kamar mandi luar, Parkiran motor',
            'AC, Wifi, Kamar mandi dalam, Laundry, TV kabel',
            'Kipas angin, Wifi, Kamar mandi dalam, Dapur bersama',
            'AC, Wifi, Kamar mandi dalam, Laundry, TV, Kulkas',
            'Kipas angin, Kamar mandi luar, Parkiran motor, Dapur bersama',
            'AC, Wifi, Kamar mandi dalam, Laundry, Dapur bersama',
            'Kipas angin, Wifi, Kamar mandi dalam, Parkiran motor'
        ];

        $fasilitasKamar = [
            'Kasur, Lemari, Meja belajar, Kursi, AC',
            'Kasur, Lemari, Meja belajar, Kipas angin',
            'Kasur spring bed, Lemari, Meja belajar, AC, TV',
            'Kasur, Lemari, Meja belajar, Kipas angin, Kamar mandi dalam',
            'Kasur spring bed, Lemari, Meja belajar, AC, Wifi',
            'Kasur, Lemari, Meja belajar, Kipas angin, Kamar mandi luar',
            'Kasur spring bed, Lemari, Meja belajar, AC, TV, Kulkas',
            'Kasur, Lemari, Meja belajar, Kipas angin',
            'Kasur spring bed, Lemari, Meja belajar, AC',
            'Kasur, Lemari, Meja belajar, Kipas angin, Kamar mandi dalam'
        ];

        for ($i = 1; $i <= 50; $i++) {
            $city = $cities[array_rand($cities)];
            $kategori = $kategories[array_rand($kategories)];
            $kostImage = $kostImages[array_rand($kostImages)] . '?random=' . $i;
            $pemilikId = $pemilikIds[array_rand($pemilikIds)];

            $kostId = DB::table('kost')->insertGetId([
                'pemilik_id' => $pemilikId,
                'nama_kost' => 'Kost ' . $faker->streetName . ' ' . ucfirst($kategori),
                'alamat' => $faker->streetAddress . ', ' . $city,
                'lokasi' => $city,
                'deskripsi' => 'Kost nyaman dan strategis di ' . $city . ' dengan fasilitas lengkap.',
                'fasilitas' => $fasilitasKost[array_rand($fasilitasKost)],
                'No_Wa' => '08' . $faker->numerify('##########'),
                'Email' => 'kost' . $i . '@example.com',
                'Telepon' => '021-' . $faker->numerify('#######'),
                'kategori' => $kategori,
                'gambar' => $kostImage,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $jumlahKamar = rand(3, 5);
            for ($j = 1; $j <= $jumlahKamar; $j++) {
                $kamarImage = $kamarImages[array_rand($kamarImages)] . '?random=' . $i . $j;
                $harga = rand(500, 1500) * 1000;

                DB::table('kamar')->insert([
                    'nama_kamar' => 'Kamar_' . $kostId . '_' . $j,
                    'fasilitas' => $fasilitasKamar[array_rand($fasilitasKamar)],
                    'harga' => $harga,
                    'status_kamar' => $kamarStatuses[array_rand($kamarStatuses)],
                    'deskripsi' => 'Kamar nyaman dengan luas ' . rand(12, 25) . 'm² di Kost ' . $city,
                    'gambar' => $kamarImage,
                    'kost_id' => $kostId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
