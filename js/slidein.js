$(function(){
var menu = $('#slideMenuCheckBox'),
	menuBtn = $('#button'),
	body = $(document.body),	
	menuWidth = menu.outerWidth();	            
		
	menuBtn.on('click', function(){
	body.toggleClass('open');
		if(body.hasClass('open')){
			menu.animate({'left' : -200 }, 120);
		} else {
			menu.animate({'left' : 8 }, 120);
		}		     
	});
});

$(function(){
var menu = $('#slideMenuLayer'),
	menuBtn = $('#buttonLayer'),
	body = $(document.body),	
	menuWidth = menu.outerWidth();	            
		
	menuBtn.on('click', function(){
	body.toggleClass('open');
		if(body.hasClass('open')){
			menu.animate({'right' : 8 }, 120);
		} else {
			menu.animate({'right' : -140 }, 120);
		}		     
	});
});    