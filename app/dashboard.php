<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>Requestor &mdash; My Projects</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="/css/style.css"> <!-- Main styling document -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  </head>

  <body class="dash">

    <!-- <section class="new-project-modal--wrapper">
      <div class="new-project-modal--overlay" id="modalOverlay">
        <div class="new-project-modal">
          <div class="new-project-modal--image">
            <img src="/i/modal-example.png" alt="Suggestion on what information to provide">
          </div>
          <div class="new-project-modal--content">
            <h1 class="new-project-modal--header">Your sharable project is created!</h1>
            <p class="new-project-modal--text">Now we just need some information to help your evaluators understand the context, and you're ready to rock!</p>
            <button class="new-project-modal--button" type="button" name="button">Continue &gt;</button>
          </div>
        </div>
      </div>
    </section> -->

    <section class="fullscreen-modal--wrapper">
      <div class="fullscreen-modal--overlay" id="modalOverlay">
        <div class="fullscreen-modal">
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

              <!-- <fieldset>
                <input type="radio" id="evaluation-type-3" name="evaluation-type" value="free-form">
                <label for="evaluation-type-3">
                  <h2>I want a free-form review.</h2>
                  <p>Morbi dui metus, arterisque non lacus eget, sagittis nulla.</p>
                </label>
              </fieldset>

              <fieldset>
                <input type="radio" id="evaluation-type-4" name="evaluation-type" value="placeholder">
                <label for="evaluation-type-4">
                  <h2>This is simply placeholder content</h2>
                  <p>Morbi dui metus, arterisque non lacus eget, sagittis nulla.</p>
                </label>
              </fieldset> -->

            </div>
            <div class="fullscreen-modal--actions">
              <button class="fullscreen-modal--button secondary" type="button" name="button">&lt; Back</button>
              <button class="fullscreen-modal--button" type="button" name="button">Continue &gt;</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <nav>
      <div class="navbar">
        <!-- <a class="nav-logo" href="/index.php"><img src="https://placehold.it/36x36" alt="Requestor Logo">Requestor</a> -->
        <a class="nav-logo" href="/index.php">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0)"> <path d="M38.1119 12.5519C38.2451 11.8806 37.42 11.1548 36.9908 10.8759L29.4077 13.684C20.0599 12.5239 1.37635 10.7296 1.42434 12.8323C1.48433 15.4608 24.8723 34.991 26.868 35.0332C27.6883 35.0506 31.1903 29.2847 32.4293 26.7848C34.3507 27.6021 36.7716 25.9019 37.4209 23.8502C38.0059 22.0018 36.7683 19.7313 36.0522 18.7817C36.6336 16.9911 37.9787 13.2233 38.1119 12.5519Z" fill="#39574B"/> <path d="M2.7377 10.3757C15.95 9.27681 23.5939 9.16632 36.8046 10.7955C37.2077 10.8452 37.4783 11.2398 37.3713 11.6317C35.3463 19.0473 32.7602 24.1096 26.4657 33.5925C26.251 33.916 25.802 33.991 25.4938 33.7549C15.7064 26.2543 10.298 21.5531 1.40652 13.0734C1.17921 12.8566 1.12977 12.5085 1.29128 12.2391L2.21396 10.7001C2.32516 10.5146 2.5222 10.3937 2.7377 10.3757Z" fill="#6AC4A0"/> <path d="M9.76842 13.8971C17.7175 15.2718 26.4171 18.1013 34.5047 19.2154C34.661 19.2369 34.805 19.3116 34.9096 19.4297C36.2229 20.9128 37.1012 22.532 36.2247 24.3865C36.2074 24.4232 36.1853 24.4593 36.1611 24.4919C34.9146 26.1673 34.4162 26.3033 31.474 24.995C25.5044 22.3405 16.1753 18.3705 9.46622 14.7698C9.22858 14.6423 9.15016 14.3415 9.29219 14.1122C9.39263 13.9501 9.58049 13.8646 9.76842 13.8971Z" fill="#517D6C"/> </g> <defs> <clipPath id="clip0"> <rect width="40" height="40" fill="white"/> </clipPath> </defs> </svg>
          Requestor</a>
        <div class="urlbar">
          <input type="text" id="url_input" name="url_input"  placeholder="Enter your Figma link here" />
          <button type="button" name="url_button" onclick="createNewRequestor()">Create Project<span class="chevron-right"></span>&gt;</button>
        </div>
        <a style="width: 174px; text-align: right;" href="/app/profile" class="nav-account">My Account</a>
      </div>
    </nav>

    <section class="dashboard">

      <div class="dashboard--cards">

        <!-- <div class="dashboard-card">
          <div class="dashboard-card--left">
            <img style="mix-blend-mode: luminosity;" src="https://placehold.it/400x200">
          </div>
          <div class="dashboard-card--right">
            <h1 class="dashboard-card--title">Bol.com &mdash; UX Design Evaluation</h1>
            <p class="dashboard-card--metadata">Created on <span class="dashboard-card--creation-date">07/04/2020</span></p>
            <p class="dashboard-card--description">Bol.com is the leading online shop in the Netherlands for books, toys and electronics that serve over 10.5 million customers.</p>
            <div class="dashboard-card--actions">
              <button class="btn-tertiary" type="button" name="button" onclick="deleteItem(this, true)">Delete</button>
              <div class="dashboard-card--button-group">
                <button class="btn-secondary" type="button" name="button">Edit</button>
                <button class="btn-primary" type="button" name="button" onclick="location.href='/app/r'">View</button>
              </div>
            </div>
          </div>
        </div>

        <div class="dashboard-card">
          <div class="dashboard-card--left">
            <img style="mix-blend-mode: luminosity;" src="https://placehold.it/400x200">
          </div>
          <div class="dashboard-card--right">
            <h1 class="dashboard-card--title">Project Title</h1>
            <p class="dashboard-card--metadata">Created on <span class="dashboard-card--creation-date">MM/DD/YYYY</span></p>
            <p class="dashboard-card--description">Shaman put a bird on it stumptown, selfies tofu everyday carry squid kickstarter selvage swag dreamcatcher fanny pack bicycle rights.</p>
            <div class="dashboard-card--actions">
              <button class="btn-tertiary" type="button" name="button" onclick="deleteItem(this, false)">Delete</button>
              <div class="dashboard-card--button-group">
                <button class="btn-secondary" type="button" name="button">Edit</button>
                <button class="btn-primary" type="button" name="button">View</button>
              </div>
            </div>
          </div>
        </div>

        <div class="dashboard-card">
          <div class="dashboard-card--left">
            <img style="mix-blend-mode: luminosity;" src="https://placehold.it/400x200">
          </div>
          <div class="dashboard-card--right">
            <h1 class="dashboard-card--title">Project Title</h1>
            <p class="dashboard-card--metadata">Created on <span class="dashboard-card--creation-date">MM/DD/YYYY</span></p>
            <p class="dashboard-card--description">Shaman put a bird on it stumptown, selfies tofu everyday carry squid kickstarter selvage swag dreamcatcher fanny pack bicycle rights.</p>
            <div class="dashboard-card--actions">
              <button class="btn-tertiary" type="button" name="button" onclick="deleteItem(this, false)">Delete</button>
              <div class="dashboard-card--button-group">
                <button class="btn-secondary" type="button" name="button">Edit</button>
                <button class="btn-primary" type="button" name="button">View</button>
              </div>
            </div>
          </div>
        </div>

        <div class="dashboard-card">
          <div class="dashboard-card--left">
            <img style="mix-blend-mode: luminosity;" src="https://placehold.it/400x200">
          </div>
          <div class="dashboard-card--right">
            <h1 class="dashboard-card--title">Project Title</h1>
            <p class="dashboard-card--metadata">Created on <span class="dashboard-card--creation-date">MM/DD/YYYY</span></p>
            <p class="dashboard-card--description">Shaman put a bird on it stumptown, selfies tofu everyday carry squid kickstarter selvage swag dreamcatcher fanny pack bicycle rights.</p>
            <div class="dashboard-card--actions">
              <button class="btn-tertiary" type="button" name="button" onclick="deleteItem(this, false)">Delete</button>
              <div class="dashboard-card--button-group">
                <button class="btn-secondary" type="button" name="button">Edit</button>
                <button class="btn-primary" type="button" name="button">View</button>
              </div>
            </div>
          </div>
        </div>

        <div class="dashboard-card">
          <div class="dashboard-card--left">
            <img style="mix-blend-mode: luminosity;" src="https://placehold.it/400x200">
          </div>
          <div class="dashboard-card--right">
            <h1 class="dashboard-card--title">Project Title</h1>
            <p class="dashboard-card--metadata">Created on <span class="dashboard-card--creation-date">MM/DD/YYYY</span></p>
            <p class="dashboard-card--description">Shaman put a bird on it stumptown, selfies tofu everyday carry squid kickstarter selvage swag dreamcatcher fanny pack bicycle rights.</p>
            <div class="dashboard-card--actions">
              <button class="btn-tertiary" type="button" name="button" onclick="deleteItem(this, false)">Delete</button>
              <div class="dashboard-card--button-group">
                <button class="btn-secondary" type="button" name="button">Edit</button>
                <button class="btn-primary" type="button" name="button">View</button>
              </div>
            </div>
          </div>
        </div>
      </div> -->

    </section>

    <script type="text/javascript">

    function createNewRequestor() {
      let urlbar_input = document.getElementById("url_input").value;

      if (urlbar_input == "") {
        // Check if user actually input something
        alert("There seems to be nothing here. Are you sure you have input a link?");
      } else {
        // If not empty, firstly check if the URL happens to be a Figma document
        if (checkIfFigmaURL(urlbar_input) == true) {
          alert("Link verified as valid Figma Embed Prototype! System should now create new document");
          alert("However, this is not implemented yet. Stay tuned...");
        /*} else if (checkIfURL(urlbar_input)){
          // Future: check if the URL is a valid URL. Not supported currently however. */
        } else {
          alert("The URL you entered was not recognised as a valid Figma Prototype.");
          // Display error message to the user.
        }

      }
    }



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

    /* Function that updates the DOM element with the respective username */
    function updateUsername(name) {
      // Select the relevant DOM element
      const username_dom = document.querySelector('.nav-account');

      // Update its innerHTML with the right content
      username_dom.innerHTML = `${name}`;
    }

    // updateUsername('Arthur');


    let activeProjects = 0;

    /* This string renders the empty state */
    let emptyStateDOM = `<div class="dashboard--empty-state"><h1>You don't have any active projects yet.</h1><img src="/i/nothing-here.png" alt="empty state image" /><p>To get started, paste a link to your <a href="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2F0aog8DUTpzlwfYNFORMjVa%2FFinal-Master-Project%3Fnode-id%3D418%253A2%26viewport%3D-311%252C317%252C0.05923917517066002%26scaling%3Dmin-zoom" target="_blank">Figma Prototype</a> in the bar above.</p></div>`;

    const dashboardDOM = document.querySelector('.dashboard');
    const dashCardsDOM = document.querySelector('.dashboard--cards');

    function checkForProjects() {
      if (dashCardsDOM.children.length > 0) {
        dashCardsDOM.style.display = "flex";
        // Show the normal dashboard with active projects (paginated?)
      } else {
        // Show the 'emtpy state'

        // First: hide the container to get rid of its paddings and margins.
        dashCardsDOM.style.display = "none";
        // Then, insert the empty state in its place.
        dashboardDOM.insertAdjacentHTML('beforeEnd', emptyStateDOM);
      }

      console.log("checked");
    }

    function deleteItem(input, warningBoolean) {
      if (warningBoolean == true) {
        if (confirm('🚨Are you sure you want to delete this project? Its data will be permanently deleted.')) {
          let target = input.parentElement.parentElement.parentElement;
          target.remove();
        }
      } else {
        let target = input.parentElement.parentElement.parentElement;
        target.remove();
      }

      checkForProjects();
    }

    checkForProjects();


    let modalOverlay = document.getElementById('modalOverlay');

    window.onclick = function(event) {
      if (event.target == modalOverlay) {
        closeModal(modalOverlay);
      }
    }

    function closeModal(target) {
      target.parentNode.style.display = "none";
    }

    </script>

    <script src="/js/headroom.js" charset="utf-8"></script>
    <script type="text/javascript">

    const nav = document.querySelector('nav');

    let headroom = new Headroom(nav);
    headroom.init();

    </script>

  </body>
</html>
