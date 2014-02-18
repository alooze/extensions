<<<<<<< HEAD
<?php
class Host extends ActiveRecord\Model
{
	static $has_many = array(
		'events',
		array('venues', 'through' => 'events')
	);
}
?>
=======
<?php
class Host extends ActiveRecord\Model
{
	static $has_many = array(
		'events',
		array('venues', 'through' => 'events')
	);
}
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
