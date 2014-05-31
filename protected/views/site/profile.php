<?php
$itm=$item->get_profile_details($_GET['id']);
?>
<div class='detailed_profile'>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$itm['img_url'],$itm['name'],array('class' => 'profile_pic') ); ?>
<div class='general_info_box'>
<h1><?php echo $itm['name'];
if($itm['degrees']!='') echo "<span class='degree'> ( ".$itm['degrees']." )</span>"; 
?>
</h1>
<?php echo "<b class='dir_type'> ".$itm['dir']." </b>"; ?> 
</div>


</div>