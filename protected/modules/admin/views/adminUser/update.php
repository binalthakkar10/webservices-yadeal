<?php
$this->breadcrumbs=array(
	'User'=>array('admin'),
	//$model->username=>array('view','id'=>$model->id),
	'Update',
);

	 
	/*if(Yii::app()->admin->id==$model->id) {
		$this->menu=array(
			array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
			array('label'=>'Create User', 'url'=>array('create')),
			array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
			array('label'=>'Manage User', 'url'=>array('admin')),
			array('label'=>'Change Password', 'url'=>array('change', 'id'=>$model->id)),
		);
	}else {
		$this->menu=array(
		array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
		array('label'=>'Create User', 'url'=>array('create')),
		array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage User', 'url'=>array('admin')),
		array('label'=>'Change Password', 'url'=>array('change', 'id'=>$model->id)),
		);
	}*/
?>

<h1>Update  <?php echo $model->firstname." ". $model->lastname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php 
	$controller = Yii::app()->controller->id;
	$action = Yii::app()->controller->action->id;
	if($controller == 'adminUser' && $action == 'update'){
?>
<script>
$(document).ready(function(){
	$("div#sidebar-left ul li.users").each(function(){
		var span_val=$("div#sidebar-left ul li.users").find('span').attr('id');
		if(span_val == 'users'){
			$("div#sidebar-left ul li.users").addClass('active');
		}
	});
});
</script>
<?php } ?>