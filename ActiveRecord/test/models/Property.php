<<<<<<< HEAD
<?php
class Property extends ActiveRecord\Model
{
	static $table_name = 'property';
	static $primary_key = 'property_id';

	static $has_many = array(
		'property_amenities',
		array('amenities', 'through' => 'property_amenities')
	);
};
?>
=======
<?php
class Property extends ActiveRecord\Model
{
	static $table_name = 'property';
	static $primary_key = 'property_id';

	static $has_many = array(
		'property_amenities',
		array('amenities', 'through' => 'property_amenities')
	);
};
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
