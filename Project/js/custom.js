$(document).ready(function(){
	menu_init();
	photorow_init();
	banners_init();
	buttons_init();
	inputPlaceholder();
	topstatic_init();
	follow_init();
	logoshine_init();
	photozoomer_init();
	sidephotos_init();
	portfolio_init();
	blockquotes_init();
	checkrates_init();
	misc_init();
});

function misc_init()
{
	// adding class to table rows to color it
	$('table.table1 > tbody > tr:odd').addClass('odd');
	
	// adding close button to notification panes
	$('.error, .alert, .notice').append('<span class="close">X</span>');
	$('.error > .close, .alert > .close, .notice > .close').click(function(){
		$(this).parent().hide(200); 
	});
}

function follow_init()
{
	// making follow twitter/facebook/rss icons take color on hover
	$('.follow_icon').each(function(){
		$(this).html('<div></div>');
	});
	
	$('.follow_icon').mouseenter(function(){
		$(this).children('div').stop(true).fadeTo(400,1);
	});

	$('.follow_icon').mouseleave(function(){
		$(this).children('div').stop(true).fadeTo(400,0);
	});
}

function topstatic_init()
{
	// making top area fixed on scrolling
	if($(document).scrollTop() > 0)
		$('.topstatic').addClass('scrolled');
	$(document).scroll(function(){
		if($(document).scrollTop() > 0)
			$('.topstatic').addClass('scrolled');
		else
			$('.topstatic').removeClass('scrolled');
	});	
}

function inputPlaceholder (color)
{
	// Making attribute placeholder in inputs working if browser doesn't support
	// Do nothing if placeholder supported by the browser (Webkit, Firefox 3.7)
	if ('placeholder' in document.createElement('input')) return;

	$('input[type=text]').each(function(){
		var input=$(this).get(0);
		color = color || '#d1d1d1';
		var default_color = input.style.color;
		var placeholder = input.getAttribute('placeholder');
	
		if (input.value === '' || input.value == placeholder) {
			input.value = placeholder;
			input.style.color = color;
			input.setAttribute('data-placeholder-visible', 'true');
		}
	
		var add_event = /*@cc_on'attachEvent'||@*/'addEventListener';
	
		input[add_event](/*@cc_on'on'+@*/'focus', function(){
		 input.style.color = default_color;
		 if (input.getAttribute('data-placeholder-visible')) {
			 input.setAttribute('data-placeholder-visible', '');
			 input.value = '';
		 }
		}, false);
	
		input[add_event](/*@cc_on'on'+@*/'blur', function(){
			if (input.value === '') {
				input.setAttribute('data-placeholder-visible', 'true');
				input.value = placeholder;
				input.style.color = color;
			} else {
				input.style.color = default_color;
				input.setAttribute('data-placeholder-visible', '');
			}
		}, false);
	
		input.form && input.form[add_event](/*@cc_on'on'+@*/'submit', function(){
			if (input.getAttribute('data-placeholder-visible')) {
				input.value = '';
			}
		}, false);
	});
}

function menu_init()
{
	// Menu animation
	$('.menu > li > ul').each(function(){
		var $li=$(this).parent();
		$(this).css('width',($(this).width()+5)+'px').css('min-width',($li.width()+30)+'px');
		
		$li.children('a').click(function(){
			var $p=$(this).parent();
			$p.addClass('sel');
			$p.children('ul').show(100);
			$(this).blur();
			return false;
		});

		$li.mouseleave(function(){
			$(this).removeClass('sel');
			$(this).children('ul').fadeOut(300);
		});		
	});

	$('.menu > li > ul > li > ul').each(function(){
		var $li=$(this).parent();
		
		$li.children('a').mouseenter(function(){
			var $p=$(this).parent();
			if(!$p.hasClass('sel'))
			{
				$p.addClass('sel');
				$p.children('ul').stop(true,true).show(200,function(){
					if(!$(this).hasClass('wided'))
					{
						$(this).animate({
							width: ($(this).width()+5)+'px'
						},50,function(){
							$(this).addClass('wided');
						});
					}
				});
			}
			return false;
		});

		$li.mouseleave(function(){
			$(this).removeClass('sel');
			$(this).children('ul').stop(true,true).fadeOut(300);
		});		
	});
	
}

