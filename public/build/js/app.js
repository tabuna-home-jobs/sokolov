if (!function (t, e) {
        "object" == typeof module && "object" == typeof module.exports ? module.exports = t.document ? e(t, !0) : function (t) {
            if (!t.document)throw new Error("jQuery requires a window with a document");
            return e(t)
        } : e(t)
    }("undefined" != typeof window ? window : this, function (t, e) {
        function n(t) {
            var e = "length"in t && t.length, n = G.type(t);
            return "function" === n || G.isWindow(t) ? !1 : 1 === t.nodeType && e ? !0 : "array" === n || 0 === e || "number" == typeof e && e > 0 && e - 1 in t
        }

        function i(t, e, n) {
            if (G.isFunction(e))return G.grep(t, function (t, i) {
                return !!e.call(t, i, t) !== n
            });
            if (e.nodeType)return G.grep(t, function (t) {
                return t === e !== n
            });
            if ("string" == typeof e) {
                if (at.test(e))return G.filter(e, t, n);
                e = G.filter(e, t)
            }
            return G.grep(t, function (t) {
                return V.call(e, t) >= 0 !== n
            })
        }

        function o(t, e) {
            for (; (t = t[e]) && 1 !== t.nodeType;);
            return t
        }

        function r(t) {
            var e = ft[t] = {};
            return G.each(t.match(dt) || [], function (t, n) {
                e[n] = !0
            }), e
        }

        function s() {
            Z.removeEventListener("DOMContentLoaded", s, !1), t.removeEventListener("load", s, !1), G.ready()
        }

        function a() {
            Object.defineProperty(this.cache = {}, 0, {
                get: function () {
                    return {}
                }
            }), this.expando = G.expando + a.uid++
        }

        function l(t, e, n) {
            var i;
            if (void 0 === n && 1 === t.nodeType)if (i = "data-" + e.replace(xt, "-$1").toLowerCase(), n = t.getAttribute(i), "string" == typeof n) {
                try {
                    n = "true" === n ? !0 : "false" === n ? !1 : "null" === n ? null : +n + "" === n ? +n : bt.test(n) ? G.parseJSON(n) : n
                } catch (o) {
                }
                yt.set(t, e, n)
            } else n = void 0;
            return n
        }

        function c() {
            return !0
        }

        function u() {
            return !1
        }

        function p() {
            try {
                return Z.activeElement
            } catch (t) {
            }
        }

        function h(t, e) {
            return G.nodeName(t, "table") && G.nodeName(11 !== e.nodeType ? e : e.firstChild, "tr") ? t.getElementsByTagName("tbody")[0] || t.appendChild(t.ownerDocument.createElement("tbody")) : t
        }

        function d(t) {
            return t.type = (null !== t.getAttribute("type")) + "/" + t.type, t
        }

        function f(t) {
            var e = Pt.exec(t.type);
            return e ? t.type = e[1] : t.removeAttribute("type"), t
        }

        function g(t, e) {
            for (var n = 0, i = t.length; i > n; n++)vt.set(t[n], "globalEval", !e || vt.get(e[n], "globalEval"))
        }

        function m(t, e) {
            var n, i, o, r, s, a, l, c;
            if (1 === e.nodeType) {
                if (vt.hasData(t) && (r = vt.access(t), s = vt.set(e, r), c = r.events)) {
                    delete s.handle, s.events = {};
                    for (o in c)for (n = 0, i = c[o].length; i > n; n++)G.event.add(e, o, c[o][n])
                }
                yt.hasData(t) && (a = yt.access(t), l = G.extend({}, a), yt.set(e, l))
            }
        }

        function v(t, e) {
            var n = t.getElementsByTagName ? t.getElementsByTagName(e || "*") : t.querySelectorAll ? t.querySelectorAll(e || "*") : [];
            return void 0 === e || e && G.nodeName(t, e) ? G.merge([t], n) : n
        }

        function y(t, e) {
            var n = e.nodeName.toLowerCase();
            "input" === n && kt.test(t.type) ? e.checked = t.checked : ("input" === n || "textarea" === n) && (e.defaultValue = t.defaultValue)
        }

        function b(e, n) {
            var i, o = G(n.createElement(e)).appendTo(n.body), r = t.getDefaultComputedStyle && (i = t.getDefaultComputedStyle(o[0])) ? i.display : G.css(o[0], "display");
            return o.detach(), r
        }

        function x(t) {
            var e = Z, n = Mt[t];
            return n || (n = b(t, e), "none" !== n && n || (Wt = (Wt || G("<iframe frameborder='0' width='0' height='0'/>")).appendTo(e.documentElement), e = Wt[0].contentDocument, e.write(), e.close(), n = b(t, e), Wt.detach()), Mt[t] = n), n
        }

        function w(t, e, n) {
            var i, o, r, s, a = t.style;
            return n = n || Bt(t), n && (s = n.getPropertyValue(e) || n[e]), n && ("" !== s || G.contains(t.ownerDocument, t) || (s = G.style(t, e)), _t.test(s) && qt.test(e) && (i = a.width, o = a.minWidth, r = a.maxWidth, a.minWidth = a.maxWidth = a.width = s, s = n.width, a.width = i, a.minWidth = o, a.maxWidth = r)), void 0 !== s ? s + "" : s
        }

        function T(t, e) {
            return {
                get: function () {
                    return t() ? void delete this.get : (this.get = e).apply(this, arguments)
                }
            }
        }

        function C(t, e) {
            if (e in t)return e;
            for (var n = e[0].toUpperCase() + e.slice(1), i = e, o = Kt.length; o--;)if (e = Kt[o] + n, e in t)return e;
            return i
        }

        function k(t, e, n) {
            var i = zt.exec(e);
            return i ? Math.max(0, i[1] - (n || 0)) + (i[2] || "px") : e
        }

        function $(t, e, n, i, o) {
            for (var r = n === (i ? "border" : "content") ? 4 : "width" === e ? 1 : 0, s = 0; 4 > r; r += 2)"margin" === n && (s += G.css(t, n + Tt[r], !0, o)), i ? ("content" === n && (s -= G.css(t, "padding" + Tt[r], !0, o)), "margin" !== n && (s -= G.css(t, "border" + Tt[r] + "Width", !0, o))) : (s += G.css(t, "padding" + Tt[r], !0, o), "padding" !== n && (s += G.css(t, "border" + Tt[r] + "Width", !0, o)));
            return s
        }

        function E(t, e, n) {
            var i = !0, o = "width" === e ? t.offsetWidth : t.offsetHeight, r = Bt(t), s = "border-box" === G.css(t, "boxSizing", !1, r);
            if (0 >= o || null == o) {
                if (o = w(t, e, r), (0 > o || null == o) && (o = t.style[e]), _t.test(o))return o;
                i = s && (Y.boxSizingReliable() || o === t.style[e]), o = parseFloat(o) || 0
            }
            return o + $(t, e, n || (s ? "border" : "content"), i, r) + "px"
        }

        function S(t, e) {
            for (var n, i, o, r = [], s = 0, a = t.length; a > s; s++)i = t[s], i.style && (r[s] = vt.get(i, "olddisplay"), n = i.style.display, e ? (r[s] || "none" !== n || (i.style.display = ""), "" === i.style.display && Ct(i) && (r[s] = vt.access(i, "olddisplay", x(i.nodeName)))) : (o = Ct(i), "none" === n && o || vt.set(i, "olddisplay", o ? n : G.css(i, "display"))));
            for (s = 0; a > s; s++)i = t[s], i.style && (e && "none" !== i.style.display && "" !== i.style.display || (i.style.display = e ? r[s] || "" : "none"));
            return t
        }

        function D(t, e, n, i, o) {
            return new D.prototype.init(t, e, n, i, o)
        }

        function N() {
            return setTimeout(function () {
                Yt = void 0
            }), Yt = G.now()
        }

        function A(t, e) {
            var n, i = 0, o = {height: t};
            for (e = e ? 1 : 0; 4 > i; i += 2 - e)n = Tt[i], o["margin" + n] = o["padding" + n] = t;
            return e && (o.opacity = o.width = t), o
        }

        function j(t, e, n) {
            for (var i, o = (ne[e] || []).concat(ne["*"]), r = 0, s = o.length; s > r; r++)if (i = o[r].call(n, e, t))return i
        }

        function O(t, e, n) {
            var i, o, r, s, a, l, c, u, p = this, h = {}, d = t.style, f = t.nodeType && Ct(t), g = vt.get(t, "fxshow");
            n.queue || (a = G._queueHooks(t, "fx"), null == a.unqueued && (a.unqueued = 0, l = a.empty.fire, a.empty.fire = function () {
                a.unqueued || l()
            }), a.unqueued++, p.always(function () {
                p.always(function () {
                    a.unqueued--, G.queue(t, "fx").length || a.empty.fire()
                })
            })), 1 === t.nodeType && ("height"in e || "width"in e) && (n.overflow = [d.overflow, d.overflowX, d.overflowY], c = G.css(t, "display"), u = "none" === c ? vt.get(t, "olddisplay") || x(t.nodeName) : c, "inline" === u && "none" === G.css(t, "float") && (d.display = "inline-block")), n.overflow && (d.overflow = "hidden", p.always(function () {
                d.overflow = n.overflow[0], d.overflowX = n.overflow[1], d.overflowY = n.overflow[2]
            }));
            for (i in e)if (o = e[i], Jt.exec(o)) {
                if (delete e[i], r = r || "toggle" === o, o === (f ? "hide" : "show")) {
                    if ("show" !== o || !g || void 0 === g[i])continue;
                    f = !0
                }
                h[i] = g && g[i] || G.style(t, i)
            } else c = void 0;
            if (G.isEmptyObject(h))"inline" === ("none" === c ? x(t.nodeName) : c) && (d.display = c); else {
                g ? "hidden"in g && (f = g.hidden) : g = vt.access(t, "fxshow", {}), r && (g.hidden = !f), f ? G(t).show() : p.done(function () {
                    G(t).hide()
                }), p.done(function () {
                    var e;
                    vt.remove(t, "fxshow");
                    for (e in h)G.style(t, e, h[e])
                });
                for (i in h)s = j(f ? g[i] : 0, i, p), i in g || (g[i] = s.start, f && (s.end = s.start, s.start = "width" === i || "height" === i ? 1 : 0))
            }
        }

        function L(t, e) {
            var n, i, o, r, s;
            for (n in t)if (i = G.camelCase(n), o = e[i], r = t[n], G.isArray(r) && (o = r[1], r = t[n] = r[0]), n !== i && (t[i] = r, delete t[n]), s = G.cssHooks[i], s && "expand"in s) {
                r = s.expand(r), delete t[i];
                for (n in r)n in t || (t[n] = r[n], e[n] = o)
            } else e[i] = o
        }

        function I(t, e, n) {
            var i, o, r = 0, s = ee.length, a = G.Deferred().always(function () {
                delete l.elem
            }), l = function () {
                if (o)return !1;
                for (var e = Yt || N(), n = Math.max(0, c.startTime + c.duration - e), i = n / c.duration || 0, r = 1 - i, s = 0, l = c.tweens.length; l > s; s++)c.tweens[s].run(r);
                return a.notifyWith(t, [c, r, n]), 1 > r && l ? n : (a.resolveWith(t, [c]), !1)
            }, c = a.promise({
                elem: t,
                props: G.extend({}, e),
                opts: G.extend(!0, {specialEasing: {}}, n),
                originalProperties: e,
                originalOptions: n,
                startTime: Yt || N(),
                duration: n.duration,
                tweens: [],
                createTween: function (e, n) {
                    var i = G.Tween(t, c.opts, e, n, c.opts.specialEasing[e] || c.opts.easing);
                    return c.tweens.push(i), i
                },
                stop: function (e) {
                    var n = 0, i = e ? c.tweens.length : 0;
                    if (o)return this;
                    for (o = !0; i > n; n++)c.tweens[n].run(1);
                    return e ? a.resolveWith(t, [c, e]) : a.rejectWith(t, [c, e]), this
                }
            }), u = c.props;
            for (L(u, c.opts.specialEasing); s > r; r++)if (i = ee[r].call(c, t, u, c.opts))return i;
            return G.map(u, j, c), G.isFunction(c.opts.start) && c.opts.start.call(t, c), G.fx.timer(G.extend(l, {
                elem: t,
                anim: c,
                queue: c.opts.queue
            })), c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always)
        }

        function R(t) {
            return function (e, n) {
                "string" != typeof e && (n = e, e = "*");
                var i, o = 0, r = e.toLowerCase().match(dt) || [];
                if (G.isFunction(n))for (; i = r[o++];)"+" === i[0] ? (i = i.slice(1) || "*", (t[i] = t[i] || []).unshift(n)) : (t[i] = t[i] || []).push(n)
            }
        }

        function P(t, e, n, i) {
            function o(a) {
                var l;
                return r[a] = !0, G.each(t[a] || [], function (t, a) {
                    var c = a(e, n, i);
                    return "string" != typeof c || s || r[c] ? s ? !(l = c) : void 0 : (e.dataTypes.unshift(c), o(c), !1)
                }), l
            }

            var r = {}, s = t === be;
            return o(e.dataTypes[0]) || !r["*"] && o("*")
        }

        function H(t, e) {
            var n, i, o = G.ajaxSettings.flatOptions || {};
            for (n in e)void 0 !== e[n] && ((o[n] ? t : i || (i = {}))[n] = e[n]);
            return i && G.extend(!0, t, i), t
        }

        function F(t, e, n) {
            for (var i, o, r, s, a = t.contents, l = t.dataTypes; "*" === l[0];)l.shift(), void 0 === i && (i = t.mimeType || e.getResponseHeader("Content-Type"));
            if (i)for (o in a)if (a[o] && a[o].test(i)) {
                l.unshift(o);
                break
            }
            if (l[0]in n)r = l[0]; else {
                for (o in n) {
                    if (!l[0] || t.converters[o + " " + l[0]]) {
                        r = o;
                        break
                    }
                    s || (s = o)
                }
                r = r || s
            }
            return r ? (r !== l[0] && l.unshift(r), n[r]) : void 0
        }

        function W(t, e, n, i) {
            var o, r, s, a, l, c = {}, u = t.dataTypes.slice();
            if (u[1])for (s in t.converters)c[s.toLowerCase()] = t.converters[s];
            for (r = u.shift(); r;)if (t.responseFields[r] && (n[t.responseFields[r]] = e), !l && i && t.dataFilter && (e = t.dataFilter(e, t.dataType)), l = r, r = u.shift())if ("*" === r)r = l; else if ("*" !== l && l !== r) {
                if (s = c[l + " " + r] || c["* " + r], !s)for (o in c)if (a = o.split(" "), a[1] === r && (s = c[l + " " + a[0]] || c["* " + a[0]])) {
                    s === !0 ? s = c[o] : c[o] !== !0 && (r = a[0], u.unshift(a[1]));
                    break
                }
                if (s !== !0)if (s && t["throws"])e = s(e); else try {
                    e = s(e)
                } catch (p) {
                    return {state: "parsererror", error: s ? p : "No conversion from " + l + " to " + r}
                }
            }
            return {state: "success", data: e}
        }

        function M(t, e, n, i) {
            var o;
            if (G.isArray(e))G.each(e, function (e, o) {
                n || ke.test(t) ? i(t, o) : M(t + "[" + ("object" == typeof o ? e : "") + "]", o, n, i)
            }); else if (n || "object" !== G.type(e))i(t, e); else for (o in e)M(t + "[" + o + "]", e[o], n, i)
        }

        function q(t) {
            return G.isWindow(t) ? t : 9 === t.nodeType && t.defaultView
        }

        var _ = [], B = _.slice, U = _.concat, z = _.push, V = _.indexOf, Q = {}, X = Q.toString, K = Q.hasOwnProperty, Y = {}, Z = t.document, J = "2.1.4", G = function (t, e) {
            return new G.fn.init(t, e)
        }, tt = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, et = /^-ms-/, nt = /-([\da-z])/gi, it = function (t, e) {
            return e.toUpperCase()
        };
        G.fn = G.prototype = {
            jquery: J, constructor: G, selector: "", length: 0, toArray: function () {
                return B.call(this)
            }, get: function (t) {
                return null != t ? 0 > t ? this[t + this.length] : this[t] : B.call(this)
            }, pushStack: function (t) {
                var e = G.merge(this.constructor(), t);
                return e.prevObject = this, e.context = this.context, e
            }, each: function (t, e) {
                return G.each(this, t, e)
            }, map: function (t) {
                return this.pushStack(G.map(this, function (e, n) {
                    return t.call(e, n, e)
                }))
            }, slice: function () {
                return this.pushStack(B.apply(this, arguments))
            }, first: function () {
                return this.eq(0)
            }, last: function () {
                return this.eq(-1)
            }, eq: function (t) {
                var e = this.length, n = +t + (0 > t ? e : 0);
                return this.pushStack(n >= 0 && e > n ? [this[n]] : [])
            }, end: function () {
                return this.prevObject || this.constructor(null)
            }, push: z, sort: _.sort, splice: _.splice
        }, G.extend = G.fn.extend = function () {
            var t, e, n, i, o, r, s = arguments[0] || {}, a = 1, l = arguments.length, c = !1;
            for ("boolean" == typeof s && (c = s, s = arguments[a] || {}, a++), "object" == typeof s || G.isFunction(s) || (s = {}), a === l && (s = this, a--); l > a; a++)if (null != (t = arguments[a]))for (e in t)n = s[e], i = t[e], s !== i && (c && i && (G.isPlainObject(i) || (o = G.isArray(i))) ? (o ? (o = !1, r = n && G.isArray(n) ? n : []) : r = n && G.isPlainObject(n) ? n : {}, s[e] = G.extend(c, r, i)) : void 0 !== i && (s[e] = i));
            return s
        }, G.extend({
            expando: "jQuery" + (J + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (t) {
                throw new Error(t)
            }, noop: function () {
            }, isFunction: function (t) {
                return "function" === G.type(t)
            }, isArray: Array.isArray, isWindow: function (t) {
                return null != t && t === t.window
            }, isNumeric: function (t) {
                return !G.isArray(t) && t - parseFloat(t) + 1 >= 0
            }, isPlainObject: function (t) {
                return "object" !== G.type(t) || t.nodeType || G.isWindow(t) ? !1 : t.constructor && !K.call(t.constructor.prototype, "isPrototypeOf") ? !1 : !0
            }, isEmptyObject: function (t) {
                var e;
                for (e in t)return !1;
                return !0
            }, type: function (t) {
                return null == t ? t + "" : "object" == typeof t || "function" == typeof t ? Q[X.call(t)] || "object" : typeof t
            }, globalEval: function (t) {
                var e, n = eval;
                t = G.trim(t), t && (1 === t.indexOf("use strict") ? (e = Z.createElement("script"), e.text = t, Z.head.appendChild(e).parentNode.removeChild(e)) : n(t))
            }, camelCase: function (t) {
                return t.replace(et, "ms-").replace(nt, it)
            }, nodeName: function (t, e) {
                return t.nodeName && t.nodeName.toLowerCase() === e.toLowerCase()
            }, each: function (t, e, i) {
                var o, r = 0, s = t.length, a = n(t);
                if (i) {
                    if (a)for (; s > r && (o = e.apply(t[r], i), o !== !1); r++); else for (r in t)if (o = e.apply(t[r], i), o === !1)break
                } else if (a)for (; s > r && (o = e.call(t[r], r, t[r]), o !== !1); r++); else for (r in t)if (o = e.call(t[r], r, t[r]), o === !1)break;
                return t
            }, trim: function (t) {
                return null == t ? "" : (t + "").replace(tt, "")
            }, makeArray: function (t, e) {
                var i = e || [];
                return null != t && (n(Object(t)) ? G.merge(i, "string" == typeof t ? [t] : t) : z.call(i, t)), i
            }, inArray: function (t, e, n) {
                return null == e ? -1 : V.call(e, t, n)
            }, merge: function (t, e) {
                for (var n = +e.length, i = 0, o = t.length; n > i; i++)t[o++] = e[i];
                return t.length = o, t
            }, grep: function (t, e, n) {
                for (var i, o = [], r = 0, s = t.length, a = !n; s > r; r++)i = !e(t[r], r), i !== a && o.push(t[r]);
                return o
            }, map: function (t, e, i) {
                var o, r = 0, s = t.length, a = n(t), l = [];
                if (a)for (; s > r; r++)o = e(t[r], r, i), null != o && l.push(o); else for (r in t)o = e(t[r], r, i), null != o && l.push(o);
                return U.apply([], l)
            }, guid: 1, proxy: function (t, e) {
                var n, i, o;
                return "string" == typeof e && (n = t[e], e = t, t = n), G.isFunction(t) ? (i = B.call(arguments, 2), o = function () {
                    return t.apply(e || this, i.concat(B.call(arguments)))
                }, o.guid = t.guid = t.guid || G.guid++, o) : void 0
            }, now: Date.now, support: Y
        }), G.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (t, e) {
            Q["[object " + e + "]"] = e.toLowerCase()
        });
        var ot = function (t) {
            function e(t, e, n, i) {
                var o, r, s, a, l, c, p, d, f, g;
                if ((e ? e.ownerDocument || e : M) !== O && j(e), e = e || O, n = n || [], a = e.nodeType, "string" != typeof t || !t || 1 !== a && 9 !== a && 11 !== a)return n;
                if (!i && I) {
                    if (11 !== a && (o = yt.exec(t)))if (s = o[1]) {
                        if (9 === a) {
                            if (r = e.getElementById(s), !r || !r.parentNode)return n;
                            if (r.id === s)return n.push(r), n
                        } else if (e.ownerDocument && (r = e.ownerDocument.getElementById(s)) && F(e, r) && r.id === s)return n.push(r), n
                    } else {
                        if (o[2])return J.apply(n, e.getElementsByTagName(t)), n;
                        if ((s = o[3]) && w.getElementsByClassName)return J.apply(n, e.getElementsByClassName(s)), n
                    }
                    if (w.qsa && (!R || !R.test(t))) {
                        if (d = p = W, f = e, g = 1 !== a && t, 1 === a && "object" !== e.nodeName.toLowerCase()) {
                            for (c = $(t), (p = e.getAttribute("id")) ? d = p.replace(xt, "\\$&") : e.setAttribute("id", d), d = "[id='" + d + "'] ", l = c.length; l--;)c[l] = d + h(c[l]);
                            f = bt.test(t) && u(e.parentNode) || e, g = c.join(",")
                        }
                        if (g)try {
                            return J.apply(n, f.querySelectorAll(g)), n
                        } catch (m) {
                        } finally {
                            p || e.removeAttribute("id")
                        }
                    }
                }
                return S(t.replace(lt, "$1"), e, n, i)
            }

            function n() {
                function t(n, i) {
                    return e.push(n + " ") > T.cacheLength && delete t[e.shift()], t[n + " "] = i
                }

                var e = [];
                return t
            }

            function i(t) {
                return t[W] = !0, t
            }

            function o(t) {
                var e = O.createElement("div");
                try {
                    return !!t(e)
                } catch (n) {
                    return !1
                } finally {
                    e.parentNode && e.parentNode.removeChild(e), e = null
                }
            }

            function r(t, e) {
                for (var n = t.split("|"), i = t.length; i--;)T.attrHandle[n[i]] = e
            }

            function s(t, e) {
                var n = e && t, i = n && 1 === t.nodeType && 1 === e.nodeType && (~e.sourceIndex || Q) - (~t.sourceIndex || Q);
                if (i)return i;
                if (n)for (; n = n.nextSibling;)if (n === e)return -1;
                return t ? 1 : -1
            }

            function a(t) {
                return function (e) {
                    var n = e.nodeName.toLowerCase();
                    return "input" === n && e.type === t
                }
            }

            function l(t) {
                return function (e) {
                    var n = e.nodeName.toLowerCase();
                    return ("input" === n || "button" === n) && e.type === t
                }
            }

            function c(t) {
                return i(function (e) {
                    return e = +e, i(function (n, i) {
                        for (var o, r = t([], n.length, e), s = r.length; s--;)n[o = r[s]] && (n[o] = !(i[o] = n[o]))
                    })
                })
            }

            function u(t) {
                return t && "undefined" != typeof t.getElementsByTagName && t
            }

            function p() {
            }

            function h(t) {
                for (var e = 0, n = t.length, i = ""; n > e; e++)i += t[e].value;
                return i
            }

            function d(t, e, n) {
                var i = e.dir, o = n && "parentNode" === i, r = _++;
                return e.first ? function (e, n, r) {
                    for (; e = e[i];)if (1 === e.nodeType || o)return t(e, n, r)
                } : function (e, n, s) {
                    var a, l, c = [q, r];
                    if (s) {
                        for (; e = e[i];)if ((1 === e.nodeType || o) && t(e, n, s))return !0
                    } else for (; e = e[i];)if (1 === e.nodeType || o) {
                        if (l = e[W] || (e[W] = {}), (a = l[i]) && a[0] === q && a[1] === r)return c[2] = a[2];
                        if (l[i] = c, c[2] = t(e, n, s))return !0
                    }
                }
            }

            function f(t) {
                return t.length > 1 ? function (e, n, i) {
                    for (var o = t.length; o--;)if (!t[o](e, n, i))return !1;
                    return !0
                } : t[0]
            }

            function g(t, n, i) {
                for (var o = 0, r = n.length; r > o; o++)e(t, n[o], i);
                return i
            }

            function m(t, e, n, i, o) {
                for (var r, s = [], a = 0, l = t.length, c = null != e; l > a; a++)(r = t[a]) && (!n || n(r, i, o)) && (s.push(r), c && e.push(a));
                return s
            }

            function v(t, e, n, o, r, s) {
                return o && !o[W] && (o = v(o)), r && !r[W] && (r = v(r, s)), i(function (i, s, a, l) {
                    var c, u, p, h = [], d = [], f = s.length, v = i || g(e || "*", a.nodeType ? [a] : a, []), y = !t || !i && e ? v : m(v, h, t, a, l), b = n ? r || (i ? t : f || o) ? [] : s : y;
                    if (n && n(y, b, a, l), o)for (c = m(b, d), o(c, [], a, l), u = c.length; u--;)(p = c[u]) && (b[d[u]] = !(y[d[u]] = p));
                    if (i) {
                        if (r || t) {
                            if (r) {
                                for (c = [], u = b.length; u--;)(p = b[u]) && c.push(y[u] = p);
                                r(null, b = [], c, l)
                            }
                            for (u = b.length; u--;)(p = b[u]) && (c = r ? tt(i, p) : h[u]) > -1 && (i[c] = !(s[c] = p))
                        }
                    } else b = m(b === s ? b.splice(f, b.length) : b), r ? r(null, s, b, l) : J.apply(s, b)
                })
            }

            function y(t) {
                for (var e, n, i, o = t.length, r = T.relative[t[0].type], s = r || T.relative[" "], a = r ? 1 : 0, l = d(function (t) {
                    return t === e
                }, s, !0), c = d(function (t) {
                    return tt(e, t) > -1
                }, s, !0), u = [function (t, n, i) {
                    var o = !r && (i || n !== D) || ((e = n).nodeType ? l(t, n, i) : c(t, n, i));
                    return e = null, o
                }]; o > a; a++)if (n = T.relative[t[a].type])u = [d(f(u), n)]; else {
                    if (n = T.filter[t[a].type].apply(null, t[a].matches), n[W]) {
                        for (i = ++a; o > i && !T.relative[t[i].type]; i++);
                        return v(a > 1 && f(u), a > 1 && h(t.slice(0, a - 1).concat({value: " " === t[a - 2].type ? "*" : ""})).replace(lt, "$1"), n, i > a && y(t.slice(a, i)), o > i && y(t = t.slice(i)), o > i && h(t))
                    }
                    u.push(n)
                }
                return f(u)
            }

            function b(t, n) {
                var o = n.length > 0, r = t.length > 0, s = function (i, s, a, l, c) {
                    var u, p, h, d = 0, f = "0", g = i && [], v = [], y = D, b = i || r && T.find.TAG("*", c), x = q += null == y ? 1 : Math.random() || .1, w = b.length;
                    for (c && (D = s !== O && s); f !== w && null != (u = b[f]); f++) {
                        if (r && u) {
                            for (p = 0; h = t[p++];)if (h(u, s, a)) {
                                l.push(u);
                                break
                            }
                            c && (q = x)
                        }
                        o && ((u = !h && u) && d--, i && g.push(u))
                    }
                    if (d += f, o && f !== d) {
                        for (p = 0; h = n[p++];)h(g, v, s, a);
                        if (i) {
                            if (d > 0)for (; f--;)g[f] || v[f] || (v[f] = Y.call(l));
                            v = m(v)
                        }
                        J.apply(l, v), c && !i && v.length > 0 && d + n.length > 1 && e.uniqueSort(l)
                    }
                    return c && (q = x, D = y), g
                };
                return o ? i(s) : s
            }

            var x, w, T, C, k, $, E, S, D, N, A, j, O, L, I, R, P, H, F, W = "sizzle" + 1 * new Date, M = t.document, q = 0, _ = 0, B = n(), U = n(), z = n(), V = function (t, e) {
                return t === e && (A = !0), 0
            }, Q = 1 << 31, X = {}.hasOwnProperty, K = [], Y = K.pop, Z = K.push, J = K.push, G = K.slice, tt = function (t, e) {
                for (var n = 0, i = t.length; i > n; n++)if (t[n] === e)return n;
                return -1
            }, et = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", nt = "[\\x20\\t\\r\\n\\f]", it = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+", ot = it.replace("w", "w#"), rt = "\\[" + nt + "*(" + it + ")(?:" + nt + "*([*^$|!~]?=)" + nt + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + ot + "))|)" + nt + "*\\]", st = ":(" + it + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + rt + ")*)|.*)\\)|)", at = new RegExp(nt + "+", "g"), lt = new RegExp("^" + nt + "+|((?:^|[^\\\\])(?:\\\\.)*)" + nt + "+$", "g"), ct = new RegExp("^" + nt + "*," + nt + "*"), ut = new RegExp("^" + nt + "*([>+~]|" + nt + ")" + nt + "*"), pt = new RegExp("=" + nt + "*([^\\]'\"]*?)" + nt + "*\\]", "g"), ht = new RegExp(st), dt = new RegExp("^" + ot + "$"), ft = {
                ID: new RegExp("^#(" + it + ")"),
                CLASS: new RegExp("^\\.(" + it + ")"),
                TAG: new RegExp("^(" + it.replace("w", "w*") + ")"),
                ATTR: new RegExp("^" + rt),
                PSEUDO: new RegExp("^" + st),
                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + nt + "*(even|odd|(([+-]|)(\\d*)n|)" + nt + "*(?:([+-]|)" + nt + "*(\\d+)|))" + nt + "*\\)|)", "i"),
                bool: new RegExp("^(?:" + et + ")$", "i"),
                needsContext: new RegExp("^" + nt + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + nt + "*((?:-\\d)?\\d*)" + nt + "*\\)|)(?=[^-]|$)", "i")
            }, gt = /^(?:input|select|textarea|button)$/i, mt = /^h\d$/i, vt = /^[^{]+\{\s*\[native \w/, yt = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, bt = /[+~]/, xt = /'|\\/g, wt = new RegExp("\\\\([\\da-f]{1,6}" + nt + "?|(" + nt + ")|.)", "ig"), Tt = function (t, e, n) {
                var i = "0x" + e - 65536;
                return i !== i || n ? e : 0 > i ? String.fromCharCode(i + 65536) : String.fromCharCode(i >> 10 | 55296, 1023 & i | 56320)
            }, Ct = function () {
                j()
            };
            try {
                J.apply(K = G.call(M.childNodes), M.childNodes), K[M.childNodes.length].nodeType
            } catch (kt) {
                J = {
                    apply: K.length ? function (t, e) {
                        Z.apply(t, G.call(e))
                    } : function (t, e) {
                        for (var n = t.length, i = 0; t[n++] = e[i++];);
                        t.length = n - 1
                    }
                }
            }
            w = e.support = {}, k = e.isXML = function (t) {
                var e = t && (t.ownerDocument || t).documentElement;
                return e ? "HTML" !== e.nodeName : !1
            }, j = e.setDocument = function (t) {
                var e, n, i = t ? t.ownerDocument || t : M;
                return i !== O && 9 === i.nodeType && i.documentElement ? (O = i, L = i.documentElement, n = i.defaultView, n && n !== n.top && (n.addEventListener ? n.addEventListener("unload", Ct, !1) : n.attachEvent && n.attachEvent("onunload", Ct)), I = !k(i), w.attributes = o(function (t) {
                    return t.className = "i", !t.getAttribute("className")
                }), w.getElementsByTagName = o(function (t) {
                    return t.appendChild(i.createComment("")), !t.getElementsByTagName("*").length
                }), w.getElementsByClassName = vt.test(i.getElementsByClassName), w.getById = o(function (t) {
                    return L.appendChild(t).id = W, !i.getElementsByName || !i.getElementsByName(W).length
                }), w.getById ? (T.find.ID = function (t, e) {
                    if ("undefined" != typeof e.getElementById && I) {
                        var n = e.getElementById(t);
                        return n && n.parentNode ? [n] : []
                    }
                }, T.filter.ID = function (t) {
                    var e = t.replace(wt, Tt);
                    return function (t) {
                        return t.getAttribute("id") === e
                    }
                }) : (delete T.find.ID, T.filter.ID = function (t) {
                    var e = t.replace(wt, Tt);
                    return function (t) {
                        var n = "undefined" != typeof t.getAttributeNode && t.getAttributeNode("id");
                        return n && n.value === e
                    }
                }), T.find.TAG = w.getElementsByTagName ? function (t, e) {
                    return "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName(t) : w.qsa ? e.querySelectorAll(t) : void 0
                } : function (t, e) {
                    var n, i = [], o = 0, r = e.getElementsByTagName(t);
                    if ("*" === t) {
                        for (; n = r[o++];)1 === n.nodeType && i.push(n);
                        return i
                    }
                    return r
                }, T.find.CLASS = w.getElementsByClassName && function (t, e) {
                        return I ? e.getElementsByClassName(t) : void 0
                    }, P = [], R = [], (w.qsa = vt.test(i.querySelectorAll)) && (o(function (t) {
                    L.appendChild(t).innerHTML = "<a id='" + W + "'></a><select id='" + W + "-\f]' msallowcapture=''><option selected=''></option></select>", t.querySelectorAll("[msallowcapture^='']").length && R.push("[*^$]=" + nt + "*(?:''|\"\")"), t.querySelectorAll("[selected]").length || R.push("\\[" + nt + "*(?:value|" + et + ")"), t.querySelectorAll("[id~=" + W + "-]").length || R.push("~="), t.querySelectorAll(":checked").length || R.push(":checked"), t.querySelectorAll("a#" + W + "+*").length || R.push(".#.+[+~]")
                }), o(function (t) {
                    var e = i.createElement("input");
                    e.setAttribute("type", "hidden"), t.appendChild(e).setAttribute("name", "D"), t.querySelectorAll("[name=d]").length && R.push("name" + nt + "*[*^$|!~]?="), t.querySelectorAll(":enabled").length || R.push(":enabled", ":disabled"), t.querySelectorAll("*,:x"), R.push(",.*:")
                })), (w.matchesSelector = vt.test(H = L.matches || L.webkitMatchesSelector || L.mozMatchesSelector || L.oMatchesSelector || L.msMatchesSelector)) && o(function (t) {
                    w.disconnectedMatch = H.call(t, "div"), H.call(t, "[s!='']:x"), P.push("!=", st)
                }), R = R.length && new RegExp(R.join("|")), P = P.length && new RegExp(P.join("|")), e = vt.test(L.compareDocumentPosition), F = e || vt.test(L.contains) ? function (t, e) {
                    var n = 9 === t.nodeType ? t.documentElement : t, i = e && e.parentNode;
                    return t === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : t.compareDocumentPosition && 16 & t.compareDocumentPosition(i)))
                } : function (t, e) {
                    if (e)for (; e = e.parentNode;)if (e === t)return !0;
                    return !1
                }, V = e ? function (t, e) {
                    if (t === e)return A = !0, 0;
                    var n = !t.compareDocumentPosition - !e.compareDocumentPosition;
                    return n ? n : (n = (t.ownerDocument || t) === (e.ownerDocument || e) ? t.compareDocumentPosition(e) : 1, 1 & n || !w.sortDetached && e.compareDocumentPosition(t) === n ? t === i || t.ownerDocument === M && F(M, t) ? -1 : e === i || e.ownerDocument === M && F(M, e) ? 1 : N ? tt(N, t) - tt(N, e) : 0 : 4 & n ? -1 : 1)
                } : function (t, e) {
                    if (t === e)return A = !0, 0;
                    var n, o = 0, r = t.parentNode, a = e.parentNode, l = [t], c = [e];
                    if (!r || !a)return t === i ? -1 : e === i ? 1 : r ? -1 : a ? 1 : N ? tt(N, t) - tt(N, e) : 0;
                    if (r === a)return s(t, e);
                    for (n = t; n = n.parentNode;)l.unshift(n);
                    for (n = e; n = n.parentNode;)c.unshift(n);
                    for (; l[o] === c[o];)o++;
                    return o ? s(l[o], c[o]) : l[o] === M ? -1 : c[o] === M ? 1 : 0
                }, i) : O
            }, e.matches = function (t, n) {
                return e(t, null, null, n)
            }, e.matchesSelector = function (t, n) {
                if ((t.ownerDocument || t) !== O && j(t), n = n.replace(pt, "='$1']"), !(!w.matchesSelector || !I || P && P.test(n) || R && R.test(n)))try {
                    var i = H.call(t, n);
                    if (i || w.disconnectedMatch || t.document && 11 !== t.document.nodeType)return i
                } catch (o) {
                }
                return e(n, O, null, [t]).length > 0
            }, e.contains = function (t, e) {
                return (t.ownerDocument || t) !== O && j(t), F(t, e)
            }, e.attr = function (t, e) {
                (t.ownerDocument || t) !== O && j(t);
                var n = T.attrHandle[e.toLowerCase()], i = n && X.call(T.attrHandle, e.toLowerCase()) ? n(t, e, !I) : void 0;
                return void 0 !== i ? i : w.attributes || !I ? t.getAttribute(e) : (i = t.getAttributeNode(e)) && i.specified ? i.value : null
            }, e.error = function (t) {
                throw new Error("Syntax error, unrecognized expression: " + t)
            }, e.uniqueSort = function (t) {
                var e, n = [], i = 0, o = 0;
                if (A = !w.detectDuplicates, N = !w.sortStable && t.slice(0), t.sort(V), A) {
                    for (; e = t[o++];)e === t[o] && (i = n.push(o));
                    for (; i--;)t.splice(n[i], 1)
                }
                return N = null, t
            }, C = e.getText = function (t) {
                var e, n = "", i = 0, o = t.nodeType;
                if (o) {
                    if (1 === o || 9 === o || 11 === o) {
                        if ("string" == typeof t.textContent)return t.textContent;
                        for (t = t.firstChild; t; t = t.nextSibling)n += C(t)
                    } else if (3 === o || 4 === o)return t.nodeValue
                } else for (; e = t[i++];)n += C(e);
                return n
            }, T = e.selectors = {
                cacheLength: 50,
                createPseudo: i,
                match: ft,
                attrHandle: {},
                find: {},
                relative: {
                    ">": {dir: "parentNode", first: !0},
                    " ": {dir: "parentNode"},
                    "+": {dir: "previousSibling", first: !0},
                    "~": {dir: "previousSibling"}
                },
                preFilter: {
                    ATTR: function (t) {
                        return t[1] = t[1].replace(wt, Tt), t[3] = (t[3] || t[4] || t[5] || "").replace(wt, Tt), "~=" === t[2] && (t[3] = " " + t[3] + " "), t.slice(0, 4)
                    }, CHILD: function (t) {
                        return t[1] = t[1].toLowerCase(), "nth" === t[1].slice(0, 3) ? (t[3] || e.error(t[0]), t[4] = +(t[4] ? t[5] + (t[6] || 1) : 2 * ("even" === t[3] || "odd" === t[3])), t[5] = +(t[7] + t[8] || "odd" === t[3])) : t[3] && e.error(t[0]), t
                    }, PSEUDO: function (t) {
                        var e, n = !t[6] && t[2];
                        return ft.CHILD.test(t[0]) ? null : (t[3] ? t[2] = t[4] || t[5] || "" : n && ht.test(n) && (e = $(n, !0)) && (e = n.indexOf(")", n.length - e) - n.length) && (t[0] = t[0].slice(0, e), t[2] = n.slice(0, e)), t.slice(0, 3))
                    }
                },
                filter: {
                    TAG: function (t) {
                        var e = t.replace(wt, Tt).toLowerCase();
                        return "*" === t ? function () {
                            return !0
                        } : function (t) {
                            return t.nodeName && t.nodeName.toLowerCase() === e
                        }
                    }, CLASS: function (t) {
                        var e = B[t + " "];
                        return e || (e = new RegExp("(^|" + nt + ")" + t + "(" + nt + "|$)")) && B(t, function (t) {
                                return e.test("string" == typeof t.className && t.className || "undefined" != typeof t.getAttribute && t.getAttribute("class") || "")
                            })
                    }, ATTR: function (t, n, i) {
                        return function (o) {
                            var r = e.attr(o, t);
                            return null == r ? "!=" === n : n ? (r += "", "=" === n ? r === i : "!=" === n ? r !== i : "^=" === n ? i && 0 === r.indexOf(i) : "*=" === n ? i && r.indexOf(i) > -1 : "$=" === n ? i && r.slice(-i.length) === i : "~=" === n ? (" " + r.replace(at, " ") + " ").indexOf(i) > -1 : "|=" === n ? r === i || r.slice(0, i.length + 1) === i + "-" : !1) : !0
                        }
                    }, CHILD: function (t, e, n, i, o) {
                        var r = "nth" !== t.slice(0, 3), s = "last" !== t.slice(-4), a = "of-type" === e;
                        return 1 === i && 0 === o ? function (t) {
                            return !!t.parentNode
                        } : function (e, n, l) {
                            var c, u, p, h, d, f, g = r !== s ? "nextSibling" : "previousSibling", m = e.parentNode, v = a && e.nodeName.toLowerCase(), y = !l && !a;
                            if (m) {
                                if (r) {
                                    for (; g;) {
                                        for (p = e; p = p[g];)if (a ? p.nodeName.toLowerCase() === v : 1 === p.nodeType)return !1;
                                        f = g = "only" === t && !f && "nextSibling"
                                    }
                                    return !0
                                }
                                if (f = [s ? m.firstChild : m.lastChild], s && y) {
                                    for (u = m[W] || (m[W] = {}), c = u[t] || [], d = c[0] === q && c[1], h = c[0] === q && c[2], p = d && m.childNodes[d]; p = ++d && p && p[g] || (h = d = 0) || f.pop();)if (1 === p.nodeType && ++h && p === e) {
                                        u[t] = [q, d, h];
                                        break
                                    }
                                } else if (y && (c = (e[W] || (e[W] = {}))[t]) && c[0] === q)h = c[1]; else for (; (p = ++d && p && p[g] || (h = d = 0) || f.pop()) && ((a ? p.nodeName.toLowerCase() !== v : 1 !== p.nodeType) || !++h || (y && ((p[W] || (p[W] = {}))[t] = [q, h]), p !== e)););
                                return h -= o, h === i || h % i === 0 && h / i >= 0
                            }
                        }
                    }, PSEUDO: function (t, n) {
                        var o, r = T.pseudos[t] || T.setFilters[t.toLowerCase()] || e.error("unsupported pseudo: " + t);
                        return r[W] ? r(n) : r.length > 1 ? (o = [t, t, "", n], T.setFilters.hasOwnProperty(t.toLowerCase()) ? i(function (t, e) {
                            for (var i, o = r(t, n), s = o.length; s--;)i = tt(t, o[s]), t[i] = !(e[i] = o[s])
                        }) : function (t) {
                            return r(t, 0, o)
                        }) : r
                    }
                },
                pseudos: {
                    not: i(function (t) {
                        var e = [], n = [], o = E(t.replace(lt, "$1"));
                        return o[W] ? i(function (t, e, n, i) {
                            for (var r, s = o(t, null, i, []), a = t.length; a--;)(r = s[a]) && (t[a] = !(e[a] = r))
                        }) : function (t, i, r) {
                            return e[0] = t, o(e, null, r, n), e[0] = null, !n.pop()
                        }
                    }), has: i(function (t) {
                        return function (n) {
                            return e(t, n).length > 0
                        }
                    }), contains: i(function (t) {
                        return t = t.replace(wt, Tt), function (e) {
                            return (e.textContent || e.innerText || C(e)).indexOf(t) > -1
                        }
                    }), lang: i(function (t) {
                        return dt.test(t || "") || e.error("unsupported lang: " + t), t = t.replace(wt, Tt).toLowerCase(), function (e) {
                            var n;
                            do if (n = I ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang"))return n = n.toLowerCase(), n === t || 0 === n.indexOf(t + "-"); while ((e = e.parentNode) && 1 === e.nodeType);
                            return !1
                        }
                    }), target: function (e) {
                        var n = t.location && t.location.hash;
                        return n && n.slice(1) === e.id
                    }, root: function (t) {
                        return t === L
                    }, focus: function (t) {
                        return t === O.activeElement && (!O.hasFocus || O.hasFocus()) && !!(t.type || t.href || ~t.tabIndex)
                    }, enabled: function (t) {
                        return t.disabled === !1
                    }, disabled: function (t) {
                        return t.disabled === !0
                    }, checked: function (t) {
                        var e = t.nodeName.toLowerCase();
                        return "input" === e && !!t.checked || "option" === e && !!t.selected
                    }, selected: function (t) {
                        return t.parentNode && t.parentNode.selectedIndex, t.selected === !0
                    }, empty: function (t) {
                        for (t = t.firstChild; t; t = t.nextSibling)if (t.nodeType < 6)return !1;
                        return !0
                    }, parent: function (t) {
                        return !T.pseudos.empty(t)
                    }, header: function (t) {
                        return mt.test(t.nodeName)
                    }, input: function (t) {
                        return gt.test(t.nodeName)
                    }, button: function (t) {
                        var e = t.nodeName.toLowerCase();
                        return "input" === e && "button" === t.type || "button" === e
                    }, text: function (t) {
                        var e;
                        return "input" === t.nodeName.toLowerCase() && "text" === t.type && (null == (e = t.getAttribute("type")) || "text" === e.toLowerCase())
                    }, first: c(function () {
                        return [0]
                    }), last: c(function (t, e) {
                        return [e - 1]
                    }), eq: c(function (t, e, n) {
                        return [0 > n ? n + e : n]
                    }), even: c(function (t, e) {
                        for (var n = 0; e > n; n += 2)t.push(n);
                        return t
                    }), odd: c(function (t, e) {
                        for (var n = 1; e > n; n += 2)t.push(n);
                        return t
                    }), lt: c(function (t, e, n) {
                        for (var i = 0 > n ? n + e : n; --i >= 0;)t.push(i);
                        return t
                    }), gt: c(function (t, e, n) {
                        for (var i = 0 > n ? n + e : n; ++i < e;)t.push(i);
                        return t
                    })
                }
            }, T.pseudos.nth = T.pseudos.eq;
            for (x in{radio: !0, checkbox: !0, file: !0, password: !0, image: !0})T.pseudos[x] = a(x);
            for (x in{submit: !0, reset: !0})T.pseudos[x] = l(x);
            return p.prototype = T.filters = T.pseudos, T.setFilters = new p, $ = e.tokenize = function (t, n) {
                var i, o, r, s, a, l, c, u = U[t + " "];
                if (u)return n ? 0 : u.slice(0);
                for (a = t, l = [], c = T.preFilter; a;) {
                    (!i || (o = ct.exec(a))) && (o && (a = a.slice(o[0].length) || a), l.push(r = [])), i = !1, (o = ut.exec(a)) && (i = o.shift(), r.push({
                        value: i,
                        type: o[0].replace(lt, " ")
                    }), a = a.slice(i.length));
                    for (s in T.filter)!(o = ft[s].exec(a)) || c[s] && !(o = c[s](o)) || (i = o.shift(), r.push({
                        value: i,
                        type: s,
                        matches: o
                    }), a = a.slice(i.length));
                    if (!i)break
                }
                return n ? a.length : a ? e.error(t) : U(t, l).slice(0)
            }, E = e.compile = function (t, e) {
                var n, i = [], o = [], r = z[t + " "];
                if (!r) {
                    for (e || (e = $(t)), n = e.length; n--;)r = y(e[n]), r[W] ? i.push(r) : o.push(r);
                    r = z(t, b(o, i)), r.selector = t
                }
                return r
            }, S = e.select = function (t, e, n, i) {
                var o, r, s, a, l, c = "function" == typeof t && t, p = !i && $(t = c.selector || t);
                if (n = n || [], 1 === p.length) {
                    if (r = p[0] = p[0].slice(0), r.length > 2 && "ID" === (s = r[0]).type && w.getById && 9 === e.nodeType && I && T.relative[r[1].type]) {
                        if (e = (T.find.ID(s.matches[0].replace(wt, Tt), e) || [])[0], !e)return n;
                        c && (e = e.parentNode), t = t.slice(r.shift().value.length)
                    }
                    for (o = ft.needsContext.test(t) ? 0 : r.length; o-- && (s = r[o], !T.relative[a = s.type]);)if ((l = T.find[a]) && (i = l(s.matches[0].replace(wt, Tt), bt.test(r[0].type) && u(e.parentNode) || e))) {
                        if (r.splice(o, 1), t = i.length && h(r), !t)return J.apply(n, i), n;
                        break
                    }
                }
                return (c || E(t, p))(i, e, !I, n, bt.test(t) && u(e.parentNode) || e), n
            }, w.sortStable = W.split("").sort(V).join("") === W, w.detectDuplicates = !!A, j(), w.sortDetached = o(function (t) {
                return 1 & t.compareDocumentPosition(O.createElement("div"))
            }), o(function (t) {
                return t.innerHTML = "<a href='#'></a>", "#" === t.firstChild.getAttribute("href")
            }) || r("type|href|height|width", function (t, e, n) {
                return n ? void 0 : t.getAttribute(e, "type" === e.toLowerCase() ? 1 : 2)
            }), w.attributes && o(function (t) {
                return t.innerHTML = "<input/>", t.firstChild.setAttribute("value", ""), "" === t.firstChild.getAttribute("value")
            }) || r("value", function (t, e, n) {
                return n || "input" !== t.nodeName.toLowerCase() ? void 0 : t.defaultValue
            }), o(function (t) {
                return null == t.getAttribute("disabled")
            }) || r(et, function (t, e, n) {
                var i;
                return n ? void 0 : t[e] === !0 ? e.toLowerCase() : (i = t.getAttributeNode(e)) && i.specified ? i.value : null
            }), e
        }(t);
        G.find = ot, G.expr = ot.selectors, G.expr[":"] = G.expr.pseudos, G.unique = ot.uniqueSort, G.text = ot.getText, G.isXMLDoc = ot.isXML, G.contains = ot.contains;
        var rt = G.expr.match.needsContext, st = /^<(\w+)\s*\/?>(?:<\/\1>|)$/, at = /^.[^:#\[\.,]*$/;
        G.filter = function (t, e, n) {
            var i = e[0];
            return n && (t = ":not(" + t + ")"), 1 === e.length && 1 === i.nodeType ? G.find.matchesSelector(i, t) ? [i] : [] : G.find.matches(t, G.grep(e, function (t) {
                return 1 === t.nodeType
            }))
        }, G.fn.extend({
            find: function (t) {
                var e, n = this.length, i = [], o = this;
                if ("string" != typeof t)return this.pushStack(G(t).filter(function () {
                    for (e = 0; n > e; e++)if (G.contains(o[e], this))return !0
                }));
                for (e = 0; n > e; e++)G.find(t, o[e], i);
                return i = this.pushStack(n > 1 ? G.unique(i) : i), i.selector = this.selector ? this.selector + " " + t : t, i
            }, filter: function (t) {
                return this.pushStack(i(this, t || [], !1))
            }, not: function (t) {
                return this.pushStack(i(this, t || [], !0))
            }, is: function (t) {
                return !!i(this, "string" == typeof t && rt.test(t) ? G(t) : t || [], !1).length
            }
        });
        var lt, ct = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/, ut = G.fn.init = function (t, e) {
            var n, i;
            if (!t)return this;
            if ("string" == typeof t) {
                if (n = "<" === t[0] && ">" === t[t.length - 1] && t.length >= 3 ? [null, t, null] : ct.exec(t), !n || !n[1] && e)return !e || e.jquery ? (e || lt).find(t) : this.constructor(e).find(t);
                if (n[1]) {
                    if (e = e instanceof G ? e[0] : e, G.merge(this, G.parseHTML(n[1], e && e.nodeType ? e.ownerDocument || e : Z, !0)), st.test(n[1]) && G.isPlainObject(e))for (n in e)G.isFunction(this[n]) ? this[n](e[n]) : this.attr(n, e[n]);
                    return this
                }
                return i = Z.getElementById(n[2]), i && i.parentNode && (this.length = 1, this[0] = i), this.context = Z, this.selector = t, this
            }
            return t.nodeType ? (this.context = this[0] = t, this.length = 1, this) : G.isFunction(t) ? "undefined" != typeof lt.ready ? lt.ready(t) : t(G) : (void 0 !== t.selector && (this.selector = t.selector, this.context = t.context), G.makeArray(t, this))
        };
        ut.prototype = G.fn, lt = G(Z);
        var pt = /^(?:parents|prev(?:Until|All))/, ht = {children: !0, contents: !0, next: !0, prev: !0};
        G.extend({
            dir: function (t, e, n) {
                for (var i = [], o = void 0 !== n; (t = t[e]) && 9 !== t.nodeType;)if (1 === t.nodeType) {
                    if (o && G(t).is(n))break;
                    i.push(t)
                }
                return i
            }, sibling: function (t, e) {
                for (var n = []; t; t = t.nextSibling)1 === t.nodeType && t !== e && n.push(t);
                return n
            }
        }), G.fn.extend({
            has: function (t) {
                var e = G(t, this), n = e.length;
                return this.filter(function () {
                    for (var t = 0; n > t; t++)if (G.contains(this, e[t]))return !0
                })
            }, closest: function (t, e) {
                for (var n, i = 0, o = this.length, r = [], s = rt.test(t) || "string" != typeof t ? G(t, e || this.context) : 0; o > i; i++)for (n = this[i]; n && n !== e; n = n.parentNode)if (n.nodeType < 11 && (s ? s.index(n) > -1 : 1 === n.nodeType && G.find.matchesSelector(n, t))) {
                    r.push(n);
                    break
                }
                return this.pushStack(r.length > 1 ? G.unique(r) : r)
            }, index: function (t) {
                return t ? "string" == typeof t ? V.call(G(t), this[0]) : V.call(this, t.jquery ? t[0] : t) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
            }, add: function (t, e) {
                return this.pushStack(G.unique(G.merge(this.get(), G(t, e))))
            }, addBack: function (t) {
                return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
            }
        }), G.each({
            parent: function (t) {
                var e = t.parentNode;
                return e && 11 !== e.nodeType ? e : null
            }, parents: function (t) {
                return G.dir(t, "parentNode")
            }, parentsUntil: function (t, e, n) {
                return G.dir(t, "parentNode", n)
            }, next: function (t) {
                return o(t, "nextSibling")
            }, prev: function (t) {
                return o(t, "previousSibling")
            }, nextAll: function (t) {
                return G.dir(t, "nextSibling")
            }, prevAll: function (t) {
                return G.dir(t, "previousSibling")
            }, nextUntil: function (t, e, n) {
                return G.dir(t, "nextSibling", n)
            }, prevUntil: function (t, e, n) {
                return G.dir(t, "previousSibling", n)
            }, siblings: function (t) {
                return G.sibling((t.parentNode || {}).firstChild, t)
            }, children: function (t) {
                return G.sibling(t.firstChild)
            }, contents: function (t) {
                return t.contentDocument || G.merge([], t.childNodes)
            }
        }, function (t, e) {
            G.fn[t] = function (n, i) {
                var o = G.map(this, e, n);
                return "Until" !== t.slice(-5) && (i = n), i && "string" == typeof i && (o = G.filter(i, o)), this.length > 1 && (ht[t] || G.unique(o), pt.test(t) && o.reverse()), this.pushStack(o)
            }
        });
        var dt = /\S+/g, ft = {};
        G.Callbacks = function (t) {
            t = "string" == typeof t ? ft[t] || r(t) : G.extend({}, t);
            var e, n, i, o, s, a, l = [], c = !t.once && [], u = function (r) {
                for (e = t.memory && r, n = !0, a = o || 0, o = 0, s = l.length, i = !0; l && s > a; a++)if (l[a].apply(r[0], r[1]) === !1 && t.stopOnFalse) {
                    e = !1;
                    break
                }
                i = !1, l && (c ? c.length && u(c.shift()) : e ? l = [] : p.disable())
            }, p = {
                add: function () {
                    if (l) {
                        var n = l.length;
                        !function r(e) {
                            G.each(e, function (e, n) {
                                var i = G.type(n);
                                "function" === i ? t.unique && p.has(n) || l.push(n) : n && n.length && "string" !== i && r(n)
                            })
                        }(arguments), i ? s = l.length : e && (o = n, u(e))
                    }
                    return this
                }, remove: function () {
                    return l && G.each(arguments, function (t, e) {
                        for (var n; (n = G.inArray(e, l, n)) > -1;)l.splice(n, 1), i && (s >= n && s--, a >= n && a--)
                    }), this
                }, has: function (t) {
                    return t ? G.inArray(t, l) > -1 : !(!l || !l.length)
                }, empty: function () {
                    return l = [], s = 0, this
                }, disable: function () {
                    return l = c = e = void 0, this
                }, disabled: function () {
                    return !l
                }, lock: function () {
                    return c = void 0, e || p.disable(), this
                }, locked: function () {
                    return !c
                }, fireWith: function (t, e) {
                    return !l || n && !c || (e = e || [], e = [t, e.slice ? e.slice() : e], i ? c.push(e) : u(e)), this
                }, fire: function () {
                    return p.fireWith(this, arguments), this
                }, fired: function () {
                    return !!n
                }
            };
            return p
        }, G.extend({
            Deferred: function (t) {
                var e = [["resolve", "done", G.Callbacks("once memory"), "resolved"], ["reject", "fail", G.Callbacks("once memory"), "rejected"], ["notify", "progress", G.Callbacks("memory")]], n = "pending", i = {
                    state: function () {
                        return n
                    }, always: function () {
                        return o.done(arguments).fail(arguments), this
                    }, then: function () {
                        var t = arguments;
                        return G.Deferred(function (n) {
                            G.each(e, function (e, r) {
                                var s = G.isFunction(t[e]) && t[e];
                                o[r[1]](function () {
                                    var t = s && s.apply(this, arguments);
                                    t && G.isFunction(t.promise) ? t.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[r[0] + "With"](this === i ? n.promise() : this, s ? [t] : arguments)
                                })
                            }), t = null
                        }).promise()
                    }, promise: function (t) {
                        return null != t ? G.extend(t, i) : i
                    }
                }, o = {};
                return i.pipe = i.then, G.each(e, function (t, r) {
                    var s = r[2], a = r[3];
                    i[r[1]] = s.add, a && s.add(function () {
                        n = a
                    }, e[1 ^ t][2].disable, e[2][2].lock), o[r[0]] = function () {
                        return o[r[0] + "With"](this === o ? i : this, arguments), this
                    }, o[r[0] + "With"] = s.fireWith
                }), i.promise(o), t && t.call(o, o), o
            }, when: function (t) {
                var e, n, i, o = 0, r = B.call(arguments), s = r.length, a = 1 !== s || t && G.isFunction(t.promise) ? s : 0, l = 1 === a ? t : G.Deferred(), c = function (t, n, i) {
                    return function (o) {
                        n[t] = this, i[t] = arguments.length > 1 ? B.call(arguments) : o, i === e ? l.notifyWith(n, i) : --a || l.resolveWith(n, i)
                    }
                };
                if (s > 1)for (e = new Array(s), n = new Array(s), i = new Array(s); s > o; o++)r[o] && G.isFunction(r[o].promise) ? r[o].promise().done(c(o, i, r)).fail(l.reject).progress(c(o, n, e)) : --a;
                return a || l.resolveWith(i, r), l.promise()
            }
        });
        var gt;
        G.fn.ready = function (t) {
            return G.ready.promise().done(t), this
        }, G.extend({
            isReady: !1, readyWait: 1, holdReady: function (t) {
                t ? G.readyWait++ : G.ready(!0)
            }, ready: function (t) {
                (t === !0 ? --G.readyWait : G.isReady) || (G.isReady = !0, t !== !0 && --G.readyWait > 0 || (gt.resolveWith(Z, [G]), G.fn.triggerHandler && (G(Z).triggerHandler("ready"), G(Z).off("ready"))))
            }
        }), G.ready.promise = function (e) {
            return gt || (gt = G.Deferred(), "complete" === Z.readyState ? setTimeout(G.ready) : (Z.addEventListener("DOMContentLoaded", s, !1), t.addEventListener("load", s, !1))), gt.promise(e)
        }, G.ready.promise();
        var mt = G.access = function (t, e, n, i, o, r, s) {
            var a = 0, l = t.length, c = null == n;
            if ("object" === G.type(n)) {
                o = !0;
                for (a in n)G.access(t, e, a, n[a], !0, r, s)
            } else if (void 0 !== i && (o = !0, G.isFunction(i) || (s = !0), c && (s ? (e.call(t, i), e = null) : (c = e, e = function (t, e, n) {
                    return c.call(G(t), n)
                })), e))for (; l > a; a++)e(t[a], n, s ? i : i.call(t[a], a, e(t[a], n)));
            return o ? t : c ? e.call(t) : l ? e(t[0], n) : r
        };
        G.acceptData = function (t) {
            return 1 === t.nodeType || 9 === t.nodeType || !+t.nodeType
        }, a.uid = 1, a.accepts = G.acceptData, a.prototype = {
            key: function (t) {
                if (!a.accepts(t))return 0;
                var e = {}, n = t[this.expando];
                if (!n) {
                    n = a.uid++;
                    try {
                        e[this.expando] = {value: n}, Object.defineProperties(t, e)
                    } catch (i) {
                        e[this.expando] = n, G.extend(t, e)
                    }
                }
                return this.cache[n] || (this.cache[n] = {}), n
            }, set: function (t, e, n) {
                var i, o = this.key(t), r = this.cache[o];
                if ("string" == typeof e)r[e] = n; else if (G.isEmptyObject(r))G.extend(this.cache[o], e); else for (i in e)r[i] = e[i];
                return r
            }, get: function (t, e) {
                var n = this.cache[this.key(t)];
                return void 0 === e ? n : n[e]
            }, access: function (t, e, n) {
                var i;
                return void 0 === e || e && "string" == typeof e && void 0 === n ? (i = this.get(t, e), void 0 !== i ? i : this.get(t, G.camelCase(e))) : (this.set(t, e, n), void 0 !== n ? n : e)
            }, remove: function (t, e) {
                var n, i, o, r = this.key(t), s = this.cache[r];
                if (void 0 === e)this.cache[r] = {}; else {
                    G.isArray(e) ? i = e.concat(e.map(G.camelCase)) : (o = G.camelCase(e), e in s ? i = [e, o] : (i = o, i = i in s ? [i] : i.match(dt) || [])), n = i.length;
                    for (; n--;)delete s[i[n]]
                }
            }, hasData: function (t) {
                return !G.isEmptyObject(this.cache[t[this.expando]] || {})
            }, discard: function (t) {
                t[this.expando] && delete this.cache[t[this.expando]]
            }
        };
        var vt = new a, yt = new a, bt = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, xt = /([A-Z])/g;
        G.extend({
            hasData: function (t) {
                return yt.hasData(t) || vt.hasData(t)
            }, data: function (t, e, n) {
                return yt.access(t, e, n)
            }, removeData: function (t, e) {
                yt.remove(t, e)
            }, _data: function (t, e, n) {
                return vt.access(t, e, n)
            }, _removeData: function (t, e) {
                vt.remove(t, e)
            }
        }), G.fn.extend({
            data: function (t, e) {
                var n, i, o, r = this[0], s = r && r.attributes;
                if (void 0 === t) {
                    if (this.length && (o = yt.get(r), 1 === r.nodeType && !vt.get(r, "hasDataAttrs"))) {
                        for (n = s.length; n--;)s[n] && (i = s[n].name, 0 === i.indexOf("data-") && (i = G.camelCase(i.slice(5)), l(r, i, o[i])));
                        vt.set(r, "hasDataAttrs", !0)
                    }
                    return o
                }
                return "object" == typeof t ? this.each(function () {
                    yt.set(this, t)
                }) : mt(this, function (e) {
                    var n, i = G.camelCase(t);
                    if (r && void 0 === e) {
                        if (n = yt.get(r, t), void 0 !== n)return n;
                        if (n = yt.get(r, i), void 0 !== n)return n;
                        if (n = l(r, i, void 0), void 0 !== n)return n
                    } else this.each(function () {
                        var n = yt.get(this, i);
                        yt.set(this, i, e), -1 !== t.indexOf("-") && void 0 !== n && yt.set(this, t, e)
                    })
                }, null, e, arguments.length > 1, null, !0)
            }, removeData: function (t) {
                return this.each(function () {
                    yt.remove(this, t)
                })
            }
        }), G.extend({
            queue: function (t, e, n) {
                var i;
                return t ? (e = (e || "fx") + "queue", i = vt.get(t, e), n && (!i || G.isArray(n) ? i = vt.access(t, e, G.makeArray(n)) : i.push(n)), i || []) : void 0
            }, dequeue: function (t, e) {
                e = e || "fx";
                var n = G.queue(t, e), i = n.length, o = n.shift(), r = G._queueHooks(t, e), s = function () {
                    G.dequeue(t, e)
                };
                "inprogress" === o && (o = n.shift(), i--), o && ("fx" === e && n.unshift("inprogress"), delete r.stop, o.call(t, s, r)), !i && r && r.empty.fire()
            }, _queueHooks: function (t, e) {
                var n = e + "queueHooks";
                return vt.get(t, n) || vt.access(t, n, {
                        empty: G.Callbacks("once memory").add(function () {
                            vt.remove(t, [e + "queue", n])
                        })
                    })
            }
        }), G.fn.extend({
            queue: function (t, e) {
                var n = 2;
                return "string" != typeof t && (e = t, t = "fx", n--), arguments.length < n ? G.queue(this[0], t) : void 0 === e ? this : this.each(function () {
                    var n = G.queue(this, t, e);
                    G._queueHooks(this, t), "fx" === t && "inprogress" !== n[0] && G.dequeue(this, t)
                })
            }, dequeue: function (t) {
                return this.each(function () {
                    G.dequeue(this, t)
                })
            }, clearQueue: function (t) {
                return this.queue(t || "fx", [])
            }, promise: function (t, e) {
                var n, i = 1, o = G.Deferred(), r = this, s = this.length, a = function () {
                    --i || o.resolveWith(r, [r])
                };
                for ("string" != typeof t && (e = t, t = void 0), t = t || "fx"; s--;)n = vt.get(r[s], t + "queueHooks"), n && n.empty && (i++, n.empty.add(a));
                return a(), o.promise(e)
            }
        });
        var wt = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, Tt = ["Top", "Right", "Bottom", "Left"], Ct = function (t, e) {
            return t = e || t, "none" === G.css(t, "display") || !G.contains(t.ownerDocument, t)
        }, kt = /^(?:checkbox|radio)$/i;
        !function () {
            var t = Z.createDocumentFragment(), e = t.appendChild(Z.createElement("div")), n = Z.createElement("input");
            n.setAttribute("type", "radio"), n.setAttribute("checked", "checked"), n.setAttribute("name", "t"), e.appendChild(n), Y.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked, e.innerHTML = "<textarea>x</textarea>", Y.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue
        }();
        var $t = "undefined";
        Y.focusinBubbles = "onfocusin"in t;
        var Et = /^key/, St = /^(?:mouse|pointer|contextmenu)|click/, Dt = /^(?:focusinfocus|focusoutblur)$/, Nt = /^([^.]*)(?:\.(.+)|)$/;
        G.event = {
            global: {},
            add: function (t, e, n, i, o) {
                var r, s, a, l, c, u, p, h, d, f, g, m = vt.get(t);
                if (m)for (n.handler && (r = n, n = r.handler, o = r.selector), n.guid || (n.guid = G.guid++), (l = m.events) || (l = m.events = {}), (s = m.handle) || (s = m.handle = function (e) {
                    return typeof G !== $t && G.event.triggered !== e.type ? G.event.dispatch.apply(t, arguments) : void 0
                }), e = (e || "").match(dt) || [""], c = e.length; c--;)a = Nt.exec(e[c]) || [], d = g = a[1], f = (a[2] || "").split(".").sort(), d && (p = G.event.special[d] || {}, d = (o ? p.delegateType : p.bindType) || d, p = G.event.special[d] || {}, u = G.extend({
                    type: d,
                    origType: g,
                    data: i,
                    handler: n,
                    guid: n.guid,
                    selector: o,
                    needsContext: o && G.expr.match.needsContext.test(o),
                    namespace: f.join(".")
                }, r), (h = l[d]) || (h = l[d] = [], h.delegateCount = 0, p.setup && p.setup.call(t, i, f, s) !== !1 || t.addEventListener && t.addEventListener(d, s, !1)), p.add && (p.add.call(t, u), u.handler.guid || (u.handler.guid = n.guid)), o ? h.splice(h.delegateCount++, 0, u) : h.push(u), G.event.global[d] = !0)
            },
            remove: function (t, e, n, i, o) {
                var r, s, a, l, c, u, p, h, d, f, g, m = vt.hasData(t) && vt.get(t);
                if (m && (l = m.events)) {
                    for (e = (e || "").match(dt) || [""], c = e.length; c--;)if (a = Nt.exec(e[c]) || [], d = g = a[1], f = (a[2] || "").split(".").sort(), d) {
                        for (p = G.event.special[d] || {}, d = (i ? p.delegateType : p.bindType) || d, h = l[d] || [], a = a[2] && new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)"), s = r = h.length; r--;)u = h[r], !o && g !== u.origType || n && n.guid !== u.guid || a && !a.test(u.namespace) || i && i !== u.selector && ("**" !== i || !u.selector) || (h.splice(r, 1), u.selector && h.delegateCount--, p.remove && p.remove.call(t, u));
                        s && !h.length && (p.teardown && p.teardown.call(t, f, m.handle) !== !1 || G.removeEvent(t, d, m.handle), delete l[d])
                    } else for (d in l)G.event.remove(t, d + e[c], n, i, !0);
                    G.isEmptyObject(l) && (delete m.handle, vt.remove(t, "events"))
                }
            },
            trigger: function (e, n, i, o) {
                var r, s, a, l, c, u, p, h = [i || Z], d = K.call(e, "type") ? e.type : e, f = K.call(e, "namespace") ? e.namespace.split(".") : [];
                if (s = a = i = i || Z, 3 !== i.nodeType && 8 !== i.nodeType && !Dt.test(d + G.event.triggered) && (d.indexOf(".") >= 0 && (f = d.split("."), d = f.shift(), f.sort()), c = d.indexOf(":") < 0 && "on" + d, e = e[G.expando] ? e : new G.Event(d, "object" == typeof e && e), e.isTrigger = o ? 2 : 3, e.namespace = f.join("."), e.namespace_re = e.namespace ? new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e.target = i), n = null == n ? [e] : G.makeArray(n, [e]), p = G.event.special[d] || {}, o || !p.trigger || p.trigger.apply(i, n) !== !1)) {
                    if (!o && !p.noBubble && !G.isWindow(i)) {
                        for (l = p.delegateType || d, Dt.test(l + d) || (s = s.parentNode); s; s = s.parentNode)h.push(s), a = s;
                        a === (i.ownerDocument || Z) && h.push(a.defaultView || a.parentWindow || t)
                    }
                    for (r = 0; (s = h[r++]) && !e.isPropagationStopped();)e.type = r > 1 ? l : p.bindType || d, u = (vt.get(s, "events") || {})[e.type] && vt.get(s, "handle"), u && u.apply(s, n), u = c && s[c], u && u.apply && G.acceptData(s) && (e.result = u.apply(s, n), e.result === !1 && e.preventDefault());
                    return e.type = d, o || e.isDefaultPrevented() || p._default && p._default.apply(h.pop(), n) !== !1 || !G.acceptData(i) || c && G.isFunction(i[d]) && !G.isWindow(i) && (a = i[c], a && (i[c] = null), G.event.triggered = d, i[d](), G.event.triggered = void 0, a && (i[c] = a)), e.result
                }
            },
            dispatch: function (t) {
                t = G.event.fix(t);
                var e, n, i, o, r, s = [], a = B.call(arguments), l = (vt.get(this, "events") || {})[t.type] || [], c = G.event.special[t.type] || {};
                if (a[0] = t, t.delegateTarget = this, !c.preDispatch || c.preDispatch.call(this, t) !== !1) {
                    for (s = G.event.handlers.call(this, t, l), e = 0; (o = s[e++]) && !t.isPropagationStopped();)for (t.currentTarget = o.elem, n = 0; (r = o.handlers[n++]) && !t.isImmediatePropagationStopped();)(!t.namespace_re || t.namespace_re.test(r.namespace)) && (t.handleObj = r, t.data = r.data, i = ((G.event.special[r.origType] || {}).handle || r.handler).apply(o.elem, a), void 0 !== i && (t.result = i) === !1 && (t.preventDefault(), t.stopPropagation()));
                    return c.postDispatch && c.postDispatch.call(this, t), t.result
                }
            },
            handlers: function (t, e) {
                var n, i, o, r, s = [], a = e.delegateCount, l = t.target;
                if (a && l.nodeType && (!t.button || "click" !== t.type))for (; l !== this; l = l.parentNode || this)if (l.disabled !== !0 || "click" !== t.type) {
                    for (i = [], n = 0; a > n; n++)r = e[n], o = r.selector + " ", void 0 === i[o] && (i[o] = r.needsContext ? G(o, this).index(l) >= 0 : G.find(o, this, null, [l]).length), i[o] && i.push(r);
                    i.length && s.push({elem: l, handlers: i})
                }
                return a < e.length && s.push({elem: this, handlers: e.slice(a)}), s
            },
            props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
            fixHooks: {},
            keyHooks: {
                props: "char charCode key keyCode".split(" "), filter: function (t, e) {
                    return null == t.which && (t.which = null != e.charCode ? e.charCode : e.keyCode), t
                }
            },
            mouseHooks: {
                props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                filter: function (t, e) {
                    var n, i, o, r = e.button;
                    return null == t.pageX && null != e.clientX && (n = t.target.ownerDocument || Z, i = n.documentElement, o = n.body, t.pageX = e.clientX + (i && i.scrollLeft || o && o.scrollLeft || 0) - (i && i.clientLeft || o && o.clientLeft || 0), t.pageY = e.clientY + (i && i.scrollTop || o && o.scrollTop || 0) - (i && i.clientTop || o && o.clientTop || 0)), t.which || void 0 === r || (t.which = 1 & r ? 1 : 2 & r ? 3 : 4 & r ? 2 : 0), t
                }
            },
            fix: function (t) {
                if (t[G.expando])return t;
                var e, n, i, o = t.type, r = t, s = this.fixHooks[o];
                for (s || (this.fixHooks[o] = s = St.test(o) ? this.mouseHooks : Et.test(o) ? this.keyHooks : {}), i = s.props ? this.props.concat(s.props) : this.props, t = new G.Event(r), e = i.length; e--;)n = i[e], t[n] = r[n];
                return t.target || (t.target = Z), 3 === t.target.nodeType && (t.target = t.target.parentNode), s.filter ? s.filter(t, r) : t
            },
            special: {
                load: {noBubble: !0}, focus: {
                    trigger: function () {
                        return this !== p() && this.focus ? (this.focus(), !1) : void 0
                    }, delegateType: "focusin"
                }, blur: {
                    trigger: function () {
                        return this === p() && this.blur ? (this.blur(), !1) : void 0
                    }, delegateType: "focusout"
                }, click: {
                    trigger: function () {
                        return "checkbox" === this.type && this.click && G.nodeName(this, "input") ? (this.click(), !1) : void 0
                    }, _default: function (t) {
                        return G.nodeName(t.target, "a")
                    }
                }, beforeunload: {
                    postDispatch: function (t) {
                        void 0 !== t.result && t.originalEvent && (t.originalEvent.returnValue = t.result)
                    }
                }
            },
            simulate: function (t, e, n, i) {
                var o = G.extend(new G.Event, n, {type: t, isSimulated: !0, originalEvent: {}});
                i ? G.event.trigger(o, null, e) : G.event.dispatch.call(e, o), o.isDefaultPrevented() && n.preventDefault()
            }
        }, G.removeEvent = function (t, e, n) {
            t.removeEventListener && t.removeEventListener(e, n, !1)
        }, G.Event = function (t, e) {
            return this instanceof G.Event ? (t && t.type ? (this.originalEvent = t, this.type = t.type, this.isDefaultPrevented = t.defaultPrevented || void 0 === t.defaultPrevented && t.returnValue === !1 ? c : u) : this.type = t, e && G.extend(this, e), this.timeStamp = t && t.timeStamp || G.now(), void(this[G.expando] = !0)) : new G.Event(t, e)
        }, G.Event.prototype = {
            isDefaultPrevented: u,
            isPropagationStopped: u,
            isImmediatePropagationStopped: u,
            preventDefault: function () {
                var t = this.originalEvent;
                this.isDefaultPrevented = c, t && t.preventDefault && t.preventDefault()
            },
            stopPropagation: function () {
                var t = this.originalEvent;
                this.isPropagationStopped = c, t && t.stopPropagation && t.stopPropagation()
            },
            stopImmediatePropagation: function () {
                var t = this.originalEvent;
                this.isImmediatePropagationStopped = c, t && t.stopImmediatePropagation && t.stopImmediatePropagation(), this.stopPropagation()
            }
        }, G.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout",
            pointerenter: "pointerover",
            pointerleave: "pointerout"
        }, function (t, e) {
            G.event.special[t] = {
                delegateType: e, bindType: e, handle: function (t) {
                    var n, i = this, o = t.relatedTarget, r = t.handleObj;
                    return (!o || o !== i && !G.contains(i, o)) && (t.type = r.origType, n = r.handler.apply(this, arguments), t.type = e), n
                }
            }
        }), Y.focusinBubbles || G.each({focus: "focusin", blur: "focusout"}, function (t, e) {
            var n = function (t) {
                G.event.simulate(e, t.target, G.event.fix(t), !0)
            };
            G.event.special[e] = {
                setup: function () {
                    var i = this.ownerDocument || this, o = vt.access(i, e);
                    o || i.addEventListener(t, n, !0), vt.access(i, e, (o || 0) + 1)
                }, teardown: function () {
                    var i = this.ownerDocument || this, o = vt.access(i, e) - 1;
                    o ? vt.access(i, e, o) : (i.removeEventListener(t, n, !0), vt.remove(i, e))
                }
            }
        }), G.fn.extend({
            on: function (t, e, n, i, o) {
                var r, s;
                if ("object" == typeof t) {
                    "string" != typeof e && (n = n || e, e = void 0);
                    for (s in t)this.on(s, e, n, t[s], o);
                    return this
                }
                if (null == n && null == i ? (i = e, n = e = void 0) : null == i && ("string" == typeof e ? (i = n, n = void 0) : (i = n, n = e, e = void 0)), i === !1)i = u; else if (!i)return this;
                return 1 === o && (r = i, i = function (t) {
                    return G().off(t), r.apply(this, arguments)
                }, i.guid = r.guid || (r.guid = G.guid++)), this.each(function () {
                    G.event.add(this, t, i, n, e)
                })
            }, one: function (t, e, n, i) {
                return this.on(t, e, n, i, 1)
            }, off: function (t, e, n) {
                var i, o;
                if (t && t.preventDefault && t.handleObj)return i = t.handleObj, G(t.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                if ("object" == typeof t) {
                    for (o in t)this.off(o, e, t[o]);
                    return this
                }
                return (e === !1 || "function" == typeof e) && (n = e, e = void 0), n === !1 && (n = u), this.each(function () {
                    G.event.remove(this, t, n, e)
                })
            }, trigger: function (t, e) {
                return this.each(function () {
                    G.event.trigger(t, e, this)
                })
            }, triggerHandler: function (t, e) {
                var n = this[0];
                return n ? G.event.trigger(t, e, n, !0) : void 0
            }
        });
        var At = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi, jt = /<([\w:]+)/, Ot = /<|&#?\w+;/, Lt = /<(?:script|style|link)/i, It = /checked\s*(?:[^=]|=\s*.checked.)/i, Rt = /^$|\/(?:java|ecma)script/i, Pt = /^true\/(.*)/, Ht = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g, Ft = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""]
        };
        Ft.optgroup = Ft.option, Ft.tbody = Ft.tfoot = Ft.colgroup = Ft.caption = Ft.thead, Ft.th = Ft.td, G.extend({
            clone: function (t, e, n) {
                var i, o, r, s, a = t.cloneNode(!0), l = G.contains(t.ownerDocument, t);
                if (!(Y.noCloneChecked || 1 !== t.nodeType && 11 !== t.nodeType || G.isXMLDoc(t)))for (s = v(a), r = v(t), i = 0, o = r.length; o > i; i++)y(r[i], s[i]);
                if (e)if (n)for (r = r || v(t), s = s || v(a), i = 0, o = r.length; o > i; i++)m(r[i], s[i]); else m(t, a);
                return s = v(a, "script"), s.length > 0 && g(s, !l && v(t, "script")), a
            }, buildFragment: function (t, e, n, i) {
                for (var o, r, s, a, l, c, u = e.createDocumentFragment(), p = [], h = 0, d = t.length; d > h; h++)if (o = t[h], o || 0 === o)if ("object" === G.type(o))G.merge(p, o.nodeType ? [o] : o); else if (Ot.test(o)) {
                    for (r = r || u.appendChild(e.createElement("div")), s = (jt.exec(o) || ["", ""])[1].toLowerCase(), a = Ft[s] || Ft._default, r.innerHTML = a[1] + o.replace(At, "<$1></$2>") + a[2], c = a[0]; c--;)r = r.lastChild;
                    G.merge(p, r.childNodes), r = u.firstChild, r.textContent = ""
                } else p.push(e.createTextNode(o));
                for (u.textContent = "", h = 0; o = p[h++];)if ((!i || -1 === G.inArray(o, i)) && (l = G.contains(o.ownerDocument, o), r = v(u.appendChild(o), "script"), l && g(r), n))for (c = 0; o = r[c++];)Rt.test(o.type || "") && n.push(o);
                return u
            }, cleanData: function (t) {
                for (var e, n, i, o, r = G.event.special, s = 0; void 0 !== (n = t[s]); s++) {
                    if (G.acceptData(n) && (o = n[vt.expando], o && (e = vt.cache[o]))) {
                        if (e.events)for (i in e.events)r[i] ? G.event.remove(n, i) : G.removeEvent(n, i, e.handle);
                        vt.cache[o] && delete vt.cache[o]
                    }
                    delete yt.cache[n[yt.expando]]
                }
            }
        }), G.fn.extend({
            text: function (t) {
                return mt(this, function (t) {
                    return void 0 === t ? G.text(this) : this.empty().each(function () {
                        (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) && (this.textContent = t)
                    })
                }, null, t, arguments.length)
            }, append: function () {
                return this.domManip(arguments, function (t) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var e = h(this, t);
                        e.appendChild(t)
                    }
                })
            }, prepend: function () {
                return this.domManip(arguments, function (t) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var e = h(this, t);
                        e.insertBefore(t, e.firstChild)
                    }
                })
            }, before: function () {
                return this.domManip(arguments, function (t) {
                    this.parentNode && this.parentNode.insertBefore(t, this)
                })
            }, after: function () {
                return this.domManip(arguments, function (t) {
                    this.parentNode && this.parentNode.insertBefore(t, this.nextSibling)
                })
            }, remove: function (t, e) {
                for (var n, i = t ? G.filter(t, this) : this, o = 0; null != (n = i[o]); o++)e || 1 !== n.nodeType || G.cleanData(v(n)), n.parentNode && (e && G.contains(n.ownerDocument, n) && g(v(n, "script")), n.parentNode.removeChild(n));
                return this
            }, empty: function () {
                for (var t, e = 0; null != (t = this[e]); e++)1 === t.nodeType && (G.cleanData(v(t, !1)), t.textContent = "");
                return this
            }, clone: function (t, e) {
                return t = null == t ? !1 : t, e = null == e ? t : e, this.map(function () {
                    return G.clone(this, t, e)
                })
            }, html: function (t) {
                return mt(this, function (t) {
                    var e = this[0] || {}, n = 0, i = this.length;
                    if (void 0 === t && 1 === e.nodeType)return e.innerHTML;
                    if ("string" == typeof t && !Lt.test(t) && !Ft[(jt.exec(t) || ["", ""])[1].toLowerCase()]) {
                        t = t.replace(At, "<$1></$2>");
                        try {
                            for (; i > n; n++)e = this[n] || {}, 1 === e.nodeType && (G.cleanData(v(e, !1)), e.innerHTML = t);
                            e = 0
                        } catch (o) {
                        }
                    }
                    e && this.empty().append(t)
                }, null, t, arguments.length)
            }, replaceWith: function () {
                var t = arguments[0];
                return this.domManip(arguments, function (e) {
                    t = this.parentNode, G.cleanData(v(this)), t && t.replaceChild(e, this)
                }), t && (t.length || t.nodeType) ? this : this.remove()
            }, detach: function (t) {
                return this.remove(t, !0)
            }, domManip: function (t, e) {
                t = U.apply([], t);
                var n, i, o, r, s, a, l = 0, c = this.length, u = this, p = c - 1, h = t[0], g = G.isFunction(h);
                if (g || c > 1 && "string" == typeof h && !Y.checkClone && It.test(h))return this.each(function (n) {
                    var i = u.eq(n);
                    g && (t[0] = h.call(this, n, i.html())), i.domManip(t, e)
                });
                if (c && (n = G.buildFragment(t, this[0].ownerDocument, !1, this), i = n.firstChild, 1 === n.childNodes.length && (n = i), i)) {
                    for (o = G.map(v(n, "script"), d), r = o.length; c > l; l++)s = n, l !== p && (s = G.clone(s, !0, !0), r && G.merge(o, v(s, "script"))), e.call(this[l], s, l);
                    if (r)for (a = o[o.length - 1].ownerDocument, G.map(o, f), l = 0; r > l; l++)s = o[l], Rt.test(s.type || "") && !vt.access(s, "globalEval") && G.contains(a, s) && (s.src ? G._evalUrl && G._evalUrl(s.src) : G.globalEval(s.textContent.replace(Ht, "")))
                }
                return this
            }
        }), G.each({
            appendTo: "append",
            prependTo: "prepend",
            insertBefore: "before",
            insertAfter: "after",
            replaceAll: "replaceWith"
        }, function (t, e) {
            G.fn[t] = function (t) {
                for (var n, i = [], o = G(t), r = o.length - 1, s = 0; r >= s; s++)n = s === r ? this : this.clone(!0), G(o[s])[e](n), z.apply(i, n.get());
                return this.pushStack(i)
            }
        });
        var Wt, Mt = {}, qt = /^margin/, _t = new RegExp("^(" + wt + ")(?!px)[a-z%]+$", "i"), Bt = function (e) {
            return e.ownerDocument.defaultView.opener ? e.ownerDocument.defaultView.getComputedStyle(e, null) : t.getComputedStyle(e, null)
        };
        !function () {
            function e() {
                s.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute", s.innerHTML = "", o.appendChild(r);
                var e = t.getComputedStyle(s, null);
                n = "1%" !== e.top, i = "4px" === e.width, o.removeChild(r)
            }

            var n, i, o = Z.documentElement, r = Z.createElement("div"), s = Z.createElement("div");
            s.style && (s.style.backgroundClip = "content-box", s.cloneNode(!0).style.backgroundClip = "", Y.clearCloneStyle = "content-box" === s.style.backgroundClip, r.style.cssText = "border:0;width:0;height:0;top:0;left:-9999px;margin-top:1px;position:absolute", r.appendChild(s), t.getComputedStyle && G.extend(Y, {
                pixelPosition: function () {
                    return e(), n
                }, boxSizingReliable: function () {
                    return null == i && e(), i
                }, reliableMarginRight: function () {
                    var e, n = s.appendChild(Z.createElement("div"));
                    return n.style.cssText = s.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", n.style.marginRight = n.style.width = "0", s.style.width = "1px", o.appendChild(r), e = !parseFloat(t.getComputedStyle(n, null).marginRight), o.removeChild(r), s.removeChild(n), e
                }
            }))
        }(), G.swap = function (t, e, n, i) {
            var o, r, s = {};
            for (r in e)s[r] = t.style[r], t.style[r] = e[r];
            o = n.apply(t, i || []);
            for (r in e)t.style[r] = s[r];
            return o
        };
        var Ut = /^(none|table(?!-c[ea]).+)/, zt = new RegExp("^(" + wt + ")(.*)$", "i"), Vt = new RegExp("^([+-])=(" + wt + ")", "i"), Qt = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        }, Xt = {letterSpacing: "0", fontWeight: "400"}, Kt = ["Webkit", "O", "Moz", "ms"];
        G.extend({
            cssHooks: {
                opacity: {
                    get: function (t, e) {
                        if (e) {
                            var n = w(t, "opacity");
                            return "" === n ? "1" : n
                        }
                    }
                }
            },
            cssNumber: {
                columnCount: !0,
                fillOpacity: !0,
                flexGrow: !0,
                flexShrink: !0,
                fontWeight: !0,
                lineHeight: !0,
                opacity: !0,
                order: !0,
                orphans: !0,
                widows: !0,
                zIndex: !0,
                zoom: !0
            },
            cssProps: {"float": "cssFloat"},
            style: function (t, e, n, i) {
                if (t && 3 !== t.nodeType && 8 !== t.nodeType && t.style) {
                    var o, r, s, a = G.camelCase(e), l = t.style;
                    return e = G.cssProps[a] || (G.cssProps[a] = C(l, a)), s = G.cssHooks[e] || G.cssHooks[a], void 0 === n ? s && "get"in s && void 0 !== (o = s.get(t, !1, i)) ? o : l[e] : (r = typeof n, "string" === r && (o = Vt.exec(n)) && (n = (o[1] + 1) * o[2] + parseFloat(G.css(t, e)), r = "number"), void(null != n && n === n && ("number" !== r || G.cssNumber[a] || (n += "px"), Y.clearCloneStyle || "" !== n || 0 !== e.indexOf("background") || (l[e] = "inherit"), s && "set"in s && void 0 === (n = s.set(t, n, i)) || (l[e] = n))))
                }
            },
            css: function (t, e, n, i) {
                var o, r, s, a = G.camelCase(e);
                return e = G.cssProps[a] || (G.cssProps[a] = C(t.style, a)), s = G.cssHooks[e] || G.cssHooks[a], s && "get"in s && (o = s.get(t, !0, n)), void 0 === o && (o = w(t, e, i)), "normal" === o && e in Xt && (o = Xt[e]), "" === n || n ? (r = parseFloat(o), n === !0 || G.isNumeric(r) ? r || 0 : o) : o
            }
        }), G.each(["height", "width"], function (t, e) {
            G.cssHooks[e] = {
                get: function (t, n, i) {
                    return n ? Ut.test(G.css(t, "display")) && 0 === t.offsetWidth ? G.swap(t, Qt, function () {
                        return E(t, e, i)
                    }) : E(t, e, i) : void 0
                }, set: function (t, n, i) {
                    var o = i && Bt(t);
                    return k(t, n, i ? $(t, e, i, "border-box" === G.css(t, "boxSizing", !1, o), o) : 0)
                }
            }
        }), G.cssHooks.marginRight = T(Y.reliableMarginRight, function (t, e) {
            return e ? G.swap(t, {display: "inline-block"}, w, [t, "marginRight"]) : void 0
        }), G.each({margin: "", padding: "", border: "Width"}, function (t, e) {
            G.cssHooks[t + e] = {
                expand: function (n) {
                    for (var i = 0, o = {}, r = "string" == typeof n ? n.split(" ") : [n]; 4 > i; i++)o[t + Tt[i] + e] = r[i] || r[i - 2] || r[0];
                    return o
                }
            }, qt.test(t) || (G.cssHooks[t + e].set = k)
        }), G.fn.extend({
            css: function (t, e) {
                return mt(this, function (t, e, n) {
                    var i, o, r = {}, s = 0;
                    if (G.isArray(e)) {
                        for (i = Bt(t), o = e.length; o > s; s++)r[e[s]] = G.css(t, e[s], !1, i);
                        return r
                    }
                    return void 0 !== n ? G.style(t, e, n) : G.css(t, e)
                }, t, e, arguments.length > 1)
            }, show: function () {
                return S(this, !0)
            }, hide: function () {
                return S(this)
            }, toggle: function (t) {
                return "boolean" == typeof t ? t ? this.show() : this.hide() : this.each(function () {
                    Ct(this) ? G(this).show() : G(this).hide()
                })
            }
        }), G.Tween = D, D.prototype = {
            constructor: D, init: function (t, e, n, i, o, r) {
                this.elem = t, this.prop = n, this.easing = o || "swing", this.options = e, this.start = this.now = this.cur(), this.end = i, this.unit = r || (G.cssNumber[n] ? "" : "px")
            }, cur: function () {
                var t = D.propHooks[this.prop];
                return t && t.get ? t.get(this) : D.propHooks._default.get(this)
            }, run: function (t) {
                var e, n = D.propHooks[this.prop];
                return this.options.duration ? this.pos = e = G.easing[this.easing](t, this.options.duration * t, 0, 1, this.options.duration) : this.pos = e = t, this.now = (this.end - this.start) * e + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : D.propHooks._default.set(this), this
            }
        }, D.prototype.init.prototype = D.prototype, D.propHooks = {
            _default: {
                get: function (t) {
                    var e;
                    return null == t.elem[t.prop] || t.elem.style && null != t.elem.style[t.prop] ? (e = G.css(t.elem, t.prop, ""), e && "auto" !== e ? e : 0) : t.elem[t.prop]
                }, set: function (t) {
                    G.fx.step[t.prop] ? G.fx.step[t.prop](t) : t.elem.style && (null != t.elem.style[G.cssProps[t.prop]] || G.cssHooks[t.prop]) ? G.style(t.elem, t.prop, t.now + t.unit) : t.elem[t.prop] = t.now
                }
            }
        }, D.propHooks.scrollTop = D.propHooks.scrollLeft = {
            set: function (t) {
                t.elem.nodeType && t.elem.parentNode && (t.elem[t.prop] = t.now)
            }
        }, G.easing = {
            linear: function (t) {
                return t
            }, swing: function (t) {
                return .5 - Math.cos(t * Math.PI) / 2
            }
        }, G.fx = D.prototype.init, G.fx.step = {};
        var Yt, Zt, Jt = /^(?:toggle|show|hide)$/, Gt = new RegExp("^(?:([+-])=|)(" + wt + ")([a-z%]*)$", "i"), te = /queueHooks$/, ee = [O], ne = {
            "*": [function (t, e) {
                var n = this.createTween(t, e), i = n.cur(), o = Gt.exec(e), r = o && o[3] || (G.cssNumber[t] ? "" : "px"), s = (G.cssNumber[t] || "px" !== r && +i) && Gt.exec(G.css(n.elem, t)), a = 1, l = 20;
                if (s && s[3] !== r) {
                    r = r || s[3], o = o || [], s = +i || 1;
                    do a = a || ".5", s /= a, G.style(n.elem, t, s + r); while (a !== (a = n.cur() / i) && 1 !== a && --l)
                }
                return o && (s = n.start = +s || +i || 0, n.unit = r, n.end = o[1] ? s + (o[1] + 1) * o[2] : +o[2]), n
            }]
        };
        G.Animation = G.extend(I, {
            tweener: function (t, e) {
                G.isFunction(t) ? (e = t, t = ["*"]) : t = t.split(" ");
                for (var n, i = 0, o = t.length; o > i; i++)n = t[i], ne[n] = ne[n] || [], ne[n].unshift(e)
            }, prefilter: function (t, e) {
                e ? ee.unshift(t) : ee.push(t)
            }
        }), G.speed = function (t, e, n) {
            var i = t && "object" == typeof t ? G.extend({}, t) : {
                complete: n || !n && e || G.isFunction(t) && t,
                duration: t,
                easing: n && e || e && !G.isFunction(e) && e
            };
            return i.duration = G.fx.off ? 0 : "number" == typeof i.duration ? i.duration : i.duration in G.fx.speeds ? G.fx.speeds[i.duration] : G.fx.speeds._default, (null == i.queue || i.queue === !0) && (i.queue = "fx"), i.old = i.complete, i.complete = function () {
                G.isFunction(i.old) && i.old.call(this), i.queue && G.dequeue(this, i.queue)
            }, i
        }, G.fn.extend({
            fadeTo: function (t, e, n, i) {
                return this.filter(Ct).css("opacity", 0).show().end().animate({opacity: e}, t, n, i)
            }, animate: function (t, e, n, i) {
                var o = G.isEmptyObject(t), r = G.speed(e, n, i), s = function () {
                    var e = I(this, G.extend({}, t), r);
                    (o || vt.get(this, "finish")) && e.stop(!0)
                };
                return s.finish = s, o || r.queue === !1 ? this.each(s) : this.queue(r.queue, s)
            }, stop: function (t, e, n) {
                var i = function (t) {
                    var e = t.stop;
                    delete t.stop, e(n)
                };
                return "string" != typeof t && (n = e, e = t, t = void 0), e && t !== !1 && this.queue(t || "fx", []), this.each(function () {
                    var e = !0, o = null != t && t + "queueHooks", r = G.timers, s = vt.get(this);
                    if (o)s[o] && s[o].stop && i(s[o]); else for (o in s)s[o] && s[o].stop && te.test(o) && i(s[o]);
                    for (o = r.length; o--;)r[o].elem !== this || null != t && r[o].queue !== t || (r[o].anim.stop(n), e = !1, r.splice(o, 1));
                    (e || !n) && G.dequeue(this, t)
                })
            }, finish: function (t) {
                return t !== !1 && (t = t || "fx"), this.each(function () {
                    var e, n = vt.get(this), i = n[t + "queue"], o = n[t + "queueHooks"], r = G.timers, s = i ? i.length : 0;
                    for (n.finish = !0, G.queue(this, t, []),
                         o && o.stop && o.stop.call(this, !0), e = r.length; e--;)r[e].elem === this && r[e].queue === t && (r[e].anim.stop(!0), r.splice(e, 1));
                    for (e = 0; s > e; e++)i[e] && i[e].finish && i[e].finish.call(this);
                    delete n.finish
                })
            }
        }), G.each(["toggle", "show", "hide"], function (t, e) {
            var n = G.fn[e];
            G.fn[e] = function (t, i, o) {
                return null == t || "boolean" == typeof t ? n.apply(this, arguments) : this.animate(A(e, !0), t, i, o)
            }
        }), G.each({
            slideDown: A("show"),
            slideUp: A("hide"),
            slideToggle: A("toggle"),
            fadeIn: {opacity: "show"},
            fadeOut: {opacity: "hide"},
            fadeToggle: {opacity: "toggle"}
        }, function (t, e) {
            G.fn[t] = function (t, n, i) {
                return this.animate(e, t, n, i)
            }
        }), G.timers = [], G.fx.tick = function () {
            var t, e = 0, n = G.timers;
            for (Yt = G.now(); e < n.length; e++)t = n[e], t() || n[e] !== t || n.splice(e--, 1);
            n.length || G.fx.stop(), Yt = void 0
        }, G.fx.timer = function (t) {
            G.timers.push(t), t() ? G.fx.start() : G.timers.pop()
        }, G.fx.interval = 13, G.fx.start = function () {
            Zt || (Zt = setInterval(G.fx.tick, G.fx.interval))
        }, G.fx.stop = function () {
            clearInterval(Zt), Zt = null
        }, G.fx.speeds = {slow: 600, fast: 200, _default: 400}, G.fn.delay = function (t, e) {
            return t = G.fx ? G.fx.speeds[t] || t : t, e = e || "fx", this.queue(e, function (e, n) {
                var i = setTimeout(e, t);
                n.stop = function () {
                    clearTimeout(i)
                }
            })
        }, function () {
            var t = Z.createElement("input"), e = Z.createElement("select"), n = e.appendChild(Z.createElement("option"));
            t.type = "checkbox", Y.checkOn = "" !== t.value, Y.optSelected = n.selected, e.disabled = !0, Y.optDisabled = !n.disabled, t = Z.createElement("input"), t.value = "t", t.type = "radio", Y.radioValue = "t" === t.value
        }();
        var ie, oe, re = G.expr.attrHandle;
        G.fn.extend({
            attr: function (t, e) {
                return mt(this, G.attr, t, e, arguments.length > 1)
            }, removeAttr: function (t) {
                return this.each(function () {
                    G.removeAttr(this, t)
                })
            }
        }), G.extend({
            attr: function (t, e, n) {
                var i, o, r = t.nodeType;
                return t && 3 !== r && 8 !== r && 2 !== r ? typeof t.getAttribute === $t ? G.prop(t, e, n) : (1 === r && G.isXMLDoc(t) || (e = e.toLowerCase(), i = G.attrHooks[e] || (G.expr.match.bool.test(e) ? oe : ie)), void 0 === n ? i && "get"in i && null !== (o = i.get(t, e)) ? o : (o = G.find.attr(t, e), null == o ? void 0 : o) : null !== n ? i && "set"in i && void 0 !== (o = i.set(t, n, e)) ? o : (t.setAttribute(e, n + ""), n) : void G.removeAttr(t, e)) : void 0
            }, removeAttr: function (t, e) {
                var n, i, o = 0, r = e && e.match(dt);
                if (r && 1 === t.nodeType)for (; n = r[o++];)i = G.propFix[n] || n, G.expr.match.bool.test(n) && (t[i] = !1), t.removeAttribute(n)
            }, attrHooks: {
                type: {
                    set: function (t, e) {
                        if (!Y.radioValue && "radio" === e && G.nodeName(t, "input")) {
                            var n = t.value;
                            return t.setAttribute("type", e), n && (t.value = n), e
                        }
                    }
                }
            }
        }), oe = {
            set: function (t, e, n) {
                return e === !1 ? G.removeAttr(t, n) : t.setAttribute(n, n), n
            }
        }, G.each(G.expr.match.bool.source.match(/\w+/g), function (t, e) {
            var n = re[e] || G.find.attr;
            re[e] = function (t, e, i) {
                var o, r;
                return i || (r = re[e], re[e] = o, o = null != n(t, e, i) ? e.toLowerCase() : null, re[e] = r), o
            }
        });
        var se = /^(?:input|select|textarea|button)$/i;
        G.fn.extend({
            prop: function (t, e) {
                return mt(this, G.prop, t, e, arguments.length > 1)
            }, removeProp: function (t) {
                return this.each(function () {
                    delete this[G.propFix[t] || t]
                })
            }
        }), G.extend({
            propFix: {"for": "htmlFor", "class": "className"}, prop: function (t, e, n) {
                var i, o, r, s = t.nodeType;
                return t && 3 !== s && 8 !== s && 2 !== s ? (r = 1 !== s || !G.isXMLDoc(t), r && (e = G.propFix[e] || e, o = G.propHooks[e]), void 0 !== n ? o && "set"in o && void 0 !== (i = o.set(t, n, e)) ? i : t[e] = n : o && "get"in o && null !== (i = o.get(t, e)) ? i : t[e]) : void 0
            }, propHooks: {
                tabIndex: {
                    get: function (t) {
                        return t.hasAttribute("tabindex") || se.test(t.nodeName) || t.href ? t.tabIndex : -1
                    }
                }
            }
        }), Y.optSelected || (G.propHooks.selected = {
            get: function (t) {
                var e = t.parentNode;
                return e && e.parentNode && e.parentNode.selectedIndex, null
            }
        }), G.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
            G.propFix[this.toLowerCase()] = this
        });
        var ae = /[\t\r\n\f]/g;
        G.fn.extend({
            addClass: function (t) {
                var e, n, i, o, r, s, a = "string" == typeof t && t, l = 0, c = this.length;
                if (G.isFunction(t))return this.each(function (e) {
                    G(this).addClass(t.call(this, e, this.className))
                });
                if (a)for (e = (t || "").match(dt) || []; c > l; l++)if (n = this[l], i = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(ae, " ") : " ")) {
                    for (r = 0; o = e[r++];)i.indexOf(" " + o + " ") < 0 && (i += o + " ");
                    s = G.trim(i), n.className !== s && (n.className = s)
                }
                return this
            }, removeClass: function (t) {
                var e, n, i, o, r, s, a = 0 === arguments.length || "string" == typeof t && t, l = 0, c = this.length;
                if (G.isFunction(t))return this.each(function (e) {
                    G(this).removeClass(t.call(this, e, this.className))
                });
                if (a)for (e = (t || "").match(dt) || []; c > l; l++)if (n = this[l], i = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(ae, " ") : "")) {
                    for (r = 0; o = e[r++];)for (; i.indexOf(" " + o + " ") >= 0;)i = i.replace(" " + o + " ", " ");
                    s = t ? G.trim(i) : "", n.className !== s && (n.className = s)
                }
                return this
            }, toggleClass: function (t, e) {
                var n = typeof t;
                return "boolean" == typeof e && "string" === n ? e ? this.addClass(t) : this.removeClass(t) : this.each(G.isFunction(t) ? function (n) {
                    G(this).toggleClass(t.call(this, n, this.className, e), e)
                } : function () {
                    if ("string" === n)for (var e, i = 0, o = G(this), r = t.match(dt) || []; e = r[i++];)o.hasClass(e) ? o.removeClass(e) : o.addClass(e); else(n === $t || "boolean" === n) && (this.className && vt.set(this, "__className__", this.className), this.className = this.className || t === !1 ? "" : vt.get(this, "__className__") || "")
                })
            }, hasClass: function (t) {
                for (var e = " " + t + " ", n = 0, i = this.length; i > n; n++)if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(ae, " ").indexOf(e) >= 0)return !0;
                return !1
            }
        });
        var le = /\r/g;
        G.fn.extend({
            val: function (t) {
                var e, n, i, o = this[0];
                return arguments.length ? (i = G.isFunction(t), this.each(function (n) {
                    var o;
                    1 === this.nodeType && (o = i ? t.call(this, n, G(this).val()) : t, null == o ? o = "" : "number" == typeof o ? o += "" : G.isArray(o) && (o = G.map(o, function (t) {
                        return null == t ? "" : t + ""
                    })), e = G.valHooks[this.type] || G.valHooks[this.nodeName.toLowerCase()], e && "set"in e && void 0 !== e.set(this, o, "value") || (this.value = o))
                })) : o ? (e = G.valHooks[o.type] || G.valHooks[o.nodeName.toLowerCase()], e && "get"in e && void 0 !== (n = e.get(o, "value")) ? n : (n = o.value, "string" == typeof n ? n.replace(le, "") : null == n ? "" : n)) : void 0
            }
        }), G.extend({
            valHooks: {
                option: {
                    get: function (t) {
                        var e = G.find.attr(t, "value");
                        return null != e ? e : G.trim(G.text(t))
                    }
                }, select: {
                    get: function (t) {
                        for (var e, n, i = t.options, o = t.selectedIndex, r = "select-one" === t.type || 0 > o, s = r ? null : [], a = r ? o + 1 : i.length, l = 0 > o ? a : r ? o : 0; a > l; l++)if (n = i[l], !(!n.selected && l !== o || (Y.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && G.nodeName(n.parentNode, "optgroup"))) {
                            if (e = G(n).val(), r)return e;
                            s.push(e)
                        }
                        return s
                    }, set: function (t, e) {
                        for (var n, i, o = t.options, r = G.makeArray(e), s = o.length; s--;)i = o[s], (i.selected = G.inArray(i.value, r) >= 0) && (n = !0);
                        return n || (t.selectedIndex = -1), r
                    }
                }
            }
        }), G.each(["radio", "checkbox"], function () {
            G.valHooks[this] = {
                set: function (t, e) {
                    return G.isArray(e) ? t.checked = G.inArray(G(t).val(), e) >= 0 : void 0
                }
            }, Y.checkOn || (G.valHooks[this].get = function (t) {
                return null === t.getAttribute("value") ? "on" : t.value
            })
        }), G.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function (t, e) {
            G.fn[e] = function (t, n) {
                return arguments.length > 0 ? this.on(e, null, t, n) : this.trigger(e)
            }
        }), G.fn.extend({
            hover: function (t, e) {
                return this.mouseenter(t).mouseleave(e || t)
            }, bind: function (t, e, n) {
                return this.on(t, null, e, n)
            }, unbind: function (t, e) {
                return this.off(t, null, e)
            }, delegate: function (t, e, n, i) {
                return this.on(e, t, n, i)
            }, undelegate: function (t, e, n) {
                return 1 === arguments.length ? this.off(t, "**") : this.off(e, t || "**", n)
            }
        });
        var ce = G.now(), ue = /\?/;
        G.parseJSON = function (t) {
            return JSON.parse(t + "")
        }, G.parseXML = function (t) {
            var e, n;
            if (!t || "string" != typeof t)return null;
            try {
                n = new DOMParser, e = n.parseFromString(t, "text/xml")
            } catch (i) {
                e = void 0
            }
            return (!e || e.getElementsByTagName("parsererror").length) && G.error("Invalid XML: " + t), e
        };
        var pe = /#.*$/, he = /([?&])_=[^&]*/, de = /^(.*?):[ \t]*([^\r\n]*)$/gm, fe = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/, ge = /^(?:GET|HEAD)$/, me = /^\/\//, ve = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/, ye = {}, be = {}, xe = "*/".concat("*"), we = t.location.href, Te = ve.exec(we.toLowerCase()) || [];
        G.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: we,
                type: "GET",
                isLocal: fe.test(Te[1]),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                    "*": xe,
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript"
                },
                contents: {xml: /xml/, html: /html/, json: /json/},
                responseFields: {xml: "responseXML", text: "responseText", json: "responseJSON"},
                converters: {"* text": String, "text html": !0, "text json": G.parseJSON, "text xml": G.parseXML},
                flatOptions: {url: !0, context: !0}
            },
            ajaxSetup: function (t, e) {
                return e ? H(H(t, G.ajaxSettings), e) : H(G.ajaxSettings, t)
            },
            ajaxPrefilter: R(ye),
            ajaxTransport: R(be),
            ajax: function (t, e) {
                function n(t, e, n, s) {
                    var l, u, v, y, x, T = e;
                    2 !== b && (b = 2, a && clearTimeout(a), i = void 0, r = s || "", w.readyState = t > 0 ? 4 : 0, l = t >= 200 && 300 > t || 304 === t, n && (y = F(p, w, n)), y = W(p, y, w, l), l ? (p.ifModified && (x = w.getResponseHeader("Last-Modified"), x && (G.lastModified[o] = x), x = w.getResponseHeader("etag"), x && (G.etag[o] = x)), 204 === t || "HEAD" === p.type ? T = "nocontent" : 304 === t ? T = "notmodified" : (T = y.state, u = y.data, v = y.error, l = !v)) : (v = T, (t || !T) && (T = "error", 0 > t && (t = 0))), w.status = t, w.statusText = (e || T) + "", l ? f.resolveWith(h, [u, T, w]) : f.rejectWith(h, [w, T, v]), w.statusCode(m), m = void 0, c && d.trigger(l ? "ajaxSuccess" : "ajaxError", [w, p, l ? u : v]), g.fireWith(h, [w, T]), c && (d.trigger("ajaxComplete", [w, p]), --G.active || G.event.trigger("ajaxStop")))
                }

                "object" == typeof t && (e = t, t = void 0), e = e || {};
                var i, o, r, s, a, l, c, u, p = G.ajaxSetup({}, e), h = p.context || p, d = p.context && (h.nodeType || h.jquery) ? G(h) : G.event, f = G.Deferred(), g = G.Callbacks("once memory"), m = p.statusCode || {}, v = {}, y = {}, b = 0, x = "canceled", w = {
                    readyState: 0,
                    getResponseHeader: function (t) {
                        var e;
                        if (2 === b) {
                            if (!s)for (s = {}; e = de.exec(r);)s[e[1].toLowerCase()] = e[2];
                            e = s[t.toLowerCase()]
                        }
                        return null == e ? null : e
                    },
                    getAllResponseHeaders: function () {
                        return 2 === b ? r : null
                    },
                    setRequestHeader: function (t, e) {
                        var n = t.toLowerCase();
                        return b || (t = y[n] = y[n] || t, v[t] = e), this
                    },
                    overrideMimeType: function (t) {
                        return b || (p.mimeType = t), this
                    },
                    statusCode: function (t) {
                        var e;
                        if (t)if (2 > b)for (e in t)m[e] = [m[e], t[e]]; else w.always(t[w.status]);
                        return this
                    },
                    abort: function (t) {
                        var e = t || x;
                        return i && i.abort(e), n(0, e), this
                    }
                };
                if (f.promise(w).complete = g.add, w.success = w.done, w.error = w.fail, p.url = ((t || p.url || we) + "").replace(pe, "").replace(me, Te[1] + "//"), p.type = e.method || e.type || p.method || p.type, p.dataTypes = G.trim(p.dataType || "*").toLowerCase().match(dt) || [""], null == p.crossDomain && (l = ve.exec(p.url.toLowerCase()), p.crossDomain = !(!l || l[1] === Te[1] && l[2] === Te[2] && (l[3] || ("http:" === l[1] ? "80" : "443")) === (Te[3] || ("http:" === Te[1] ? "80" : "443")))), p.data && p.processData && "string" != typeof p.data && (p.data = G.param(p.data, p.traditional)), P(ye, p, e, w), 2 === b)return w;
                c = G.event && p.global, c && 0 === G.active++ && G.event.trigger("ajaxStart"), p.type = p.type.toUpperCase(), p.hasContent = !ge.test(p.type), o = p.url, p.hasContent || (p.data && (o = p.url += (ue.test(o) ? "&" : "?") + p.data, delete p.data), p.cache === !1 && (p.url = he.test(o) ? o.replace(he, "$1_=" + ce++) : o + (ue.test(o) ? "&" : "?") + "_=" + ce++)), p.ifModified && (G.lastModified[o] && w.setRequestHeader("If-Modified-Since", G.lastModified[o]), G.etag[o] && w.setRequestHeader("If-None-Match", G.etag[o])), (p.data && p.hasContent && p.contentType !== !1 || e.contentType) && w.setRequestHeader("Content-Type", p.contentType), w.setRequestHeader("Accept", p.dataTypes[0] && p.accepts[p.dataTypes[0]] ? p.accepts[p.dataTypes[0]] + ("*" !== p.dataTypes[0] ? ", " + xe + "; q=0.01" : "") : p.accepts["*"]);
                for (u in p.headers)w.setRequestHeader(u, p.headers[u]);
                if (p.beforeSend && (p.beforeSend.call(h, w, p) === !1 || 2 === b))return w.abort();
                x = "abort";
                for (u in{success: 1, error: 1, complete: 1})w[u](p[u]);
                if (i = P(be, p, e, w)) {
                    w.readyState = 1, c && d.trigger("ajaxSend", [w, p]), p.async && p.timeout > 0 && (a = setTimeout(function () {
                        w.abort("timeout")
                    }, p.timeout));
                    try {
                        b = 1, i.send(v, n)
                    } catch (T) {
                        if (!(2 > b))throw T;
                        n(-1, T)
                    }
                } else n(-1, "No Transport");
                return w
            },
            getJSON: function (t, e, n) {
                return G.get(t, e, n, "json")
            },
            getScript: function (t, e) {
                return G.get(t, void 0, e, "script")
            }
        }), G.each(["get", "post"], function (t, e) {
            G[e] = function (t, n, i, o) {
                return G.isFunction(n) && (o = o || i, i = n, n = void 0), G.ajax({
                    url: t,
                    type: e,
                    dataType: o,
                    data: n,
                    success: i
                })
            }
        }), G._evalUrl = function (t) {
            return G.ajax({url: t, type: "GET", dataType: "script", async: !1, global: !1, "throws": !0})
        }, G.fn.extend({
            wrapAll: function (t) {
                var e;
                return G.isFunction(t) ? this.each(function (e) {
                    G(this).wrapAll(t.call(this, e))
                }) : (this[0] && (e = G(t, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && e.insertBefore(this[0]), e.map(function () {
                    for (var t = this; t.firstElementChild;)t = t.firstElementChild;
                    return t
                }).append(this)), this)
            }, wrapInner: function (t) {
                return this.each(G.isFunction(t) ? function (e) {
                    G(this).wrapInner(t.call(this, e))
                } : function () {
                    var e = G(this), n = e.contents();
                    n.length ? n.wrapAll(t) : e.append(t)
                })
            }, wrap: function (t) {
                var e = G.isFunction(t);
                return this.each(function (n) {
                    G(this).wrapAll(e ? t.call(this, n) : t)
                })
            }, unwrap: function () {
                return this.parent().each(function () {
                    G.nodeName(this, "body") || G(this).replaceWith(this.childNodes)
                }).end()
            }
        }), G.expr.filters.hidden = function (t) {
            return t.offsetWidth <= 0 && t.offsetHeight <= 0
        }, G.expr.filters.visible = function (t) {
            return !G.expr.filters.hidden(t)
        };
        var Ce = /%20/g, ke = /\[\]$/, $e = /\r?\n/g, Ee = /^(?:submit|button|image|reset|file)$/i, Se = /^(?:input|select|textarea|keygen)/i;
        G.param = function (t, e) {
            var n, i = [], o = function (t, e) {
                e = G.isFunction(e) ? e() : null == e ? "" : e, i[i.length] = encodeURIComponent(t) + "=" + encodeURIComponent(e)
            };
            if (void 0 === e && (e = G.ajaxSettings && G.ajaxSettings.traditional), G.isArray(t) || t.jquery && !G.isPlainObject(t))G.each(t, function () {
                o(this.name, this.value)
            }); else for (n in t)M(n, t[n], e, o);
            return i.join("&").replace(Ce, "+")
        }, G.fn.extend({
            serialize: function () {
                return G.param(this.serializeArray())
            }, serializeArray: function () {
                return this.map(function () {
                    var t = G.prop(this, "elements");
                    return t ? G.makeArray(t) : this
                }).filter(function () {
                    var t = this.type;
                    return this.name && !G(this).is(":disabled") && Se.test(this.nodeName) && !Ee.test(t) && (this.checked || !kt.test(t))
                }).map(function (t, e) {
                    var n = G(this).val();
                    return null == n ? null : G.isArray(n) ? G.map(n, function (t) {
                        return {name: e.name, value: t.replace($e, "\r\n")}
                    }) : {name: e.name, value: n.replace($e, "\r\n")}
                }).get()
            }
        }), G.ajaxSettings.xhr = function () {
            try {
                return new XMLHttpRequest
            } catch (t) {
            }
        };
        var De = 0, Ne = {}, Ae = {0: 200, 1223: 204}, je = G.ajaxSettings.xhr();
        t.attachEvent && t.attachEvent("onunload", function () {
            for (var t in Ne)Ne[t]()
        }), Y.cors = !!je && "withCredentials"in je, Y.ajax = je = !!je, G.ajaxTransport(function (t) {
            var e;
            return Y.cors || je && !t.crossDomain ? {
                send: function (n, i) {
                    var o, r = t.xhr(), s = ++De;
                    if (r.open(t.type, t.url, t.async, t.username, t.password), t.xhrFields)for (o in t.xhrFields)r[o] = t.xhrFields[o];
                    t.mimeType && r.overrideMimeType && r.overrideMimeType(t.mimeType), t.crossDomain || n["X-Requested-With"] || (n["X-Requested-With"] = "XMLHttpRequest");
                    for (o in n)r.setRequestHeader(o, n[o]);
                    e = function (t) {
                        return function () {
                            e && (delete Ne[s], e = r.onload = r.onerror = null, "abort" === t ? r.abort() : "error" === t ? i(r.status, r.statusText) : i(Ae[r.status] || r.status, r.statusText, "string" == typeof r.responseText ? {text: r.responseText} : void 0, r.getAllResponseHeaders()))
                        }
                    }, r.onload = e(), r.onerror = e("error"), e = Ne[s] = e("abort");
                    try {
                        r.send(t.hasContent && t.data || null)
                    } catch (a) {
                        if (e)throw a
                    }
                }, abort: function () {
                    e && e()
                }
            } : void 0
        }), G.ajaxSetup({
            accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},
            contents: {script: /(?:java|ecma)script/},
            converters: {
                "text script": function (t) {
                    return G.globalEval(t), t
                }
            }
        }), G.ajaxPrefilter("script", function (t) {
            void 0 === t.cache && (t.cache = !1), t.crossDomain && (t.type = "GET")
        }), G.ajaxTransport("script", function (t) {
            if (t.crossDomain) {
                var e, n;
                return {
                    send: function (i, o) {
                        e = G("<script>").prop({
                            async: !0,
                            charset: t.scriptCharset,
                            src: t.url
                        }).on("load error", n = function (t) {
                            e.remove(), n = null, t && o("error" === t.type ? 404 : 200, t.type)
                        }), Z.head.appendChild(e[0])
                    }, abort: function () {
                        n && n()
                    }
                }
            }
        });
        var Oe = [], Le = /(=)\?(?=&|$)|\?\?/;
        G.ajaxSetup({
            jsonp: "callback", jsonpCallback: function () {
                var t = Oe.pop() || G.expando + "_" + ce++;
                return this[t] = !0, t
            }
        }), G.ajaxPrefilter("json jsonp", function (e, n, i) {
            var o, r, s, a = e.jsonp !== !1 && (Le.test(e.url) ? "url" : "string" == typeof e.data && !(e.contentType || "").indexOf("application/x-www-form-urlencoded") && Le.test(e.data) && "data");
            return a || "jsonp" === e.dataTypes[0] ? (o = e.jsonpCallback = G.isFunction(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback, a ? e[a] = e[a].replace(Le, "$1" + o) : e.jsonp !== !1 && (e.url += (ue.test(e.url) ? "&" : "?") + e.jsonp + "=" + o), e.converters["script json"] = function () {
                return s || G.error(o + " was not called"), s[0]
            }, e.dataTypes[0] = "json", r = t[o], t[o] = function () {
                s = arguments
            }, i.always(function () {
                t[o] = r, e[o] && (e.jsonpCallback = n.jsonpCallback, Oe.push(o)), s && G.isFunction(r) && r(s[0]), s = r = void 0
            }), "script") : void 0
        }), G.parseHTML = function (t, e, n) {
            if (!t || "string" != typeof t)return null;
            "boolean" == typeof e && (n = e, e = !1), e = e || Z;
            var i = st.exec(t), o = !n && [];
            return i ? [e.createElement(i[1])] : (i = G.buildFragment([t], e, o), o && o.length && G(o).remove(), G.merge([], i.childNodes))
        };
        var Ie = G.fn.load;
        G.fn.load = function (t, e, n) {
            if ("string" != typeof t && Ie)return Ie.apply(this, arguments);
            var i, o, r, s = this, a = t.indexOf(" ");
            return a >= 0 && (i = G.trim(t.slice(a)), t = t.slice(0, a)), G.isFunction(e) ? (n = e, e = void 0) : e && "object" == typeof e && (o = "POST"), s.length > 0 && G.ajax({
                url: t,
                type: o,
                dataType: "html",
                data: e
            }).done(function (t) {
                r = arguments, s.html(i ? G("<div>").append(G.parseHTML(t)).find(i) : t)
            }).complete(n && function (t, e) {
                    s.each(n, r || [t.responseText, e, t])
                }), this
        }, G.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (t, e) {
            G.fn[e] = function (t) {
                return this.on(e, t)
            }
        }), G.expr.filters.animated = function (t) {
            return G.grep(G.timers, function (e) {
                return t === e.elem
            }).length
        };
        var Re = t.document.documentElement;
        G.offset = {
            setOffset: function (t, e, n) {
                var i, o, r, s, a, l, c, u = G.css(t, "position"), p = G(t), h = {};
                "static" === u && (t.style.position = "relative"), a = p.offset(), r = G.css(t, "top"), l = G.css(t, "left"), c = ("absolute" === u || "fixed" === u) && (r + l).indexOf("auto") > -1, c ? (i = p.position(), s = i.top, o = i.left) : (s = parseFloat(r) || 0, o = parseFloat(l) || 0), G.isFunction(e) && (e = e.call(t, n, a)), null != e.top && (h.top = e.top - a.top + s), null != e.left && (h.left = e.left - a.left + o), "using"in e ? e.using.call(t, h) : p.css(h)
            }
        }, G.fn.extend({
            offset: function (t) {
                if (arguments.length)return void 0 === t ? this : this.each(function (e) {
                    G.offset.setOffset(this, t, e)
                });
                var e, n, i = this[0], o = {top: 0, left: 0}, r = i && i.ownerDocument;
                return r ? (e = r.documentElement, G.contains(e, i) ? (typeof i.getBoundingClientRect !== $t && (o = i.getBoundingClientRect()), n = q(r), {
                    top: o.top + n.pageYOffset - e.clientTop,
                    left: o.left + n.pageXOffset - e.clientLeft
                }) : o) : void 0
            }, position: function () {
                if (this[0]) {
                    var t, e, n = this[0], i = {top: 0, left: 0};
                    return "fixed" === G.css(n, "position") ? e = n.getBoundingClientRect() : (t = this.offsetParent(), e = this.offset(), G.nodeName(t[0], "html") || (i = t.offset()), i.top += G.css(t[0], "borderTopWidth", !0), i.left += G.css(t[0], "borderLeftWidth", !0)), {
                        top: e.top - i.top - G.css(n, "marginTop", !0),
                        left: e.left - i.left - G.css(n, "marginLeft", !0)
                    }
                }
            }, offsetParent: function () {
                return this.map(function () {
                    for (var t = this.offsetParent || Re; t && !G.nodeName(t, "html") && "static" === G.css(t, "position");)t = t.offsetParent;
                    return t || Re
                })
            }
        }), G.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (e, n) {
            var i = "pageYOffset" === n;
            G.fn[e] = function (o) {
                return mt(this, function (e, o, r) {
                    var s = q(e);
                    return void 0 === r ? s ? s[n] : e[o] : void(s ? s.scrollTo(i ? t.pageXOffset : r, i ? r : t.pageYOffset) : e[o] = r)
                }, e, o, arguments.length, null)
            }
        }), G.each(["top", "left"], function (t, e) {
            G.cssHooks[e] = T(Y.pixelPosition, function (t, n) {
                return n ? (n = w(t, e), _t.test(n) ? G(t).position()[e] + "px" : n) : void 0
            })
        }), G.each({Height: "height", Width: "width"}, function (t, e) {
            G.each({padding: "inner" + t, content: e, "": "outer" + t}, function (n, i) {
                G.fn[i] = function (i, o) {
                    var r = arguments.length && (n || "boolean" != typeof i), s = n || (i === !0 || o === !0 ? "margin" : "border");
                    return mt(this, function (e, n, i) {
                        var o;
                        return G.isWindow(e) ? e.document.documentElement["client" + t] : 9 === e.nodeType ? (o = e.documentElement, Math.max(e.body["scroll" + t], o["scroll" + t], e.body["offset" + t], o["offset" + t], o["client" + t])) : void 0 === i ? G.css(e, n, s) : G.style(e, n, i, s)
                    }, e, r ? i : void 0, r, null)
                }
            })
        }), G.fn.size = function () {
            return this.length
        }, G.fn.andSelf = G.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function () {
            return G
        });
        var Pe = t.jQuery, He = t.$;
        return G.noConflict = function (e) {
            return t.$ === G && (t.$ = He), e && t.jQuery === G && (t.jQuery = Pe), G
        }, typeof e === $t && (t.jQuery = t.$ = G), G
    }), "undefined" == typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");
