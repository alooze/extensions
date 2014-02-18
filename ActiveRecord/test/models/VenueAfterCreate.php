<<<<<<< HEAD
<?php
class VenueAfterCreate extends ActiveRecord\Model
{
	static $table_name = 'venues';
	static $after_create = array('change_name_after_create_if_name_is_change_me');

	
	public function change_name_after_create_if_name_is_change_me()
	{
		if($this->name == 'change me')
		{
			$this->name = 'changed!';
			$this->save();
		}
	}
}
=======
<?php
class VenueAfterCreate extends ActiveRecord\Model
{
	static $table_name = 'venues';
	static $after_create = array('change_name_after_create_if_name_is_change_me');

	
	public function change_name_after_create_if_name_is_change_me()
	{
		if($this->name == 'change me')
		{
			$this->name = 'changed!';
			$this->save();
		}
	}
}
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
