<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title><?php echo $data['title']?></title>
 
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <link href="<?php echo \helpers\url::get_template_path();?>css/bootstrap.css" rel="stylesheet">
 <link href="<?php echo \helpers\url::get_template_path();?>css/style.css" rel="stylesheet">
</head>
<body>
<div class="row well text-nowrap">
 <div class="col-sm-8">
  <h1><?php echo $data['h1']; ?></h1>
 </div>
 <div class="col-sm-3 search-form-margin">
  <form class="form-inline text-nowrap" role="form" action="/search" method="GET">
   <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
      <input class="form-control" type="text" placeholder="Search Repository..." name="search_query">
    </div>
   </div>
   <button type="submit" class="btn btn-default">Search</button>
  </form>
 </div>
</div>
<div class="container">
