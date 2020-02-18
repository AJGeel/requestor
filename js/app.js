/* Start of Scrollbar functionality */
window.onscroll = function() {myFunction()};

function myFunction() {
  /* Calculate full window scroll amount */
  var pixelsScrolled = document.body.scrollTop || document.documentElement.scrollTop;

  /* Calculate element height */
  var elemHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var percentScrolled = (pixelsScrolled / elemHeight) * 100;

  document.getElementById("progress-bar").style.width = percentScrolled + "%";

  // console.log("$DEBUG: percScrolled: " + percentScrolled);
  // console.log("$DEBUG: timerCondition: " + timerCondition);

  if (percentScrolled >= 75) {
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

  // Hardcoded iFrame source. I'm keeping this in to help me understand the URI Encoding issue I was dealing with earlier. However, it is fixed now.
  const hardcoded_src = "https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FejJw4AVHI1kAIktWxJzYDb%3Fnode-id%3D1%253A2%26viewport%3D497%252C275%252C0.2620800733566284%26scaling%3Dscale-down-width";

  // Update the iFrame DOM element's src
  target.src = updated_src;
  // target.src = hardcoded_src; /* Toggle this to override the target source with the hardcoded src. */
  // target.src = "https://www.arthurgeel.com/"

  // Resize the iFrame's size
  resizeiFrame();

  // DEBUG: print full src URL
  // console.log("$DEBUG: " + updated_src);
  // console.log("$DEBUG: " + hardcoded_src);
}

// Run the function with the arguments
updateiFrame(Figma_URI, Figma_Node_ID, Figma_Viewport, Figma_Scaling, DOM_iFrame);

/* End of Figma Embed functionality */


/* Start window resize watcher */
// If the window is resized, carry out the 'resizeiFrame' function
window.addEventListener("resize", resizeiFrame);

function resizeiFrame() {
  const padding = 40;

  // Update iFrame container height and width
  DOM_iFrame.width = DOM_iFrame_Container.clientWidth - padding;
  DOM_iFrame.height = DOM_iFrame_Container.clientHeight - padding;
  // console.log("$DEBUG: Page was resized.");
}
/* End window resize watcher */


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
// const DOM_Timer = document.getElementById("timer");
//
// // Generate a date object of initial page load
// var startTime = Date.now();
//
// var timerCondition = true;
//
// // Function is called every 1000ms
// setInterval(() => {
//
//   if (timerCondition == true) {
//     updateTime(DOM_Timer);
//   }
// }, 1000);


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



/* Start of Automatic Resizer for TextArea Elements */

var textAreas = document.getElementsByTagName('textarea');
for (var i = 0; i < textAreas.length; i++) {
  textAreas[i].setAttribute('style', 'height:' + (textAreas[i].scrollHeight) + 'px; overflow-y:hidden;');
  textAreas[i].addEventListener("input", OnInput, false);
}

function OnInput() {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
}

/* End of Automatic Resizer for TextArea Elements */







/* Start of Form Functionality */

// Function that progressively discloses the form questions.
function formProgressiveDisclosure(value, target) {
  // Make DOM call to identify element to be disclosed.
  var targ = document.getElementById("h" + target + "_prog");

  if (value == 0) {
    // No issue found, no need to show follow-up questions.
    // Most of the times, the element should already be hidden, but we make sure it always is.
    targ.style.display = "none";

  } else if (value == 1 || value == 2 || value == 3 || value == 4) {
    // If there is an issue (in any quantity), we do show the follow-up.
    targ.style.display = "initial";

    for (var i = 0; i < textAreas.length; i++) {
      textAreas[i].style.height = 'auto';
    }
  }
}


/* End of Form Functionality */













/* Experimental: Fullscreen when clicking on canvas */
const DOM_Evaluation_Container = document.getElementById("evaluation_container");

DOM_iFrame_Container.addEventListener("click", function() {
  toggleClass(DOM_Evaluation_Container, "hide");

  resizeiFrame();
});


/* Experimental: reminder to save work */

window.addEventListener("beforeunload", function(event) {
  alert('hey dude!');
  // Remind user to save their work or whatever.
});


/* Experimental: calculate color contrasts */

// Calculates perceived luminance. Value output: [0, ~258.8]
function calculateLuminance(red, green, blue) {
  return Math.sqrt( 0.299 * Math.pow(red, 2) + 0.587 * Math.pow(green, 2) + 0.144 * Math.pow(blue, 2));
}

// Calculates perceived contrast. Value output: [1, ~5177]
function calculateContrast(L1, L2) {
  // If/else statement to find the highest value, this one should go first
  return ((L1 + 0.05) / (L2 + 0.05));
}

// function luminanace(r, g, b) {
//     var a = [r, g, b].map(function (v) {
//         v /= 255;
//         return v <= 0.03928
//             ? v / 12.92
//             : Math.pow( (v + 0.055) / 1.055, 2.4 );
//     });
//     return a[0] * 0.2126 + a[1] * 0.7152 + a[2] * 0.0722;
// }
// function contrast(rgb1, rgb2) {
//     var lum1 = luminanace(rgb1[0], rgb1[1], rgb1[2]);
//     var lum2 = luminanace(rgb2[0], rgb2[1], rgb2[2]);
//     var brightest = Math.max(lum1, lum2);
//     var darkest = Math.min(lum1, lum2);
//     return (brightest + 0.05)
//          / (darkest + 0.05);
// }
// contrast([255, 255, 255], [255, 255, 0]); // 1.074 for yellow
// contrast([255, 255, 255], [0, 0, 255]); // 8.592 for blue
// // minimal recommended contrast ratio is 4.5, or 3 for larger font-sizes
