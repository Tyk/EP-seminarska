<?php
class CartController extends AppController 
{

	public function index() 
	{
		$kosarica  = $this->Session->read("kosarica");
		$this->set('kosarica',$kosarica);
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
		echo "ITEMS:";
		print_r($kosarica);
	}

	public function remove($id=null)
	{
		$kosarica  = $this->Session->read("kosarica");
		if(!isset($kosarica))
			$kosarica = array();

		if(isset($kosarica[$id])) 
		{		
			$kosarica[$id] = $kosarica[$id]-1;
			if($kosarica[$id] == 0) 
				unset($kosarica[$id]);
		}
		$this->Session->write("kosarica",$kosarica);
		echo "ITEMS:";
		print_r($kosarica);
	}

	public function clear($id=null)
	{
		$kosarica = array();
		$this->Session->write("kosarica",$kosarica);
		echo "ITEMS:";		
		print_r($kosarica);
	}


}
