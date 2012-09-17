<?php

class Create_Images {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
		public function up()
	{
		Schema::create('images', function($table) {
		$table->increments('id');
		$table->string('name', 128);
		$table->string('extension', 4);
 
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
		Schema::drop('images');
	}

}
