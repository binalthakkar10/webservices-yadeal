<script>
$(document).ready(function(){
	setTimeout(function(){ $(".flash-error").hide(); },3000);
	setTimeout(function(){ $(".flash-success").hide(); },3000);
});
</script>
<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'offers-form',
	'enableAjaxValidation' => false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
        'validateOnChange'=>true,
		'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
<?php
	    foreach(Yii::app()->admin->getFlashes() as $key => $message) {
	        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	    }
?>
	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id',UserDetail::getUserFirstName(),array('empty'=>'Select User')); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->errorSummary($model); ?>
		<?php echo $form->labelEx($model,'offer_name'); ?>
		<?php echo $form->textField($model, 'offer_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'offer_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'offer_text'); ?>
		<?php echo $form->textField($model, 'offer_text', array('maxlength' => 250)); ?>
		<?php echo $form->error($model,'offer_text'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'offer_link'); ?>
		<?php echo $form->textField($model, 'offer_link', array('maxlength' => 1000)); ?>
		<?php echo $form->error($model,'offer_link'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'offer_price'); ?>
		<?php echo $form->textField($model, 'offer_price'); ?>
		<?php echo $form->error($model,'offer_price'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'currency_id'); ?>
		<?php echo $form->dropDownList($model, 'currency_id', GxHtml::listDataEx(Currency::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'currency_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cat_id'); ?>
       		<?php $cat_lang= Category::model()->findAll('parent_id NOT IN(0)');?>	
		<select id="Offers_cat_id" name="Offers[cat_id]">
			<option value=""> Select Category</option>	
			<?php
			foreach($cat_lang as $language){ ?>
			<option value="<?php echo $language['cat_id']; ?>" <?php if($language['cat_id']==$model->cat_id){ echo "selected=selected" ;} ?>><?php  echo $language['cat_name']; ?></option>	
			<?php } ?>
		</select>	
		<?php echo $form->error($model,'cat_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model, 'discount'); ?>
		<?php echo $form->error($model,'discount'); ?>
		</div><!-- row -->
				<!---- Country -->
		<?php if($model->isNewRecord=='1'){ ?>
		<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
       		<?php $countryData= Country::model()->findAll();?>	
		<select id="cmdCountryId" name="Offers[country]">
			<option value=""> Select Country</option>	
			<?php if($countryData){
			foreach($countryData as $country){ ?>
			<option value="<?php echo $country['country_id']; ?>"><?php  echo $country['country_name']; ?></option>	
			<?php }} ?>
		</select>	
		<?php echo $form->error($model,'country'); ?>
		</div><!-- row -->
		<?php }else{?>
		<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
       		<?php $countryData= Country::model()->findAll();?>	
		<select id="cmdCountryId" name="Offers[country]">
			<option value=""> Select Country</option>	
			<?php if($countryData){
			foreach($countryData as $country){ ?>
			<option value="<?php echo $country['country_id']; ?>"<?php if($country['country_id']==$model->country){ echo "selected=selected" ;} ?>><?php  echo $country['country_name']; ?></option>	
			<?php }} ?>
		</select>	
		<?php echo $form->error($model,'country'); ?>
		</div><!-- row -->	
		<?php } ?>
		
	<!-- Country --->	

<!--- City -->
<?php if($model->isNewRecord=='1'){ ?>
		<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>	
		<select id="cmdCityId" name="Offers[location]">
			<option value=""> Select City</option>	
		</select>	
		<?php echo $form->error($model,'location'); ?>
		</div><!-- row -->
		<?php }else{ ?>
			<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
       		<?php $cityData= City::model()->findAll();?>	
		<select id="cmdCityId" name="Offers[location]">
			<option value=""> Select City</option>	
	<?php
			if($cityData){
			foreach($cityData as $city){ ?>
			<option value="<?php echo $city['city_id']; ?>" <?php if($city['city_id']==$model->location){ echo "selected=selected" ;} ?>><?php  echo $city['city_name']; ?></option>	
			<?php }} ?> 
		</select>	
		<?php echo $form->error($model,'location'); ?>
		</div><!-- row -->
		<?php } ?>
	<!-- City -->	
		<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model, 'address1'); ?>
		<?php echo $form->error($model,'address1'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model, 'address2'); ?>
		<?php echo $form->error($model,'address2'); ?>
		</div><!-- row -->

		
		
				<?php if($model->isNewRecord!='1'){ ?>
		<div class="row">	      	
		<?php echo $form->labelEx($model,'image',array('required' => true));?>
		<?php echo $form->fileField($model, 'image', array('maxlength' => 100)); 
		$path =  YiiBase::getPathOfAlias('webroot');
		if($model->image!='' && file_exists($path."/upload/OfferImage/$model->image"))
		{
			 echo CHtml::image(Yii::app()->request->baseUrl.'/upload/OfferImage/'.$model->image,"image",array("width"=>80)); 
		}else{
			echo CHtml::image(Yii::app()->request->baseUrl.'/upload/OfferImage/images.jpg',"image",array("width"=>80)); 
		}?>
		<input type="hidden" name='Offers[image]' id='Music_file1' value='<?php echo $model->image;?>' /> 
		<?php echo $form->error($model,'image'); ?>
		</div><!-- row -->
		<?php }else{ ?>
		<div class="row">
		<?php echo $form->labelEx($model,'image',array('required' => true));?>
		<?php echo $form->fileField($model, 'image', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'image'); ?>	
		</div><!-- row -->
		<?php }?>
		<div class="row">
		<?php echo $form->labelEx($model,'offer_start_date'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
    			  $this->widget('CJuiDateTimePicker',array(
                  'model'=>$model, //Model object
                  'attribute'=>'offer_start_date', //attribute name
                  'language'=>'',
                  'mode'=>'datetime', //use "time","date" or "datetime" (default)
                  'htmlOptions'=>array('readonly'=>"readonly"),
                  'options'=>array(
                  	'regional'=>'en_us',
      			  'timeFormat'=>'hh:mm:ss',				
				  'minDate' => 'today', // to allow selection of dates upto today only
                'dateFormat' => 'd-m-yy') // jquery plugin options
  			  ));
			?>
		<?php echo $form->error($model,'offer_start_date'); ?>
		</div><!-- row -->
			<div class="row">
		<?php echo $form->labelEx($model,'offer_end_date'); ?>
			<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
    			  $this->widget('CJuiDateTimePicker',array(
                  'model'=>$model, //Model object
                  'attribute'=>'offer_end_date', //attribute name
                  'language'=>'',
                  'mode'=>'datetime', //use "time","date" or "datetime" (default)
                   'htmlOptions'=>array('readonly'=>"readonly"),
                  'options'=>array(
                  	'regional'=>'en_us',
      			  'timeFormat'=>'hh:mm:ss',	
				   'minDate' => 'today', // to allow selection of dates upto today only
                'dateFormat' => 'd-m-yy') // jquery plugin options
  			  ));
			?>
		<?php echo $form->error($model,'offer_end_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'no_of_deals'); ?>
		<?php echo $form->textField($model, 'no_of_deals'); ?>
		<?php echo $form->error($model,'no_of_deals'); ?>
		<div class="row">
		<?php echo CHtml::activeLabel($model,'zipcode',array('required' => true)); ?>
		<input type="text" id="zipcode">
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model, 'latitude',array('id'=>'lat','readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'latitude'); ?>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model, 'longitude',array('id'=>'long','readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'longitude'); ?>
		</div>	


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
<script>
$(document).ready(function(){
  $("#zipcode").blur(function(){
  	var zipcode =$("#zipcode").val();
    $.ajax({
       url : "http://maps.googleapis.com/maps/api/geocode/json?components=postal_code:"+zipcode+"&sensor=false",
       method: "POST",
       success:function(data){
           latitude = data.results[0].geometry.location.lat;
           longitude= data.results[0].geometry.location.lng;
           $("#lat").val(latitude);
           $("#long").val(longitude);
       }

    });
  });
    $("#cmdCountryId").on("change",function(event){
	event.preventDefault();
	 var country_name = $('#cmdCountryId').val();
	 $.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/admin/UserDetail/GetCity',
			data: "country_name="+country_name,
			cache:false,
			async:true,
			beforeSend: function(data){
				},
			success: function(data)
                        {
                        		$("#cmdCityId").html(data);
						}
			});			
});
});
</script>