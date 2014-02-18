<<<<<<< HEAD
<?php
class PropertyAmenity extends ActiveRecord\Model
{
	static $table_name = 'property_amenities';
	static $primary_key = 'id';

	static $belongs_to = array(
		'amenity',
		'property'
	);
};
?>
=======
<?php
class PropertyAmenity extends ActiveRecord\Model
{
	static $table_name = 'property_amenities';
	static $primary_key = 'id';

	static $belongs_to = array(
		'amenity',
		'property'
	);
};
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
