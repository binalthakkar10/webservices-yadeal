<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('currency-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'currency-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'currency_name',
			 array('class'=>'CButtonColumn',
    'template'=>'{update} {delete}',
    'buttons'=>array (
        'update'=> array(
            'label'=>'',
            'imageUrl'=>'',
            'options'=>array( 'class'=>'icon-edit','title'=>'edit' ),
        ),
                'delete'=>array(
            'label'=>'',
            'imageUrl'=>'',
            'options'=>array( 'class'=>'icon-trash','title'=>'delete' ),
        ),
    ),
),
	),
)); ?>