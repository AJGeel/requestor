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
    <link rel="shortcut icon" href="/i/favicon-alt.png" type="image/png" id="favicon">
    <link rel="stylesheet" href="/css/reset.min.css"> <!-- Reset browser inconsistencies -->
    <link rel="stylesheet" href="/css/style.css"> <!-- Main styling document -->
  </head>

  <body class="login">

    <section class="signin-modal">
      <a href="/index.php" class="signin-modal--logo"></a>
      <h1 class="signin-modal--header">Welcome to Requestor.</h1>
      <p class="signin-modal--subheader">We are a free service that allows you to share your Figma works-in-progress with others.</p>

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
            <input type="checkbox" name="consent" id="consent_id">
            <label for="consent_id">I agree to Requestor's <a href="#!">Terms of Use</a> and <a href="#!">Privacy Policy</a>.</label>
          </div>
        </fieldset>

        <button type="button" name="button" disabled>Create Account</button>
      </form>

    </section>

  </body>
</html>
