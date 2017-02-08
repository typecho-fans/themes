/*
 scripts.js

 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html

 Copyright: (c) 2016 DT27, https://dt27.org
 */

"use strict";

jQuery(document).ready(function($) {

    /*  Toggle header search
    /* ------------------------------------ */
    $('.toggle-search').click(function(){
        $('.toggle-search').toggleClass('active');
        $('.search-expand').fadeToggle(250);
        setTimeout(function(){
            $('.search-expand input').focus();
        }, 300);
    });

    /*  Scroll to top
    /* ------------------------------------ */
    $('a#back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });


    /*  Sidebar collapse
    /* ------------------------------------ */
    $('body').addClass('s1-collapse');
    $('body').addClass('s2-collapse');

    $('.s1 .sidebar-toggle').click(function(){
        $('body').toggleClass('s1-collapse').toggleClass('s1-expand');
        if ($('body').is('.s2-expand')) {
            $('body').toggleClass('s2-expand').toggleClass('s2-collapse');
        }
    });
    $('.s2 .sidebar-toggle').click(function(){
        $('body').toggleClass('s2-collapse').toggleClass('s2-expand');
        if ($('body').is('.s1-expand')) {
            $('body').toggleClass('s1-expand').toggleClass('s1-collapse');
        }
    });

    /*  上一页、下一页文字
    /* ------------------------------------ */
    $('.previousPage span').text($('.previousPage').attr('title'));
    $('.nextPage span').text($('.nextPage').attr('title'));

    /*  Mobile menu smooth toggle height
    /* ------------------------------------ */
    $('.nav-toggle').on('click', function() {
        slide($('.nav-wrap .nav', $(this).parent()));
    });

    function slide(content) {
        var wrapper = content.parent();
        var contentHeight = content.outerHeight(true);
        var wrapperHeight = wrapper.height();

        wrapper.toggleClass('expand');
        if (wrapper.hasClass('expand')) {
            setTimeout(function() {
                wrapper.addClass('transition').css('height', contentHeight);
            }, 10);
        }
        else {
            setTimeout(function() {
                wrapper.css('height', wrapperHeight);
                setTimeout(function() {
                    wrapper.addClass('transition').css('height', 0);
                }, 10);
            }, 10);
        }

        wrapper.one('transitionEnd webkitTransitionEnd transitionend oTransitionEnd msTransitionEnd', function() {
            if(wrapper.hasClass('open')) {
                wrapper.removeClass('transition').css('height', 'auto');
            }
        });
    }
});