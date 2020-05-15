<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Requestor &mdash; Research Study</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  </head>

  <body>
    <div class="page">
      <section class="onboarding">
        <h1>Requestor &mdash; Facilitating Collaboration in Remote Design Work</h1>
        <p>Fantastic to see that you may be interested in contributing to the development of tools that <b>facilitate remote design work</b>!</p>
        <p>Requestor is a tool designed to facilitate better remote collaboration between designers and their (non)designer colleagues and stakeholders. With this tool we seek to empower everyone to <b>better understand design</b> and <b>provide constructive feedback</b>.</p>
        <p>In this study, we ask you to <b>perform a design evaluation</b> using the Requestor tool, which takes place on your computer, in your preferred internet browser. Subsequently, we ask you to <b>fill out a questionnaire</b> to help us understand the work load you experienced during the study.</p>
        <p>We know your time is valuable, which is why this study was designed to take <b>less than 30 minutes</b> to complete. In any case, thanks for your interest and time.</p>
      </section>

      <section class="consent">
        <h1>Informed Consent</h1>
        <p>Prior to this study we would like to ask you to read through the 'Subject information for participation' letter. You can access this by clicking on <a href="documents/Consent-Form-EN_AJ-Geel-20200428.pdf" target="_blank">this link</a>.</p>
        <p>By taking part in this study you confirm the following:</p>
        <ol>
          <li>I have read the subject information form. I was also able to ask questions. My questions have been answered to my satisfaction. I had enough time to decide whether to participate.</li>
          <li>I know that participation is voluntary. I know that I may decide at any time not to participate after all or to withdraw from the study. I do not need to give a reason for this.</li>
          <li>I give permission for the collection and use of my data to answer the research question in this study.</li>
          <li>I know that some people may have access to all my data to verify the study. These people are listed in this information sheet. I consent to the inspection by them.</li>
        </ol>

        <div class="consent-form">
          <p>&bull; I give consent and would like to participate in this study.</p>
          <div class="consent-options">
            <button type="button" name="button" id="consent">Yes</button>
            <button type="button" name="button" id="noConsent">No</button>
          </div>
        </div>
        <div class="experience-form">
          <p>Additionally, we'd like to know how you perceive your own ability in Design and/or User Experience Design. Please use the following scale to indicate the perception of your ability:</p>
          <div class="experience-options">
            <button type="button" name="button" id="xp_1">No level of competence &mdash; I have no practical experience.</button>
            <button type="button" name="button" id="xp_2">Low level of competence &mdash; I have little practical experience.</button>
            <button type="button" name="button" id="xp_3">Average level of competence &mdash; I have some practical experience.</button>
            <button type="button" name="button" id="xp_4">Moderately high level of competence &mdash; I have good practical experience.</button>
            <button type="button" name="button" id="xp_5">High level of competence &mdash; I have extensive practical experience.</button>
          </div>
        </div>

        <a id="toStudy" class="call-to-action inactive"><span>Continue to Study &nbsp;&gt;</span></a>

      </section>

      <style media="screen">
      html {
      	background-color: #f3f3fc
      }

      .page {
      	font-family: Sen, sans-serif;
      	max-width: 54em;
      	margin: 4em auto;
      	background-color: #fff;
      	padding: 6em;
      	box-shadow: 0 5px 35px hsla(244, 40%, 32%, .15);
      	border-radius: 2px
      }

      .consent {
      	border-top: 4px solid #f3f3fc;
      	margin-top: 3em;
      	padding-top: 3em
      }

      h1 {
      	color: #0000a3;
      	font-size: 2.2em;
      	font-weight: 600;
      	margin-bottom: .8em;
      	line-height: 1.2
      }

      .consent-form, .experience-form {
      	background-color: #f3f3fc;
      	color: #0000a3;
      	display: flex;
      	flex-direction: column;
      	justify-content: center;
      	align-items: center;
      	padding: 2em;
        margin: 2em 0;
      }

      .consent-form {
        margin-bottom: 0;
      }

      .experience-form {
        margin-top: 10px;
      }

      .consent-form p, .experience-form p {
      	width: 100%;
      }

      .consent-options, .experience-options {
      	width: 100%;
      	display: flex
      }

      .experience-options {
        flex-direction: column;
      }

      .consent-options button, .experience-options button {
      	width: 100%;
      	font-family: Sen, sans-serif;
      	background-color: #f3f3fc;
      	border: 1px solid #0000a3;
      	box-sizing: border-box;
      	color: #0000a3;
      	cursor: pointer;
      	padding: .4em;
      	font-size: 1em;
      	transition: background-color .2s ease-in-out, color .2s ease-in-out
      }

      .consent-options button {
        border-right: none;
      }

      .experience-options button {
        text-align: left;
        padding: .4em 1em;
        border-bottom: none;
      }

      .experience-options button:last-child {
        border-bottom: 1px solid #0000a3;
      }

      .consent-options button.active,
      .consent-options button:hover,
      .experience-options button.active,
      .experience-options button:hover {
      	background-color: #0000a3;
      	color: #fff
      }

      .consent-options button:first-child {
      	border-top-left-radius: 2px;
      	border-bottom-left-radius: 2px;
      }

      .consent-options button:last-child{
      	border-top-right-radius: 2px;
      	border-bottom-right-radius: 2px;
        border-right: 1px solid #0000a3;
      }

      .call-to-action {
      	background-color: #0000a3;
      	color: #fff;
      	box-sizing: border-box;
      	cursor: pointer;
      	border-radius: 100px;
      	padding: .7em;
      	font-size: 1em;
      	border: none;
      	font-family: Sen, sans-serif;
      	margin-top: 1em;
      	display: flex;
      	justify-content: center;
      	text-decoration: none;
      	transition: background-color .2s ease-in-out
      }

      .call-to-action.inactive {
      	background-color: #787891;
      	cursor: help
      }

      .call-to-action span {
      	transition: all .2s ease-in-out
      }

      .call-to-action:hover span {
      	transform: translateX(1em)
      }

      p {
      	line-height: 1.5;
      	margin-bottom: 1em
      }

      ol {
      	list-style-type: decimal;
      	list-style-position: inside;
      	line-height: 1.5
      }

      ol li {
      	margin-bottom: 1em
      }

      body {
      	transition: all .2s ease-in-out
      }

      a {
      	color: #0000a3
      }

      b {
      	font-weight: 700
      }

      @media only screen and (max-width:992px) {
      	body {
      		padding: 2em
      	}
      	.page {
      		padding: 2em;
      		margin: 0 auto;
      		transition: .2s ease-in-out
      	}
      	h1 {
      		font-size: 1.5em
      	}
      }

      @media only screen and (max-width:400px) {
      	body {
      		padding: .5em
      	}
      }

      </style>
      <script src="js/uid.js" charset="utf-8"></script>

    </div>
  </body>
</html>
