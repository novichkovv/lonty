$j=jQuery.noConflict();
$j(document).ready(function()
{	loadPicture();
	addPassage();
	addRubricForm();});
function addRubricForm()
{	$j(".addRubric").click(function(event)
	{		var id = $j(this).attr('id');
		var new_id = parseInt(id) + 1;		$j(".rubrics").append('\
		<div class="addRubricForm">\
			<form name="rubric" method="post">\
				<label>Введите название рубрики</label><br />\
				<input id="addRubricInput"  name="rubrics[rubric_name]" type="text" value="" />\
				<div class="cansAddRubric" class="smallButton">Отменить</div>\
				<div id="addRubricButton" class="smallButton">Сохранить</div>\
			</form>\
		</div>\
		');
		addRubric();
		$j(".addRubric").css('display','none');
		$j(".cansAddRubric").click(function()
		{			$j(".addRubricForm").remove();
			$j(".addRubric").css('display','block');		});	});}
function addRubric()
{	$j("#addRubricButton").click(function()
	{		alert(location.hostname + "/admin/ajax/");		var rubric = $j(".addRubricInput").val();		$j.ajax(
		{
			url: location.hostname + "/admin/ajax/",
			data: "addRubricAction/",
			success: function(result)
			{				alert(result);
				$j('#rubricsTable').append(result);
			}
		});
	});}
function loadPicture()
{
	$j(".loadButton").unbind("click");
	$j(".loadButton").one("click", function(event)
	{
		var temp=$j("#temp").val();
		var id=$j(this).attr("id").substr(4);
		var newId=parseInt(id)+1;
		var imgName=$j(this).attr("imgName");
		var btnUpload=jQuery('#upload'+id);
		var status=jQuery('#status'+id);
		var type = $j('input[name="passages['+id+'][passage_imgtype]"]:checked').val();
		new AjaxUpload(btnUpload,
		{
			action: 'http://'+document.location.hostname+'/admin/loadpic/'+type,
			name: 'images/pictures/temp/'+imgName,
			onSubmit: function(file, ext)
			{
				//$j("#preview").html('');
				if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext)))
				{
					$j('#preview'+id+' img').remove();
					status.text('Поддерживаемые форматы JPG, PNG или GIF');
					return false;
				}
				status.text('Загрузка...');
			},
			onComplete: function(file, response)
			{
				status.text('');
				if(response)
				{
					$j('#deleteDiv'+id).remove();
					$j('#span'+id).remove();
					$j('#preview'+id+' img').remove();
					$j('#preview'+id+' input').remove();
					jQuery('#preview'+id).append(response);
                    $j('#preview'+id+' input').attr('name', id);
                    	var newLoad='<span id="span'+id+'" class="loadButton" imgName="temp'+temp+''+id+'">Изменить</span>';
                    	$j("#upload"+id).html(newLoad);
                    	loadPicture();
				}
				else
				{
					jQuery('#preview'+id).style.display='block';
					jQuery('#preview'+id).appendTo('#avatar').text(file).addClass('error');
				}
			}
		});
	});
}
function addPassage()
{	$j(".addMP").click(function()
	{		var temp=$j("#temp").val();		var oldid=$j(this).attr("id");
		var id=parseInt(oldid)+1;
		var passageHtml='\
		<div class="addPassage">\
		 	<div class="label">\
			название абзаца:\
			</div>\
		 	<textarea name="passages['+id+'][passage_header]" cols="50" rows="3"></textarea>\
		 	<div class="label">\
			Добавьте изображение:\
			</div>\
			Тип изображения: <input name="passages['+id+'][passage_imgtype]" type="radio" value="jpg" checked>jpg\
			<input name="passages['+id+'][passage_imgtype]" type="radio" value="gif">gif\
			 <br />\
			Пометить как главное: <input name="passages['+id+'][main]" type="checkbox" value="1">\
		 	<div id="addphoto'+id+'" class="aPhoto">\
		     	<div id="upload'+id+'" class="upload">\
		 			<span id="span'+id+'" class="loadButton" imgname="temp'+temp+id+'">Загрузить</span>\
		 		</div>\
		 		<div id="preview'+id+'" class="preview">\
		 	 				<input name="imgName['+id+']" value="" type="hidden">\
		 	 				<span id="status'+id+'" class="status"></span>\
		    	</div>\
	  	 	</div><!--addphoto-->\
		 	<div class="label">\
			текст абзаца:\
			</div>\
		 	<textarea name="passages['+id+'][passage_text]" cols="50" rows="3"></textarea>\
		 	<div class="passageButtons">\
			 	<div class="addMP" id="'+id+'">\
			 		Еще абзац\
			 	</div>\
		 	</div>\
	 	</div><!--addpassage-->';
        $j(".passages").append(passageHtml);
        $j(".addMP#"+oldid).remove();
        loadPicture();
        addPassage();	});}