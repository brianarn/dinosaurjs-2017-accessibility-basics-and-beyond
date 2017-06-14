var annot = function ()
{  
  var getScrollTop = function () {
    // DOM scroll top
    if (document.documentElement.scrollTop == 0) {
      return document.body.scrollTop;
    // IE scroll top
    } else if (document.documentElement.scrollTop) {
      return document.documentElement.scrollTop;
    // Netscape scroll top
    } else if(window.pageYOffset) {
      return window.pageYOffset;
    }
  }
  
  var lightbox =
  {
    /**
     * Set up the lightbox, fill it and manage focus
     *
     * @param  DOMElement  Source element for the lightbox content
     * @param  DOMElement  Annotation element that recieved focus
     * @return  false    To desrupt default click handling
     */
    construct : function (contentElm, focusedElm) {
      // Make sure the lightbox is not already open
      lightbox.destruct();

      // Get the elements that build the lightbox
      var lbBoxElm = document.getElementById('lightbox_container');
      var lbBackElm = document.getElementById('lightbox_background')
      
      // clone the content and stick it into the alert
      for (var i=0; i < contentElm.childNodes.length; i++) {
        var clone = contentElm.childNodes[i].cloneNode(true);
        lbBoxElm.appendChild(clone);
      }
      
      // position the lightbox
      lbBoxElm.style.marginTop = (50 + getScrollTop()) + "px";
      // activate the lightbox style
      lbBackElm.className = 'active';
      lbBoxElm.className = 'note';
      // set the background height to the document height
      lbBackElm.style.height = document.body.offsetHeight + 'px';
      // destroy the lightbox when the background is clicked
      lbBackElm.onclick = function (event) {
          // get the event
          if (!event) {
            var event = window.event
          }
          // get the clicked element
          if (event.target) {
            var target = event.target;
          } else if (event.srcElement) {
            var target = event.srcElement;
          }
          // close the lightbox if clicked on background
          if (target.id == 'lightbox_background') {
            return lightbox.destruct(focusedElm);
          }
        }
      
      var close = document.createElement('a');
      close.href = '#';
      close.id = 'close_link';
      close.appendChild( document.createTextNode('Close') );
      lbBoxElm.insertBefore(close, lbBoxElm.childNodes[0]);
      
      var aElms = lbBoxElm.getElementsByTagName('a');
      aElms[aElms.length-1].onclick =
        close.onclick = function () {
          return lightbox.destruct(focusedElm);
        };
      
      var lbHeader = lbBoxElm.getElementsByTagName('h3')[0];
      lbHeader.tabIndex = 0;
      // Add keyboard disable function
      lbHeader.onkeydown = function (evt) {
        var key;
        if (!evt) var evt = window.event;
        if (evt.keyCode) key = evt.keyCode;
        else if (evt.which) key = evt.which;
        
        // on keydown ESC or RETURN
        if (key == 27 || key == 13) {
          lightbox.destruct(focusedElm);
        }
      }
      
      // For IE6 hide all select elements
      isIe  = false /*@cc_on || true @*/; 
      isIe6  = isIe && (document.implementation != null) && (document.implementation.hasFeature != null); 
      if (isIe6) {
        var selects = document.getElementsByTagName('select');
        for (var i=0; i < selects.length; i++) {
          selects[i].style.visibility = 'hidden';
        }
      }
      
      // Set focus to the lightbox header,
      // use timeout to prevent odd behavior
      window.setTimeout(function () {
          lbHeader.focus();
        }, 10);
      return false;
    }
  
  ,  destruct : function (focusedElm) {
      var lbBoxElm = document.getElementById('lightbox_container');
      var lbBackElm = document.getElementById('lightbox_background');
      
      if (lbBoxElm.childNodes.length) {
        for (var i = lbBoxElm.childNodes.length-1; i >= 0; i--) {
          lbBoxElm.removeChild( lbBoxElm.childNodes[i] );
        }
      }
      lbBackElm.className =
      lbBoxElm.className = '';
      lbBoxElm.style.marginTop = 
      lbBackElm.style.height = 0;
      lbBoxElm.onkeydown = '';
      
      // For IE6 hide all select elements
      isIe  = false /*@cc_on || true @*/; 
      isIe6  = isIe && (document.implementation != null) && (document.implementation.hasFeature != null); 
      if (isIe6) {
        var selects = document.getElementsByTagName('select');
        for (var i=0; i < selects.length; i++) {
          selects[i].style.visibility = 'visible';
        }
      }

      if (focusedElm) {
        // Set focus, use timeout to prevent odd behavior
        window.setTimeout(function () {
            focusedElm.focus();
          }, 10);
        return false;
      }
      return true
    }
  }
  
  /**
   * Manage highlighting of the target of an annotation
   */
  var highlight = {
  
    time : 0
    
    /**
     * Add 'targeted' class to the element of the annotation
     */
  ,  focus : function (annot) {
      var target = highlight.getTargetElm(annot);
      if (target) {
        // add the 'targeted' class
        target.className = target.className + ' targeted';
      }
    }
    
    /**
     * Remove 'targeted' class to the element of the annotation
     */
  ,  blur : function (annot) {
      var target = highlight.getTargetElm(annot);
      if (target) {
        // remove the 'targeted' class
        target.className = target.className.replace('targeted', '');
      }
    }
    
    /**
     * Find the targeted element of the annotation
     */
  ,  getTargetElm : function (annot) {
      var target = annot;
      if (annot.className.match(/prev_sib/)) {
        do { // Target the previous sibling element
          target = target.previousSibling
        } while (target.nodeType != 1);

      } else if (annot.className.match(/next_sib/)) {
        do { // Target the next sibling element
          target = target.nextSibling
        } while (target.nodeType != 1);

      } else if (annot.className.match(/parent_node/)) {
        // target the parent element
        target = annot.parentNode
        
      } else {
        // No class indicating the target was found
        return;
      }
      
      return target;
    }
  }
  
  // public functions
  return {
    click : function (elm) {
      var descriptionId = elm.href.slice( elm.href.indexOf('#') ).slice(1);
      var description = document.getElementById(descriptionId);
      if (!description) {
        return true; // no element found, default link behavior
      }
      return lightbox.construct(description, elm);
    }
  ,  mouseover : function (elm) {
      highlight.focus(elm.parentNode);
    }
  ,  mouseout : function (elm) {
      highlight.blur(elm.parentNode);
    }
  ,  focus : function (elm) {
      // note the time of focus
      var d = new Date();
      highlight.time = d.getTime();
      
      highlight.focus(elm.parentNode);
    }
  ,  blur : function (elm) {
      var d = new Date();
      // Opera bug workaround; fires focus and blur on keyboard nav
      if (highlight.time != d.getTime()) {
        highlight.blur(elm.parentNode);
      }
    }
  };  
}();

function init_annotations() {
  // Test for DOM support
  if (( !document.getElementsByTagName )
  ||  ( !document.getElementById ))
  {
    return;
  }

  var a_elms = document.getElementsByTagName('a');
  var annotations = [];
  for (var i=0; i < a_elms.length; i++) {
    if (a_elms[i].parentNode.className.match( /annot_link/ )) {
      a_elms[i].onclick = function() { return annot.click(this) };
      a_elms[i].onmouseover = function() { return annot.mouseover(this) };
      a_elms[i].onmouseout = function() { return annot.mouseout(this) };
      a_elms[i].onfocus = function() { return annot.focus(this) };
      a_elms[i].onblur = function() { return annot.blur(this) };
    }
  }
}
addLoadEvent(init_annotations);