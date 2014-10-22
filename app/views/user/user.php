<div class="row well">
 <div class="col-sm-4">
  <div class="row">
   <div class="col-sm-12"><img class="img-thumbnail img-responsive" src="<?php echo $data['user']['avatar_url']?>" alt="<?php echo $data['user']['name']?>" /></div>
  </div>
  <div class="row">
   <div class="text-center top-bot-margin-18"><button name="like" type="button" class="btn btn-default" data-like-type="U" data-to-id="<?php echo $data['user']['id']; ?>"><span class="<?php echo $data['user']['icon_class']; ?>"></span> Like</button></div>
  </div>
 </div>
 <div class="col-sm-8">
  <?php if ($data['user']['name']) { ?>
  <div class="page-header"><h2><?php echo $data['user']['name']; ?></h2></div>
  <?php } ?>
  <dl class="dl-horizontal">
    <dt><?php echo $data['text_login']; ?></dt><dd><?php echo $data['user']['login']; ?></dd>
    <?php if ($data['user']['company']) { ?>
    <dt><?php echo $data['text_company']; ?></dt><dd><?php echo $data['user']['company']; ?></dd>
    <?php } ?>
    <?php if ($data['user']['blog']) { ?>
    <dt><?php echo $data['text_blog']; ?></dt><dd><a href="<?php echo \helpers\Url::fix_url($data['user']['blog']); ?>"><?php echo \helpers\Url::fix_url($data['user']['blog']); ?></a></dd>
    <?php } ?>
    <dt><?php echo $data['text_followers']; ?></dt><dd><?php echo $data['user']['followers']; ?></dd>
   </dl>
 </div>
</div>
  