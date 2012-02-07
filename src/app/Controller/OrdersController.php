<?php
class OrdersController extends AppController {
	
	public $name = 'Orders';
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index($id=NULL)
	{
		$orders = array();
		if($this->Auth->user('role') == 'client')
		{
			$orders = $this->Order->find('all', array('conditions' => array('Order.user_id' => $this->Auth->user('id'))));
			$ordersList = $this->Order->find('list', array('conditions' => array('Order.user_id' => $this->Auth->user('id'))));		
		}
		else
		{
			$orders = $this->Order->find('all');
			$ordersList = $this->Order->find('list');		
		}
		$this->set('orders', $orders);
		$this->set('show_details', false);
		
		if(($id != NULL) && (in_array($id,$ordersList))) 
		{
			$this->Order->id = $id;
			$this->set('selected_order', $this->Order->read());
			$this->set('id', $id);
			$this->set('show_details', true);
		}
	}

	public function edit($id)
	{
		$this->Order->id = $id;
		$this->set('id', $id);
		$this->set('selected_order', $this->Order->read());
	}

	public function changeState($id, $state) {
		$this->Order->id = $id;		
		$this->Order->read(null,$id);
		$this->Order->set('state', $state);
		$this->Order->save();
		$this->redirect(array('controller' => 'orders', 'action' => 'index'));
	}

	public function set_oddano($id)
	{
		$this->changeState($id, 'ODDANO');
	}

	public function set_preklicano($id)
	{
		$this->changeState($id, 'PREKLICANO');
	}

	public function set_vobdelavi($id)
	{
		$this->changeState($id, 'V OBDELAVI');
	}

	public function set_zavrnjeno($id)
	{
		$this->changeState($id, 'ZAVRNJENO');
	}

	public function set_poslano($id)
	{
		$this->changeState($id, 'POSLANO');
	}

	public function set_izbrisano($id)
	{
		$this->changeState($id, 'IZBRISANO');
	}

}
