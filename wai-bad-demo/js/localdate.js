function localdate(){
  var now = new Date();
  var days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
  var months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
  function fourdigits(number)	{
    return (number < 1000) ? number + 1900 : number;
  }
  var today =  "&nbsp;" + days[now.getDay()] + " " + date + " " + months[now.getMonth()] + " " + (fourdigits(now.getYear())) + ", Sunny Spells, 23&deg;C"
  var tochange = document.createElement("span"); tochange.innerHTML = today;
  document.getElementById("weather").replaceChild(tochange, document.getElementById("weather").lastChild);
}
addLoadEvent(localdate);