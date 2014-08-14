$j = jQuery.noConflict();
$j(document).ready(function()
{
	bindEditable();
});
var node = '\
	<div class="editable-form">\
		<div class="editable-form-header">\
		</div>\
		<div class="editable-form-body">\
		</div>\
		<input name="key" form-group="editable" class="key-editable" type="hidden" value="">\
		<button class="button-default ajax-editable-submit" action="" type="button" name="edit" value="">Сохранить</button>\
		<button class="button-cancel cancel-editable" type="button" name="cancel" value="Отменить">Отменить</button>\
	</div>';
function bindEditable()
{
	$j(document).on("click.editable", ".editable", function()
	{
		var type = $j(this).attr("data-type");
		$j(this).attr('status', 'waiting')
		var action = $j(this).attr("action");
		var form;
		if(type == "textarea")
		{
			form = '<textarea form-group="editable" name=' + $j(this).attr("name") + '" class="editable-node node-textarea">' + $j.trim($j(this).html()) + '</textarea>';
			$j(this).append(node);
			$j(".key-editable").val($j(this).attr('key'));
			$j(".editable-form-body").append(form);
			$j("button[name='edit']").attr("action", action);
			$j(document).off('click.editable');
			$j('.cancel-editable').click(function()
			{
				$j("[status='waiting']").removeAttr('status');
				$j(this).unbind('click');
				$j(".editable-form").remove();
				bindEditable();
			});
		}
		if(type == "img")
		{
			var picture = $j(this);
			var id = $j(this).attr("key");
			var temp = $j("#temp").val();
			var img = $j(this).attr("src");
			var container = $j(this).parent();
			var img_type = $j(this).attr('img-type');
			var form = '\
			<div class="imgForm">\
			Тип изображения: <input class="img-type" name="passages['+id+'][passage_imgtype]" type="radio" value="jpg">jpg\
			<input class="img-type" name="passages['+id+'][passage_imgtype]" type="radio" value="gif">gif\
			 <br />\
			Пометить как главное: <input name="passages['+id+'][main]" type="checkbox" value="1">\
		 	<div id="addphoto'+id+'" class="aPhoto">\
		     	<div id="upload'+id+'" class="upload">\
		 			<span id="span'+id+'" class="loadButton" imgname="temp'+temp+id+'">Загрузить</span>\
		 		</div>\
		 		<div id="preview'+id+'" class="preview">\
					<img id="editable-preview-img" src="" /> \
		 	 				<input class="imgName" name="imgName['+id+']" value="" type="hidden">\
		 	 				<span id="status'+id+'" class="status"></span>\
		    	</div>\
		    	<div class="buttons">                                                                                   \
		    		<button class="btn btn-default ajax-editable-img" action="save_img">Сохранить</button><button class="btn btn-cancel cancel-editable">Отменить</button> \
		    	</div>                                                                                                   \
	  	 	</div><!--addphoto-->\
	  	 	</div><!--imgForm-->\
			';
			$j(this).hide();
			$j(container).append(form);
			$j(".img-type[value='" + img_type + "']").prop("checked", true);
			$j("#editable-preview-img").attr("src", img);
			$j(".imgName").val(img);
			$j(document).off('click.editable');
			loadPicture();
			$j('.cancel-editable').click(function()
			{
				$j("[status='waiting']").removeAttr('status');
				$j(this).unbind('click');
				$j(".imgForm").remove();
				$j(picture).css("display","block");
				$j(document).off('click.editable');
				bindEditable();
			});
		}
	});
}

function ajaxForm(){}
ajaxForm.prototype =
{
	constructor: ajaxForm,
	send: function()
	{
		var params = this.params;
		$j('body').on('click', params.button, function()
		{
			params.action = $j(this).attr('action');
			var data = [];
			data.push('action=' + params.action);
			$j("[form-group='"+params.group+"']").each(function()
			{
				data.push($j(this).attr("name") + "=" + $j(this).val());
			});
			data = data.join('&');
			$j.ajax({
				url: params.url,
				type: "post",
				data: data,
				success: params.success
			});
		});
	}
}
$j(document).ready(function ()
{
    var c = new ajaxForm();

    c.params = {
                 button: '.ajax-editable-submit',
    			 url: '../ajaxEditable/',
    			 group: 'editable',
    			 success: function(result)
    			 {
    			 	$j("[status='waiting']").html(result);
    			 	$j("[status='waiting']").unbind('click');
					$j(".editable-form").remove();
					bindEditable();
    			 	$j("[status='waiting']").removeAttr('status');
    			 }
    			};

    c.send();
    var saveImg = new ajaxForm();
	saveImg.params = {
					button: '.ajax-editable-img',
					url: '../ajax/',
					group: 'img',
					success: function(result)
					{
                        alert(result);
						$j("[status='waiting']").html(result);
    			 		$j("[status='waiting']").unbind('click');
					}
				};
    saveImg.send();
});


