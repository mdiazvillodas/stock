var infog;
window.addEvent('domready', function(){
                /*havana.start('left','-1000px'); */
		
	infog = new Fx.Tween($('info'), {duration: 750,link: 'chain', transition:   Fx.Transitions.Back.easeInOut});
	
	
	$('abrir').addEvent('click', function(){
		infog.start('top','0');		
		});
		
	$('cerrar').addEvent('click', function(){
		infog.start('top','-707px');		
		});

});