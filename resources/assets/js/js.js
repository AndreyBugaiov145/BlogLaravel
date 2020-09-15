jQuery(document).ready(function ($) {
    // sroll up page
    $("#swipe-up").on("click", function () {
        $(window).scrollTop(0);
    })

    // Footer slider
    $(window).resize(function () {
        if (screen.width > 660) {
            $('footer ul').css({'display': 'block'});
        } else {
            $(' footer ul').css({'display': 'none'});
        }
    })


    $('.slider-span').on("click", function (e) {
        if (screen.width < 660) {
            if ($(this).next().css('display') == 'none') {
                $(this).next().css({'display': 'block'})
            } else {
                $(this).next().css({'display': 'none'})
            }
        }
    })



    // Registration validator
   $('.box-registar input:submit').click(function (event) {
        event.preventDefault();
        let validate = false;
        $('.box-registar input').each(function (i, e) {
            $(e).nextAll('p').remove();
            if ($(e).val() == false) {
                $(e).addClass('input-error').after("<p style='color:red'>поле не может быть пустым</p>")
                validate = true;
            } else {
                $(e).removeClass('input-error')
            }
        })

        if (!$('.box-registar input[name=confirm]:checked').val()) {
            $('.box-registar input[name=confirm]').next().after("<p style='color:red'>Согласитесь с условиями</p>")
            validate = true;
        }
        if ($('.box-registar input[name=password]').val() !== $('.box-registar input[name=confirm-password]').val()) {
            $('.box-registar input[name=password]').after("<p style='color:red'>Пароли не совпадают</p>")
            validate = true;
        }
        console.log(validate)
        if(!validate){
            new Promise((resolve)=>{
                $.post("/registration/checkEmail", {"email":$('.box-registar input[name=email]').val() }, function (d_data) {
                        if (d_data>0) {
                            alert("Пользователь с таким email уже зарегистрирован");
                            validate = true;                          
                        }
                        resolve();
                    }
                )
            }).then(()=>{
                console.log(validate);
                if (!validate) {
                $(this).unbind();
                $(this).trigger("click");
                }
            })  
            
        }

    })

    // Authorization validator
  	$('.box-auth input:submit').click(function (event) {        
        let validate = false;
        $('.box-auth input').each(function (i, e) {
            $(e).nextAll('p').remove();
            if ($(e).val() == false) {
                $(e).addClass('input-error').after("<p style='color:red'>поле не может быть пустым</p>")
                validate = true;
            } else {
                $(e).removeClass('input-error')
            }
        })
        if(validate) {
        	event.preventDefault();
        } 
        
    })

    // Publication validator
  	$('.box-create-publication input:submit').click(function (event) {        
        let validate = false;
        $('.box-create-publication input').not('.optional').add("textarea").each(function (i, e) {
            $(e).nextAll('p').remove();
            if ($(e).val() == false) {
                $(e).addClass('input-error').after("<p style='color:red'>поле не может быть пустым</p>")
                validate = true;
            } else {
                $(e).removeClass('input-error')
            }
        })
        if(validate) {
        	event.preventDefault();
        } 
        
    })



   // Catalog publication
   $('#deletePublication').click(function(e){
    if(!confirm("вы уверены?")){
        e.preventDefault();
    }
    return;
   })


   // User publication
   $('#user-account').on('mouseover',function(e) {
   	if($('.user-menu').css('display')=='none'){
   	   		$('.user-menu').css({'display':'flex'})
   	   	}
   })
   $('.user-menu:first').on('mouseleave',function(e) {
   	   	$('.user-menu').css({'display':'none'})
   })


})

Share = {
	facebook: function(purl, ptitle=null, pimg=null, text=null) {
		url  = 'http://www.facebook.com/sharer.php?s=100';
		url += '&p[title]='     + encodeURIComponent(ptitle);
		url += '&p[summary]='   + encodeURIComponent(text);
		url += '&p[url]='       + encodeURIComponent(purl);
		url += '&p[images][0]=' + encodeURIComponent(pimg);
		Share.popup(url);
	},
	twitter: function(purl, ptitle=null) {
		url  = 'http://twitter.com/share?';
		url += 'text='      + encodeURIComponent(ptitle);
		url += '&url='      + encodeURIComponent(purl);
		url += '&counturl=' + encodeURIComponent(purl);
		Share.popup(url);
	},
	pinterest: function(purl, pimg=null, text=null) {
		url  = 'https://www.pinterest.com/pin/create/bookmarklet/?';
		url += 'url='          + encodeURIComponent(purl);
		url += '&media='       + encodeURIComponent(pimg);
		url += '&h==400&w=600';
		url += '&description=' + encodeURIComponent(text);
		Share.popup(url)
	},
	skype: function(purl) {
		url  = 'https://web.skype.com/share?';
		url += 'url='          + encodeURIComponent(purl);
		url += '&utm_source=share2';
		Share.popup(url)
	},


	popup: function(url) {
		window.open(url,'','toolbar=0,status=0,width=626,height=436');
	}
};
