var lovers = {
	navSlide : function($link) {
		var target = $link.attr("href");
		$link.on("click", function() {
			$("html, body").animate({ scrollTop : target }, 1000).offset.top();
		});
	}
};
