/**
 * The Javascript file for Optimizer
 * Stores all the javascript of the template.
 */

jQuery(window).ready(function() {


	//MENU Animation
	if (jQuery(window).width() > 768) {
		
		jQuery('#topmenu ul > li').not('#topmenu ul > li.mega-menu-item').hoverIntent(function(){
			jQuery(this).find('.sub-menu, ul.children').eq(0).removeClass('animated fadeOut').addClass('animated fadeInUp menushow');
		}, function(){
			jQuery(this).find('.sub-menu, ul.children').eq(0).addClass('animated fadeOut').delay(300).queue(function(next){ jQuery(this).removeClass("animated fadeInUp menushow");next();});
		});
	
		jQuery('#topmenu ul li ul li').not('#topmenu ul li.mega-menu-item ul.mega-sub-menu li').hoverIntent(function(){
			jQuery(this).find('.sub-menu, ul.children').eq(0).removeClass('animated fadeOut').addClass('animated fadeInUp menushow');
		}, function(){
			jQuery(this).find('.sub-menu, ul.children').eq(0).addClass('animated fadeOut').delay(300).queue(function(next){
						jQuery(this).removeClass("animated fadeInUp menushow");next();});
		});
	
	jQuery('#topmenu ul li').not('#topmenu ul li.mega-menu-item, #topmenu ul li ul li').hover(function(){
		jQuery(this).addClass('menu_hover');
	}, function(){
		jQuery(this).removeClass('menu_hover');	
	});
	jQuery('#topmenu li').has("ul").addClass('zn_parent_menu');
	jQuery('.zn_parent_menu > a').append('<span class="menu_arrow"><i class="fa-angle-down"></i></span>');
	
	}



	//STATIC SLIDER IMAGE FIXED
	jQuery('.stat_has_img').waitForImages(function() {
		var statimg = jQuery(".stat_has_img .stat_bg_img").attr('src');
		var statimgheight = jQuery(".stat_has_img .stat_bg_img").height() + jQuery(".header").height();
		var hheight = jQuery(".header").height();
		jQuery("body.home").prepend('<div class="stat_bg" style="height:'+statimgheight+'px"><img src="'+statimg+'" /></div><div class="stat_bg_overlay overlay_off" style="height:'+statimgheight+'px" />');
		jQuery('#slidera').css({"minHeight":"initial"});
		jQuery('.home .stat_has_img .stat_bg_img').css('opacity', 0); 

		//Static Slider Overlay on scroll
		overlayon = jQuery(".home .stat_has_img");
		overlayon.waypoint({  handler: function(direction) {   jQuery('.home .stat_bg_overlay').removeClass("overlay_off").addClass("overlay_on");  },   offset: '-170px'   });
		
		overlayoff = jQuery(".home .stat_has_img");
		overlayoff.waypoint({  handler: function(direction) {   jQuery('.home .stat_bg_overlay').removeClass("overlay_on").addClass("overlay_off");;  },   offset: '-90px'   });

		
	});	
	
	jQuery('.stat_has_img').waitForImages(function() {
		var resizeTimer;
		jQuery(window).bind("load resize", function() {
		  clearTimeout(resizeTimer);
		  resizeTimer = setTimeout(function() {
			var body_size = jQuery('.stat_has_img .stat_content_inner .center').height() + 120;
			jQuery('#stat_img, .stat_bg img, .stat_bg_overlay').css('min-height',body_size);
		  }, 50);
		});
	});

		
		
jQuery(window).bind("load resize", function() {
	if (jQuery(window).width() <= 480) {	
		jQuery(".stat_bg_img").css({"opacity":"0"});
		jQuery('.stat_content_inner').waitForImages(function() { jQuery("#stat_img").height(jQuery(".stat_content_inner").height());  });
		var statbg = jQuery(".stat_bg_img").attr('src');
		jQuery(".stat_has_img").css({"background":"url("+statbg+")", "background-repeat":"no-repeat", "background-size":"cover"});
	}
	if (jQuery(window).width() <= 960 <= 480) {	
		var statbg = jQuery(".stat_bg_img").attr('src');
		jQuery(".stat_has_img").css({"background":"url("+statbg+") top center", "background-repeat":"no-repeat", "background-size":"cover"});
		jQuery('.has_trans_header .stat_content_inner, .has_trans_header .header').waitForImages(function() { 
			var mhheight = jQuery(".has_trans_header .header").height();
			jQuery(".has_trans_header .stat_content_inner").css({"paddingTop":mhheight});
			
		});
	}
});

//Mobile Menu
	var padmenu = jQuery("#simple-menu").html();
	jQuery('#simple-menu').sidr({
      name: 'sidr-main',
      source: '#topmenu',
	  side: 'right'
    });
	jQuery(".sidr").prepend("<div class='pad_menutitle'>"+padmenu+"<span><i class='fa-times'></i></span></div>");
		//Make Icons show up in sidr
		jQuery('.sidr-class-menu-item i').attr('class', function(_, klass) {
			return 'fa fa' + klass.split('-fa').pop();
		});
			
		jQuery("#topmenu .head_soc").clone().appendTo(".sidr-class-head_soc");
	jQuery(".pad_menutitle span").click(function() {
		jQuery.sidr('close', 'sidr-main')
		preventDefaultEvents: false;
		
	});
	//If the topmenu is empty remove it
	if (jQuery(window).width() < 1025) {
		if(jQuery("#topmenu:has(ul)").length == 0){
			jQuery('#simple-menu').addClass('hide_mob_menu');
		}
	}

	//Make sure the footer always stays to the bottom of the page when the page is short
	jQuery(window).bind("load", function() {
		var docHeight = jQuery(window).height();
		var footerHeight = jQuery('#footer').height();
		var footerTop = jQuery('#footer').position().top + footerHeight;
		   
		if (footerTop < docHeight) {  jQuery('#footer').css('margin-top', 1 + (docHeight - footerTop) + 'px');  }
	});
	
	//Woocommerce
	jQuery('.lay1.optimposts, .lay4.optimposts').each(function(index, element) {  jQuery(this).waitForImages(function() { jQuery(this).find('.type-product').matchHeight({property: 'min-height'});  });  });
	jQuery('.lay1.optimposts .type-product').each(function(index, element) {
		if (jQuery(window).width() >= 960) {	jQuery(this).find('.button.add_to_cart_button').prependTo(jQuery(this).find('.imgwrap'));  }
		jQuery(this).find('span.price').prependTo(jQuery(this).find('.post_image '));
    });

});

	jQuery(window).on('load scroll', function() {
			var scrollTop = jQuery(this).scrollTop();
			
			var hheight = jQuery(".header").height() + jQuery('.admin-bar #wpadminbar').height() + jQuery('#customizer_topbar').height();
				
			if ( !scrollTop ) {
					jQuery('body:not(.has_trans_header) .stat_bg img').css({"top":hheight+"px"});
					jQuery('body:not(.has_trans_header) .stat_bg').css({"background-position-y":hheight+"px"});
			}else{
					jQuery('body:not(.has_trans_header) .stat_bg img').css({"top":"0px"});
					jQuery('body:not(.has_trans_header) .stat_bg').css({"background-position-y":"0px"});
			}
				
	});

