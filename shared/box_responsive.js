$(document).ready(function(){


	function waterFall() {

		var $boxs=$('#main>.projet_list');
		var pad=30;

	var w=$boxs.eq(0).outerWidth();

	var left=$('.content_list').offset().left;

	var cols=Math.floor($('#main').width()/w);
	//alert($(window).width());
	if(cols == 1)
	{
		var y = $('.content_list').width();
	}
	else if(cols == 2)
	{
		var y = $('.content_list').width()*0.5;
		$boxs.eq(1).removeAttr("style");
	}
	else if(cols == 3)
	{
		var y = $('.content_list').width()*0.3333;
		$boxs.eq(2).removeAttr("style");
	}
	//alert($('.content_list').width());
	$(".container>#main").width(w*cols).css('width','100%');
	var hArr=[];
	var tb=[];

	var plus=$('.content_list').offset().top;
	var width=y;

	$boxs.each(function(index,value){
		$boxs.eq(index).removeAttr("style");
		var h=$boxs.eq(index).outerHeight();
		tb.push(index);
		$('#main').append($boxs);

		if(index<cols){
			hArr.push(h);
		}else {

			minH=Math.min.apply(null,hArr);

			var minHeightIndex=$.inArray(minH,hArr);


			if(minHeightIndex == 0)
			{
				if(cols == 1)
				{
						$(value).css({
						'position':'absolute',
						'top':minH+plus+'px',
						'left':minHeightIndex*w+left+'px',
						'padding-bottom':'10px',
						'padding-top':'10px',
						'padding-right':'0px',
						'padding-left':'10px',
						'width':width+'px'
					});
				}
				else if(cols == 2)
				{
						$(value).css({
						'position':'absolute',
						'top':minH+plus+8+'px',
						'left':minHeightIndex*w+left+17+'px',
						'padding-bottom':'10px',
						'padding-top':'10px',
						'padding-right':'0px',
						'padding-left':'17px',
						'width':width+2+'px'
					});
				}
				else
				{
						$(value).css({
						'position':'absolute',
						'top':minH+plus+'px',
						'left':minHeightIndex*w+left+35+'px',
						'padding-bottom':'10px',
						'padding-top':'10px',
						'padding-right':'16.5px',
						'width':width+'px'
					});
				}

			}
			else if(minHeightIndex == 1)
			{
				if(cols == 2)
				{
					$(value).css({
					'position':'absolute',
					'top':minH+plus+8+'px',
					'left':minHeightIndex*w+left+35+'px',
					'padding-bottom':'10px',
					'padding-top':'10px',
					'padding-left':'16px',
					'width':width+'px'
				});
				}
				else
				{

					$(value).css({
					'position':'absolute',
					'top':minH+plus+'px',
					'left':minHeightIndex*w+left+35+'px',
					'padding-bottom':'10px',
					'padding-top':'10px',
					'padding-right':'8px',
					'padding-left':'8px',
					'width':width+'px'
				});
				}
			}
			else if(minHeightIndex == 2)
			{
				$(value).css({
				'position':'absolute',
				'top':minH+plus+'px',
				'left':minHeightIndex*w+left+35+'px',
				'padding-bottom':'10px',
				'padding-top':'10px',
				'padding-left':'16.5px',
				'width':width+'px'
			});
			}
			hArr[minHeightIndex]+=$boxs.eq(index).outerHeight();

		}


	});

	var footer = $boxs.eq(tb.length-1).offset().top;
	//alert(footer);
	$('.content_list').css('height',footer+400+'px');

}
	$(window).resize('load',function(){
		waterFall();
	});

	$(window).on('load',function(){
		waterFall();
	});



});
