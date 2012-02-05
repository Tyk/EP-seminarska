<?php
class UsersController extends AppController 
{
    public function beforeFilter()
	{
        parent::beforeFilter();
		//KO nismo prijavljeni nimamo dovoljenj za
		$this->Auth->deny('index', 'view');
		//IMAMO dovoljenja za
        $this->Auth->allow('register', 'login', 'logout');
		if($this->Auth->user('role') == 'client')
		{
			if (in_array($this->action, array('clients_index','salesman_index','deactivated_index','add','delete')))
			{
				throw new MethodNotAllowedException(__('Sorry a client is not allowed to do that'));
			}
		}
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

    public function add_client()
	{
      	$this->set('posts', $this->User->Post->find('list'));
        if ($this->request->is('post'))
		{
            $this->User->create();
			$this->User->set('role','client');
            if ($this->User->save($this->request->data))
			{
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'clients_index'));
            }
			else
			{
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

 
	public function add_salesman()
	{
      	$this->set('posts', $this->User->Post->find('list'));
        if ($this->request->is('post'))
		{
           	$this->User->create();
		   	$this->User->set('role','salesman'); 
           	if ($this->User->save($this->request->data))
			{
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'salesman_index'));
            }
			else
			{
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }


   public function register()
	{
        $this->set('roles', $this->getRoles());
        if ($this->request->is('post'))
		{
            $this->User->create();
			$this->User->set('role','client');
			$this->User->set('active',FALSE);			
            if ($this->User->save($this->request->data))
			{
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('controller'=>'home', 'action' => 'index'));
            }
			else
			{
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
		//Ureja lahko samo sebe
		if($this->Auth->user('role') == 'client')
			$id = $this->Auth->user('id');
		
        $this->User->id = $id;
//        $this->set('roles', $this->getRoles());
		$tmpuser = $this->User->read(null, $id);
       	$this->set('user', $tmpuser['User']);
       	$this->set('posts', $this->User->Post->find('list'));        
		if (!$this->User->exists()) 
		{
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) 
		{
            if ($this->User->save($this->request->data))
			{
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('controller'=> 'home', 'action' => 'index'));
            }
			else
			{
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } 
		else 
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
