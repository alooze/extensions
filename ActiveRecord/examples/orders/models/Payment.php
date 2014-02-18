<<<<<<< HEAD
<?php
class Payment extends ActiveRecord\Model
{
	// payment belongs to a person
	static $belongs_to = array(
		array('person'),
		array('order'));
}
?>
=======
<?php
class Payment extends ActiveRecord\Model
{
	// payment belongs to a person
	static $belongs_to = array(
		array('person'),
		array('order'));
}
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
