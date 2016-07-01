
var a = jQuery.noConflict();
        a(document).ready(function() {
        a('#carousel').infiniteCarousel({
           transitionSpeed:12000,     /*Tiempo de avance de las imagenes*/
           displayTime: 2000,   /* El tiempo en milisegundos para hacer pausa*/
           thumbnailType: 'false',
           customClass: 'myCarousel',
           easeLeft: 'linear',
           easeRight:'linear',
           inView: 1,    /*Imagenes mostradas*/
           advance: true,
           autoPilot: true,
           displayProgressRing: true,    /*muestra grafica del tiempo que pausa la imagen*/
		   
		   
});
 });
 
 
 