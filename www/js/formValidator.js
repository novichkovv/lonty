$j=jQuery.noConflict();
$j(document).ready(function()
{	$j(".input").keyup(function(event)
	{		var field=$j(this).attr("id");		formWarnings(fields, field);	});});
function formWarnings(fields, field)
{	var warning=false;	if(typeof(fields[field])==="object")
	{
		for(var rul in fields[field])
		{
			if(typeof(fields[field][rul])==="object")
			{
				for(var rule in fields[field][rul])
				{
					var value=fields[field][rul][rule]
					switch(rule)
					{
						case 'max':
						{
							if($j('#'+field).val().length>value)
							{								$j("#validWarning_"+field).html('Поле может содержать не более '+value+' знаков!');
								warning=true;
								$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');							}
						}
						break;
						case 'min':
						{
							if($j('#'+field).val().length<value && $j('#'+field).val()!='')
							{
								$j("#validWarning_"+field).html('Поле может содержать не менее '+value+' знаков!');
								warning=true;
								$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
							}
						}
						break;
						case 'preg':
						{							for(var i=0; i<value.length; i++)
							{								if(value[i]=='engInt')
								{									var regExp=new RegExp("^[-a-zA-Z0-9]+$");
									if(!regExp.test($j('#'+field).val()) && $j('#'+field).val()!='')
									{										$j("#validWarning_"+field).html('Недопустимые знаки! Только английские буквы и цифры!');
										warning=true;
										$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');									}
								}
							}
							for(var i=0; i<value.length; i++)
							{
								if(value[i]=='eng')
								{
									var regExp=new RegExp("^[-a-zA-Z]+$");
									if(!regExp.test($j('#'+field).val()) && $j('#'+field).val()!='')
									{
										$j("#validWarning_"+field).html('Недопустимые знаки! Только английские буквы');
										warning=true;
										$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
									}
								}
							}
							for(var i=0; i<value.length; i++)
							{
								if(value[i]=='engSymb')
								{
									var regExp=new RegExp("^[^А-Яа-я]+$");
									if(!regExp.test($j('#'+field).val()) && $j('#'+field).val()!='')
									{
										$j("#validWarning_"+field).html('Недопустимые знаки! Только английские буквы и любые символы!');
										warning=true;
										$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
									}
								}
							}
							for(var i=0; i<value.length; i++)
							{
								if(value[i]=='rusInt')
								{
									var regExp=new RegExp("^[А-Яа-я0-9]+$");
									if(!regExp.test($j('#'+field).val()) && $j('#'+field).val()!='')
									{
										$j("#validWarning_"+field).html('Недопустимые знаки! Только английские буквы и цифры!');
										warning=true;
										$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
									}
								}
							}
							for(var i=0; i<value.length; i++)
							{
								if(value[i]=='rus')
								{
									var regExp=new RegExp("^[А-Яа-я]+$");
									if(!regExp.test($j('#'+field).val()) && $j('#'+field).val()!='')
									{
										$j("#validWarning_"+field).html('Недопустимые знаки! Только английские буквы');
										warning=true;
										$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
									}
								}
							}
							for(var i=0; i<value.length; i++)
							{
								if(value[i]=='rusSymb')
								{
									var regExp=new RegExp("^[^A-Za-z]+$");
									if(!regExp.test($j('#'+field).val()) && $j('#'+field).val()!='')
									{
										$j("#validWarning_"+field).html('Недопустимые знаки! Только английские буквы и любые символы!');
										warning=true;
										$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
									}
								}
							}
							for(var i=0; i<value.length; i++)
							{
								if(value[i]=='url')
								{
									var regExp=new RegExp("(?:(?:ht|f)tps?://)?(?:[\\-\\w]+:[\\-\\w]+@)?(?:[0-9a-zа-я][\\-0-9a-zа-я]*[0-9a-zа-я]\\.)+[a-zа-я]{2,6}");
									if(!regExp.test($j('#'+field).val()) && $j('#'+field).val()!='')
									{
										$j("#validWarning_"+field).html('Пример: "example.com", "http:\\\\examle.com", "www.examle.com"');
										warning=true;
										$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
									}
								}
							}						}
					}
				}
			}
			else
			{
				var rule=fields[field][rul];
				switch(rule)
				{
					case 'required':
					{						if($j('#'+field).val()=='')
						{
							$j("#validWarning_"+field).html('Поле не может быть пустым!');
							warning=true;
							$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
						}
			        }
			        break;
			        case 'password':
			        {			        	$j('#confirm_'+field).keyup(function()
			        	{			        		if($j('#'+field).val()=='')
			        		{			        			$j("#validWarning_confirm_"+field).html('Сначала введите первый раз!');
								warning=true;
								$j("#validIcon_confirm_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');			 				}				        	else if($j('#confirm_'+field).val()!=$j('#'+field).val())
							{
								$j("#validWarning_confirm_"+field).html('Поля должны совпадать!');
								warning=true;
								$j("#validIcon_confirm_"+field).html('<img src="http://'+window.location.host+'/images/main/no.jpg" />');
							}
						});					}
				}
			}
		}
	}
	if(!warning)
	{		$j("#validWarning_"+field).html('');
		$j("#validIcon_"+field).html('<img src="http://'+window.location.host+'/images/main/yes.jpg" />');
	}}