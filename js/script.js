$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if(scroll >=600){
        $('.navbar').addClass('load-nav')
        $('.navbar').removeClass('unload-nav')
        $('.navbar').addClass('nav-fixed')
        $('.navbar').removeClass('nav-absolute')


        $('.navbar img').css({
            height: '50px',
        })
    }else {
        $('.navbar').removeClass('load-nav')
        $('.navbar').addClass('unload-nav')
        $('.navbar').removeClass('nav-fixed')
        $('.navbar').addClass('nav-absolute')

    }
})

function greet() {
    console.log('caca')
    $('.navbar').addClass('nav-absolute')

    $('.navbar img').css({
        height: '100px'})
    }
   