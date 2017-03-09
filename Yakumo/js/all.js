function loadJS(A, e, t) {
    var o = !!window.ActiveXObject,
    a = o && !window.XMLHttpRequest,
    i = document.createElement("script"),
    r = a ? document.documentElement: document.getElementsByTagName("head")[0];
    i.type = "text/javascript",
    i.async = !0,
    i.readyState ? i.onreadystatechange = function() { ("loaded" == i.readyState || "complete" == i.readyState) && (i.onreadystatechange = null, e && e())
    }: i.onload = function() {
        e && e()
    },
    i.src = A,
    t ? document.getElementById(t).appendChild(i) : r.insertBefore(i, r.firstChild)
}
$.fn.extend({
    isOnScreenVisible: function() {
        if (!$("body").hasClass("post-template")) return ! 1;
        var A = $(window),
        e = {
            top: A.scrollTop(),
            left: A.scrollLeft()
        };
        e.right = e.left + A.width(),
        e.bottom = e.top + A.height();
        var t = this.offset();
        return t.right = t.left + this.outerWidth(),
        t.bottom = t.top + this.outerHeight(),
        !(e.right < t.left || e.left > t.right || e.bottom < t.top || e.top > t.bottom)
    }
});
General = {
    isMobile: !1,
    isWechat: !1,
    viewWidth: $(window).width(),
    absUrl: location.protocol + "//" + location.host,
    init: function() {
        var A = window,
        e = (A.document, navigator.userAgent.toLowerCase()),
        t = A.navigator.appVersion.match(/android/gi);
        A.navigator.appVersion.match(/iphone/gi);
        "micromessenger" == e.match(/MicroMessenger/i) && (General.isWechat = !0, $("body").addClass("wechat-webview")),
        t && (General.isMobile = !0),
        $("body").hasClass("post-template") && (General.updateImageWidth(), General.rewardLoader()),
        General.webFontLoader(),
        General.scrollToPos(),
        General.arrowEvent()
    },
    updateImageWidth: function() {
        function A() {
            var A = $(this),
            e = t.outerWidth(),
            o = this.naturalWidth;
            o >= e ? A.addClass("full-img") : A.removeClass("full-img")
        }
        function e() {
            o.each(A)
        }
        var t = $(".post-content"),
        o = $(".single-post-inner img").on("load", A);
        e()
    },
    webFontLoader: function() {
        WebFontConfig = {
            loading: function() {},
            custom: {
                families: ["Exo", "iconfont"],
                urls: [General.absUrl + "/usr/themes/Yakumo/css/font.min.css"]
            }
        },
        loadJS(General.absUrl + "/usr/themes/Yakumo/js/webfont.js",
        function() {
            WebFont.load({
                custom: {
                    families: ["Exo", "iconfont"]
                }
            })
        })
    },
    arrowEvent: function() {
        $(".arrow_down").click(function() {
            return $("html,body").animate({
                scrollTop: $(window).height() - 20
            },
            600,
            function() {
                window.location.hash = "#"
            }),
            !1
        })
    },
    scrollToPos: function(A) {
        var e = "我要飞到最高",
        t = (A || $(window).height(), $('<a href="#" id="to-top" title="' + e + '"> <div class="to-top-wrap"></div></a>').appendTo("body"));
        $(window).scroll(function() {
            $(window).scrollTop() > $(window).height() ? t.fadeIn(500) : t.fadeOut(500)
        }),
        t.click(function(A) {
            A.preventDefault(),
            $("html,body").animate({
                scrollTop: 0
            },
            666,
            function() {
                window.location.hash = "#"
            })
        })
    },
    urlIconlize: function(A) {
        var e, t, o = "iconfont",
        a = {
            twitter: o + "-twitter",
            qzone: o + "-qzone",
            weibo: o + "-weibo",
            facebook: o + "-facebook",
            douban: o + "-douban",
            google: o + "-google",
            dribble: o + "-dribble",
            zhihu: o + "-zhihu",
            wikipedia: o + "-wikipedia",
        };
        for (var i in a) if ("function" != typeof a[i]) {
            var r = i;
            A.indexOf(r) >= 0 && (e = r, t = a[r])
        }
        return t
    },
    addIcons: function() {
        $(".single-post-inner  a:not(:has(img))").each(function(A) {
            var e = $(this).attr("href"),
            t = document.createElement("a");
            t.href = e,
            _selfDomain = t.hostname,
            General.urlIconlize(_selfDomain),
            $(this).prepend('<i class="iconfont ' + General.urlIconlize(_selfDomain) + '"></i>');
            var o = $(this).find("i").css("color"),
            a = $(this).css("color");
            $(this).hover(function() {
                $(this).css("color", o),
                $(this).addClass("animated pulse")
            },
            function() {
                $(this).css("color", a),
                $(this).removeClass("animated pulse")
            })
        })
    },
    rewardLoader: function() {
        $(".money-like .reward-button").hover(function() {
            $(".money-code").fadeIn(),
            $(this).addClass("active")
        },
        function() {
            $(".money-code").fadeOut(),
            $(this).removeClass("active")
        },
        800)
    }
}

$(document).ready(function() {
    General.init();
});