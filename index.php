<?php

define('allow-access', TRUE);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Requestor (Pre-Alpha)</title>
    <link rel="shortcut icon" href="i/favicon.png">
    <link rel="stylesheet" href="css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="css/style.css"> <!-- Main styling document -->
    <link rel="stylesheet" href="css/darkmode.css"> <!-- Optional Dark Mode for Aesthetics -->

  </head>
  <body id="body">

    <div class="app">

      <section class="frame-container" id="frame_container"> <!-- Embedded Figma Prototype -->
        <div class="frame" id="frame">
          <iframe id="iframe_prototype" allowedfullscreen></iframe>
        </div>

        <div class="frame-modal-container" id="onboardingModal">

          <div class="frame-modal">
            <div class="modal-illustration">
              <!-- <img src="i/custom-icons/notice-the-right.png" alt=""> -->
              <div class="lottie-img" id="lottie-point-right" alt="An animation of a person telling you to look to the right."></div>
              <!-- <button type="button" name="modalCloseBtn">&times;</button> -->
            </div>
            <div class="modal-content">
              <h1>One thing before you start:</h1>
              <p>Have a look at the instructions on the right. These will explain the context of the project and specify what you should focus on in this evaluation.</p>
              <!-- <button type="button" name="startEvaluation" class="btn" onclick="startEvaluation()">I understand &mdash; show me the interface!</button> -->
            </div>
          </div>

        </div>

      </section>

      <section class="evaluation" id="evaluation_container"> <!-- Explanation, onboarding and form -->

        <div class="progress-bar-container">
          <div class="progress-bar" id="progress-bar"></div>
        </div>

        <div class="evaluation-intro">
          <h1>Bol.com &mdash; UX Design Evaluation</h1>
          <h2><img src="i/feather/tag.svg"/>About the Project</h2>
          <p>Bol.com is the leading online shop in the Netherlands for books, toys and electronics that serve over 10.5 million customers. (Note: this project is currently placeholder, as it allows pre-alpha testers to better understand what this project is about.)</p>

          <h2><img src="i/feather/users.svg"/>Target Users</h2>
          <p>Bol.com mainly serves customers in the Netherlands (72%) and Belgium (17%), across all age groups. (Data is fictive, placeholder)</p>

          <h2><img src="i/feather/clipboard.svg"/>What We Ask You To Do</h2>
          <ol>
            <li>Start by carefully reading through the 'Scenario / Task List' below.</li>
            <li>Click on the 'I understand' button, and try to perform these steps using the interface on the left.</li>
            <!-- <li>Perform a <a href="https://uxplanet.org/how-to-conduct-heuristic-evaluation-85548a355dca" target="_blank" aria-label="In short, a Heuristic Evaluation is a method for helping UX practitioners evaluate user interface designs.

Click on the link for an in-depth article (reading time: 5 minutes)." data-balloon-pos="down" data-balloon-length="medium">Heuristic Evaluation</a> of the project using the form below. For every heuristic or 'global rule', you state whether you think there is a usability error.</li> -->
            <li>Then, read through ...</li>
          </ol>
        </div>

        <div class="evaluation-intro" id="evaluation_intro">
          <h2><img src="i/feather/image.svg"/>Scenario / Task List</h2>
          <ol>
            <li class="taskListItem">Your name is Frederic — a 62 year old Dutch man from the Veldhoven area. Your Epson printer just broke down for the last time, and is in dire need of replacement.</li>
            <li class="taskListItem">You opened the Bol.com page to order a new one. However, your wife gave you a list of restrictions:</li>
            <li class="taskListItem">The printer should <e>cost less than €90</e>. It should be able to <e>print in full-colour</e>. Finally, <e>you don't want an Epson brand printer</e>.</li>
            <li class="taskListItem">Use the Bol.com website to find a suitable new printer, and add it to your shopping basket.</li>
          </ol>

          <button type="button" name="startEvaluation" id="startEvaluationBtn" class="btn" onclick="startEvaluation()">I understand &mdash; show me the interface!</button>
        </div>

        <form class="" action="backend/form_handler.php" method="post" enctype="application/x-www-form-urlencoded">

          <!-- hidden form attributes to store user and session data -->
          <input type="hidden" name="user_id" id="form_user_id" value="22044"/>           <!-- TODO: link these hidden form values with JS / PHP, update them accordingly. -->
          <input type="hidden" name="prototype_id" id="form_prototype_id" value="81948"/> <!-- HOWEVER: now they are just static -->

          <div class="form_section heuristic">
            <h2>#1: Visibility of System Status</h2>
            <p>The system should always keep users informed about what is going on, through appropriate feedback within reasonable time.</p>
            <!-- <p>The system should always keep users informed about what is going on, through appropriate feedback within reasonable time. <a href="#!" aria-label="$Placeholder

