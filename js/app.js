/*------------------------------------------------------------------

01. DOM Calls & Global Vars
02. OnLoad Calls & EventListeners
03. Reusable Functions

-------------------------------------------------------------------*/

/*--------------------------------------------------
01. DOM Calls & Global Vars
---------------------------------------------------*/

const windowWidth = document.getElementById('window-width');

// DOM element of the iFrame which will be replaced.
const DOM_iFrame = document.getElementById("iframe_prototype");
let DOM_iFrame_Container = document.getElementById("frame_container");

// Note: the Figma prototype URLs are currently hardcoded. In the future this should be automatically retrieved from the Figma Plugin communication.
let Figma_URI = "ejJw4AVHI1kAIktWxJzYDb"; // Specifies the location of the Figma File
let Figma_Node_ID = "%253A2%26"; // Specifies the initial node selected in the Figma project
let Figma_Viewport = "497%252C275%252C0.2620800733566284"; // Specifies the viewport
let Figma_Scaling = "scale-down-width" // Specifies how Figma handles scaling issues (e.g. horizontal overflow)

// Select the DOM body element
const DOM_Body = document.getElementById("body");

// Generate a date object of initial page load
let startTime = Date.now();

// Keep track of user performance
let timeSpentTotal = 0;
let timeSpentOnOnboarding = 0;
let timeSpentOnScenario = 0;
let timeSpentOnEvaluation = 0;
let completedScenario = 0;

// Select the evaluation container to slow down the animation if the user hovers over it.
const evaluationContainer = document.getElementById("evaluation_container");

/*--------------------------------------------------
02. OnLoad calls and EventListeners
---------------------------------------------------*/

// If the user scrolls in the window, we track the scroll percentage and update the visual indicator of that.
window.onscroll = function() { trackScrollPercentage() };

// If the window is resized, carry out the 'resizeiFrame' function
window.addEventListener("resize", resizeiFrame);

// On page load: resize the iFrame
resizeiFrame();

// Add event listener to the document which runs this function every time a key is pressed
document.addEventListener("keypress", function(event) {
  // console.log("$DEBUG: Key: " + event.keyCode);
  if (event.keyCode == 68 /* || event.keyCode == 100 */) {
    // 'd' or 'D' is pressed: toggle darkmode on Body DOM element REMOVED 2020-05-04
    // toggleClass(DOM_Body, "darkmode");
  }
});

// Select all textAreas on the DOM for automatic resizing functionality
let textAreas = document.getElementsByTagName('textarea');
for (var i = 0; i < textAreas.length; i++) {
  textAreas[i].setAttribute('style', 'height:' + (textAreas[i].scrollHeight) + 'px; overflow-y:hidden;');
  textAreas[i].addEventListener("input", OnInput, false);
}

/* If the user hovers over the information to read it, we make the Lottie animation less obtrusive */
evaluationContainer.addEventListener("mouseenter", function(event) {
  // animation.pause();       /* We can pause the animation completely */
  animation.setSpeed(.2);     /* Or can choose to slow it down. */
});

/* If their mouse leaves, return to the original speed. */
evaluationContainer.addEventListener("mouseleave", function(event) {
  // animation.play();
  animation.setSpeed(1);
});

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

/* Lottie Animation Library */
const animation = lottie.loadAnimation({
  container: document.getElementById('lottie-point-right'),
  renderer: 'svg',
  loop: true,
  autoplay: true,
  path: '/i/lottie/data.json'
});

const form = document.querySelector('form');

let submittedBefore = false;

// Keep track of user input. If the form has been used, we want to make sure the user does not accidentally leave the page.
let formChanged = false;
form.addEventListener('change', () => formChanged = true);
window.addEventListener('beforeunload', (event) => {
  if (formChanged) {
    event.returnValue = 'You have unfinished changes!';
  }
});

// Check whether the user has been assigned an anonymous UID, if not, assign one.
checkUID();

/*--------------------------------------------------
03. Reusable Functions
---------------------------------------------------*/

