<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	public function up()
	{
		Schema::create('items', function(Blueprint $table) {
			$table->increments('id');
			$table->uuid('uuid', 191)->unique();
			$table->string('keterangan', 191)->nullable();
			$table->double('tarif');
			$table->integer('jumlah');
			$table->double('subtotal');
			$table->integer('transaksi_id')->unsigned()->nullable()->index();
			$table->integer('tarif_id')->unsigned()->nullable()->index();
			$table->integer('rekening_id')->unsigned()->nullable()->index();
			$table->uuid('transaksi_uuid', 191)->index();
			$table->uuid('tarif_uuid', 191)->index();
			$table->uuid('rekening_uuid', 191)->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('items');
	}
}
