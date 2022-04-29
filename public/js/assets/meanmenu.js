(function (i) {
    "use strict";
    i.fn.meanmenu = function (y) {
        var b = {
            meanMenuTarget: jQuery(this),
            meanMenuContainer: ".mobile-menu-area .container",
            meanMenuClose: "X",
            meanMenuCloseSize: "18px",
            meanMenuOpen: "<span /><span /><span />",
            meanRevealPosition: "right",
            meanRevealPositionDistance: "0",
            meanRevealColour: "",
            meanScreenWidth: "767",
            meanNavPush: "",
            meanShowChildren: !0,
            meanExpandableChildren: !0,
            meanExpand: "+",
            meanContract: "-",
            meanRemoveAttrs: !1,
            onePage: !1,
            meanDisplay: "block",
            removeElements: ""
        };
        y = i.extend(b, y);
        var r = window.innerWidth || document.documentElement.clientWidth;
        return this.each(function () {
            var l = y.meanMenuTarget,
                h = y.meanMenuContainer,
                e = y.meanMenuClose,
                t = y.meanMenuCloseSize,
                o = y.meanMenuOpen,
                s = y.meanRevealPosition,
                u = y.meanRevealPositionDistance,
                f = y.meanRevealColour,
                a = y.meanScreenWidth,
                n = y.meanNavPush,
                p = ".meanmenu-reveal",
                c = y.meanShowChildren,
                v = y.meanExpandableChildren,
                _ = y.meanExpand,
                z = y.meanContract,
                L = y.meanRemoveAttrs,
                C = y.onePage,
                E = y.meanDisplay,
                O = y.removeElements,
                P = !1;
            (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/Blackberry/i) || navigator.userAgent.match(/Windows Phone/i)) && (P = !0), (navigator.userAgent.match(/MSIE 8/i) || navigator.userAgent.match(/MSIE 7/i)) && jQuery("html").css("overflow-y", "scroll");
            var x = "",
                H = function () {
                    if (s === "center") {
                        var j = window.innerWidth || document.documentElement.clientWidth,
                            q = j / 2 - 22 + "px";
                        x = "left:" + q + ";right:auto;", P ? jQuery(".meanmenu-reveal").animate({
                            left: q
                        }) : jQuery(".meanmenu-reveal").css("left", q)
                    }
                },
                m = !1,
                w = !1;
            s === "right" && (x = "right:" + u + ";left:auto;"), s === "left" && (x = "left:" + u + ";right:auto;"), H();
            var S = "",
                k = function () {
                    jQuery(S).is(".meanmenu-reveal.meanclose") ? S.html(e) : S.html(o)
                },
                A = function () {
                    jQuery(".mean-bar,.mean-push").remove(), jQuery(h).removeClass("mean-container"), jQuery(l).css("display", E), m = !1, w = !1, jQuery(O).removeClass("mean-remove")
                },
                N = function () {
                    var j = "background:" + f + ";color:" + f + ";" + x;
                    if (r <= a) {
                        jQuery(O).addClass("mean-remove"), w = !0, jQuery(h).addClass("mean-container"), jQuery(".mean-container").prepend('<div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="' + j + '">Show Navigation</a><nav class="mean-nav"></nav></div>');
                        var q = jQuery(l).html();
                        jQuery(".mean-nav").html(q), L && jQuery("nav.mean-nav ul, nav.mean-nav ul *").each(function () {
                            jQuery(this).is(".mean-remove") ? jQuery(this).attr("class", "mean-remove") : jQuery(this).removeAttr("class"), jQuery(this).removeAttr("id")
                        }), jQuery(l).before('<div class="mean-push" />'), jQuery(".mean-push").css("margin-top", n), jQuery(l).hide(), jQuery(".meanmenu-reveal").show(), jQuery(p).html(o), S = jQuery(p), jQuery(".mean-nav ul").hide(), c ? v ? (jQuery(".mean-nav ul ul").each(function () {
                            jQuery(this).children().length && jQuery(this, "li:first").parent().append('<a class="mean-expand" href="#" style="font-size: ' + t + '">' + _ + "</a>")
                        }), jQuery(".mean-expand").on("click", function (F) {
                            F.preventDefault(), jQuery(this).hasClass("mean-clicked") ? (jQuery(this).text(_), jQuery(this).prev("ul").slideUp(300, function () { })) : (jQuery(this).text(z), jQuery(this).prev("ul").slideDown(300, function () { })), jQuery(this).toggleClass("mean-clicked")
                        })) : jQuery(".mean-nav ul ul").show() : jQuery(".mean-nav ul ul").hide(), jQuery(".mean-nav ul li").last().addClass("mean-last"), S.removeClass("meanclose"), jQuery(S).click(function (F) {
                            F.preventDefault(), m === !1 ? (S.css("text-align", "center"), S.css("text-indent", "0"), S.css("font-size", t), jQuery(".mean-nav ul:first").slideDown(), m = !0) : (jQuery(".mean-nav ul:first").slideUp(), m = !1), S.toggleClass("meanclose"), k(), jQuery(O).addClass("mean-remove")
                        }), C && jQuery(".mean-nav ul > li > a:first-child").on("click", function () {
                            jQuery(".mean-nav ul:first").slideUp(), m = !1, jQuery(S).toggleClass("meanclose").html(o)
                        })
                    } else A()
                };
            P || jQuery(window).resize(function () {
                r = window.innerWidth || document.documentElement.clientWidth, r > a, A(), r <= a ? (N(), H()) : A()
            }), jQuery(window).resize(function () {
                r = window.innerWidth || document.documentElement.clientWidth, P ? (H(), r <= a ? w === !1 && N() : A()) : (A(), r <= a && (N(), H()))
            }), N()
        })
    }
})(jQuery);