function trackScrollPercentage() {
  /* Calculate full window scroll amount */
  let pixelsScrolled = document.body.scrollTop || document.documentElement.scrollTop;

  /* Calculate element height */
  let elemHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  let percentScrolled = (pixelsScrolled / elemHeight) * 100;

  document.getElementById("progress-bar").style.width = percentScrolled + "%";

}

/* Function that updates the targeted iFrame's source attribute with our Figma demonstrator prototype */
function updateiFrame(URI, nodeID, viewport, scaling, target) {
  // Construct the iFrame's new src URI with the specified arguments
  let updated_src = "https://www.figma.com/embed?embed_host=share&url=https://www.figma.com/proto/" + URI + "%3Fnode-id%3D" + nodeID + "%26viewport%3D" + viewport + "%26scaling%3D" + scaling;

  // Hardcoded iFrame source. I'm keeping this in to help me understand the URI Encoding issue I was dealing with earlier. However, it is fixed now.
  // const hardcoded_src = "https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FejJw4AVHI1kAIktWxJzYDb%3Fnode-id%3D1%253A2%26viewport%3D497%252C275%252C0.2620800733566284%26scaling%3Dscale-down-width";

  // Update the iFrame DOM element's src
  target.src = updated_src;
  // target.src = hardcoded_src; /* Toggle this to override the target source with the hardcoded src. */
  // target.src = "https://www.arthurgeel.com/" /* Test to see how live websites function */

  // Resize the iFrame's size
  resizeiFrame();
}



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



// Function that toggles a classname on a DOM id
function toggleClass(target, className) {
  target.classList.toggle(className);
}

/* Function that returns the amount of seconds that have passed since opening the page */
function checkTimeElapsed() {
  return Math.floor((Date.now() - startTime)/1000);
}
/* We store the time for a number of things:
   - Total time spent in this interaction.
   - Time spent on the Onboarding part.
   - Time spent on acting out the Scenario part.
   - Time spent on carrying out the Evaluation part.

   The checkTimeElapsed() function is used to calculate these durations.
*/



// Function that automatically resizes form items based on their calculated heights
function OnInput() {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
}


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
      targ.style.height = `316px`;
      targ.style.opacity = `1`;
      targ.style.visibility = `visible`;

      // After 1000ms, set the height to 'auto' to prevent vertical overflow if textareas are larger than normal.
      setTimeout(function() {
        targ.style.height = 'auto';
      }, 1000)

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

