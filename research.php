<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Requestor &mdash; Research Study</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://requestor.nl/research.php">
    <meta property="og:title" content="Requestor — Facilitating Remote Collaboration in Design">
    <meta property="og:description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta property="og:image" content="https://requestor.nl/i/requestor-promotional-og.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://requestor.nl/research.php">
    <meta property="twitter:title" content="Requestor — Facilitating Remote Collaboration in Design">
    <meta property="twitter:description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta property="twitter:image" content="https://requestor.nl/i/requestor-promotional-og.jpg">
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="/css/research.css">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  </head>

  <body>
    <div class="page">
      <section class="onboarding">
        <h1>Requestor &mdash; Facilitating Collaboration in Remote Design Work</h1>
        <p>Fantastic to see that you may be interested in contributing to the development of tools that <b>facilitate remote design work</b>!</p>
        <p>Requestor is a tool designed to facilitate better remote collaboration between designers and their (non)designer colleagues and stakeholders. With this tool we seek to empower everyone to <b>better understand design</b> and <b>provide constructive feedback</b>.</p>
        <p>In this study, we ask you to <b>perform a design evaluation</b> using the Requestor tool, which takes place on your computer, in your preferred internet browser. Subsequently, we ask you to <b>fill out a questionnaire</b> to help us understand the work load you experienced during the study.</p>
        <p>We know your time is valuable, which is why this study was designed to take <b>less than 30 minutes</b> to complete. In any case, thank you for your interest and time.</p>
      </section>

      <section class="consent">
        <h1>Informed Consent</h1>
        <p>Prior to this study we would like to ask you to read through the 'Subject information for participation' letter. You can access this by clicking on <a href="documents/Consent-Form-EN_AJ-Geel-20200428.pdf" target="_blank">this link</a>. In case you have any questions, feel free to contact me at <a href="mailto:a.j.geel@student.tue.nl">a.j.geel@student.tue.nl</a>.</p>
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
          <p>Please select the option that best indicates how you perceive your knowledge of User Experience (UX) Design below:</p>
          <select id="experienceLevel" class="experience-dropdown" name="experienceLevel">
            <option value="" selected disabled hidden>Click here to see the options</option>
            <option value="1">I am unaware of what UX involves and the added value it may bring.</option>
            <option value="2">I have some understanding of what UX is, but have no experience in practical application.</option>
            <option value="3">I know what UX is and have limited experience in practical application.</option>
            <option value="4">I know what UX is and have considerable experience in practical application.</option>
            <option value="5">I am known as an expert and have professional experience in practical application.</option>
          </select>
        </div>
        <!-- Informed by the NIH Proficiency Scale https://hr.nih.gov/working-nih/competencies/competencies-proficiency-scale -->

        <a id="toStudy" class="call-to-action inactive"><span>Continue to Study &nbsp;&gt;</span></a>

      </section>
      <script src="js/uid.js" charset="utf-8"></script>

    </div>
  </body>
</html>
