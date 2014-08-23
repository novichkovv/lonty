$j=jQuery.noConflict();
$j(document).ready(function()
{
	loadPicture();
	addPassage();
	addRubricForm();
	$j(".example_button").click(function(event)
	{
		//alert($j(this).attr('class'));//slideToggle(100);
		$j(this).parent().children().each(function(event)
		{
			$j(this).slideToggle(100);
		});
	});
	$j("#addpostform").submit(function()
	{
		var rubric_check = false;
		$j(".rubric_check").each(function()
		{
			if($j(this).prop('checked'))rubric_check = true;
		});
		if(!rubric_check)
		{
			alert('Не выбраны рубрики!');
			return false;
		}
		if(!$j("#post_name").val())
		{
			alert('Нужно ввести хотя бы название!');
			return false;
		}
	});
});
function addRubricForm()
{
	$j(".addRubric").click(function(event)
	{
		var id = $j(this).attr('id');
		var new_id = parseInt(id) + 1;
		$j(".rubrics").append('\
		<div class="addRubricForm">\
				<label>Введите название рубрики</label><br />\
				<input id="addRubricInput"  name="rubrics[rubric_name]" type="text" value="" />\
				<br />\
				<div class="cansAddRubric smallButton red inline">Отменить</div><br />\
				<div id="addRubricButton" class="smallButton inline">Сохранить</div>\
		</div>\
		');
		addRubric();
		$j(".addRubric").css('display','none');
		$j(".cansAddRubric").click(function()
		{
			$j(".addRubricForm").remove();
			$j(".addRubric").css('display','inline-block');
            $j("#addRubricButton").unbind('click');
		});
	});
}

function addRubric()
{
	$j("#addRubricButton").click(function()
	{
		var data = {
            'rubrics[rubric_name]' : $j("#addRubricInput").val(),
            'action' : 'addRubrics'
        };
		var rubric = $j(".addRubricInput").val();
		$j.ajax(
		{
			url: '../ajax/',
			data: data,//'action=addRubrics&rubrics='+$j("#addRubricInput").val(),
            type: "post",
			success: function(result)
			{
				$j('#rubricsTable').append(result);
                $j(".addRubricForm").remove();
                $j(".addRubric").css('display','inline-block');
                $j("#addRubricButton").unbind('click');
			}
		});
	});
}
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
                    //$j('#preview'+id+' input').attr('name', id);
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
{
	$j(".addMP").click(function()
	{
		var temp=$j("#temp").val();
		var oldid=$j(this).attr("id");
		var id=parseInt(oldid)+1;
		var passageHtml='\
		<div class="addPassage">\
		 	<div class="label">\
			название абзаца:\
			</div>\
		 	<textarea name="passages[passage_header]" cols="50" rows="3"></textarea>\
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
        //addPassage();
	});
}
function editRubrics()
{
	$j(".rubrics").click(function()
	{
		$j(".editable-data").slideDown(200);
	});
}
function addPassage()
{
	$j("body").on('click', '.addPassage', function()
	{
		var temp = $j("#temp").val();
		var passageHtml='\
		<div class="label">\
            Заголовок:       \
        </div>               \
        <textarea name="passages[passage_header]" id="passage_header" cols="60" rows="2"></textarea>           \
        <div class="example">                                                                                                            \
	        <div class="example_button">                                                                                                  \
	        	развернуть                                                                                                                 \
	        </div>                                                                                                                          \
	        <div class="examle_holder">                                                                                                      \
	        	<textarea cols="60" rows="2">                                                                                                 \
	        	</textarea>                                                                                                                    \
	        </div>                                                                                                                              \
	        <div class="example_button hide">                                                                                                   \
	        	свернуть                                                                                         \
	        </div>                                                                                                \
	    </div>                         \
		<div class="fullsizeImg">\
					<div class="imgForm">\
					<input type="hidden" value="79" group="img" name="key">\
					<input type="hidden" value="23" group="img" name="superkey">\
					Тип изображения: \
					<input type="radio" value="jpg" name="passages[79][passage_imgtype]" class="img-type" checked>\
						jpg\
					<input type="radio" value="gif" name="passages[79][passage_imgtype]" class="img-type">\
						gif<br>			                                                                   \
					Пометить как главное:                                                                   \
					<input type="checkbox" value="1" id="main" name="passages[79][main]">		 	                    \
					<div class="aPhoto" id="addphoto79">		     	                                     \
						<div class="upload" id="upload79">		 			                                  \
							<span imgname="temp1712579" class="loadButton" id="span79">Загрузить</span>		 \
						</div>		 		                                                                  \
						<div class="preview" id="preview79">			                                       \
							<img src="http://www.lonty.sru/images/pictures/big/23/79.jpg?17125" id="editable-preview-img"> \
							<input type="hidden" value="http://www.lonty.sru/images/pictures/big/23/79.jpg?17125" name="imgName[79]" class="imgName">		\
							<span class="status" id="status79"></span>		    	                                                                         \
						</div>		    	                                        \                                                                             \
				</div><!--addphoto-->	  	 	                                                              \
			</div><!--imgForm-->			                                                                   \
		</div>\
		<div class="label">\
            Текст:       \
        </div>               \
        <textarea name="passages[passage_text]" id="passage_text" cols="60" rows="2"></textarea>           \
        <div class="example">                                                                                                            \
	        <div class="example_button">                                                                                                  \
	        	развернуть                                                                                                                 \
	        </div>                                                                                                                          \
	        <div class="examle_holder">                                                                                                      \
	        	<textarea cols="60" rows="2">                                                                                                 \
	        	</textarea>                                                                                                                    \
	        </div>                                                                                                                              \
	        <div class="example_button hide">                                                                                                   \
	        	свернуть                                                                                         \
	        </div>                                                                                                \
	    </div>   \
	    <div class="buttons">                                            \
		    <button action="save_img" class="btn btn-default" id="add_passage_btn">Сохранить</button>\
		    <button class="btn btn-cancel" id="cancel_passage">Отменить</button> 		    	       \
		</div>                            ';
		var container = $j(this).parent();
		$j(container).html(passageHtml);
		loadPicture();
		$j("body").on('click', "#cancel_passage", function()
		{
			$j(this).parent().parent().html('<div class="button addPassage">Дабавить абзац</div>');
		});
	});
	$j("body").on('click', "#add_passage_btn", function()
	{
		var data;
		data = 'passages[passage_header]=' + $j("#passage_header").val();
		data += '&passages[main]=' + $j("#main:checked").val();
		data += '&passages[passage_text]=' + $j("#passage_text").val();
		data += '&passages[passage_imgtype]=' + $j(".img-type:checked").val();
		data += '&imgname=' + $j(".loaded_image_name").val();
		data += '&passages[post_id]=' + $j("#post_id").val();
		data += '&action=add_passage';
		$j.ajax({
				url: '../ajax/',
				type: "post",
				data: data,
				success: function(result)
				{
                    $j(".passage").last().html(result);
				}
			});
	});
}