// Function to handle reviewing of invitations
function reviewInvitation() {
  // Grab onboarding wrapper DOM element and hide it.
  const onboardingWrapper = document.querySelector(".onboarding-wrapper");
  // onboardingWrapper.style.display = "none";
  onboardingWrapper.classList.add("destroy-modal-1s");

  // After the animation, remove the DOM element for optimization
  setTimeout(function() {
    onboardingWrapper.remove();
  }, 2000);

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

function startEvaluation() {
  // Unblur the prototype frame.
  const frame = document.getElementById("frame");
  frame.style.transition = "filter 2s ease-in-out, opacity 2s ease-in-out";
  frame.style.filter = "blur(0px)";
  frame.style.opacity = "1";

  // Hide the 'start' button.
  const startEvaluationBtn = document.getElementById("startEvaluationBtn");
  startEvaluationBtn.classList.add("destroy-button");

  // Smooth remove the now redundant whitespace
  const prevElemSibling = startEvaluationBtn.previousElementSibling;
  prevElemSibling.style.transition = "margin-bottom .5s ease-in-out";
  prevElemSibling.style.marginBottom = "-4.4em";

  // Destroy the modal
  const frameModal = document.getElementById("frameModal");
  frameModal.classList.add("destroy-modal");

  // After the animation, remove the frameModal from the DOM to optimize performance.
  setTimeout(function() {
    frameModal.remove();
  }, 2000);

  // Update the hidden form value to store how much time the user spent on the onboarding sequence.
  timeSpentOnOnboarding = checkTimeElapsed();
  updateFormValue('time_spent_on_onboarding', timeSpentOnOnboarding);

  // Show the buttons that signify the end of the performed scenario
  let scenarioIndicator = document.getElementsByClassName('scenario_indicator')[0];
  toggleVisibility(scenarioIndicator);
  // scenarioIndicator.style.display = 'block';

}

/* Functionality: Serialize form data with JS */

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

/*
 * Check form for completeness and validity, notify end-user if incomplete/invalid.
 */
function validateForm(type) {

  // Record time taken for evaluation and update form
  timeSpentOnEvaluation = checkTimeElapsed() - timeSpentOnScenario - timeSpentOnOnboarding;
  updateFormValue('time_spent_on_evaluation', timeSpentOnEvaluation);
  // Record time taken for full process
  timeSpentTotal = checkTimeElapsed();
  updateFormValue('time_spent_total', timeSpentTotal);

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

/* Function that checks whether the user has already been assigned an anonymous
   unique identifier. If not, it assigns one.
*/
function checkUID() {
  // Get the user's unique id
  let temp_uid = getCookie("temp_uid");

  // If it is not defined yet
  if (temp_uid == "" || temp_uid == null) {
    // Generate a random user id.
    setCookie("temp_uid", generateRandom(9999999), 7 /* We only keep this temporary cookie for 7 days. */ );
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

function generateRandom(max) {
  return Math.floor(Math.random()*max);
}

/* Function that updates the hidden form values to save user input / implicit data */
function updateFormValue(name, userInput) {
  // Make DOM call to locate target
  let hiddenFormItem = document.getElementsByName(`${name}`)[0];

  // Update hidden form item with user input
  hiddenFormItem.value = `${userInput}`;
}

/* Function that handles the user's input when they indicate they finished the scenario */
function finishedScenario(DOM, value) {
  // Update hidden form item
  updateFormValue('completed_scenario', value);

  // Store the time taken to perform the scenario
  timeSpentOnScenario = checkTimeElapsed() - timeSpentOnOnboarding;
  // Update hidden form value for time spent
  updateFormValue('time_spent_on_scenario', timeSpentOnScenario);

  // Make reference to button wrapper DOM element
  let buttonWrapper = DOM.parentElement.parentElement;
  buttonWrapper.remove();

  // Show the Form
  toggleVisibility(form);

  // Fix general impression height
  let genImp = document.getElementById('general_impression');
  genImp.style.height = 'auto';

  // Conditionally update the appraisal text
  if (value == 0) {
    // User was unable to complete scenario
    let cond = document.getElementById('conditionalContent');
    cond.innerHTML = "You weren't able to complete the scenario. That's not a problem at all, this project is not finished and therefore not perfect.";
  }

}


/* Function to make a hidden DOM element visible */
function show(elem) {

  // Get the natural height of the element
  let getHeight = function() {
    elem.style.display = 'block'; // Make it visible
    let height = elem.scrollheight + 'px'; // Get its height
    elem.style.display = ''; // Hide it again
    return height;
  };

  let height = getHeight(); // Get the natural height
  elem.classList.add('is-visible'); // Make the element visible
  elem.style.height = height; // Update the max height

  // Once the transition is complete, remove the inline max-height so the content can scale responsively
  window.setTimeout(function() {
    elem.style.height = '';
  }, 350);
}

/* Function to hide a visible DOM element */
function hide(elem) {
  // give the element a height to change from
  elem.style.height = elem.scrollheight = 'px';

  // Set the height back to 0
  window.setTimeout(function() {
    elem.style.height = '0';
  }, 1);

  // When the transition is complete, hide it
  window.setTimeout(function() {
    elem.classList.remove('is-visible');
  }, 350);
}


/* Function to toggle element visibility */
function toggleVisibility(elem) {
  // If the element is visible, hide it
  if (elem.classList.contains('is-visible')) {
    hide(elem);
    return;
  }

  // Otherwise, show it
  show(elem);
}
