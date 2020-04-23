<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>Requestor App (Alpha)</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="/css/prototype.css"> <!-- Main styling document -->
    <link rel="stylesheet" href="/css/prototype-darkmode.css"> <!-- Optional Dark Mode for Aesthetics -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  </head>
  <body id="body">

    <div class="app">

      <section class="frame-container" id="frame_container"> <!-- Embedded Figma Prototype -->
        <div class="frame" id="frame">
          <iframe id="iframe_prototype" title="An interactive Figma prototype of the current project." allowfullscreen="true" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FejJw4AVHI1kAIktWxJzYDb%3Fnode-id%3D1%253A2%26viewport%3D497%252C275%252C0.2620800733566284%26scaling%3Dscale-down-width"></iframe>
        </div>

        <div class="frame-modal-container" id="frameModal">
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
          <h2><img src="/i/feather/tag.svg" alt="Tag icon"/>About the Project</h2>
          <p>Bol.com is the leading online shop in the Netherlands for books, toys and electronics that serve over 10.5 million customers. (Note: this project is currently placeholder, as it allows pre-alpha testers to better understand what this project is about.)</p>

          <h2><img src="/i/feather/users.svg" alt="Users icon"/>Target Users</h2>
          <p>Bol.com mainly serves customers in the Netherlands (72%) and Belgium (17%), across all age groups. (Data is fictive, placeholder)</p>

          <h2><img src="/i/feather/clipboard.svg" alt="Clipboard icon"/>What We Ask You To Do</h2>
          <ol>
            <li>Carefully read through the 'Scenario / Task List'.</li>
            <li>Once you are familiar with the tasks, click on the 'I understand' button: this unlocks the interface.</li>
            <li>Try to perform all the steps using the interface on the left. Don't worry if you get stuck.</li>
            <!-- <li>Perform a <a href="https://uxplanet.org/how-to-conduct-heuristic-evaluation-85548a355dca" target="_blank" aria-label="In short, a Heuristic Evaluation is a method for helping UX practitioners evaluate user interface designs.

