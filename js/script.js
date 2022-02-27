            $(window).scroll(function() {
            var scroll = window.scrollY
            if(scroll < 500) {
                $('.navbar').removeClass('nav-fixed')
                $('.navbar').addClass('nav-absolute')
                $('.navbar img').css({height: '100px'})
            
            } else {
                 $('.navbar').removeClass('nav-absolute')
                 $('.navbar').addClass('nav-fixed')
                 $('.navbar img').css({height: '50px'})
                }
        });
    

        var $win = $(window);
        var $project = $('.project');
        $project.css('display', "none")
        $win.on('scroll', function () {
            var scrollTop = $win.scrollTop();
            $project.each(function () {

                var $self = $(this);
                var prev=$self.offset();
                if ((scrollTop - prev.top) > 1800) {
                  $self.addClass('load')
                  $self.css('display', 'flex')
                  console.log(scrollTop - prev.top)
                }
        
            }, 1000);
        
        }).scroll();


        var $win = $(window);
        var $element = $('.show-element');
        $element.css('display', "none")
        $win.on('scroll', function () {
            var scrollTop = $win.scrollTop();
            $element.each(function () {
                var $self = $(this);
                var prev=$self.offset();
                if ((scrollTop - prev.top) > 112) {
                  $self.addClass('load')
                  $self.css('display', 'flex')
                }
        
            });
        
        }).scroll();

        
        var $svgList = $('.show-svg');
        $svgList.css('display', "none")
        $win.on('scroll', function () {
            var scrollTop = $win.scrollTop();
            $svgList.each(function () {
                var $self = $(this);
                var prev=$self.offset();
                if ((scrollTop - prev.top) > 2400) {
                  $self.addClass('load')
                  $self.css('display', 'flex')
                  console.log(scrollTop - prev.top)
                }
        
            });
        
        }).scroll();
