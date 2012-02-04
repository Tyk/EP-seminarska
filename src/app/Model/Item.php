<?php

class Item extends AppModel
{
    public $name = 'Item';
	var $hasMany = 'Image';

	public $validate = array(
        'name' => array(

            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            )
        ),
        'image' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'An image is required'
            )
        ),
    );
}
