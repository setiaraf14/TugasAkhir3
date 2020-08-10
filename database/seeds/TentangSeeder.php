<?php

use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tentangs')->insert([
            'nama_instansi'=>'CV. Baker Photography',
            'moto_instansi'=>'To See The World, Things Dangerous To Come To, To See Behind Walls, Draw Closer To Find Each Other And To Feel That Is The Purpose Of Life',
            'desk_instansi'=>'Kami Adalah Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid rerum doloribus iste facere quia vel obcaecati nisi facilis. Excepturi laudantium culpa eum exercitationem voluptatum officia eaque tempore odio pariatur atque. ',
            'visi_instansi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. A nemo debitis non!',
            'misi_instansi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. A nemo debitis non!',
            'logo_instansi'=>'',
            'alamat_instansi'=>'Cibodas',
        ]);
    }
}
