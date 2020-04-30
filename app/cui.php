<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>Requestor App (CUI)</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="/css/prototype.css"> <!-- Main styling document -->
    <link rel="stylesheet" href="/css/prototype-darkmode.css"> <!-- Optional Dark Mode for Aesthetics -->
    <link rel="stylesheet" href="/css/bubbles.css"> <!-- CUI Bubbles Framework -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  </head>
  <body id="body">

    <div class="app">

      <section class="frame-container" id="frame_container"> <!-- Embedded Figma Prototype -->
        <div class="frame" id="frame">
          <!-- <iframe id="iframe_prototype" title="An interactive Figma prototype of the current project." allowfullscreen="true" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FejJw4AVHI1kAIktWxJzYDb%3Fnode-id%3D1%253A2%26viewport%3D497%252C275%252C0.2620800733566284%26scaling%3Dscale-down-width"></iframe> -->
          <iframe id="iframe_prototype" title="An interactive Figma prototype of the current project." allowfullscreen="true" src=""></iframe>
        </div>

        <div class="frame-modal-container" id="frameModal" style="display:none;">
          <div class="frame-modal">
            <div class="modal-illustration">
              <div class="lottie-img" id="lottie-point-right" alt="An animation of a person telling you to look to the right."></div>
            </div>
            <div class="modal-content">
              <h1>One thing before you start:</h1>
              <p>Have a look at the instructions on the right. These will explain the context of the project and specify what you should focus on in this evaluation.</p>
            </div>
          </div>
        </div>

      </section>

      <section class="evaluation" id="evaluation_container"> <!-- Explanation, onboarding and form -->

        <div class="progress-bar-container" style="display: none;">
          <div class="progress-bar" id="progress-bar"></div>
        </div>

        <form class="" action="javascript:void(0)" method="post" enctype="application/x-www-form-urlencoded">

         <!-- Hidden form attributes to store user and session data
              In the CUI, this hidden form is used to store all user input, which
              is later sent my the form_handler.php
         -->
          <input type="hidden" name="user_id" id="form_user_id" value="-1"/>
          <input type="hidden" name="prototype_id" id="form_prototype_id" value="1"/> <!-- Variant 0 = GUI / Variant 1 = CUI -->

          <!-- Initially, all user input values are unset. These will be set
               once the user starts progressing through the interface. -->

          <!-- Heuristic 1 -->
          <input type="hidden" name="heu_1" value="">
          <input type="hidden" name="heu_1_issue" value="">
          <input type="hidden" name="heu_1_suggestion" value="">

          <!-- Heuristic 2 -->
          <input type="hidden" name="heu_2" value="">
          <input type="hidden" name="heu_2_issue" value="">
          <input type="hidden" name="heu_2_suggestion" value="">

          <!-- Heuristic 3 -->
          <input type="hidden" name="heu_3" value="">
          <input type="hidden" name="heu_3_issue" value="">
          <input type="hidden" name="heu_3_suggestion" value="">

          <!-- Heuristic 4 -->
          <input type="hidden" name="heu_4" value="">
          <input type="hidden" name="heu_4_issue" value="">
          <input type="hidden" name="heu_4_suggestion" value="">

          <!-- Heuristic 5 -->
          <input type="hidden" name="heu_5" value="">
          <input type="hidden" name="heu_5_issue" value="">
          <input type="hidden" name="heu_5_suggestion" value="">

          <!-- Heuristic 6 -->
          <input type="hidden" name="heu_6" value="">
          <input type="hidden" name="heu_6_issue" value="">
          <input type="hidden" name="heu_6_suggestion" value="">

          <!-- Heuristic 7 -->
          <input type="hidden" name="heu_7" value="">
          <input type="hidden" name="heu_7_issue" value="">
          <input type="hidden" name="heu_7_suggestion" value="">

          <!-- Heuristic 8 -->
          <input type="hidden" name="heu_8" value="">
          <input type="hidden" name="heu_8_issue" value="">
          <input type="hidden" name="heu_8_suggestion" value="">

          <!-- Heuristic 9 -->
          <input type="hidden" name="heu_9" value="">
          <input type="hidden" name="heu_9_issue" value="">
          <input type="hidden" name="heu_9_suggestion" value="">

          <!-- Heuristic 10 -->
          <input type="hidden" name="heu_10" value="">
          <input type="hidden" name="heu_10_issue" value="">
          <input type="hidden" name="heu_10_suggestion" value="">

        </form>

        <div id="chat">

        </div>

      </section>

    </div>

    <div class="onboarding-wrapper">
      <div class="onboarding-content">
        <div class="row"></div>
        <div class="row">
          <div class="invitation">
            <img src="/i/envelope.png" id="invitationImg" alt="" onclick="reviewInvitation(); commenceTalking();">
          </div>
          <div class="information">
            <h1>You've been invited by <a href="#!" tabindex="0" aria-label="As a User Experience Designer, Arthur is responsible for making sure that the products he works on are easy- and enjoyable to use." data-balloon-pos="up" data-balloon-length="large">Arthur Geel</a> to evaluate their <a href="#!" tabindex="0" aria-label="Bol.com is the leading online shop in the Netherlands for books, toys and electronics.

  Find out more about this project by accepting the invitation!" data-balloon-pos="down" data-balloon-length="large">Bol.com</a>  prototype!</h1>
            <h2>* This should only take about <span id="timeAmount">fifteen minutes</span> of your time.</h2>
            <button type="button" name="review" class="onboarding-btn main" tabindex="0" onclick="reviewInvitation(); startTalking()">Review Invitation</button>
            <button type="button" name="nothanks" class="onboarding-btn" tabindex="0" onclick="declineInvitation()">I'll Pass, Thanks</button>

          </div>
        </div>

        <div class="row privacy-statement" onclick="window.location='/privacy-policy'">
          <svg id="svg-cookie" data-name="svg-cookie" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.2 85.2">
            <title>cookie-svg</title>
            <path d="M50,7.4A42.6,42.6,0,1,0,92.6,50,42.64,42.64,0,0,0,50,7.4Zm0,80.7A38.1,38.1,0,1,1,88.1,50,38.15,38.15,0,0,1,50,88.1Zm-11.7-68c-.8-1.6.3-3.6,2.5-4.6a5.32,5.32,0,0,1,3-.5A3,3,0,0,1,46,16.5a2.91,2.91,0,0,1-.2,2.7,6.09,6.09,0,0,1-2.2,2,5.93,5.93,0,0,1-2.3.5,1.7,1.7,0,0,1-.7-.1A2.51,2.51,0,0,1,38.3,20.1ZM83.8,43.3c-.1,1.6-1.8,2.8-4,2.8h-.4c-2.4-.2-4.1-1.7-4-3.4s2.1-3,4.4-2.8S84,41.5,83.8,43.3Zm-20-.6c1.1,1.3.6,3.6-1.2,5.1A5.06,5.06,0,0,1,59.5,49a2.58,2.58,0,0,1-2.1-.9c-1.1-1.3-.6-3.6,1.2-5.1h0a5,5,0,0,1,2.7-1.2A2.81,2.81,0,0,1,63.8,42.7ZM79.1,61.8a2.83,2.83,0,0,1,.8,2.5,3.37,3.37,0,0,1-3.5,2.3,4.87,4.87,0,0,1-1.2-.1,4.73,4.73,0,0,1-2.6-1.4,2.83,2.83,0,0,1-.8-2.5,2.77,2.77,0,0,1,1.8-2,5,5,0,0,1,3-.2A5.22,5.22,0,0,1,79.1,61.8ZM68.8,24.7a2.77,2.77,0,0,1-1.8,2,5.23,5.23,0,0,1-1.8.3,4.87,4.87,0,0,1-1.2-.1,4.41,4.41,0,0,1-2.6-1.4,2.83,2.83,0,0,1-.8-2.5c.4-1.7,2.5-2.7,4.8-2.2S69.2,23,68.8,24.7ZM22,41a5.06,5.06,0,0,1-3.1-1.2,5.89,5.89,0,0,1-1.7-2.5,2.61,2.61,0,0,1,.5-2.6,2.81,2.81,0,0,1,2.5-.9A5,5,0,0,1,22.9,35c1.8,1.5,2.3,3.8,1.2,5.1A2.45,2.45,0,0,1,22,41Zm4,23.9a5.37,5.37,0,0,1-2,2.2,2.82,2.82,0,0,1-1.5.4,2,2,0,0,1-1.1-.3A3,3,0,0,1,19.9,65a6,6,0,0,1,.5-2.9,5.32,5.32,0,0,1,2-2.2,3.23,3.23,0,0,1,2.7-.2C26.6,60.5,27,62.8,26,64.9ZM56,75c.8,1.6-.3,3.6-2.5,4.6a4.79,4.79,0,0,1-2.3.5,3.13,3.13,0,0,1-2.9-1.6c-.8-1.6.3-3.6,2.5-4.6a5.32,5.32,0,0,1,3-.5A3.1,3.1,0,0,1,56,75ZM40.5,40.4a3.18,3.18,0,0,1-2-.8A5.59,5.59,0,0,1,37,37c-.5-2.3.4-4.4,2.1-4.8a2.93,2.93,0,0,1,2.6.8,5.59,5.59,0,0,1,1.5,2.6c.5,2.3-.4,4.4-2.1,4.8C40.9,40.3,40.7,40.4,40.5,40.4Zm7.3,19a3.16,3.16,0,0,1-.3,2.7,2.9,2.9,0,0,1-2.4,1.1,4.85,4.85,0,0,1-2.9-1c-1.9-1.4-2.6-3.6-1.6-5A2.9,2.9,0,0,1,43,56.1a5.31,5.31,0,0,1,2.8,1A4.39,4.39,0,0,1,47.8,59.4Z" transform="translate(-7.4 -7.4)"/></svg>
          <p>For this application to function smoothly, we make use of cookies. We also collect usage statistics to improve our services. Please visit our <a href="/privacy">Privacy Policy</a> to learn about our standards for protecting your privacy.</p>
        </div>
      </div>
    </div>

    <div class="small-screens">
      <div class="small-screens-container">
        <img src="https://placehold.it/1920x1080" alt="placeholder image">
        <h2>Oh snap!</h2>
        <p>It appears you are trying to reach this page on a phone, a small tablet, or a computer browser that is sized rather awkwardly.</p>
        <p>Unfortunately, the Requestor application currently is only supported on screens that are wider than 840 pixels, while your screen is <span id="window-width"></span> pixels wide.</p>
        <p class="outlined">Please visit this page again using a larger screen.</p>
      </div>
    </div>


    <script src="/js/lottie.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/bubbles.js"></script>
    <script src="/js/cui.js"></script>


  </body>
</html>
