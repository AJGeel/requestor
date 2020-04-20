<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sample grid</title>

    <style media="screen">
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      grid-gap: 10px;
      padding: 2em;
      }

      .grid .item {
        border: 1px solid red;
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Sen', sans-serif;
      }
    </style>
  </head>
  <body>

    <div class="grid">
      <div class="item">Product 1</div>
      <div class="item">Product 2</div>
      <div class="item">Product 3</div>
      <div class="item">Product 4</div>
      <div class="item">Product 5</div>
      <div class="item">Product 6</div>
    </div>

  </body>
</html>
