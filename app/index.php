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
    <link rel="shortcut icon" href="/i/favicon-alt.png" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="/css/style.css"> <!-- Main styling document -->

  </head>

  <!-- <style media="screen">body{text-align:center;font-family:BentonSans,Ubuntu,sans-serif;padding:10em 0}.foo{padding:3em}.foo img{max-width:100%;border:1px solid #333}.foo p{text-align:center;opacity:.7}</style> -->
  <body class="dash">

    <nav>
      <div class="navbar">
        <a class="nav-logo" href="/index.php"><img src="https://placehold.it/36x36" alt="Requestor Logo">Requestor</a>
        <div class="urlbar">
          <input type="text" id="url_input" name="url_input"  placeholder="Enter your Figma link here" />
          <button type="button" name="url_button" onclick="createNewRequestor()">Create Project<span class="chevron-right"></span>&gt;</button>
        </div>
        <a href="/app/profile" class="nav-account">My Account</a>
      </div>
    </nav>

    <section class="dashboard">
      <div class="dashboard-empty">
        <h1>You don't have any active projects yet.</h1>

        <img src="/i/TEMP_zen.jpg" alt="empty state image" />

        <p>To get started, copy and paste a link to your Figma file in the bar above.</p>

      </div>

    </section>

    <!-- <h1>Dashboard</h1>
    <p>This page will display a dashboard of all projects. (Work-in-progress)</p>

    <div class="foo">
      <div class="foo">
          <img src="/i/TEMP_dashboard.jpg" alt="mock-up preview">
          <p>Figma mock-up of this page.</p>
      </div>
    </div>

    <p><a href="/index.php#sitemap">Click here</a> to go back to the sitemap</p> -->

    <script type="text/javascript">

    function createNewRequestor() {
      let urlbar_input = document.getElementById("url_input").value;

      if (urlbar_input == "") {
        // Check if user actually input something
        console.log("There seems to be nothing here.");
      } else {
        // If not empty, firstly check if the URL happens to be a Figma document
        if (checkIfFigma(urlbar_input) == true) {
          alert("Link verified as valid Figma Embed Proto. System should now create new document");
        /*} else if (checkIfURL(urlbar_input)){
          // Future: check if the URL is a valid URL. Not supported currently however. */
        } else {
          alert("The URL you entered was not recognised as a valid Figma prototype.");
          // Display error message to the user.
        }

      }
    }

    function checkIfFigma(string) {
      // Regular Expression that does the following: {http(s)://}{figma.com/embed}{?embed_host=share}{&url=http(s)}
      const regex = /(https?:\/\/w+?\.?figma\.com\/embed\?embed_host=share&url=https?)(\/[A-Za-z0-9\-\._~:\/\?#\[\]@!$&'\(\)\*\+,;\=]*)?/gim;

      let m; // Variable that stores all the eventual matches

      while ((m = regex.exec(string)) !== null) {
        // This is necessary to avoid infinite loops with zero-width matches
        if (m.index === regex.lastIndex) {
            regex.lastIndex++;
        }

        // The result can be accessed through the `m`-variable.
        // m.forEach((match, groupIndex) => {
        //     console.log(`Found match, group ${groupIndex}: ${match}`);
        // });


        // This RegEx should produce three matches. If so, the link is validated as a Figma Embed Proto
        if (m.length == 3) {
          return true;
        } else {
          return false;
        }
      }

      // Sample (valid) Figma Embed Proto link for testing
      // https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2F0aog8DUTpzlwfYNFORMjVa%2FFinal-Master-Project%3Fnode-id%3D418%253A2%26viewport%3D-311%252C317%252C0.05923917517066002%26scaling%3Dmin-zoom
    }

    </script>

  </body>
</html>
