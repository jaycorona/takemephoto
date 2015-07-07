(function(){var e,n,i,t,o,r,a,d,c,s;e=window.device,window.device={},i=window.document.documentElement,s=window.navigator.userAgent.toLowerCase(),device.ios=function(){return device.iphone()||device.ipod()||device.ipad()},device.iphone=function(){return t("iphone")},device.ipod=function(){return t("ipod")},device.ipad=function(){return t("ipad")},device.android=function(){return t("android")},device.androidPhone=function(){return device.android()&&t("mobile")},device.androidTablet=function(){return device.android()&&!t("mobile")},device.blackberry=function(){return t("blackberry")||t("bb10")||t("rim")},device.blackberryPhone=function(){return device.blackberry()&&!t("tablet")},device.blackberryTablet=function(){return device.blackberry()&&t("tablet")},device.windows=function(){return t("windows")},device.windowsPhone=function(){return device.windows()&&t("phone")},device.windowsTablet=function(){return device.windows()&&t("touch")&&!device.windowsPhone()},device.fxos=function(){return(t("(mobile;")||t("(tablet;"))&&t("; rv:")},device.fxosPhone=function(){return device.fxos()&&t("mobile")},device.fxosTablet=function(){return device.fxos()&&t("tablet")},device.meego=function(){return t("meego")},device.cordova=function(){return window.cordova&&"file:"===location.protocol},device.nodeWebkit=function(){return"object"==typeof window.process},device.mobile=function(){return device.androidPhone()||device.iphone()||device.ipod()||device.windowsPhone()||device.blackberryPhone()||device.fxosPhone()||device.meego()},device.tablet=function(){return device.ipad()||device.androidTablet()||device.blackberryTablet()||device.windowsTablet()||device.fxosTablet()},device.desktop=function(){return!device.tablet()&&!device.mobile()},device.portrait=function(){return window.innerHeight/window.innerWidth>1},device.landscape=function(){return window.innerHeight/window.innerWidth<1},device.noConflict=function(){return window.device=e,this},t=function(e){return-1!==s.indexOf(e)},r=function(e){var n;return n=new RegExp(e,"i"),i.className.match(n)},n=function(e){return r(e)?void 0:i.className+=" "+e},d=function(e){return r(e)?i.className=i.className.replace(e,""):void 0},device.ios()?device.ipad()?n("ios ipad tablet"):device.iphone()?n("ios iphone mobile"):device.ipod()&&n("ios ipod mobile"):n(device.android()?device.androidTablet()?"android tablet":"android mobile":device.blackberry()?device.blackberryTablet()?"blackberry tablet":"blackberry mobile":device.windows()?device.windowsTablet()?"windows tablet":device.windowsPhone()?"windows mobile":"desktop":device.fxos()?device.fxosTablet()?"fxos tablet":"fxos mobile":device.meego()?"meego mobile":device.nodeWebkit()?"node-webkit":"desktop"),device.cordova()&&n("cordova"),o=function(){return device.landscape()?(d("portrait"),n("landscape")):(d("landscape"),n("portrait"))},c="onorientationchange"in window,a=c?"orientationchange":"resize",window.addEventListener?window.addEventListener(a,o,!1):window.attachEvent?window.attachEvent(a,o):window[a]=o,o()}).call(this),function(e){var n=e(window),i=n.height();n.resize(function(){i=n.height()}),e.fn.parallax=function(t,o,r){function a(){d.each(function(){s=d.offset().top}),c=r?function(e){return e.outerHeight(!0)}:function(e){return e.height()},(arguments.length<1||null===t)&&(t="50%"),(arguments.length<2||null===o)&&(o=.5),(arguments.length<3||null===r)&&(r=!0);var a=n.scrollTop();d.each(function(){var n=e(this),r=n.offset().top,l=c(n);a>r+l||r>a+i||d.css("backgroundPosition",t+" "+Math.round((s-a)*o)+"px")})}var d=e(this),c,s,l=0;n.bind("scroll",a).resize(a),a()}}(jQuery),function($){"use strict";function e(){$(".sequence-frame").length>0&&$(".sequence-frame").each(function(e,n){var t=$(n),o=i.scrollTop(),r=i.scrollLeft(),a=i.height(),d=t.parents(".tds-section").offset(),c=t.parents(".tds-section").position(),s=o-d.top,l=t.parents(".tds-section").outerHeight()-a,u=1e3,h,v,f=0,p=t.find("img");if(a>s&&s>-a){if(o<a/p.length)f=0;else if(o<a/p.length+u||s>-a){var b=(o-d.top)/t.parents(".tds-section").outerHeight()/p.length;b=b>1?1:b,f=Math.floor(p.length*b),f=f>=p.length?f-1:f}else f=p.length-1;v=Math.floor(s/t.parents(".tds-section").height()*(p.length-1)),f=0>=v?0:v>p.length?p.length-1:v,t.parents(".tds-parallax").css({"background-image":"url("+p.eq(f).attr("src")+")","background-position":t.parents(".tds-parallax").css("background-position")})}})}function n(){return $(window).height()}var i=$(window);$(document).ready(function(){$(".sequence-frame").length>0&&$(".sequence-frame").each(function(){var e=$(this),n=e.find("img");e.parents(".normal-background").length>0&&e.parents(".normal-background").addClass("tds-parallax"),e.parents(".tds-parallax").css({"background-image":"url("+n.eq(0).attr("src")+")","background-position":e.parents(".tds-parallax").css("background-position")}),e.parents(".tds-parallax").addClass("has-sequence")}),device.tablet()||device.mobile()||$(".tds-parallax").addClass("fixed").each(function(){$(this).removeClass("normal-background"),$(this).parent().addClass("is-parallax"),$(this).parallax("50%",.3)}),$(".hero-fullscreen").length>0&&$(".hero-fullscreen-inner").each(function(){$(this).css("height",n())}),$(".tds-section-content").each(function(){var e=$(this).parent().parent().width()>1140?1140:$(this).parent().parent().width();$(this).parent().parent().is(":visible")&&$(this).css("max-width",e)})}),$(window).load(function(){$(".background-area.bg-video").length>0&&($(".hero-fullscreen-inner").append('<span id="mute" class="mute fa fa-volume-off fa-2x"></span>'),$(".hero-fullscreen-inner").find("#mute").click(function(){$("#mute").hasClass("mute")?($("#videobg").toggleVolume(),$("#mute").removeClass("mute"),$("#mute").addClass("unmute"),$("#mute").removeClass("fa-volume-off"),$("#mute").addClass("fa-volume-up")):($("#videobg").toggleVolume(),$("#mute").removeClass("unmute"),$("#mute").addClass("mute"),$("#mute").removeClass("fa-volume-up"),$("#mute").addClass("fa-volume-off"))})),$(".tds-section-content").each(function(){var e=$(this).parent().parent().width()>1140?1140:$(this).parent().parent().width();$(this).parent().parent().is(":visible")&&$(this).css("max-width",e)})}),i.bind("scroll ready",e),$(window).resize(function(){$(".hero-fullscreen")&&$(".hero-fullscreen-inner").each(function(){$(this).css("height",n())}),$(".tds-section-content").each(function(){var e=$(this).parent().parent().width()>1140?1140:$(this).parent().parent().width();$(this).parent().parent().is(":visible")&&$(this).css("max-width",e)})})}(jQuery);