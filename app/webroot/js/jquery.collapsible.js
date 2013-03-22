/**
 * Collapsible plugin
 *
 * Copyright (c) 2010 Ramin Hossaini (www.ramin-hossaini.com)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

jQuery.collapsible = function(selector, identifier) {
	
	//toggle the div after the header and set a unique-cookie
	$(selector).click(function() {
		$(this).next().slideToggle('fast', function() {
			if ( $(this).is(":hidden") ) {
				$.cookie($(this).prev().attr("id"), 'hide');
				$(this).prev().children(".placeholder").removeClass("collapse").addClass("expand");
			}
			else {
				$.cookie($(this).prev().attr("id"), 'show');
				$(this).prev().children(".placeholder").removeClass("expand").addClass("collapse");
			}
		});
		return false;
	}).next();

	
	//show that the header is clickable
	$(selector).hover(function() {
		$(this).css("cursor", "pointer");
	});

	/*
	 * On document.ready: should the module be shown or hidden?
	 */
	var idval = 0;	//increment used for generating unique ID's
	$.each( $(selector) , function() {

		$($(this)).attr("id", "module_" + identifier + idval);	//give each a unique ID
	
		if ( !$($(this)).hasClass("collapsed") ) {
			$("#" + $(this).attr("id") ).append("<span class='placeholder collapse'></span>");
		}
		else if ( $($(this)).hasClass("collapsed") ) {
			//by default, this one should be collapsed
			$("#" + $(this).attr("id") ).append("<span class='placeholder expand'></span>");
		}
		
		//what has the developer specified? collapsed or expanded?
		if ( $($(this)).hasClass("collapsed") ) {
			$("#" + $(this).attr("id") ).next().hide();
			$("#" + $(this).attr("id") ).children("span").removeClass("collapse").addClass("expand");
		}
		else {
			$("#" + $(this).attr("id") ).children("span").removeClass("collapse").addClass("expand");
		}
	
	
		if ( $.cookie($(this).attr("id")) == 'hide' ) {
			$("#" + $(this).attr("id") ).next().hide();
			$("#" + $(this).attr("id") ).children("span").removeClass("collapse").addClass("expand");
		}
		else if ( $.cookie($(this).attr("id")) == 'show' ) {
			$("#" + $(this).attr("id") ).next().show();
			$("#" + $(this).attr("id") ).children(".placeholder").removeClass("expand").addClass("collapse");
		}
		

		idval++;
	});

};