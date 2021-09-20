<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('12345678');
        $user->nim_nip = '000';
        $user->role = 'admin';
        $user->save();

        $user = new User;
        $user->name = 'Mahasiswa1';
        $user->email = 'mahasiswa1@gmail.com';
        $user->password = Hash::make('12345678');
        $user->nim_nip = '190170001';
        $user->role = 'mahasiswa';
        $user->save();

        $user = new User;
        $user->name = 'Mahasiswa2';
        $user->email = 'mahasiswa2@gmail.com';
        $user->password = Hash::make('12345678');
        $user->nim_nip = '190170002';
        $user->role = 'mahasiswa';
        $user->save();

        $user = new User;
        $user->name = 'Dosen';
        $user->email = 'dosen@gmail.com';
        $user->password = Hash::make('12345678');
        $user->nim_nip = '100010090';
        $user->role = 'pembimbing';
        $user->save();

        // 'NIP',
        // 'nama',
        // 'j_kelamin',
        // 'HP',
        // 'foto'
        $user = new Pembimbing;
        $user->NIP = '100010090';
        $user->nama = 'Dosen';
        $user->j_kelamin = 'Laki Laki';
        $user->HP = '0852007676';
        $user->foto = 'dosen.jpg';
        $user->save();
        // 'id_pbb',
        // 'NIM',
        // 'nama_mhs',
        // 'thn_masuk',
        // 'j_kelamin',
        // 'HP',
        // 'judul_ta',
        // 'status',
        // 'foto'
        $user = new Mahasiswa;
        $user->id_pbb = '1';
        $user->NIM = '190170001';
        $user->nama_mhs = 'Mahasiswa 1';
        $user->j_kelamin = 'Laki Laki';
        $user->thn_masuk = '2018';
        $user->HP = '0852007676';
        $user->judul_ta = 'Judul TA 1';
        $user->status = 'Aktif';
        $user->foto = 'mhs1.jpg';
        $user->save();

        $user = new Mahasiswa;
        $user->id_pbb = '1';
        $user->thn_masuk = '2018';
        $user->NIM = '190170002';
        $user->nama_mhs = 'Mahasiswa 2';
        $user->j_kelamin = 'Laki Laki';
        $user->HP = '0852007676';
        $user->judul_ta = 'Judul TA 2';
        $user->status = 'Aktif';
        $user->foto = 'mhs2.jpg';
        $user->save();
    }
}