if (+function (t) {
        "use strict";
        var e = t.fn.jquery.split(" ")[0].split(".");
        if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")
    }(jQuery), +function (t) {
        "use strict";
        function e() {
            var t = document.createElement("bootstrap"), e = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd otransitionend",
                transition: "transitionend"
            };
            for (var n in e)if (void 0 !== t.style[n])return {end: e[n]};
            return !1
        }

        t.fn.emulateTransitionEnd = function (e) {
            var n = !1, i = this;
            t(this).one("bsTransitionEnd", function () {
                n = !0
            });
            var o = function () {
                n || t(i).trigger(t.support.transition.end)
            };
            return setTimeout(o, e), this
        }, t(function () {
            t.support.transition = e(), t.support.transition && (t.event.special.bsTransitionEnd = {
                bindType: t.support.transition.end,
                delegateType: t.support.transition.end,
                handle: function (e) {
                    return t(e.target).is(this) ? e.handleObj.handler.apply(this, arguments) : void 0
                }
            })
        })
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            return this.each(function () {
                var n = t(this), o = n.data("bs.alert");
                o || n.data("bs.alert", o = new i(this)), "string" == typeof e && o[e].call(n)
            })
        }

        var n = '[data-dismiss="alert"]', i = function (e) {
            t(e).on("click", n, this.close)
        };
        i.VERSION = "3.3.5", i.TRANSITION_DURATION = 150, i.prototype.close = function (e) {
            function n() {
                s.detach().trigger("closed.bs.alert").remove()
            }

            var o = t(this), r = o.attr("data-target");
            r || (r = o.attr("href"), r = r && r.replace(/.*(?=#[^\s]*$)/, ""));
            var s = t(r);
            e && e.preventDefault(), s.length || (s = o.closest(".alert")), s.trigger(e = t.Event("close.bs.alert")), e.isDefaultPrevented() || (s.removeClass("in"), t.support.transition && s.hasClass("fade") ? s.one("bsTransitionEnd", n).emulateTransitionEnd(i.TRANSITION_DURATION) : n())
        };
        var o = t.fn.alert;
        t.fn.alert = e, t.fn.alert.Constructor = i, t.fn.alert.noConflict = function () {
            return t.fn.alert = o, this
        }, t(document).on("click.bs.alert.data-api", n, i.prototype.close)
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.button"), r = "object" == typeof e && e;
                o || i.data("bs.button", o = new n(this, r)), "toggle" == e ? o.toggle() : e && o.setState(e)
            })
        }

        var n = function (e, i) {
            this.$element = t(e), this.options = t.extend({}, n.DEFAULTS, i), this.isLoading = !1
        };
        n.VERSION = "3.3.5", n.DEFAULTS = {loadingText: "loading..."}, n.prototype.setState = function (e) {
            var n = "disabled", i = this.$element, o = i.is("input") ? "val" : "html", r = i.data();
            e += "Text", null == r.resetText && i.data("resetText", i[o]()), setTimeout(t.proxy(function () {
                i[o](null == r[e] ? this.options[e] : r[e]), "loadingText" == e ? (this.isLoading = !0, i.addClass(n).attr(n, n)) : this.isLoading && (this.isLoading = !1, i.removeClass(n).removeAttr(n))
            }, this), 0)
        }, n.prototype.toggle = function () {
            var t = !0, e = this.$element.closest('[data-toggle="buttons"]');
            if (e.length) {
                var n = this.$element.find("input");
                "radio" == n.prop("type") ? (n.prop("checked") && (t = !1), e.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == n.prop("type") && (n.prop("checked") !== this.$element.hasClass("active") && (t = !1), this.$element.toggleClass("active")), n.prop("checked", this.$element.hasClass("active")), t && n.trigger("change")
            } else this.$element.attr("aria-pressed", !this.$element.hasClass("active")), this.$element.toggleClass("active")
        };
        var i = t.fn.button;
        t.fn.button = e, t.fn.button.Constructor = n, t.fn.button.noConflict = function () {
            return t.fn.button = i, this
        }, t(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function (n) {
            var i = t(n.target);
            i.hasClass("btn") || (i = i.closest(".btn")), e.call(i, "toggle"), t(n.target).is('input[type="radio"]') || t(n.target).is('input[type="checkbox"]') || n.preventDefault()
        }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function (e) {
            t(e.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(e.type))
        })
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.carousel"), r = t.extend({}, n.DEFAULTS, i.data(), "object" == typeof e && e), s = "string" == typeof e ? e : r.slide;
                o || i.data("bs.carousel", o = new n(this, r)), "number" == typeof e ? o.to(e) : s ? o[s]() : r.interval && o.pause().cycle()
            })
        }

        var n = function (e, n) {
            this.$element = t(e), this.$indicators = this.$element.find(".carousel-indicators"), this.options = n, this.paused = null, this.sliding = null, this.interval = null, this.$active = null, this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", t.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart"in document.documentElement) && this.$element.on("mouseenter.bs.carousel", t.proxy(this.pause, this)).on("mouseleave.bs.carousel", t.proxy(this.cycle, this))
        };
        n.VERSION = "3.3.5", n.TRANSITION_DURATION = 600, n.DEFAULTS = {
            interval: 5e3,
            pause: "hover",
            wrap: !0,
            keyboard: !0
        }, n.prototype.keydown = function (t) {
            if (!/input|textarea/i.test(t.target.tagName)) {
                switch (t.which) {
                    case 37:
                        this.prev();
                        break;
                    case 39:
                        this.next();
                        break;
                    default:
                        return
                }
                t.preventDefault()
            }
        }, n.prototype.cycle = function (e) {
            return e || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(t.proxy(this.next, this), this.options.interval)), this
        }, n.prototype.getItemIndex = function (t) {
            return this.$items = t.parent().children(".item"), this.$items.index(t || this.$active)
        }, n.prototype.getItemForDirection = function (t, e) {
            var n = this.getItemIndex(e), i = "prev" == t && 0 === n || "next" == t && n == this.$items.length - 1;
            if (i && !this.options.wrap)return e;
            var o = "prev" == t ? -1 : 1, r = (n + o) % this.$items.length;
            return this.$items.eq(r)
        }, n.prototype.to = function (t) {
            var e = this, n = this.getItemIndex(this.$active = this.$element.find(".item.active"));
            return t > this.$items.length - 1 || 0 > t ? void 0 : this.sliding ? this.$element.one("slid.bs.carousel", function () {
                e.to(t)
            }) : n == t ? this.pause().cycle() : this.slide(t > n ? "next" : "prev", this.$items.eq(t))
        }, n.prototype.pause = function (e) {
            return e || (this.paused = !0), this.$element.find(".next, .prev").length && t.support.transition && (this.$element.trigger(t.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
        }, n.prototype.next = function () {
            return this.sliding ? void 0 : this.slide("next")
        }, n.prototype.prev = function () {
            return this.sliding ? void 0 : this.slide("prev")
        }, n.prototype.slide = function (e, i) {
            var o = this.$element.find(".item.active"), r = i || this.getItemForDirection(e, o), s = this.interval, a = "next" == e ? "left" : "right", l = this;
            if (r.hasClass("active"))return this.sliding = !1;
            var c = r[0], u = t.Event("slide.bs.carousel", {relatedTarget: c, direction: a});
            if (this.$element.trigger(u), !u.isDefaultPrevented()) {
                if (this.sliding = !0, s && this.pause(), this.$indicators.length) {
                    this.$indicators.find(".active").removeClass("active");
                    var p = t(this.$indicators.children()[this.getItemIndex(r)]);
                    p && p.addClass("active")
                }
                var h = t.Event("slid.bs.carousel", {relatedTarget: c, direction: a});
                return t.support.transition && this.$element.hasClass("slide") ? (r.addClass(e), r[0].offsetWidth, o.addClass(a), r.addClass(a), o.one("bsTransitionEnd", function () {
                    r.removeClass([e, a].join(" ")).addClass("active"), o.removeClass(["active", a].join(" ")), l.sliding = !1, setTimeout(function () {
                        l.$element.trigger(h)
                    }, 0)
                }).emulateTransitionEnd(n.TRANSITION_DURATION)) : (o.removeClass("active"), r.addClass("active"), this.sliding = !1, this.$element.trigger(h)), s && this.cycle(), this
            }
        };
        var i = t.fn.carousel;
        t.fn.carousel = e, t.fn.carousel.Constructor = n, t.fn.carousel.noConflict = function () {
            return t.fn.carousel = i, this
        };
        var o = function (n) {
            var i, o = t(this), r = t(o.attr("data-target") || (i = o.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, ""));
            if (r.hasClass("carousel")) {
                var s = t.extend({}, r.data(), o.data()), a = o.attr("data-slide-to");
                a && (s.interval = !1), e.call(r, s), a && r.data("bs.carousel").to(a), n.preventDefault()
            }
        };
        t(document).on("click.bs.carousel.data-api", "[data-slide]", o).on("click.bs.carousel.data-api", "[data-slide-to]", o), t(window).on("load", function () {
            t('[data-ride="carousel"]').each(function () {
                var n = t(this);
                e.call(n, n.data())
            })
        })
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            var n, i = e.attr("data-target") || (n = e.attr("href")) && n.replace(/.*(?=#[^\s]+$)/, "");
            return t(i)
        }

        function n(e) {
            return this.each(function () {
                var n = t(this), o = n.data("bs.collapse"), r = t.extend({}, i.DEFAULTS, n.data(), "object" == typeof e && e);
                !o && r.toggle && /show|hide/.test(e) && (r.toggle = !1), o || n.data("bs.collapse", o = new i(this, r)), "string" == typeof e && o[e]()
            })
        }

        var i = function (e, n) {
            this.$element = t(e), this.options = t.extend({}, i.DEFAULTS, n), this.$trigger = t('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
        };
        i.VERSION = "3.3.5", i.TRANSITION_DURATION = 350, i.DEFAULTS = {toggle: !0}, i.prototype.dimension = function () {
            var t = this.$element.hasClass("width");
            return t ? "width" : "height"
        }, i.prototype.show = function () {
            if (!this.transitioning && !this.$element.hasClass("in")) {
                var e, o = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
                if (!(o && o.length && (e = o.data("bs.collapse"), e && e.transitioning))) {
                    var r = t.Event("show.bs.collapse");
                    if (this.$element.trigger(r), !r.isDefaultPrevented()) {
                        o && o.length && (n.call(o, "hide"), e || o.data("bs.collapse", null));
                        var s = this.dimension();
                        this.$element.removeClass("collapse").addClass("collapsing")[s](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
                        var a = function () {
                            this.$element.removeClass("collapsing").addClass("collapse in")[s](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                        };
                        if (!t.support.transition)return a.call(this);
                        var l = t.camelCase(["scroll", s].join("-"));
                        this.$element.one("bsTransitionEnd", t.proxy(a, this)).emulateTransitionEnd(i.TRANSITION_DURATION)[s](this.$element[0][l])
                    }
                }
            }
        }, i.prototype.hide = function () {
            if (!this.transitioning && this.$element.hasClass("in")) {
                var e = t.Event("hide.bs.collapse");
                if (this.$element.trigger(e), !e.isDefaultPrevented()) {
                    var n = this.dimension();
                    this.$element[n](this.$element[n]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
                    var o = function () {
                        this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                    };
                    return t.support.transition ? void this.$element[n](0).one("bsTransitionEnd", t.proxy(o, this)).emulateTransitionEnd(i.TRANSITION_DURATION) : o.call(this)
                }
            }
        }, i.prototype.toggle = function () {
            this[this.$element.hasClass("in") ? "hide" : "show"]()
        }, i.prototype.getParent = function () {
            return t(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(t.proxy(function (n, i) {
                var o = t(i);
                this.addAriaAndCollapsedClass(e(o), o)
            }, this)).end()
        }, i.prototype.addAriaAndCollapsedClass = function (t, e) {
            var n = t.hasClass("in");
            t.attr("aria-expanded", n), e.toggleClass("collapsed", !n).attr("aria-expanded", n)
        };
        var o = t.fn.collapse;
        t.fn.collapse = n, t.fn.collapse.Constructor = i, t.fn.collapse.noConflict = function () {
            return t.fn.collapse = o, this
        }, t(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function (i) {
            var o = t(this);
            o.attr("data-target") || i.preventDefault();
            var r = e(o), s = r.data("bs.collapse"), a = s ? "toggle" : o.data();
            n.call(r, a)
        })
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            var n = e.attr("data-target");
            n || (n = e.attr("href"), n = n && /#[A-Za-z]/.test(n) && n.replace(/.*(?=#[^\s]*$)/, ""));
            var i = n && t(n);
            return i && i.length ? i : e.parent()
        }

        function n(n) {
            n && 3 === n.which || (t(o).remove(), t(r).each(function () {
                var i = t(this), o = e(i), r = {relatedTarget: this};
                o.hasClass("open") && (n && "click" == n.type && /input|textarea/i.test(n.target.tagName) && t.contains(o[0], n.target) || (o.trigger(n = t.Event("hide.bs.dropdown", r)), n.isDefaultPrevented() || (i.attr("aria-expanded", "false"), o.removeClass("open").trigger("hidden.bs.dropdown", r))));
            }))
        }

        function i(e) {
            return this.each(function () {
                var n = t(this), i = n.data("bs.dropdown");
                i || n.data("bs.dropdown", i = new s(this)), "string" == typeof e && i[e].call(n)
            })
        }

        var o = ".dropdown-backdrop", r = '[data-toggle="dropdown"]', s = function (e) {
            t(e).on("click.bs.dropdown", this.toggle)
        };
        s.VERSION = "3.3.5", s.prototype.toggle = function (i) {
            var o = t(this);
            if (!o.is(".disabled, :disabled")) {
                var r = e(o), s = r.hasClass("open");
                if (n(), !s) {
                    "ontouchstart"in document.documentElement && !r.closest(".navbar-nav").length && t(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(t(this)).on("click", n);
                    var a = {relatedTarget: this};
                    if (r.trigger(i = t.Event("show.bs.dropdown", a)), i.isDefaultPrevented())return;
                    o.trigger("focus").attr("aria-expanded", "true"), r.toggleClass("open").trigger("shown.bs.dropdown", a)
                }
                return !1
            }
        }, s.prototype.keydown = function (n) {
            if (/(38|40|27|32)/.test(n.which) && !/input|textarea/i.test(n.target.tagName)) {
                var i = t(this);
                if (n.preventDefault(), n.stopPropagation(), !i.is(".disabled, :disabled")) {
                    var o = e(i), s = o.hasClass("open");
                    if (!s && 27 != n.which || s && 27 == n.which)return 27 == n.which && o.find(r).trigger("focus"), i.trigger("click");
                    var a = " li:not(.disabled):visible a", l = o.find(".dropdown-menu" + a);
                    if (l.length) {
                        var c = l.index(n.target);
                        38 == n.which && c > 0 && c--, 40 == n.which && c < l.length - 1 && c++, ~c || (c = 0), l.eq(c).trigger("focus")
                    }
                }
            }
        };
        var a = t.fn.dropdown;
        t.fn.dropdown = i, t.fn.dropdown.Constructor = s, t.fn.dropdown.noConflict = function () {
            return t.fn.dropdown = a, this
        }, t(document).on("click.bs.dropdown.data-api", n).on("click.bs.dropdown.data-api", ".dropdown form", function (t) {
            t.stopPropagation()
        }).on("click.bs.dropdown.data-api", r, s.prototype.toggle).on("keydown.bs.dropdown.data-api", r, s.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", s.prototype.keydown)
    }(jQuery), +function (t) {
        "use strict";
        function e(e, i) {
            return this.each(function () {
                var o = t(this), r = o.data("bs.modal"), s = t.extend({}, n.DEFAULTS, o.data(), "object" == typeof e && e);
                r || o.data("bs.modal", r = new n(this, s)), "string" == typeof e ? r[e](i) : s.show && r.show(i)
            })
        }

        var n = function (e, n) {
            this.options = n, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function () {
                this.$element.trigger("loaded.bs.modal")
            }, this))
        };
        n.VERSION = "3.3.5", n.TRANSITION_DURATION = 300, n.BACKDROP_TRANSITION_DURATION = 150, n.DEFAULTS = {
            backdrop: !0,
            keyboard: !0,
            show: !0
        }, n.prototype.toggle = function (t) {
            return this.isShown ? this.hide() : this.show(t)
        }, n.prototype.show = function (e) {
            var i = this, o = t.Event("show.bs.modal", {relatedTarget: e});
            this.$element.trigger(o), this.isShown || o.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function () {
                i.$element.one("mouseup.dismiss.bs.modal", function (e) {
                    t(e.target).is(i.$element) && (i.ignoreBackdropClick = !0)
                })
            }), this.backdrop(function () {
                var o = t.support.transition && i.$element.hasClass("fade");
                i.$element.parent().length || i.$element.appendTo(i.$body), i.$element.show().scrollTop(0), i.adjustDialog(), o && i.$element[0].offsetWidth, i.$element.addClass("in"), i.enforceFocus();
                var r = t.Event("shown.bs.modal", {relatedTarget: e});
                o ? i.$dialog.one("bsTransitionEnd", function () {
                    i.$element.trigger("focus").trigger(r)
                }).emulateTransitionEnd(n.TRANSITION_DURATION) : i.$element.trigger("focus").trigger(r)
            }))
        }, n.prototype.hide = function (e) {
            e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(n.TRANSITION_DURATION) : this.hideModal())
        }, n.prototype.enforceFocus = function () {
            t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function (t) {
                this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
            }, this))
        }, n.prototype.escape = function () {
            this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function (t) {
                27 == t.which && this.hide()
            }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
        }, n.prototype.resize = function () {
            this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
        }, n.prototype.hideModal = function () {
            var t = this;
            this.$element.hide(), this.backdrop(function () {
                t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
            })
        }, n.prototype.removeBackdrop = function () {
            this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
        }, n.prototype.backdrop = function (e) {
            var i = this, o = this.$element.hasClass("fade") ? "fade" : "";
            if (this.isShown && this.options.backdrop) {
                var r = t.support.transition && o;
                if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + o).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function (t) {
                        return this.ignoreBackdropClick ? void(this.ignoreBackdropClick = !1) : void(t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide()))
                    }, this)), r && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !e)return;
                r ? this.$backdrop.one("bsTransitionEnd", e).emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION) : e()
            } else if (!this.isShown && this.$backdrop) {
                this.$backdrop.removeClass("in");
                var s = function () {
                    i.removeBackdrop(), e && e()
                };
                t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", s).emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION) : s()
            } else e && e()
        }, n.prototype.handleUpdate = function () {
            this.adjustDialog()
        }, n.prototype.adjustDialog = function () {
            var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
            this.$element.css({
                paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
                paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
            })
        }, n.prototype.resetAdjustments = function () {
            this.$element.css({paddingLeft: "", paddingRight: ""})
        }, n.prototype.checkScrollbar = function () {
            var t = window.innerWidth;
            if (!t) {
                var e = document.documentElement.getBoundingClientRect();
                t = e.right - Math.abs(e.left)
            }
            this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
        }, n.prototype.setScrollbar = function () {
            var t = parseInt(this.$body.css("padding-right") || 0, 10);
            this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
        }, n.prototype.resetScrollbar = function () {
            this.$body.css("padding-right", this.originalBodyPad)
        }, n.prototype.measureScrollbar = function () {
            var t = document.createElement("div");
            t.className = "modal-scrollbar-measure", this.$body.append(t);
            var e = t.offsetWidth - t.clientWidth;
            return this.$body[0].removeChild(t), e
        };
        var i = t.fn.modal;
        t.fn.modal = e, t.fn.modal.Constructor = n, t.fn.modal.noConflict = function () {
            return t.fn.modal = i, this
        }, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (n) {
            var i = t(this), o = i.attr("href"), r = t(i.attr("data-target") || o && o.replace(/.*(?=#[^\s]+$)/, "")), s = r.data("bs.modal") ? "toggle" : t.extend({remote: !/#/.test(o) && o}, r.data(), i.data());
            i.is("a") && n.preventDefault(), r.one("show.bs.modal", function (t) {
                t.isDefaultPrevented() || r.one("hidden.bs.modal", function () {
                    i.is(":visible") && i.trigger("focus")
                })
            }), e.call(r, s, this)
        })
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.tooltip"), r = "object" == typeof e && e;
                (o || !/destroy|hide/.test(e)) && (o || i.data("bs.tooltip", o = new n(this, r)), "string" == typeof e && o[e]())
            })
        }

        var n = function (t, e) {
            this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", t, e)
        };
        n.VERSION = "3.3.5", n.TRANSITION_DURATION = 150, n.DEFAULTS = {
            animation: !0,
            placement: "top",
            selector: !1,
            template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
            trigger: "hover focus",
            title: "",
            delay: 0,
            html: !1,
            container: !1,
            viewport: {selector: "body", padding: 0}
        }, n.prototype.init = function (e, n, i) {
            if (this.enabled = !0, this.type = e, this.$element = t(n), this.options = this.getOptions(i), this.$viewport = this.options.viewport && t(t.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
                    click: !1,
                    hover: !1,
                    focus: !1
                }, this.$element[0]instanceof document.constructor && !this.options.selector)throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
            for (var o = this.options.trigger.split(" "), r = o.length; r--;) {
                var s = o[r];
                if ("click" == s)this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this)); else if ("manual" != s) {
                    var a = "hover" == s ? "mouseenter" : "focusin", l = "hover" == s ? "mouseleave" : "focusout";
                    this.$element.on(a + "." + this.type, this.options.selector, t.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, t.proxy(this.leave, this))
                }
            }
            this.options.selector ? this._options = t.extend({}, this.options, {
                trigger: "manual",
                selector: ""
            }) : this.fixTitle()
        }, n.prototype.getDefaults = function () {
            return n.DEFAULTS
        }, n.prototype.getOptions = function (e) {
            return e = t.extend({}, this.getDefaults(), this.$element.data(), e), e.delay && "number" == typeof e.delay && (e.delay = {
                show: e.delay,
                hide: e.delay
            }), e
        }, n.prototype.getDelegateOptions = function () {
            var e = {}, n = this.getDefaults();
            return this._options && t.each(this._options, function (t, i) {
                n[t] != i && (e[t] = i)
            }), e
        }, n.prototype.enter = function (e) {
            var n = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
            return n || (n = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, n)), e instanceof t.Event && (n.inState["focusin" == e.type ? "focus" : "hover"] = !0), n.tip().hasClass("in") || "in" == n.hoverState ? void(n.hoverState = "in") : (clearTimeout(n.timeout), n.hoverState = "in", n.options.delay && n.options.delay.show ? void(n.timeout = setTimeout(function () {
                "in" == n.hoverState && n.show()
            }, n.options.delay.show)) : n.show())
        }, n.prototype.isInStateTrue = function () {
            for (var t in this.inState)if (this.inState[t])return !0;
            return !1
        }, n.prototype.leave = function (e) {
            var n = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
            return n || (n = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, n)), e instanceof t.Event && (n.inState["focusout" == e.type ? "focus" : "hover"] = !1), n.isInStateTrue() ? void 0 : (clearTimeout(n.timeout), n.hoverState = "out", n.options.delay && n.options.delay.hide ? void(n.timeout = setTimeout(function () {
                "out" == n.hoverState && n.hide()
            }, n.options.delay.hide)) : n.hide())
        }, n.prototype.show = function () {
            var e = t.Event("show.bs." + this.type);
            if (this.hasContent() && this.enabled) {
                this.$element.trigger(e);
                var i = t.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
                if (e.isDefaultPrevented() || !i)return;
                var o = this, r = this.tip(), s = this.getUID(this.type);
                this.setContent(), r.attr("id", s), this.$element.attr("aria-describedby", s), this.options.animation && r.addClass("fade");
                var a = "function" == typeof this.options.placement ? this.options.placement.call(this, r[0], this.$element[0]) : this.options.placement, l = /\s?auto?\s?/i, c = l.test(a);
                c && (a = a.replace(l, "") || "top"), r.detach().css({
                    top: 0,
                    left: 0,
                    display: "block"
                }).addClass(a).data("bs." + this.type, this), this.options.container ? r.appendTo(this.options.container) : r.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
                var u = this.getPosition(), p = r[0].offsetWidth, h = r[0].offsetHeight;
                if (c) {
                    var d = a, f = this.getPosition(this.$viewport);
                    a = "bottom" == a && u.bottom + h > f.bottom ? "top" : "top" == a && u.top - h < f.top ? "bottom" : "right" == a && u.right + p > f.width ? "left" : "left" == a && u.left - p < f.left ? "right" : a, r.removeClass(d).addClass(a)
                }
                var g = this.getCalculatedOffset(a, u, p, h);
                this.applyPlacement(g, a);
                var m = function () {
                    var t = o.hoverState;
                    o.$element.trigger("shown.bs." + o.type), o.hoverState = null, "out" == t && o.leave(o)
                };
                t.support.transition && this.$tip.hasClass("fade") ? r.one("bsTransitionEnd", m).emulateTransitionEnd(n.TRANSITION_DURATION) : m()
            }
        }, n.prototype.applyPlacement = function (e, n) {
            var i = this.tip(), o = i[0].offsetWidth, r = i[0].offsetHeight, s = parseInt(i.css("margin-top"), 10), a = parseInt(i.css("margin-left"), 10);
            isNaN(s) && (s = 0), isNaN(a) && (a = 0), e.top += s, e.left += a, t.offset.setOffset(i[0], t.extend({
                using: function (t) {
                    i.css({top: Math.round(t.top), left: Math.round(t.left)})
                }
            }, e), 0), i.addClass("in");
            var l = i[0].offsetWidth, c = i[0].offsetHeight;
            "top" == n && c != r && (e.top = e.top + r - c);
            var u = this.getViewportAdjustedDelta(n, e, l, c);
            u.left ? e.left += u.left : e.top += u.top;
            var p = /top|bottom/.test(n), h = p ? 2 * u.left - o + l : 2 * u.top - r + c, d = p ? "offsetWidth" : "offsetHeight";
            i.offset(e), this.replaceArrow(h, i[0][d], p)
        }, n.prototype.replaceArrow = function (t, e, n) {
            this.arrow().css(n ? "left" : "top", 50 * (1 - t / e) + "%").css(n ? "top" : "left", "")
        }, n.prototype.setContent = function () {
            var t = this.tip(), e = this.getTitle();
            t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e), t.removeClass("fade in top bottom left right")
        }, n.prototype.hide = function (e) {
            function i() {
                "in" != o.hoverState && r.detach(), o.$element.removeAttr("aria-describedby").trigger("hidden.bs." + o.type), e && e()
            }

            var o = this, r = t(this.$tip), s = t.Event("hide.bs." + this.type);
            return this.$element.trigger(s), s.isDefaultPrevented() ? void 0 : (r.removeClass("in"), t.support.transition && r.hasClass("fade") ? r.one("bsTransitionEnd", i).emulateTransitionEnd(n.TRANSITION_DURATION) : i(), this.hoverState = null, this)
        }, n.prototype.fixTitle = function () {
            var t = this.$element;
            (t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
        }, n.prototype.hasContent = function () {
            return this.getTitle()
        }, n.prototype.getPosition = function (e) {
            e = e || this.$element;
            var n = e[0], i = "BODY" == n.tagName, o = n.getBoundingClientRect();
            null == o.width && (o = t.extend({}, o, {width: o.right - o.left, height: o.bottom - o.top}));
            var r = i ? {
                top: 0,
                left: 0
            } : e.offset(), s = {scroll: i ? document.documentElement.scrollTop || document.body.scrollTop : e.scrollTop()}, a = i ? {
                width: t(window).width(),
                height: t(window).height()
            } : null;
            return t.extend({}, o, s, a, r)
        }, n.prototype.getCalculatedOffset = function (t, e, n, i) {
            return "bottom" == t ? {
                top: e.top + e.height,
                left: e.left + e.width / 2 - n / 2
            } : "top" == t ? {
                top: e.top - i,
                left: e.left + e.width / 2 - n / 2
            } : "left" == t ? {
                top: e.top + e.height / 2 - i / 2,
                left: e.left - n
            } : {top: e.top + e.height / 2 - i / 2, left: e.left + e.width}
        }, n.prototype.getViewportAdjustedDelta = function (t, e, n, i) {
            var o = {top: 0, left: 0};
            if (!this.$viewport)return o;
            var r = this.options.viewport && this.options.viewport.padding || 0, s = this.getPosition(this.$viewport);
            if (/right|left/.test(t)) {
                var a = e.top - r - s.scroll, l = e.top + r - s.scroll + i;
                a < s.top ? o.top = s.top - a : l > s.top + s.height && (o.top = s.top + s.height - l)
            } else {
                var c = e.left - r, u = e.left + r + n;
                c < s.left ? o.left = s.left - c : u > s.right && (o.left = s.left + s.width - u)
            }
            return o
        }, n.prototype.getTitle = function () {
            var t, e = this.$element, n = this.options;
            return t = e.attr("data-original-title") || ("function" == typeof n.title ? n.title.call(e[0]) : n.title)
        }, n.prototype.getUID = function (t) {
            do t += ~~(1e6 * Math.random()); while (document.getElementById(t));
            return t
        }, n.prototype.tip = function () {
            if (!this.$tip && (this.$tip = t(this.options.template), 1 != this.$tip.length))throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
            return this.$tip
        }, n.prototype.arrow = function () {
            return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
        }, n.prototype.enable = function () {
            this.enabled = !0
        }, n.prototype.disable = function () {
            this.enabled = !1
        }, n.prototype.toggleEnabled = function () {
            this.enabled = !this.enabled
        }, n.prototype.toggle = function (e) {
            var n = this;
            e && (n = t(e.currentTarget).data("bs." + this.type), n || (n = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, n))), e ? (n.inState.click = !n.inState.click, n.isInStateTrue() ? n.enter(n) : n.leave(n)) : n.tip().hasClass("in") ? n.leave(n) : n.enter(n)
        }, n.prototype.destroy = function () {
            var t = this;
            clearTimeout(this.timeout), this.hide(function () {
                t.$element.off("." + t.type).removeData("bs." + t.type), t.$tip && t.$tip.detach(), t.$tip = null, t.$arrow = null, t.$viewport = null
            })
        };
        var i = t.fn.tooltip;
        t.fn.tooltip = e, t.fn.tooltip.Constructor = n, t.fn.tooltip.noConflict = function () {
            return t.fn.tooltip = i, this
        }
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.popover"), r = "object" == typeof e && e;
                (o || !/destroy|hide/.test(e)) && (o || i.data("bs.popover", o = new n(this, r)), "string" == typeof e && o[e]())
            })
        }

        var n = function (t, e) {
            this.init("popover", t, e)
        };
        if (!t.fn.tooltip)throw new Error("Popover requires tooltip.js");
        n.VERSION = "3.3.5", n.DEFAULTS = t.extend({}, t.fn.tooltip.Constructor.DEFAULTS, {
            placement: "right",
            trigger: "click",
            content: "",
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
        }), n.prototype = t.extend({}, t.fn.tooltip.Constructor.prototype), n.prototype.constructor = n, n.prototype.getDefaults = function () {
            return n.DEFAULTS
        }, n.prototype.setContent = function () {
            var t = this.tip(), e = this.getTitle(), n = this.getContent();
            t.find(".popover-title")[this.options.html ? "html" : "text"](e), t.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof n ? "html" : "append" : "text"](n), t.removeClass("fade top bottom left right in"), t.find(".popover-title").html() || t.find(".popover-title").hide()
        }, n.prototype.hasContent = function () {
            return this.getTitle() || this.getContent()
        }, n.prototype.getContent = function () {
            var t = this.$element, e = this.options;
            return t.attr("data-content") || ("function" == typeof e.content ? e.content.call(t[0]) : e.content)
        }, n.prototype.arrow = function () {
            return this.$arrow = this.$arrow || this.tip().find(".arrow")
        };
        var i = t.fn.popover;
        t.fn.popover = e, t.fn.popover.Constructor = n, t.fn.popover.noConflict = function () {
            return t.fn.popover = i, this
        }
    }(jQuery), +function (t) {
        "use strict";
        function e(n, i) {
            this.$body = t(document.body), this.$scrollElement = t(t(n).is(document.body) ? window : n), this.options = t.extend({}, e.DEFAULTS, i), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", t.proxy(this.process, this)), this.refresh(), this.process()
        }

        function n(n) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.scrollspy"), r = "object" == typeof n && n;
                o || i.data("bs.scrollspy", o = new e(this, r)), "string" == typeof n && o[n]()
            })
        }

        e.VERSION = "3.3.5", e.DEFAULTS = {offset: 10}, e.prototype.getScrollHeight = function () {
            return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
        }, e.prototype.refresh = function () {
            var e = this, n = "offset", i = 0;
            this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight(), t.isWindow(this.$scrollElement[0]) || (n = "position", i = this.$scrollElement.scrollTop()), this.$body.find(this.selector).map(function () {
                var e = t(this), o = e.data("target") || e.attr("href"), r = /^#./.test(o) && t(o);
                return r && r.length && r.is(":visible") && [[r[n]().top + i, o]] || null
            }).sort(function (t, e) {
                return t[0] - e[0]
            }).each(function () {
                e.offsets.push(this[0]), e.targets.push(this[1])
            })
        }, e.prototype.process = function () {
            var t, e = this.$scrollElement.scrollTop() + this.options.offset, n = this.getScrollHeight(), i = this.options.offset + n - this.$scrollElement.height(), o = this.offsets, r = this.targets, s = this.activeTarget;
            if (this.scrollHeight != n && this.refresh(), e >= i)return s != (t = r[r.length - 1]) && this.activate(t);
            if (s && e < o[0])return this.activeTarget = null, this.clear();
            for (t = o.length; t--;)s != r[t] && e >= o[t] && (void 0 === o[t + 1] || e < o[t + 1]) && this.activate(r[t])
        }, e.prototype.activate = function (e) {
            this.activeTarget = e, this.clear();
            var n = this.selector + '[data-target="' + e + '"],' + this.selector + '[href="' + e + '"]', i = t(n).parents("li").addClass("active");
            i.parent(".dropdown-menu").length && (i = i.closest("li.dropdown").addClass("active")), i.trigger("activate.bs.scrollspy")
        }, e.prototype.clear = function () {
            t(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
        };
        var i = t.fn.scrollspy;
        t.fn.scrollspy = n, t.fn.scrollspy.Constructor = e, t.fn.scrollspy.noConflict = function () {
            return t.fn.scrollspy = i, this
        }, t(window).on("load.bs.scrollspy.data-api", function () {
            t('[data-spy="scroll"]').each(function () {
                var e = t(this);
                n.call(e, e.data())
            })
        })
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.tab");
                o || i.data("bs.tab", o = new n(this)), "string" == typeof e && o[e]()
            })
        }

        var n = function (e) {
            this.element = t(e)
        };
        n.VERSION = "3.3.5", n.TRANSITION_DURATION = 150, n.prototype.show = function () {
            var e = this.element, n = e.closest("ul:not(.dropdown-menu)"), i = e.data("target");
            if (i || (i = e.attr("href"), i = i && i.replace(/.*(?=#[^\s]*$)/, "")), !e.parent("li").hasClass("active")) {
                var o = n.find(".active:last a"), r = t.Event("hide.bs.tab", {relatedTarget: e[0]}), s = t.Event("show.bs.tab", {relatedTarget: o[0]});
                if (o.trigger(r), e.trigger(s), !s.isDefaultPrevented() && !r.isDefaultPrevented()) {
                    var a = t(i);
                    this.activate(e.closest("li"), n), this.activate(a, a.parent(), function () {
                        o.trigger({type: "hidden.bs.tab", relatedTarget: e[0]}), e.trigger({
                            type: "shown.bs.tab",
                            relatedTarget: o[0]
                        })
                    })
                }
            }
        }, n.prototype.activate = function (e, i, o) {
            function r() {
                s.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), a ? (e[0].offsetWidth, e.addClass("in")) : e.removeClass("fade"), e.parent(".dropdown-menu").length && e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), o && o()
            }

            var s = i.find("> .active"), a = o && t.support.transition && (s.length && s.hasClass("fade") || !!i.find("> .fade").length);
            s.length && a ? s.one("bsTransitionEnd", r).emulateTransitionEnd(n.TRANSITION_DURATION) : r(), s.removeClass("in")
        };
        var i = t.fn.tab;
        t.fn.tab = e, t.fn.tab.Constructor = n, t.fn.tab.noConflict = function () {
            return t.fn.tab = i, this
        };
        var o = function (n) {
            n.preventDefault(), e.call(t(this), "show")
        };
        t(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', o).on("click.bs.tab.data-api", '[data-toggle="pill"]', o)
    }(jQuery), +function (t) {
        "use strict";
        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.affix"), r = "object" == typeof e && e;
                o || i.data("bs.affix", o = new n(this, r)), "string" == typeof e && o[e]()
            })
        }

        var n = function (e, i) {
            this.options = t.extend({}, n.DEFAULTS, i), this.$target = t(this.options.target).on("scroll.bs.affix.data-api", t.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", t.proxy(this.checkPositionWithEventLoop, this)), this.$element = t(e), this.affixed = null, this.unpin = null, this.pinnedOffset = null, this.checkPosition()
        };
        n.VERSION = "3.3.5", n.RESET = "affix affix-top affix-bottom", n.DEFAULTS = {
            offset: 0,
            target: window
        }, n.prototype.getState = function (t, e, n, i) {
            var o = this.$target.scrollTop(), r = this.$element.offset(), s = this.$target.height();
            if (null != n && "top" == this.affixed)return n > o ? "top" : !1;
            if ("bottom" == this.affixed)return null != n ? o + this.unpin <= r.top ? !1 : "bottom" : t - i >= o + s ? !1 : "bottom";
            var a = null == this.affixed, l = a ? o : r.top, c = a ? s : e;
            return null != n && n >= o ? "top" : null != i && l + c >= t - i ? "bottom" : !1
        }, n.prototype.getPinnedOffset = function () {
            if (this.pinnedOffset)return this.pinnedOffset;
            this.$element.removeClass(n.RESET).addClass("affix");
            var t = this.$target.scrollTop(), e = this.$element.offset();
            return this.pinnedOffset = e.top - t
        }, n.prototype.checkPositionWithEventLoop = function () {
            setTimeout(t.proxy(this.checkPosition, this), 1)
        }, n.prototype.checkPosition = function () {
            if (this.$element.is(":visible")) {
                var e = this.$element.height(), i = this.options.offset, o = i.top, r = i.bottom, s = Math.max(t(document).height(), t(document.body).height());
                "object" != typeof i && (r = o = i), "function" == typeof o && (o = i.top(this.$element)), "function" == typeof r && (r = i.bottom(this.$element));
                var a = this.getState(s, e, o, r);
                if (this.affixed != a) {
                    null != this.unpin && this.$element.css("top", "");
                    var l = "affix" + (a ? "-" + a : ""), c = t.Event(l + ".bs.affix");
                    if (this.$element.trigger(c), c.isDefaultPrevented())return;
                    this.affixed = a, this.unpin = "bottom" == a ? this.getPinnedOffset() : null, this.$element.removeClass(n.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
                }
                "bottom" == a && this.$element.offset({top: s - e - r})
            }
        };
        var i = t.fn.affix;
        t.fn.affix = e, t.fn.affix.Constructor = n, t.fn.affix.noConflict = function () {
            return t.fn.affix = i, this
        }, t(window).on("load", function () {
            t('[data-spy="affix"]').each(function () {
                var n = t(this), i = n.data();
                i.offset = i.offset || {}, null != i.offsetBottom && (i.offset.bottom = i.offsetBottom), null != i.offsetTop && (i.offset.top = i.offsetTop), e.call(n, i)
            })
        })
    }(jQuery), "undefined" == typeof jQuery)throw new Error("Jasny Bootstrap's JavaScript requires jQuery");
