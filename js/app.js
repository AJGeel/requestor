const windowWidth = document.getElementById('window-width');

/* Start of Scrollbar functionality */
window.onscroll = function() {
  trackScrollPercentage()
};

function trackScrollPercentage() {
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
  // const hardcoded_src = "https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FejJw4AVHI1kAIktWxJzYDb%3Fnode-id%3D1%253A2%26viewport%3D497%252C275%252C0.2620800733566284%26scaling%3Dscale-down-width";

  // Update the iFrame DOM element's src
  // target.src = updated_src;
  // target.src = hardcoded_src; /* Toggle this to override the target source with the hardcoded src. */
  // target.src = "https://www.arthurgeel.com/"

  // Resize the iFrame's size
  resizeiFrame();

  // DEBUG: print full src URL
  // console.log("$DEBUG: " + updated_src);
  // console.log("$DEBUG: " + hardcoded_src);
}

// Run the function with the arguments
// updateiFrame(Figma_URI, Figma_Node_ID, Figma_Viewport, Figma_Scaling, DOM_iFrame);
resizeiFrame();

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

  if (window.innerWidth == 840) {
    windowWidth.innerHTML = "exactly " + window.innerWidth;
  } else {
    windowWidth.innerHTML = "only " + window.innerWidth;
  }
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
  // console.log("$DEBUG: Key: " + event.keyCode);
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
function formProgressiveDisclosure(value, target, evaluationType) {

  if (evaluationType == 'nielsen') {
    // Make DOM call to identify element to be disclosed.
    let targ = document.getElementById("h" + target + "_prog");

    let targetNodeChildren = targ.querySelectorAll('textarea');

    if (value == 0) {
      // No issue found, no need to show follow-up questions.
      // Most of the times, the element should already be hidden, but we make sure it always is.
      // targ.style.display = "none";
      targ.style.height = `0px`;
      targ.style.opacity = `0`;

      // Select all textareas within the progressive disclosure element, and add the 'disabled' tag.
      // We do this to exclude it from the serializing function, meaning it will not be included in the data transfer.
      targ.querySelectorAll('textarea').forEach((item) => {
        item.disabled = true;
        // console.log(item);
      });


      // Time out for the animation duration.
      setTimeout(function() {
        targ.style.visibility = `hidden`;
      }, 300)

    } else if (value == 1 || value == 2 || value == 3 || value == 4) {
      // If there is an issue (in any quantity), we do show the follow-up.
      // targ.style.display = "initial";
      targ.style.height = `268px`;
      targ.style.opacity = `1`;
      targ.style.visibility = `visible`;

      // Select all textareas within the progressive disclosure element, and add the 'disabled' tag.
      targ.querySelectorAll('textarea').forEach((item) => {
        item.disabled = false;
        // console.log(item);
      });

      for (var i = 0; i < textAreas.length; i++) {
        textAreas[i].style.height = 'auto';
      }
    }
  }
}


/* End of Form Functionality */













/* Experimental: Fullscreen when clicking on canvas */
// const DOM_Evaluation_Container = document.getElementById("evaluation_container");
//
// DOM_iFrame_Container.addEventListener("click", function() {
//   toggleClass(DOM_Evaluation_Container, "hide");
//
//   resizeiFrame();
// });


/* Experimental: reminder to save work */


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


/* If the user hovers over the information to read it, we make the Lottie animation less obtrusive */
const evaluationContainer = document.getElementById("evaluation_container");
evaluationContainer.addEventListener("mouseenter", function(event) {
  // animation.pause();       /* We can pause the animation completely */
  animation.setSpeed(.2);     /* Or can choose to slow it down. */
});

evaluationContainer.addEventListener("mouseleave", function(event) {
  // animation.play();
  animation.setSpeed(1);
});


function reviewInvitation() {
  // alert("This should trigger an animation that opens the envelope and does some of the onboarding. However, for now it's kept simple.");

  // Grab onboarding wrapper DOM element and hide it.
  const onboardingWrapper = document.querySelector(".onboarding-wrapper");
  // onboardingWrapper.style.display = "none";
  onboardingWrapper.classList.add("destroy-modal-1s");

  // Grab evaluation form and make it scrollable again.
  evaluationContainer.style.height = "initial";
  evaluationContainer.style.overflowY = "visible";
}

