<?php
class AboutController extends AppController 
{

    function beforeFilter() 
	{
 		$this->Auth->allow('legal', 'authors');
	}
    public function legal() {}
    public function authors() {}
}
