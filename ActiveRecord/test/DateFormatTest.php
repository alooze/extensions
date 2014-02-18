<<<<<<< HEAD
<?php

class DateFormatTest extends DatabaseTest
{

	public function test_datefield_gets_converted_to_ar_datetime()
	{
		//make sure first author has a date
		$author = Author::first();
		$author->some_date = new DateTime();
		$author->save();
		
		$author = Author::first();
		$this->assert_is_a("ActiveRecord\\DateTime",$author->some_date);
	}

};
?>
=======
<?php

class DateFormatTest extends DatabaseTest
{

	public function test_datefield_gets_converted_to_ar_datetime()
	{
		//make sure first author has a date
		$author = Author::first();
		$author->some_date = new DateTime();
		$author->save();
		
		$author = Author::first();
		$this->assert_is_a("ActiveRecord\\DateTime",$author->some_date);
	}

};
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
