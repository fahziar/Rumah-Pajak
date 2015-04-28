<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePajakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pajak', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('npwpd');
            $table->string('kategori');
            $table->integer('aset_kepemilikan');
            $table->boolean('status_pembayaran');
            $table->integer('jumlah_dibayarkan');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pajak');
	}

}
