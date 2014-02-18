<<<<<<< HEAD
<?php

namespace foo\bar\biz;

class User extends \ActiveRecord\Model {
	static $has_many = array(
		array('user_newsletters'),
		array('newsletters', 'through' => 'user_newsletters')
	);

}

class Newsletter extends \ActiveRecord\Model {
	static $has_many = array(
		array('user_newsletters'),
		array('users', 'through' => 'user_newsletters'),
	);
}

class UserNewsletter extends \ActiveRecord\Model {
	static $belong_to = array(
		array('user'),
		array('newsletter'),
	);
}

# vim: ts=4 noet nobinary
?>
=======
<?php

namespace foo\bar\biz;

class User extends \ActiveRecord\Model {
	static $has_many = array(
		array('user_newsletters'),
		array('newsletters', 'through' => 'user_newsletters')
	);

}

class Newsletter extends \ActiveRecord\Model {
	static $has_many = array(
		array('user_newsletters'),
		array('users', 'through' => 'user_newsletters'),
	);
}

class UserNewsletter extends \ActiveRecord\Model {
	static $belong_to = array(
		array('user'),
		array('newsletter'),
	);
}

# vim: ts=4 noet nobinary
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
