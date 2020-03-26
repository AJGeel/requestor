<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>Requestor Better Multidisciplinary Collaboration in UX Work</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/favicon.png" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->

    <style media="screen">

      html {
        /* scroll-behavior: smooth; */
        font-family: "BentonSans", "Ubuntu", sans-serif;
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
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .container {
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
      }

      img {
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
        align-items: center;
      }

      .sitemap ul li:last-child {
        margin-bottom: 0;
      }

      .sitemap ul span {
        color: #666;
        font-size: .7em;
        margin-left: 1em;
      }

      .sitemap ul span:last-child {
        color: hsl(165, 100%, 30%);
      }

      .sitemap p {
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

      /* .features-grid .cell:nth-child(n+4) {
        border-bottom: 1px solid #333;
      }

      .features-grid .cell:nth-child(3n) {
        border-right: 1px solid #333;
      } */

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
        font-weight: 500;
        color: #333;
        margin-bottom: .5em;
      }

      .features-grid .cell p {
        color: #333;
      }
    </style>

  </head>
  <body>

    <div class="container">
      <h1>Requestor &mdash; Better Multidisciplinary Collaboration in UX Work</h1>
      <p>Requestor is a web-based tool that enables UX Designers to more easily share their works-in-progress with their (Non UX-designer) colleagues, and provide them with actionable instructions in order to provide feedback. <a target="_blank" href="https://figma.com/">Interactive Figma prototypes</a> can easily be embedded in the tool, and shared alongside the information and instructions to evaluate it. </p>
      <!-- <p>The purpose of this project is to help address problems related to <a target="_blank" href="https://scholar.google.com/scholar?hl=en&as_sdt=0,5&q=ux+maturity">UX Maturity</a> in business by providing industry workers with the tools and the lens required to understand the role of UX.</p> -->
      <img src="/i/concept-overview.jpg" alt="Mock-up image of the concept overview">

      <div class="features">
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

      </div>

      <h2>Project Status &amp; Sitemap</h2>
      <p>Requestor is a tool still in development, and is expected to see its first full release in May, 2020. Requestor's source code is regularly pushed to this <a target="_blank" href="https://github.com/AJGeel/requestor">Github Repository</a>.</p>
      <p>For an early preview of the tool and its pages, please check out the <a href="#sitemap">sitemap</a> below. The links can be clicked to preview functionalities of the tool.</p>

      <div class="sitemap" id="sitemap">
        <p>Sitemap Version 'Pre-Alpha' &mdash; 2020/03/26</p>
        <ul><li><a href="#!">Landing Page</a><span>(Current page. What is Requestor, Why did we create it, How does it work, Sign-up)</span><span>In-progress</span></li></ul>
        <ul>
          <li><a href="/app/">Application</a><span>&nbsp;</span></li>
          <ul><li><a href="/app/">Dashboard</a><span>(Manage active projects. Access/Create/Edit Prototypes.  Requires login to access)</span><span>In-progress</span></li></ul>
          <ul><li><a href="/app/p">Prototype</a><span>(Embedded prototype with side-evaluation form. Requires URL to access)</span><span>V1 MVP</span></li></ul>
          <ul><li><a href="/app/reports">Reports</a><span>(Report screen of evaluation results. Requires login to access)</span><span>In-progress</span></li></ul>
        </ul>
        <ul><li><a href="/terms-and-conditions/">Terms and Conditions</a><span>(Legal agreement between user and provider)</span><span>V1 MVP</span></li></ul>
        <ul><li><a href="/privacy-policy/">Privacy Policy</a><span>(GDPR: explains how we handle privacy)</span><span>V1 MVP</span></li></ul>
        <ul><li><a href="/profile/">Profile</a><span>In-progress</span></li></ul>

      </div>

    </div>

  </body>
</html>
