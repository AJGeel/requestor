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
    <link rel="stylesheet" href="/css/style.min.css">
    <link rel="stylesheet" href="/css/index.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  </head>
  <body>

    <nav>
      <div class="navbar homepage">
        <a class="nav-logo" href="/index.php">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0)"> <path d="M38.1119 12.5519C38.2451 11.8806 37.42 11.1548 36.9908 10.8759L29.4077 13.684C20.0599 12.5239 1.37635 10.7296 1.42434 12.8323C1.48433 15.4608 24.8723 34.991 26.868 35.0332C27.6883 35.0506 31.1903 29.2847 32.4293 26.7848C34.3507 27.6021 36.7716 25.9019 37.4209 23.8502C38.0059 22.0018 36.7683 19.7313 36.0522 18.7817C36.6336 16.9911 37.9787 13.2233 38.1119 12.5519Z" fill="#39574B"/> <path d="M2.7377 10.3757C15.95 9.27681 23.5939 9.16632 36.8046 10.7955C37.2077 10.8452 37.4783 11.2398 37.3713 11.6317C35.3463 19.0473 32.7602 24.1096 26.4657 33.5925C26.251 33.916 25.802 33.991 25.4938 33.7549C15.7064 26.2543 10.298 21.5531 1.40652 13.0734C1.17921 12.8566 1.12977 12.5085 1.29128 12.2391L2.21396 10.7001C2.32516 10.5146 2.5222 10.3937 2.7377 10.3757Z" fill="#6AC4A0"/> <path d="M9.76842 13.8971C17.7175 15.2718 26.4171 18.1013 34.5047 19.2154C34.661 19.2369 34.805 19.3116 34.9096 19.4297C36.2229 20.9128 37.1012 22.532 36.2247 24.3865C36.2074 24.4232 36.1853 24.4593 36.1611 24.4919C34.9146 26.1673 34.4162 26.3033 31.474 24.995C25.5044 22.3405 16.1753 18.3705 9.46622 14.7698C9.22858 14.6423 9.15016 14.3415 9.29219 14.1122C9.39263 13.9501 9.58049 13.8646 9.76842 13.8971Z" fill="#517D6C"/> </g> <defs> <clipPath id="clip0"> <rect width="40" height="40" fill="white"/> </clipPath> </defs> </svg>
          Requestor</a>
        <button class="nav-sign-in" type="button" name="button" onclick="location.href='/app/sign-in.php'">Sign In</button>
      </div>
    </nav>

    <div class="container">

      <section class="section hero">
        <div class="section--inner">
          <div class="hero--left">
            <h1>Share the designs you are working on <span class="span-emphasis">in minutes</span>.</h1>
            <p>Good design is a collaborative effort. However, making that collaboration work is difficult due to gaps in knowledge. Requestor was built to allow anyone to give meaningful design feedback.</p>
            <div class="horiz-btn-group">
              <button class="btn" type="button" name="button" onclick="scrollDn();">Learn More</button>
              <p>or</p>
              <button class="btn btn-secondary" type="button" name="button" onclick="window.open('https://requestor.nl/app/cui.php')">Try the Demo &gt;</button>
            </div>

          </div>

          <div class="hero--right">
            <img src="i/hero.png" alt="hero image">
          </div>
        </div>
      </section>

      <section class="section full-width coloured-bg" id="features">
        <div class="section--inner">
          <p class="section--summary">Features</p>
          <h2>Built to help you <span class="span-emphasis">design</span>.</h2>
          <p class="subtitle">We made Requestor to facilitate collaboration. Here are the features in place to facilitate your process:</p>

          <div class="features--block">
            <!-- Start feature -->
            <div class="feature">
              <div class="feature--icon">
                <img src="/i/feather/green/lock.png" alt="feature icon">
              </div>
              <div class="feature--text">
                <h3>Privacy by Design</h3>
                <p>We care about your privacy, which is why we don't use creepy trackers and external analytics.</p>
              </div>
            </div>
            <!-- Start feature -->
            <div class="feature">
              <div class="feature--icon">
                <img src="/i/feather/green/zap.png" alt="feature icon">
              </div>
              <div class="feature--text">
                <h3>Fast in Use</h3>
                <p>Asking for feedback should be fast. With Requestor, you can send out requests within minutes.</p>
              </div>
            </div>
            <!-- Start feature -->
            <div class="feature">
              <div class="feature--icon">
                <img src="/i/feather/green/cpu.png" alt="feature icon">
              </div>
              <div class="feature--text">
                <h3>Seamless Integration</h3>
                <p>Requestor imports designs from your favourite tools, including InVision, Figma and Adobe Xd.</p>
              </div>
            </div>
            <!-- Start feature -->
            <div class="feature">
              <div class="feature--icon">
                <img src="/i/feather/green/aperture.png" alt="feature icon">
              </div>
              <div class="feature--text">
                <h3>Automated Branding</h3>
                <p>The interface is customized to suit your brand identity. This all happens automagically, of course.</p>
              </div>
            </div>
            <!-- Start feature -->
            <div class="feature">
              <div class="feature--icon">
                <img src="/i/feather/green/message-circle.png" alt="feature icon">
              </div>
              <div class="feature--text">
                <h3>Interactive Guidance</h3>
                <p>Not everybody knows what to look for in designs. Requestor interactively helps you see the things that matter.</p>
              </div>
            </div>
            <!-- Start feature -->
            <div class="feature">
              <div class="feature--icon">
                <img src="/i/feather/green/download-cloud.png" alt="feature icon">
              </div>
              <div class="feature--text">
                <h3>No Installation Required</h3>
                <p>Requestor is a tool that fully runs in the cloud &mdash; there is no need to install any files at all!</p>
              </div>
            </div>

          </div>
        </div>

      </section>


      <section class="section side-by-side">
        <div class="section--inner side-by-side">
          <div class="side-by-side--left">
            <img src="i/requestor-features.png" alt="features">
          </div>
          <div class="side-by-side--right has-padding">
            <p class="section--summary">How-to</p>
            <h3>Get started in <span class="span-emphasis">3 steps</span>.</h3>

            <div class="steps">
              <!-- Start of a step -->
              <div class="step">
                <div class="step--left">
                  <p>01</p>
                </div>
                <div class="step--right">
                  <h4>Import your Design</h4>
                  <p>Use the 'share' option in your prototyping software to copy your link. Paste the link to your design project in the bar at the top of your dashboard.</p>
                </div>
              </div>
              <!-- Start of a step -->
              <div class="step">
                <div class="step--left">
                  <p>02</p>
                </div>
                <div class="step--right">
                  <h4>Pick your Evaluation</h4>
                  <p>Choose the focus of the evaluation: should your evaluators look at your design's usability, or is there something else you'd like to review?</p>
                </div>
              </div>
              <!-- Start of a step -->
              <div class="step">
                <div class="step--left">
                  <p>03</p>
                </div>
                <div class="step--right">
                  <h4>Share your Invites</h4>
                  <p>You'll receive a custom link for sharing, which has a friendly invitation and onboarding to help the people you share your work with get up to speed.</p>
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

      <section class="section full-width coloured-bg">
        <div class="section--inner">
          <p class="section--summary">Video</p>
          <h3>Explained in <span class="span-emphasis">90 Seconds</span>.</h3>
          <div class="video-container">
            <div><iframe src="https://player.vimeo.com/video/425870546?color=f3f9f8&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
          </div>
        </div>
      </section>

      <section class="section full-width">
        <div class="section--inner">
          <p class="section--summary">Links</p>
          <h2>Learn more about <span class="span-emphasis">Requestor</span>.</h2>
          <div class="features--block half">
            <!-- Start feature -->
            <div class="feature">
              <div class="feature--icon">
                <img src="/i/feather/green/paperclip.png" alt="feature icon">
              </div>
              <div class="feature--text">
                <h3>Academic Evaluation</h3>
                <p>Requestor is the end-result of the Master's Thesis by <a href="https://arthurgeel.com/" target="_blank">Arthur Geel</a> for the TU/e Industrial Design M.Sc. Programme. As part of the thesis, I evaluate the platform's viability for design through a multivariate experiment.</p>
                <div class="horiz-btn-group">
                  <button class="btn" type="button" name="button" onclick="window.open('https://requestor.nl/evaluation')">Read About The Evaluation Here &gt;</button>
                </div>
              </div>
            </div>
            <!-- Start feature -->
            <div class="feature">
              <div class="feature--icon">
                <img src="/i/feather/green/mouse-pointer.png" alt="feature icon">
              </div>
              <div class="feature--text">
                <h3>Interactive Demos</h3>
                <p>The prototype used in the academic evaluation is publicly accessible! Experience the prototype — put yourself in the shoes of a designer, and give feedback on a realistic case! </p>
                <div class="horiz-btn-group">
                  <button class="btn" type="button" name="button" onclick="window.open('https://requestor.nl/app/cui.php')">CUI Variant &gt;</button>
                  <p>or</p>
                  <button class="btn btn-secondary" type="button" name="button" onclick="window.open('https://requestor.nl/app/gui.php')">GUI Variant &gt;</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


    </div>

    <script src="/js/headroom.js" charset="utf-8"></script>
    <script type="text/javascript">

    const nav = document.querySelector('nav');

    let headroom = new Headroom(nav);
    headroom.init();

    function scrollDn() {
      let elem = document.getElementById('features');
      elem.scrollIntoView();
    }

    // alert(`Cool to see you here! Please note: we're still working on the site, although it's nearly done. Mobile support is coming soon. \n\n - Arthur`)

    </script>

  </body>
</html>
