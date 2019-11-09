	
	var buttonTab 	= document.getElementsByClassName('tab');
	var contentTab	= document.getElementsByTagName('section');
	
	buttonTab[0].style.backgroundColor = '#778BEB';
	buttonTab[0].style.color = 'white';

	for(var j = 1; j < contentTab.length;j++){
		contentTab[j].style.display = 'none';
	}

	for(var i = 0;i < buttonTab.length;i++){

		buttonTab[i].onclick = function(e){		
			
			
			var nodes 			= Array.prototype.slice.call(e.target.parentElement.children),
				content			= e.target,
				indexContent	= nodes.indexOf(content);
			
			for(var j = 0; j < buttonTab.length;j++){
				buttonTab[j].style.color = '';
				buttonTab[j].style.backgroundColor = '';

			}

			for(var j = 0; j < contentTab.length;j++){
				contentTab[j].style.display = 'none';
			}

			contentTab[indexContent].style.display = 'block';
			e.target.style.color = 'white';
			e.target.style.backgroundColor = '#778BEB';
		}

	}

