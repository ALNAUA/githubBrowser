<?php namespace controllers;
use core\view as View,
    helpers\url as Url;

class Repo extends \core\controller{
 
 private $_githublikes;

 public function __construct(){
  parent::__construct();

  $this->language->load('repo');
  
  $this->_githublikes = new \models\githublikes();
 }

 public function index(){
  
  //use default
  $owner = GITHUB_DEFOWNER;
  $repo = GITHUB_DEFREPO;
  
  $data['title'] = sprintf($this->language->get('title'), SITETITLE);
  $data['h1'] = sprintf(H1STATIC, $this->language->get('h1'));
  $data['text_description'] = $this->language->get('text_description');
  $data['text_watchers'] = $this->language->get('text_watchers');
  $data['text_forks'] = $this->language->get('text_forks');
  $data['text_open_issues'] = $this->language->get('text_open_issues');
  $data['text_home_page'] = $this->language->get('text_home_page');
  $data['text_github_repo'] = $this->language->get('text_github_repo');
  $data['text_created_at'] = $this->language->get('text_created_at');
  
  $data['text_contributors'] = $this->language->get('text_contributors');
  
  //Prepare repository info
  $repository_info = $this->gitapi->api('repo')->show($owner, $repo);
  
  $data['repo'] = array(
      'id' => $repository_info['id'],
      'full_name' => $repository_info['full_name'],
      'description' => $repository_info['description'],
      'watchers' => $repository_info['watchers'],
      'forks' => $repository_info['forks'],
      'open_issues' => $repository_info['open_issues'],
      'homepage' => ($repository_info['homepage'] ? Url::fix_url($repository_info['homepage']) : ''),
      'html_url' => $repository_info['html_url'],
      'created_at' => $repository_info['created_at'],
  );
  
  //Prepare contributors
  $contributors = $this->gitapi->api('repo')->contributors($owner, $repo);

  $githublikes = $this->_githublikes->getUserLikes();
  
  $userlikes_array = array();
  
  foreach ($githublikes as $like) {
   $userlikes_array[] = $like->to_id;
  }
  
  foreach ($contributors as $contributor) {
   $data['contributors'][] = array(
       'id' => $contributor['id'],
       'login' => $contributor['login'],
       'avatar_url' => $contributor['avatar_url'],
       'icon_class' => (in_array($contributor['id'], $userlikes_array) ? 'glyphicon glyphicon-remove' : 'glyphicon glyphicon-heart')
   );
  }
  
  View::rendertemplate('header', $data);
  View::render('repo/repo', $data);
  View::rendertemplate('footer', $data);
 }
 
  public function info($owner, $repo){
  
  $repository_info = $this->gitapi->api('repo')->show($owner, $repo);
  
  $data['title'] = $repository_info['full_name'].SITETITLE;
  $data['h1'] = sprintf(H1STATIC, $repository_info['full_name']);
  $data['text_description'] = $this->language->get('text_description');
  $data['text_watchers'] = $this->language->get('text_watchers');
  $data['text_forks'] = $this->language->get('text_forks');
  $data['text_open_issues'] = $this->language->get('text_open_issues');
  $data['text_home_page'] = $this->language->get('text_home_page');
  $data['text_github_repo'] = $this->language->get('text_github_repo');
  $data['text_created_at'] = $this->language->get('text_created_at');
  
  $data['text_contributors'] = $this->language->get('text_contributors');
  
  $data['repo'] = array(
      'id' => $repository_info['id'],
      'full_name' => $repository_info['full_name'],
      'description' => $repository_info['description'],
      'watchers' => $repository_info['watchers'],
      'forks' => $repository_info['forks'],
      'open_issues' => $repository_info['open_issues'],
      'homepage' => ($repository_info['homepage'] ? Url::fix_url($repository_info['homepage']) : ''),
      'html_url' => $repository_info['html_url'],
      'created_at' => $repository_info['created_at']
  );
  
  //Prepare contributors
  $contributors = $this->gitapi->api('repo')->contributors($owner, $repo);

  //$githublikes = $this->_githublikes->getUserLikes($this->gitapiuser['id']);
  $githublikes = $this->_githublikes->getUserLikes();
  
  $userlikes_array = array();
  
  foreach ($githublikes as $like) {
   $userlikes_array[] = $like->to_id;
  }
  
  foreach ($contributors as $contributor) {
   $data['contributors'][] = array(
       'id' => $contributor['id'],
       'login' => $contributor['login'],
       'avatar_url' => $contributor['avatar_url'],
       'icon_class' => (in_array($contributor['id'], $userlikes_array) ? 'glyphicon glyphicon-remove' : 'glyphicon glyphicon-heart')
   );
  }
  
  View::rendertemplate('header', $data);
  View::render('repo/repo', $data);
  View::rendertemplate('footer', $data);
 }
 
 public function like(){
  
  if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS) == 'GET' && 
          (filter_has_var(INPUT_GET, 'to_id') && filter_input(INPUT_GET, 'to_id', FILTER_SANITIZE_SPECIAL_CHARS) !== '') &&
          (filter_has_var(INPUT_GET, 'type') && filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS) !== '')) {
   
   $to_id = filter_input(INPUT_GET, 'to_id', FILTER_SANITIZE_SPECIAL_CHARS);
   $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
  
  
   $data = array(
       'to_id' => $to_id,
       'type' => $type
   );
   
   $this->_githublikes->addGitHubLikes($data);
  
  }
 }
 
  public function unlike(){
  
  if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS) == 'GET' && 
          (filter_has_var(INPUT_GET, 'to_id') && filter_input(INPUT_GET, 'to_id', FILTER_SANITIZE_SPECIAL_CHARS) !== '') &&
          (filter_has_var(INPUT_GET, 'type') && filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS) !== '')) {
   
   $to_id = filter_input(INPUT_GET, 'to_id', FILTER_SANITIZE_SPECIAL_CHARS);
   $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
  
   $data = array(
       'to_id' => $to_id,
       'type' => $type
   );

   $this->_githublikes->deleteGitHubLikes($data);
  
  }
 }

}
