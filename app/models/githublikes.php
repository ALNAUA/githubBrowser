<?php namespace models;

class GitHubLikes extends \core\model {
  function __construct(){
   parent::__construct();
  }
  
  public function getUserLikes(){
   return $this->_db->select("select to_id from ".PREFIX."githublikes where type = 'U'");
  }
  
  public function getRepoLikes(){
   return $this->_db->select("select to_id from ".PREFIX."githublikes where type = 'R'");
  }
  
  public function addGitHubLikes($data){
   return $this->_db->insert(PREFIX."githublikes", $data);
  }
  
  public function deleteGitHubLikes($data){
   return $this->_db->delete(PREFIX."githublikes", $data);
  }
}