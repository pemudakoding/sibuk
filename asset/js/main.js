
	//Button Menu
	
	var body = document.getElementsByTagName('body')[0];
	
	function createPreloader(){
	   var div = document.createElement('div');
	       div.setAttribute('class','loading');
	   var img = document.createElement('img');
	       img.src = '/sekolah/asset/img/loading.gif';
           div.appendChild(img);

	   body.insertBefore(div,body.childNodes[0]);		
	
	}

	createPreloader();


	window.onload = function (){
		document.getElementsByClassName('loading')[0].style.opacity = 0;
		if(document.getElementsByClassName('loading')[0].style.opacity == '0'){
			document.getElementsByClassName('loading')[0].remove();
		}
		
	}
	    	

	$('.button-show').hide();
	$('#button-menu').click(function(){
		$('.sidebar > div').fadeOut(300);

				$('.container').css('grid-template-columns','98%');
				$('.sidebar').css('left','-999px');
				$('.button-show').show();
				$('.button-menu').hide();

	});
	$('#button-show').click(function(){
				$('.sidebar > div').fadeIn(700);
			    $('.sidebar').css('left','0');		
				$('.container').css('grid-template-columns','80%');
				$('.button-menu').show();
				$('.button-menu').css('opacity','1');
				$('.button-show').hide();
	});


function toggle_menu($hidden_menu,$parrent_menu){
	// DropDown menu
	$($hidden_menu).hide();
	$($parrent_menu).click(function(){

		$($hidden_menu).slideToggle(500);
	});
}


for(i = 0; i <= 10; i++){
	toggle_menu('.data-show'+i,'.data'+i);
}



function get_ajax(url){
	var search = $('#search');		
		search.keyup(function(){
	if(document.getElementsByTagName('loading')[0] == undefined){
		createPreloader();
	}
	var keyword = search.val().trim();	
		if (keyword.length != 0) {
				$.ajax({
				url	  : url+keyword,
				method: "GET"
			}).done(function(data){
				$('#load-data').html(data);
				$('#load-data').fadeIn(1000);
				$('#default').fadeOut(200);
				
				document.getElementsByClassName('loading')[0].style.opacity = 0;
				if(document.getElementsByClassName('loading')[0].style.opacity == '0'){
					document.getElementsByClassName('loading')[0].remove();
				}
			});

			if (search.val().length != 0 ) {
				$('#page').fadeOut();
			}else{
				$('#page').fadeIn();
			}
		}else{
			$('#load-data').fadeOut(200);
			$('#default').fadeIn(200);
			$('#page').fadeIn();
			document.getElementsByClassName('loading')[0].style.opacity = 0;
			if(document.getElementsByClassName('loading')[0].style.opacity == '0'){
				document.getElementsByClassName('loading')[0].remove();
			}
		}

	});	
}	



console.log('%cSistem Informasi Buku Induk', 'background: dodgerblue; color: white;padding:0em 5em;font-weight:bold;padding:100px;line-height:200px;font-size:2em;font-familiy:helvetica;border-radius:0px 0px 50px 50px;border:2px solid #222930;');
