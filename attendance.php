<?php
session_start();
if(!isset($_SESSION['admin']))
{
  header("location:index.html");
  exit();
}
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/mdb.css">
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<style>
/* Default custom select styles */
.text__center{
  text-align: center;
}
div.cs-select {
  position: relative;
  z-index: 100;
  display: inline-block;
  width: 100%;
  max-width: 500px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  text-align: left;
  vertical-align: middle;
  background: #fff;
  -webkit-touch-callout: none;
  -khtml-user-select: none;
}

div.cs-select:focus {
  outline: none;
  /* For better accessibility add a style for this in your skin */
}

.cs-select select {
  display: none;
}

.cs-select span {
  position: relative;
  display: block;
  overflow: hidden;
  padding: 1em;
  cursor: pointer;
  white-space: nowrap;
  text-overflow: ellipsis;
}
/* Placeholder and selected option */

.cs-select > span {
  padding-right: 3em;
}

.cs-select > span::after,
.cs-select .cs-selected span::after {
  position: absolute;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  speak: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.cs-select > span::after {
  right: 1em;
  content: '\25BE';
}

.cs-select .cs-selected span::after {
  margin-left: 1em;
  content: '\2713';
}

.cs-select.cs-active > span::after {
  -webkit-transform: translateY(-50%) rotate(180deg);
  transform: translateY(-50%) rotate(180deg);
}

div.cs-active {
  z-index: 200;
}
/* Options */

.cs-select .cs-options {
  position: absolute;
  visibility: hidden;
  overflow: hidden;
  width: 100%;
  background: #fff;
}

.cs-select.cs-active .cs-options {
  visibility: visible;
}

.cs-select ul {
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}

.cs-select ul span {
  padding: 1em;
}

.cs-select ul li.cs-focus span {
  background-color: #ddd;
}
/* Optgroup and optgroup label */

.cs-select li.cs-optgroup ul {
  padding-left: 1em;
}

.cs-select li.cs-optgroup > span {
  cursor: default;
}

div.cs-skin-elastic {
  font-size: 1.5em;
  font-weight: 700;
  color: #000000;
  background: transparent;
}

@media screen and (max-width: 30em) {
  div.cs-skin-elastic {
    font-size: 1em;
  }
}

.cs-skin-elastic > span {
  z-index: 100;
  background-color: #fff;
}

.cs-skin-elastic .cs-options {
  visibility: visible;
  overflow: visible;
  padding-bottom: 1.25em;
  pointer-events: none;
  opacity: 1;
  background: transparent;
}

.cs-skin-elastic.cs-active .cs-options {
  pointer-events: auto;
}

.cs-skin-elastic .cs-options > ul::before {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  content: '';
  -webkit-transition: -webkit-transform .3s;
  transition: transform .3s;
  -webkit-transform: scale3d(1, 0, 1);
  transform: scale3d(1, 0, 1);
  -webkit-transform-origin: 50% 0;
  transform-origin: 50% 0;
  background: #fff;
}

.cs-skin-elastic.cs-active .cs-options > ul::before {
  -webkit-transition: none;
  transition: none;
  -webkit-transform: scale3d(1, 1, 1);
  transform: scale3d(1, 1, 1);
  -webkit-animation: expand .6s ease-out;
  animation: expand .6s ease-out;
}

.cs-skin-elastic .cs-options ul li {
  -webkit-transition: opacity .15s, -webkit-transform .15s;
  transition: opacity .15s, transform .15s;
  -webkit-transform: translate3d(0, -25px, 0);
  transform: translate3d(0, -25px, 0);
  opacity: 0;
}

.cs-skin-elastic.cs-active .cs-options ul li {
  -webkit-transition: none;
  transition: none;
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
  -webkit-animation: bounce .6s ease-out;
  animation: bounce .6s ease-out;
  opacity: 1;
}

.cs-skin-elastic .cs-options span {
  background-repeat: no-repeat;
  background-position: 1.5em 50%;
  background-size: 2em auto;
}

.cs-skin-elastic .cs-options span:hover,
.cs-skin-elastic .cs-options li.cs-focus span,
.cs-skin-elastic .cs-options .cs-selected span {
  color: #1e4c4a;
}

.cs-skin-elastic .cs-options .cs-selected span::after {
  content: '';
}

@-webkit-keyframes expand {
  0% {
    -webkit-transform: scale3d(1, 0, 1);
  }
  25% {
    -webkit-transform: scale3d(1, 1.2, 1);
  }
  50% {
    -webkit-transform: scale3d(1, .85, 1);
  }
  75% {
    -webkit-transform: scale3d(1, 1.05, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
  }
}

@keyframes expand {
  0% {
    -webkit-transform: scale3d(1, 0, 1);
    transform: scale3d(1, 0, 1);
  }
  25% {
    -webkit-transform: scale3d(1, 1.2, 1);
    transform: scale3d(1, 1.2, 1);
  }
  50% {
    -webkit-transform: scale3d(1, .85, 1);
    transform: scale3d(1, .85, 1);
  }
  75% {
    -webkit-transform: scale3d(1, 1.05, 1);
    transform: scale3d(1, 1.05, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@-webkit-keyframes bounce {
  0% {
    -webkit-transform: translate3d(0, -25px, 0);
    opacity: 0;
  }
  25% {
    -webkit-transform: translate3d(0, 10px, 0);
  }
  50% {
    -webkit-transform: translate3d(0, -6px, 0);
  }
  75% {
    -webkit-transform: translate3d(0, 2px, 0);
  }
  100% {
    -webkit-transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes bounce {
  0% {
    -webkit-transform: translate3d(0, -25px, 0);
    transform: translate3d(0, -25px, 0);
    opacity: 0;
  }
  25% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }
  50% {
    -webkit-transform: translate3d(0, -6px, 0);
    transform: translate3d(0, -6px, 0);
  }
  75% {
    -webkit-transform: translate3d(0, 2px, 0);
    transform: translate3d(0, 2px, 0);
  }
  100% {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}


.btn1{
    width:50px;
    height:50px;
    border:0px;
    margin:10px;
    color: #ffffff;
    border-radius:5px;
    background:green;
}

select{
  width:150px;
  height:50px;
  }

input[type="date"]{
  width:150px;
  height:50px;
}

.submit{
  width:150px;
  height:50px;
  margin-top: 50px;
  border:0px;
  border-radius:5px;
  color:#ffffff;
  background-image:-webkit-linear-gradient(47deg,#f18a1d 0,#f35461 100%);
  box-shadow: 0 4px 15px 0 rgba(242,147,125,0.6);
}
</style>

<center>
<div class="text__center">
  <select class="cs-select cs-skin-elastic">
    <option value="" disabled selected>Select Class</option>
    <option value="france">Option A</option>
    <option value="brazil">Option B</option>
    <option value="argentina">Option C</option>
    <option value="south-africa">Option D</option>
  </select>

  
</div>
<br>
<input style=" margin-left:10px; text-align:center;" type="date"> 
<select>
    <option value="" disabled selected>Select Subject</option>
    <option value="france">Option A</option>
    <option value="brazil">Option B</option>
    <option value="argentina">Option C</option>
    <option value="south-africa">Option D</option>
  </select>
<br>
<br>

<input type="button"  id="btn1" class="btn1" value="1" onclick="submitButtonStyle(this.id,this.value)">
<input type="button"  id="btn2" class="btn1" value="2" onclick="submitButtonStyle(this.id,this.value)">
<input type="button"  id="btn3" class="btn1" value="3" onclick="submitButtonStyle(this.id,this.value)">


</center>
<center><input type="button" class="submit" value="Submit"></center>
<script>
var absent = [];

function submitButtonStyle(id,value) {

var n = absent.includes(value);
if(n===true)
{
  document.getElementById(id).style.backgroundColor = "green";
  for(var i = absent.length - 1; i >= 0; i--) {
    if(absent[i] === value) {
        absent.splice(i, 1);
    }
  }
}
if(n===false)
{
  document.getElementById(id).style.backgroundColor = "red";
  absent.push(value);
}

console.log(absent);
}
</script>
<script>



! function(e) {
  "use strict";

  function t(e) {
    return new RegExp("(^|\\s+)" + e + "(\\s+|$)")
  }

  function s(e, t) {
    var s = l(e, t) ? i : n;
    s(e, t)
  }
  var l, n, i;
  "classList" in document.documentElement ? (l = function(e, t) {
    return e.classList.contains(t)
  }, n = function(e, t) {
    e.classList.add(t)
  }, i = function(e, t) {
    e.classList.remove(t)
  }) : (l = function(e, s) {
    return t(s).test(e.className)
  }, n = function(e, t) {
    l(e, t) || (e.className = e.className + " " + t)
  }, i = function(e, s) {
    e.className = e.className.replace(t(s), " ")
  });
  var c = {
    hasClass: l,
    addClass: n,
    removeClass: i,
    toggleClass: s,
    has: l,
    add: n,
    remove: i,
    toggle: s
  };
  "function" == typeof define && define.amd ? define(c) : e.classie = c
}(window),
function(e) {
  "use strict";

  function t(e, t) {
    if (!e) return !1;
    for (var s = e.target || e.srcElement || e || !1; s && s != t;) s = s.parentNode || !1;
    return s !== !1
  }

  function s(e, t) {
    for (var s in t) t.hasOwnProperty(s) && (e[s] = t[s]);
    return e
  }

  function l(e, t) {
    this.el = e, this.options = s({}, this.options), s(this.options, t), this._init()
  }
  l.prototype.options = {
    newTab: !0,
    stickyPlaceholder: !0,
    onChange: function() {
      return !1
    }
  }, l.prototype._init = function() {
    var e = this.el.querySelector("option[selected]");
    this.hasDefaultPlaceholder = e && e.disabled, this.selectedOpt = e || this.el.querySelector("option"), this._createSelectEl(), this.selOpts = [].slice.call(this.selEl.querySelectorAll("li[data-option]")), this.selOptsCount = this.selOpts.length, this.current = this.selOpts.indexOf(this.selEl.querySelector("li.cs-selected")) || -1, this.selPlaceholder = this.selEl.querySelector("span.cs-placeholder"), this._initEvents()
  }, l.prototype._createSelectEl = function() {
    var e = "",
      t = function(e) {
        var t = "",
          s = "",
          l = "";
        return !e.selectedOpt || this.foundSelected || this.hasDefaultPlaceholder || (s += "cs-selected ", this.foundSelected = !0), e.getAttribute("data-class") && (s += e.getAttribute("data-class")), e.getAttribute("data-link") && (l = "data-link=" + e.getAttribute("data-link")), "" !== s && (t = 'class="' + s + '" '), "<li " + t + l + ' data-option data-value="' + e.value + '"><span>' + e.textContent + "</span></li>"
      };
    [].slice.call(this.el.children).forEach(function(s) {
      if (!s.disabled) {
        var l = s.tagName.toLowerCase();
        "option" === l ? e += t(s) : "optgroup" === l && (e += '<li class="cs-optgroup"><span>' + s.label + "</span><ul>", [].slice.call(s.children).forEach(function(s) {
          e += t(s)
        }), e += "</ul></li>")
      }
    });
    var s = '<div class="cs-options"><ul>' + e + "</ul></div>";
    this.selEl = document.createElement("div"), this.selEl.className = this.el.className, this.selEl.tabIndex = this.el.tabIndex, this.selEl.innerHTML = '<span class="cs-placeholder">' + this.selectedOpt.textContent + "</span>" + s, this.el.parentNode.appendChild(this.selEl), this.selEl.appendChild(this.el)
  }, l.prototype._initEvents = function() {
    var e = this;
    this.selPlaceholder.addEventListener("click", function() {
      e._toggleSelect()
    }), this.selOpts.forEach(function(t, s) {
      t.addEventListener("click", function() {
        e.current = s, e._changeOption(), e._toggleSelect()
      })
    }), document.addEventListener("click", function(s) {
      var l = s.target;
      e._isOpen() && l !== e.selEl && !t(l, e.selEl) && e._toggleSelect()
    }), this.selEl.addEventListener("keydown", function(t) {
      var s = t.keyCode || t.which;
      switch (s) {
        case 38:
          t.preventDefault(), e._navigateOpts("prev");
          break;
        case 40:
          t.preventDefault(), e._navigateOpts("next");
          break;
        case 32:
          t.preventDefault(), e._isOpen() && "undefined" != typeof e.preSelCurrent && -1 !== e.preSelCurrent && e._changeOption(), e._toggleSelect();
          break;
        case 13:
          t.preventDefault(), e._isOpen() && "undefined" != typeof e.preSelCurrent && -1 !== e.preSelCurrent && (e._changeOption(), e._toggleSelect());
          break;
        case 27:
          t.preventDefault(), e._isOpen() && e._toggleSelect()
      }
    })
  }, l.prototype._navigateOpts = function(e) {
    this._isOpen() || this._toggleSelect();
    var t = "undefined" != typeof this.preSelCurrent && -1 !== this.preSelCurrent ? this.preSelCurrent : this.current;
    ("prev" === e && t > 0 || "next" === e && t < this.selOptsCount - 1) && (this.preSelCurrent = "next" === e ? t + 1 : t - 1, this._removeFocus(), classie.add(this.selOpts[this.preSelCurrent], "cs-focus"))
  }, l.prototype._toggleSelect = function() {
    this._removeFocus(), this._isOpen() ? (-1 !== this.current && (this.selPlaceholder.textContent = this.selOpts[this.current].textContent), classie.remove(this.selEl, "cs-active")) : (this.hasDefaultPlaceholder && this.options.stickyPlaceholder && (this.selPlaceholder.textContent = this.selectedOpt.textContent), classie.add(this.selEl, "cs-active"))
  }, l.prototype._changeOption = function() {
    "undefined" != typeof this.preSelCurrent && -1 !== this.preSelCurrent && (this.current = this.preSelCurrent, this.preSelCurrent = -1);
    var t = this.selOpts[this.current];
    this.selPlaceholder.textContent = t.textContent, this.el.value = t.getAttribute("data-value");
    var s = this.selEl.querySelector("li.cs-selected");
    s && classie.remove(s, "cs-selected"), classie.add(t, "cs-selected"), t.getAttribute("data-link") && (this.options.newTab ? e.open(t.getAttribute("data-link"), "_blank") : e.location = t.getAttribute("data-link")), this.options.onChange(this.el.value)
  }, l.prototype._isOpen = function() {
    return classie.has(this.selEl, "cs-active")
  }, l.prototype._removeFocus = function() {
    var e = this.selEl.querySelector("li.cs-focus");
    e && classie.remove(e, "cs-focus")
  }, e.SelectFx = l
}(window),
function() {
  [].slice.call(document.querySelectorAll("select.cs-select")).forEach(function(e) {
    new SelectFx(e)
  })
}();
</script>
<!--/Blue select-->
