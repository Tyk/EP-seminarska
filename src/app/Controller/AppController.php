<?php
// app/Controller/AppController.php
App::import('Sanitize');
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'home', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'home', 'action' => 'index')
        )
    );

	function checkItemsIndexOrView()
	{
		return (($this->name != 'Items')&&(($this->action != 'index')||($this->action != 'view')));
	}

	function checkAboutLegalOrAuthors()
	{
		return (($this->name != 'About')&&(($this->action != 'legal')||($this->action != 'authors')));
	}

	function checkHome()
	{
		return (($this->name != 'Home')&&($this->action != 'index'));
	}

    function beforeFilter() 
	{
		if(!isset($_SERVER['HTTPS'])||($_SERVER['HTTPS'] != 'on'))
		{
			if( $this->checkHome() && $this->checkItemsIndexOrView() && $this->checkAboutLegalOrAuthors() )
			{
				$this->redirect('https://' . $_SERVER['SERVER_NAME'] . $this->here);
			}
		}	

 		$this->Auth->allow('index', 'view', 'showerror');
		$this->layout = 'default';

		$kosarica  = $this->Session->read("kosarica");
		$sum = 0;
		if(isset($kosarica))
		{
			foreach($kosarica as $item_id => $item_count) $sum = $sum + $item_count;
		}
		$this->set('items_in_cart', $sum);

		if($this->Auth->loggedIn())
		{

			$roleACL = array(
				'admin' => array('Adm' => '*','About' => '*','Home' => '*','Users' => '*','Messages' => '*'),
				'client' => array('About' => '*', 'Cart' => '*', 'Home' => '*', 
								  'Items' => array('index', 'view'), 
								  'Orders' => array('index', 'set_preklicano'),
								  'Users' => array('edit', 'logout'), 'Messages' => '*'),
				'salesman' => array('About' => '*', 'Home' => '*', 'Sales'  => '*', 'Items'=>'*', 'Orders' => '*',
									'Users' => array('clients_index','deactivated_index','add_client',
													 'delete', 'edit', 'delete', 'login', 'logout'),
									'Messages' => '*')
				);

//'About' => array('legal', 'authors')
//'Adm' => array('index')
//'Cart' => array('index', 'add', 'edit', 'checkout', 'clear')
//'Home' => array('index')
//'Images' => array('delete_from_item', 'add_to_item')
//'Items' => array('index', 'unpublished_index', 'view', 'add', 'edit', 'delete')
//'Orders' => array('index', 'edit', 'set_oddano', 'set_preklicano', 'set_vobdelavi',  'set_zavrnjeno', 'set_poslano', 'set_izbrisano')
//'Sales' => array('index)
//'Users' => array('index', 'clients_index','salesman_index','deactivated_index','add_client','delete', 'add_salesman', 'register', 'edit', 'delete', 'login', 'logout')

			

			$tmpRole = $this->Auth->user('role'); 
			if($tmpRole == "admin")  $this->layout = 'adm';		
			if($tmpRole == "salesman")  $this->layout = 'sales';		

			if(!(isset($roleACL[$tmpRole])&&isset($roleACL[$tmpRole][$this->name])&&(($roleACL[$tmpRole][$this->name] == '*') ||  in_array($this->action,$roleACL[$tmpRole][$this->name])))) 
			{
				$this->redirect(array('controller' => 'messages', 'action' => 'showerror'));
			}
		}

    }


/*
		if($this->Auth->user('role') == 'client')	
		{
			if (in_array($this->action, array('clients_index','salesman_index','deactivated_index','add','delete')))
			{
				throw new MethodNotAllowedException(__('Sorry a client is not allowed to do that'));
			}
		}
*/


    /** 
     * uploads files to the server 
     * @params: 
     *      $folder     = the folder to upload the files e.g. 'img/files' 
     *      $formdata   = the array containing the form files 
     *      $itemId     = id of the item (optional) will create a new sub folder 
     * @return: 
     *      will return an array with the success of each file upload 
     */  
    function uploadFiles($folder, $formdata, $itemId = null) {  
        // setup dir names absolute and relative  
        $folder_url = WWW_ROOT.$folder;  
        $rel_url = $folder;  
          
        // create the folder if it does not exist  
        if(!is_dir($folder_url)) {  
            mkdir($folder_url);  
        }  
              
        // if itemId is set create an item folder  
        if($itemId) {  
            // set new absolute folder  
            $folder_url = WWW_ROOT.$folder.'/'.$itemId;   
            // set new relative folder  
            $rel_url = $folder.'/'.$itemId;  
            // create directory  
            if(!is_dir($folder_url)) {  
                mkdir($folder_url);  
            }  
        }  
          
        // list of permitted file types, this is only images but documents can be added  
        $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');  
          
        // loop through and deal with the files  
        foreach($formdata as $file) {  
            // replace spaces with underscores  
            $filename = str_replace(' ', '_', $file['name']);  
            // assume filetype is false  
            $typeOK = false;  
            // check filetype is ok  
            foreach($permitted as $type) {  
                if($type == $file['type']) {  
                    $typeOK = true;  
                    break;  
                }  
            }  
              
            // if file type ok upload the file  
            if($typeOK) {  
                // switch based on error code  
                switch($file['error']) {  
                    case 0:  
                        // check filename already exists  
                        if(!file_exists($folder_url.'/'.$filename)) {  
                            // create full filename  
                            $full_url = $folder_url.'/'.$filename;  
                            $url = $rel_url.'/'.$filename;  
                            // upload the file  
                            $success = move_uploaded_file($file['tmp_name'], $url);  
                        } else {  
                            // create unique filename and upload file  
                            ini_set('date.timezone', 'Europe/London');  
                            $now = date('Y-m-d-His');  
                            $full_url = $folder_url.'/'.$now.$filename;  
                            $url = $rel_url.'/'.$now.$filename;  
                            $success = move_uploaded_file($file['tmp_name'], $url);  
                        }  
                        // if upload was successful  
                        if($success) {  
                            // save the url of the file  
                            $result['urls'][] = $url;  
                        } else {  
                            $result['errors'][] = "Error uploaded $filename. Please try again.";  
                        }  
                        break;  
                    case 3:  
                        // an error occured  
                        $result['errors'][] = "Error uploading $filename. Please try again.";  
                        break;  
                    default:  
                        // an error occured  
                        $result['errors'][] = "System error uploading $filename. Contact webmaster.";  
                        break;  
                }  
            } elseif($file['error'] == 4) {  
                // no file was selected for upload  
                $result['nofiles'][] = "No file Selected";  
            } else {  
                // unacceptable file type  
                $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";  
            }  
        }  
    return $result;  
    } 


}
