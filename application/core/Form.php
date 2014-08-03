<?php
class form
{	public $model;
	function __construct($model)
	{		$this->model=$model;	}
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
	}	public function htmlAttributes($htmlAttributes)
	{		if($htmlAttributes)
	   	{	   		foreach($htmlAttributes as $name=>$value)
	   		{
	   			$attributes[]=$name.'="'.$value.'"';
	   		}
	   		$attributes=implode(' ', $attributes);
   		}
   		if(isset($attributes))return $attributes;	}	public function beginForm($method, $action='', $htmlAttributes="")
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
    {    	$attributes=$this->htmlAttributes($htmlAttributes);    	echo ('
    	<input name="'.$this->model->modelName.'['.$name.']" type="text" '.$htmlAttributes.' />
    	');    }
    public function button($value='Send', $htmlAttributes='')
    {    	$attributes=$this->htmlAttributes($htmlAttributes);    	echo ('
    	<input type="submit" name="'.$this->model->modelName.'[submit]" value="'.$value.'">
    	');
    }}
?>