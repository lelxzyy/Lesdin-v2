<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GuruPendamping;
use App\Models\User;

class GuruPendampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guruUsers = User::where('role', 'guru')->get();

        $guruData = [
            [
                'name' => 'Budi Santoso',
                'nip' => 197805102008011001,
                'kontak' => '081234567890',
            ],
            [
                'name' => 'Siti Aminah',
                'nip' => 198203152010012002,
                'kontak' => '081234567891',
            ],
            [
                'name' => 'Ahmad Wijaya',
                'nip' => 198507202009021003,
                'kontak' => '081234567892',
            ],
        ];

        foreach ($guruUsers as $index => $user) {
            if (isset($guruData[$index])) {
                GuruPendamping::create([
                    'user_id' => $user->id,
                    'name' => $guruData[$index]['name'],
                    'nip' => $guruData[$index]['nip'],
                    'kontak' => $guruData[$index]['kontak'],
                ]);
            }
        }
    }
}