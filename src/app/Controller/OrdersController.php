<?php
class OrdersController extends AppController {
	
	public $name = 'Orders';
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index($id=NULL)
	{

		$this->set('orders', $this->Order->find('all'));
		$this->set('show_details', false);

		if($id != NULL)
		{
			$this->Order->id = $id;
			$this->set('selected_order', $this->Order->read());
			$this->set('id', $id);
			$this->set('show_details', true);
		}
	}

	public function edit($id) {
		$this->Order->id = $id;
		$this->set('id', $id);
		$this->set('selected_order', $this->Order->read());
	}

	public function changeState($id, $state) {
		$this->Order->id = $id;		
		$this->Order->read();
		$this->Order->saveField('state', $state);
		$this->Order->save();
		$this->redirect(array('controller' => 'orders', 'action' => 'index'));
	}
}