/*! Sidr - v1.1.1 - 2015-11-04
 * https://github.com/sammoore/sidr
 * Copyright (c) 2013 Alberto Varela; Licensed MIT */
!function(e){var t=!1,i=!1,n={isUrl:function(e){var t=new RegExp("^(https?:\\/\\/)?((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$","i");return t.test(e)?!0:!1},loadContent:function(e,t){e.html(t)},addPrefix:function(e){var t=e.attr("id"),i=e.attr("class");"string"==typeof t&&""!==t&&e.attr("id",t.replace(/([A-Za-z0-9_.\-]+)/g,"sidr-id-$1")),"string"==typeof i&&""!==i&&"sidr-inner"!==i&&e.attr("class",i.replace(/([A-Za-z0-9_.\-]+)/g,"sidr-class-$1")),e.removeAttr("style")},execute:function(n,s,a){"function"==typeof s?(a=s,s="sidr"):s||(s="sidr");var r,d,l,c=e("#"+s),u=e(c.data("body")),f=e("html"),p=c.outerWidth(!0),g=c.data("speed"),h=c.data("side"),m=c.data("displace"),v=c.data("onOpen"),y=c.data("onClose"),x="sidr"===s?"sidr-open":"sidr-open "+s+"-open";if("open"===n||"toggle"===n&&!c.is(":visible")){if(c.is(":visible")||t)return;if(i!==!1)return void o.close(i,function(){o.open(s)});t=!0,"left"===h?(r={left:p+"px"},d={left:"0px"}):(r={right:p+"px"},d={right:"0px"}),u.is("body")&&(l=f.scrollTop(),f.css("overflow-x","hidden").scrollTop(l)),m?u.addClass("sidr-animating").css({width:u.width(),position:"absolute"}).animate(r,g,function(){e(this).addClass(x)}):setTimeout(function(){e(this).addClass(x)},g),c.css("display","block").animate(d,g,function(){t=!1,i=s,"function"==typeof a&&a(s),u.removeClass("sidr-animating")}),v()}else{if(!c.is(":visible")||t)return;t=!0,"left"===h?(r={left:0},d={left:"-"+p+"px"}):(r={right:0},d={right:"-"+p+"px"}),u.is("body")&&(l=f.scrollTop(),f.removeAttr("style").scrollTop(l)),u.addClass("sidr-animating").animate(r,g).removeClass(x),c.animate(d,g,function(){c.removeAttr("style").hide(),u.removeAttr("style"),e("html").removeAttr("style"),t=!1,i=!1,"function"==typeof a&&a(s),u.removeClass("sidr-animating")}),y()}}},o={open:function(e,t){n.execute("open",e,t)},close:function(e,t){n.execute("close",e,t)},toggle:function(e,t){n.execute("toggle",e,t)},toogle:function(e,t){n.execute("toggle",e,t)}};e.sidr=function(t){return o[t]?o[t].apply(this,Array.prototype.slice.call(arguments,1)):"function"!=typeof t&&"string"!=typeof t&&t?void e.error("Method "+t+" does not exist on jQuery.sidr"):o.toggle.apply(this,arguments)},e.fn.sidr=function(s){var a=e.extend({name:"sidr",speed:200,side:"left",source:null,renaming:!0,body:"body",displace:!0,onOpen:function(){},onClose:function(){}},s),r=a.name,d=e("#"+r);if(0===d.length&&(d=e("<div />").attr("id",r).appendTo(e("body"))),d.addClass("sidr").addClass(a.side).data({speed:a.speed,side:a.side,body:a.body,displace:a.displace,onOpen:a.onOpen,onClose:a.onClose}),"function"==typeof a.source){var l=a.source(r);n.loadContent(d,l)}else if("string"==typeof a.source&&n.isUrl(a.source))e.get(a.source,function(e){n.loadContent(d,e)});else if("string"==typeof a.source){var c="",u=a.source.split(",");if(e.each(u,function(t,i){c+='<div class="sidr-inner">'+e(i).html()+"</div>"}),a.renaming){var f=e("<div />").html(c);f.find("*").each(function(t,i){var o=e(i);n.addPrefix(o)}),c=f.html()}n.loadContent(d,c)}else null!==a.source&&e.error("Invalid Sidr Source");return e("#"+r).find("a").each(function(){e(this).click(function(){o.toggle(r)})}),e(window).on("resize",function(){e.sidr("close",r)}),this.each(function(){var n=e(this),s=n.data("sidr");s||(i=!1,t=!1,n.data("sidr",r),"ontouchstart"in document.documentElement&&(n.bind("touchstart",function(e){e.originalEvent.touches[0];this.touched=e.timeStamp}),n.bind("touchend",function(e){var t=Math.abs(e.timeStamp-this.touched);200>t&&(e.preventDefault(),o.toggle(r))})),n.click(function(e){e.preventDefault(),o.toggle(r)}))})}}(jQuery);