Click on the link for an in-depth article (reading time: 5 minutes)." data-balloon-pos="down" data-balloon-length="medium">Heuristic Evaluation</a> of the project using the form below. For every heuristic or 'global rule', you state whether you think there is a usability error.</li> -->
            <li>When you've completed the steps, review the interface you've just used using the ten 'Usability Heuristics' &mdash; giving your opion on how well the design meets these ten rules.</li>
          </ol>
        </div>

        <div class="evaluation-intro" id="evaluation_intro">
          <h2><img src="/i/feather/image.svg" alt="Image icon"/>Scenario / Task List</h2>
          <p class="tasklist-p">Your name is Frederic — a 62 year old Dutch male from the Veldhoven area. Your Epson printer just broke down for the last time, and is in dire need of replacement.</p>
          <ol>
            <!-- <li class="taskListItem">Your name is Frederic — a 62 year old Dutch male from the Veldhoven area. Your Epson printer just broke down for the last time, and is in dire need of replacement.</li> -->
            <li class="taskListItem">You opened the Bol.com page to order a new one. However, your wife gave you a list of restrictions:</li>
            <li class="taskListItem">The printer should <e>cost less than €90</e>. It should be able to <e>print in full-colour</e>. Finally, <e>you don't want an Epson brand printer</e>.</li>
            <li class="taskListItem">Use the Bol.com website to find a suitable new printer, and add it to your shopping basket.</li>
          </ol>

          <button type="button" name="startEvaluation" id="startEvaluationBtn" class="btn" onclick="startEvaluation()">I understand &mdash; show me the interface!</button>
        </div>

        <!-- <form class="" action="backend/form_handler.php" method="post" enctype="application/x-www-form-urlencoded"> -->
        <form class="" action="javascript:void(0)" method="post" enctype="application/x-www-form-urlencoded">

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

              <label for="heu_1_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_1_issue" id="heu_1_issue" rows="4" disabled></textarea>

              <label for="heu_1_recommendation">Recommendation(s)</label>
              <textarea name="heu_1_recommendation" id="heu_1_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_2_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_2_issue" id="heu_2_issue" rows="4" disabled></textarea>

              <label for="heu_2_recommendation">Recommendation(s)</label>
              <textarea name="heu_2_recommendation" id="heu_2_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_3_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_3_issue" id="heu_3_issue" rows="4" disabled></textarea>

              <label for="heu_3_recommendation">Recommendation(s)</label>
              <textarea name="heu_3_recommendation" id="heu_3_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_4_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_4_issue" id="heu_4_issue" rows="4" disabled></textarea>

              <label for="heu_4_recommendation">Recommendation(s)</label>
              <textarea name="heu_4_recommendation" id="heu_4_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_5_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_5_issue" id="heu_5_issue" rows="4" disabled></textarea>

              <label for="heu_5_recommendation">Recommendation(s)</label>
              <textarea name="heu_5_recommendation" id="heu_5_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_6issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_6_issue" id="heu_6_issue" rows="4" disabled></textarea>

              <label for="heu_6_recommendation">Recommendation(s)</label>
              <textarea name="heu_6_recommendation" id="heu_6_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_7_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_7_issue" id="heu_7_issue" rows="4" disabled></textarea>

              <label for="heu_7_recommendation">Recommendation(s)</label>
              <textarea name="heu_7_recommendation" id="heu_7_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_8_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_8_issue" id="heu_8_issue" rows="4" disabled></textarea>

              <label for="heu_8_recommendation">Recommendation(s)</label>
              <textarea name="heu_8_recommendation" id="heu_8_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_9_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_9_issue" id="heu_9_issue" rows="4" disabled></textarea>

              <label for="heu_9_recommendation">Recommendation(s)</label>
              <textarea name="heu_9_recommendation" id="heu_9_recommendation" rows="2" disabled></textarea>

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

              <label for="heu_10_issue">Issue(s) <span>(Please be specific)</span></label>
              <textarea name="heu_10_issue" id="heu_10_issue" rows="4" disabled></textarea>

              <label for="heu_10_recommendation">Recommendation(s)</label>
              <textarea name="heu_10_recommendation" id="heu_10_recommendation" rows="2" disabled></textarea>

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

            <label for="general_impression">What was your general impression of the design you've just seen? <span>(You can be as specific as you want)</span></label>
            <textarea name="general_impression" id="general_impression" rows="4" ></textarea>

            <p class="p_emphasis">Don't forget to click the submit button when you've completed your evaluation.</p>

            <input type="submit" value="Submit Evaluation" onclick="validateForm('nielsen')">
          </div>

        </form>

      </section>

    </div>

    <div class="onboarding-wrapper">
      <div class="onboarding-content">
        <div class="row"></div>
        <div class="row">
          <div class="invitation">
            <img src="/i/envelope.png" id="invitationImg" alt="" onclick="reviewInvitation()">
          </div>
          <div class="information">
            <!-- TODO: IMPLEMENT JS TO LOCK/TRAP TABINDEX TO MODAL -->
            <h1>You've been invited by <a href="#!" tabindex="0" aria-label="As a User Experience Designer, Arthur is responsible for making sure that the products he works on are easy- and enjoyable to use." data-balloon-pos="up" data-balloon-length="large">Arthur Geel</a> to evaluate their <a href="#!" tabindex="0" aria-label="Bol.com is the leading online shop in the Netherlands for books, toys and electronics.

  Find out more about this project by accepting the invitation!" data-balloon-pos="down" data-balloon-length="large">Bol.com</a>  prototype!</h1>
            <h2>* This should only take about <span id="timeAmount">fifteen minutes</span> of your time.</h2>
            <button type="button" name="review" class="onboarding-btn main" tabindex="0" onclick="reviewInvitation()">Review Invitation</button>
            <button type="button" name="nothanks" class="onboarding-btn" tabindex="0" onclick="declineInvitation()">I'll Pass, Thanks</button>

          </div>
        </div>

        <div class="row privacy-statement" onclick="window.location='/privacy-policy'">
          <!-- <img src="i/feather/cookie.svg" alt="Cookie icon"> -->
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


    <script src="/js/lottie.js"></script>
    <script src="/js/app.js"></script>


    <!-- <div class="modal">
      <h2>Save document?</h2>

      <a href="https://arthurgeel.com/documents/cv.pdf">Link here</a>

      <button>Cancel</button>
      <button autofocus>OK</button>
    </div> -->

  </body>
</html>
