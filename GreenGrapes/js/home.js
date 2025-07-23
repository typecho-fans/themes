(function ($) {

// 节流，防抖
function throttle(fn,delay){
    let valid = true;
    return function() {
        if(!valid){
            //休息时间 暂不接客
            return false;
        }
        // 工作时间，执行函数并且在间隔期内把状态位设为无效
        valid = false;
        setTimeout(function() {
            fn();
            valid = true;
        }, delay);
    }
}

// 滚屏
$(document).ready(function($) {
    // 利用 data-scroll 属性，滚动到任意 dom 元素
    $.scrollto = function(scrolldom, scrolltime) {
        $(scrolldom).click( function(){
            var scrolltodom = $(this).attr("data-scroll");
            $(this).addClass("active").siblings().removeClass("active");
            $('html, body').animate({
                scrollTop: $(scrolltodom).offset().top
            }, scrolltime);
            return false;
        });
    };
    // 判断位置控制 返回顶部的显隐
    $(window).scroll(function() {
        if ($(window).scrollTop() > 500) {
            $("#back-to-top").fadeIn(600);
        } else {
            $("#back-to-top").fadeOut(600);
        }
    });
    $.scrollto("#back-to-top", 600);
});


function fssilde(){
    var mheader = document.getElementById( 'm-header' ),
        menuLeft = document.getElementById( 'm-nav' ),
        mcontainer = document.getElementById( 'm-container' ),
        mfooter = document.getElementById( 'm-footer' ),
        showLeftPush = document.getElementById( 'showLeftPush' );
    showLeftPush.onclick = function() {
        classie.toggle( mheader, 'm-header-open' );
        classie.toggle( menuLeft, 'm-nav-open' );
        classie.toggle( mcontainer, 'm-container-open' );
        classie.toggle( mfooter, 'm-footer-open' );
        disableOther( 'showLeftPush' );
    };
    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
            if( $('.m-container-open').length ){
        $(".container").click(function() {
            $( '#m-header' ).removeClass('m-header-open');
            $( '#m-nav' ).removeClass('m-nav-open');
            $( '#m-container' ).removeClass('m-container-open');
            $( '#m-footer' ).removeClass('m-footer-open');
        });
    }
    }

var eventClick = 'click';
var closeEnable = false;
    $('#search-trigger').bind(eventClick, function(event) {
        $('#search-form').addClass('active');
        closeEnable = false;
        setTimeout(function() {
            closeEnable = true;
        }, 500);
    });

    $('#search-input-s').bind('blur', function(event) {
        if ( closeEnable ) {
            $('#search-form').removeClass('active');
        }
    });

    $('#search-form-close').bind(eventClick, function(event) {
        event.preventDefault();
        if (closeEnable) {
            $('#search-form').removeClass('active');
            $('#search-input-s').blur();
            closeEnable = false;
        }
    });
}

// 提示框、弹出框 hover 自动触发
function bootstrap_auto_hover_popper() {
    // 初始化提示框
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // 初始化弹出框
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    });
}

// 侧边目录自动 active
function sidebar_catalog_auto_active() {
    var $anchor = $('.article-content .title-anchor');
    if ($anchor.length === 0) {
        // 没有锚点，无需设置
        return;
    }

    var $window = $(window);
    var $sidebar_a = $('.sidebar-catalog a');
    function choose_anchor_and_active() {
        var window_top = $window.scrollTop();
        var active_index = 0;
        for (let i = 0; i < $anchor.length; i++) {
            var current_anchor_top = $anchor.eq(i).offset().top;
            if (window_top >= current_anchor_top) {
                active_index = i;
            } else if (current_anchor_top - window_top <= 5 ) {
                active_index = i;
                break;
            }
        }
        $sidebar_a.removeClass('active');
        $sidebar_a.eq(active_index).addClass('active');
    }
    choose_anchor_and_active();
    $window.scroll(throttle(choose_anchor_and_active, 100));
}

function sidebar_last_sticky() {
    var $asides = $('#sidebar > aside');
    if ($asides.length) {
        $asides.eq(-1).addClass('position-sticky').css({
            top: '2rem',
        });
    }
}

$(document).ready(function () {
    // 分页
    $('.pagination a, .pagination span').addClass('page-link');
    $('form.protected').find('.text').addClass('form-control').end().find('.submit').addClass('btn btn-skin');

    bootstrap_auto_hover_popper();
    sidebar_catalog_auto_active();
    sidebar_last_sticky();

    if ($('#tag-cloud-tags').length) {
        TagCanvas.Start('tag-cloud-tags', '', {
            textColour: '#000000',
            outlineColour: $('.skin-bg').css('background-color'),
            outlineThickness: 1,
            maxSpeed: 0.03,
            depth: 0.75,
            wheelZoom: false,
        });
    }
    
    // 切换主题
    $('#switch_color .flex-fill').click(function(e) {
        var obj = $(this);
        $.cookie('green_grapes_color', obj.data('color'));
        location.reload();
    });
});
})(jQuery);
