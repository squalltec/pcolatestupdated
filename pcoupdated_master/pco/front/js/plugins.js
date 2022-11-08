// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// top-navigation selected menu
$(document).ready(function(){	
	$(".main-navigation li a").each(function() {
		if(this.href == window.location || this.href == document.location.protocol + "//" + window.location.hostname + window.location.pathname){
			 $(this).addClass("active");
			 }
	});		
	 var urlstr = window.location.hostname + window.location.pathname
	 var count = urlstr.split("/");
	 if(count[2] == "") {
		 $(".main-navigation li a").first().addClass("active");
	}
	
// datepicker	
	$(".datepicker").datepicker({
		inline: true
	});
});