function declineInvitation() {
  const answer = confirm("Are you sure you want to decline this invitation? This will close the current window.");

  if (answer == true) {
    // alert("Page is closing. If you change your mind, you can still access the invitation later by using the link you received earlier.");
    window.location.href = "../../index.php";
  } else {
    // alert("You stayed! Noice!");
  }
}

// Eventlistener that makes the envelope invitation move if the user hovers over the accept button.
const onboardingBtn = document.querySelector(".onboarding-btn");
const invitationImg = document.getElementById("invitationImg");
const onboardingBg = document.querySelector(".onboarding-wrapper");

onboardingBtn.addEventListener("mouseenter", function(event) {
  invitationImg.classList.toggle("hover");
  onboardingBg.style.transition = "background-color .6s ease-in-out";
  onboardingBg.classList.toggle("hover");
});

onboardingBtn.addEventListener("mouseleave", function(event) {
  invitationImg.classList.toggle("hover");
  onboardingBg.classList.toggle("hover");
});

function startEvaluation() {
  // Scroll to the Scenario / Task list.
  // const evaluation_intro = document.getElementById("evaluation_intro");
  // evaluation_intro.scrollIntoView();

  // Unblur the prototype frame.
  const frame = document.getElementById("frame");
  frame.style.transition = "filter 2s ease-in-out, opacity 2s ease-in-out";
  frame.style.filter = "blur(0px)";
  frame.style.opacity = "1";

  // Hide the 'start' button.
  const startEvaluationBtn = document.getElementById("startEvaluationBtn");
  startEvaluationBtn.classList.add("destroy-button");

  const prevElemSibling = startEvaluationBtn.previousElementSibling

  prevElemSibling.style.transition = "margin-bottom .5s ease-in-out";
  prevElemSibling.style.marginBottom = "-4.4em";

  const frameModal = document.getElementById("frameModal");
  frameModal.classList.add("destroy-modal");
  // frameModal.style.display = "none";
  // startEvaluationBtn.style.animation = "fadeOutElement 1s ease-in-out";
  // startEvaluationBtn.style.animationFillMode = "forwards";

}

// function updateFrameModalContent() {
//   const frameModal = document.getElementById("frameModal");
//
//   frameModal.classList.remove("destroy-modal");
//   frameModal.classList.add("restore-modal");
//
//   frameModal.querySelector("h1").innerHTML = "Heads up!";
//   frameModal.querySelector("p").innerHTML = "You did not complete all of the heuristics &mdash; we recommend you to review them again. However, you may also submit your evaluation as-is. To do so, simply click on the button once more.";
// }

/* Function that reads and stores the URL parameters */
// const queryString = window.location.search;
// console.log(queryString);
// https://www.sitepoint.com/get-url-parameters-with-javascript/

/* Lottie Animation Library */
const animation = lottie.loadAnimation({
  container: document.getElementById('lottie-point-right'),
  renderer: 'svg',
  loop: true,
  autoplay: true,
  path: '/i/lottie/data.json'
});

// while (animation.playSpeed >= 0.1) {
//   setTimeout(function() {
//     // animation.setSpeed(animation.playSpeed * 0.99);
//     console.log("hello world");
//   }, 50);
// }

// async function wait(ms) {
//   return new Promise(resolve => {
//     setTimeout(resolve, ms);
//   });
// }

/* Functionality: Serialize form data with JS */
const form = document.querySelector('form');

// function serializeForm() {
//   let formData = serialize(form);
//   console.log(formData);
// }

/*!
 * Serialize all form data into a query string
 * (c) 2018 Chris Ferdinandi, MIT License, https://gomakethings.com
 * @param  {Node}   form The form to serialize
 * @return {String}      The serialized form data
 */

