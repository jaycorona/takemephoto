/**
 * Tiny Carousel
 * A lightweight jQuery plugin
 * http://baijs.nl/tinycarousel/
 */
(function(a){function b(b,c){function r(){k=q?a(g[0]).outerWidth(true):a(g[0]).outerHeight(true);var b=Math.ceil((q?e.outerWidth():e.outerHeight())/(k*c.display)-1);l=Math.max(1,Math.ceil((g.length+3)/c.display)-b);m=Math.min(l,Math.max(1,c.start))-2;f.css(q?"width":"height",k*(g.length+3));d.move(1);s()}function s(){if(c.controls&&i.length>0&&h.length>0){i.click(function(){d.move(-1);return false});h.click(function(){d.move(1);return false})}if(c.interval){b.hover(d.stop,d.start)}if(c.pager&&j.length>0){a("a",j).click(u)}}function t(){if(c.controls){i.toggleClass("disable",!(m>0));h.toggleClass("disable",!(m+1<l))}if(c.pager){var b=a(".pagenum",j);b.removeClass("active");a(b[m]).addClass("active")}}function u(b){if(a(this).hasClass("pagenum")){d.move(parseInt(this.rel),true)}return false}function v(){if(c.interval&&!o){clearTimeout(n);n=setTimeout(function(){m=m+1==l?-1:m;p=m+1==l?false:m==0?true:p;d.move(p?1:-1)},c.intervaltime)}}var d=this;var e=a(".viewport:first",b);var f=a(".overview:first",b);var g=f.children();var h=a(".next:first",b);var i=a(".prev:first",b);var j=a(".pager:first",b);var k,l,m,n,o,p=true,q=c.axis=="x";this.stop=function(){clearTimeout(n);o=true};this.start=function(){o=false;v()};this.move=function(a,b){m=b?a:m+=a;if(m>-1&&m<l){var d={};d[q?"left":"top"]=-(m*k*c.display);f.animate(d,{queue:false,duration:c.animation?c.duration:0,complete:function(){if(typeof c.callback=="function")c.callback.call(this,g[m],m)}});t();v()}};return r()}a.tiny=a.tiny||{};a.tiny.carousel={options:{start:1,display:1,axis:"x",controls:true,pager:false,interval:false,intervaltime:2e3,rewind:true,animation:true,duration:1e3,callback:null}};a.fn.tinycarousel=function(c){var c=a.extend({},a.tiny.carousel.options,c);this.each(function(){a(this).data("tcl",new b(a(this),c))});return this};a.fn.tinycarousel_start=function(){a(this).data("tcl").start()};a.fn.tinycarousel_stop=function(){a(this).data("tcl").stop()};a.fn.tinycarousel_move=function(b){a(this).data("tcl").move(b-1,true)};})(jQuery);

(function($) {

	// Thumbnail CA Slider
	$('.tds-thumbslider').tinycarousel({ interval: true, display: 1, intervaltime: 2500, duration: 1000 });

    var maxWidth = 380;
    var minWidth = 105;
    $('#lastblock').animate({width: maxWidth+"px"}, { queue:false, duration:800});
    var lastBlock = $("#lastblock");

    $(".overview li img").hover(
      function(){
        $(lastBlock).animate({width: minWidth+"px"}, { queue:false, duration:800});
        //$(lastBlock).next().animate( { width: minWidth+"px"}, { queue:false, duration:800 });
        $(this).parent().parent().animate({ width: maxWidth+"px"}, { queue:false, duration:800});
        lastBlock = $(this).parent().parent();
      }
    );

})(jQuery);

