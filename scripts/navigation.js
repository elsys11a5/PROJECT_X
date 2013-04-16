$(function (){	
	$(window.location.hash).stop().animate({"opacity" : "1", "width" : "130px"}, 100, 'linear');
	
	$('.navigation li').hover(
	  function () {
		$(this).stop().animate({"opacity" : "1", "width" : "130px"}, 100, 'linear');
		
	  },
	  function () {
		if($(window.location.hash)[0] != this){
			$(this).stop().animate({"opacity" : "0.5", "width" : "25px"}, 100, 'linear');
		}
	  }
	);
	
	$('.navigation li').click(function(){
		$('.navigation li').stop().animate({"opacity" : "0.5", "width" : "25px"}, 100, 'linear');
		$($('a',this).attr('href')).stop().animate({"opacity" : "1", "width" : "130px"}, 100, 'linear');
	});
});