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

    <!-- Initialize as empty: place to store dynamic modal content -->
    <section class="modal">
      <div class="modal--overlay" id="modalOverlay">

      </div>
    </section>

    <script src="/js/headroom.js" charset="utf-8"></script>
    <script src="/js/dashboard.js" charset="utf-8"></script>
    <script type="text/javascript">

    </script>

  </body>
</html>
