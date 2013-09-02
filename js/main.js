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
	var lovers = {
    addMenuBtn : function() {
      console.log("testing");
      $("<a>", {
          class : "menu",
          href : "#nav_list",
          text : "MENU",
          click : function() {
            navList = $(this).attr("href");
            $(navList).slideToggle(200);
            return false;
          }
      }).insertBefore("#nav_list");
    },
		pageNav : function(navLink, menuBtn) {
      // Generate menu button is page is rendered below 600px width
      if (matchMedia('screen and (max-width: 37.5em)').matches) {
        this.addMenuBtn();
      }
      //When nav button is clicked, scroll page to target section
      $(navLink).on("click", function() {
        var target = $(this).attr("href");
        $("html, body").animate({ scrollTop : $(target).offset().top }, 1000);
        $(".menu").trigger("click");
        return false;
      });
		}
	};

	var navLinks = "#nav_list a";
	lovers.pageNav(navLinks);
})(jQuery);