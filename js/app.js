/* Start of Scrollbar functionality */
window.onscroll = function() {myFunction()};

function myFunction() {
  /* Calculate full window scroll amount */
  var pixelsScrolled = document.body.scrollTop || document.documentElement.scrollTop;

  /* Calculate element height */
  var elemHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var percentScrolled = (pixelsScrolled / elemHeight) * 100;

  // console.log("DEBUG: \nPX scrolled: " + pixelsScrolled + "px, \nPg. height:  " + elemHeight + "px, \nScroll %:    " + percentScrolled + "%.");
  document.getElementById("progress-bar").style.width = percentScrolled + "%";

  console.log("percScrolled: " + percentScrolled);
  console.log("timerCondition: " + timerCondition);

  if (percentScrolled == 100) {
  //   console.log("100% SCROLLED MATE");
    timerCondition = false;
  }
}
/* End of Scrollbar functionality */


/* Start of Figma Embed functionality */

// DOM element of the iFrame which will be replaced.
const DOM_iFrame = document.getElementById("iframe_prototype");
var DOM_iFrame_Container = document.getElementById("frame_container");

// Note: the Figma prototype URLs are currently hardcoded. In the future this should be automatically retrieved from the Figma Plugin communication.
var Figma_URI = "ejJw4AVHI1kAIktWxJzYDb"; // Specifies the location of the Figma File
var Figma_Node_ID = "%253A2%26"; // Specifies the initial node selected in the Figma project
var Figma_Viewport = "497%252C275%252C0.2620800733566284"; // Specifies the viewport
var Figma_Scaling = "scale-down-width" // Specifies how Figma handles scaling issues (e.g. horizontal overflow)


/* Function that updates the targeted iFrame's source attribute with our Figma demonstrator prototype */
function updateiFrame(URI, nodeID, viewport, scaling, target) {
  // Construct the iFrame's new src URI with the specified arguments
  var updated_src = "https://www.figma.com/embed?embed_host=share&url=https://www.figma.com/proto/" + URI + "%3Fnode-id%3D" + nodeID + "%26viewport%3D" + viewport + "%26scaling%3D" + scaling;
  const hardcoded_src = "https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FejJw4AVHI1kAIktWxJzYDb%3Fnode-id%3D1%253A2%26viewport%3D497%252C275%252C0.2620800733566284%26scaling%3Dscale-down-width";
  // const hardcoded_src = "https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FejJw4AVHI1kAIktWxJzYDb%2FExample-Project-Bol.com%3Fnode-id%3D1%253A2%26viewport%3D497%252C275%252C0.2620800733566284%26scaling%3Dscale-down-width";

  // Update the iFrame DOM element's src
  target.src = updated_src;
  // target.src = hardcoded_src;
  // target.src = "https://www.arthurgeel.com/"

  // Resize the iFrame's size
  resizeiFrame();

  // DEBUG: print full src URL
  console.log("$DEBUG: " + updated_src);
  console.log("$DEBUG: " + hardcoded_src);
}

// Run the function with the arguments
updateiFrame(Figma_URI, Figma_Node_ID, Figma_Viewport, Figma_Scaling, DOM_iFrame);

/* End of Figma Embed functionality */


/* Start window resize watcher */
window.addEventListener("resize", resizeiFrame);

function resizeiFrame() {
  const padding = 40;

  DOM_iFrame.width = DOM_iFrame_Container.clientWidth - padding;
  DOM_iFrame.height = DOM_iFrame_Container.clientHeight - padding;
  console.log("$DEBUG: Page was resized.");
}
/* End window resize watcher */


// Potential future functionality: press keyboard to 'automanually' set Figma prototype viewer's to constrain width.
// However, this is quite hacky and perhaps can be circumvented by better embedding practices.
// DOM_iFrame_Container.dispatchEvent(new KeyboardEvent('keypress',{'key':'a'}));
// function pressKey(target, key) {
//   target.dispatchEvent(new KeyboardEvent('keypress', {'key':String(key)}));
// }
// DOM_iFrame_Container.dispatchEvent(new KeyboardEvent('keypress',{'key':'z'}));


/* Start of Key Mapping Functionality */
// Select the DOM body element
const DOM_Body = document.getElementById("body");

// Function that toggles a classname on a DOM id
function toggleClass(target, className) {
  target.classList.toggle(className);
}

// Add event listener to the document which runs this function every time a key is pressed
document.addEventListener("keypress", function(event) {

  // Console log the keycode for debugging
  console.log("$DEBUG: Key: " + event.keyCode);
  if (event.keyCode == 68 /* || event.keyCode == 100 */) {
    // 'd' or 'D' is pressed: toggle darkmode on Body DOM element
    toggleClass(DOM_Body, "darkmode");

  }  else if (event.keyCode == 120 || event.keyCode == 88) {
    // 'x' or 'X' is pressed: does nothing yet.
  }
});
/* End of Key Mapping Functionality */








/* Start of Timer Functionality */

// Grab DOM element of time spent on page.
const DOM_Timer = document.getElementById("timer");

// Generate a date object of initial page load
var startTime = Date.now();

var timerCondition = true;

// Function is called every 1000ms
setInterval(() => {

  if (timerCondition == true) {
    updateTime(DOM_Timer);
  }
}, 1000);


function updateTime(target) {
  var currentTime = formatTime(Math.floor((Date.now() - startTime)/1000));

  updateTargetBG(target, currentTime, "00:10", "00:20", "00:30");

  // console.log("$DEBUG: " + currentTime);
  target.innerHTML = currentTime;
}

function updateTargetBG(target, currentTime, timeStamp1, timeStamp2, timeStamp3) {
  if (currentTime == timeStamp1) {
    target.parentElement.style.backgroundColor = "#fcffd2";
  } else if (currentTime == timeStamp2) {
    target.parentElement.style.backgroundColor = "#ffedd2";
  } else if (currentTime == timeStamp3) {
    target.parentElement.style.backgroundColor = "#ffd2d2";
  }
}

// Function that formats the time
function formatTime(time) {
  // The largest round integer less than or equal to the result of time divided being by 60.
  let minutes = Math.floor(time / 60);

  // Seconds are the remainder of the time divided by 60 (modulus operator)
  let seconds = time % 60;

  // If the value of seconds is less than 10, then display seconds with a leading zero
  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  // If the value of minutes is less than 10, then display minutes with a leading zero
  if (minutes < 10) {
    minutes = `0${minutes}`;
  }

  // The output in MM:SS format
  return `${minutes}:${seconds}`;
}

/* End of Timer Functionality */



/* Automatic resizer for TextArea elements */
var textAreas = document.getElementsByTagName('textarea');
for (var i = 0; i < textAreas.length; i++) {
  textAreas[i].setAttribute('style', 'height:' + (textAreas[i].scrollHeight) + 'px;overflow-y:hidden;');
  textAreas[i].addEventListener("input", OnInput, false);
}

function OnInput() {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
}

/* Experimental: Fullscreen when clicking on canvas */
const DOM_Evaluation_Container = document.getElementById("evaluation_container");

DOM_iFrame_Container.addEventListener("click", function() {
  toggleClass(DOM_Evaluation_Container, "hide");

  resizeiFrame();
});
