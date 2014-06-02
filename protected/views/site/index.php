<?php
/* @var $this SiteController */

$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'id'=>'matterit',
		'ajaxUpdate' => true,
		'itemView'=>'_home_views',
		'itemsTagName'=>'ul',
		'itemsCssClass'=>'listdir port-det port-thumb',
));

 
?>
<div style='clear:both;'></div>