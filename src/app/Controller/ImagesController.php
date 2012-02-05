<?php
class ImagesController extends AppController 
{
    public function add_to_item($id = null)
	{
		$item_id = $this->data['item_id'];
		$image_name = '/img/files/'.$this->data['Image']['File/image']['name'];
		$fileOK = $this->uploadFiles('img/files', $this->data['Image']);  
	
		if(array_key_exists('urls', $fileOK)) 
		{
			$this->Image->create();
			$this->Image->set('item_id', $item_id);
			$this->Image->set('image_url',$image_name);
			$this->Image->save();
		} 
		$this->redirect(array('controller'=>'items',  'action' => 'edit', $item_id));
	}


    public function delete_from_item($id = null, $item_id=null) 
	{
		//delete dovolimo samo na metodo POST
        if (!$this->request->is('post')) 
		{
            throw new MethodNotAllowedException();
        }
        $this->Image->id = $id;
        if (!$this->Image->exists())
		{
            throw new NotFoundException(__('Invalid image'));
        }
        if ($this->Image->delete())
		{
            $this->Session->setFlash(__('Image deleted'));
            $this->redirect(array('controller'=>'items',  'action' => 'edit', $item_id));
        }
        $this->Session->setFlash(__('Image was not deleted'));
		$this->redirect(array('controller'=>'items',  'action' => 'edit', $item_id));
    }


}
