<?php
class HomeController extends AppController 
{
    public function index() 
	{		
		CakeLog::write('debug', 'processing: homeController->index');
		
		if(AuthComponent::user('role') == "admin")
		{
			$this->redirect(array('controller' => 'adm', 'action' => 'index'));			
		}
		else if(AuthComponent::user('role') == "salesman") 
		{
			$this->redirect(array('controller' => 'sales', 'action' => 'index'));						
		}
		else
		{
			$this->redirect(array('controller' => 'items', 'action' => 'index'));	
		}				
    }
}
