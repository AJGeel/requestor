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
}
/* End of Scrollbar functionality */


/* Start of Figma Embed functionality */

// DOM element of the iFrame which will be replaced.
const DOM_iFrame = document.getElementById("iframe_prototype");
var DOM_iFrame_Container = document.getElementById("frame_container");

// Note: the Figma prototype URLs are currently hardcoded. In the future this should be automatically retrieved from the Figma Plugin communication.
var Figma_URI = "ejJw4AVHI1kAIktWxJzYDb"; // Specifies the location of the Figma File
var Figma_Node_ID = "0%3A1"; // Specifies the initial node selected in the Figma project
var Figma_Viewport = "285%2C345%2C0.32568514347076416"; // Specifies the viewport
var Figma_Scaling = "scale-down-width" // Specifies how Figma handles scaling issues (e.g. horizontal overflow)


/* Function that updates the targeted iFrame's source attribute with our Figma demonstrator prototype */
function updateiFrame(URI, nodeID, viewport, scaling, target) {
  // Construct the iFrame's new src URI with the specified arguments
  var updated_src = "https://www.figma.com/embed?embed_host=share&url=https://www.figma.com/proto/" + URI + "?node-id=" + nodeID + "&viewport=" + viewport + "&scaling=" + scaling;

  // Update the iFrame DOM element's src
  // target.src = updated_src;
  // target.src = "https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FejJw4AVHI1kAIktWxJzYDb%2FExample-Project-Bol.com%3Fnode-id%3D1%253A2%26viewport%3D497%252C275%252C0.2620800733566284%26scaling%3Dscale-down-width";
  // target.src = "https://www.arthurgeel.com/"

  // Then, update the iFrame's sizing based on the size of its container
  // However, we do add a consistent padding to all sides
  const padding = 40;
  target.width = DOM_iFrame_Container.clientWidth - padding;
  target.height = DOM_iFrame_Container.clientHeight - padding;

  // DEBUG: print full src URL and frame container's sizing
  console.log("$DEBUG: " + updated_src);
  console.log("$DEBUG: W: " + DOM_iFrame_Container.clientWidth);
  console.log("$DEBUG: H: " + DOM_iFrame_Container.clientHeight);
}

// Run the function with the arguments
updateiFrame(Figma_URI, Figma_Node_ID, Figma_Viewport, Figma_Scaling, DOM_iFrame);

/* End of Figma Embed functionality */


/* Start window resize watcher */
window.addEventListener("resize", doSth);

function doSth() {
  console.log("Hello");
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
  if (event.keyCode == 100 || event.keyCode == 68) {
    // 'd' or 'D' is pressed: toggle darkmode on Body DOM element
    toggleClass(DOM_Body, "darkmode");

  }  else if (event.keyCode == 120 || event.keyCode == 88) {
    // 'x' or 'X' is pressed: does nothing yet.
  }
});
/* End of Key Mapping Functionality */
