<?php
class ItemsController extends AppController 
{

	var $paginate = array(
		'limit' => 15,
		'fields' => array('Item.id', 'Item.price','Item.name'),
		'order' => array(
		'Item.name' => 'asc'
		)
	);

    public function index() 
	{
		$items = $this->paginate('Item');
        $this->set('items',$items);
	}

    public function view($id = null) 
	{
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        $this->set('item', $this->Item->read(null, $id));
    }



}
