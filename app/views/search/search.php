<div class="row">
 <div><h2><?php echo $data['text_search_found']; ?></h2></div>
 <?php if (isset($data['error_search'])) { ?>
 <div class="alert alert-error">
  <strong><?php echo $data['error_search']; ?></strong>
 </div>
 <?php } else { ?>
  <?php if (count($data['repositories']) > 0) { ?>
   <?php foreach ($data['repositories'] as $repo) { ?>
   <div class="row well well-small">
    <div class="row">
     <div class="search-repository-header pull-left"><a href="repo/<?php echo $repo['owner']; ?>/<?php echo $repo['name']; ?>"><h3><?php echo $repo['name']; ?></h3></a></div>
     <?php if ($repo['homepage']) { ?>
     <div class="search-repository-header search-header-margin pull-left">
      <span class="label label-success"><?php echo $data['text_home_page']; ?></span> <a class="label label-info" href="<?php echo $repo['homepage']; ?>"><?php echo $repo['homepage']; ?></a>
     </div>
     <?php } ?>
     <div class="search-repository-header search-header-margin pull-left"><span class="label label-success"><?php echo $data['text_owner']; ?></span> <a class="label label-info" href="user/<?php echo $repo['owner']; ?>"><?php echo $repo['owner']; ?></a></div>
    </div>
    <div class="row">
     <div class="col-sm-12 alert alert-info"><?php echo $repo['description']; ?></div>
    </div>
    <div class="row">
     <div class="col-sm-4 search-footer-margin"><span class="label label-default"><?php echo $data['text_watchers']; ?></span> <span class="badge"><?php echo $repo['watchers']; ?></span></div>
     <div class="col-sm-4 text-center search-footer-margin"><span class="label label-default"><?php echo $data['text_forks']; ?></span> <span class="badge"><?php echo $repo['forks']; ?></span></div>
     <div class="col-sm-4 pull-right text-right"><button name="like" type="button" class="btn btn-default" data-like-type="R" data-to-id="<?php echo $repo['owner']; ?>/<?php echo $repo['name']; ?>"><span class="<?php echo $repo['icon_class']; ?>"></span> Like</button></div>
    </div>
   </div>
   <?php }?>
  <?php }?>
 <?php }?>
</div>