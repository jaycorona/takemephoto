!function($){"use strict";function t(){return $(window).height()}function s(){return $("body .entry-content").length>0?$("body .entry-content").width():$("body .theme-content").length>0?$("body .theme-content").width():$("body #wrapper").width()}var i=$(window).width();$(document).ready(function(){var t=$(window).width();t>800&&$(".tds-customheightcolumns").each(function(){var t=$(this).parent().width();$(this).parent().css("width",t),$(this).find(".tds-customheightcolumn").css("width","auto")})}),$(window).load(function(){var t=$(window).width();$(".tds-customheightcolumns").each(function(){var s=0,i=$(this).parent().width(),h=$(this).css("min-height");$(this).parents(".tds-section").addClass("customheightcolumns"),$(this).find(".tds-customheightcolumn").each(function(){var d=$(this),n=$(this).attr("data-width");t>800?(d.css("width",i*n-.85),d.find(".tds-box ").css("max-width",i*n),d.find(".tds-box .tds-cell").css("max-width",i*n)):(d.css("width","100%"),d.find(".tds-box ").css("max-width","100%"),d.find(".tds-box .tds-cell").css("max-width","100%")),$(this).height()>s&&(s=$(this).height()),$(this).find(".tds-box").height()>h||($(this).find(".tds-box").css("min-height",h),d.find(".tds-box .tds-cell").css("height",h))})})}),$(window).resize(function(){var t=$(window).width();$(".tds-customheightcolumns").each(function(){var s=0,i=$(this).parent().width(),h=$(this).css("min-height");$(this).parent().css("width","auto"),$(this).parents(".tds-section").addClass("customheightcolumns"),$(this).find(".tds-customheightcolumn").each(function(){var d=$(this),n=$(this).attr("data-width");t>800?(d.css("width",i*n-.85),d.find(".tds-box ").css("max-width",i*n),d.find(".tds-box .tds-cell").css("max-width",i*n)):(d.css("width","100%"),d.find(".tds-box ").css("max-width","100%"),d.find(".tds-box .tds-cell").css("max-width","100%")),$(this).height()>s&&(s=$(this).height()),$(this).find(".tds-box").height()>h||($(this).find(".tds-box").css("min-height",h),d.find(".tds-box .tds-cell").css("height",h))})})})}(jQuery);