<?php
// app/Controller/AppController.php
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'home', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'home', 'action' => 'index')
        )
    );

    function beforeFilter() 
	{
 		$this->Auth->allow('index', 'view');
		$this->layout = 'default';
		if($this->Auth->loggedIn())
		{
			if($this->Auth->user('role') == "admin")  $this->layout = 'adm';		
			if($this->Auth->user('role') == "salesman")  $this->layout = 'sales';				
		}
    }

}
