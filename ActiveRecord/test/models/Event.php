<<<<<<< HEAD
<?php
class Event extends ActiveRecord\Model
{
	static $belongs_to = array(
		'host',
		'venue'
	);

	static $delegate = array(
		array('state', 'address', 'to' => 'venue'),
		array('name', 'to' => 'host', 'prefix' => 'woot')
	);
};
?>
=======
<?php
class Event extends ActiveRecord\Model
{
	static $belongs_to = array(
		'host',
		'venue'
	);

	static $delegate = array(
		array('state', 'address', 'to' => 'venue'),
		array('name', 'to' => 'host', 'prefix' => 'woot')
	);
};
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
