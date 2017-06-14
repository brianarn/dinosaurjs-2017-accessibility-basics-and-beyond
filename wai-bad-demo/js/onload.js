/* 
* Multiple onload events
* By Simon Willison
* http://simonwillison.net/2004/May/26/addLoadEvent/
*
*/
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}