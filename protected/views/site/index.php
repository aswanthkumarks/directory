<?php
/* @var $this SiteController */

 

$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$item->list_items(),
		'id'=>'matterit',
		'ajaxUpdate' => true,
		'itemView'=>'_home_views',
		'itemsTagName'=>'ul',
		'itemsCssClass'=>'listdir port-det port-thumb',
));

 
?>
<div style='clear:both;'></div>