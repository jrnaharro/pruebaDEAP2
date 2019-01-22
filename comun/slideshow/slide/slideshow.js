/*
 +-------------------------------------------------------------------+
 |                  J S - S L I D E S H O W   (v2.1)                 |
 |                                                                   |
 | Copyright Gerd Tentler                www.gerd-tentler.de/tools   |
 | Created: Apr. 9, 2003                 Last modified: Sep. 6, 2008 |
 +-------------------------------------------------------------------+
 | This program may be used and hosted free of charge by anyone for  |
 | personal purpose as long as this copyright notice remains intact. |
 |                                                                   |
 | Obtain permission before selling the code for this program or     |
 | hosting this software on a commercial website or redistributing   |
 | this software over the Internet or in any other medium. In all    |
 | cases copyright must remain intact.                               |
 +-------------------------------------------------------------------+

 This script was tested with:

 - Windows XP: Internet Explorer 6, Netscape Navigator 7, Opera 7 + 9, Firefox 2
 - Mac OS X:   Internet Explorer 5, Safari 1

 If you use another browser or operating system, this script may not work for you.
*/
//---------------------------------------------------------------------------------------------------------
// Configuration
//---------------------------------------------------------------------------------------------------------

var slsAutoStart = true;                    // start animation (true = yes, false = no)
var slsPauseTime = 5;                       // change pages every .. seconds
var slsMode = "slide";                      // mode can be "slide" or "fade"
var slsViewModeIcons = false;                // view mode icons (true = yes, false = no)
var slsFadeSpeed = 10;                      // fading speed (just for fade mode)

//var slsWidth = 320;                         // content width (pixels)
//var slsHeight = 240;                        // content height (pixels)
var slsWidth = 640;                         // content width (pixels)
var slsHeight = 480;                        // content height (pixels)
var slsColor = "#FFFFFF";                   // content background color
var slsOverflow = "hidden";                 // content scrollbars: "auto" or "hidden"
                                            // ("auto" may cause flickering with Gecko browsers)

var slsBorderWidth = 0;                     // border width (pixels)
var slsBorderStyle = "solid";               // border style (CSS-spec, e.g. "solid", "outset", "inset", etc.)
var slsBorderColor = "#FFFFFF";             // border color

var slsBarHeight = 10;                      // iconbar height (pixels)
var slsBarSpace = 8;                        // space between iconbar and slideshow (pixels)
var slsBarPosition = "bottom";              // iconbar position ("top" or "bottom")

var slsImgPrev = "imagenes_slideshow/previous.gif";            // previous button: path to image
var slsImgPrevWidth = 13;                   // previous button: image width (pixels)
var slsImgNext = "imagenes_slideshow/next.gif";                // next button: path to image
var slsImgNextWidth = 13;                   // next button: image width (pixels)
var slsImgPlay = "imagenes_slideshow/play.gif";                // play button: path to image
var slsImgPlayWidth = 13;                   // play button: image width (pixels)
var slsImgStop = "imagenes_slideshow/stop.gif";                // stop button: path to image
var slsImgStopWidth = 13;                   // stop button: image width (pixels)
var slsImgSlide = "imagenes_slideshow/slide.gif";              // slide mode button: path to image
var slsImgSlideWidth = 13;                  // slide mode button: image width (pixels)
var slsImgFade = "imagenes_slideshow/fade.gif";                // fade mode button: path to image
var slsImgFadeWidth = 13;                   // fade mode button: image width (pixels)
var slsImgBlank = "imagenes_slideshow/blank.gif";              // path to blank image

var slsIndView = true;                      // view index (true = yes, false = no)
var slsIndCount = 12;                       // max. number of visible index entries
var slsIndSpace = 8;                        // space between index and iconbar
var slsIndColor = "";                       // index background color
var slsIndFont = "Arial, Helvetica";        // index font family
var slsIndFontSize = 14;                    // index font size (pixels)
var slsIndPosition = "bottom";              // index position ("top" or "bottom")

var slsSlidingMax = 20;                     // if there are more than slsSlidingMax pages, sliding will be
                                            // turned off for performance reasons; this does not affect fading

//---------------------------------------------------------------------------------------------------------
// Functions
//---------------------------------------------------------------------------------------------------------

var DOM = document.getElementById;
var OP = (window.opera || navigator.userAgent.indexOf('Opera') != -1);
var IE4 = (document.all && !OP);

var slsBord, slsCont, slsArea, slsBarArea, slsIndArea, slsIV, slsTimer, slsPrevious;
var slsIndStart = slsCurPage = 0;
var slsPages = (typeof(slsContents) != 'undefined') ? slsContents.length : 0;
var slsAnimation = false;

