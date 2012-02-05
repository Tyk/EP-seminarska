<?php
	class Order extends AppModel  {
		public $name = 'Order';
		var $belongsTo = 'User';
		var $hasAndBelongsToMany = 'Item';
	}
?>

