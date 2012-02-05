<?php
class OrdersController extends AppController {
	
	public $name = 'Orders';
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index() {
		$this->set('orders', $this->Order->find('all'));
		
	}

	public function view($id) 
	{	
		$this->Order->id = $id;
		$this->set('order', $this->Order->read());
		$this->set('id', $id);
	}

	public function edit() {
	}
}
