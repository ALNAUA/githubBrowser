<?php namespace core;
use core\config as Config,
    core\view as View,
    core\language as Language,
    core\error as Error;

/*
 * controller - base controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Controller {
 
 /**
  * view variable to use the view class
  * @var string
  */
 public $view;
 public $language;
 public $gitapi;
 
 /**
  * on run make an instance of the config class and view class
  */
 public function __construct(){
  
  //initialise the views object
  $this->view = new view();
  
  //initialise the language object
  $this->language = new Language();
  
  //initialise the language object api object with cache
  $this->gitapi = new \Github\Client(new \Github\HttpClient\CachedHttpClient(array('cache_dir' => GITHUB_CACHE_DIR)));
  
 }

}
