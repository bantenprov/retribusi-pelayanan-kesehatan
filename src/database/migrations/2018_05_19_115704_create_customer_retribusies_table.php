<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerRetribusiesTable extends Migration {

	public function up()
	{
		Schema::create('customer_retribusies', function(Blueprint $table) {
			$table->increments('id');
			$table->uuid('uuid')->unique();
			$table->integer('customers_id')->unsigned()->nullable();
			$table->integer('daftar_retribusi_id')->unsigned()->nullable()->index();
			$table->integer('user_id')->unsigned()->nullable()->index();
			$table->integer('user_update')->unsigned()->nullable()->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('customer_retribusies');
	}
}
