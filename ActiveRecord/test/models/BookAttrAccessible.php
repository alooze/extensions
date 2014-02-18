<<<<<<< HEAD
<?php
class BookAttrAccessible extends ActiveRecord\Model
{
	static $pk = 'book_id';
	static $table_name = 'books';

	static $attr_accessible = array('author_id');
	static $attr_protected = array('book_id');
};
=======
<?php
class BookAttrAccessible extends ActiveRecord\Model
{
	static $pk = 'book_id';
	static $table_name = 'books';

	static $attr_accessible = array('author_id');
	static $attr_protected = array('book_id');
};
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
?>