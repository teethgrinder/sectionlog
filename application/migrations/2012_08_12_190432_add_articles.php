<?php

class Add_Articles {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	  DB::table('articles')->insert(array(
			'title'=>'Kurslar',
			'content'=>'ÇOK ÇOK çok önemli kurslarımız var',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
	  ));
	  
	  DB::table('articles')->insert(array(
			'title'=>'küslar',
			'content'=>'ÇOK ÇOK çok önemli kurslarımız var',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
	  ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('articles')->where('title','=','Kurslar')->delete();
		DB::table('articles')->where('title','=','küslar')->delete();
	}

}
