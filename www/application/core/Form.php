<?php
class form
{
	function __construct($model)
	{
	public function recordErrors()
	{
		if($this->model->recordErrors)
			{
			echo ('
			<div class="recordErrors">
				<div class="recordErrorHeader">
					Допущены ошибки:
				</div>
			');
			foreach($this->model->recordErrors as $key=>$error)
			{
				echo ('
				<div class="recordError">
					'.$error.'
				</div>
				');
			}
			echo ('
			</div>
			');
		}
	}
	{
	   	{
	   		{
	   			$attributes[]=$name.'="'.$value.'"';
	   		}
	   		$attributes=implode(' ', $attributes);
   		}
   		if(isset($attributes))return $attributes;
    {
    	$attributes=$this->htmlAttributes($htmlAttributes);
    	echo ('
    	<form method="'.$method.'" action="'.$action.'" '.$attributes.'>
    	');
    }
    public function endForm()
    {
    	echo ('
    	</form>
    	');
    }
    public function input($name, $htmlAttributes='')
    {
    	<input name="'.$this->model->modelName.'['.$name.']" type="text" '.$htmlAttributes.' />
    	');
    public function button($value='Send', $htmlAttributes='')
    {
    	<input type="submit" name="'.$this->model->modelName.'[submit]" value="'.$value.'">
    	');

?>