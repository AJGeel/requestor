<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>Requestor &mdash; The Online Platform to Easily Share UX Works-in-Progress</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <style media="screen">

      html {
        /* scroll-behavior: smooth; */
        /* font-family: "BentonSans", "Ubuntu", sans-serif; */
      }

      :root {
        --main-30: hsla(165, 100%, 30%, 1);
        --main-20: hsla(165, 100%, 20%, 1);
        --main-10: hsla(165, 100%, 10%, 1);
        --main-selection: hsla(165, 80%, 50%, .1);
      }

      ::selection {
        background: var(--main-selection);
      }

      body {
        /* display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center; */
      }

      .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 4em auto;

        max-width: 54em;
        padding: 4em 0;

        animation: fadeInBottom .8s ease-in-out;
      }

      h1 {
        font-size: 2.5em;
        font-weight: 600;
        color: #333;
        margin-bottom: 1em;
        line-height: 120%;
        padding: 0 1.5em;
      }

      h2 {
        font-size: 1.5em;
        font-weight: 600;
        color: #333;
        margin-bottom: 1em;
        padding: 0 2.7em;
      }

      p {
        line-height: 150%;
        margin-bottom: 1em;
        color: #555;
        padding: 0 4em;
        width: 100%;
      }

      p b {
        font-weight: bold;
      }

      ul {
        width: 100%;
        padding: 0 4em
      }

      sup {
        vertical-align: super;
        font-size: smaller;
      }

      .container img {
        max-width: 100%;
        margin: 4em 0;
        border-radius: 4px;
      }

      a {
        color: hsl(165, 100%, 30%);
        transition: color .2s ease-in-out;
      }

      a:hover {
        color: hsl(165, 100%, 15%);
      }

      .sitemap {
        width: 100%;
        padding: 4em;
        border-radius: 4px;
        /* margin: 5em 0; */
      }

      .sitemap ul {
        padding: 1em;
        transition: background-color .2s ease-in-out, border .2s ease-in-out, padding-left .2s ease-in-out;
        background-color: hsla(165, 100%, 30%, .1);
        margin-bottom: 1em;
        border-radius: 4px;
        border: 1px solid hsla(165, 100%, 30%, 0);
      }

      .sitemap ul:last-child {
        margin-bottom: 0;
      }

      .sitemap ul:hover {
        background-color: hsla(165, 100%, 30%, .15);
        border: 1px solid hsla(165, 100%, 30%, 1);
        padding-left: 2em;
      }

      .sitemap ul li {
        margin-bottom: 1em;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
      }

      .sitemap ul li:last-child {
        margin-bottom: 0;
      }

      .sitemap ul span {
        color: #666;
        font-size: .7em;
        margin-top: .5em;
      }

      .sitemap ul span::before {
        content: 'Contains: ';
      }

      .sitemap ul span:last-child {
        color: hsl(165, 100%, 30%);
      }

      .sitemap ul span:last-child::before {
        content: 'Status: ';
        color: hsl(165, 100%, 30%);
      }

      .sitemap h3 {
        padding: 0;
        font-weight: 600;
        color: hsl(165, 100%, 30%);
        border-top: 1px solid hsl(165, 100%, 30%);
        padding: 2em 0;
        margin: 0;
      }

      @keyframes fadeInBottom {
        from {
          transform: translateY(3em);
          opacity: 0;
          filter: blur(5px);
        }

        to {
          transform: translateY(0em);
          opacity: 1;
          filter: blur(0px);
        }
      }

      .features {
        margin-bottom: 4em;
      }

      .features h2 {
        text-align: center;
      }

      .features-grid {
        display: flex;
        flex-wrap: wrap;
        max-width: 100%;
      }

      .features-grid .cell {
        border: 1px solid #ddd;
        width: calc((100% / 3) - 2em);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding: 1em;
        margin: 1em;
        border-radius: 4px;

        transition: background-color .2s ease-in-out, transform .2s ease-in-out, box-shadow .2s ease-in-out, border .2s ease-in-out;
      }

      .features-grid .cell:hover {
        background-color: var(--main-selection);
        transform: translateY(-.25em);
        box-shadow: 0px 10px 20px rgba(0,0,0,.1);
      }

      .features-grid .cell:active {
        transform: translateY(0);
        box-shadow: 0px 0px 5px rgba(0,0,0,.1);
        background-color: #fff;
        border: 1px solid transparent;
      }

      .features-grid .cell img {
        margin: 0;
        width: 2em;
        height: 2em;
        margin-bottom: 1em;
      }

      .features-grid .cell h3, .features-grid .cell p {
        text-align: center;
        padding: 0;
        margin: 0;
      }

      .features-grid .cell h3 {
        color: #333;
        margin-bottom: .5em;
      }

      .features-grid .cell p {
        color: #666;
      }

      .button-collection {
        display: flex;
        width: calc(100% - 8em);
        margin-top: 2em;
        padding: 2em;
        background-color: #f0f5f4;
      }

      .button-collection button {
        width: 50%;
        margin: 0 1em;
      }
    </style>

  </head>
  <body>

    <nav>
      <div class="navbar homepage">
        <a class="nav-logo" href="/index.php">
          <!-- <div class="navbar--logo"></div> -->
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0)"> <path d="M38.1119 12.5519C38.2451 11.8806 37.42 11.1548 36.9908 10.8759L29.4077 13.684C20.0599 12.5239 1.37635 10.7296 1.42434 12.8323C1.48433 15.4608 24.8723 34.991 26.868 35.0332C27.6883 35.0506 31.1903 29.2847 32.4293 26.7848C34.3507 27.6021 36.7716 25.9019 37.4209 23.8502C38.0059 22.0018 36.7683 19.7313 36.0522 18.7817C36.6336 16.9911 37.9787 13.2233 38.1119 12.5519Z" fill="#39574B"/> <path d="M2.7377 10.3757C15.95 9.27681 23.5939 9.16632 36.8046 10.7955C37.2077 10.8452 37.4783 11.2398 37.3713 11.6317C35.3463 19.0473 32.7602 24.1096 26.4657 33.5925C26.251 33.916 25.802 33.991 25.4938 33.7549C15.7064 26.2543 10.298 21.5531 1.40652 13.0734C1.17921 12.8566 1.12977 12.5085 1.29128 12.2391L2.21396 10.7001C2.32516 10.5146 2.5222 10.3937 2.7377 10.3757Z" fill="#6AC4A0"/> <path d="M9.76842 13.8971C17.7175 15.2718 26.4171 18.1013 34.5047 19.2154C34.661 19.2369 34.805 19.3116 34.9096 19.4297C36.2229 20.9128 37.1012 22.532 36.2247 24.3865C36.2074 24.4232 36.1853 24.4593 36.1611 24.4919C34.9146 26.1673 34.4162 26.3033 31.474 24.995C25.5044 22.3405 16.1753 18.3705 9.46622 14.7698C9.22858 14.6423 9.15016 14.3415 9.29219 14.1122C9.39263 13.9501 9.58049 13.8646 9.76842 13.8971Z" fill="#517D6C"/> </g> <defs> <clipPath id="clip0"> <rect width="40" height="40" fill="white"/> </clipPath> </defs> </svg>
          Requestor</a>
        <button class="nav-sign-in" type="button" name="button" onclick="location.href='/app/sign-in.php'">Sign In</button>
      </div>
    </nav>

    <div class="container">
      <h1>Requestor &mdash; The Online Platform to Easily Share UX Works-in-Progress</h1>
      <p>Requestor is a web-based tool that facilitates collaboration and interation by simplifying the process of evaluating design work. Requestor integrates with popular prototyping tools to enable you to share your work faster. The work you share is provided with actionable instructions that empower anyone to give meaningful feedback.</p>
      <img src="/i/concept-overview.jpg" alt="Mock-up image of the concept overview">

      <!-- <div class="features">
        <h2>All of Requestor's Features</h2>
        <div class="features-grid">
          <div class="cell">
            <img src="/i/feather/image.svg" alt="placeholder icon">
            <h3>Ready in 5 minutes</h3>
            <p>Lorem ipsum dolor sit amet, set nunc est potandum.</p>
          </div>
          <div class="cell">
            <img src="/i/feather/image.svg" alt="placeholder icon">
            <h3>Unique Selling Point</h3>
            <p>Lorem ipsum dolor sit amet, set nunc est potandum.</p>
          </div>
          <div class="cell">
            <img src="/i/feather/image.svg" alt="placeholder icon">
            <h3>Unique Selling Point</h3>
            <p>Lorem ipsum dolor sit amet, set nunc est potandum.</p>
          </div>
          <div class="cell">
            <img src="/i/feather/image.svg" alt="placeholder icon">
            <h3>Unique Selling Point</h3>
            <p>Lorem ipsum dolor sit amet, set nunc est potandum.</p>
          </div>
          <div class="cell">
            <img src="/i/feather/image.svg" alt="placeholder icon">
            <h3>Unique Selling Point</h3>
            <p>Lorem ipsum dolor sit amet, set nunc est potandum.</p>
          </div>
          <div class="cell">
            <img src="/i/feather/image.svg" alt="placeholder icon">
            <h3>Unique Selling Point</h3>
            <p>Lorem ipsum dolor sit amet, set nunc est potandum.</p>
          </div>
        </div>

      </div> -->

      <h2>Site under construction</h2>
      <p>Thank you for your interest in this project. At the moment, we are working hard to analyse the data produced in the evaluation study. For this reason, we cannot publish these yet. We expect to publish the preliminary results by <b>Friday, June 5<sup>th</sup></b>.</p>
      <p>If you were looking for an interactive demonstration of this project, you're in luck! Feel free to use either of the buttons below to get started.</p>

      <div class="button-collection">
        <button class="nav-sign-in" type="button" name="button" onclick="location.href='/app/cui.php'">Conversational User Interface</button>
        <button class="nav-sign-in" type="button" name="button" onclick="location.href='/app/gui.php'">Traditional User Interface</button>
      </div>

      <!-- <h2>Project Status &amp; Sitemap</h2>
      <p>Requestor is a tool still in development, and is expected to see its first full release in May, 2020. Requestor's source code is regularly pushed to this <a target="_blank" href="https://github.com/AJGeel/requestor">Github Repository</a>.</p>
      <p>For an early preview of the tool and its pages, please check out the <a href="#sitemap">sitemap</a> below. The links can be clicked to preview functionalities of the tool.</p>

      <div class="sitemap" id="sitemap">
        <h3>Sitemap Version 'Pre-Alpha' &mdash; 2020/04/06</h3>
        <ul><li><a href="#!">Landing Page</a><span>(Current page. What is Requestor, Why did we create it, How does it work, Sign-up)</span><span>In-progress</span></li></ul>
        <ul>
          <li><a href="/app/">Application</a><span>(Demonstrator part of the project)</span><span>In-progress</span></li>
          <ul><li><a href="/app/dashboard.php">Dashboard</a><span>(Manage active projects. Access/Create/Edit Prototypes.  Requires login to access)</span><span>In-progress</span></li></ul>
          <ul><li><a href="/app/r">Prototype</a><span>(Embedded prototype with side-evaluation form. Requires URL to access)</span><span>V1 MVP 🎉</span></li></ul>
          <ul><li><a href="/app/reports">Reports</a><span>(Report screen of evaluation results. Requires login to access)</span><span>In-progress</span></li></ul>
          <ul><li><a href="/app/profile/">Profile Page</a><span>(Profile page, settings, disable account)</span><span>In-progress</span></li></ul>
          <ul><li><a href="/app/create-account.php">Create Account</a><span>(Form to create account, links to ToC and Privacy Policy)</span><span>V1 MVP 🎉</span></li></ul>
          <ul><li><a href="/app/sign-in.php">Sign In</a><span>(Form to sign in, link to recover password)</span><span>V1 MVP 🎉</span></li></ul>
        </ul>
        <ul><li><a href="/terms-and-conditions/">Terms and Conditions</a><span>(Legal agreement between user and provider)</span><span>In-progress</span></li></ul>
        <ul><li><a href="/privacy-policy/">Privacy Policy</a><span>(GDPR: explains how we handle privacy)</span><span>V1 MVP 🎉</span></li></ul>

      </div> -->

    </div>

    <script src="/js/headroom.js" charset="utf-8"></script>
    <script type="text/javascript">

    const nav = document.querySelector('nav');

    let headroom = new Headroom(nav);
    headroom.init();

    </script>

  </body>
</html>
