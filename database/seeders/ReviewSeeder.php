<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ReviewSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $customer = User::where('email', 'customer@novos.com')->first();
        if (! $customer) {
            $this->command->warn('User customer tidak ditemukan. Jalankan UserSeeder terlebih dahulu.');
            return;
        }

        $reviews = [
            ['rating' => 5, 'comment' => 'Jerseynya keren banget! Kualitas sablon bagus, warna sesuai pesanan. Recommended banget!'],
            ['rating' => 4, 'comment' => 'Hasilnya memuaskan, cuma sedikit molor dari estimasi pengerjaan. Tapi kualitas oke.'],
            ['rating' => 5, 'comment' => 'Pelayanan ramah, hasil jersey sesuai desain. Tim komunikatif banget.'],
            ['rating' => 3, 'comment' => 'Jerseynya lumayan, tapi ada sedikit selisih ukuran dari yang dipesan. Mungkin next order lebih baik fitting dulu.'],
            ['rating' => 4, 'comment' => 'Proses cepat, hasil rapi. Harga sesuai kualitas. Makasih Novos!'],
            ['rating' => 5, 'comment' => 'Sudah 3x order disini, hasil selalu konsisten. Recomended untuk tim futsal!'],
            ['rating' => 4, 'comment' => 'Bahannya adem, jahitan rapi. Overall puas dengan hasilnya.'],
            ['rating' => 3, 'comment' => 'Warna sedikit berbeda dari desain, tapi masih lumayan. Semoga next lebih presisi.'],
            ['rating' => 5, 'comment' => 'Fast response, delivery tepat waktu, kualitas juara! Pasti order lagi.'],
            ['rating' => 4, 'comment' => 'Hasil jahitan bagus, sablon detail. Saran: ditambah opsi bahan premium.'],
        ];

        $now = Carbon::now();

        foreach ($reviews as $i => $data) {
            $orderNumber = 'NVS-20260708-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT);

            $order = Order::firstOrCreate(
                ['order_number' => $orderNumber],
                [
                    'user_id'      => $customer->id,
                    'status'       => 'selesai',
                    'total_price'  => rand(1000000, 5000000),
                    'confirmed_at' => $now->copy()->subDays(rand(10, 60)),
                    'created_at'   => $now->copy()->subDays(rand(15, 65)),
                    'updated_at'   => $now->copy()->subDays(rand(1, 5)),
                ]
            );

            Review::firstOrCreate(
                ['order_id' => $order->id],
                [
                    'user_id'  => $customer->id,
                    'rating'   => $data['rating'],
                    'comment'  => $data['comment'],
                ]
            );

            $this->command->info("Review untuk {$orderNumber} (rating {$data['rating']}) berhasil dibuat.");
        }
    }
}
