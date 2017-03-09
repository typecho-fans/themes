!function (Aa, AX, AS) {
  function A9() {
    return A8.short_name ? Bb + "//" + A8.short_name + "." + As.DOMAIN : As.REMOTE
  }

  function A2() {
    function B() {
      for (var E; E = AQ.shift();) {
        var F = E.url, C = new A(E.title, {dir: "auto", icon: E.iconUrl, body: E.body});
        try {
          C.onclick = function () {
            Aa.focus(), A1.href = F, C.close()
          }
        } catch (D) {
        }
        setTimeout(function () {
          C.close && C.close()
        }, 8000)
      }
    }

    var A = Aa.Notification;
    "Notification" in Aa && "denied" !== A.permission && ("granted" === A.permission && B(), A.requestPermission(function (C) {
      "granted" === C && B()
    }))
  }

  function AR() {
    return 0 == Af.data.user_id
  }

  function A3(A) {
    As.theme = A, "none" != A && A4.injectStylesheet(As.STATIC_URL + "/styles/embed" + (A ? "." + A + ".css?" + AG[A] : "." + short_name) + ".css")
  }

  var A4 = {}, Bc = AX.getElementsByTagName("head")[0] || AX.getElementsByTagName("body")[0];
  if (A4.extend = function (A, C) {
      for (var B in C) {
        A[B] = C[B]
      }
      return A
    }, A4.injectScript = function (D, A) {
      var B = AX.createElement("script"), C = AX.head || AX.getElementsByTagName("head")[0] || AX.documentElement;
      B.type = "text/javascript", B.src = D, B.async = "async", B.charset = "utf-8", A && (B.onload = B.onreadystatechange = function (F, G) {
        var E = G || !B.readyState || /loaded|complete/.test(B.readyState);
        E && (B.onload = B.onreadystatechange = null, C && B.parentNode && C.removeChild(B), B = AS, G || A.call(Aa))
      }), C.insertBefore(B, C.firstChild)
    }, A4.injectStylesheet = function (A) {
      var B = AX.createElement("link");
      B.type = "text/css", B.rel = "stylesheet", B.href = A, Bc.appendChild(B)
    }, A4.injectStyle = function (A) {
      var B = AX.createElement("style");
      return B.type = "text/css", Bc.appendChild(B), A = A.replace(/\}/g, "}\n"), B.styleSheet ? B.styleSheet.cssText = A : B.appendChild(AX.createTextNode(A)), B
    }, A4.getCookie = function (B) {
      for (var G, A, C, D = " " + B + "=", E = AX.cookie.split(";"), F = 0; F < E.length; F++) {
        if (G = " " + E[F], A = G.indexOf(D), A >= 0 && A + D.length == (C = G.indexOf("=") + 1)) {
          return decodeURIComponent(G.substring(C, G.length).replace(/\+/g, ""))
        }
      }
      return AS
    }, A4.param = function (A) {
      var B = [];
      for (var C in A) {
        A[C] != AS && B.push(C + "=" + encodeURIComponent(A[C]))
      }
      return B.join("&")
    }, A4.cssProperty = function (B, C) {
      var E = (AX.body || AX.documentElement).style;
      if ("undefined" == typeof E) {
        return !1
      }
      if ("string" == typeof E[B]) {
        return C ? B : !0
      }
      for (var A = ["Moz", "Webkit", "ms"], B = B.charAt(0).toUpperCase() + B.substr(1), D = 0; D < A.length; D++) {
        if ("string" == typeof E[A[D] + B]) {
          return C ? A[D] + B : !0
        }
      }
    }, !Aa.DUOSHUO) {
    for (var A5 in Object.prototype) {
      return alert("Object.prototype 不为空，请不要给 Object.prototype 设置方法")
    }
    var A8, AY, AT = Aa.JSON, A1 = Aa.location, Ba = Aa.XMLHttpRequest, A6 = AT && AT.stringify && Aa.localStorage, AV = Aa.navigator.userAgent, Bb = "https:" == AX.location.protocol ? "https:" : "http:", A7 = 0, AQ = [], Aq = AY = function () {
      function A(E) {
        return C[E] || "&amp;"
      }

      var C = {
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#x27;",
        "`": "&#x60;"
      }, B = /&(?!\w+;)|[<>"'`]/g, D = /[&<>"'`]/;
      return function (E) {
        return null == E || E === !1 ? "" : D.test(E) ? E.replace(B, A) : E
      }
    }(), A0 = function (A) {
      if (A.match(/^(http|https):/)) {
        return A
      }
      var B = AX.createElement("a");
      return B.href = A, At.hrefNormalized ? B.href : B.getAttribute("href", 4)
    }, AW = function (A) {
      return function () {
        return A
      }
    }, AP = function () {
      for (var A = {}, C = 0; C < arguments.length; C++) {
        arguments[C] && A4.extend(A, arguments[C])
      }
      var B = A4.param(A);
      return B ? "?" + B : ""
    }, Ax = function () {
      var A = A4.getCookie("duoshuo_token");
      return A ? {jwt: A} : A8.remote_auth ? {short_name: A8.short_name, remote_auth: A8.remote_auth} : AS
    }, AU = function () {
      if (!A8 && (A8 = Aa.duoshuoQuery)) {
        if (!A8.short_name || "your_duoshuo_short_name" === A8.short_name) {
          return A8 = AS, void alert("你还没有设置多说域名(duoshuoQuery.short_name)，填入已有域名或创建新站点：http://duoshuo.com/create-site/")
        }
        Ae.trigger("queryDefined")
      }
      return A8
    }, AI = function (A) {
      return A && A.error && A.warn ? A : {
        error: function () {
        }, log: function () {
        }, warn: function () {
        }
      }
    }(Aa.console), As = Aa.DUOSHUO = {
      sourceName: {
        weibo: "新浪微博",
        qq: "QQ",
        qzone: "QQ空间",
        qqt: "腾讯微博",
        renren: "人人网",
        douban: "豆瓣网",
        kaixin: "开心网",
        sohu: "搜狐微博",
        baidu: "百度",
        google: "谷歌",
        wechat: "微信",
        weixin: "微信",
        facebook: "Facebook",
        twitter: "Twitter",
        linkedin: "Linkedin"
      },
      serviceNames: {
        weibo: "微博",
        qq: "QQ",
        douban: "豆瓣",
        renren: "人人",
        kaixin: "开心",
        baidu: "百度",
        google: "谷歌",
        wechat: "微信",
        weixin: "微信",
        facebook: "Facebook",
        twitter: "Twitter",
        linkedin: "Linkedin"
      },
      parseDate: function (A) {
        return A.parse("2011-10-28T00:00:00+08:00") && function (B) {
            return new A(B)
          } || A.parse("2011/10/28T00:00:00+0800") && function (B) {
            return new A(B.replace(/-/g, "/").replace(/:(\d\d)$/, "$1"))
          } || A.parse("2011/10/28 00:00:00+0800") && function (B) {
            return new A(B.replace(/-/g, "/").replace(/:(\d\d)$/, "$1").replace("T", " "))
          } || function (B) {
            return new A(B)
          }
      }(Date),
      fullTime: function (A) {
        var B = As.parseDate(A);
        return B.getFullYear() + "年" + (B.getMonth() + 1) + "月" + B.getDate() + "日 " + B.toLocaleTimeString()
      },
      elapsedTime: function (A) {
        var C = As.parseDate(A), B = new Date, D = (B - A7 - C) / 1000;
        return 10 > D ? "刚刚" : 60 > D ? Math.round(D) + "秒前" : 3600 > D ? Math.round(D / 60) + "分钟前" : 86400 > D ? Math.round(D / 3600) + "小时前" : (B.getFullYear() == C.getFullYear() ? "" : C.getFullYear() + "年") + (C.getMonth() + 1) + "月" + C.getDate() + "日"
      },
      compileStyle: function (A) {
        var C = "", B = {};
        if (B.textbox = "#ds-thread #ds-reset .ds-replybox .ds-textarea-wrapper", !A) {
          return C
        }
        for (var D in A) {
          C += B[D] + "{" + A[D] + "}\n"
        }
        return C
      },
      init: function (A, B) {
        A && !AE[A] && (AE[A] = B || {type: "EmbedThread"}), As.initView && As.initView()
      }
    }, AZ = AX.all, At = As.support = function () {
      var B = AX.createElement("div");
      B.innerHTML = '<a href="/a" style="opacity:.55;">a</a><input type="checkbox"/>';
      var D = B.getElementsByTagName("a")[0], A = B.getElementsByTagName("input")[0], C = {
        placeholder: "placeholder" in A,
        touch: "ontouchstart" in Aa || "onmsgesturechange" in Aa,
        opacity: /^0.55$/.test(D.style.opacity),
        hrefNormalized: "/a" === D.getAttribute("href"),
        iOS: AV.match(/ \((iPad|iPhone|iPod);( U;)? CPU( iPhone)? OS /),
        android: AV.match(/ \(Linux; U; Android /)
      };
      return C.ie6 = !Ba && "undefined" == typeof B.style.maxHeight, C.authInWin = Aa.postMessage && Aa.screen.width > 800 && !C.iOS && !C.android && A1.origin, C
    }(), AE = As.selectors = {
      ".ds-thread": {type: "EmbedThread"},
      ".ds-recent-comments": {type: "RecentComments"},
      ".ds-recent-visitors": {type: "RecentVisitors"},
      ".ds-top-users": {type: "TopUsers"},
      ".ds-top-threads": {type: "TopThreads"},
      ".ds-login": {type: "LoginWidget"},
      ".ds-thread-count": {type: "ThreadCount"},
      ".ds-share": {type: "ShareWidget"}
    }, AN = As.openDialog = function (A) {
      return As.dialog !== AS && As.dialog.el.remove(), As.dialog = new Ab.Dialog(Am.dialog(A)).open()
    }, AF = As.smilies = {};
    As.require = function () {
      function B(C) {
        var D = Ay[C] ? "?" + Ay[C] + ".js" : "";
        return As.STATIC_URL + "/libs/" + C + ".js" + D
      }

      var A = {mzadxN: "undefined" != typeof mzadxN};
      return "undefined" != typeof jQuery && jQuery.fn.jquery >= "1.5" && (A["embed.compat"] = !0, As.jQuery = Aa.jQuery), function (D, F) {
        if ("string" == typeof D) {
          A[D] ? F() : A4.injectScript(B(D), function () {
            A[D] = !0, F()
          })
        } else {
          if ("object" == typeof D) {
            var C, E = !0;
            for (C = 0; C < D.length; C++) {
              (function (G) {
                A[D[C]] || (E = !1, A4.injectScript(B(G), function () {
                  A[G] = !0;
                  for (var H = 0; H < D.length; H++) {
                    if (!A[D[H]]) {
                      return
                    }
                  }
                  F()
                }))
              })(D[C])
            }
            E && F()
          }
        }
      }
    }();
    for (var AD = 0, AC = ["EmbedThread", "RecentComments", "RecentVisitors", "TopUsers", "TopThreads", "LoginWidget", "ThreadCount"]; AD < AC.length; AD++) {
      As[AC[AD]] = function (A) {
        return function (C, B) {
          B = B || {}, B.type = A, C && !AE[C] && (AE[C] = B), As.initSelector && As.initSelector(C, B)
        }
      }(AC[AD]), As["create" + AC[AD]] = function (A) {
        return function (C, E) {
          var B = AX.createElement(C);
          for (var D in E) {
            B.setAttribute("data-" + D, E[D])
          }
          return As[A](B), B
        }
      }(AC[AD])
    }
    As.RecentCommentsWidget = As.RecentComments;
    var Ar = As.API = {
      ajax: function (B, C, F, A, G) {
        function M(N) {
          var O = N.getResponseHeader("Date");
          O && (A7 = new Date - new Date(O))
        }

        function I(N, P, O) {
          var U, Q, R, S = P;
          if (N >= 200 && 300 > N || 304 === N) {
            if (304 === N) {
              S = "notmodified", R = !0
            } else {
              try {
                U = AT.parse(O), S = "success", R = !0
              } catch (T) {
                S = "parsererror", Q = T
              }
            }
          } else {
            Q = S, (!S || N) && (S = "error", 0 > N && (N = 0));
            try {
              U = AT.parse(O)
            } catch (T) {
              S = "parsererror", Q = T
            }
          }
          R ? A && A(U) : "parseerror" === S ? AI.error("解析错误: " + O) : (AI.error("出错啦(" + U.code + "): " + U.errorMessage), G && G(U), U.errorTrace && AI.error(U.errorTrace)), M(J)
        }

        var D = A4.getCookie("duoshuo_token");
        F = F || {}, F.v = As.version, D ? F.jwt = D : A8.remote_auth && (F.remote_auth = A8.remote_auth);
        var E = Ba && AT && AT.parse;
        if (E) {
          var J = new Ba, H = !!J && "withCredentials" in J;
          if (H) {
            var L;
            return J.open(B, A9() + "/api/" + C + ".json" + ("GET" == B ? "?" + A4.param(F) : ""), !0), J.withCredentials = !0, J.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8"), J.send("GET" == B ? null : A4.param(F)), L = function (O, P) {
              var T, Q, N, R;
              try {
                if (L && (P || 4 === J.readyState)) {
                  if (L = AS, P) {
                    4 !== J.readyState && J.abort()
                  } else {
                    T = J.status, N = J.getAllResponseHeaders();
                    try {
                      R = J.responseText
                    } catch (O) {
                    }
                    try {
                      Q = J.statusText
                    } catch (S) {
                      Q = ""
                    }
                  }
                }
              } catch (U) {
                P || I(-1, U)
              }
              R && I(T, Q, R, N)
            }, void (4 === J.readyState ? L() : J.onreadystatechange = L)
          }
        }
        "GET" != B && (F._method = "POST");
        var K = "cb_" + Math.round(1000000 * Math.random());
        Ar[K] = function (N) {
          switch (N.code) {
            case 0:
              A && A(N);
              break;
            default:
              G && G(N), AI.error("出错啦(" + N.code + "): " + N.errorMessage), N.errorTrace && AI.error(N.errorTrace)
          }
        }, F.callback = "DUOSHUO.API['" + K + "']", A4.injectScript(A9() + "/api/" + C + ".jsonp?" + A4.param(F))
      }, get: function (A, C, B, D) {
        return this.ajax("GET", A, C, B, D)
      }, post: function (A, C, B, D) {
        return this.ajax("POST", A, C, B, D)
      }
    }, AJ = As.ws = {
      messages: [], send: function (B) {
        if (!("WebSocket" in Aa && AT)) {
          return !1
        }
        var D = this;
        if (D.messages.push(AT.stringify(B)), !D.webSocket) {
          var A = "https:" === AX.location.protocol ? "wss://ws.duoshuo.com:8202/" : "ws://ws.duoshuo.com:8201/", C = D.webSocket = new WebSocket(A);
          C.onopen = function () {
            var E, F = 1 === C.readyState;
            if (F) {
              for (; E = D.messages.shift();) {
                C.send(E)
              }
            }
          }, C.onmessage = function (F) {
            try {
              var H = AT.parse(F.data)
            } catch (G) {
              return
            }
            switch (H.type) {
              case"post":
                for (var I, E = 0; E < As.pagelets.length; E++) {
                  I = As.pagelets[E], I.threadId == H.thread_id && I.onMessage(H)
                }
                break;
              case"notification":
                AQ.push(H), A2()
            }
          }, Aa.addEventListener("beforeunload", function () {
            C.close()
          })
        }
        D.webSocket.onopen()
      }
    };
    As.DOMAIN = "duoshuo.com", As.STATIC_URL = Bb + "//static.duoshuo.com", As.REMOTE = Bb + "//duoshuo.com", As.version = "16.6.16";
    var AG = {
      "default": "9b2a46a0",
      dark: "33f3a5ac",
      bluebox: "39a75d50",
      newhua: "706ba4eb",
      justflat: "9d72ec5a"
    }, Ay = {"embed.compat": "24f8ca3f", smilies: "921e8eda"}, AO = {
      post: "发布",
      posting: "正在发布",
      settings: "设置",
      reply: "回复",
      like: "顶",
      repost: "转发",
      report: "举报",
      "delete": "删除",
      reply_to: "回复 ",
      reposts: "转发",
      comments: "评论",
      floor: "楼",
      latest: "最新",
      earliest: "最早",
      hottest: "最热",
      share_to: "分享到:",
      leave_a_message: "说点什么吧…",
      no_comments_yet: "还没有评论，沙发等你来抢",
      repost_reason: "请输入转发理由",
      hot_posts_title: "被顶起来的评论",
      comments_zero: "暂无评论",
      comments_one: "1条评论",
      comments_multiple: "{num}条评论",
      reposts_zero: "暂无转发",
      reposts_one: "1条转发",
      reposts_multiple: "{num}条转发",
      weibo_reposts_zero: "暂无新浪微博",
      weibo_reposts_one: "1条新浪微博",
      weibo_reposts_multiple: "{num}条新浪微博",
      qqt_reposts_zero: "暂无腾讯微博",
      qqt_reposts_one: "1条腾讯微博",
      qqt_reposts_multiple: "{num}条腾讯微博"
    }, AM = {
      get: function (A) {
        return A6 ? A6[A] : void 0
      }, save: function (A, C) {
        if (A6) {
          try {
            A6.removeItem(A), A6[A] = AT.stringify(C), A6.removeItem(A + ":timestamp"), A6[A + ":timestamp"] = Math.floor((new Date - A7) / 1000)
          } catch (B) {
          }
        }
      }
    }, Aw = As.loadRequire = function (B) {
      if (B.visitor && (!Af.data && B.visitor.user_id && Aa.Notification && AJ.send({logged_user_id: B.visitor.user_id}), Af.reset(B.visitor)), B.site && (Ac.reset(B.site), AM.save("ds_site_" + A8.short_name, B.site)), !As.theme && Ac.data.theme && A3(Ac.data.theme), B.lang && (A4.extend(AO, B.lang), AM.save("ds_lang_" + A8.short_name, B.lang)), B.stylesheets) {
        for (var A = 0; A < B.stylesheets.length; A++) {
          A4.injectStylesheet(B.stylesheets[A])
        }
      }
      if (B.nonce && (As.nonce = B.nonce), B.style && A4.injectStyle((B.style || "") + As.compileStyle(A8.component_style)), B.unread && Ag.reset(B.unread), B.warnings) {
        for (var A = 0; A < B.warnings.length; A++) {
          AI.warn(B.warnings[A])
        }
      }
    }, AH = 0, AB = As.Class = function () {
    };
    AB.extend = function (A) {
      function C() {
        !AH && this.init && this.init.apply(this, arguments)
      }

      AH = 1;
      var B = new this;
      AH = 0;
      for (var D in A) {
        B[D] = A[D]
      }
      return C.prototype = B, C.prototype.constructor = C, C.extend = arguments.callee, C
    };
    var Az = As.Event = AB.extend({
      on: function (A, B) {
        var C = this.handlers || (this.handlers = {});
        return C[A] === AS && (C[A] = []), C[A].push(B), this
      }, trigger: function (A, C) {
        var B = (this.handlers || (this.handlers = {}))[A];
        if (B) {
          for (var D = 0; D < B.length && B[D].call(this, C) !== !1; D++) {
          }
        }
        return this
      }
    }), Au = As.Widget = Az.extend({
      init: function (A, B) {
        this.el = A, this.options = B || {}, this.render()
      }, render: function () {
      }, reset: function () {
      }, load: function (A) {
        switch (A.code) {
          case 0:
            Aw(A);
            var B = this.prepare(A);
            B.options = A4.extend(this.options, A.options), this.onload(B);
            break;
          default:
            this.onError(A)
        }
      }, onload: function (A) {
        this.el.html(Am[this.tmpl](A))
      }, prepare: function (A) {
        return A
      }, onMessage: function () {
      }, onError: function (A) {
        AI.error("出错啦(" + A.code + "): " + A.errorMessage), A.errorTrace && AI.error(A.errorTrace)
      }
    }), Av = As.Model = Az.extend({
      init: function (A) {
        this.data = A
      }, reset: function (A) {
        this.data = A, this.trigger("reset")
      }, remove: function (A) {
        this.data.splice(A, 1), this.trigger("reset")
      }, set: function (A, B) {
        if (B === AS) {
          for (var C in A) {
            this.data[C] = A[C]
          }
        } else {
          this.data[A] = B
        }
        return this.trigger("reset"), this
      }, toJSON: function () {
        return A4.extend({}, this.data)
      }
    }), Ah = Av.extend({
      toJSON: function () {
        return A4.extend({}, this.data)
      }
    }), AK = Av.extend({
      toJSON: function () {
        var A = A4.extend({}, this.data);
        return A.theAuthor = Aj[this.data.author_id] && Aj[this.data.author_id].data || this.data.author, A.parents = this.data.parents || [], A
      }
    }), AL = Av.extend({
      toJSON: function () {
        return A4.extend({}, this.data)
      }
    }), Ap = function (A) {
      this.model = A
    };
    Ap.prototype.set = function (A) {
      for (var B in A) {
        A[B] && (this[B] ? this[B].set(A[B]) : this[B] = new this.model(A[B]))
      }
    }, Ap.prototype.get = function (A) {
      for (var C = 0, B = []; C < A.length; C++) {
        B[C] = this[A[C]]
      }
      return B
    }, Ap.prototype.getJSON = function (A) {
      for (var C = 0, B = []; C < A.length; C++) {
        this[A[C]] && B.push(this[A[C]].toJSON())
      }
      return B
    };
    var An = {
      userUrl: function (A) {
        return A.url
      }, avatarUrl: function (A) {
        var B = A.avatar_url || Ac.data.default_avatar_url;
        B = B.replace(/http:/g, "https:");
        return B
      }, loginUrl: function (A, B) {
        return B || (B = {}), A8.sso && A8.sso.login && (B.sso = 1, B.redirect_uri = A8.sso.login), A9() + "/login/" + A + "/" + AP(B)
      }, bindUrl: function (A) {
        return A9() + "/bind/" + A + "/" + AP(A8.sso && A8.sso.login ? {
            sso: 1,
            redirect_uri: A8.sso.login
          } : null, Ax())
      }, logoutUrl: function () {
        return A9() + "/logout/" + AP(A8.sso && A8.sso.logout ? {sso: 1, redirect_uri: A8.sso.logout} : null)
      }
    }, Ao = ["weixin", "weibo", "qq", "renren"], AA = ["douban", "kaixin", "baidu", "google"], Am = As.templates = {
      userAnchor: function (A) {
        return A.url ? '<a rel="nofollow author" target="_blank" href="' + Aq(A.url) + '">' + Aq(A.name) + "</a>" : Aq(A.name)
      },
      avatarImg: function (A, B) {
        return '<img src="' + Aq(An.avatarUrl(A, B)) + '" alt="' + Aq(A.name) + '"' + (B ? ' style="width:' + B + "px;height:" + B + 'px"' : "") + "/>"
      },
      avatar: function (B, D) {
        var C = Am.avatarImg(B, D), A = An.userUrl(B);
        return A ? '<a rel="nofollow author" target="_blank" href="' + Aq(A) + '" ' + (B.user_id ? " onclick=\"this.href='" + A9() + "/user-url/?user_id=" + B.user_id + "';\"" : "") + ' title="' + Aq(B.name) + '">' + C + "</a>" : C
      },
      timeText: function (A) {
        return A ? '<span class="ds-time" datetime="' + A + '" title="' + As.fullTime(A) + '">' + As.elapsedTime(A) + "</span>" : ""
      },
      timeAnchor: function (A, B) {
        return A ? '<a href="' + B + '" target="_blank" rel="nofollow" class="ds-time" datetime="' + A + '" title="' + As.fullTime(A) + '">' + As.elapsedTime(A) + "</a>" : ""
      },
      serviceIcon: function (A, B) {
        return '<a href="javascript:void(0)" class="ds-service-icon' + (B ? "-grey" : "") + " ds-" + A + '" data-service="' + A + '" title="' + As.sourceName[A] + '"></a>'
      },
      poweredBy: function (A) {
        return '<p class="ds-powered-by"><a href="http://duoshuo.com" target="_blank" rel="nofollow">' + Aq(A) + "</a></p>"
      },
      indicator: AW('<div id="ds-indicator"></div>'),
      waitingImg: AW('<div id="ds-waiting"></div>'),
      loginItem: function (A, C) {
        var B = An[C ? "bindUrl" : "loginUrl"](A);
        return '<li>    <a href="' + B + '" rel="nofollow" class="ds-service-link ds-' + A + '">' + As.serviceNames[A] + (Af.data.social_uid[A] ? ' <span class="ds-icon ds-icon-ok"></span>' : "") + "</a></li>"
      }
    }, Ad = function (A) {
      var C = [];
      for (var B in A) {
        C.push('<input type="hidden" name="' + B + '" value="' + Aq(A[B]) + '" />')
      }
      return C.join("\n")
    };
    Am.commentList = function (B) {
      var E = "", C = B.list;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += '<li class="ds-comment', B.options.show_avatars && (E += " ds-show-avatars"), E += '" data-post-id="' + F.post_id + '">', B.options.show_avatars && (E += '<div class="ds-avatar">' + Am.avatar(F.theAuthor, B.options.avatar_size) + "</div>"), E += '<div class="ds-meta">' + Am.userAnchor(F.theAuthor), B.options.show_time && (E += Am.timeText(F.created_at)), E += "</div>", E += B.options.show_title ? '<div class="ds-thread-title">在 <a href="' + AY(F.thread.url) + '#comments">' + AY(F.thread.title) + '</a> 中评论</div><div class="ds-excerpt">' + F.message + "</div>" : '<a class="ds-excerpt" title="' + F.thread.title + ' 中的评论" href="' + AY(F.thread.url) + '#comments">' + F.message + "</a>", E += "</li>"
        }
      }
      return E
    }, Am.ctxPost = function (A) {
      var B = "";
      return A.post && (B += '<li class="ds-ctx-entry"', A.hidden && (B += ' style="display:none"'), B += ' data-post-id="' + A.post.post_id + '"><div class="ds-avatar">' + Am.avatar(A.post.theAuthor || A.post.author) + '</div><div class="ds-ctx-body"><div class="ds-ctx-head">' + Am.userAnchor(A.post.theAuthor || A.post.author) + Am.timeAnchor(A.post.created_at, A.post.url), A.index >= 0 && (B += '<div class="ds-ctx-nth" title="' + As.fullTime(A.post.created_at) + '">' + (A.index + 1) + AO.floor + "</div>"), B += '</div><div class="ds-ctx-content">' + A.post.message, A.index >= 0 && (B += '　　　　　　　<div class="ds-comment-actions', A.post.vote > 0 && (B += " ds-post-liked"), B += '">' + Am.likePost(A.post) + '<a class="ds-post-repost" href="javascript:void(0);"><span class="ds-icon ds-icon-share"></span>' + AO.repost + '</a><a class="ds-post-reply" href="javascript:void(0);"><span class="ds-icon ds-icon-reply"></span>' + AO.reply + "</a></div>"), B += "</div></div></li>"), B
    }, Am["dialog-anonymous"] = function (B) {
      var E = '<h2>社交帐号登录</h2><div class="ds-icons-32">', C = B.services;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += '<a class="ds-' + F + '" href="' + An.loginUrl(F) + '">' + As.sourceName[F] + "</a>"
        }
      }
      return E += "</div>", B.options.deny_anonymous || (E += '<h2>作为游客留言</h2><form><div class="ds-control-group"><input type="text" name="author_name" id="ds-dialog-name" value="' + AY(Af.data.name) + '" required /><label for="ds-dialog-name">名字(必填)</label></div>', B.options.require_guest_email && (E += '<div class="ds-control-group"><input type="email" name="author_email" id="ds-dialog-email" value="' + AY(Af.data.email) + '" required /><label for="ds-dialog-email">邮箱(必填)</label></div>'), B.options.require_guest_url && (E += '<div class="ds-control-group"><input type="url" name="author_url" id="ds-dialog-url" placeholder="http://" value="' + AY(Af.data.url) + '" /><label for="ds-dialog-url">网址(可选)</label></div>'), E += '<button type="submit">发布</button></form>'), E
    }, Am["dialog-ask-for-auth"] = function () {
      var A = '<h2>社交帐号登录</h2><ul class="ds-service-list">' + Am.serviceList(Ao) + '</ul><ul class="ds-service-list ds-additional-services">' + Am.serviceList(AA) + "</ul>";
      return A
    }, Am["dialog-bind-more"] = function () {
      var A = '<h2>绑定更多帐号</h2><ul class="ds-service-list">' + Am.serviceBindList(Ao) + '</ul><ul class="ds-service-list ds-additional-services">' + Am.serviceBindList(AA) + '</ul><div style="clear:both"></div>';
      return A
    }, Am["dialog-qrcode"] = function (A) {
      var B = '<h2>微信扫一扫，分享到朋友圈</h2><div class="ds-share-qrcode" style="text-align:center;"><img src="' + A.qrcode_url + '" alt="' + A.url + '"></div>';
      return B
    }, Am["dialog-reposts"] = function (A) {
      var B = '<h2>转发到微博</h2><div class="ds-quote"><strong>@' + AY(A.post.theAuthor.name) + "</strong>: " + A.post.message + "</div><form>" + Ad({post_id: A.post.post_id}) + '<div class="ds-textarea-wrapper"><textarea name="message" title="Ctrl+Enter快捷提交" placeholder="' + AY(AO.repost_reason) + '">' + AY(A.repostMessage) + '</textarea><pre class="ds-hidden-text"></pre>';
      return B += '</div><div class="ds-actions">', A.service ? B += Ad({"service[]": A.service}) : (B += '<label><input type="checkbox" name="service[]" value="weibo"', Af.data.social_uid.weibo && (B += ' checked="checked"'), B += ' /><span class="ds-service-icon ds-weibo"></span>新浪微博</label><label><input type="checkbox" name="service[]" value="qqt"', Af.data.social_uid.qq && (B += ' checked="checked"'), B += ' /><span class="ds-service-icon ds-qqt"></span>腾讯微博</label>'), B += '<button type="submit">' + AO.repost + "</button></div></form>"
    }, Am.dialog = function (A) {
      var B = '<div class="ds-dialog"><div class="ds-dialog-inner ds-rounded"><div class="ds-dialog-body">' + A + '</div><div class="ds-dialog-footer"><a href="http://duoshuo.com/" target="_blank" class="ds-logo"></a><span>社会化评论框</span></div><a class="ds-dialog-close" href="javascript:void(0)" title="关闭"></a></div></div>';
      return B
    }, Am.hotPosts = function (B) {
      var E = '<div class="ds-header ds-gradient-bg">' + AY(AO.hot_posts_title) + "</div><ul>", C = B.list;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += Am.post({post: F, options: B.options})
        }
      }
      return E += "</ul>"
    }, Am.likePost = function (A) {
      var B = '<a class="ds-post-likes" href="javascript:void(0);"><span class="ds-icon ds-icon-like"></span>' + AO.like;
      return A.likes > 0 && (B += "(" + A.likes + ")"), B += "</a>"
    }, Am.likeTooltip = function (A) {
      var C = '<div class="ds-like-tooltip ds-rounded"><p>很高兴你能喜欢，分享一下吧：</p><ul>';
      for (var B in A.services) {
        C += '<li><a class="ds-share-to-' + B + " ds-service-link ds-" + B + '" >' + A.services[B] + "</a></li>"
      }
      return C += '</ul><p class="ds-like-tooltip-footer"><a class="ds-like-tooltip-close">算了</a></p></div>'
    }, Am.loginButtons = function () {
      var A = '<div class="ds-login-buttons"><p>社交帐号登录:</p><div class="ds-social-links"><ul class="ds-service-list">' + Am.serviceList(Ao) + '<li><a class="ds-more-services" href="javascript:void(0)">更多»</a></li></ul><ul class="ds-service-list ds-additional-services">' + Am.serviceList(AA) + "</ul></div></div>";
      return A
    }, Am.loginWidget = function (B) {
      var E = '<div class="ds-icons-32">', C = B;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += '<a class="ds-' + F + '" href="' + An.loginUrl(F) + '">' + As.sourceName[F] + "</a>"
        }
      }
      return E += "</div>"
    }, Am.meta = function (A) {
      var B = '<div class="ds-meta"><a href="javascript:void(0)" class="ds-like-thread-button ds-rounded';
      return A.user_vote > 0 && (B += " ds-thread-liked"), B += '"><span class="ds-icon ds-icon-heart"></span> <span class="ds-thread-like-text">', B += A.user_vote > 0 ? "已喜欢" : "喜欢", B += '</span><span class="ds-thread-cancel-like">取消喜欢</span></a><span class="ds-like-panel"></span></div>'
    }, Am.notify = function (A) {
      var B = '<div id="ds-reset"><a class="ds-logo" href="http://duoshuo.com/" target="_blank" title="多说"></a><ul class="ds-notify-unread"><li';
      return A.comments || (B += ' style="display:none;"'), B += '><a data-type="unread-comments" href="javascript:void(0);">你有' + A.comments + "条新回复</a></li><li", A.notifications || (B += ' style="display:none;"'), B += '><a data-type="unread-notifications" href="javascript:void(0);">你有' + A.notifications + "条系统消息</a></li></ul></div>"
    }, Am.post = function (D) {
      var E = "", B = D.post, F = D.options, A = B.author;
      B.message = B.message.replace(/http:/g, "https:");
      if (E += '<li class="ds-post" data-post-id="' + B.post_id + '"><div class="ds-post-self" data-post-id="' + B.post_id + '" data-thread-id="' + B.thread_id + '" data-root-id="' + B.root_id + '" data-source="' + B.source + '"><div class="ds-avatar"', A.user_id && (E += ' data-user-id="' + A.user_id + '"'), E += ">" + Am.avatar(A), As.sourceName[B.source] && (E += Am.serviceIcon(B.source)), E += '</div><div class="ds-comment-body"><div class="ds-comment-header">', A.url ? (E += '<a class="ds-user-name ds-highlight" data-qqt-account="' + (A.qqt_account || "") + '" href="' + AY(A.url) + '" ', A.user_id && (E += " onclick=\"this.href='" + A9() + "/user-url/?user_id=" + A.user_id + "';\""), E += ' rel="nofollow" target="_blank"', A.user_id && (E += ' data-user-id="' + A.user_id + '"'), E += ">" + AY(A.name) + "</a>") : (E += '<span class="ds-user-name"', A.user_id && (E += ' data-user-id="' + A.user_id + '"'), E += ' data-qqt-account="' + (A.qqt_account || "") + '">' + AY(A.name) + "</span>"), E += "</div>", 1 == F.max_depth && F.show_context && B.parents.length) {
        E += '<ol id="ds-ctx">';
        var G = Ai.getJSON(B.parents);
        if (G) {
          for (var H, K = -1, I = G.length - 1; I > K;) {
            H = G[K += 1], 1 == K && B.parents.length > 2 && (E += '<li class="ds-ctx-entry"><a href="javascript:void(0);" class="ds-expand">还有' + (B.parents.length - 2) + "条评论</a></li>"), E += Am.ctxPost({
              post: H,
              index: K,
              hidden: K && K < B.parents.length - 1
            })
          }
        }
        E += "</ol>"
      }
      if (E += "<p>", B.parents.length >= F.max_depth && (!F.show_context || F.max_depth > 1) && B.parent_id && Ai[B.parent_id] && (E += '<a class="ds-comment-context" data-post-id="' + B.post_id + '" data-parent-id="' + B.parent_id + '">' + AO.reply_to + AY(Ai[B.parent_id].toJSON().author.name) + ": </a>"), E += B.message + '</p><div class="ds-comment-footer ds-comment-actions', B.vote > 0 && (E += " ds-post-liked"), E += '">', E += B.url ? Am.timeAnchor(B.created_at, B.url) : Am.timeText(B.created_at), "duoshuo" == B.source ? (E += '<a class="ds-post-reply" href="javascript:void(0);"><span class="ds-icon ds-icon-reply"></span>' + AO.reply + "</a>" + Am.likePost(B) + '<a class="ds-post-repost" href="javascript:void(0);"><span class="ds-icon ds-icon-share"></span>' + AO.repost + '</a><a class="ds-post-report" href="javascript:void(0);"><span class="ds-icon ds-icon-report"></span>' + AO.report + "</a>", B.privileges["delete"] && (E += '<a class="ds-post-delete" href="javascript:void(0);"><span class="ds-icon ds-icon-delete"></span>' + AO["delete"] + "</a>")) : ("qqt" == B.source || "weibo" == B.source) && (E += '<a class="ds-weibo-comments" href="javascript:void(0);">' + AO.comments, B.type.match(/\-comment$/) || (E += '(<span class="ds-count">' + B.comments + "</span>)"), E += '</a><a class="ds-weibo-reposts" href="javascript:void(0);">' + AO.reposts, B.type.match(/\-comment$/) || (E += '(<span class="ds-count">' + B.reposts + "</span>)"), E += "</a>"), E += "</div></div></div>", F.max_depth > 1 && (B.childrenArray || B.children) && "weibo" != B.source && "qqt" != B.source) {
        E += '<ul class="ds-children">';
        var J = Ai.getJSON(B.childrenArray || B.children);
        if (J) {
          for (var B, K = -1, C = J.length - 1; C > K;) {
            B = J[K += 1], E += Am.post({post: B, options: F})
          }
        }
        E += "</ul>"
      }
      return E += "</li>"
    }, Am.postListHead = function (A) {
      var B = '<div class="ds-comments-info"><div class="ds-sort"><a class="ds-order-desc">' + AO.latest + '</a><a class="ds-order-asc">' + AO.earliest + '</a><a class="ds-order-hot">' + AO.hottest + '</a></div><ul class="ds-comments-tabs"><li class="ds-tab"><a class="ds-comments-tab-duoshuo ds-current" href="javascript:void(0);"></a></li>';
      return A.options.show_reposts && A.thread.reposts && (B += '<li class="ds-tab"><a class="ds-comments-tab-repost" href="javascript:void(0);"></a></li>'), B += " ", A.options.show_weibo && A.thread.weibo_reposts && (B += '<li class="ds-tab"><a class="ds-comments-tab-weibo" href="javascript:void(0);"></a></li>'), B += " ", A.options.show_qqt && A.thread.qqt_reposts && (B += '<li class="ds-tab"><a class="ds-comments-tab-qqt" href="javascript:void(0);"></a></li>'), B += "</ul></div>"
    }, Am.recentVisitors = function (B) {
      var E = "", C = B.response;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += '<div class="ds-avatar">' + Am.avatar(F, B.options.avatar_size) + "</div>"
        }
      }
      return E
    }, Am["related-read"] = function (C) {
      var D = "";
      if (C && C.length) {
        D += '<article class="ds-reads-expand"><div class="ds-header">头条推荐</div><section> ';
        var B = C;
        if (B) {
          for (var I, E = -1, A = B.length - 1; A > E;) {
            if (I = B[E += 1], D += ' <a href="' + I.url + '" class="ds-reads-item"> ', 3 == I.imgs.length) {
              D += " <h2>" + I.title + '</h2> <div class="ds-reads-pics"> <ul> ';
              var F = I.imgs;
              if (F) {
                for (var G, J = -1, H = F.length - 1; H > J;) {
                  G = F[J += 1], D += ' <li> <div class="ds-reads-dumb"></div> <div class="ds-reads-pic-wrap" style="background-image:url(' + G + ');"></div> </li> '
                }
              }
              D += ' </ul> </div> <div class="ds-reads-info"> ', 1 == I.type && (D += ' <span class="ds-reads-app-special">打开头条阅读</span> '), D += ' <span class="ds-reads-date" data-date="' + I.timeStamp + '"></span> </div> '
            } else {
              D += ' <div class="ds-reads-desc ', I.imgs.length || (D += "ds-reads-only"), D += '"> <div class="ds-reads-title">' + I.title + '</div> <div class="ds-reads-info"> ', 1 == I.type && (D += ' <span class="ds-reads-app-special">打开头条阅读</span> '), D += ' <span class="ds-reads-date" data-date="' + I.timeStamp + '"></span> </div> </div> ', I.imgs.length && (D += ' <div class="ds-reads-pic-right"> <div class="ds-reads-dumb"></div> <div class="ds-reads-pic-wrap" style="background-image:url(' + I.imgs[0] + ');"> ', I.hasVideo && (D += ' <div class="ds-reads-vid-info"><span>' + I.videoDuration + "</span></div> "), D += " </div> </div> "), D += " "
            }
            D += " </a> "
          }
        }
        D += "</section></article>"
      }
      return D
    }, Am.replybox = function (A) {
      var C = '<div class="ds-replybox"><a class="ds-avatar"';
      if (C += AR() ? ' href="javascript:void(0);" onclick="return false"' : ' href="' + As.REMOTE + "/settings/avatar/" + AP(Ax()) + '" target="_blank" title="设置头像"', C += ">" + Am.avatarImg(Af.data) + '</a><form method="post">' + Ad(A.params) + '<div class="ds-textarea-wrapper ds-rounded-top"><textarea name="message" title="Ctrl+Enter快捷提交" placeholder="' + AY(AO.leave_a_message) + '"></textarea><pre class="ds-hidden-text"></pre>', C += "</div>", C += '<div class="ds-post-toolbar"><div class="ds-post-options ds-gradient-bg"><span class="ds-sync">', !AR() && Af.data.repostOptions) {
        C += '<input id="ds-sync-checkbox', A.inline && (C += "-inline"), C += '" type="checkbox" name="repost" ', A.checked && (C += 'checked="checked" '), C += 'value="' + A.repostArray.join(",") + '"> <label for="ds-sync-checkbox', A.inline && (C += "-inline"), C += '">' + AO.share_to + "</label>";
        for (var B in Af.data.repostOptions) {
          C += Am.serviceIcon(B, !Af.data.repostOptions[B])
        }
      }
      return C += "</span>", C += "</div>", C += '<button class="ds-post-button" type="submit">' + AY(AO.post) + '</button><div class="ds-toolbar-buttons">', A.options.use_smilies && (C += '<a class="ds-toolbar-button ds-add-emote" title="插入表情"></a>'), A.options.use_images && A.options.parse_html_enabled && (C += '<a class="ds-toolbar-button ds-add-image" title="插入图片"></a>'), C += "</div></div>", C += "</form></div>"
    }, Am.serviceBindList = function (B) {
      var E = "", C = B;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += '<li><a href="' + An.bindUrl(F) + '" rel="nofollow" class="ds-service-link ds-' + F + '">' + As.serviceNames[F], Af.data.social_uid[F] && (E += ' <span class="ds-icon ds-icon-ok"></span>'), E += "</a></li>"
        }
      }
      return E
    }, Am.serviceList = function (B) {
      var E = "", C = B;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += '<li><a href="' + An.loginUrl(F) + '" rel="nofollow" class="ds-service-link ds-' + F + '">' + As.serviceNames[F] + "</a></li>"
        }
      }
      return E
    }, Am.shareWidget = function (B) {
      var E = '<div class="ds-share-icons"> <div class="ds-share-icons-inner"> <ul class="ds-share-icons-16"> ', C = B.services;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += ' <li> <a class="ds-' + F + '" href="javascript:void(0);" data-service="' + F + '">' + As.sourceName[F] + "</a> </li> "
        }
      }
      return E += ' </ul> </div> <div class="ds-share-icons-footer">' + B.copyright + "</div></div>"
    }, Am.smiliesTooltip = function (A) {
      var C = '<div id="ds-smilies-tooltip"><ul class="ds-smilies-tabs">';
      for (var B in A) {
        C += "<li><a>" + B + "</a></li>"
      }
      return C += '</ul><div class="ds-smilies-container"></div></div>'
    }, Am.toolbar = function () {
      var A = '<div class="ds-toolbar"><div class="ds-account-control"><span class="ds-icon ds-icon-settings"></span> <span>帐号管理</span><ul><li><a class="ds-bind-more" href="javascript:void(0);" style="border-top: none">绑定更多</a></li><li><a target="_blank" href="' + As.REMOTE + "/settings/" + AP(Ax()) + '">' + AY(AO.settings) + '</a></li><li><a rel="nofollow" href="' + An.logoutUrl() + '" style="border-bottom: none">登出</a></li></ul></div><div class="ds-visitor">';
      return A += Af.data.url ? '<a class="ds-visitor-name" href="' + AY(Af.data.url) + '" target="_blank">' + AY(Af.data.name) + "</a>" : '<span class="ds-visitor-name">' + AY(Af.data.name) + "</span>", A += '<a class="ds-unread-comments-count" href="javascript:void(0);" title="新回复"></a></div></div>'
    }, Am.topThreads = function (B) {
      var E = "", C = B.response;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += '<li><a target="_blank" href="' + AY(F.url) + '" title="' + AY(F.title) + '">' + AY(F.title) + "</a></li>"
        }
      }
      return E
    }, Am.topUsers = function (B) {
      var E = "", C = B.response;
      if (C) {
        for (var F, A = -1, D = C.length - 1; D > A;) {
          F = C[A += 1], E += '<div class="ds-avatar">' + Am.avatar(F, B.options.avatar_size) + "<h4>" + AY(F.name) + "</h4></div>"
        }
      }
      return E
    }, Am.userInfo = function (A) {
      var C = '<a href="' + AY(A.url) + '" onclick="this.href=\'' + A9() + "/user-url/?user_id=" + A.user_id + '\';" class="ds-avatar" target="_blank">' + Am.avatarImg(A) + '</a><a href="' + AY(A.url) + '" onclick="this.href=\'' + A9() + "/user-url/?user_id=" + A.user_id + '\';" class="ds-user-name ds-highlight" target="_blank">' + AY(A.name) + "</a>";
      for (var B in A.social_uid) {
        C += '<a href="' + As.REMOTE + "/user-proxy/" + B + "/" + A.social_uid[B] + '/" target="_blank" class="ds-service-icon ds-' + B + '" title="' + As.sourceName[B] + '"></a>'
      }
      return C += '<p class="ds-user-card-meta"><a href="' + As.REMOTE + "/profile/" + A.user_id + '/" target="_blank"><span class="ds-highlight">' + A.comments + "</span>条评论</a></p>", A.description && (C += '<p class="ds-user-description">' + AY(A.description) + "</p>"), C
    };
    var Ab = As.Views = {}, Ak = (As.Callbacks = {}, As.pagelets = []), Ae = As.events = new Az, Ac = As.site = new Av, Af = As.visitor = new Ah, Ag = As.unread = new Av, Al = As.threadPool = new Ap(AL), Ai = As.postPool = new Ap(AK), Aj = As.userPool = new Ap(Ah);
    Ae.on("queryDefined", function () {
      var A = A8.short_name;
      if (A8.theme && A3(A8.theme), A6) {
        var C = A6["ds_site_" + A], B = A6["ds_lang_" + A];
        C && Ac.reset(AT.parse(C)), B && A4.extend(AO, AT.parse(B))
      }
    }), AU(), As.require("embed.compat", function () {
      function L(B) {
        B.stopPropagation()
      }

      function O(B) {
        (B.ctrlKey && 13 == B.which || 10 == B.which) && c(this.form).trigger("submit")
      }

      function Z() {
        var B = c(this);
        B.height(Math.max(54, B.next(".ds-hidden-text").text(this.value).height() + 27))
      }

      function P() {
        if (At.authInWin) {
          var B = this.href.match(/\/(login|bind)\/(\w+)\//i);
          if (B && As.serviceNames[B[2]]) {
            return !Q(B[2], this.href)
          }
        }
      }

      function F() {
        var I, H, T, K, B, M = this, N = 0, U = 0;
        AX.selection && (H = AX.selection.createRange(), H && H.parentElement() == M && (K = M.value.length, I = M.value.replace(/\r\n/g, "\n"), T = M.createTextRange(), T.moveToBookmark(H.getBookmark()), B = M.createTextRange(), B.collapse(!1), T.compareEndPoints("StartToEnd", B) > -1 ? N = U = K : (N = -T.moveStart("character", -K), N += I.slice(0, N).split("\n").length - 1, T.compareEndPoints("EndToEnd", B) > -1 ? U = K : (U = -T.moveEnd("character", -K), U += I.slice(0, U).split("\n").length - 1)))), c(M).data("ds-range-start", N).data("ds-range-end", U)
      }

      function C(B) {
        return At.touch && B.addClass("ds-touch"), A4.cssProperty("transition") || B.addClass("ds-no-transition"), At.ie6 && B.addClass("ds-ie6"), At.opacity || B.addClass("ds-no-opacity"), B
      }

      function S(B) {
        if (!At.placeholder) {
          var H = B.attr("placeholder");
          B.val(H).focus(function () {
            this.value === H && (this.value = "")
          }).blur(function () {
            "" === this.value && (this.value = H)
          })
        }
        return B
      }

      function W(B) {
        if ("http://duoshuo.com" === B.origin) {
          switch (B.data.type) {
            case"login":
              A1.href = B.data.redirectUrl
          }
        }
      }

      function Q(H, B) {
        var I = {
            weibo: [760, 600],
            renren: [420, 322],
            qq: [504, 445],
            weixin: [450, 550],
            google: [600, 440]
          }[H] || [550, 400];
        return Aa.open(B + (-1 == B.indexOf("?") ? "?" : "&") + A4.param({origin: A1.origin || "http://" + A1.host}), "_blank", "width=" + I[0] + ",height=" + I[1] + ",toolbar=no,menubar=no,location=yes")
      }

      function r(B) {
        var H = An[AR() ? "loginUrl" : "bindUrl"](B);
        At.authInWin && Q(B, H) || (A1.href = H)
      }

      function E() {
        var B = AN(Am["dialog-ask-for-auth"]({})).el.find(".ds-dialog").css("width", "300px");
        B.find("a.ds-service-link").click(P)
      }

      function q(I, K, H, U) {
        function M() {
          function V(Y) {
            if (H && U) {
              var d = H.options, X = j(H.postList.el, Y.response[U], d);
              "asc" == d.order == ("top" == d.formPosition) && As.scrollTo(X);
              var b = H.el.find(".ds-comments-tab-" + U + " span.ds-highlight");
              b.html(parseInt(b.html()) + 1)
            }
          }

          return U || T.find("[type=checkbox]:checked")[0] ? (Ar.post("posts/repost", As.toJSON(T), V), N.close(), !1) : (alert("还没有选发布到哪儿呢"), !1)
        }

        function B() {
          var V = this.value;
          return this.checked && !Af.data.social_uid["qqt" == V ? "qq" : V] ? void r(V) : void 0
        }

        var N = AN(Am["dialog-reposts"]({post: I.toJSON(), repostMessage: K, service: U})), T = N.el.find("form");
        return T.submit(M), T.find(".ds-actions [type=checkbox]").change(B), S(T.find("textarea")).keyup(O).keyup(Z).focus(), !1
      }

      function m(B) {
        var I = {
          "unread-comments": {
            title: "新留言及回复", apiUrl: "users/unreadComments", tmpl: function (M) {
              return M.thread ? '<li data-thread-id="' + M.thread.thread_id + '">' + c.map(M.authors, Am.userAnchor).join("、") + ' 在 <a class="ds-read" href="' + M.thread.url + '#comments" target="_blank">' + Aq(M.thread.title || "无标题") + '</a> 中回复了你 <a class="ds-delete ds-read" title="知道了" href="javascript:void(0)">知道了</a></li>' : ""
            }, read: function (M) {
              var N = M.attr("data-thread-id");
              Ar.post("threads/read", {thread_id: N}), Ag.data.comments--
            }
          }, "unread-notifications": {
            title: "系统消息", apiUrl: "users/unreadNotifications", tmpl: function (M) {
              return '<li data-notification-id="' + M.notification_id + '" data-notification-type="' + M.type + '">' + M.content + ' <a class="ds-delete ds-read" title="知道了" href="javascript:void(0)">知道了</a></li>'
            }, read: function (M) {
              var N = M.attr("data-notification-id");
              Ar.post("notifications/read", {notification_id: N}), Ag.data.notifications--
            }
          }
        }[B], H = AN("<h2>" + I.title + '</h2><ul class="ds-unread-list"></ul>');
        H.on("close", As.resetNotify);
        var K = H.el.find(".ds-unread-list").delegate(".ds-delete", "click", function () {
          return c(this).parent().remove(), 0 === K.children().length && H.close(), !1
        }).delegate(".ds-read", "click", function () {
          I.read(c(this).parent())
        });
        c("#ds-notify").hide(), Ar.get(I.apiUrl, {}, function (M) {
          H.el.find(".ds-unread-list").html(c.map(M.response, I.tmpl).join("\n"))
        })
      }

      function h() {
        bubbleOutTimer && (clearTimeout(bubbleOutTimer), bubbleOutTimer = 0)
      }

      function e() {
        bubbleOutTimer = setTimeout(function () {
          bubbleOutTimer = 0, G.detach()
        }, 400)
      }

      function j(B, I, H) {
        return B.find(".ds-post[data-post-id=" + I.data.post_id + "]")[0] ? void 0 : (B.find(".ds-post-placeholder").remove(), c(Am.post({
          post: I.toJSON(),
          options: H
        })).hide()["asc" == H.order ? "appendTo" : "prependTo"](B).slideDown(function () {
        }))
      }

      function D(B, K) {
        function H() {
          if (AR()) {
            return E(), !1
          }
          var d = c(this).parent(), i = d.hasClass("ds-post-liked"), g = c(this).html().match(/\((\d+)\)/), l = (g ? parseInt(g[1]) : 0) + (i ? -1 : 1);
          return Ar.post("posts/vote", {
            post_id: d.closest(".ds-ctx-entry, .ds-post-self").attr("data-post-id"),
            vote: i ? 0 : 1
          }), c(this).html(c(this).html().replace(/\(\d+\)/, "") + (l ? "(" + l + ")" : "")), d[i ? "removeClass" : "addClass"]("ds-post-liked"), !1
        }

        function b() {
          var d = c(this).closest(".ds-post-self"), g = Ai[d.attr("data-post-id")];
          return q(g, ""), !1
        }

        function T() {
          if (!confirm("确定要删除这条评论吗？")) {
            return !1
          }
          var d = c(this).closest(".ds-post-self");
          return Ar.post("posts/remove", {post_id: d.attr("data-post-id")}), d.parent().fadeOut(200, function () {
            B.data.comments--, B.updateCounter("duoshuo"), c(this).remove()
          }), !1
        }

        function U() {
          if (!confirm("确定要举报这条评论吗？")) {
            return !1
          }
          var d = c(this).closest(".ds-post-self");
          return Ar.post("posts/report", {post_id: d.attr("data-post-id")}), alert("感谢您的反馈！"), !1
        }

        function V() {
          var g = c(this), l = g.closest(".ds-comment-actions");
          if (l.hasClass("ds-reply-active")) {
            N.el.fadeOut(200, function () {
              c(this).detach()
            }), l.removeClass("ds-reply-active")
          } else {
            var d = g.closest(".ds-ctx-entry, .ds-post-self");
            N ? N.actionsBar.removeClass("ds-reply-active") : (N = new Ab.Replybox(B), N.render(!0).el.addClass("ds-inline-replybox").detach()), N.el.find("[name=parent_id]").val(d.attr("data-post-id")), N.el.show().appendTo(g.closest(".ds-ctx-body, .ds-comment-body")).find("textarea").focus(), N.actionsBar = l.addClass("ds-reply-active"), K.max_depth <= 1 ? N.postList = B.postList.el : (N.postList = d.siblings(".ds-children"), N.postList[0] || (N.postList = c('<ul class="ds-children"></ul>').insertAfter(d)))
          }
          return !1
        }

        function f() {
          function g(i) {
            Aw(i), d.append(c.map(i.response, function (p) {
              return Am.post({post: p, options: K})
            }).join(""))
          }

          var l = c(this).closest(".ds-post-self"), n = l.attr("data-post-id");
          l.data("source");
          if (0 != l.attr("data-root-id")) {
            return !1
          }
          var d = l.siblings(".ds-children");
          return d[0] ? (d.remove(), !1) : (d = c('<ul class="ds-children"></ul>').insertAfter(l), Ar.get("posts/listComments", k({post_id: n}), g), !1)
        }

        function X() {
          var v = c(this).closest(".ds-post-self"), g = Ai[v.attr("data-post-id")], w = g.data.source;
          if (!Af.data.social_uid["qqt" == w ? "qq" : w]) {
            return void r(w)
          }
          var d = g.data.root_id, l = "0" != d ? Ai[d] : g, p = "";
          if ("0" != d) {
            var u = prepatePost(g.data).theAuthor;
            p = ("weibo" == w ? "//@" + u.name : "|| @" + u.qqt_account) + ":" + g.data.message
          }
          return q(l, p, B, w), !1
        }

        function Y() {
          var d = c(this).parent();
          return d.siblings().show(), d.remove(), !1
        }

        function M() {
          function g() {
            function s(l) {
              var n = l.response;
              Aj[Bd] ? Aj[Bd].set(n) : Aj[Bd] = new Ah(n), G.owner == d && a.html(Am.userInfo(n))
            }

            o = 0, G.owner = d, h();
            var w = i.offset(), p = B.el.offset(), x = i.innerWidth() / 2, y = B.el.innerHeight() - (w.top - p.top) + 6, Be = w.left - p.left - 35 + (x > 35 ? 35 : x);
            try {
              if (i.hasClass("ds-comment-context")) {
                a.attr("id", "ds-ctx-bubble").attr("data-post-id", i.attr("data-post-id")).html('<ul id="ds-ctx">' + Am.ctxPost({post: Ai[i.attr("data-parent-id")].toJSON()}) + '</ul><div class="ds-bubble-footer"><a class="ds-ctx-open" href="javascript:void(0);">查看对话</a></div>')
              } else {
                if (i.hasClass("ds-avatar") || i.hasClass("ds-user-name")) {
                  var z = {}, Bd = z.user_id = i.attr("data-user-id");
                  if (!Bd) {
                    throw"no info"
                  }
                  a.attr("id", "ds-user-card").attr("data-user-id", Bd).empty(), Aj[Bd] ? a.html(Am.userInfo(Aj[Bd].data)) : Ar.get("users/profile", k(z), s)
                }
              }
              G.css({bottom: y, left: Be}).appendTo(B.innerEl)
            } catch (v) {
              G.detach()
            }
          }

          var d = this;
          if (bubbleOutTimer && G.owner == d) {
            return clearTimeout(bubbleOutTimer), void (bubbleOutTimer = 0)
          }
          var i = c(d);
          o = setTimeout(g, 200)
        }

        function I() {
          o ? (clearTimeout(o), o = 0) : bubbleOutTimer || e()
        }

        var N;
        this.delegate("a.ds-post-likes", "click", H).delegate("a.ds-post-repost", "click", b).delegate("a.ds-post-delete", "click", T).delegate("a.ds-post-report", "click", U).delegate("a.ds-post-reply", "click", V).delegate("a.ds-weibo-comments", "click", f).delegate("a.ds-weibo-reposts", "click", X).delegate("a.ds-expand", "click", Y), At.touch || this.delegate("a.ds-comment-context, .ds-avatar, .ds-user-name", "mouseenter", M).delegate("a.ds-comment-context, .ds-avatar, .ds-user-name", "mouseleave", I)
      }

      function k(B) {
        var H = {
          require: "site,visitor,nonce,lang" + (A++ ? "" : ",unread,log,extraCss"),
          site_ims: AM.get("ds_site_" + A8.short_name + ":timestamp"),
          lang_ims: AM.get("ds_lang_" + A8.short_name + ":timestamp"),
          referer: AX.referrer
        };
        A8.stylePatch && (H.style_patch = A8.stylePatch);
        for (var I in H) {
          H[I] && (!At.ie6 || encodeURIComponent(H[I]).length < 200) && (B[I] = H[I])
        }
        return B
      }

      var c = As.jQuery, R = c(Aa), J = c(AX);
      Aa.postMessage && (Aa.addEventListener ? Aa.addEventListener("message", W, !1) : Aa.attachEvent && Aa.attachEvent("onmessage", W)), As.scrollTo = function (B) {
        var H = B.offset().top;
        (H < R.scrollTop() || H > R.scrollTop() + R.height()) && c("html, body").animate({scrollTop: H - 40}, 200, "swing")
      }, As.toJSON = function (H) {
        var M = /\r?\n/g, I = /^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i, N = /^(?:select|textarea)/i, B = H.map(function () {
          return this.elements ? c.makeArray(this.elements) : this
        }).filter(function () {
          return this.name && !this.disabled && (this.checked || N.test(this.nodeName) || I.test(this.type))
        }).map(function (T, U) {
          var V = c(this).val();
          return null == V ? null : c.isArray(V) ? c.map(V, function (X) {
            return {name: U.name, value: X.replace(M, "\r\n")}
          }) : {name: U.name, value: V.replace(M, "\r\n")}
        }).toArray(), K = {};
        return c.each(B, function () {
          K[this.name] = this.value
        }), K
      }, As.resetNotify = function () {
        var B = c("#ds-notify"), H = Ag.data;
        B[0] || (B = c('<div id="ds-notify"></div>').css({
          hidden: {display: "none"},
          "top-right": {top: "24px", right: "24px"},
          "bottom-right": {bottom: "24px", right: "24px"}
        }[Ac.data.notify_position]).delegate(".ds-notify-unread a", "click", function () {
          return m(c(this).data("type")), !1
        }).appendTo(AX.body)), B.html(Am.notify(H))[!H.comments && !H.notifications || "hidden" === Ac.data.notify_position || c(".ds-dialog")[0] ? "hide" : "show"]()
      }, Ag.on("reset", As.resetNotify), Ab.Replybox = function (B) {
        this.embedThread = B
      }, Ab.Replybox.prototype = {
        render: function (u) {
          function B(T) {
            T.data("submitting", !0), T.find(".ds-post-button").addClass("ds-waiting").html(AO.posting)[0].disabled = !0
          }

          function n(T) {
            T.data("submitting", !1), T.find(".ds-post-button").removeClass("ds-waiting").html(AO.post)[0].disabled = !1
          }

          var X = this, d = X.embedThread, l = d.options, H = function () {
            As.require("smilies", function () {
            })
          }, V = {
            thread: d,
            options: l,
            inline: u,
            params: {thread_id: d.threadId, parent_id: "", nonce: As.nonce},
            repostArray: [],
            checked: 0
          };
          for (var K in Af.data.repostOptions) {
            Af.data.repostOptions[K] && (V.repostArray.push(K), V.checked = 1)
          }
          var t = X.el = c(Am.replybox(V)).click(H), f = t.find("form"), Bf = f.find("input[type=checkbox]")[0], Y = f.find("a.ds-service-icon, a.ds-service-icon-grey"), U = S(f.find("textarea")).focus(H).keyup(O).keyup(Z).bind("focus mousedown mouseup keyup", F), M = t.find(".ds-add-emote").click(function (T) {
            var b = As.smiliesTooltip;
            return M.toggleClass("ds-expanded").hasClass("ds-expanded") ? (b || (b = As.smiliesTooltip = new Ab.SmiliesTooltip, b.render(), As.require("smilies", function () {
              b.reset("微博-默认")
            })), b.replybox = X, b.el.appendTo(AX.body).css({
              top: X.el.offset().top + X.el.outerHeight() + 4 + "px",
              left: X.el.find(".ds-textarea-wrapper").offset().left + "px"
            }), c(AX.body).click(Be)) : Be(T), !1
          }), Be = (t.find(".ds-add-image").click(function (b) {
            var g = U[0], x = g.value, T = "请输入图片地址", p = '<img src="' + T + '" />';
            if (AX.selection) {
              g.value = x.substring(0, U.data("ds-range-start")) + p + x.substring(U.data("ds-range-end"), x.length), g.value = g.value.replace("说点什么吧 ...", ""), g.focus();
              var v = AX.selection.createRange();
              v.collapse(), v.findText(T), v.select()
            } else {
              g.value = x.substring(0, g.selectionStart) + p + x.substring(g.selectionEnd);
              var w = g.value.search(T);
              g.setSelectionRange(w, w + T.length), g.focus()
            }
            b.preventDefault()
          }), X.hideSmilies = function () {
            M.removeClass("ds-expanded"), As.smiliesTooltip.el.detach(), c(AX.body).unbind("click", Be)
          }), z = function (b, p) {
            var g = AN(Am["dialog-anonymous"]({
              services: ["weixin", "weibo", "qq", "renren", "kaixin", "douban"],
              options: l
            })), v = g.el.find(".ds-dialog").css("width", "320px");
            if (v.find(".ds-icons-32 a").click(P), !l.deny_anonymous) {
              var T = g.el.find("form");
              T.submit(function () {
                var i = T.find("input[name=author_email]").val();
                return !i && !l.require_guest_email || i.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) ? (p(As.toJSON(T)), g.close(), !1) : (alert("请输入一个有效的email地址."), !1)
              }), T.find("input[name=author_name]")[0].focus()
            }
          };
          l.deny_anonymous && U.focus(function () {
            if (AR()) {
              z(f, I);
              var T = function (b) {
                b.stopPropagation(), U.unbind("click", T)
              };
              U.click(T)
            }
            return !1
          });
          var I = function (T) {
            B(f), Ar.post("posts/create", c.extend(As.toJSON(f), T), function (g) {
              var p = Ai[g.response.post_id] = new AK(g.response), i = j(X.postList, p, l);
              if ("asc" == l.order == ("top" == l.formPosition) && As.scrollTo(i), d.data.comments++, d.updateCounter("duoshuo"), U.val("").trigger("keyup"), n(f), t.hasClass("ds-inline-replybox") && (t.detach(), X.actionsBar.removeClass("ds-reply-active")), A6) {
                try {
                  A6.removeItem("ds_draft_" + d.threadId)
                } catch (b) {
                }
              }
            }, function (b) {
              n(f), alert(b.errorMessage)
            })
          };
          f.submit(function () {
            if (f.data("submitting")) {
              return !1
            }
            var T = c.trim(f[0].message.value);
            return "" == T || !At.placeholder && T == U.attr("placeholder") ? (alert("您还没写内容呢"), !1) : (AR() ? z(f, I) : I(), !1)
          });
          var Bd = function (T) {
            return c(T).hasClass("ds-service-icon-grey") ? null : c(T).attr("data-service")
          };
          if (Y.click(function () {
              return c(this).toggleClass("ds-service-icon-grey").toggleClass("ds-service-icon"), Bf.value = c.map(Y, Bd).join(","), Bf.checked = "" != Bf.value, !1
            }), c(Bf).change(function () {
              var T = this.checked;
              Y[T ? "removeClass" : "addClass"]("ds-service-icon-grey")[T ? "addClass" : "removeClass"]("ds-service-icon"), this.value = c.map(Y, Bd).join(",")
            }), !u && A6) {
            var N = "ds_draft_" + d.threadId;
            U.bind("focus blur keyup", function (T) {
              var b = c(T.currentTarget).val();
              try {
                A6[N] = b
              } catch (T) {
              }
            }), A6[N] && U.val(A6[N])
          }
          return this
        }
      }, Ab.Dialog = Az.extend({
        init: function (B, H) {
          (this.el = c("#ds-wrapper"))[0] || (this.el = C(c('<div id="ds-wrapper"></div>'))), this.options = c.extend({width: 600}, H), B !== AS && c(B).attr("id", "ds-reset").appendTo(this.el)
        }, open: function () {
          function B(K) {
            return 27 == K.which ? (I.close(), !1) : void 0
          }

          function H() {
            return I.close(), !1
          }

          var I = this;
          return I.el.hide().appendTo(AX.body).fadeIn(200), At.ie6 && I.el.css("top", R.scrollTop() + 100), I.el.show().find(".ds-dialog").delegate("a.ds-dialog-close", "click", function () {
            return I.close(), !1
          }).click(L), J.keydown(B), c(AX.body).click(H), I.close = function () {
            J.unbind("keydown", B), c(AX.body).unbind("click", H), I.el.fadeOut(200, function () {
              c(this).remove()
            }), I.trigger("close")
          }, I
        }
      }), Am.likePanel = function (B) {
        return B.likes ? '<span class="ds-highlight">' + B.likes + "</span> 人喜欢" : ""
      }, Ab.Meta = function (B) {
        this.embedThread = B
      }, Ab.Meta.prototype = {
        render: function () {
          function M(Y) {
            function T(d) {
              I.set(d), H.resetLikePanel()
            }

            function V() {
              H.tooltip.detach(), c(AX.body).unbind("click", V)
            }

            function X(d) {
              switch (this.className) {
                case"ds-like-tooltip-close":
                  V(d);
                  break;
                default:
                  if (!Aa.open(this.href, "_blank", "height=500,width=600,top=0,left=0,toolbar=no,menubar=no,resizable=yes,location=yes,status=no")) {
                    return
                  }
              }
              return !1
            }

            var U = K.hasClass("ds-thread-liked");
            if (Ar.post("threads/vote", {
                thread_id: H.embedThread.threadId,
                vote: U ? 0 : 1
              }, T), K.toggleClass("ds-thread-liked"), K.find(".ds-thread-like-text").text(U ? "喜欢" : "已喜欢"), U) {
              return H.tooltip && V(Y), !1
            }
            if (H.tooltip === AS) {
              var N = Am.likeTooltip({
                services: {
                  qzone: "QQ空间",
                  weibo: "新浪微博",
                  qqt: "腾讯微博",
                  renren: "人人网",
                  kaixin: "开心网",
                  douban: "豆瓣网",
                  baidu: "百度搜藏"
                }, thread_id: I.data.thread_id
              });
              H.tooltip = c(N).click(L).delegate("a", "click", X)
            }
            var b = {};
            return b.left = 0, b.top = B.position().top + B.outerHeight() - 4 + "px", H.tooltip.appendTo(H.embedThread.innerEl).css(b), c(AX.body).click(V), !1
          }

          var H = this, I = H.embedThread.model, B = H.el = c(Am.meta(I.toJSON())), K = B.find(".ds-like-thread-button");
          return K.click(M), H.resetLikePanel(), AR() && B.hide(), H
        }, resetLikePanel: function () {
          this.el.find(".ds-like-panel").html(Am.likePanel(this.embedThread.model.toJSON()))
        }
      }, Ab.PostListHead = function (B) {
        this.embedThread = B
      }, Ab.PostListHead.prototype = {
        render: function () {
          function H(U) {
            K.find("a.ds-current").removeClass("ds-current"), T.params.page = 1;
            var V = U.currentTarget;
            switch (V.className) {
              case"ds-comments-tab-duoshuo":
                T.params.source = "duoshuo", I.replybox.el.show();
                break;
              case"ds-comments-tab-repost":
                T.params.source = "repost", I.replybox.el.hide();
                break;
              case"ds-comments-tab-weibo":
                T.params.source = "weibo", I.replybox.el.hide();
                break;
              case"ds-comments-tab-qqt":
                T.params.source = "qqt", I.replybox.el.hide()
            }
            return c(V).addClass("ds-current"), T.refetch(), !1
          }

          function N() {
            return M.find("a.ds-current").removeClass("ds-current"), T.params.order = I.options.order = this.className.replace("ds-order-", ""), T.params.page = 1, T.refetch(), c(this).addClass("ds-current"), !1
          }

          var I = this.embedThread, T = I.postList, B = this.el = c(Am.postListHead({
            thread: I.model.toJSON(),
            options: I.options
          })), K = B.find("ul.ds-comments-tabs");
          K.delegate(".ds-tab a", "click", H);
          var M = B.find(".ds-sort");
          return M.delegate("a", "click", N), M.find(".ds-order-" + T.params.order).addClass("ds-current"), this
        }
      }, Ab.Paginator = function (H) {
        function K() {
          return B.params.page = parseInt(this.innerHTML), B.refetch(), M.find(".ds-current").removeClass("ds-current"), c(this).addClass("ds-current"), !1
        }

        H = H || {};
        var I = this, M = I.el = H.el || c('<div class="ds-paginator"></div>'), B = I.collection = H.collection;
        M.delegate("a", "click", K)
      }, Ab.Paginator.prototype = {
        reset: function (H) {
          function K(N) {
            B.push('<a data-page="' + N + '" href="javascript:void(0);">' + N + "</a>")
          }

          var I, M = this.collection.params.page || 1, B = [];
          if (M > 1) {
            for (K(1), I = M > 4 ? M - 2 : 2, I > 2 && B.push('<span class="page-break">...</span>'); M > I; I++) {
              K(I)
            }
          }
          if (B.push('<a data-page="' + M + '" href="javascript:void(0);" class="ds-current">' + M + "</a>"), M < H.pages) {
            for (I = M + 1; M + 4 >= I && I < H.pages; I++) {
              K(I)
            }
            I < H.pages && B.push('<span class="page-break">...</span>'), K(H.pages)
          }
          this.el.html('<div class="ds-border"></div>' + B.join(" "))[H.pages > 1 ? "show" : "hide"]()
        }
      }, As.addSmilies = function (B, I) {
        var H = As.smiliesTooltip;
        H && H.el.find("ul.ds-smilies-tabs").append("<li><a>" + B + "</a></li>"), As.smilies[B] = I
      }, Ab.SmiliesTooltip = function () {
      }, Ab.SmiliesTooltip.prototype = {
        render: function () {
          function B() {
            var M = H.replybox, V = M.el.find("textarea"), K = V[0], N = K.value;
            if (AX.selection) {
              K.value = N.substring(0, V.data("ds-range-start")) + this.title + N.substring(V.data("ds-range-end"), N.length), K.value = K.value.replace(AO.leave_a_message, ""), K.focus();
              var T = AX.selection.createRange();
              T.moveStart("character", V.data("ds-range-start") + this.title.length), T.collapse(), T.select()
            } else {
              var U = K.selectionStart + this.title.length;
              K.value = N.substring(0, K.selectionStart) + this.title + N.substring(K.selectionEnd), K.setSelectionRange(U, U)
            }
            M.hideSmilies(), K.focus()
          }

          var H = this, I = H.el = c(Am.smiliesTooltip(AF));
          return I.click(L).find("ul.ds-smilies-tabs").delegate("a", "click", function () {
            H.reset(this.innerHTML)
          }), I.find(".ds-smilies-container").delegate("img", "click", B), this
        }, reset: function (B) {
          function I(T, N) {
            var M = 0 === B.indexOf("微博") ? "https://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/" + N.replace("_org", "_thumb") : As.STATIC_URL + "/images/smilies/" + N;
            "WordPress" === B && (T = " " + T + " "), K += '<li><img src="' + M + '" title="' + Aq(T) + '" /></li>'
          }

          var H = this.el.find("ul.ds-smilies-tabs");
          H.find("a.ds-current").removeClass("ds-current"), H.find("a").filter(function () {
            return this.innerHTML == B
          }).addClass("ds-current");
          var K = "<ul>";
          return c.each(AF[B], I), K += "</ul>", this.el.find(".ds-smilies-container").html(K), this
        }
      }, Am.postPlaceholder = function () {
        return ['<li class="ds-post ds-post-placeholder">', AO.no_comments_yet, "</li>"].join("")
      };
      var G = c('<div id="ds-bubble"><div class="ds-bubble-content"></div><div class="ds-arrow ds-arrow-down ds-arrow-border"></div><div class="ds-arrow ds-arrow-down"></div></div>'), a = G.find(".ds-bubble-content").delegate("a.ds-ctx-open", "click", function () {
        function B(K) {
          function M(N, T) {
            return Am.ctxPost({post: N, index: T})
          }

          AI.log(c.map(K.response, M).join("\n"));
          H.el.find("ol");
          H.el.find("ol").html(c.map(K.response, M).join("\n"))
        }

        var I = {};
        I.post_id = a.attr("data-post-id"), Ar.get("posts/conversation", I, B);
        var H = AN('<h2>查看对话</h2><ol id="ds-ctx"></ol>');
        return H.el.find(".ds-dialog").css("width", "600px"), H.el.find(".ds-dialog-body").css({
          "max-height": "350px",
          _height: "350px",
          "overflow-y": "auto",
          "padding-top": "10px"
        }), !1
      }), o = bubbleOutTimer = 0;
      G.mouseenter(h).mouseleave(e), Ab.PostList = function (B) {
        B && (B.params && (this.params = B.params), B.embedThread && (this.embedThread = B.embedThread)), this.el = c('<ul class="ds-comments"></ul>')
      }, Ab.PostList.prototype = {
        url: "threads/listPosts", render: function () {
          return D.call(this.el, this.embedThread, this.embedThread.options), this
        }, reset: function (B) {
          var H = this.embedThread.options;
          this.el.html(B[0] ? c.map(Ai.getJSON(B), function (I) {
            return Am.post({post: I, options: H})
          }).join("") : Am.postPlaceholder())
        }, refetch: function () {
          function B(K) {
            Ai.set(K.parentPosts || K.relatedPosts), Aj.set(K.users), H.reset(K.response), H.embedThread.paginator.reset(K.cursor), H.el.fadeTo(200, 1), As.scrollTo(H.el), I.remove()
          }

          var H = this, I = c(Am.indicator()).appendTo(AX.body).fadeIn(200);
          H.el.fadeTo(200, 0.5), Ar.get(H.url, H.params, B)
        }
      }, Ab.RelatedRead = function () {
        this._init()
      }, Ab.RelatedRead.prototype = {
        _init: function () {
          this.el = c('<div id="ds-related-reads"></div>')
        }, load: function (H) {
          Aa.__duoshuo_id__ = H, Aa.readsByToutiao = [], Aa.readsByToutiao.push({id: "ds-related-reads", num: 3});
          var I = "//s0.pstatp.com/site/reads-sdk/5bf3702b38076207bee1.js", B = AX.createElement("script");
          B.src = I, B.charset = "utf-8", B.crossOrigin = "anonymous", AX.head.appendChild(B)
        }, mount: function (B) {
          this.el.insertBefore(B)
        }
      }, Ab.EmbedThread = Au.extend({
        uri: "threads/listPosts",
        params: "thread-id local-thread-id source-thread-id thread-key category channel-key author-key author-id url limit order max-depth form-position container-url" + (AV.match(/MSIE 6\.0/) ? "" : " title image thumbnail"),
        render: function () {
          var B = this.el;
          if ("请将此处替换成文章在你的站点中的ID" === B.data("thread-key")) {
            return alert("请设置正确的 data-thread-key 属性"), !1
          }
          B.attr("id", "ds-thread").append(Am.waitingImg());
          var I = B.width(), H = B.data("url") || !B.attr("data-thread-id") && c("link[rel=canonical]").attr("href");
          H ? B.data("url", A0(H)) : B.data("container-url", A1.href), I && 400 >= I && B.addClass("ds-narrow").data("max-depth", 1)
        },
        updateCounter: function (H) {
          function K(N) {
            return N.substr(N.indexOf("}") + 1)
          }

          var I = {
            duoshuo: ["comments", K(AO.comments_multiple) || "评论"],
            repost: ["reposts", K(AO.reposts_multiple) || "转载"],
            weibo: ["weibo_reposts", K(AO.weibo_reposts_multiple) || "新浪微博"],
            qqt: ["qqt_reposts", K(AO.qqt_reposts_multiple) || "腾讯微博"]
          };
          for (var M in I) {
            if (!H || H == M) {
              var B = this.data[I[M][0]];
              this.el.find(".ds-comments-tab-" + M).html(this.el.hasClass("ds-narrow") ? '<span class="ds-service-icon ds-' + M + '"></span>' + B : (B ? '<span class="ds-highlight">' + B + "</span>" : "0") + I[M][1])
            }
          }
        },
        onError: function (B) {
          this.el.html("评论框出错啦(" + B.code + "): " + B.errorMessage)
        },
        onload: function (B) {
          var T = this, I = T.threadId = B.thread.thread_id, K = B.cursor, M = T.options = B.options, U = T.innerEl = C(c('<div id="ds-reset"></div>').appendTo(T.el));
          T.model = new AL(T.data = B.thread), Ai.set(B.parentPosts || B.relatedPosts), Aj.set(B.users), T.el.find("#ds-waiting").remove(), B.options && B.options.show_recommend && (T.relatedRead = new Ab.RelatedRead, T.relatedRead.load(B.thread.site_id), T.relatedRead.mount(U)), M.like_thread_enabled && (T.meta = new Ab.Meta(T), U.append(T.meta.render().el)), M.hot_posts && B.hotPosts && B.hotPosts.length && (T.hotPosts = new Ab.HotPosts(c('<div class="ds-rounded"></div>'), {
            max_depth: 1,
            show_context: M.show_context
          }), T.hotPosts.thread = T, U.append(T.hotPosts.el), T.hotPosts.onload({list: Ai.getJSON(B.hotPosts)})), T.postListHead = new Ab.PostListHead(T), T.postList = new Ab.PostList({
            embedThread: T,
            params: {source: "duoshuo", thread_id: I, max_depth: M.max_depth, order: M.order, limit: M.limit}
          }), T.postList.render().reset(B.response), T.paginator = new Ab.Paginator({collection: T.postList}), T.paginator.reset(K);
          var N = T.replybox = new Ab.Replybox(T);
          N.postList = T.postList.el, AR() ? T.loginButtons = c(Am.loginButtons()).delegate("a.ds-more-services", "click", function () {
            return T.loginButtons.find(".ds-additional-services").toggle(), !1
          }).delegate("a.ds-service-link", "click", P) : T.toolbar = c(Am.toolbar()).delegate(".ds-account-control", "mouseenter", function () {
            c(this).addClass("ds-active")
          }).delegate(".ds-account-control", "mouseleave", function () {
            c(this).removeClass("ds-active")
          }).delegate("a.ds-bind-more", "click", function () {
            var V = AN(Am["dialog-bind-more"]()).el.find(".ds-dialog").addClass("ds-dialog-bind-more").css("width", "300px");
            return V.find("a.ds-service-link").click(P), !1
          }).delegate("a.ds-unread-comments-count", "click", function () {
            return m("unread-comments"), !1
          });
          var H = ['<a name="respond"></a>', T.toolbar || T.loginButtons, N.render().el];
          "top" == M.formPosition && c.fn.append.apply(U, H), U.append(T.postListHead.render().el, T.postList.el, T.paginator.el), "bottom" == M.formPosition && c.fn.append.apply(U, H), U.append(Am.poweredBy(M.poweredby_text)), T.updateCounter(), B.alerts && c.each(B.alerts, function (V, X) {
            c('<div class="ds-alert">' + X + "</div>").insertBefore(T.toolbar || loginButtons)
          }), M.message && N.el.find("textarea").val(M.message).focus(), Ag.on("reset", function () {
            var V = Ag.data.comments || 0;
            U.find("a.ds-unread-comments-count").html(V).attr("title", V ? "你有" + V + "条新回复" : "你没有新回复").css("display", V ? "inline" : "none")
          }), M.mzadx_id && (As.require("mzadxN", function () {
          }), c('<div id="MZADX_' + M.mzadx_id + '" style="margin:0 auto;"></div>').appendTo(U), __mz_rpq = Aa.__mz_rpq || [], __mz_rpq.push({
            l: [M.mzadx_id],
            r: "1",
            _srv: "MZADX",
            _callback: function () {
            }
          })), As.thread = T, Ag.data !== AS && Ag.trigger("reset"), AR() || AJ.send({visit_thread_id: T.threadId})
        },
        onMessage: function (B) {
          j(this.postList.el, new AK(B), this.options)
        }
      }), Ab.HotPosts = Au.extend({
        tmpl: "hotPosts", params: "show-quote", render: function () {
          return this.el.attr("id", "ds-hot-posts"), this
        }, onload: function (B) {
          B.options = c.extend(this.options, B.options), Au.prototype.onload.call(this, B), D.call(this.el.find("ul"), this.thread, this.options)
        }
      }), Ab.RecentComments = Au.extend({
        tmpl: "commentList",
        uri: "sites/listRecentPosts",
        params: "show-avatars show-time show-title avatar-size show-admin excerpt-length num-items channel-key",
        render: function () {
          this.el.attr("id", "ds-recent-comments")
        },
        prepare: function (B) {
          return {
            list: c.map(B.response, function (H) {
              return new AK(H).toJSON()
            })
          }
        }
      }), Ab.RecentVisitors = Au.extend({
        tmpl: "recentVisitors",
        uri: "sites/listVisitors",
        params: "show-time avatar-size num-items channel-key",
        render: function () {
          this.el.children().detach(), this.el.attr("id", "ds-recent-visitors").append(this.waitingEl = c(Am.waitingImg()))
        }
      }), Ab.TopThreads = Au.extend({
        tmpl: "topThreads",
        uri: "sites/listTopThreads",
        params: "range num-items channel-key",
        render: function () {
          this.el.children().detach(), this.el.attr("id", "ds-top-threads").append(this.waitingEl = c(Am.waitingImg()))
        }
      }), Ab.LoginWidget = Au.extend({
        tmpl: "loginWidget", render: function () {
          var B = this.el;
          B.attr("id", "ds-login").html(Am.loginWidget(["weixin", "weibo", "qq", "renren", "kaixin", "douban"])), B.find("a").click(P), B.find("a.ds-logout").attr("href", An.logoutUrl())
        }
      }), Ab.ThreadCount = Au.extend({
        onload: function (B) {
          var I = this.el, H = I.data("count-type") || "comments", K = B.data[H];
          I[I.data("replace") ? "replaceWith" : "html"](AO[H + "_" + (K ? K > 1 ? "multiple" : "one" : "zero")].replace("{num}", K))
        }
      }), Ab.ShareWidget = Au.extend({
        tmpl: "shareWidget", render: function () {
          var B = {
            copyright: "多说分享插件",
            services: ["weibo", "qzone", "sohu", "renren", "netease", "qqt", "kaixin", "douban", "qq", "meilishuo", "mogujie", "baidu", "taobao", "google", "wechat", "diandian", "huaban", "duitang", "youdao", "pengyou", "facebook", "twitter", "linkedin", "msn"]
          };
          this.el.attr("id", "ds-share"), this.el.children().attr("id", "ds-reset"), this.el.find(".ds-share-aside-inner").html(Am.shareWidget(B)), this.el.find(".ds-share-icons-more").html(Am.shareWidget(B)), this.el.find(".ds-share-icons-more").hide(), this.el.hasClass("flat") && this.el.find("a").each(function () {
            c(this).addClass("flat")
          }), C(this.el), this.delegateEvents()
        }, delegateEvents: function () {
          var H = this, K = H.el;
          if (K.children().hasClass("ds-share-inline")) {
            var B = ".ds-share-icons-more", M = K.find(B), U = "[data-toggle=ds-share-icons-more]";
            /*K.delegate(U, "mouseover", function () {
              M.show()
            }), K.delegate(U, "mouseout", function () {
              M.hide()
            }), K.delegate(B, "mouseover", function () {
              M.show()
            }), K.delegate(B, "mouseout", function () {
              M.hide()
          })*/
          } else {
            var N = K.children().hasClass("ds-share-aside-left") ? "slide-to-right" : "slide-to-left", T = K.children();
            if (!A4.cssProperty("transition")) {
              var I = K.children().hasClass("ds-share-aside-left") ? "left" : "right";
              K.delegate(".ds-share-aside-toggle", "mouseover", function () {
                var V = {}, X = At.ie6 && "right" === I;
                X ? V.left = (AX.documentElement.scrollLeft + AX.documentElement.clientWidth - this.offsetWidth - (parseInt(this.currentStyle.marginLeft, 10) || 0) - parseInt(this.currentStyle.marginRight, 10) || 0) - 195 : V[I] = 0, T.animate(V, 200)
              }), K.delegate(".ds-share-aside-inner", "mouseleave", function () {
                var V = {}, X = At.ie6 && "right" === I;
                X ? V.left = (AX.documentElement.scrollLeft + AX.documentElement.clientWidth - this.offsetWidth - (parseInt(this.currentStyle.marginLeft, 10) || 0) - parseInt(this.currentStyle.marginRight, 10) || 0) + 230 : V[I] = -229, T.animate(V, 200)
              })
            }
            K.delegate(".ds-share-aside-toggle,.ds-share-aside-inner", "mouseover", function () {
              T.addClass(N)
            }), K.delegate(".ds-share-aside-toggle,.ds-share-aside-inner", "mouseleave", function () {
              T.removeClass(N)
            })
          }
          K.delegate("a", "click", function (g) {
            var X = c(this).data("service");
            if(typeof(X)=="undefined"){
                return
            }
            if (!K.data("url")) {
              return void alert("请设置data-url")
            }
            if ("wechat" === X) {
              var V = A9() + "/api/qrcode/getImage.png", Y = "?size=240&text=" + K.data("url"), f = AN(Am["dialog-qrcode"]({
                qrcode_url: V + Y,
                url: K.data("url")
              }));
              f.el.find(".ds-dialog").css("width", "320px")
            } else {
              var b = A9() + "/share-proxy/?" + A4.param({
                  service: c(this).data("service"),
                  thread_key: K.data("threadKey"),
                  title: K.data("title"),
                  images: K.data("images"),
                  content: K.data("content"),
                  url: K.data("url")
                });
              Aa.open(b, "_blank")
            }
            g.preventDefault(), g.stopPropagation()
          })
        }
      });
      var A = 0;
      As.initSelector = function (B, I) {
        function H(M) {
          Aw(M), A4.extend(AO, M.options), Al.set(M.response)
        }

        var K = [];
        !AU() || !c.isReady && AZ || c(B).each(function (N, T) {
          var M = c(T);
          if (!M.data("initialized")) {
            M.data("initialized", !0);
            var U = new Ab[I.type](M, I);
            if (Ak.push(U), "ThreadCount" === I.type) {
              var V = M.attr("data-thread-key");
              M.attr("data-channel-key") && (V = M.attr("data-channel-key") + ":" + V), K.push(V), Al[V] || (Al[V] = new AL({})), Al[V].on("reset", function () {
                U.onload(this)
              })
            } else {
              if (U.uri) {
                var X = {};
                c.each(U.params.split(" "), function (Y, b) {
                  X[b.replace(/-/g, "_")] = M.attr("data-" + b) || M.data(b)
                }), Ar.get(U.uri, k(X), function (Y) {
                  U.load(Y)
                })
              }
            }
          }
        }), K.length && Ar.get("threads/counts", k({threads: K.join(",")}), H)
      }, (As.initView = function () {
        c.each(AE, As.initSelector)
      })(), c(function () {
        if (!A8) {
          if (!AU()) {
            return AI.error("缺少 duoshuoQuery 的定义")
          }
          AI.warn("请在加载多说 embed.js 之前定义 duoshuoQuery")
        }
        setInterval(function () {
          c(".ds-time").each(function () {
            var B = c(this).attr("datetime");
            B && (this.innerHTML = As.elapsedTime(B))
          })
        }, 20000), A8.ondomready && A8.ondomready(), As.initView(), !A && A8.short_name && Ar.get("analytics/ping", k({}), Aw)
      })
    })
  }
}(window, document);
