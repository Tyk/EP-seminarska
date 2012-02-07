<?php
class CartController extends AppController 
{
	public function index()
	{
		$kosarica  = $this->Session->read("kosarica");
		$this->set('kosarica',$kosarica);
		
		$items = array();
   		$this->loadModel('Item');
		foreach($kosarica as $item_id => $item_count)
 		{
			
			$kitem['Item'] = $this->Item->findById($item_id);
			$kitem['Count'] = $item_count;
			array_push($items, $kitem); 
		}
		$this->set('items',$items);
		
	}

	public function add($id = null, $count = null)
	{
		$kosarica  = $this->Session->read("kosarica");
		if(!isset($kosarica))
			$kosarica = array();
		
		if(!isset($kosarica[$id]))
			 $kosarica[$id] = $count;
		else
			$kosarica[$id] = $kosarica[$id]+$count;
		$this->Session->write("kosarica",$kosarica);
		$this->redirect(array('controller' => 'items', 'action' => 'index'));
	}


	public function edit()
	{
		$edit_items = $this->data['edit_items'];
		$remove_items = $this->data['remove_items'];

		$kosarica  = $this->Session->read("kosarica");
		if(!isset($kosarica)) $kosarica = array();
		foreach($edit_items as $item_id => $item_count)
		{
			$kosarica[$item_id] = $item_count;
		}
		foreach($remove_items as $item_id => $remove)
		{
			if($remove) unset($kosarica[$item_id]);
		}

		$this->Session->write("kosarica",$kosarica);
		$this->redirect(array('controller' => 'cart', 'action' => 'index'));
	}

	public function checkout($id=null)
	{
		$kosarica  = $this->Session->read("kosarica");
		$this->set('kosarica',$kosarica);
		$items = array();
		$this->loadModel('Order');
		$this->loadModel('ItemsOrder');
		$this->Order->create();
		$this->Order->set('user_id', AuthComponent::user('id'));
		$this->Order->set('date', date( 'Y-m-d H:i:s'));
		$this->Order->set('state','ODDANO');
		$this->Order->save();
		$new_order_id = $this->Order->id;
		foreach($kosarica as $item_id => $item_count)
 		{
			$this->ItemsOrder->create();
			$this->ItemsOrder->set('order_id', $new_order_id);
			$this->ItemsOrder->set('item_id', $item_id);
			$this->ItemsOrder->set('quantity',$item_count);
			$this->ItemsOrder->save();
		}
		$this->Session->write("kosarica",array());
		$this->redirect(array('controller' => 'orders', 'action' => 'index'));
	}

	public function clear($id=null)
	{
		$kosarica = array();
		$this->Session->write("kosarica",$kosarica);
		$this->redirect(array('controller' => 'cart', 'action' => 'index'));
	}


}
