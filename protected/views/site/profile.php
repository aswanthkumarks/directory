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
<b class='dir_type'><?php echo $itm['dir']; ?></b><br/>
<span class='details'><?php echo $itm['address']; ?> </span><br/>
<span class='details'>Pin: <?php echo $itm['pin']; ?> </span><br/>
<span class='details'><?php echo $itm['city_name']; ?> </span><br/>
<span class='details'><?php echo $itm['state_name']; ?> </span><br/>
<p class='details'><?php echo $itm['desc']; ?></p>
<b>Phone</b>
<?php 

$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>Phone::model()->get_phonenos($_GET['id']),
		'ajaxUpdate' => true,
		'itemView'=>'_phones',
		'itemsCssClass'=>'phonenos',
		'template'=>'{items} {pager}',
));
?>
<br style='clear:both;'/>
<b >Emails</b>
<?php 
$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>Emails::model()->get_emails($_GET['id']),
		'ajaxUpdate' => true,
		'itemView'=>'_emails',
		'itemsCssClass'=>'phonenos',
		'template'=>'{items} {pager}',
));
?>








</div>

<div class='imagelist'>
<b>Images</b>
<?php 
$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>Images::model()->get_images($_GET['id']),
		'ajaxUpdate' => true,
		'itemView'=>'_images',
		'itemsTagName'=>'ul',
		'itemsCssClass'=>'images',
		'template'=>'{items} {pager}',
));
?>
<div style='clear:both;'></div>
</div>


</div>
<div>
<h3>Other <?php echo $itm['dir']; ?> in <?php echo $itm['city_name']; ?></h3>
<?php 
	$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>Singlefill::model()->list_other_items($itm['city_id'],$itm['type_id'],$_GET['id']),
			'id'=>'matterit',
			'ajaxUpdate' => true,
			'itemView'=>'_profilelist',
			'itemsTagName'=>'ul',
			'itemsCssClass'=>'listdir port-det port-thumb',
	));
	
?>
</div>