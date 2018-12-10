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
               'nama_course' => "Fisika Energi",
               'deskripsi' => "Course ini berisi pelajaran Fisika Energi yang mudah dipahami",
               'harga' => 10000,
               'id_tutor' => 1,
               'foto' => 'fisika_energi.jpeg',
               'video' => 'fisika_energi.mp4'
           ]);

      DB::table('tutors')->insert([
                  'id_user' => '20',
                  'mata_pelajaran' => '',
                  'video_profil' => '',
                  'lama_mengajar' => '',
                  'pendidikan' => '',
                  'story' => ''
        ]);

        DB::table('users')->insert([
                    'id' => '20',
                    'nama' => 'Toni Budiman',
                    'email' => '',
                    'alamat' => '',
                    'foto' => '',
                    'id_role' => '2',
                    'password' => '',
                    'remember_token' => ''
          ]);

          DB::table('users')->insert([
                      'nama' => 'admin',
                      'email' => 'admin@icourse.co.id',
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

                DB::table('topiks')->insert([
                       'judul_topik' => 'Energi Listrik',
                       'penjelasan' => 'Energi Listrik merupakan topik yang sangat sering keluar di sbmptn',
                       'id_course' => 1,
                       'video' => 'fisika_energi.mp4',
                       'created_at'=> '2017-12-10'
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



      DB::table('status_pembayarans')->insert([
                     'id' => 1,
                     'status' => "Belum Bayar",
      ]);
      DB::table('status_pembayarans')->insert([
                     'id' => 2,
                     'status' => "Belum Disetujui",
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
                     'status' => "Langganan Kadaluarsa",
      ]);





    }
}
