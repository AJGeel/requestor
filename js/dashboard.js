/*------------------------------------------------------------------

01. DOM Calls
02. HTML Content / Templates / Global Variables
03. Core Functionality
04. OnLoad Executables

-------------------------------------------------------------------*/

/*--------------------------------------------------
01. DOM Calls
---------------------------------------------------*/


const dashboardDOM = document.querySelector('.dashboard');
const dashCardsDOM = document.querySelector('.dashboard--cards');

/* modalOverlay allows us to keep track of modals */
let modalOverlay = document.getElementById('modalOverlay');

/* Headroom.js DOM element */
const nav = document.querySelector('nav');


/*--------------------------------------------------
02. HTML Content / Templates / Global Variables
---------------------------------------------------*/

/* HTML element to handle empty states: an illustration and copy to
   notify the user of the empty state, and provide feedforward on what to do */
const emptyState =
  `<div class="dashboard--empty-state">
     <h1>You don't have any active projects yet.</h1>
     <img src="/i/nothing-here.png" alt="empty state image" />
     <p>To get started, paste a link to your <a href="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2F0aog8DUTpzlwfYNFORMjVa%2FFinal-Master-Project%3Fnode-id%3D418%253A2%26viewport%3D-311%252C317%252C0.05923917517066002%26scaling%3Dmin-zoom" target="_blank">Figma Prototype</a> in the bar above.</p>
  </div>`;

/* Modal that is shown when the user creates a new project */
const modalNewProject =
  `<div class="small-modal">
      <div class="small-modal--image">
        <img src="/i/modal-example.png" alt="Suggestion on what information to provide">
      </div>
      <div class="small-modal--content">
        <h1 class="small-modal--header">Your sharable project is created!</h1>
        <p class="small-modal--text">Now we just need some information to help your evaluators understand the context, and you're ready to rock!</p>
        <button class="small-modal--button" type="button" name="button" onclick="updateModalContent(modalProjectSetup1)">Continue &gt;</button>
      </div>
    </div>`;

/* Modal that is shown when the user tries to delete new project */
const modalConfirmDelete =
  `<div class="small-modal prompt">
      <div class="small-modal--image">
        <img src="/i/modal-confirm.png" alt="Dramatic depiction on confirmation choice">
      </div>
      <div class="small-modal--content">
        <h1 class="small-modal--header">Heads up!</h1>
        <p class="small-modal--text">You are about to delete <span class="currentProject">'Bol.com — UX Design Evaluation'</span>, meaning your data will be permanently deleted. Are you sure you want to delete this project?</p>
        <div class="small-modal--actions">
          <button class="small-modal--button secondary" type="button" name="button" onclick="closeModal()">No, keep this project</button>
          <button class="small-modal--button" type="button" name="button" onclick="deleteCard()">Yes, I want it gone</button>
        </div>
      </div>
    </div>`;

/* Modal that is shown when the user creates a new project
   Step 1 of N when setting up the project for sharing. */
