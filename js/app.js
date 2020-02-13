/* Start Scrollbar functionality */
window.onscroll = function() {myFunction()};

function myFunction() {
  /* Calculate full window scroll amount */
  var pixelsScrolled = document.body.scrollTop || document.documentElement.scrollTop;

  /* Calculate element height */
  var elemHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var percentScrolled = (pixelsScrolled / elemHeight) * 100;

  console.log("DEBUG: \nPX scrolled: " + pixelsScrolled + "px, \nPg. height:  " + elemHeight + "px, \nScroll %:    " + percentScrolled + "%.");
  document.getElementById("progress-bar").style.width = percentScrolled + "%";
}
/* End Scrollbar functionality */
