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
	    $filters = array();
	    if(isset($this->data['Item']['q']))
		{
			$q  = $this->data['Item']['q'];
	        $filters = array("lower(Item.name) like '%".strtolower($q)."%' OR lower(Item.description) like '%".strtolower($q)."%'");        
	    }
		array_push($filters, "Item.published > 0");
		$items = $this->paginate('Item', $filters);
        $this->set('items',$items);
	}


    public function unpublished_index() 
	{
	    $filters = array();
	    if(isset($this->data['Item']['q']))
		{
			$q  = $this->data['Item']['q'];
	        $filters = array("lower(Item.name) like '%".strtolower($q)."%' OR lower(Item.description) like '%".strtolower($q)."%'");        
	    }
		array_push($filters, "Item.published <= 0");
		$items = $this->paginate('Item', $filters);
        $this->set('items',$items);
		$this->render('index');
	}

    public function view($id = null) 
	{
        $this->Item->id = $id;
        if (!$this->Item->exists())
		{
            throw new NotFoundException(__('Invalid item'));
        }
        $this->set('item', $this->Item->read(null, $id));
    }


	public function add()
	{
        if ($this->request->is('post'))
		{
           	$this->Item->create();
           	if ($this->Item->save($this->request->data))
			{
				$new_item_id = $this->Item->id;
                $this->Session->setFlash(__('The item has been saved'));
                $this->redirect(array('controller'=>'items', 'action' => 'edit', $new_item_id));
            }
			else
			{
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        }
    }

   	public function edit($id = null) 
	{
        $this->Item->id = $id;
 		if (!$this->Item->exists()) 
		{
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->request->is('post') || $this->request->is('put')) 
		{
            if ($this->Item->save($this->request->data))
			{
                $this->Session->setFlash(__('The item has been saved'));
                $this->redirect(array('controller'=> 'items', 'action' => 'index'));
            }
			else
			{
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        } 
		else 
		{
            $this->request->data = $this->Item->read(null, $id);
        }
        $this->set('item', $this->Item->read(null, $id));
    }

    public function delete($id = null) 
	{
		//delete dovolimo samo na metodo POST
        if (!$this->request->is('post')) 
		{
            throw new MethodNotAllowedException();
        }
        $this->Item->id = $id;
        if (!$this->Item->exists())
		{
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->Item->delete())
		{
            $this->Session->setFlash(__('Item deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Item was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
