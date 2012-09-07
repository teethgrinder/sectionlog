<?php

class Create_Services {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function($table){
			$table->increments('id');
			$table->string('title');
			$table->text('body');
			$table->timestamps();
		
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('services');
	}
}
