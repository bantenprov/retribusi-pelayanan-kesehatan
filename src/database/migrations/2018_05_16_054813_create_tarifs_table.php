<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

class CreateTarifsTable extends Migration {

	public function up()
	{
		Schema::create('tarifs', function(Blueprint $table) {
			$table->increments('id');
			$table->uuid('uuid', 191)->unique();
            $table->string('uraian', 191)->unique();
            $table->boolean('tarif')->default(0);
			$table->double('jasa_pelayanan');
			$table->double('jasa_sarana');
			$table->string('satuan', 191)->index();
			$table->integer('master_tarif_id')->unsigned()->nullable()->index();
			$table->integer('user_id')->unsigned()->index();
            $table->integer('user_update')->unsigned()->index();
            NestedSet::columns($table);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tarifs');
	}
}
