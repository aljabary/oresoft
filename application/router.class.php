<?php

class router {
 /*
 * @the registry
 */
 private $registry;

 /*
 * @the controller path
 */
 private $path;

 private $args = array();

 public $file;

 public $controller;

 public $action; 
 
 public $fileaction =	array(); 
 public $id;

 function __construct($registry) {
        $this->registry = $registry;
 }

 /**
 *
 * @set controller directory path
 *
 * @param string $path
 *
 * @return void
 *
 */
 function setPath($path) {

	/*** check if path i sa directory ***/
	if (is_dir($path) == false)
	{
		throw new Exception ('Invalid controller path: `' . $path . '`');
	}
	/*** set the path ***/
 	$this->path = $path;
}


 /**
 *
 * @load the controller
 *
 * @access public
 *
 * @return void
 *
 */
 public function loader()
 {
	/*** check the route ***/
	$this->getController();

	/*** if the file is not there diaf ****/
	if (is_readable($this->file) == false)
	{
		//$this->file = $this->path.'/error404.php';
        //$this->controller = 'error404';
		include 'controller/index.controller.php';
		$this->file = $this->path .'/index.controller.php';
		$controller	=	new Index_Controller($this->registry);		
		$controller->index();
	}else{
	$fileact	=	$this->fileaction;
	$i=1;
	foreach($fileact as $key =>$val){
	if (!empty($fileact[$i]) )
	{
		$isfile = explode('.',$fileact[$i]);
	if (is_readable($fileact[$i]) == false & empty($isfile[1])==false)
	{
		$this->file = $this->path.'/error404.php';
        $this->controller = 'error404'; 
	}
	}
	$i++;
	}
	/*** include the controller ***/
	include $this->file;

	/*** a new controller class instance ***/
	$class = ucfirst($this->controller). '_Controller';
	$controller = new $class($this->registry);
	/*** check if the action is callable ***/
	if (is_callable(array($controller, $this->action)) == false)
	{
		$action = 'index'; 
		
	}
	else
	{
		$action = $this->action;
	}}
	/*** run the action ***/
	//echo $class;
	if(!empty($action)){
	$controller->$action();
	}
 }


 /**
 *
 * @get the controller
 *
 * @access private
 *
 * @return void
 *
 */
private function getController() {

	/*** get the route from the url ***/
	$xxx	=	explode('?',curPageURL());
	$rt = str_replace(PROX_URL.SUB_FOLDER,'',$xxx[0]);
	$route = $rt;//(empty($_GET['rt'])) ? '' : $_GET['rt'];

	if (empty($route))
	{
		$route = 'index';
	}
	else
	{
		/*** get the parts of the route ***/
		$parts = explode('/', $route);
		$countpart	= count($parts);
		$this->controller = $parts[0];
		if(isset( $parts[1]))
		{
			$this->action = $parts[1];
			$i=1;
			foreach($parts as $key=>$val){
			$this->fileaction[$i] =  $parts[$i];
			$i++;
			}
			
		}
	}

	if (empty($this->controller))
	{
		$this->controller = 'index';
	}

	/*** Get action ***/
	if (empty($this->action))
	{
		$this->action = 'index';
		
	}

	/*** set the file path ***/
	$this->file = $this->path .'/'. $this->controller . '.controller.php';
}

}

?>
