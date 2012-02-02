<?php
class UsersController extends AppController 
{
    public function beforeFilter()
	{
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout', 'login');		
    }

   	public function index() 
	{
        $this->User->recursive = 0;
		if($this->Auth->user('role') == 'client')
		{
			$clients = $this->User->find('all', array('conditions' => array('User.id' => $this->Auth->user('id'))));
        $this->set('users',$clients);
		}
		else
			$this->set('users',$clients = $this->User->find('all'));
    }

   	public function clients_index() 
	{
        $this->User->recursive = 0;
		$clients = $this->User->find('all', array('conditions' => array('User.role' => 'client', 'User.active' => true)));
        $this->set('users', $clients);
    }

   	public function salesman_index() 
	{
        $this->User->recursive = 0;
		$salesmen = $this->User->find('all', array('conditions' => array('User.role' => 'salesman', 'User.active' => true)));
        $this->set('users', $salesmen);
    }

   	public function deactivated_index() 
	{
        $this->User->recursive = 0;
		$clients = $this->User->find('all', array('conditions' => array('User.active' => false)));
        $this->set('users', $clients);
    }

    public function view($id = null) 
	{
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        $this->set('roles', $this->getRoles());
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

	public function getRoles()
	{
		return array('admin' => 'Admin', 'salesman' => 'Salesman', 'client' => 'Client');		
	}

    public function edit($id = null)
	{
        $this->User->id = $id;
        $this->set('roles', $this->getRoles());
		$tmpuser = $this->User->read(null, $id);
       	$this->set('user', $tmpuser['User']);
       	$this->set('posts', $this->User->Post->find('list'));        
		if (!$this->User->exists()) 
		{
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) 
		{
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('controller'=> 'home', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else 
		{
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) 
	{
        if (!$this->request->is('post')) 
		{
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists())
		{
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete())
		{
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

	public function login() 
	{
	    if ($this->Auth->login())
		{
			if(AuthComponent::user('active') == false)
			{			
				$this->Auth->logout();
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
			else
	        	$this->redirect($this->Auth->redirect());
	    }
		else
		{
	        $this->Session->setFlash(__('Invalid username or password, try again'));
	    }		
	}

	public function logout() 
	{
	    $this->redirect($this->Auth->logout());
	}
}
