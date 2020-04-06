<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>Requestor &mdash; Sign In</title>
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
      <h1 class="signin-modal--header">Welcome back to Requestor.</h1>
      <p class="signin-modal--subheader">New here? <a href="create-account.php">Create an account</a>.</p>

      <form class="signin-modal--form">
        <fieldset>
          <label for="email">Email</label>
          <input type="email" name="email">
        </fieldset>

        <fieldset>
          <div class="signin-modal--dual-label">
            <label for="password">Password</label>
            <a href="#!" onclick="alert('This button will support password recovery in the future. \n\nFor now however, just send me an email at hello@arthurgeel.com and I will resolve your lost password situation.')">Forgot your password?</a>
          </div>
          <input type="password" name="password">
        </fieldset>

        <button type="button" name="button">Sign In</button>
      </form>

    </section>

  </body>
</html>
