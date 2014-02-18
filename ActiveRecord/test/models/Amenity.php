<<<<<<< HEAD
<?php
class Amenity extends ActiveRecord\Model
{
	static $table_name = 'amenities';
	static $primary_key = 'amenity_id';

	static $has_many = array(
		'property_amenities'
	);
};
?>
=======
<?php
class Amenity extends ActiveRecord\Model
{
	static $table_name = 'amenities';
	static $primary_key = 'amenity_id';

	static $has_many = array(
		'property_amenities'
	);
};
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