var slsW = slsWidth + slsBorderWidth * 2;
var slsH = slsHeight + slsBorderWidth * 2 + slsBarSpace + slsBarHeight;
if(slsIndView) slsH += slsIndSpace + slsIndFontSize;

function slsObject(id) {
  this.elem = DOM ? document.getElementById(id) : document.all[id];
  this.css = this.elem.style;
  this.width = this.elem.offsetWidth;
  this.left = 0;
  return this;
}

function slsSetMode(type) {
  var obj, i;
  switch(type.toLowerCase()) {

    case 'slide':
      if(document.images.slsFade) {
        document.images.slsFade.style.backgroundColor = '#666666';
      }
      if(document.images.slsSlide) {
        document.images.slsSlide.style.backgroundColor = '#FF0000';
      }
      for(i = 0; i < slsPages; i++) {
        obj = new slsObject('slsPage' + i);
        obj.css.position = 'static';
        obj.css.display = 'block';
        obj.css.cssFloat = 'left';
        obj.css.styleFloat = 'left';
      }
      slsNewX = slsArea.left = slsCurX = slsCurPage * -slsWidth;
      slsArea.css.left = slsNewX + 'px';
      slsMode = 'slide';
      slsJump(slsCurPage);
      if(slsPauseTime && slsAutoStart) slsStartAnimation();
      break;

    case 'fade':
      if(document.images.slsSlide) {
        document.images.slsSlide.style.backgroundColor = '#666666';
      }
      if(document.images.slsFade) {
        document.images.slsFade.style.backgroundColor = '#FF0000';
      }
      for(i = 0; i < slsPages; i++) {
        obj = new slsObject('slsPage' + i);
        obj.css.position = 'absolute';
        obj.css.display = 'none';
        obj.css.cssFloat = 'none';
        obj.css.styleFloat = 'none';
        obj.css.zIndex = 1;
      }
      slsArea.css.left = '0px';
      slsPrevious = null;
      slsMode = 'fade';
      slsJump(slsCurPage);
      if(slsPauseTime && slsAutoStart) slsStartAnimation();
      break;

    default: alert('Wrong type: ' + type);
  }
}

function slsPrevPage() {
  if(!slsAnimation && slsCurPage > 0) {
    slsJump(slsCurPage - 1);
  }
}

function slsNextPage() {
  if(!slsAnimation && slsCurPage < slsPages - 1) {
    slsJump(slsCurPage + 1);
  }
}

function slsJump(page) {
  if(!slsAnimation) {
    if(slsMode == 'fade') {
      if(page != slsCurPage) {
        slsPrevious = new slsObject('slsPage' + slsCurPage);
        slsPrevious.css.zIndex = 1;
      }
      var newPage = new slsObject('slsPage' + page);
      slsOpacity = 0;
      slsSetOpacity(newPage);
      newPage.css.display = 'block';
      newPage.css.zIndex = 2;
      slsIV = setInterval('slsFader(' + page + ')', 1);
    }
    else {
      slsNewX = slsArea.left = page * -slsWidth;
      if(slsPages > slsSlidingMax) {
        slsCurX = slsNewX;
        slsArea.css.left = slsNewX + 'px';
        slsCheckImg();
        if(slsIndView) slsSetIndex(slsGetIndStart());
      }
      else slsIV = setInterval('slsSlider()', 1);
    }
    slsCurPage = page;
  }
}

function slsCheckImg() {
  var iconbar = 0;
  var img = document.images['slsLeft'];
  if(slsCurPage <= 0) img.src = slsImgBlank;
  else img.src = iconbar = slsImgPrev;
  img = document.images['slsRight'];
  if(slsCurPage >= slsPages - 1) img.src = slsImgBlank;
  else img.src = iconbar = slsImgNext;
  if(!iconbar) slsBarArea.css.visibility = slsIndArea.css.visibility = 'hidden';
}

function slsGetIndStart() {
  var start = 0;
  if(slsCurPage % slsIndCount == 0) {
    start = slsCurPage + 1;
  }
  else if(slsCurPage % slsIndCount == slsIndCount - 1) {
    start = slsCurPage - slsIndCount + 2;
  }
  return start;
}