function serialize(form) {
	// Setup our serialized data
	var serialized = [];

	// Loop through each field in the form
	for (var i = 0; i < form.elements.length; i++) {

		var field = form.elements[i];

		// Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields
		if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;

		// If a multi-select, get all selections
		if (field.type === 'select-multiple') {
			for (var n = 0; n < field.options.length; n++) {
				if (!field.options[n].selected) continue;
				serialized.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[n].value));
			}
		}

		// Convert field data to a query string
		else if ((field.type !== 'checkbox' && field.type !== 'radio') || field.checked) {
			serialized.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value));
		}
	}

	return serialized.join('&');

};


let submittedBefore = false;

/*!
 * Check form for completeness and validity, notify end-user if incomplete/invalid.
 * (c) 2020 Arthur Geel
 * @param  {type} Evaluation type: determines resulting validation logic
 */
function validateForm(type) {

  if (type == 'nielsen') {
    // First: get all of the data that is inside the form.
    let serializedFormString = serialize(form);
    formChanged = false;

    // Then: we check if all required values (input on heuristics) are filled.
    let testFailed = false;
    const numHeuristics = 10;
    let heuristicsFailed = [];

    for (let i = 1; i <= numHeuristics; i++) {
      // try for values 1 through 10: see if the heuristics are filled
      if (serializedFormString.includes(`heu_${i}`) != true) {
        // If one of the values is not included, the test fill fail.
        testFailed = true;
        heuristicsFailed.push(i);
        console.log(`Heuristic ${i} is incomplete.`);
      }
    }

    if (testFailed == true && submittedBefore == false) {
      // Test has failed: notify the user.
      alert("Not all heuristics were completed. However, you may still submit your results. To do so, click the button again.");

      // Log all instances of incomplete heuristics to the console
      for (i = i; i <= heuristicsFailed.length; i++) {
        console.log(`Heuristic ${i};`);
      }

      // Make sure that the next submit will send the data through PHP.
      submittedBefore = true;

    } else {
      // Send the form data to the PHP
      form.action = "backend/form_handler.php";
    }


  } else {
    // Other forms are not supported yet.
  }
}

/* Start dynamic favicon functionality */

function updateFavicon(newName) {
  // First: make DOM call to grab favicon
  const favicon = document.getElementById("favicon");

  // Then: adjust its colour.
  favicon.setAttribute("href", `i/favicon-${newName}.png`);
}

/* End dynamic favicon functionality */

// Function for setting cookies
function setCookie(cookie_name, cookie_value, num_days) {
  let d = new Date();
  d.setTime(d.getTime() + num_days*24*60*60*1000);
  let expires = `expires=${d.toUTCString()}`;
  document.cookie = `${cookie_name}=${cookie_value};${expires};path=/`;
}


// Function for getting cookies
function getCookie(cookie_name) {
  let name = `${cookie_name}=`;
  let decodedCookie = decodeURIComponent(document.cookie);

  let ca = decodedCookie.split(';');

  for(var i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }

    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }

  }
  return "";
}

function checkUID() {
  // Get the user's unique id
  let temp_uid = getCookie("temp_uid");

  // If it is not defined yet
  if (temp_uid == "" || temp_uid == null) {
    // Generate a random user id. // TODO: make this happen server-side in the future for security reasons.
    setCookie("temp_uid", generateRandom(99999), 182 /* Standard save for half a year*/ );
  }

  // Update the form's form_user_id with this value.
  form_user_id.value = getCookie("temp_uid");
}

function checkCookiesAccepted() {
  // Check if the visitor has accepted cookies from Requestor
  let accepted_cookies = getCookie("accepted_cookies");

  // If they did not respond yet
  if (accepted_cookies == "" || accepted_cookies == null) {

  } else if (accepted_cookies == "true" ){
    // Do not display the cookie modal.
  }
}

checkUID();

function generateRandom(max) {
  return Math.floor(Math.random()*max);
}

// Keep track of user input. If the form has been used, we want to make sure the user does not accidentally leave the page.
let formChanged = false;
form.addEventListener('change', () => formChanged = true);
window.addEventListener('beforeunload', (event) => {
  if (formChanged) {
    event.returnValue = 'You have unfinished changes!';
  }
});