Potentially, the tooltip functionality could be used to embed additional contextual information for the end-user, whilst not cognitively overloading those that do not need it." data-balloon-pos="down" data-balloon-length="medium">Show More</a>.</p> -->

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h1_c0" name="heu_1" value="0" onchange="formProgressiveDisclosure(this.value, 1, 'nielsen')">
              <label for="h1_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h1_c1" name="heu_1" value="1" onchange="formProgressiveDisclosure(this.value, 1, 'nielsen')">
              <label for="h1_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h1_c2" name="heu_1" value="2" onchange="formProgressiveDisclosure(this.value, 1, 'nielsen')">
              <label for="h1_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h1_c3" name="heu_1" value="3" onchange="formProgressiveDisclosure(this.value, 1, 'nielsen')">
              <label for="h1_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h1_c4" name="heu_1" value="4" onchange="formProgressiveDisclosure(this.value, 1, 'nielsen')">
              <label for="h1_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h1_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_1_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_1_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#2: Match between the system and the real world</h2>
            <p>The system should speak the users' language, with words, phrases and concepts familiar to the user, rather than system-oriented terms. Follow real-world conventions, making information appear in a natural and logical order.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h2_c0" name="heu_2" value="0" onchange="formProgressiveDisclosure(this.value, 2, 'nielsen')">
              <label for="h2_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h2_c1" name="heu_2" value="1" onchange="formProgressiveDisclosure(this.value, 2, 'nielsen')">
              <label for="h2_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h2_c2" name="heu_2" value="2" onchange="formProgressiveDisclosure(this.value, 2, 'nielsen')">
              <label for="h2_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h2_c3" name="heu_2" value="3" onchange="formProgressiveDisclosure(this.value, 2, 'nielsen')">
              <label for="h2_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h2_c4" name="heu_2" value="4" onchange="formProgressiveDisclosure(this.value, 2, 'nielsen')">
              <label for="h2_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h2_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_2_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_2_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#3: User control and freedom</h2>
            <p>Users often choose system functions by mistake and will need a clearly marked "emergency exit" to leave the unwanted state without having to go through an extended dialogue. Support undo and redo.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h3_c0" name="heu_3" value="0" onchange="formProgressiveDisclosure(this.value, 3, 'nielsen')">
              <label for="h3_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h3_c1" name="heu_3" value="1" onchange="formProgressiveDisclosure(this.value, 3, 'nielsen')">
              <label for="h3_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h3_c2" name="heu_3" value="2" onchange="formProgressiveDisclosure(this.value, 3, 'nielsen')">
              <label for="h3_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h3_c3" name="heu_3" value="3" onchange="formProgressiveDisclosure(this.value, 3, 'nielsen')">
              <label for="h3_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h3_c4" name="heu_3" value="4" onchange="formProgressiveDisclosure(this.value, 3, 'nielsen')">
              <label for="h3_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h3_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_3_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_3_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#4: Consistency and standards</h2>
            <p>Users should not have to wonder whether different words, situations, or actions mean the same thing. Follow platform conventions.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h4_c0" name="heu_4" value="0" onchange="formProgressiveDisclosure(this.value, 4, 'nielsen')">
              <label for="h4_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h4_c1" name="heu_4" value="1" onchange="formProgressiveDisclosure(this.value, 4, 'nielsen')">
              <label for="h4_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h4_c2" name="heu_4" value="2" onchange="formProgressiveDisclosure(this.value, 4, 'nielsen')">
              <label for="h4_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h4_c3" name="heu_4" value="3" onchange="formProgressiveDisclosure(this.value, 4, 'nielsen')">
              <label for="h4_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h4_c4" name="heu_4" value="4" onchange="formProgressiveDisclosure(this.value, 4, 'nielsen')">
              <label for="h4_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h4_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_4_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_4_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#5: Error Prevention</h2>
            <p>Even better than good error messages is a careful design which prevents a problem from occurring in the first place. Either eliminate error-prone conditions or check for them and present users with a confirmation option before they commit to the action.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h5_c0" name="heu_5" value="0" onchange="formProgressiveDisclosure(this.value, 5, 'nielsen')">
              <label for="h5_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h5_c1" name="heu_5" value="1" onchange="formProgressiveDisclosure(this.value, 5, 'nielsen')">
              <label for="h5_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h5_c2" name="heu_5" value="2" onchange="formProgressiveDisclosure(this.value, 5, 'nielsen')">
              <label for="h5_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h5_c3" name="heu_5" value="3" onchange="formProgressiveDisclosure(this.value, 5, 'nielsen')">
              <label for="h5_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h5_c4" name="heu_5" value="4" onchange="formProgressiveDisclosure(this.value, 5, 'nielsen')">
              <label for="h5_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h5_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_5_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_5_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#6: Recognition rather than recall</h2>
            <p>Minimize the user's memory load by making objects, actions, and options visible. The user should not have to remember information from one part of the dialogue to another. Instructions for use of the system should be visible or easily retrievable whenever appropriate.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h6_c0" name="heu_6" value="0" onchange="formProgressiveDisclosure(this.value, 6, 'nielsen')">
              <label for="h6_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h6_c1" name="heu_6" value="1" onchange="formProgressiveDisclosure(this.value, 6, 'nielsen')">
              <label for="h6_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h6_c2" name="heu_6" value="2" onchange="formProgressiveDisclosure(this.value, 6, 'nielsen')">
              <label for="h6_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h6_c3" name="heu_6" value="3" onchange="formProgressiveDisclosure(this.value, 6, 'nielsen')">
              <label for="h6_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h6_c4" name="heu_6" value="4" onchange="formProgressiveDisclosure(this.value, 6, 'nielsen')">
              <label for="h6_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h6_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_6_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_6_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#7: Flexibility and efficiency of use</h2>
            <p>Accelerators — unseen by the novice user — may often speed up the interaction for the expert user such that the system can cater to both inexperienced and experienced users. Allow users to tailor frequent actions.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h7_c0" name="heu_7" value="0" onchange="formProgressiveDisclosure(this.value, 7, 'nielsen')">
              <label for="h7_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h7_c1" name="heu_7" value="1" onchange="formProgressiveDisclosure(this.value, 7, 'nielsen')">
              <label for="h7_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h7_c2" name="heu_7" value="2" onchange="formProgressiveDisclosure(this.value, 7, 'nielsen')">
              <label for="h7_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h7_c3" name="heu_7" value="3" onchange="formProgressiveDisclosure(this.value, 7, 'nielsen')">
              <label for="h7_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h7_c4" name="heu_7" value="4" onchange="formProgressiveDisclosure(this.value, 7, 'nielsen')">
              <label for="h7_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h7_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_7_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_7_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#8: Aesthetic and minimalist design</h2>
            <p>Dialogues should not contain information which is irrelevant or rarely needed. Every extra unit of information in a dialogue competes with the relevant units of information and diminishes their relative visibility.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h8_c0" name="heu_8" value="0" onchange="formProgressiveDisclosure(this.value, 8, 'nielsen')">
              <label for="h8_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h8_c1" name="heu_8" value="1" onchange="formProgressiveDisclosure(this.value, 8, 'nielsen')">
              <label for="h8_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h8_c2" name="heu_8" value="2" onchange="formProgressiveDisclosure(this.value, 8, 'nielsen')">
              <label for="h8_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h8_c3" name="heu_8" value="3" onchange="formProgressiveDisclosure(this.value, 8, 'nielsen')">
              <label for="h8_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h8_c4" name="heu_8" value="4" onchange="formProgressiveDisclosure(this.value, 8, 'nielsen')">
              <label for="h8_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h8_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_8_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_8_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#9: Help users recognize, diagnose, and recover from errors</h2>
            <p>Error messages should be expressed in plain language (no codes), precisely indicate the problem, and constructively suggest a solution.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h9_c0" name="heu_9" value="0" onchange="formProgressiveDisclosure(this.value, 9, 'nielsen')">
              <label for="h9_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h9_c1" name="heu_9" value="1" onchange="formProgressiveDisclosure(this.value, 9, 'nielsen')">
              <label for="h9_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h9_c2" name="heu_9" value="2" onchange="formProgressiveDisclosure(this.value, 9, 'nielsen')">
              <label for="h9_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h9_c3" name="heu_9" value="3" onchange="formProgressiveDisclosure(this.value, 9, 'nielsen')">
              <label for="h9_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h9_c4" name="heu_9" value="4" onchange="formProgressiveDisclosure(this.value, 9, 'nielsen')">
              <label for="h9_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h9_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_9_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_9_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <div class="form_section heuristic">
            <h2>#10: Help and documentation</h2>
            <p>Even though it is better if the system can be used without documentation, it may be necessary to provide help and documentation. Any such information should be easy to search, focused on the user's task, list concrete steps to be carried out, and not be too large.</p>

            <h3>Error Severity</h3>
            <div class="radio-button-group heuristic">
              <input type="radio" id="h10_c0" name="heu_10" value="0" onchange="formProgressiveDisclosure(this.value, 10, 'nielsen')">
              <label for="h10_c0" aria-label="I don’t agree that this is a usability problem at all." data-balloon-pos="down-left" data-balloon-length="medium">0</label>

              <input type="radio" id="h10_c1" name="heu_10" value="1" onchange="formProgressiveDisclosure(this.value, 10, 'nielsen')">
              <label for="h10_c1" aria-label="Cosmetic problem only: need not be fixed unless extra time is available on project." data-balloon-pos="down" data-balloon-length="medium">1</label>

              <input type="radio" id="h10_c2" name="heu_10" value="2" onchange="formProgressiveDisclosure(this.value, 10, 'nielsen')">
              <label for="h10_c2" aria-label="Minor usability problem: fixing this should be given low priority." data-balloon-pos="down" data-balloon-length="medium">2</label>

              <input type="radio" id="h10_c3" name="heu_10" value="3" onchange="formProgressiveDisclosure(this.value, 10, 'nielsen')">
              <label for="h10_c3" aria-label="Major usability problem: important to fix, so should be given high priority." data-balloon-pos="down" data-balloon-length="medium">3</label>

              <input type="radio" id="h10_c4" name="heu_10" value="4" onchange="formProgressiveDisclosure(this.value, 10, 'nielsen')">
              <label for="h10_c4" aria-label="Usability catastrophe: imperative to fix this before product can be released." data-balloon-pos="down-right" data-balloon-length="medium">4</label>
            </div>

            <div class="form-progressive-disclosure" id="h10_prog">

              <h3>Issue(s) <span>(Please be specific)</span></h3>
              <textarea name="heu_10_issue" rows="4" disabled></textarea>

              <h3>Recommendation(s)</h3>
              <textarea name="heu_10_recommendation" rows="2" disabled></textarea>

            </div>

          </div>

          <!-- <div class="form_section">

            <img class="congrats-img" src="i/mirage-message-sent.png"/>

            <h2>Finish Line</h2>
            <p>You've reached the end of this evaluation. On behalf <span id="requestor_id">Arthur Geel</span>, the requestor, thank you very much for your efforts, they allow us to level up our designs!</p>
            <p>Before you submit your evaluation, we'd like to show you how you did:</p>
            <div class="stat-overview">
              <p class="timer"><img src="i/feather/clock.svg"/><span id="timer">00:00</span>&nbsp;spent in this session</p>

              <div class="stat-half">
                <p><img src="i/feather/bell.svg"/>Some cool stats should be here.</p>
                <p><img src="i/feather/bell.svg"/>Don't forget about this one.</p>
              </div>

              <div class="stat-half">
                <p><img src="i/feather/bell.svg"/>Or this one.</p>
                <p><img src="i/feather/bell.svg"/>This one too.</p>
              </div>

            </div>
          </div> -->

          <div class="form_section">
            <h2>One More Thing</h2>

            <p>Well done, you've reached the end of this evaluation. On behalf of <span id="requestor_id">Arthur Geel</span>, the requestor, we thank you very much for your efforts! Here's one last question:</p>

            <h3>What was your general impression of the design you've just seen? <span>(You can be as specific as you want)</span></h3>

            <textarea name="general_impression" rows="4" ></textarea>

            <p class="p_emphasis">Don't forget to click the submit button when you've completed your evaluation.</p>

            <input type="submit" value="Submit Evaluation" onclick="alert('$DEBUG: This will validate and send the form data in the future.');">
          </div>

        </form>

      </section>

    </div>

    <div class="onboarding-wrapper">
      <div class="onboarding-content">
        <div class="invitation">
          <img src="i/envelope.png" id="invitationImg" alt="" onclick="reviewInvitation()">
        </div>

        <div class="information">
          <h1>You've been invited by <a href="#!" tabindex="1" aria-label="As a User Experience Designer, Arthur is responsible for making sure that the products he works on are easy- and enjoyable to use." data-balloon-pos="up" data-balloon-length="large">Arthur Geel</a> to evaluate their <a href="#!" tabindex="2" aria-label="Bol.com is the leading online shop in the Netherlands for books, toys and electronics.

Find out more about this project by accepting the invitation!" data-balloon-pos="down" data-balloon-length="large">Bol.com</a>  prototype!</h1>
          <h2>* This should only take about <span id="timeAmount">fifteen minutes</span> of your time.</h2>
          <button type="button" name="review" class="onboarding-btn main" tabindex="3" onclick="reviewInvitation()">Review Invitation</button>
          <button type="button" name="nothanks" class="onboarding-btn" tabindex="4" onclick="declineInvitation()">I'll Pass, Thanks</button>

        </div>

      </div>
    </div>

    <!-- Hotjar Tracking Code for localhost:3000 -->
    <!-- <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1672795,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script> -->


    <script src="js/lottie.js"></script>
    <script src="js/app.js"></script>


    <!-- <div class="modal">
      <h2>Save document?</h2>

      <a href="https://arthurgeel.com/documents/cv.pdf">Link here</a>

      <button>Cancel</button>
      <button autofocus>OK</button>
    </div> -->

  </body>
</html>
