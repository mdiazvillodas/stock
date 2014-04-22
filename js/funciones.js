var tagged1,tagged2,tagged3,tagged4,publi;
window.addEvent('domready', function(){
                /*havana.start('left','-1000px'); */
		
	tagged1 = new Fx.Tween($('ayuda1'), {duration: 250,link: 'chain'});
	tagged2 = new Fx.Tween($('ayuda2'), {duration: 250,link: 'chain'});
	tagged3 = new Fx.Tween($('ayuda3'), {duration: 250,link: 'chain'});
	tagged4 = new Fx.Tween($('ayuda4'), {duration: 250,link: 'chain'});
	publi = new Fx.Tween($('pub'), {duration: 250,link: 'chain'});
	
	
	$('cerrar').addEvent('click', function(){
		publi.start('opacity','0');		
		publi.start('display', 'none');
		});
		
	$('close1').addEvent('click', function(){
		tagged1.start('opacity','0');		
		tagged1.start('display', 'none');
		});
	$('close2').addEvent('click', function(){
		tagged2.start('opacity','0');		
		tagged2.start('display', 'none');
		});
	$('close3').addEvent('click', function(){
		tagged3.start('opacity','0');		
		tagged3.start('display', 'none');
		});
	$('close4').addEvent('click', function(){
		tagged4.start('opacity','0');		
		tagged4.start('display', 'none');
		});

});	
