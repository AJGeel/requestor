<?php

echo '

<style media="screen">

  * {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
  }

  .container {
    width: 100vw;
    height: 100vh;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  img {
    filter: hue-rotate(148deg) saturate(11);
    max-width: 100%;
    height: 70%;
    z-index: -1;
    margin-top: -10em;
  }

  h2 {
    font-size: 1.3em;
    max-width: 500px;
    text-align: center;
    margin-top: -3em;
  }

  p {
    color: #3c5567;
    margin-top: 2em;
  }

  p.credit {
    display: none;
  }

  a {
    color: #357dff;
  }
</style>

<div class="container">
  <img src="i/TEMP_success-tick-dribbble.gif" alt="A checkmark that is being ticked to signal success">

  <h2>You completed all the tasks of this evaluation. Thank you very much for your help!</h2>
  <p class="credit">Original animation courtesy of <a href="https://dribbble.com/shots/5315437-Great-Success">Gavin Campbell-Wilson</a></p>
</div>

';

 ?>