function photorow_init()
{
	// Photorow on main page scrolling
	if($('#photorow > img').length)
	{
		var w=$('#photorow').parent().width();
		var pw=0;
		var fw=$('#photorow > img:first').outerWidth();
		$('#photorow > img').each(function(){
			pw+=$(this).outerWidth();
			$(this).clone().appendTo('#photorow');
		});
		$('#photorow').css('margin-left',(w/2-fw/2-pw)+'px');
		
		setInterval(photorow_move,7000);
	}
}

function photorow_move()
{
	// Photorow iteration
	var fw=$('#photorow > img:first').outerWidth();
	var lw=$('#photorow > img:last').outerWidth();
	var ml=parseFloat($('#photorow').css('margin-left'));
	$('#photorow').animate({marginLeft: (ml+lw/2+fw/2)+'px'}, 1400, "swing",function(){
		var $i=$('#photorow > img:last').detach();
		$i.prependTo('#photorow');
		var ml=parseFloat($('#photorow').css('margin-left'));
		$('#photorow').css('margin-left',(ml-$i.outerWidth())+'px');
	});
}

function banners_init()
{
	if($.browser.msie)
	{
		$('.mainbanner').fadeTo(0,0.85).mouseenter(function(){
			$(this).stop(true).fadeTo(600,1);
		}).mouseleave(function(){
			$(this).stop(true).fadeTo(600,0.85);
		});
	}
}

function buttons_init()
{
	$('.button').each(function(){
		var html=$(this).html();
		$(this).html('<span class="normal"><span><span></span></span></span><span class="hov"><span><span></span></span></span><span class="press"><span><span></span></span></span><span class="text">'+html+'</span>');
	});
	
	if($.browser.msie)
		$('.button').mouseenter(function(){
			$(this).children('.hov').show();
		});
	else
		$('.button').mouseenter(function(){
			$(this).children('.hov').stop().fadeTo(500,1);
		});
	
	if($.browser.msie)
		$('.button').mouseleave(function(){
			$(this).children('.normal').show();
			$(this).children('.press').hide();
			$(this).children('.hov').hide();
		});
	else
		$('.button').mouseleave(function(){
			$(this).children('.normal').show();
			$(this).children('.press').hide();
			$(this).children('.hov').stop().fadeTo(400,0); 
		});
	
	$('.button').mousedown(function(){
		$(this).children('.normal, .hov').hide();
		$(this).children('.press').show();
	});

	$('.button').mouseup(function(){
		$(this).children('.normal, .hov').show();
		$(this).children('.press').hide();
	});
}

function logoshine_init()
{
	if(!$.browser.msie)
	{
		var pos=$('#logo').position();
		$('#logo_shine').show().fadeTo(0,0).css('left',pos.left+'px').css('top',pos.top+'px');
		$('#logo').mouseenter(function(){
			if(!$('#logo_shine').is(':animated'))
				logoshine_run();
		});
	}
}

function logoshine_run()
{
	var pos=$('#logo').position();
	var w=$('#logo').width();
	var sw=$('#logo_shine').width();
	$('#logo_shine').css('left',pos.left+'px');
	$('#logo_shine').fadeTo(0,0).animate({
		left: (pos.left+(w-sw)/2)+'px',
		opacity: 1
	},500,'linear',function(){
		$(this).animate({
			left: (pos.left+w-sw)+'px',
			opacity: 0
		},500,'linear');
	});
}

function photozoomer_init()
{
	$("a[rel='colorbox']").colorbox();
}

