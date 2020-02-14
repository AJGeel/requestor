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
const iframe_prototype = document.getElementById("iframe_prototype");
var frame = document.getElementById("frame_container");

// Note: the Figma prototype URLs are currently hardcoded. In the future this should be automatically retrieved from the Figma Plugin communication.
var Figma_URI = "ejJw4AVHI1kAIktWxJzYDb"; // Specifies the location of the Figma File
var Figma_Node_ID = "0%3A1"; // Specifies the initial node selected in the Figma project
var Figma_Viewport = "285%2C345%2C0.32568514347076416"; // Specifies the viewport


/* Function that updates the targeted iFrame's source attribute with our Figma demonstrator prototype */
function updateiFrame(URI, nodeID, viewport, target) {
  // Construct the iFrame's new src URI with the specified arguments
  var updated_src = "https://www.figma.com/embed?embed_host=share&url=https://www.figma.com/proto/" + URI + "?node-id=" + nodeID + "&viewport=" + viewport + "&scaling=scale-down-width";

  // Update the iFrame DOM element's src
  target.src = updated_src;

  // Then, update the iFrame's sizing based on the size of its container
  // However, we do add a consistent padding to all sides
  const padding = 40;
  target.width = frame.clientWidth - padding;
  target.height = frame.clientHeight - padding;

  // DEBUG: print full src URL and frame container's sizing
  console.log("$DEBUG: " + updated_src);
  console.log("$DEBUG: W: " + frame.clientWidth);
  console.log("$DEBUG: H: " + frame.clientHeight);
}

// Run the function with the arguments
updateiFrame(Figma_URI, Figma_Node_ID, Figma_Viewport, iframe_prototype);

/* End of Figma Embed functionality */


// Potential future functionality: press keyboard to 'automanually' set Figma prototype viewer's to constrain width.
// However, this is quite hacky and perhaps can be circumvented by better embedding practices.
// element.dispatchEvent(new KeyboardEvent('keypress',{'key':'a'}));
// element.dispatchEvent(new KeyboardEvent('keypress',{'key':'z'}));
