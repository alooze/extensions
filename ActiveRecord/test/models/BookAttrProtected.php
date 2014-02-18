<<<<<<< HEAD
<?php
class BookAttrProtected extends ActiveRecord\Model
{
	static $pk = 'book_id';
	static $table_name = 'books';
	static $belongs_to = array(
		array('author', 'class_name' => 'AuthorAttrAccessible', 'primary_key' => 'author_id')
	);

	// No attributes should be accessible
	static $attr_accessible = array(null);
};
?>
=======
<?php
class BookAttrProtected extends ActiveRecord\Model
{
	static $pk = 'book_id';
	static $table_name = 'books';
	static $belongs_to = array(
		array('author', 'class_name' => 'AuthorAttrAccessible', 'primary_key' => 'author_id')
	);

	// No attributes should be accessible
	static $attr_accessible = array(null);
};
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
