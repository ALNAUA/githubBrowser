</div>

<script src="<?php echo \helpers\url::get_template_path();?>js/jquery.js"></script>
<script src="<?php echo \helpers\url::get_template_path();?>js/bootstrap.min.js"></script>
<?php echo $data['js']."\n";?>

<script>
function like_unlike(){
 var params = {}, btn = $(this);
 if (btn.children('span:first').hasClass('glyphicon-heart')) {
  params = {
   method : 'like',
   addClass : 'glyphicon-remove',
   removeClass : 'glyphicon-heart',
   to_id : btn.attr('data-to-id'),
   type : btn.attr('data-like-type')
  };
 } else {
  params = {
   method : 'unlike',
   addClass : 'glyphicon-heart',
   removeClass : 'glyphicon-remove',
   to_id : btn.attr('data-to-id'),
   type : btn.attr('data-like-type')
  };
 }
 $.ajax({
   type: 'get',
   data: ({to_id : params.to_id, type : params.type}),
   url: '<?php echo DIR;?>repo/' + params.method,
   success: function () {
    btn.children('span:first').removeClass(params.removeClass).addClass(params.addClass);
   }
  });
};

$(document).ready(function(){
 <?php echo $data['jq']."\n";?>
 
 $("button[name='like']").each(function() {
  $(this).bind('click', like_unlike);
 });
});
</script>

</body>
</html>
