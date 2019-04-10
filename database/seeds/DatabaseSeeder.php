<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('courses')->insert([
           'nama_course' => "Belajar HTML dari NOL",
           'deskripsi' => "Anda ingin menjadi PROGRAMMER BERGAJI TINGGI? Atau ingin belajar MEMBUAT WEBSITE? Berarti anda harus BELAJAR HTML sekarang juga!",
           'harga' => 0,
           'diskon' => 0,
           'id_tutor' => 1,
           'foto' => 'html-nol.jpg',
           'isPublished' => 1,
           'kategori' => 1,
           'video' => 'fisika_energi.mp4'
        ]);

        DB::table('courses')->insert([
           'nama_course' => "Fisika Nuklir",
           'deskripsi' => "Anda ingin menjadi PROGRAMMER BERGAJI TINGGI? Atau ingin belajar MEMBUAT WEBSITE? Berarti anda harus BELAJAR HTML sekarang juga!",
           'harga' => 10000,
           'diskon' => 50,
           'id_tutor' => 1,
           'isPublished' => 1,
           'foto' => 'html-nol.jpg',
           'kategori' => 1,
           'video' => 'fisika_energi.mp4'
        ]);

         DB::table('courses')->insert([
           'nama_course' => "How to pick up a random girl",
           'deskripsi' => "Anda ingin menjadi PROGRAMMER BERGAJI TINGGI? Atau ingin belajar MEMBUAT WEBSITE? Berarti anda harus BELAJAR HTML sekarang juga!",
           'harga' => 10000,
           'diskon' => 0,
           'id_tutor' => 1,
           'isPublished' => 1,
           'foto' => 'html-nol.jpg',
           'kategori' => 1,
           'video' => 'fisika_energi.mp4'
        ]);


        DB::table('tutors')->insert([
                  'id_user' => '1'
        ]);

        DB::table('users')->insert([
                    'id' => '1',
                    'nama' => 'Toni Budiman',
                    'email' => 'toni@toni.id',
                    'alamat' => '',
                    'foto' => '',
                    'id_role' => '2',
                    'password' => bcrypt(123456),
                    'remember_token' => ''
        ]);

          DB::table('users')->insert([
                      'nama' => 'admin',
                      'email' => 'admin@admin.id',
                      'alamat' => '',
                      'foto' => '',
                      'id_role' => '3',
                      'password' => bcrypt(123456),
                      'remember_token' => ''
            ]);

          DB::table('topiks')->insert([
                 'judul_topik' => 'Energi Cahaya',
                 'penjelasan' => 'Energi Cahaya merupakan topik yang sangat sering keluar di sbmptn',
                 'id_course' => 1,
                 'video' => 'fisika_energi.mp4',
                 'created_at'=> '2017-10-10'
          ]);

          DB::table('topiks')->insert([
                 'judul_topik' => 'Energi Cahaya',
                 'penjelasan' => 'Energi Cahaya merupakan topik yang sangat sering keluar di sbmptn',
                 'id_course' => 2,
                 'video' => 'fisika_energi.mp4',
                 'created_at'=> '2017-10-10'
          ]);


          DB::table('pertanyaan_topiks')->insert([
                'id_topik' => 1,
                'pertanyaan' => 'Energi panas disebut juga ...?',
                'judul_pertanyaan' => 'Soal SBMPTN Tahun 2018',
                'jawaban' => "4",
                'opsi_1' => "Energi Cahaya",
                'opsi_2' => "Energi Kinetik",
                'opsi_3' => "Energi Listrik",
                'opsi_4' =>  "Energi Kalor"
          ]);


          DB::table('topiks')->insert([
                    'judul_topik' => 'Energi Kalor',
                    'penjelasan' => 'Energi Kalor merupakan topik yang sangat sering keluar di sbmptn',
                    'id_course' => 1,
                    'parent_id' => 1,
                    'video' => 'fisika_energi.mp4',
                    'created_at'=> '2017-11-10'

          ]);

          DB::table('topiks')->insert([
                    'judul_topik' => 'Energi Kalor',
                    'penjelasan' => 'Energi Kalor merupakan topik yang sangat sering keluar di sbmptn',
                    'id_course' => 2,
                    'parent_id' => 2,
                    'video' => 'fisika_energi.mp4',
                    'created_at'=> '2017-11-10'

          ]);


              DB::table('pertanyaan_topiks')->insert([
                   'id_topik' => 2,
                   'pertanyaan' => 'Energi panas disebut juga ...?',
                   'judul_pertanyaan' => 'Soal SBMPTN Tahun 2018',
                   'jawaban' => "4",
                   'opsi_1' => "Energi Cahaya",
                   'opsi_2' => "Energi Kinetik",
                   'opsi_3' => "Energi Listrik",
                   'opsi_4' =>  "Energi Kalor"
                ]);



      DB::table('status_pembayarans')->insert([
                     'id' => 1,
                     'status' => "Belum Bayar",
      ]);
      DB::table('status_pembayarans')->insert([
                     'id' => 2,
                     'status' => "Sudah Dibayar",
      ]);
      DB::table('status_pembayarans')->insert([
                     'id' => 3,
                     'status' => "Disetujui",
      ]);
      DB::table('status_pembayarans')->insert([
                     'id' => 4,
                     'status' => "Jumlah Transfer Kurang",
      ]);
      DB::table('status_pembayarans')->insert([
                     'id' => 5,
                     'status' => "Pembayaran Invalid",
      ]);
      DB::table('status_pembayarans')->insert([
                     'id' => 6,
                     'status' => "Belum Disetujui",
      ]);



      DB::table('tutor_saldo_withdraw_status')->insert([
                     'id' => 1,
                     'withdraw_status' => "Sedang Direview",
      ]);
      DB::table('tutor_saldo_withdraw_status')->insert([
                     'id' => 2,
                     'withdraw_status' => "Disetujui",
      ]);
      DB::table('tutor_saldo_withdraw_status')->insert([
                     'id' => 3,
                     'withdraw_status' => "Telah Ditransfer",
      ]);
      DB::table('tutor_saldo_withdraw_status')->insert([
                     'id' => 4,
                     'withdraw_status' => "Transaksi Invalid",
      ]);



    }
}
