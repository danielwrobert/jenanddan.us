/*
	Author: Daniel Robert
*/

/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas. Dual MIT/BSD license */
window.matchMedia = window.matchMedia || (function( doc, undefined ) {

    "use strict";

    var bool,
        docElem = doc.documentElement,
        refNode = docElem.firstElementChild || docElem.firstChild,
        // fakeBody required for <FF4 when executed in <head>
        fakeBody = doc.createElement( "body" ),
        div = doc.createElement( "div" );

    div.id = "mq-test-1";
    div.style.cssText = "position:absolute;top:-100em";
    fakeBody.style.background = "none";
    fakeBody.appendChild(div);

    return function(q){

        div.innerHTML = "&shy;<style media=\"" + q + "\"> #mq-test-1 { width: 42px; }</style>";

        docElem.insertBefore( fakeBody, refNode );
        bool = div.offsetWidth === 42;
        docElem.removeChild( fakeBody );

        return {
            matches: bool,
            media: q
        };

    };

}( document ));


// Wrap in IIFE to protect namespaces
(function($) {
	var navUL = "#nav_list";
	
	var lovers = {
		init: function() {
			if (!Modernizr.svg) {
				$("img[src$='.svg']").each(function() {
					$(this).attr("src", $(this).attr("src").replace(".svg", ".png"));
				});
			}
			lovers.pageNav(navUL);
		},
        addMenuBtn: function(siblingList) {
            $("<a>", {
                class: "menu",
                href: "#",
                text: "MENU",
                click: function() {
                    $(this).next().slideToggle(200);
                    return false;
                }
            }).insertBefore(siblingList);
        },
        pageNav: function(navList) {
            var $navLinks = $(navList+" a");

            // Generate menu button is page is rendered below 760px width
            if (matchMedia("screen and (max-width: 47.5em)").matches) {
                this.addMenuBtn(navList);
            }
            //When nav button is clicked, scroll page to target section
            $navLinks.on("click", function() {
                var target = $(this).attr("href");
				if (target === "#home") {
					$("html, body").animate({ scrollTop: 0 }, 1000);
				} else {
					$("html, body").animate({ scrollTop: $(target).offset().top }, 1000);
				}
                $(".menu").trigger("click");
                return false;
            });
		},
		formValidation: function(theForm) {
//			$(theForm + " input[required]").on("blur", function() {
//				var $this = $(this),
//					abort = false,
//					attrType = $this.attr("type");
//				
//				$this.siblings('.error').remove();
//				if ($this.val() === "") {
//					$this.after("<div class='error'>This is a required field.</div>");
//					abort = true;
//				}
//				if ((attrType === "code") && ($this.val() !== "13730")) {
//					$this.after("<div class='error'>Please enter a valid "+ attrType +".</div>");
//					abort = true;
//				}
//
//				if (abort) { return false; } else { return true; }
//			});

			$(theForm).on("submit", function() {
				var message = "<div class='event_ended'><h3>Thank You For Your Interest!</h3>";
				message += "<p>Unfortunately, this event is over. Please check back, as we will be posting photos shortly!</p></div>";
				
				$(this).parent().html(message);
				return false;
			});
		}
	};

	// On Document Ready
	$(function() {
		var mainForm = ".rsvp_form";

		lovers.init();
		lovers.formValidation(mainForm);
	});
})(jQuery);