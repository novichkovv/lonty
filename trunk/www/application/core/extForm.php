<?
class extForm extends form
{
	public $modelAttributes;
	public $modelRules;
	{
		$this->modelAttributes=$this->model->attributes();
		$this->modelRules=$this->model->rules();
	public function endForm()
	{
    	</form>
    	');
    	if($this->modelRules)
    	{
	    	echo ('
	    	<script type="text/javascript">
	    		fields = {
	    	');
	    		foreach($this->modelRules as $field=>$rules)
	    		{
	    			"'.$field.'":[
	    			');
	    			foreach($rules as $key=>$vol)
	    			{
	    				{
	    					if(is_array($vol[key($vol)]))
	    					{
	    						foreach($vol[key($vol)] as $k=>$v)
	    						{
	    						echo ']},';
	    					}
	    					else echo '"'.$vol[key($vol)].'"},';
	    				else
	    					echo '"'.$vol.'",';
	    			echo ('],');
	   		echo ('};
	    	</script>
	    	');
	  	}
	public function input($name, $htmlAttributes="")
	{
		if(!isset($_POST[$this->model->modelName][$name]))$_POST[$this->model->modelName][$name]="";
		echo ('
		<div class="formEl">
			<div class="formElLabel">
				'.$this->modelAttributes[$name].'
			</div>
			<div class="formField">
				<input type="text" name="'.$this->model->modelName.'['.$name.']" value="'.$_POST[$this->model->modelName][$name].'" '.$htmlAttributes.'
					id="'.$name.'" class="input" />
				<div class="validIcon" id="validIcon_'.$name.'">
			</div>
			</div>
			<div class="validWarning" id="validWarning_'.$name.'">
			</div>
		</div>
		');
	public function passwordInput($name, $htmlAttributes="")
	{
		$attributes=$this->htmlAttributes($htmlAttributes);
		echo ('
		<div class="formEl">
			<div class="formElLabel">
				'.$this->modelAttributes[$name].'
			</div>
			<div class="formField">
				<input type="password" name="'.$this->model->modelName.'['.$name.']" '.$htmlAttributes.'
					id="'.$name.'" class="input" />
				<div class="validIcon" id="validIcon_'.$name.'">
			</div>
			</div>
			<div class="validWarning" id="validWarning_'.$name.'">
			</div>
		</div>
		<div class="formEl">
			<div class="formElLabel">
				Подтвердите '.$this->modelAttributes[$name].'
			</div>
			<div class="formField">
				<input type="password" name="'.$this->model->modelName.'[confirm_'.$name.']" '.$htmlAttributes.'
					id="confirm_'.$name.'" class="input" />
				<div class="validIcon" id="validIcon_confirm_'.$name.'">
			</div>
			</div>
			<div class="validWarning" id="validWarning_confirm_'.$name.'">
			</div>
		</div>
		');
	}
?>