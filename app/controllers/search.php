<?php namespace controllers;
use core\view as View,
    helpers\url as Url;

class Search extends \core\controller{
 
 private $_githublikes;
 
 public function __construct(){
  parent::__construct();

  $this->language->load('search');
  
  $this->_githublikes = new \models\githublikes();
 }

 public function index(){
  
  if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS) == 'GET' && 
          (filter_has_var(INPUT_GET, 'search_query') && filter_input(INPUT_GET, 'search_query', FILTER_SANITIZE_SPECIAL_CHARS) !== '')) {
   
   $search_query = filter_input(INPUT_GET, 'search_query', FILTER_SANITIZE_SPECIAL_CHARS);
   
   $data['title'] = sprintf($this->language->get('title'), SITETITLE);
   $data['h1'] = sprintf(H1STATIC, $this->language->get('h1'));
   
   $data['text_search_found'] = sprintf($this->language->get('text_search_found'), $search_query);
   $data['text_home_page'] = $this->language->get('text_home_page');
   $data['text_owner'] = $this->language->get('text_owner');
   $data['text_watchers'] = $this->language->get('text_watchers');
   $data['text_forks'] = $this->language->get('text_forks');
   
   $data['repositories'] = array();
   
   //Get repositories
   $search_results = $this->gitapi->api('repo')->find($search_query);
   
   $githublikes = $this->_githublikes->getRepoLikes();
  
   $repolikes_array = array();

   foreach ($githublikes as $like) {
    $repolikes_array[] = $like->to_id;
   }
   
   foreach ($search_results['repositories'] as $repo) {
    $data['repositories'][] = array (
        'name' => $repo['name'],
        'homepage' => ($repo['homepage'] ? Url::fix_url($repo['homepage']) : ''),
        'owner' => $repo['owner'],
        'description' => $repo['description'],
        'watchers' => $repo['watchers'],
        'forks' => $repo['forks'],
        'icon_class' => (in_array($repo['owner'].'/'.$repo['name'], $repolikes_array) ? 'glyphicon glyphicon-remove' : 'glyphicon glyphicon-heart')
    );
   }
   
  
  } else {
   $data['title'] = sprintf($this->language->get('error_search'), SITETITLE);
   $data['h1'] = sprintf(H1STATIC, $this->language->get('h1'));
   
   $data['text_search_found'] = sprintf($this->language->get('text_search_found'), '');
   $data['error_search'] = $this->language->get('error_search');
   
   $data['repos'] = array();
   
  }
  
  View::rendertemplate('header', $data);
  View::render('search/search', $data);
  View::rendertemplate('footer', $data);
 }

}