const modalProjectSetup1 =
  `<div class="fullscreen-modal">
      <div class="fullscreen-modal--content">
        <p class="fullscreen-modal--progress">Step <span class="current">1</span> out of <span class="total">3</span>.</p>
        <h1 class="fullscreen-modal--header">How would you like your design to be evaluated?</h1>
        <div class="fullscreen-modal--input radio">

            <input type="radio" id="evaluation-type-1" name="evaluation-type" value="usability">
            <label for="evaluation-type-1" onclick="enableModalBtn(); updateSetup('type', 'usability')">
              <svg role="image" alt="wireframe design icon" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect x="1.5" y="1.5" width="77" height="77" rx="3.5" stroke="#439675" stroke-width="3"/> <rect x="10.5" y="23.5" width="32" height="46" stroke="#439675" stroke-width="3" stroke-dasharray="6 2"/> <rect x="51.5" y="23.5" width="18" height="14" stroke="#439675" stroke-width="3" stroke-dasharray="6 2"/> <rect x="51.5" y="44.5" width="18" height="25" stroke="#439675" stroke-width="3" stroke-dasharray="6 2"/> <line x1="2" y1="15.5" x2="79" y2="15.5" stroke="#439675" stroke-width="3"/> <line x1="6" y1="8.5" x2="9" y2="8.5" stroke="#439675" stroke-width="3"/> <line x1="12" y1="8.5" x2="15" y2="8.5" stroke="#439675" stroke-width="3"/> <line x1="18" y1="8.5" x2="21" y2="8.5" stroke="#439675" stroke-width="3"/> </svg>
              <div>
                <h2>I want others to review its usability</h2>
                <p>This will help you spot errors in the functionality of your design, helping you make your design more usable.</p>
              </div>
            </label>

            <input type="radio" id="evaluation-type-2" name="evaluation-type" value="look-feel">
            <label for="evaluation-type-2" onclick="enableModalBtn(); updateSetup('type', 'look-feel')">
              <svg role="image" alt="visual design icon" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect x="1.5" y="1.5" width="77" height="77" rx="3.5" stroke="#439675" stroke-width="3"/> <rect x="10.5" y="23.5" width="59" height="46" rx="3.5" stroke="#439675" stroke-width="3"/> <line x1="2" y1="15.5" x2="79" y2="15.5" stroke="#439675" stroke-width="3"/> <line x1="50.5" y1="71" x2="50.5" y2="25" stroke="#439675" stroke-width="3"/> <line x1="6" y1="8.5" x2="9" y2="8.5" stroke="#439675" stroke-width="3"/> <line x1="12" y1="8.5" x2="15" y2="8.5" stroke="#439675" stroke-width="3"/> <line x1="18" y1="8.5" x2="21" y2="8.5" stroke="#439675" stroke-width="3"/> <line x1="55" y1="29.5" x2="65" y2="29.5" stroke="#439675" stroke-width="3"/> <line x1="55" y1="35.5" x2="65" y2="35.5" stroke="#439675" stroke-width="3"/> <line x1="55" y1="41.5" x2="62" y2="41.5" stroke="#439675" stroke-width="3"/> <path d="M26.7564 42.3921L20.4895 52.2314C20.2775 52.5642 20.5166 53 20.9113 53H43.1027C43.4944 53 43.7339 52.57 43.5278 52.2369L34.5409 37.7126C34.3418 37.3907 33.871 37.3983 33.6823 37.7265L29.7335 44.594C29.5412 44.9283 29.0588 44.9283 28.8665 44.594L27.6116 42.4115C27.4243 42.0858 26.9582 42.0752 26.7564 42.3921Z" stroke="#439675" stroke-width="3"/> </svg>
              <div>
                <h2>I want others to review its look-and-feel</h2>
                <p>This will help you understand your design's hedonic qualities and emotional appeal.</p>
              </div>
            </label>

        </div>
        <div class="fullscreen-modal--actions">
          <button class="fullscreen-modal--button secondary" type="button" name="btn-prev" onclick="updateModalContent(modalNewProject)">&lt; Back</button>
          <button class="fullscreen-modal--button" type="button" name="btn-next" onclick="updateModalContent(modalProjectSetup2)" disabled>Continue &gt;</button>
        </div>
      </div>
    </div>`;

const modalProjectSetup2 =
  `<div class="fullscreen-modal">
    <div class="fullscreen-modal--content">
      <p class="fullscreen-modal--progress">Step <span class="current">2</span> out of <span class="total">3</span>.</p>
      <h1 class="fullscreen-modal--header">What contextual information should your evaluators know when evaluating your work?</h1>
      <div class="fullscreen-modal--input text">

        <div class="fullscreen-modal--block">
          <label for="project-about">What can you tell them about the project?</label>
          <textarea name="project-about" id="project-about" rows="3" ></textarea>
          <p class="fullscreen-modal--suggestion" onclick="suggest(this, 'about')">No inspiration? Click here receive a suggestion.</p>
        </div>

        <div class="fullscreen-modal--block">
          <label for="project-audience">What can you tell them about your target audience?</label>
          <textarea name="project-audience" id="project-audience" rows="3"></textarea>
          <p class="fullscreen-modal--suggestion" onclick="suggest(this, 'audience')">No inspiration? Click here receive a suggestion.</p>
        </div>

      </div>
      <div class="fullscreen-modal--actions">
        <button class="fullscreen-modal--button secondary" type="button" name="btn-prev" onclick="updateModalContent(modalProjectSetup1)">&lt; Back</button>
        <button class="fullscreen-modal--button" type="button" name="btn-next" onclick="updateModalContent(modalProjectSetup3)">Continue &gt;</button>
      </div>
    </div>
  </div>`;

  const modalProjectSetup3 =
    `<div class="fullscreen-modal">
      <div class="fullscreen-modal--content">
        <p class="fullscreen-modal--progress">Step <span class="current">3</span> out of <span class="total">3</span>.</p>
        <h1 class="fullscreen-modal--header">Finally, can you describe the scenario you would like your evaluators to review?</h1>
        <div class="fullscreen-modal--input text">

          <div class="fullscreen-modal--block">
            <label for="project-about">Can you summarize your scenario in ~three lines?</label>
            <textarea name="project-about" id="project-about" rows="3" ></textarea>
            <p class="fullscreen-modal--suggestion" onclick="suggest(this, 'scenario')">No inspiration? Click here receive a suggestion.</p>
          </div>

          <div class="fullscreen-modal--block">
            <label for="project-scenario-steps">Can you break the scenario down in two to five steps?</label>
            <ol class="fullscreen-modal--steps">
              <li><input type="text" name="project-scenario-step-1" id="project-scenario-step-1" onclick="addMoreSteps(this)"></input></li>
            </ol>
          </div>

        </div>
        <div class="fullscreen-modal--actions">
          <button class="fullscreen-modal--button secondary" type="button" name="btn-prev" onclick="updateModalContent(modalProjectSetup2)">&lt; Back</button>
          <button class="fullscreen-modal--button" type="button" name="btn-next" onclick="addCard(projectCard1); closeModal();">Continue &gt;</button>
        </div>
      </div>
    </div>`;