function slsSetIndex(start) {
  if(!slsAnimation) {
    if(start) slsIndStart = start - 1;
    var html = link = '';
    for(var i = slsIndStart; i < slsPages && i < slsIndStart + slsIndCount; i++) {
      if(i && html) html += ' &middot; ';
      if(i == slsCurPage) html += '<b>' + (i+1) + '</b>';
      else {
        link = 'javascript:slsStopAnimation(); slsJump(' + i + ')';
        html += '<a href="' + link + '" style="text-decoration:none">' + (i+1) + '</a>';
      }
    }
    if(slsIndStart) {
      link = 'javascript:slsSetIndex(' + (slsIndStart - slsIndCount+1) + ')';
      html += ' &middot; <a href="' + link + '" style="text-decoration:none">&lt;&lt;</a> ';
    }
    if(i < slsPages) {
      link = 'javascript:slsSetIndex(' + (i+1) + ')';
      html += ' &middot; <a href="' + link + '" style="text-decoration:none">&gt;&gt;</a>';
    }
    slsIndArea.elem.innerHTML = html;
  }
}

function slsDoAnimation() {
  if(slsCurPage >= slsPages - 1) slsJump(0);
  else slsNextPage();
}

function slsStopAnimation() {
  if(slsAutoStart) {
    if(slsTimer) clearInterval(slsTimer);
    var img = document.images['slsPlayStop'];
    img.src = slsImgPlay;
    img.width = slsImgPlayWidth;
    img.onclick = function() { slsStartAnimation(true); this.blur(); }
    slsAutoStart = false;
  }
}

function slsStartAnimation(showNext) {
  slsStopAnimation();
  slsTimer = setInterval('slsDoAnimation()', slsPauseTime * 1000);
  var img = document.images['slsPlayStop'];
  img.src = slsImgStop;
  img.width = slsImgStopWidth;
  img.onclick = function() { slsStopAnimation(); this.blur(); }
  slsAutoStart = true;
  if(showNext){
	slsCurPage--;
  	slsDoAnimation();
  }
}

function slsInit() {
  if(DOM || IE4) {
    if(!slsPages) {
      alert("No contents found.");
      return false;
    }
    slsBord = new slsObject('slsBorder');
    slsCont = new slsObject('slsContainer');
    slsArea = new slsObject('slsSlider');
    slsBarArea = new slsObject('slsBar');
    if(slsIndView) slsIndArea = new slsObject('slsInd');

    if(slsColor) slsCont.css.backgroundColor = slsColor;
    if(slsIndColor) slsIndArea.css.backgroundColor = slsIndColor;

    if(slsBorderWidth) slsBord.css.borderWidth = slsBorderWidth + 'px';
    if(slsBorderStyle) slsBord.css.borderStyle = slsBorderStyle;
    if(slsBorderColor) slsBord.css.borderColor = slsBorderColor;

    var bordTop = 0;
    if(slsBarPosition == 'top') bordTop += (slsBarHeight + slsBarSpace);
    if(slsIndView && slsIndPosition == 'top') bordTop += (slsIndFontSize + slsIndSpace);

    slsBord.css.top = bordTop + 'px';
    slsBord.css.width = slsWidth + 'px';
    slsBord.css.height = slsHeight + 'px';

    slsArea.width = slsWidth * slsPages;
    slsArea.css.width = slsArea.width + 'px';
    slsArea.css.position = 'absolute';

    slsCont.css.width = slsWidth + 'px';
    slsCont.css.height = slsHeight + 'px';
    slsCont.css.visibility = 'visible';

    var content = '<img src="' + slsImgPrev + '" name="slsLeft" height="' + slsBarHeight + '"' +
                  ' width="' + slsImgPrevWidth + '" style="margin:0px 5px; cursor:pointer"' +
                  ' onClick="slsStopAnimation(); slsPrevPage(); this.blur()">' +
                  '<img src="' + slsImgPlay + '" name="slsPlayStop" height="' + slsBarHeight + '"' +
                  ' width="' + slsImgPlayWidth + '" style="margin:0px 5px; cursor:pointer"' +
                  ' onClick="slsStartAnimation(true); this.blur()">' +
                  '<img src="' + slsImgNext + '" name="slsRight" height="' + slsBarHeight + '"' +
                  ' width="' + slsImgNextWidth + '" style="margin:0px 5px; cursor:pointer"' +
                  ' onClick="slsStopAnimation(); slsNextPage(); this.blur()">';

    if(slsViewModeIcons) {
      content += '<img src="' + slsImgSlide + '" name="slsSlide" height="' + slsBarHeight + '"' +
                 ' width="' + slsImgSlideWidth + '" style="margin:0px 5px 0px 25px; cursor:pointer"' +
                 ' onClick="slsSetMode(\'slide\')">' +
                 '<img src="' + slsImgFade + '" name="slsFade" height="' + slsBarHeight + '"' +
                 ' width="' + slsImgFadeWidth + '" style="margin:0px 5px; cursor:pointer"' +
                 ' onClick="slsSetMode(\'fade\')">';
    }
    var barTop = 0;
    if(slsBarPosition != 'top') barTop += slsHeight + slsBorderWidth*2 + slsBarSpace;
    if(slsIndView && slsIndPosition == 'top') barTop += slsIndFontSize + slsIndSpace;
    slsBarArea.elem.innerHTML = content;
    slsBarArea.css.top = barTop + 'px';
    slsBarArea.css.width = slsW + 'px';
    slsBarArea.css.height = slsBarHeight + 'px';
    slsBarArea.css.textAlign = 'center';

    if(slsIndView) {
      var indTop = (slsIndPosition == 'top') ? 0 : slsHeight + slsBorderWidth*2 + slsBarSpace + slsBarHeight + slsIndSpace;
      slsIndArea.css.top = indTop + 'px';
      slsIndArea.css.height = slsIndFontSize + 'px';
      slsIndArea.css.width = slsW + 'px';
      slsIndArea.css.textAlign = 'center';
      if(slsIndFont) slsIndArea.css.fontFamily = slsIndFont;
      if(slsIndFontSize) slsIndArea.css.fontSize = slsIndFontSize + 'px';
      slsSetIndex();
    }
    setTimeout('slsCheckImg()', 100);
    slsSetMode(slsMode);
  }
  else alert("Sorry, this script doesn't work with your browser.");
}

