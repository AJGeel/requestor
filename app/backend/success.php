<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="no-index, no-follow">
    <title>Well done!</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="success-styling.css">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  </head>
<body>
  <div class="container">
    <section class="hero" id="my-canvas">
      <img src="great-success.png" alt="Great success!">
    </section>
    <section class="sidebar">
      <h1>Well done!</h1>
      <p>You <b>successfully completed</b> the design evaluation assignment.</p>
      <p>Before we continue to the final questionnaire (10 min.), here's a quick round-up of how you did:</p>

      <div class="stats">
        <div class="stat">
          <div class="stat--icon"><img src="clock-icon.png" alt="clock icon"></div>
          <div class="stat--text">You spent <b><span class="stat--dynamic-content" id="timeSpent">0</span> minutes</b> on the evaluation. <span id="timeSpentAppraisal">a bit faster than the average!</span></div>
        </div>
        <div class="stat">
          <div class="stat--icon"><img src="search-icon.png" alt="search icon"></div>
          <div class="stat--text">You found <b><span class="stat--dynamic-content" id="issuesFound">0</span> out of 5 usability issues</b>. <span id="issuesFoundAppraisal">Better luck next time!</span></div>
        </div>
        <div class="stat">
          <div class="stat--text"><b>Optional:</b> Would you be interested in helping us with other evaluations in the future?</div>
          <div class="stat-buttons">
            <button type="button" name="button" id="interested">Yes</button>
            <button type="button" name="button" id="notInterested">No</button>
          </div>
        </div>
      </div>

      <p>Whenever you are ready, <b>please click on the button below</b> to continue to the final part of this experiment.</p>

      <a id="nextQuestionnaire" class="call-to-action"><span>Continue to Questionnaire &nbsp;&gt;</span></a>

    </section>

  </div>


  <script type="text/javascript">

    // DOM Calls
    let btnInterested = document.getElementById('interested');
    let btnNotInterested = document.getElementById('notInterested');
    let nextQuestionnaireBtn = document.getElementById('nextQuestionnaire');

    // Global variables
    let interestedBool = 0;
    let interfaceVariant;

    let userData = {
      ID: <?php echo $user_id ?>,
      input: "<?php echo $heuristics_string_values ?>",
      timeSpent: {
        total: <?php echo $time_spent_total ?>,
        onboarding: <?php echo $time_spent_on_onboarding ?>,
        scenario: <?php echo $time_spent_on_scenario ?>,
        evaluation: <?php echo $time_spent_on_evaluation ?>
      },
      completedScenario: <?php echo $completed_scenario ?>
    }


    // EventListener for clicking the 'interested' button
    btnInterested.addEventListener('click', function() {
      if (btnInterested.classList.contains('active') != true) {
        btnInterested.classList.add('active');
      }

      btnNotInterested.classList.remove('active');
      // Update variable value
      interestedBool = 1;

      // Submit to database
      updateInterested();
    });

    // EventListener for clicking the 'not interested' button
    btnNotInterested.addEventListener('click', function() {
      if (btnNotInterested.classList.contains('active') != true) {
        btnNotInterested.classList.add('active');
      }

      btnInterested.classList.remove('active');
      // Update variable value
      interestedBool = 0;
      
      // Submit to database
      updateInterested();
    });

    // EventListener for the 'Continue to Questionnaire' button
    nextQuestionnaireBtn.addEventListener('click', function() {
      toNextPage();
    });

    // Function to get a cookie
    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    function toNextPage() {
      // Navigate to the correct follow-up page
      location.href = `../../nasa-tlx/${interfaceVariant}.html`;
    }

    // Function to check the amount of right answers
    function checkUserPerformance() {
      let numberCorrect = 0;
      let tempAnswerArr = userData.input.split(',');
      let userAnswers = [];

      // Go through full user input, isolate their answers into an array
      for (i = 0; i < tempAnswerArr.length-1; i += 3) {
        // Replace "'" signs
        let ans = tempAnswerArr[i].replace(/'/g, '');
        // Append to array
        userAnswers.push(ans);
      }

      // For this case, the 'right' answers are problems in heuristics [1,4] and [9].
      let faultyHeuristics = [0, 1, 2, 3, 8];
      // Compare userAnswers to right answers
      for (i = 0; i < faultyHeuristics.length; i++) {
        // For each
        let ans = userAnswers[faultyHeuristics[i]];

        // Check if user has specified there is an issue with the heuristic
        if (ans >= 1 && ans <= 4) {
          // If so: add one to their tally.
          numberCorrect += 1;
        }
      }

      return numberCorrect;
    }

    function checkPrototypeVariant() {
      // Check PHP variable to determine which questionnaire should be loaded
      let prototypeID = <?php echo $prototype_id ?>;

      if (prototypeID == 0) {
        interfaceVariant = 'gui';
      } else {
        interfaceVariant = 'cui';
      }
    }

    function updatePerformanceIndicators() {
      // Check- and update time spent
      let statTimeSpent = document.getElementById('timeSpent');
      // Calculate amount of minutes spent on the total evaluation
      let minutes = Math.floor(userData.timeSpent.total / 60); // (60 seconds in every minute)
      // Update DOM content to match
      statTimeSpent.innerHTML = minutes;
      // Then: provide correct appraisal
      // Get the correct DOM Element in which we will update
      let timeSpentAppraisal = document.getElementById('timeSpentAppraisal');
      if (minutes < 15) {
        timeSpentAppraisal.innerHTML = 'That\'s quite a bit faster than the average!';
      } else if (minutes < 20) {
        timeSpentAppraisal.innerHTML = 'You\'re faster than the average. Nice one!';
      } else {
        timeSpentAppraisal.innerHTML = 'That\'s more than most do. Thank you for being so thorough!';
      }

      // Check and update issues found
      let statIssuesFound = document.getElementById('issuesFound');

      // Retrieve total amount of issues found
      let issuesFound = checkUserPerformance();
      // Update DOM content to match.
      statIssuesFound.innerHTML = issuesFound;

      // Then: provide correct appraisal
      // Get the correct DOM Element in which we will update
      let issuesFoundAppraisal = document.getElementById('issuesFoundAppraisal');
      if (issuesFound <= 2) {
        issuesFoundAppraisal.innerHTML = 'Better luck next time!';
      } else if (issuesFound <= 3) {
        issuesFoundAppraisal.innerHTML = 'You found most of the issues!';
      } else if (issuesFound <= 5) {
        issuesFoundAppraisal.innerHTML = 'That\'s fantastic!';
      }

    }

    checkPrototypeVariant();
    updatePerformanceIndicators();

    // var sampleJSON = "FooBar3000";
    // var sampleURL = "https://phpenthusiast.com/dummy-api/"

    // function fetchPOST(url, myObj) {
    //     fetch(url, {
    //       method: "POST",
    //       mode: "same-origin",
    //       credentials: "same-origin",
    //       headers: {
    //         "Content-Type": "application/json"
    //       },
    //       body: JSON.stringify({
    //         "payload": myObj
    //       })
    //     })
    //     .then(function(response) {
    //         return response.json();
    //     })
    // }
    //
    // function fetchGET(url) {
    //   fetch(url)
    //   .then((res) => res.json())
    //   .then((data) => console.log(data))
    //   .catch((error) => console.log(error))
    // }

    /* Function that POSTS the user's ID and interestedBool values to our PHP
    handler. This validates its contents, and updates it in the database.
    */
    function updateInterested() {
      var url = 'interested.php';
      var formData = new FormData();
      formData.append('user_id', userData.ID);
      formData.append('interested', interestedBool);

      fetch(url, { method: 'POST', body: formData })
      .then(function (response) {
        return response.text();
      })
      .then(function (body) {
        console.log(body);
      });
    }

  </script>

</body>
</html>