/* REQUERIDO
* waitForImages jQuery Plugin - 2013-07-20
* https://github.com/alexanderdickson/waitForImages
* Copyright (c) 2014 Alex Dickson; Licensed MIT */
!function(a){var b="waitForImages";a.waitForImages={hasImageProperties:["backgroundImage","listStyleImage","borderImage","borderCornerImage","cursor"]},a.expr[":"].uncached=function(b){if(!a(b).is('img[src!=""]'))return!1;var c=new Image;return c.src=b.src,!c.complete},a.fn.waitForImages=function(c,d,e){var f=0,g=0;if(a.isPlainObject(arguments[0])&&(e=arguments[0].waitForAll,d=arguments[0].each,c=arguments[0].finished),c=c||a.noop,d=d||a.noop,e=!!e,!a.isFunction(c)||!a.isFunction(d))throw new TypeError("An invalid callback was supplied.");return this.each(function(){var h=a(this),i=[],j=a.waitForImages.hasImageProperties||[],k=/url\(\s*(['"]?)(.*?)\1\s*\)/g;e?h.find("*").addBack().each(function(){var b=a(this);b.is("img:uncached")&&i.push({src:b.attr("src"),element:b[0]}),a.each(j,function(a,c){var d,e=b.css(c);if(!e)return!0;for(;d=k.exec(e);)i.push({src:d[2],element:b[0]})})}):h.find("img:uncached").each(function(){i.push({src:this.src,element:this})}),f=i.length,g=0,0===f&&c.call(h[0]),a.each(i,function(e,i){var j=new Image;a(j).on("load."+b+" error."+b,function(a){return g++,d.call(i.element,g,f,"load"==a.type),g==f?(c.call(h[0]),!1):void 0}),j.src=i.src})})}}(jQuery);
