<<<<<<< HEAD
<?php
class AuthorAttrAccessible extends ActiveRecord\Model
{
	static $pk = 'author_id';
	static $table_name = 'authors';
	static $has_many = array(
		array('books', 'class_name' => 'BookAttrProtected', 'foreign_key' => 'author_id', 'primary_key' => 'book_id')
	);
	static $has_one = array(
		array('parent_author', 'class_name' => 'AuthorAttrAccessible', 'foreign_key' => 'parent_author_id', 'primary_key' => 'author_id')
	);
	static $belongs_to = array();

	// No attributes should be accessible
	static $attr_accessible = array(null);
};
?>
=======
<?php
class AuthorAttrAccessible extends ActiveRecord\Model
{
	static $pk = 'author_id';
	static $table_name = 'authors';
	static $has_many = array(
		array('books', 'class_name' => 'BookAttrProtected', 'foreign_key' => 'author_id', 'primary_key' => 'book_id')
	);
	static $has_one = array(
		array('parent_author', 'class_name' => 'AuthorAttrAccessible', 'foreign_key' => 'parent_author_id', 'primary_key' => 'author_id')
	);
	static $belongs_to = array();

	// No attributes should be accessible
	static $attr_accessible = array(null);
};
?>
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
