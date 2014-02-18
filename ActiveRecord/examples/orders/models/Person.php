<<<<<<< HEAD
<?php
class Person extends ActiveRecord\Model
{
	// a person can have many orders and payments
	static $has_many = array(
		array('orders'),
		array('payments'));

	// must have a name and a state
	static $validates_presence_of = array(
		array('name'), array('state'));
}
?>
=======
<?php
class Person extends ActiveRecord\Model
{
	// a person can have many orders and payments
	static $has_many = array(
		array('orders'),
		array('payments'));

	// must have a name and a state
	static $validates_presence_of = array(
		array('name'), array('state'));
}
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
