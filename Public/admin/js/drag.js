
(function($){

    $.fn.extend({
        drag : function(obj, settings) {
            var _x, _y;
            var $this = this.hover(function(){
                $(this).css("cursor", "move");
            },function(){
                $(this).css("cursor", "");
            });
            var $obj = obj === undefined ? $this : (typeof obj === "string" ? $(obj) : $(obj)) ;
            var isIE = (document.all) ? true : false;
            var options = $.extend({
                lockedX		: false,
                lockedY		: false,
                lockedR		: false,
                range		: {
                    top : 0 ,
                    right : $(window).width(),
                    bottom : $(window).height(),
                    left : 0
                },
                position	: "static",
                onStart		: function(){},
                onMove		: function(){},
                onStop		: function(){}
            }, settings);

            if (options.lockedR) {
                var $parent = $obj.parent();
                $parent.get(0).style.position = options.position;
                options.range.top = $parent.offset().top + parseInt($parent.css("border-top-width"));
                options.range.left = $parent.offset().left + parseInt($parent.css("border-left-width"));
                options.range.bottom = options.range.top + $parent.innerHeight();
                options.range.right = options.range.left + $parent.innerWidth();
            }
			
            $this.mousedown(function(event){
                options.onStart();
                _x = event.clientX - $obj.offset().left;
                _y = event.clientY - $obj.offset().top;
                $(document).bind("mousemove", move).bind("mouseup", stop).bind("blur", stop);
            });

            var _bottom = options.range.bottom - $obj.outerHeight() - parseInt($(obj).css("margin-top")) - parseInt($(obj).css("margin-bottom"));
            var _right = options.range.right - $obj.outerWidth() - parseInt($(obj).css("margin-left")) - parseInt($(obj).css("margin-right"));

            function move(event) {
                var iTop = event.clientY - _y;
                var iLeft = event.clientX - _x;
                iTop = Math.min(Math.max(iTop, options.range.top), _bottom);
                iLeft = Math.min(Math.max(iLeft, options.range.left), _right);
                if (options.lockedX) iTop = $obj.offset().top;
                if (options.lockedY) iLeft = $obj.offset().left;
                $obj.css({
                    position : 'absolute',
                    left : iLeft + 'px',
                    top : iTop + 'px'
                    });
                options.onMove();
                if (isIE) {
                    $obj.get(0).setCapture();
                } else {
                    event.preventDefault();
                }		
            }

            function stop(event) {
                $(document).unbind("mousemove").unbind("mouseup");
                if (isIE) {
                    $obj.get(0).releaseCapture();
                }
                options.onStop();
            }
        }
    });
})(jQuery);