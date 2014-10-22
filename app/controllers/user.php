<?php namespace controllers;
use core\view as View,
    helpers\url as Url;

class User extends \core\controller{
 
 private $_githublikes;
 
 public function __construct(){
  parent::__construct();

  $this->language->load('user');
  
  $this->_githublikes = new \models\githublikes();
 }

 public function index($user_name){
  
  $data['title'] = sprintf($this->language->get('title'), SITETITLE);
  $data['h1'] = sprintf(H1STATIC, $this->language->get('h1'));
  
  $data['text_login'] = $this->language->get('text_login');
  $data['text_company'] = $this->language->get('text_company');
  $data['text_blog'] = $this->language->get('text_blog');
  $data['text_followers'] = $this->language->get('text_followers');
  
  $user = $this->gitapi->api('user')->show($user_name);
  
  $githublikes = $this->_githublikes->getUserLikes();
  
  $userlikes_array = array();
  
  foreach ($githublikes as $like) {
   $userlikes_array[] = $like->to_id;
  }
  
  $data['user'] = array (
      'id' => $user['id'],
      'avatar_url' => $user['avatar_url'],
      'name' => $user['name'],
      'login' => $user['login'],
      'company' => $user['company'],
      'blog' => ($user['blog'] ? Url::fix_url($user['blog']) : ''),
      'followers' => $user['followers'],
      'icon_class' => (in_array($user['id'], $userlikes_array) ? 'glyphicon glyphicon-remove' : 'glyphicon glyphicon-heart')
  );
  
  
  
  View::rendertemplate('header', $data);
  View::render('user/user', $data);
  View::rendertemplate('footer', $data);
 }

}