const projectCard1 =
  `<div class="dashboard-card">
    <div class="dashboard-card--left">
      <!--img style="mix-blend-mode: luminosity;" src="https://placehold.it/400x200"-->
      <img style="mix-blend-mode: luminosity;" src="https://source.unsplash.com/400x200/?ux">
    </div>
    <div class="dashboard-card--right">
      <h1 class="dashboard-card--title">Bol.com &mdash; UX Design Evaluation</h1>
      <p class="dashboard-card--metadata">Created on <span class="dashboard-card--creation-date">07/04/2020</span></p>
      <p class="dashboard-card--description">Bol.com is the leading online shop in the Netherlands for books, toys and electronics that serve over 10.5 million customers.</p>
      <div class="dashboard-card--actions">
        <button class="btn-tertiary" type="button" name="button" onclick="promptDeleteCard(this)">Delete</button>
        <div class="dashboard-card--button-group">
          <button class="btn-secondary" type="button" name="button">Edit</button>
          <button class="btn-primary" type="button" name="button" onclick="location.href='/app/gui.php'">View</button>
        </div>
      </div>
    </div>
  </div>`;

let cardToDelete;

/*--------------------------------------------------
	03. Creating new Projectss
---------------------------------------------------*/

/* Functionality to validate- and handle user input.
  Expects either a {figma.com/embed} prototype link (supported),
  or any {website.domain} web site/app (not yet supported)  */
function createNewRequestor() {
 let urlbar_input = document.getElementById("url_input").value;

 if (urlbar_input == "") {
   // Check if user actually input something
   alert("There seems to be nothing here. Are you sure you have input a link?");
 } else {
   // If not empty, firstly check if the URL happens to be a Figma document
   if (checkIfFigmaURL(urlbar_input) == true) {
     // The URL was recognised as a valid Figma Embed prototype.

     // First: update modal contents with the splash message to provide positive feedback
     updateModalContent(modalNewProject);

     // Then: show the modal on the screen
     showModal();
   /*} else if (checkIfURL(urlbar_input)){
     // Future: check if the URL is a valid URL. Not supported currently however. */
   } else {
     // alert("The URL you entered was not recognised as a valid Figma Prototype.");
     alert("Thank you for your interest. However, at this point in time, this feature is not available to the public. \n \n If you are interested in becoming a beta tester, please send a mail to a.j.geel@student.tue.nl");
     if (confirm("Thank you for your interest. However, at this point in time, this feature is not available to the public. \n \n If you are interested in becoming a beta tester, please send a mail to a.j.geel@student.tue.nl or click 'OK' to open your mail client.")) {
       window.location.href = "mailto:a.j.geel@student.tue.nl";
     }
     // Display error message to the user.
   }

 }
}


