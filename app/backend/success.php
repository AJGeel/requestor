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
    <link rel="stylesheet" href="success-styling.min.css">
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
          <div class="stat--text">You found <b><span class="stat--dynamic-content" id="issuesFound">0</span> out of 6 usability issues</b>. <span id="issuesFoundAppraisal">Better luck next time!</span></div>
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
  // Check PHP variable to determine which questionnaire should be loaded
  let prototypeID = <?php echo $prototype_id ?>;
  </script>
  <script src="success.min.js" charset="utf-8"></script>

</body>
</html>
