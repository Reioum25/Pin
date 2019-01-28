<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district');
            $table->string('name');
        });

        //District I (West Coast)
        DB::table('barangays')->insert([
            [ 'district' => 1, 'name' => 'Baliwasan'],
            [ 'district' => 1, 'name' => 'Ayala'],
            [ 'district' => 1, 'name' => 'Sta. Maria'],
            [ 'district' => 1, 'name' => 'Baluno'],
            [ 'district' => 1, 'name' => 'Cabatangan'],
            [ 'district' => 1, 'name' => 'Calarian'],
            [ 'district' => 1, 'name' => 'Camino Nuevo'],
            [ 'district' => 1, 'name' => 'Campo Islam'],
            [ 'district' => 1, 'name' => 'Canelar'],
            [ 'district' => 1, 'name' => 'Capisan'],
            [ 'district' => 1, 'name' => 'Cawit'],
            [ 'district' => 1, 'name' => 'Dulian Pasonanca'],
            [ 'district' => 1, 'name' => 'Kasanyangan'],
            [ 'district' => 1, 'name' => 'La Paz'],
            [ 'district' => 1, 'name' => 'Labuan'],
            [ 'district' => 1, 'name' => 'Lamisahan'],
            [ 'district' => 1, 'name' => 'Limpapa'],
            [ 'district' => 1, 'name' => 'Maasin'],
            [ 'district' => 1, 'name' => 'Malagutay'],
            [ 'district' => 1, 'name' => 'Pamucutan'],
            [ 'district' => 1, 'name' => 'Pasonanca'],
            [ 'district' => 1, 'name' => 'Patalon'],
            [ 'district' => 1, 'name' => 'Recodo'],
            [ 'district' => 1, 'name' => 'Lower Calarian'],
            [ 'district' => 1, 'name' => 'Suterville'],
            [ 'district' => 1, 'name' => 'Rio Hondo'],
            [ 'district' => 1, 'name' => 'San Jose Cawa Cawa'],
            [ 'district' => 1, 'name' => 'San Jose Gusu'],
            [ 'district' => 1, 'name' => 'San Ramon'],
            [ 'district' => 1, 'name' => 'San Roque'],
            [ 'district' => 1, 'name' => 'Sinunuc'],
            [ 'district' => 1, 'name' => 'Sinubong'],
            [ 'district' => 1, 'name' => 'Sta. Barbara'],
            [ 'district' => 1, 'name' => 'Sta. Cruz (Island Barangay)'],
            [ 'district' => 1, 'name' => 'Sta. Maria'],
            [ 'district' => 1, 'name' => 'Sto. Niño'],
            [ 'district' => 1, 'name' => 'Talisayan'],
            [ 'district' => 1, 'name' => 'Tulungatung'],
            [ 'district' => 1, 'name' => 'Tumaga'],
            [ 'district' => 1, 'name' => 'Luyahan'],
            [ 'district' => 1, 'name' => 'Zone I'],
            [ 'district' => 1, 'name' => 'Zone II'],
            [ 'district' => 1, 'name' => 'Zone III'],
            [ 'district' => 1, 'name' => 'Zone IV'],
        ]);

        //District 2 (East Coast)
        DB::table('barangays')->insert([
            [ 'district' => 2, 'name' => 'Arena Blanco'],
            [ 'district' => 2, 'name' => 'Boalan'],
            [ 'district' => 2, 'name' => 'Bolong'],
            [ 'district' => 2, 'name' => 'Buenavista'],
            [ 'district' => 2, 'name' => 'Bunguiao'],
            [ 'district' => 2, 'name' => 'Busay (Island Barangay)'],
            [ 'district' => 2, 'name' => 'Cabaluay'],
            [ 'district' => 2, 'name' => 'Cacao'],
            [ 'district' => 2, 'name' => 'Calabasa'],
            [ 'district' => 2, 'name' => 'Culianan'],
            [ 'district' => 2, 'name' => 'Curuan'],
            [ 'district' => 2, 'name' => 'Dita'],
            [ 'district' => 2, 'name' => 'Divisoria'],
            [ 'district' => 2, 'name' => 'Dulian Bunguiao'],
            [ 'district' => 2, 'name' => 'Guisao'],
            [ 'district' => 2, 'name' => 'Guiwan'],
            [ 'district' => 2, 'name' => 'Landang Gua (Island Barangay)'],
            [ 'district' => 2, 'name' => 'Landang Laum (Island Barangay)'],
            [ 'district' => 2, 'name' => 'Lanzones'],
            [ 'district' => 2, 'name' => 'Lapakan'],
            [ 'district' => 2, 'name' => 'Latuan Curuan'],
            [ 'district' => 2, 'name' => 'Licomo'],
            [ 'district' => 2, 'name' => 'Limaong'],
            [ 'district' => 2, 'name' => 'Lubigan'],
            [ 'district' => 2, 'name' => 'Lumayang'],
            [ 'district' => 2, 'name' => 'Lumbangan'],
            [ 'district' => 2, 'name' => 'Lunzuran'],
            [ 'district' => 2, 'name' => 'Mampang'],
            [ 'district' => 2, 'name' => 'Manalipa'],
            [ 'district' => 2, 'name' => 'Manicahan'],
            [ 'district' => 2, 'name' => 'Mangusu'],
            [ 'district' => 2, 'name' => 'Mariki'],
            [ 'district' => 2, 'name' => 'Mercedes'],
            [ 'district' => 2, 'name' => 'Muti'],
            [ 'district' => 2, 'name' => 'Pangapuyan (Island Barangay)'],
            [ 'district' => 2, 'name' => 'Panubigan'],
            [ 'district' => 2, 'name' => 'Pasilmanta (Island Barangay)'],
            [ 'district' => 2, 'name' => 'Pasabolong'],
            [ 'district' => 2, 'name' => 'Putik'],
            [ 'district' => 2, 'name' => 'Quiniput'],
            [ 'district' => 2, 'name' => 'Salaan'],
            [ 'district' => 2, 'name' => 'Sangali'],
            [ 'district' => 2, 'name' => 'Sibulao Curuan'],
            [ 'district' => 2, 'name' => 'Sta. Catalina'],
            [ 'district' => 2, 'name' => 'Tagasilay'],
            [ 'district' => 2, 'name' => 'Taguiti'],
            [ 'district' => 2, 'name' => 'Talabaan'],
            [ 'district' => 2, 'name' => 'Talon-Talon'],
            [ 'district' => 2, 'name' => 'Taluksangay'],
            [ 'district' => 2, 'name' => 'Tetuan'],
            [ 'district' => 2, 'name' => 'Tictapul'],
            [ 'district' => 2, 'name' => 'Tigbalabag'],
            [ 'district' => 2, 'name' => 'Tigtabon (Island Barangay)'],
            [ 'district' => 2, 'name' => 'Tolosa'],
            [ 'district' => 2, 'name' => 'Tugbungan'],
            [ 'district' => 2, 'name' => 'Tumalutab (Island Barangay)'],
            [ 'district' => 2, 'name' => 'Tumitus'],
            [ 'district' => 2, 'name' => 'Victoria'],
            [ 'district' => 2, 'name' => 'Vitali'],
            [ 'district' => 2, 'name' => 'Zambowood'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangays');
    }
}