//---------------------------------------------------------------------------------------------------------
// Page slider
//---------------------------------------------------------------------------------------------------------

var slsCurX = slsNewX = 0;

function slsSlider() {
  if(slsCurX != slsNewX) {
    slsAnimation = true;
    var percent = .1 * (slsNewX - slsCurX);
    if(percent > 0) percent = Math.ceil(percent);
    else percent = Math.floor(percent);
    slsCurX += percent;
    slsArea.css.left = slsCurX + 'px';
  }
  else {
    slsAnimation = false;
    if(slsIV) clearInterval(slsIV);
    slsCheckImg();
    if(slsIndView) slsSetIndex(slsGetIndStart());
  }
}

//---------------------------------------------------------------------------------------------------------
// Page fader
//---------------------------------------------------------------------------------------------------------

var slsOpacity = 0;

function slsSetOpacity(obj) {
  if(obj) {
    obj.css.opacity = slsOpacity / 100;
    obj.css.MozOpacity = slsOpacity / 100;
    obj.css.KhtmlOpacity = slsOpacity / 100;
    obj.css.filter = 'alpha(opacity=' + slsOpacity + ')';
  }
}

function slsFader(page) {
  if(obj = new slsObject('slsPage' + page)) {
    slsAnimation = true;
    if(slsFadeSpeed && slsOpacity < 100) {
      slsOpacity += slsFadeSpeed;
      if(slsOpacity > 100) slsOpacity = 100;
      slsSetOpacity(obj);
    }
    else {
      slsAnimation = false;
      slsOpacity = 0;
      if(slsIV) clearInterval(slsIV);
      slsCheckImg();
      if(slsIndView) slsSetIndex(slsGetIndStart());
      if(slsPrevious && slsPrevious != obj) {
        slsPrevious.css.display = 'none';
      }
    }
  }
}

//---------------------------------------------------------------------------------------------------------
// Create slideshow
//---------------------------------------------------------------------------------------------------------

function slsBuildContainers() {
  document.write('<div id="slideShow" style="position:relative; width:' + slsW + 'px; height:' + slsH + 'px">');
  if(slsIndView) document.write('<div id="slsInd" style="position:absolute; z-index:69"></div>');
  document.write('<div id="slsBar" style="position:absolute; z-index:69"></div>');
  document.write('<div id="slsBorder" style="position:absolute; border:0px;">');
  document.write('<div id="slsContainer" style="position:absolute; z-index:0; overflow:hidden;');
  document.write(' clip:rect(0,' + slsWidth + ',' + slsHeight + ',0); visibility:hidden">');
  document.write('<div id="slsSlider">');

  for(var i = 0; i < slsPages; i++) {
    document.write('<div align="center" id="slsPage' + i + '" style="width:' + slsWidth + 'px;');
    document.write(' height:' + slsHeight + 'px; overflow:' + slsOverflow + '; background-color:' + slsColor + '">');
    document.write(slsContents[i] + '</div>');
  }
  document.write('</div></div></div></div>');
}

slsBuildContainers();
window.onload = slsInit;