function sidephotos_init()
{
	$('.sidephotos').each(function(){
		if($(this).children('a').length > 1)
		{
			var $thumbs=$('<div class="thumbnails"/>');
			$(this).children('a:gt(0)').each(function(){
				var $tmp=$(this).detach();
				$tmp.prependTo($thumbs);
			});
			$thumbs.appendTo($(this));

			var num=$thumbs.children('a').length;
			$thumbs.children('a').each(function(){
				var r=($(this).index()/num)*100;
				$(this).css('right',r+'%');
			});
			$(this).addClass('act');
		}
	});
	$('.sidephotos.act').mouseenter(function(){
		$(this).children('.thumbnails').stop(true).animate({
			width: '150px'
		},400);
	});
	
	$('.sidephotos.act').mouseleave(function(){
		$(this).children('.thumbnails').stop(true).animate({
			width: '0'
		},300);
	});
}

function portfolio_init()
{
	$('#portfolio-layout > .button').click(function(){
		$('#portfolio-layout > .button').removeClass('current');
		$(this).addClass('current');
		$('#portfolio-list').removeClass('style-list').removeClass('style-grid').removeClass('style-short').addClass($(this).attr('rel'));
		return false;
	});
	
	var hash=document.location.hash.replace('#','');
	portfolio_filter(hash);
	
	$('#portfolio-filter > a').click(function(){
		var hash=$(this).attr('href').replace('#','');
		$('#portfolio-filter > a').removeClass('current');
		$(this).addClass('current');
		portfolio_filter(hash);
		document.location.hash=hash;
		return false;
	});
}

function portfolio_filter(hash)
{
	if(hash=='all' || hash=='')
	{
		$('#portfolio-list > li').stop(true,true).show(700);
	}
	else
	{
		$('#portfolio-list > li').stop(true,true).hide(700);
		
		$('#portfolio-list > li.'+hash).stop(true,true).show(700);
	}
}

function blockquotes_init(){
	$('blockquote, .quote2, .quote3, .quote4').append('<div class="bqend"/>');

	$('blockquote').each(function(){
		var h=$(this).height();
		var d=Math.ceil(h/5)*5-2;
		$(this).css('height',d+'px');
	});
}

function checkrates_init()
{
	$('#button_check_rates').each(function(){
		var html=$(this).html();
		$(this).html('<span class="normal"><span><span></span></span></span><span class="hov"><span><span></span></span></span><span class="press"><span><span></span></span></span><span class="sel"><span><span></span></span></span><span class="text">'+html+'</span>');
	});
	
	if($.browser.msie)
		$('#button_check_rates').mouseenter(function(){
			if(!$(this).hasClass('pressed'))
				$(this).children('.hov').show();
		});
	else
		$('#button_check_rates').mouseenter(function(){
			if(!$(this).hasClass('pressed'))
				$(this).children('.hov').stop().fadeTo(500,1);
		});
	
	if($.browser.msie)
		$('#button_check_rates').mouseleave(function(){
			if(!$(this).hasClass('pressed'))
			{
				$(this).children('.normal').show();
				$(this).children('.press').hide();
				$(this).children('.hov').hide();
			}
		});
	else
		$('#button_check_rates').mouseleave(function(){
			if(!$(this).hasClass('pressed'))
			{
				$(this).children('.normal').show();
				$(this).children('.press').hide();
				$(this).children('.hov').stop().fadeTo(400,0); 
			}
		});
	
	$('#button_check_rates').mousedown(function(){
		$(this).children('.normal, .hov, .sel').hide();
		$(this).children('.press').show();
	});

	$('#button_check_rates').mouseup(function(){
		$(this).children('.normal, .hov').show();
		$(this).children('.press').hide();
	});	
	
	$('#button_check_rates').click(function(){
		if($(this).hasClass('pressed'))
		{
			$(this).removeClass('pressed');
			$('#checkrates').stop(true,true).fadeOut(300);
		}
		else
		{
			$('#checkrates').stop(true,true).slideDown(300);
			$(this).addClass('pressed');
			$(this).children('.normal, .hov').hide();
			$(this).children('.sel').show();
		}
	});
	
	var params={
		changedEl: "#select_adult, #select_children"
	};
	cuSel(params);
	
	$('#check_in_date, #check_out_date').datepicker({
		changeMonth: true,
		changeYear: true,
		minDate: 0,
		maxDate: "+1Y"
	});
}