/* Functionality to validate URL input to only allow valid input to be handled. */
function checkIfFigmaURL(string) {
 // Regular Expression that checks whether the crucial URL parameters (i.e. /embed ?embed_host and ?url) are included.

 // Ruleset for the regular expression. Created with the help of Regex101 — https://regex101.com/r/tR4vU6/1
 const regex = /(https?:\/\/w+?\.?figma\.com\/embed\?embed_host=share&url=https?)(\/[A-Za-z0-9\-\._~:\/\?#\[\]@!$&'\(\)\*\+,;\=]*)?/gim;

// Official Figma documentation on embeds: https://www.figma.com/developers/embed
 const other_regex = /https:\/\/([\w\.-]+\.)?figma.com\/(file|proto)\/([0-9a-zA-Z]{22,128})(?:\/.*)?$/;

 // Variable that stores all the eventual matches
 let m;

 while ((m = regex.exec(string)) !== null) {
   // This is necessary to avoid infinite loops with zero-width matches
   if (m.index === regex.lastIndex) {
       regex.lastIndex++;
   }

   // This RegEx should produce three matches. If so, the link is validated as a Figma Embed Proto
   if (m.length == 3) {
     return true;
   } else {
     return false;
   }
 }

}

function checkForProjects() {
 if (dashCardsDOM.children.length > 0) {
   dashCardsDOM.style.display = "flex";
   // Show the normal dashboard with active projects (paginated?)
 } else {
   // Show the 'emtpy state'

   // First: hide the container to get rid of its paddings and margins.
   dashCardsDOM.style.display = "none";
   // Then, insert the empty state in its place.
   dashboardDOM.insertAdjacentHTML('beforeEnd', emptyState);
 }

 // console.log("$DEBUG: checked");
}

function addCard(cardName) {
  // First: check if the empty state still is around. If so, delete it.
  try {
    let emptyStateDOM = document.querySelector('.dashboard--empty-state');
    emptyStateDOM.parentNode.removeChild(emptyStateDOM);

    // Show the normal dashboard with active projects agains
    dashCardsDOM.style.display = "flex";
  } catch (err) {
    // This means there is no emptyStateDOM in the canvas, this 'error' gets ignored.
  }

  // Then: append a new card to the DashCardsDOM element
  dashCardsDOM.insertAdjacentHTML('beforeEnd', cardName);
}

/* Functionality to prompt the user to verify whether they actually want to delete the card with a modal */
function promptDeleteCard(targ) {

  // Store a temporary reference to the card that is to be deleted
  cardToDelete = targ.parentElement.parentElement.parentElement;
  // parents:    button > actions  > cardRight   > card

  // Then: update modal contents with the prompt message
  updateModalContent(modalConfirmDelete);

  // Show the modal on the screen
  showModal();
}

/* Functionality to actually delete the card */
function deleteCard() {
  // Remove the card from the DOM
  cardToDelete.remove();

  // Reset the global variable
  cardToDelete = "";

  // Check whether the empty state should be returned
  checkForProjects();
  closeModal();
}

/* Functionality that hides the navbar when the user scrolls down. */
function initHeadroom() {
  let headroom = new Headroom(nav);
  headroom.init();
}

/* Functionality that closes the selected modal */
function closeModal() {
  // Change the modal overlay's opacity from 1 to 0, with a 200ms fade
  modalOverlay.style.opacity = "0";

  // Use a timeout to change the 'visibility' after the 200ms. Also: delete its contents.
  setTimeout(function() {
    modalOverlay.parentNode.style.visibility = "hidden";
    removeModalContent();
  }, 200);
}

/* Functionality that shows the modal */
function showModal() {
  // Unhide modal overlay's display style
  modalOverlay.parentNode.style.visibility = "visible";

  // Change the modal overlay's opacity from 0 to 1, with a 200ms fade
  modalOverlay.style.opacity = "1";
}

/* Functionality that updates the modal content with pre-made templates */
function updateModalContent(newContent) {
  // First: delete all innerHTML
  removeModalContent();

  // Then: update the content with the selected template
  modalOverlay.insertAdjacentHTML('beforeEnd', newContent);
}

function removeModalContent() {
  modalOverlay.innerHTML = "";
}

/* Function that updates the DOM element with the respective username */
// function updateUsername(name) {
//   // Select the relevant DOM element
//   const username_dom = document.querySelector('.nav-account');
//
//   // Update its innerHTML with the right content
//   username_dom.innerHTML = `${name}`;
// }
// updateUsername('Arthur');

/* Used in modals: enables the 'next' button if input is received and validated */
function enableModalBtn() {
  try {
    let nextBtn = document.getElementsByName("btn-next")[0];
    nextBtn.disabled = false;
  } catch (error) {

  }
}

/* Used during project creation: allows users to receive contextual information */
function suggest(pointer, keyword) {

  let suggestion = "";
  let allSuggestions = [];

  if (keyword == "about") {
    // Suggests a random example on how to describe the project.
    allSuggestions = [
      "[Client] is the leading online shop in the Netherlands for [items], [stuff] and [electronics] that serve over [###] million customers.",
      "Artem ipsum dolor sit amet, consectetur adipisicing elit, sed do arturiusmod tempor incididunt ut labore et dolore magna aliqua.",
      "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.",
      "In reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui articia deserunt mollit anim id est laborum."
    ];

    allSuggestions = [ "[Client] is the leading online shop in the Netherlands for [items], [stuff] and [electronics] that serve over [###] million customers." ];

  } else if (keyword == "audience") {
    // Suggests a random example on how to describe its focal audience
    allSuggestions = [
      "[Client] mainly serves customers in [Country] and [Other Country], across all age groups.",
      "Artem ipsum dolor sit amet, consectetur adipisicing elit, sed do arturiusmod tempor incididunt ut labore et dolore magna aliqua.",
      "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.",
      "In reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui articia deserunt mollit anim id est laborum."
    ];

    allSuggestions = [ "[Client] mainly serves customers in [Country] and [Other Country], across all age groups." ];

  } else if (keyword == "scenario") {
    // Suggest a random example on how to describe the scenario-of-use
    allSuggestions = [
      "Your name is Frederic — a 62 year old Dutch male from the Veldhoven area. Your Epson printer just broke down for the last time, and is in dire need of replacement."
    ];

  }

  suggestion = allSuggestions[ Math.floor( Math.random() * allSuggestions.length ) ];

  // Grab DOM item of <textarea>
  let textArea = pointer.parentElement.querySelector('textarea');
  // Update value inside
  textArea.value = suggestion;

  // Perform an animation to update user about the value changing.
  textArea.style.backgroundColor = "hsl(160, 30%, 96%)";
  textArea.style.color = "var(--main-30)";
  textArea.style.boxShadow = "0px 0px 25px hsla(165, 30%, 85%, .5), inset 0px 0px 15px hsla(165, 30%, 85%, .3)";
  setTimeout(function() {
    textArea.style.backgroundColor = "#FFF";
    textArea.style.color = "#333";
    textArea.style.boxShadow = "none";
  }, 300);

}

function addMoreSteps(pointer) {
  // Ensure that the original list item cannot spawn any more afterwards.
  pointer.removeAttribute("onclick");

  // Find the <ol> tag in the DOM
  let ol = pointer.parentElement.parentElement;

  // Determine how many items the list already has.
  let amountOfItems = ol.children.length;

  // We don't want the list to have more than 5 items at any time.
  let maxAmount = 5;
  console.log(amountOfItems);

  // Only add new list items if the maximum has not been reached.
  if (amountOfItems < maxAmount) {
    let scenarioStepTemplate =
      `<li>
        <input type="text" name="project-scenario-step-${amountOfItems+1}" id="project-scenario-step-${amountOfItems+1}" onclick="addMoreSteps(this)"></input>
      </li>`;

    ol.insertAdjacentHTML('beforeEnd', scenarioStepTemplate);
  }

}

function updateSetup(key, value) {
  console.log(`Update localStorage ${key} to ${value}`);
  localStorage.setItem(`${key}`, `${value}`);
}


/*--------------------------------------------------
	04. OnLoad Executables
---------------------------------------------------*/

/* When the page is loaded, locate- and attach eventlisteners to the navbar to
   hide the navbar when the user scrolls down */
initHeadroom();

/* Check if there are any projects. If there are none,
   this function will display the empty state screen. */
checkForProjects();

/* Attach an eventlistener to the window.
   If the modalOverlay is clicked, it will be closed */
window.onclick = function(event) {
  // console.log(event);
  if (event.target == modalOverlay) {
    closeModal();
  }
}

/*


Copy link:
https://www.figma.com/file/0aog8DUTpzlwfYNFORMjVa/Final-Master-Project?node-id=41%3A2

Embed code:
https://www.figma.com/embed?embed_host=share&url=https://www.figma.com/file/0aog8DUTpzlwfYNFORMjVa/Final-Master-Project?node-id=41%3A2


*/
