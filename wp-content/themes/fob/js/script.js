
$(function ()
{
    $(".btn_cont button").click(function (event) {
	//	console.log("test");
        //отменяем стандартную обработку нажатия по ссылке
		event.preventDefault();
		//забираем идентификатор бока с атрибута href
		var id  = $(this).attr('data-href');
        var div_id  = $(this).attr('data-div');
        $('.ins_apps').hide();
        if (id!=null)
        {
            var	top = $(id).offset().top;
    		//анимируем переход на расстояние - top за 1500 мс
    		$('.ins_apps').hide();
            //$(div_id).show("fast");
            $(div_id).toggle();
            $('body,html').animate({scrollTop: top+20}, 600);
        }
		//узнаем высоту от начала страницы до блока на который ссылается якорь
	});
    
    $('#app_form').ajaxForm({
        beforeSubmit:  function ()
        {
            var verify=true;
            $('#app_form input, #app_form select').each(function ()
            {
                var val = trim($(this).val());
               // console.log(val);
                $(this).parents('.form-group').removeClass('has-error');
                if ((val=="")||(val=="Пожалуйста, ответьте на вопрос"))
                {
                    verify=false;
                    $(this).parents('.form-group').addClass('has-error');
                    
                }
            })
            ///console.log('beforesubmit');
            if (!verify)
            {
                $('span.res').html('Пожалуйста, заполните все поля').addClass('res-error');
                return false;
            }
            $('span.res').html('').removeClass('res-error');
            $('.preloader').removeClass('hidden');
            
        },  
        success:       function (data)
        {
          //  console.log(data);
            $('span.res').html(data);
            $('.preloader').addClass('hidden');
            $('body,html').animate({scrollTop: $('#app_link').offset().top+20}, 600);
        }
    }); 
    
})

function trim( str, charlist ) {
    charlist = !charlist ? ' \\s\xA0' : charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\$1');
    var re = new RegExp('^[' + charlist + ']+|[' + charlist + ']+$', 'g');
    return str.replace(re, '');
}