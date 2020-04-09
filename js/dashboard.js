/*------------------------------------------------------------------

01. DOM Calls
02. HTML Content / Templates
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
02. HTML Content / Templates
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
          <button class="small-modal--button" type="button" name="button" onclick="">Yes, delete it</button>
        </div>
      </div>
    </div>`;

/* Modal that is shown when the user creates a new project
   Step 1 of N when setting up the project for sharing. */
const modalProjectSetup1 =
  `<div class="fullscreen-modal">
      <div class="fullscreen-modal--content">
        <p class="fullscreen-modal--progress">Question <span class="current">1</span> out of <span class="total">4</span>.</p>
        <h1 class="fullscreen-modal--header">How would you like your design to be evaluated?</h1>
        <div class="fullscreen-modal--input radio">

            <input type="radio" id="evaluation-type-1" name="evaluation-type" value="usability">
            <label for="evaluation-type-1">
              <img src="https://placehold.it/40x40" alt="usability icon">
              <div>
                <h2>I want others to review its usability</h2>
                <p>This will help you spot errors in how your design works, and make your design more usable.</p>
              </div>
            </label>

            <input type="radio" id="evaluation-type-2" name="evaluation-type" value="look-feel">
            <label for="evaluation-type-2">
              <img src="https://placehold.it/40x40" alt="look-and-feel icon">
              <div>
                <h2>I want others to review its look-and-feel</h2>
                <p>This will help you understand your design's hedonic qualities.</p>
              </div>
            </label>

        </div>
        <div class="fullscreen-modal--actions">
          <button class="fullscreen-modal--button secondary" type="button" name="btn-prev" onclick="updateModalContent(modalNewProject)">&lt; Back</button>
          <button class="fullscreen-modal--button" type="button" name="btn-next" onclick="updateModalContent(modalProjectSetup2)" >Continue &gt;</button>
        </div>
      </div>
    </div>`;

const modalProjectSetup2 =
  `<div class="fullscreen-modal">
      <div class="fullscreen-modal--content">
        <p class="fullscreen-modal--progress">Question <span class="current">2</span> out of <span class="total">4</span>.</p>
        <h1 class="fullscreen-modal--header">What contextual information should evaluators know when evaluating your work?</h1>
        <div class="fullscreen-modal--input radio">

            <p>Nulla porta ex nec arctus bibendum. Duis convallis, nibh eget molestie finibus, risus nunc scelerisque lectus, sed sollicitudin arcu libero non nibh. Suspendisse feugiat orci sit amet diam gravida, id mollis elit pretium. Duis venenatis fringilla nunc a accumsan. Ut ac vestibulum lacus. Phasellus ut iaculis ex. Pellentesque facilisis erat nec velit rutrum semper. Suspendisse feugiat, arte quis feugiat iaculis, orci arcu fermentum ipsum, ac porttitor felis quam et odio. Nullam nibh lectus, condimentum in lectus vitae, commodo placerat mi. Mauris a ex ut lacus tempor vestibulum non nec leo. Phasellus convallis eros eget pretium sagittis. Integer ut eleifend erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

        </div>
        <div class="fullscreen-modal--actions">
          <button class="fullscreen-modal--button secondary" type="button" name="btn-prev" onclick="updateModalContent(modalProjectSetup1)">&lt; Back</button>
          <button class="fullscreen-modal--button" type="button" name="btn-next" onclick="addCard(projectCard1); closeModal();">Continue &gt;</button>
        </div>
      </div>
    </div>`;

const projectCard1 =
  `<div class="dashboard-card">
    <div class="dashboard-card--left">
      <img style="mix-blend-mode: luminosity;" src="https://placehold.it/400x200">
    </div>
    <div class="dashboard-card--right">
      <h1 class="dashboard-card--title">Bol.com &mdash; UX Design Evaluation</h1>
      <p class="dashboard-card--metadata">Created on <span class="dashboard-card--creation-date">07/04/2020</span></p>
      <p class="dashboard-card--description">Bol.com is the leading online shop in the Netherlands for books, toys and electronics that serve over 10.5 million customers.</p>
      <div class="dashboard-card--actions">
        <button class="btn-tertiary" type="button" name="button" onclick="deleteCard(this)">Delete</button>
        <div class="dashboard-card--button-group">
          <button class="btn-secondary" type="button" name="button">Edit</button>
          <button class="btn-primary" type="button" name="button" onclick="location.href='/app/r'">View</button>
        </div>
      </div>
    </div>
  </div>`;

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
     alert("The URL you entered was not recognised as a valid Figma Prototype.");
     // Display error message to the user.
   }

 }
}


/* Functionality to validate URL input to only allow valid input to be handled. */
function checkIfFigmaURL(string) {
 // Regular Expression that checks whether the crucial URL parameters (i.e. /embed ?embed_host and ?url) are included.

 // Ruleset for the regular expression. Created with the help of Regex101 — https://regex101.com/r/tR4vU6/1
 const regex = /(https?:\/\/w+?\.?figma\.com\/embed\?embed_host=share&url=https?)(\/[A-Za-z0-9\-\._~:\/\?#\[\]@!$&'\(\)\*\+,;\=]*)?/gim;

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

function deleteCard(targ) {

  // First: update modal contents with the prompt message
  updateModalContent(modalConfirmDelete);

  // Then: show the modal on the screen
  showModal();



 // let target = targ.parentElement.parentElement.parentElement;
 // parents:  button > actions  > cardRight   > card
 // target.remove();

 // checkForProjects();
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

function enableModalBtn() {
  let nextBtn = document.getElementsByName("btn-next")[0];
  nextBtn.disabled = false;
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
