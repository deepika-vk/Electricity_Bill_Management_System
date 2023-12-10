var nav=document.querySelectorAll('.nav li');

nav.forEach(function(item){
	item.addEventListener('click',function(e){

		nav.forEach(function(itm){
			itm.classList.remove('active');
		});
				e.currentTarget.classList.add('active');
	})
    
});

