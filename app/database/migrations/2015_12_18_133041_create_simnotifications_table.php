<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('simnotifications', function(Blueprint $table)
		{
			$table->increments('id');
			// 'from_user','to_user', 
			// 	'subject', 'body', 'is_read', 'is_pending', 'receipt',
			// 	'created_at', 'read_at', 'receipt_at'
			$table->integer('from_user');
			$table->integer('to_user');
			$table->string('subject');
			$table->text('body');
			$table->boolean('is_read')->default(0);
			$table->boolean('is_pending')->default(0);
			$table->text('receipt')->nullable;
			
			// $table->date('created_at');
			$table->date('read_at');
			$table->date('receipt_at');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('simnotifications');
	}

}