+function (t) {
    "use strict";
    function e() {
        var t = document.createElement("bootstrap"), e = {
            WebkitTransition: "webkitTransitionEnd",
            MozTransition: "transitionend",
            OTransition: "oTransitionEnd otransitionend",
            transition: "transitionend"
        };
        for (var n in e)if (void 0 !== t.style[n])return {end: e[n]};
        return !1
    }

    void 0 === t.support.transition && (t.fn.emulateTransitionEnd = function (e) {
        var n = !1, i = this;
        t(this).one(t.support.transition.end, function () {
            n = !0
        });
        var o = function () {
            n || t(i).trigger(t.support.transition.end)
        };
        return setTimeout(o, e), this
    }, t(function () {
        t.support.transition = e()
    }))
}(window.jQuery), +function (t) {
    "use strict";
    var e = function (n, i) {
        this.$element = t(n), this.options = t.extend({}, e.DEFAULTS, i), this.state = null, this.placement = null, this.options.recalc && (this.calcClone(), t(window).on("resize", t.proxy(this.recalc, this))), this.options.autohide && t(document).on("click", t.proxy(this.autohide, this)), this.options.toggle && this.toggle(), this.options.disablescrolling && (this.options.disableScrolling = this.options.disablescrolling, delete this.options.disablescrolling)
    };
    e.DEFAULTS = {
        toggle: !0,
        placement: "auto",
        autohide: !0,
        recalc: !0,
        disableScrolling: !0
    }, e.prototype.offset = function () {
        switch (this.placement) {
            case"left":
            case"right":
                return this.$element.outerWidth();
            case"top":
            case"bottom":
                return this.$element.outerHeight()
        }
    }, e.prototype.calcPlacement = function () {
        function e(t, e) {
            if ("auto" === o.css(e))return t;
            if ("auto" === o.css(t))return e;
            var n = parseInt(o.css(t), 10), i = parseInt(o.css(e), 10);
            return n > i ? e : t
        }

        if ("auto" !== this.options.placement)return void(this.placement = this.options.placement);
        this.$element.hasClass("in") || this.$element.css("visiblity", "hidden !important").addClass("in");
        var n = t(window).width() / this.$element.width(), i = t(window).height() / this.$element.height(), o = this.$element;
        this.placement = n >= i ? e("left", "right") : e("top", "bottom"), "hidden !important" === this.$element.css("visibility") && this.$element.removeClass("in").css("visiblity", "")
    }, e.prototype.opposite = function (t) {
        switch (t) {
            case"top":
                return "bottom";
            case"left":
                return "right";
            case"bottom":
                return "top";
            case"right":
                return "left"
        }
    }, e.prototype.getCanvasElements = function () {
        var e = this.options.canvas ? t(this.options.canvas) : this.$element, n = e.find("*").filter(function () {
            return "fixed" === t(this).css("position")
        }).not(this.options.exclude);
        return e.add(n)
    }, e.prototype.slide = function (e, n, i) {
        if (!t.support.transition) {
            var o = {};
            return o[this.placement] = "+=" + n, e.animate(o, 350, i)
        }
        var r = this.placement, s = this.opposite(r);
        e.each(function () {
            "auto" !== t(this).css(r) && t(this).css(r, (parseInt(t(this).css(r), 10) || 0) + n), "auto" !== t(this).css(s) && t(this).css(s, (parseInt(t(this).css(s), 10) || 0) - n)
        }), this.$element.one(t.support.transition.end, i).emulateTransitionEnd(350)
    }, e.prototype.disableScrolling = function () {
        var e = t("body").width(), n = "padding-" + this.opposite(this.placement);
        if (void 0 === t("body").data("offcanvas-style") && t("body").data("offcanvas-style", t("body").attr("style") || ""), t("body").css("overflow", "hidden"), t("body").width() > e) {
            var i = parseInt(t("body").css(n), 10) + t("body").width() - e;
            setTimeout(function () {
                t("body").css(n, i)
            }, 1)
        }
    }, e.prototype.show = function () {
        if (!this.state) {
            var e = t.Event("show.bs.offcanvas");
            if (this.$element.trigger(e), !e.isDefaultPrevented()) {
                this.state = "slide-in", this.calcPlacement();
                var n = this.getCanvasElements(), i = this.placement, o = this.opposite(i), r = this.offset();
                -1 !== n.index(this.$element) && (t(this.$element).data("offcanvas-style", t(this.$element).attr("style") || ""), this.$element.css(i, -1 * r), this.$element.css(i)), n.addClass("canvas-sliding").each(function () {
                    void 0 === t(this).data("offcanvas-style") && t(this).data("offcanvas-style", t(this).attr("style") || ""), "static" === t(this).css("position") && t(this).css("position", "relative"), "auto" !== t(this).css(i) && "0px" !== t(this).css(i) || "auto" !== t(this).css(o) && "0px" !== t(this).css(o) || t(this).css(i, 0)
                }), this.options.disableScrolling && this.disableScrolling();
                var s = function () {
                    "slide-in" == this.state && (this.state = "slid", n.removeClass("canvas-sliding").addClass("canvas-slid"), this.$element.trigger("shown.bs.offcanvas"))
                };
                setTimeout(t.proxy(function () {
                    this.$element.addClass("in"), this.slide(n, r, t.proxy(s, this))
                }, this), 1)
            }
        }
    }, e.prototype.hide = function () {
        if ("slid" === this.state) {
            var e = t.Event("hide.bs.offcanvas");
            if (this.$element.trigger(e), !e.isDefaultPrevented()) {
                this.state = "slide-out";
                var n = t(".canvas-slid"), i = (this.placement, -1 * this.offset()), o = function () {
                    "slide-out" == this.state && (this.state = null, this.placement = null, this.$element.removeClass("in"), n.removeClass("canvas-sliding"), n.add(this.$element).add("body").each(function () {
                        t(this).attr("style", t(this).data("offcanvas-style")).removeData("offcanvas-style")
                    }), this.$element.trigger("hidden.bs.offcanvas"))
                };
                n.removeClass("canvas-slid").addClass("canvas-sliding"), setTimeout(t.proxy(function () {
                    this.slide(n, i, t.proxy(o, this))
                }, this), 1)
            }
        }
    }, e.prototype.toggle = function () {
        "slide-in" !== this.state && "slide-out" !== this.state && this["slid" === this.state ? "hide" : "show"]()
    }, e.prototype.calcClone = function () {
        this.$calcClone = this.$element.clone().html("").addClass("offcanvas-clone").removeClass("in").appendTo(t("body"))
    }, e.prototype.recalc = function () {
        if ("none" !== this.$calcClone.css("display") && ("slid" === this.state || "slide-in" === this.state)) {
            this.state = null, this.placement = null;
            var e = this.getCanvasElements();
            this.$element.removeClass("in"), e.removeClass("canvas-slid"), e.add(this.$element).add("body").each(function () {
                t(this).attr("style", t(this).data("offcanvas-style")).removeData("offcanvas-style")
            })
        }
    }, e.prototype.autohide = function (e) {
        0 === t(e.target).closest(this.$element).length && this.hide()
    };
    var n = t.fn.offcanvas;
    t.fn.offcanvas = function (n) {
        return this.each(function () {
            var i = t(this), o = i.data("bs.offcanvas"), r = t.extend({}, e.DEFAULTS, i.data(), "object" == typeof n && n);
            o || i.data("bs.offcanvas", o = new e(this, r)), "string" == typeof n && o[n]()
        })
    }, t.fn.offcanvas.Constructor = e, t.fn.offcanvas.noConflict = function () {
        return t.fn.offcanvas = n, this
    }, t(document).on("click.bs.offcanvas.data-api", "[data-toggle=offcanvas]", function (e) {
        var n, i = t(this), o = i.attr("data-target") || e.preventDefault() || (n = i.attr("href")) && n.replace(/.*(?=#[^\s]+$)/, ""), r = t(o), s = r.data("bs.offcanvas"), a = s ? "toggle" : i.data();
        e.stopPropagation(), s ? s.toggle() : r.offcanvas(a)
    })
}(window.jQuery), +function (t) {
    "use strict";
    var e = function (n, i) {
        this.$element = t(n), this.options = t.extend({}, e.DEFAULTS, i), this.$element.on("click.bs.rowlink", "td:not(.rowlink-skip)", t.proxy(this.click, this))
    };
    e.DEFAULTS = {target: "a"}, e.prototype.click = function (e) {
        var n = t(e.currentTarget).closest("tr").find(this.options.target)[0];
        if (t(e.target)[0] !== n)if (e.preventDefault(), n.click)n.click(); else if (document.createEvent) {
            var i = document.createEvent("MouseEvents");
            i.initMouseEvent("click", !0, !0, window, 0, 0, 0, 0, 0, !1, !1, !1, !1, 0, null), n.dispatchEvent(i)
        }
    };
    var n = t.fn.rowlink;
    t.fn.rowlink = function (n) {
        return this.each(function () {
            var i = t(this), o = i.data("bs.rowlink");
            o || i.data("bs.rowlink", o = new e(this, n))
        })
    }, t.fn.rowlink.Constructor = e, t.fn.rowlink.noConflict = function () {
        return t.fn.rowlink = n, this
    }, t(document).on("click.bs.rowlink.data-api", '[data-link="row"]', function (e) {
        if (0 === t(e.target).closest(".rowlink-skip").length) {
            var n = t(this);
            n.data("bs.rowlink") || (n.rowlink(n.data()), t(e.target).trigger("click.bs.rowlink"))
        }
    })
}(window.jQuery), +function (t) {
    "use strict";
    var e = void 0 !== window.orientation, n = navigator.userAgent.toLowerCase().indexOf("android") > -1, i = "Microsoft Internet Explorer" == window.navigator.appName, o = function (e, i) {
        n || (this.$element = t(e), this.options = t.extend({}, o.DEFAULTS, i), this.mask = String(this.options.mask), this.init(), this.listen(), this.checkVal())
    };
    o.DEFAULTS = {
        mask: "",
        placeholder: "_",
        definitions: {9: "[0-9]", a: "[A-Za-z]", w: "[A-Za-z0-9]", "*": "."}
    }, o.prototype.init = function () {
        var e = this.options.definitions, n = this.mask.length;
        this.tests = [], this.partialPosition = this.mask.length, this.firstNonMaskPos = null, t.each(this.mask.split(""), t.proxy(function (t, i) {
            "?" == i ? (n--, this.partialPosition = t) : e[i] ? (this.tests.push(new RegExp(e[i])), null === this.firstNonMaskPos && (this.firstNonMaskPos = this.tests.length - 1)) : this.tests.push(null)
        }, this)), this.buffer = t.map(this.mask.split(""), t.proxy(function (t) {
            return "?" != t ? e[t] ? this.options.placeholder : t : void 0
        }, this)), this.focusText = this.$element.val(), this.$element.data("rawMaskFn", t.proxy(function () {
            return t.map(this.buffer, function (t, e) {
                return this.tests[e] && t != this.options.placeholder ? t : null
            }).join("")
        }, this))
    }, o.prototype.listen = function () {
        if (!this.$element.attr("readonly")) {
            var e = (i ? "paste" : "input") + ".mask";
            this.$element.on("unmask.bs.inputmask", t.proxy(this.unmask, this)).on("focus.bs.inputmask", t.proxy(this.focusEvent, this)).on("blur.bs.inputmask", t.proxy(this.blurEvent, this)).on("keydown.bs.inputmask", t.proxy(this.keydownEvent, this)).on("keypress.bs.inputmask", t.proxy(this.keypressEvent, this)).on(e, t.proxy(this.pasteEvent, this))
        }
    }, o.prototype.caret = function (t, e) {
        if (0 !== this.$element.length) {
            if ("number" == typeof t)return e = "number" == typeof e ? e : t, this.$element.each(function () {
                if (this.setSelectionRange)this.setSelectionRange(t, e); else if (this.createTextRange) {
                    var n = this.createTextRange();
                    n.collapse(!0), n.moveEnd("character", e), n.moveStart("character", t), n.select()
                }
            });
            if (this.$element[0].setSelectionRange)t = this.$element[0].selectionStart, e = this.$element[0].selectionEnd; else if (document.selection && document.selection.createRange) {
                var n = document.selection.createRange();
                t = 0 - n.duplicate().moveStart("character", -1e5), e = t + n.text.length
            }
            return {begin: t, end: e}
        }
    }, o.prototype.seekNext = function (t) {
        for (var e = this.mask.length; ++t <= e && !this.tests[t];);
        return t
    }, o.prototype.seekPrev = function (t) {
        for (; --t >= 0 && !this.tests[t];);
        return t
    }, o.prototype.shiftL = function (t, e) {
        var n = this.mask.length;
        if (!(0 > t)) {
            for (var i = t, o = this.seekNext(e); n > i; i++)if (this.tests[i]) {
                if (!(n > o && this.tests[i].test(this.buffer[o])))break;
                this.buffer[i] = this.buffer[o], this.buffer[o] = this.options.placeholder, o = this.seekNext(o)
            }
            this.writeBuffer(), this.caret(Math.max(this.firstNonMaskPos, t))
        }
    }, o.prototype.shiftR = function (t) {
        for (var e = this.mask.length, n = t, i = this.options.placeholder; e > n; n++)if (this.tests[n]) {
            var o = this.seekNext(n), r = this.buffer[n];
            if (this.buffer[n] = i, !(e > o && this.tests[o].test(r)))break;
            i = r
        }
    }, o.prototype.unmask = function () {
        this.$element.unbind(".mask").removeData("inputmask")
    }, o.prototype.focusEvent = function () {
        this.focusText = this.$element.val();
        var t = this.mask.length, e = this.checkVal();
        this.writeBuffer();
        var n = this, i = function () {
            e == t ? n.caret(0, e) : n.caret(e)
        };
        i(), setTimeout(i, 50)
    }, o.prototype.blurEvent = function () {
        this.checkVal(), this.$element.val() !== this.focusText && this.$element.trigger("change")
    }, o.prototype.keydownEvent = function (t) {
        var n = t.which;
        if (8 == n || 46 == n || e && 127 == n) {
            var i = this.caret(), o = i.begin, r = i.end;
            return r - o === 0 && (o = 46 != n ? this.seekPrev(o) : r = this.seekNext(o - 1), r = 46 == n ? this.seekNext(r) : r), this.clearBuffer(o, r), this.shiftL(o, r - 1), !1
        }
        return 27 == n ? (this.$element.val(this.focusText), this.caret(0, this.checkVal()), !1) : void 0
    }, o.prototype.keypressEvent = function (t) {
        var e = this.mask.length, n = t.which, i = this.caret();
        if (t.ctrlKey || t.altKey || t.metaKey || 32 > n)return !0;
        if (n) {
            i.end - i.begin !== 0 && (this.clearBuffer(i.begin, i.end), this.shiftL(i.begin, i.end - 1));
            var o = this.seekNext(i.begin - 1);
            if (e > o) {
                var r = String.fromCharCode(n);
                if (this.tests[o].test(r)) {
                    this.shiftR(o), this.buffer[o] = r, this.writeBuffer();
                    var s = this.seekNext(o);
                    this.caret(s)
                }
            }
            return !1
        }
    }, o.prototype.pasteEvent = function () {
        var t = this;
        setTimeout(function () {
            t.caret(t.checkVal(!0))
        }, 0)
    }, o.prototype.clearBuffer = function (t, e) {
        for (var n = this.mask.length, i = t; e > i && n > i; i++)this.tests[i] && (this.buffer[i] = this.options.placeholder)
    }, o.prototype.writeBuffer = function () {
        return this.$element.val(this.buffer.join("")).val()
    }, o.prototype.checkVal = function (t) {
        for (var e = this.mask.length, n = this.$element.val(), i = -1, o = 0, r = 0; e > o; o++)if (this.tests[o]) {
            for (this.buffer[o] = this.options.placeholder; r++ < n.length;) {
                var s = n.charAt(r - 1);
                if (this.tests[o].test(s)) {
                    this.buffer[o] = s, i = o;
                    break
                }
            }
            if (r > n.length)break
        } else this.buffer[o] == n.charAt(r) && o != this.partialPosition && (r++, i = o);
        return !t && i + 1 < this.partialPosition ? (this.$element.val(""), this.clearBuffer(0, e)) : (t || i + 1 >= this.partialPosition) && (this.writeBuffer(), t || this.$element.val(this.$element.val().substring(0, i + 1))), this.partialPosition ? o : this.firstNonMaskPos
    };
    var r = t.fn.inputmask;
    t.fn.inputmask = function (e) {
        return this.each(function () {
            var n = t(this), i = n.data("bs.inputmask");
            i || n.data("bs.inputmask", i = new o(this, e))
        })
    }, t.fn.inputmask.Constructor = o, t.fn.inputmask.noConflict = function () {
        return t.fn.inputmask = r, this
    }, t(document).on("focus.bs.inputmask.data-api", "[data-mask]", function () {
        var e = t(this);
        e.data("bs.inputmask") || e.inputmask(e.data())
    })
}(window.jQuery), +function (t) {
    "use strict";
    var e = "Microsoft Internet Explorer" == window.navigator.appName, n = function (e, n) {
        if (this.$element = t(e), this.$input = this.$element.find(":file"), 0 !== this.$input.length) {
            this.name = this.$input.attr("name") || n.name, this.$hidden = this.$element.find('input[type=hidden][name="' + this.name + '"]'), 0 === this.$hidden.length && (this.$hidden = t('<input type="hidden">').insertBefore(this.$input)), this.$preview = this.$element.find(".fileinput-preview");
            var i = this.$preview.css("height");
            "inline" !== this.$preview.css("display") && "0px" !== i && "none" !== i && this.$preview.css("line-height", i), this.original = {
                exists: this.$element.hasClass("fileinput-exists"),
                preview: this.$preview.html(),
                hiddenVal: this.$hidden.val()
            }, this.listen()
        }
    };
    n.prototype.listen = function () {
        this.$input.on("change.bs.fileinput", t.proxy(this.change, this)), t(this.$input[0].form).on("reset.bs.fileinput", t.proxy(this.reset, this)), this.$element.find('[data-trigger="fileinput"]').on("click.bs.fileinput", t.proxy(this.trigger, this)), this.$element.find('[data-dismiss="fileinput"]').on("click.bs.fileinput", t.proxy(this.clear, this))
    }, n.prototype.change = function (e) {
        var n = void 0 === e.target.files ? e.target && e.target.value ? [{name: e.target.value.replace(/^.+\\/, "")}] : [] : e.target.files;
        if (e.stopPropagation(), 0 === n.length)return void this.clear();
        this.$hidden.val(""), this.$hidden.attr("name", ""), this.$input.attr("name", this.name);
        var i = n[0];
        if (this.$preview.length > 0 && ("undefined" != typeof i.type ? i.type.match(/^image\/(gif|png|jpeg)$/) : i.name.match(/\.(gif|png|jpe?g)$/i)) && "undefined" != typeof FileReader) {
            var o = new FileReader, r = this.$preview, s = this.$element;
            o.onload = function (e) {
                var o = t("<img>");
                o[0].src = e.target.result, n[0].result = e.target.result, s.find(".fileinput-filename").text(i.name), "none" != r.css("max-height") && o.css("max-height", parseInt(r.css("max-height"), 10) - parseInt(r.css("padding-top"), 10) - parseInt(r.css("padding-bottom"), 10) - parseInt(r.css("border-top"), 10) - parseInt(r.css("border-bottom"), 10)), r.html(o), s.addClass("fileinput-exists").removeClass("fileinput-new"), s.trigger("change.bs.fileinput", n)
            }, o.readAsDataURL(i)
        } else this.$element.find(".fileinput-filename").text(i.name), this.$preview.text(i.name), this.$element.addClass("fileinput-exists").removeClass("fileinput-new"), this.$element.trigger("change.bs.fileinput")
    }, n.prototype.clear = function (t) {
        if (t && t.preventDefault(), this.$hidden.val(""), this.$hidden.attr("name", this.name), this.$input.attr("name", ""), e) {
            var n = this.$input.clone(!0);
            this.$input.after(n), this.$input.remove(), this.$input = n
        } else this.$input.val("");
        this.$preview.html(""), this.$element.find(".fileinput-filename").text(""), this.$element.addClass("fileinput-new").removeClass("fileinput-exists"), void 0 !== t && (this.$input.trigger("change"), this.$element.trigger("clear.bs.fileinput"))
    }, n.prototype.reset = function () {
        this.clear(), this.$hidden.val(this.original.hiddenVal), this.$preview.html(this.original.preview), this.$element.find(".fileinput-filename").text(""), this.original.exists ? this.$element.addClass("fileinput-exists").removeClass("fileinput-new") : this.$element.addClass("fileinput-new").removeClass("fileinput-exists"), this.$element.trigger("reset.bs.fileinput")
    }, n.prototype.trigger = function (t) {
        this.$input.trigger("click"), t.preventDefault()
    };
    var i = t.fn.fileinput;
    t.fn.fileinput = function (e) {
        return this.each(function () {
            var i = t(this), o = i.data("bs.fileinput");
            o || i.data("bs.fileinput", o = new n(this, e)), "string" == typeof e && o[e]()
        })
    }, t.fn.fileinput.Constructor = n, t.fn.fileinput.noConflict = function () {
        return t.fn.fileinput = i, this
    }, t(document).on("click.fileinput.data-api", '[data-provides="fileinput"]', function (e) {
        var n = t(this);
        if (!n.data("bs.fileinput")) {
            n.fileinput(n.data());
            var i = t(e.target).closest('[data-dismiss="fileinput"],[data-trigger="fileinput"]');
            i.length > 0 && (e.preventDefault(), i.trigger("click.bs.fileinput"))
        }
    })
}(window.jQuery), function (t, e, n, i) {
    "use strict";
    var o = n("html"), r = n(t), s = n(e), a = n.fancybox = function () {
        a.open.apply(this, arguments)
    }, l = navigator.userAgent.match(/msie/i), c = null, u = e.createTouch !== i, p = function (t) {
        return t && t.hasOwnProperty && t instanceof n
    }, h = function (t) {
        return t && "string" === n.type(t)
    }, d = function (t) {
        return h(t) && t.indexOf("%") > 0
    }, f = function (t) {
        return t && !(t.style.overflow && "hidden" === t.style.overflow) && (t.clientWidth && t.scrollWidth > t.clientWidth || t.clientHeight && t.scrollHeight > t.clientHeight)
    }, g = function (t, e) {
        var n = parseInt(t, 10) || 0;
        return e && d(t) && (n = a.getViewport()[e] / 100 * n), Math.ceil(n)
    }, m = function (t, e) {
        return g(t, e) + "px"
    };
    n.extend(a, {
        version: "2.1.5",
        defaults: {
            padding: 15,
            margin: 20,
            width: 800,
            height: 600,
            minWidth: 100,
            minHeight: 100,
            maxWidth: 9999,
            maxHeight: 9999,
            pixelRatio: 1,
            autoSize: !0,
            autoHeight: !1,
            autoWidth: !1,
            autoResize: !0,
            autoCenter: !u,
            fitToView: !0,
            aspectRatio: !1,
            topRatio: .5,
            leftRatio: .5,
            scrolling: "auto",
            wrapCSS: "",
            arrows: !0,
            closeBtn: !0,
            closeClick: !1,
            nextClick: !1,
            mouseWheel: !0,
            autoPlay: !1,
            playSpeed: 3e3,
            preload: 3,
            modal: !1,
            loop: !0,
            ajax: {dataType: "html", headers: {"X-fancyBox": !0}},
            iframe: {scrolling: "auto", preload: !0},
            swf: {wmode: "transparent", allowfullscreen: "true", allowscriptaccess: "always"},
            keys: {
                next: {13: "left", 34: "up", 39: "left", 40: "up"},
                prev: {8: "right", 33: "down", 37: "right", 38: "down"},
                close: [27],
                play: [32],
                toggle: [70]
            },
            direction: {next: "left", prev: "right"},
            scrollOutside: !0,
            index: 0,
            type: null,
            href: null,
            content: null,
            title: null,
            tpl: {
                wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
                image: '<img class="fancybox-image" src="{href}" alt="" />',
                iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (l ? ' allowtransparency="true"' : "") + "></iframe>",
                error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
                next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
                prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
            },
            openEffect: "fade",
            openSpeed: 250,
            openEasing: "swing",
            openOpacity: !0,
            openMethod: "zoomIn",
            closeEffect: "fade",
            closeSpeed: 250,
            closeEasing: "swing",
            closeOpacity: !0,
            closeMethod: "zoomOut",
            nextEffect: "elastic",
            nextSpeed: 250,
            nextEasing: "swing",
            nextMethod: "changeIn",
            prevEffect: "elastic",
            prevSpeed: 250,
            prevEasing: "swing",
            prevMethod: "changeOut",
            helpers: {overlay: !0, title: !0},
            onCancel: n.noop,
            beforeLoad: n.noop,
            afterLoad: n.noop,
            beforeShow: n.noop,
            afterShow: n.noop,
            beforeChange: n.noop,
            beforeClose: n.noop,
            afterClose: n.noop
        },
        group: {},
        opts: {},
        previous: null,
        coming: null,
        current: null,
        isActive: !1,
        isOpen: !1,
        isOpened: !1,
        wrap: null,
        skin: null,
        outer: null,
        inner: null,
        player: {timer: null, isActive: !1},
        ajaxLoad: null,
        imgPreload: null,
        transitions: {},
        helpers: {},
        open: function (t, e) {
            return t && (n.isPlainObject(e) || (e = {}), !1 !== a.close(!0)) ? (n.isArray(t) || (t = p(t) ? n(t).get() : [t]), n.each(t, function (o, r) {
                var s, l, c, u, d, f, g, m = {};
                "object" === n.type(r) && (r.nodeType && (r = n(r)), p(r) ? (m = {
                    href: r.data("fancybox-href") || r.attr("href"),
                    title: r.data("fancybox-title") || r.attr("title"),
                    isDom: !0,
                    element: r
                }, n.metadata && n.extend(!0, m, r.metadata())) : m = r), s = e.href || m.href || (h(r) ? r : null), l = e.title !== i ? e.title : m.title || "", c = e.content || m.content, u = c ? "html" : e.type || m.type, !u && m.isDom && (u = r.data("fancybox-type"), u || (d = r.prop("class").match(/fancybox\.(\w+)/), u = d ? d[1] : null)), h(s) && (u || (a.isImage(s) ? u = "image" : a.isSWF(s) ? u = "swf" : "#" === s.charAt(0) ? u = "inline" : h(r) && (u = "html", c = r)), "ajax" === u && (f = s.split(/\s+/, 2), s = f.shift(), g = f.shift())), c || ("inline" === u ? s ? c = n(h(s) ? s.replace(/.*(?=#[^\s]+$)/, "") : s) : m.isDom && (c = r) : "html" === u ? c = s : u || s || !m.isDom || (u = "inline", c = r)), n.extend(m, {
                    href: s,
                    type: u,
                    content: c,
                    title: l,
                    selector: g
                }), t[o] = m
            }), a.opts = n.extend(!0, {}, a.defaults, e), e.keys !== i && (a.opts.keys = e.keys ? n.extend({}, a.defaults.keys, e.keys) : !1), a.group = t, a._start(a.opts.index)) : void 0
        },
        cancel: function () {
            var t = a.coming;
            t && !1 !== a.trigger("onCancel") && (a.hideLoading(), a.ajaxLoad && a.ajaxLoad.abort(), a.ajaxLoad = null, a.imgPreload && (a.imgPreload.onload = a.imgPreload.onerror = null), t.wrap && t.wrap.stop(!0, !0).trigger("onReset").remove(), a.coming = null, a.current || a._afterZoomOut(t))
        },
        close: function (t) {
            a.cancel(), !1 !== a.trigger("beforeClose") && (a.unbindEvents(), a.isActive && (a.isOpen && t !== !0 ? (a.isOpen = a.isOpened = !1, a.isClosing = !0, n(".fancybox-item, .fancybox-nav").remove(), a.wrap.stop(!0, !0).removeClass("fancybox-opened"), a.transitions[a.current.closeMethod]()) : (n(".fancybox-wrap").stop(!0).trigger("onReset").remove(), a._afterZoomOut())))
        },
        play: function (t) {
            var e = function () {
                clearTimeout(a.player.timer)
            }, n = function () {
                e(), a.current && a.player.isActive && (a.player.timer = setTimeout(a.next, a.current.playSpeed))
            }, i = function () {
                e(), s.unbind(".player"), a.player.isActive = !1, a.trigger("onPlayEnd")
            }, o = function () {
                a.current && (a.current.loop || a.current.index < a.group.length - 1) && (a.player.isActive = !0, s.bind({
                    "onCancel.player beforeClose.player": i,
                    "onUpdate.player": n,
                    "beforeLoad.player": e
                }), n(), a.trigger("onPlayStart"))
            };
            t === !0 || !a.player.isActive && t !== !1 ? o() : i()
        },
        next: function (t) {
            var e = a.current;
            e && (h(t) || (t = e.direction.next), a.jumpto(e.index + 1, t, "next"))
        },
        prev: function (t) {
            var e = a.current;
            e && (h(t) || (t = e.direction.prev), a.jumpto(e.index - 1, t, "prev"))
        },
        jumpto: function (t, e, n) {
            var o = a.current;
            o && (t = g(t), a.direction = e || o.direction[t >= o.index ? "next" : "prev"], a.router = n || "jumpto", o.loop && (0 > t && (t = o.group.length + t % o.group.length), t %= o.group.length), o.group[t] !== i && (a.cancel(), a._start(t)))
        },
        reposition: function (t, e) {
            var i, o = a.current, r = o ? o.wrap : null;
            r && (i = a._getPosition(e), t && "scroll" === t.type ? (delete i.position, r.stop(!0, !0).animate(i, 200)) : (r.css(i), o.pos = n.extend({}, o.dim, i)))
        },
        update: function (t) {
            var e = t && t.type, n = !e || "orientationchange" === e;
            n && (clearTimeout(c), c = null), a.isOpen && !c && (c = setTimeout(function () {
                var i = a.current;
                i && !a.isClosing && (a.wrap.removeClass("fancybox-tmp"), (n || "load" === e || "resize" === e && i.autoResize) && a._setDimension(), "scroll" === e && i.canShrink || a.reposition(t), a.trigger("onUpdate"), c = null)
            }, n && !u ? 0 : 300))
        },
        toggle: function (t) {
            a.isOpen && (a.current.fitToView = "boolean" === n.type(t) ? t : !a.current.fitToView, u && (a.wrap.removeAttr("style").addClass("fancybox-tmp"), a.trigger("onUpdate")), a.update())
        },
        hideLoading: function () {
            s.unbind(".loading"), n("#fancybox-loading").remove()
        },
        showLoading: function () {
            var t, e;
            a.hideLoading(), t = n('<div id="fancybox-loading"><div></div></div>').click(a.cancel).appendTo("body"), s.bind("keydown.loading", function (t) {
                27 === (t.which || t.keyCode) && (t.preventDefault(), a.cancel())
            }), a.defaults.fixed || (e = a.getViewport(), t.css({
                position: "absolute",
                top: .5 * e.h + e.y,
                left: .5 * e.w + e.x
            }))
        },
        getViewport: function () {
            var e = a.current && a.current.locked || !1, n = {x: r.scrollLeft(), y: r.scrollTop()};
            return e ? (n.w = e[0].clientWidth, n.h = e[0].clientHeight) : (n.w = u && t.innerWidth ? t.innerWidth : r.width(), n.h = u && t.innerHeight ? t.innerHeight : r.height()), n
        },
        unbindEvents: function () {
            a.wrap && p(a.wrap) && a.wrap.unbind(".fb"), s.unbind(".fb"), r.unbind(".fb")
        },
        bindEvents: function () {
            var t, e = a.current;
            e && (r.bind("orientationchange.fb" + (u ? "" : " resize.fb") + (e.autoCenter && !e.locked ? " scroll.fb" : ""), a.update), t = e.keys, t && s.bind("keydown.fb", function (o) {
                var r = o.which || o.keyCode, s = o.target || o.srcElement;
                return 27 === r && a.coming ? !1 : void(o.ctrlKey || o.altKey || o.shiftKey || o.metaKey || s && (s.type || n(s).is("[contenteditable]")) || n.each(t, function (t, s) {
                    return e.group.length > 1 && s[r] !== i ? (a[t](s[r]), o.preventDefault(), !1) : n.inArray(r, s) > -1 ? (a[t](), o.preventDefault(), !1) : void 0
                }))
            }), n.fn.mousewheel && e.mouseWheel && a.wrap.bind("mousewheel.fb", function (t, i, o, r) {
                for (var s = t.target || null, l = n(s), c = !1; l.length && !(c || l.is(".fancybox-skin") || l.is(".fancybox-wrap"));)c = f(l[0]), l = n(l).parent();
                0 === i || c || a.group.length > 1 && !e.canShrink && (r > 0 || o > 0 ? a.prev(r > 0 ? "down" : "left") : (0 > r || 0 > o) && a.next(0 > r ? "up" : "right"), t.preventDefault())
            }))
        },
        trigger: function (t, e) {
            var i, o = e || a.coming || a.current;
            if (o) {
                if (n.isFunction(o[t]) && (i = o[t].apply(o, Array.prototype.slice.call(arguments, 1))), i === !1)return !1;
                o.helpers && n.each(o.helpers, function (e, i) {
                    i && a.helpers[e] && n.isFunction(a.helpers[e][t]) && a.helpers[e][t](n.extend(!0, {}, a.helpers[e].defaults, i), o)
                }), s.trigger(t)
            }
        },
        isImage: function (t) {
            return h(t) && t.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)
        },
        isSWF: function (t) {
            return h(t) && t.match(/\.(swf)((\?|#).*)?$/i)
        },
        _start: function (t) {
            var e, i, o, r, s, l = {};
            if (t = g(t), e = a.group[t] || null, !e)return !1;
            if (l = n.extend(!0, {}, a.opts, e), r = l.margin, s = l.padding, "number" === n.type(r) && (l.margin = [r, r, r, r]), "number" === n.type(s) && (l.padding = [s, s, s, s]), l.modal && n.extend(!0, l, {
                    closeBtn: !1,
                    closeClick: !1,
                    nextClick: !1,
                    arrows: !1,
                    mouseWheel: !1,
                    keys: null,
                    helpers: {overlay: {closeClick: !1}}
                }), l.autoSize && (l.autoWidth = l.autoHeight = !0), "auto" === l.width && (l.autoWidth = !0), "auto" === l.height && (l.autoHeight = !0), l.group = a.group, l.index = t, a.coming = l, !1 === a.trigger("beforeLoad"))return void(a.coming = null);
            if (o = l.type, i = l.href, !o)return a.coming = null, a.current && a.router && "jumpto" !== a.router ? (a.current.index = t, a[a.router](a.direction)) : !1;
            if (a.isActive = !0, ("image" === o || "swf" === o) && (l.autoHeight = l.autoWidth = !1, l.scrolling = "visible"), "image" === o && (l.aspectRatio = !0), "iframe" === o && u && (l.scrolling = "scroll"), l.wrap = n(l.tpl.wrap).addClass("fancybox-" + (u ? "mobile" : "desktop") + " fancybox-type-" + o + " fancybox-tmp " + l.wrapCSS).appendTo(l.parent || "body"), n.extend(l, {
                    skin: n(".fancybox-skin", l.wrap),
                    outer: n(".fancybox-outer", l.wrap),
                    inner: n(".fancybox-inner", l.wrap)
                }), n.each(["Top", "Right", "Bottom", "Left"], function (t, e) {
                    l.skin.css("padding" + e, m(l.padding[t]))
                }), a.trigger("onReady"), "inline" === o || "html" === o) {
                if (!l.content || !l.content.length)return a._error("content")
            } else if (!i)return a._error("href");
            "image" === o ? a._loadImage() : "ajax" === o ? a._loadAjax() : "iframe" === o ? a._loadIframe() : a._afterLoad()
        },
        _error: function (t) {
            n.extend(a.coming, {
                type: "html",
                autoWidth: !0,
                autoHeight: !0,
                minWidth: 0,
                minHeight: 0,
                scrolling: "no",
                hasError: t,
                content: a.coming.tpl.error
            }), a._afterLoad()
        },
        _loadImage: function () {
            var t = a.imgPreload = new Image;
            t.onload = function () {
                this.onload = this.onerror = null, a.coming.width = this.width / a.opts.pixelRatio, a.coming.height = this.height / a.opts.pixelRatio, a._afterLoad()
            }, t.onerror = function () {
                this.onload = this.onerror = null, a._error("image")
            }, t.src = a.coming.href, t.complete !== !0 && a.showLoading()
        },
        _loadAjax: function () {
            var t = a.coming;
            a.showLoading(), a.ajaxLoad = n.ajax(n.extend({}, t.ajax, {
                url: t.href, error: function (t, e) {
                    a.coming && "abort" !== e ? a._error("ajax", t) : a.hideLoading()
                }, success: function (e, n) {
                    "success" === n && (t.content = e, a._afterLoad())
                }
            }))
        },
        _loadIframe: function () {
            var t = a.coming, e = n(t.tpl.iframe.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", u ? "auto" : t.iframe.scrolling).attr("src", t.href);
            n(t.wrap).bind("onReset", function () {
                try {
                    n(this).find("iframe").hide().attr("src", "//about:blank").end().empty()
                } catch (t) {
                }
            }), t.iframe.preload && (a.showLoading(), e.one("load", function () {
                n(this).data("ready", 1), u || n(this).bind("load.fb", a.update), n(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show(), a._afterLoad()
            })), t.content = e.appendTo(t.inner), t.iframe.preload || a._afterLoad()
        },
        _preloadImages: function () {
            var t, e, n = a.group, i = a.current, o = n.length, r = i.preload ? Math.min(i.preload, o - 1) : 0;
            for (e = 1; r >= e; e += 1)t = n[(i.index + e) % o], "image" === t.type && t.href && ((new Image).src = t.href)
        },
        _afterLoad: function () {
            var t, e, i, o, r, s, l = a.coming, c = a.current, u = "fancybox-placeholder";
            if (a.hideLoading(), l && a.isActive !== !1) {
                if (!1 === a.trigger("afterLoad", l, c))return l.wrap.stop(!0).trigger("onReset").remove(), void(a.coming = null);
                switch (c && (a.trigger("beforeChange", c), c.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove()), a.unbindEvents(), t = l, e = l.content, i = l.type, o = l.scrolling, n.extend(a, {
                    wrap: t.wrap,
                    skin: t.skin,
                    outer: t.outer,
                    inner: t.inner,
                    current: t,
                    previous: c
                }), r = t.href, i) {
                    case"inline":
                    case"ajax":
                    case"html":
                        t.selector ? e = n("<div>").html(e).find(t.selector) : p(e) && (e.data(u) || e.data(u, n('<div class="' + u + '"></div>').insertAfter(e).hide()), e = e.show().detach(), t.wrap.bind("onReset", function () {
                            n(this).find(e).length && e.hide().replaceAll(e.data(u)).data(u, !1)
                        }));
                        break;
                    case"image":
                        e = t.tpl.image.replace("{href}", r);
                        break;
                    case"swf":
                        e = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + r + '"></param>', s = "", n.each(t.swf, function (t, n) {
                            e += '<param name="' + t + '" value="' + n + '"></param>', s += " " + t + '="' + n + '"'
                        }), e += '<embed src="' + r + '" type="application/x-shockwave-flash" width="100%" height="100%"' + s + "></embed></object>"
                }
                p(e) && e.parent().is(t.inner) || t.inner.append(e), a.trigger("beforeShow"), t.inner.css("overflow", "yes" === o ? "scroll" : "no" === o ? "hidden" : o), a._setDimension(), a.reposition(), a.isOpen = !1, a.coming = null, a.bindEvents(), a.isOpened ? c.prevMethod && a.transitions[c.prevMethod]() : n(".fancybox-wrap").not(t.wrap).stop(!0).trigger("onReset").remove(), a.transitions[a.isOpened ? t.nextMethod : t.openMethod](), a._preloadImages()
            }
        },
        _setDimension: function () {
            var t, e, i, o, r, s, l, c, u, p, h, f, v, y, b, x = a.getViewport(), w = 0, T = !1, C = !1, k = a.wrap, $ = a.skin, E = a.inner, S = a.current, D = S.width, N = S.height, A = S.minWidth, j = S.minHeight, O = S.maxWidth, L = S.maxHeight, I = S.scrolling, R = S.scrollOutside ? S.scrollbarWidth : 0, P = S.margin, H = g(P[1] + P[3]), F = g(P[0] + P[2]);
            if (k.add($).add(E).width("auto").height("auto").removeClass("fancybox-tmp"), t = g($.outerWidth(!0) - $.width()), e = g($.outerHeight(!0) - $.height()), i = H + t, o = F + e, r = d(D) ? (x.w - i) * g(D) / 100 : D, s = d(N) ? (x.h - o) * g(N) / 100 : N, "iframe" === S.type) {
                if (y = S.content, S.autoHeight && 1 === y.data("ready"))try {
                    y[0].contentWindow.document.location && (E.width(r).height(9999), b = y.contents().find("body"), R && b.css("overflow-x", "hidden"), s = b.outerHeight(!0))
                } catch (W) {
                }
            } else(S.autoWidth || S.autoHeight) && (E.addClass("fancybox-tmp"), S.autoWidth || E.width(r), S.autoHeight || E.height(s), S.autoWidth && (r = E.width()), S.autoHeight && (s = E.height()), E.removeClass("fancybox-tmp"));
            if (D = g(r), N = g(s), u = r / s, A = g(d(A) ? g(A, "w") - i : A), O = g(d(O) ? g(O, "w") - i : O), j = g(d(j) ? g(j, "h") - o : j), L = g(d(L) ? g(L, "h") - o : L), l = O, c = L, S.fitToView && (O = Math.min(x.w - i, O), L = Math.min(x.h - o, L)), f = x.w - H, v = x.h - F, S.aspectRatio ? (D > O && (D = O, N = g(D / u)), N > L && (N = L, D = g(N * u)), A > D && (D = A, N = g(D / u)), j > N && (N = j, D = g(N * u))) : (D = Math.max(A, Math.min(D, O)), S.autoHeight && "iframe" !== S.type && (E.width(D), N = E.height()), N = Math.max(j, Math.min(N, L))), S.fitToView)if (E.width(D).height(N), k.width(D + t), p = k.width(), h = k.height(), S.aspectRatio)for (; (p > f || h > v) && D > A && N > j && !(w++ > 19);)N = Math.max(j, Math.min(L, N - 10)), D = g(N * u), A > D && (D = A, N = g(D / u)), D > O && (D = O, N = g(D / u)), E.width(D).height(N), k.width(D + t), p = k.width(), h = k.height(); else D = Math.max(A, Math.min(D, D - (p - f))), N = Math.max(j, Math.min(N, N - (h - v)));
            R && "auto" === I && s > N && f > D + t + R && (D += R), E.width(D).height(N), k.width(D + t), p = k.width(), h = k.height(), T = (p > f || h > v) && D > A && N > j, C = S.aspectRatio ? l > D && c > N && r > D && s > N : (l > D || c > N) && (r > D || s > N), n.extend(S, {
                dim: {
                    width: m(p),
                    height: m(h)
                },
                origWidth: r,
                origHeight: s,
                canShrink: T,
                canExpand: C,
                wPadding: t,
                hPadding: e,
                wrapSpace: h - $.outerHeight(!0),
                skinSpace: $.height() - N
            }), !y && S.autoHeight && N > j && L > N && !C && E.height("auto")
        },
        _getPosition: function (t) {
            var e = a.current, n = a.getViewport(), i = e.margin, o = a.wrap.width() + i[1] + i[3], r = a.wrap.height() + i[0] + i[2], s = {
                position: "absolute",
                top: i[0],
                left: i[3]
            };
            return e.autoCenter && e.fixed && !t && r <= n.h && o <= n.w ? s.position = "fixed" : e.locked || (s.top += n.y, s.left += n.x), s.top = m(Math.max(s.top, s.top + (n.h - r) * e.topRatio)), s.left = m(Math.max(s.left, s.left + (n.w - o) * e.leftRatio)), s
        },
        _afterZoomIn: function () {
            var t = a.current;
            t && (a.isOpen = a.isOpened = !0, a.wrap.css("overflow", "visible").addClass("fancybox-opened"), a.update(), (t.closeClick || t.nextClick && a.group.length > 1) && a.inner.css("cursor", "pointer").bind("click.fb", function (e) {
                n(e.target).is("a") || n(e.target).parent().is("a") || (e.preventDefault(), a[t.closeClick ? "close" : "next"]())
            }), t.closeBtn && n(t.tpl.closeBtn).appendTo(a.skin).bind("click.fb", function (t) {
                t.preventDefault(), a.close()
            }), t.arrows && a.group.length > 1 && ((t.loop || t.index > 0) && n(t.tpl.prev).appendTo(a.outer).bind("click.fb", a.prev), (t.loop || t.index < a.group.length - 1) && n(t.tpl.next).appendTo(a.outer).bind("click.fb", a.next)), a.trigger("afterShow"), t.loop || t.index !== t.group.length - 1 ? a.opts.autoPlay && !a.player.isActive && (a.opts.autoPlay = !1, a.play()) : a.play(!1))
        },
        _afterZoomOut: function (t) {
            t = t || a.current, n(".fancybox-wrap").trigger("onReset").remove(), n.extend(a, {
                group: {},
                opts: {},
                router: !1,
                current: null,
                isActive: !1,
                isOpened: !1,
                isOpen: !1,
                isClosing: !1,
                wrap: null,
                skin: null,
                outer: null,
                inner: null
            }), a.trigger("afterClose", t)
        }
    }), a.transitions = {
        getOrigPosition: function () {
            var t = a.current, e = t.element, n = t.orig, i = {}, o = 50, r = 50, s = t.hPadding, l = t.wPadding, c = a.getViewport();
            return !n && t.isDom && e.is(":visible") && (n = e.find("img:first"), n.length || (n = e)), p(n) ? (i = n.offset(), n.is("img") && (o = n.outerWidth(), r = n.outerHeight())) : (i.top = c.y + (c.h - r) * t.topRatio, i.left = c.x + (c.w - o) * t.leftRatio), ("fixed" === a.wrap.css("position") || t.locked) && (i.top -= c.y, i.left -= c.x), i = {
                top: m(i.top - s * t.topRatio),
                left: m(i.left - l * t.leftRatio),
                width: m(o + l),
                height: m(r + s)
            }
        }, step: function (t, e) {
            var n, i, o, r = e.prop, s = a.current, l = s.wrapSpace, c = s.skinSpace;
            ("width" === r || "height" === r) && (n = e.end === e.start ? 1 : (t - e.start) / (e.end - e.start), a.isClosing && (n = 1 - n), i = "width" === r ? s.wPadding : s.hPadding, o = t - i, a.skin[r](g("width" === r ? o : o - l * n)), a.inner[r](g("width" === r ? o : o - l * n - c * n)))
        }, zoomIn: function () {
            var t = a.current, e = t.pos, i = t.openEffect, o = "elastic" === i, r = n.extend({opacity: 1}, e);
            delete r.position, o ? (e = this.getOrigPosition(), t.openOpacity && (e.opacity = .1)) : "fade" === i && (e.opacity = .1), a.wrap.css(e).animate(r, {
                duration: "none" === i ? 0 : t.openSpeed,
                easing: t.openEasing,
                step: o ? this.step : null,
                complete: a._afterZoomIn
            })
        }, zoomOut: function () {
            var t = a.current, e = t.closeEffect, n = "elastic" === e, i = {opacity: .1};
            n && (i = this.getOrigPosition(), t.closeOpacity && (i.opacity = .1)), a.wrap.animate(i, {
                duration: "none" === e ? 0 : t.closeSpeed,
                easing: t.closeEasing,
                step: n ? this.step : null,
                complete: a._afterZoomOut
            })
        }, changeIn: function () {
            var t, e = a.current, n = e.nextEffect, i = e.pos, o = {opacity: 1}, r = a.direction, s = 200;
            i.opacity = .1, "elastic" === n && (t = "down" === r || "up" === r ? "top" : "left", "down" === r || "right" === r ? (i[t] = m(g(i[t]) - s), o[t] = "+=" + s + "px") : (i[t] = m(g(i[t]) + s), o[t] = "-=" + s + "px")), "none" === n ? a._afterZoomIn() : a.wrap.css(i).animate(o, {
                duration: e.nextSpeed,
                easing: e.nextEasing,
                complete: a._afterZoomIn
            })
        }, changeOut: function () {
            var t = a.previous, e = t.prevEffect, i = {opacity: .1}, o = a.direction, r = 200;
            "elastic" === e && (i["down" === o || "up" === o ? "top" : "left"] = ("up" === o || "left" === o ? "-" : "+") + "=" + r + "px"), t.wrap.animate(i, {
                duration: "none" === e ? 0 : t.prevSpeed,
                easing: t.prevEasing,
                complete: function () {
                    n(this).trigger("onReset").remove()
                }
            })
        }
    }, a.helpers.overlay = {
        defaults: {closeClick: !0, speedOut: 200, showEarly: !0, css: {}, locked: !u, fixed: !0},
        overlay: null,
        fixed: !1,
        el: n("html"),
        create: function (t) {
            t = n.extend({}, this.defaults, t), this.overlay && this.close(), this.overlay = n('<div class="fancybox-overlay"></div>').appendTo(a.coming ? a.coming.parent : t.parent), this.fixed = !1, t.fixed && a.defaults.fixed && (this.overlay.addClass("fancybox-overlay-fixed"), this.fixed = !0)
        },
        open: function (t) {
            var e = this;
            t = n.extend({}, this.defaults, t), this.overlay ? this.overlay.unbind(".overlay").width("auto").height("auto") : this.create(t), this.fixed || (r.bind("resize.overlay", n.proxy(this.update, this)), this.update()), t.closeClick && this.overlay.bind("click.overlay", function (t) {
                return n(t.target).hasClass("fancybox-overlay") ? (a.isActive ? a.close() : e.close(), !1) : void 0
            }), this.overlay.css(t.css).show()
        },
        close: function () {
            var t, e;
            r.unbind("resize.overlay"), this.el.hasClass("fancybox-lock") && (n(".fancybox-margin").removeClass("fancybox-margin"), t = r.scrollTop(), e = r.scrollLeft(), this.el.removeClass("fancybox-lock"), r.scrollTop(t).scrollLeft(e)), n(".fancybox-overlay").remove().hide(), n.extend(this, {
                overlay: null,
                fixed: !1
            })
        },
        update: function () {
            var t, n = "100%";
            this.overlay.width(n).height("100%"), l ? (t = Math.max(e.documentElement.offsetWidth, e.body.offsetWidth), s.width() > t && (n = s.width())) : s.width() > r.width() && (n = s.width()), this.overlay.width(n).height(s.height())
        },
        onReady: function (t, e) {
            var i = this.overlay;
            n(".fancybox-overlay").stop(!0, !0), i || this.create(t), t.locked && this.fixed && e.fixed && (i || (this.margin = s.height() > r.height() ? n("html").css("margin-right").replace("px", "") : !1), e.locked = this.overlay.append(e.wrap), e.fixed = !1), t.showEarly === !0 && this.beforeShow.apply(this, arguments)
        },
        beforeShow: function (t, e) {
            var i, o;
            e.locked && (this.margin !== !1 && (n("*").filter(function () {
                return "fixed" === n(this).css("position") && !n(this).hasClass("fancybox-overlay") && !n(this).hasClass("fancybox-wrap")
            }).addClass("fancybox-margin"), this.el.addClass("fancybox-margin")), i = r.scrollTop(), o = r.scrollLeft(), this.el.addClass("fancybox-lock"), r.scrollTop(i).scrollLeft(o)), this.open(t)
        },
        onUpdate: function () {
            this.fixed || this.update()
        },
        afterClose: function (t) {
            this.overlay && !a.coming && this.overlay.fadeOut(t.speedOut, n.proxy(this.close, this))
        }
    }, a.helpers.title = {
        defaults: {type: "float", position: "bottom"}, beforeShow: function (t) {
            var e, i, o = a.current, r = o.title, s = t.type;
            if (n.isFunction(r) && (r = r.call(o.element, o)), h(r) && "" !== n.trim(r)) {
                switch (e = n('<div class="fancybox-title fancybox-title-' + s + '-wrap">' + r + "</div>"), s) {
                    case"inside":
                        i = a.skin;
                        break;
                    case"outside":
                        i = a.wrap;
                        break;
                    case"over":
                        i = a.inner;
                        break;
                    default:
                        i = a.skin, e.appendTo("body"), l && e.width(e.width()), e.wrapInner('<span class="child"></span>'), a.current.margin[2] += Math.abs(g(e.css("margin-bottom")))
                }
                e["top" === t.position ? "prependTo" : "appendTo"](i)
            }
        }
    }, n.fn.fancybox = function (t) {
        var e, i = n(this), o = this.selector || "", r = function (r) {
            var s, l, c = n(this).blur(), u = e;
            r.ctrlKey || r.altKey || r.shiftKey || r.metaKey || c.is(".fancybox-wrap") || (s = t.groupAttr || "data-fancybox-group", l = c.attr(s), l || (s = "rel", l = c.get(0)[s]), l && "" !== l && "nofollow" !== l && (c = o.length ? n(o) : i, c = c.filter("[" + s + '="' + l + '"]'), u = c.index(this)), t.index = u, a.open(c, t) !== !1 && r.preventDefault())
        };
        return t = t || {}, e = t.index || 0, o && t.live !== !1 ? s.undelegate(o, "click.fb-start").delegate(o + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", r) : i.unbind("click.fb-start").bind("click.fb-start", r), this.filter("[data-fancybox-start=1]").trigger("click"), this
    }, s.ready(function () {
        var e, r;
        n.scrollbarWidth === i && (n.scrollbarWidth = function () {
            var t = n('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"), e = t.children(), i = e.innerWidth() - e.height(99).innerWidth();
            return t.remove(), i
        }), n.support.fixedPosition === i && (n.support.fixedPosition = function () {
            var t = n('<div style="position:fixed;top:20px;"></div>').appendTo("body"), e = 20 === t[0].offsetTop || 15 === t[0].offsetTop;
            return t.remove(), e
        }()), n.extend(a.defaults, {
            scrollbarWidth: n.scrollbarWidth(),
            fixed: n.support.fixedPosition,
            parent: n("body")
        }), e = n(t).width(), o.addClass("fancybox-lock-test"), r = n(t).width(), o.removeClass("fancybox-lock-test"), n("<style type='text/css'>.fancybox-margin{margin-right:" + (r - e) + "px;}</style>").appendTo("head")
    })
}(window, document, jQuery);
//# sourceMappingURL=app.js.map