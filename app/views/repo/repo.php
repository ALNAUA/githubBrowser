<div class="row">
 <div class="col-sm-6">
  <div class="well">
   <div class="page-header"><h2><?php echo $data['repo']['full_name']; ?></h2></div>
   <dl class="dl-horizontal">
    <dt><?php echo $data['text_description']; ?></dt><dd><?php echo $data['repo']['description']; ?></dd>
    <dt><?php echo $data['text_watchers']; ?></dt><dd><?php echo $data['repo']['watchers']; ?></dd>
    <dt><?php echo $data['text_forks']; ?></dt><dd><?php echo $data['repo']['forks']; ?></dd>
    <dt><?php echo $data['text_open_issues']; ?></dt><dd><?php echo $data['repo']['open_issues']; ?></dd>
    <?php if ($data['repo']['homepage']) { ?>
    <dt><?php echo $data['text_home_page']; ?></dt><dd><a href="<?php echo $data['repo']['homepage']; ?>"><?php echo $data['repo']['homepage']; ?></a></dd>
    <?php } ?>
    <dt><?php echo $data['text_github_repo']; ?></dt><dd><a href="<?php echo $data['repo']['html_url']; ?>"><?php echo $data['repo']['html_url']; ?></a></dd>
    <dt><?php echo $data['text_created_at']; ?></dt><dd><?php echo $data['repo']['created_at']; ?></dd>
   </dl>
   
  </div>
 </div>
 <div class="col-sm-6 pull-right">
  <div class="well">
   <div class="page-header"><h2><?php echo $data['text_contributors']; ?></h2></div>
   <table class="table table-hover table-condensed table-striped"><tbody>
   <?php foreach ($data['contributors'] as $contributor) { ?>
    <tr class="row">
    <td class="col-sm-2">
      <a href="<?php echo DIR; ?>user/<?php echo $contributor['login']; ?>">
        <img class="img-circle col-sm-12" src="<?php echo $contributor['avatar_url']?>" alt="<?php echo $contributor['login']?>" />
      </a>
    </td>
    <td class="col-sm-4">
     <a href="<?php echo DIR; ?>user/<?php echo $contributor['login']; ?>"><?php echo $contributor['login']?></a>
    </td>
    <td class="col-sm-2">
     <button name="like" type="button" class="btn btn-default" data-like-type="U" data-to-id="<?php echo $contributor['id']; ?>"><span class="<?php echo $contributor['icon_class']; ?>"></span> Like</button>
    </td>
   </tr>
   <?php } ?>
   </tbody></table>
  </div>
 </div>
</div>
