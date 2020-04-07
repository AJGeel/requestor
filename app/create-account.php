<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>Requestor &mdash; Create An Account</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="/css/style.css"> <!-- Main styling document -->
  </head>

  <body class="login">

    <nav>
      <div class="navbar sign">
        <a class="nav-logo" href="/index.php">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0)"> <path d="M38.1119 12.5519C38.2451 11.8806 37.42 11.1548 36.9908 10.8759L29.4077 13.684C20.0599 12.5239 1.37635 10.7296 1.42434 12.8323C1.48433 15.4608 24.8723 34.991 26.868 35.0332C27.6883 35.0506 31.1903 29.2847 32.4293 26.7848C34.3507 27.6021 36.7716 25.9019 37.4209 23.8502C38.0059 22.0018 36.7683 19.7313 36.0522 18.7817C36.6336 16.9911 37.9787 13.2233 38.1119 12.5519Z" fill="#39574B"/> <path d="M2.7377 10.3757C15.95 9.27681 23.5939 9.16632 36.8046 10.7955C37.2077 10.8452 37.4783 11.2398 37.3713 11.6317C35.3463 19.0473 32.7602 24.1096 26.4657 33.5925C26.251 33.916 25.802 33.991 25.4938 33.7549C15.7064 26.2543 10.298 21.5531 1.40652 13.0734C1.17921 12.8566 1.12977 12.5085 1.29128 12.2391L2.21396 10.7001C2.32516 10.5146 2.5222 10.3937 2.7377 10.3757Z" fill="#6AC4A0"/> <path d="M9.76842 13.8971C17.7175 15.2718 26.4171 18.1013 34.5047 19.2154C34.661 19.2369 34.805 19.3116 34.9096 19.4297C36.2229 20.9128 37.1012 22.532 36.2247 24.3865C36.2074 24.4232 36.1853 24.4593 36.1611 24.4919C34.9146 26.1673 34.4162 26.3033 31.474 24.995C25.5044 22.3405 16.1753 18.3705 9.46622 14.7698C9.22858 14.6423 9.15016 14.3415 9.29219 14.1122C9.39263 13.9501 9.58049 13.8646 9.76842 13.8971Z" fill="#517D6C"/> </g> <defs> <clipPath id="clip0"> <rect width="40" height="40" fill="white"/> </clipPath> </defs> </svg>
          Requestor</a>
      </div>
    </nav>

    <section class="signin-modal">
      <!-- <a href="/index.php" class="signin-modal--logo">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0)"> <path d="M38.1119 12.5519C38.2451 11.8806 37.42 11.1548 36.9908 10.8759L29.4077 13.684C20.0599 12.5239 1.37635 10.7296 1.42434 12.8323C1.48433 15.4608 24.8723 34.991 26.868 35.0332C27.6883 35.0506 31.1903 29.2847 32.4293 26.7848C34.3507 27.6021 36.7716 25.9019 37.4209 23.8502C38.0059 22.0018 36.7683 19.7313 36.0522 18.7817C36.6336 16.9911 37.9787 13.2233 38.1119 12.5519Z" fill="#39574B"/> <path d="M2.7377 10.3757C15.95 9.27681 23.5939 9.16632 36.8046 10.7955C37.2077 10.8452 37.4783 11.2398 37.3713 11.6317C35.3463 19.0473 32.7602 24.1096 26.4657 33.5925C26.251 33.916 25.802 33.991 25.4938 33.7549C15.7064 26.2543 10.298 21.5531 1.40652 13.0734C1.17921 12.8566 1.12977 12.5085 1.29128 12.2391L2.21396 10.7001C2.32516 10.5146 2.5222 10.3937 2.7377 10.3757Z" fill="#6AC4A0"/> <path d="M9.76842 13.8971C17.7175 15.2718 26.4171 18.1013 34.5047 19.2154C34.661 19.2369 34.805 19.3116 34.9096 19.4297C36.2229 20.9128 37.1012 22.532 36.2247 24.3865C36.2074 24.4232 36.1853 24.4593 36.1611 24.4919C34.9146 26.1673 34.4162 26.3033 31.474 24.995C25.5044 22.3405 16.1753 18.3705 9.46622 14.7698C9.22858 14.6423 9.15016 14.3415 9.29219 14.1122C9.39263 13.9501 9.58049 13.8646 9.76842 13.8971Z" fill="#517D6C"/> </g> <defs> <clipPath id="clip0"> <rect width="40" height="40" fill="white"/> </clipPath> </defs> </svg>
      </a> -->
      <h1 class="signin-modal--header">Welcome to Requestor.</h1>
      <div class="signin-modal--row">
        <!-- <img src="/i/feather/info.svg" alt="notification icon"> -->
        <p class="signin-modal--subheader smaller">We ask you to create an account to help you keep track of the requests you send. Don't worry &mdash; our service is free, and we don't sell your user data.</p>
      </div>

      <form class="signin-modal--form">
        <fieldset>
          <div class="signin-modal--dual-label">
            <label for="email">Email</label>
            <a href="sign-in.php">Already have an account?</a>
          </div>
          <input type="email" name="email">
        </fieldset>

        <fieldset>
          <label for="password">Password</label>
          <input type="password" name="password">
        </fieldset>

        <fieldset> <!-- TODO: implement JS eventlistener: consent enables button. No consent disables button -->
          <div class="signin-modal--checkbox">
            <input type="checkbox" name="consent" id="checkbox_consent">
            <label for="checkbox_consent">I agree to Requestor's <a href="/terms-and-conditions/" target="_blank">Terms of Use</a> and <a href="/privacy-policy/">Privacy Policy</a>.</label>
          </div>
        </fieldset>

        <button type="button" name="button" id="btn_create_account" disabled onclick="location.href='/app/index.php'">Create Account</button>
      </form>

    </section>

  </body>

  <script type="text/javascript">

  const checkbox_consent = document.getElementById("checkbox_consent");
  const btn_create_account = document.getElementById("btn_create_account");

  checkbox_consent.addEventListener( 'change', function() {
      if (this.checked) {
        // Checkbox is checked --> enable button.
        btn_create_account.disabled = false;
      } else {
        // Checkbox is unchecked --> disable button.
        btn_create_account.disabled = true;
      }
  });

  </script>
</html>
