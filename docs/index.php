<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Documentation</title>

    <style media="screen">

      :root {
        --page-offset: 6px;
        --page-offset-hover: 3px;
      }

      body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: "Sen", sans-serif;
        line-height: 1.5;
        background-color: #fafafa;
      }
      .wrapper {
        width: 44em;
        height: 200vh;
      }

      .article {
        transition: all .2s ease-in-out;
      }

      .article:hover {
        cursor: pointer;
        transform: translate( var(--page-offset), var(--page-offset) );
      }

      .article:hover .page:nth-child(2) {
        transform: translate( calc( 1 * var(--page-offset-hover) ) , calc( 1 * var(--page-offset-hover) ) );
      }

      .article:hover .page:nth-child(3) {
        transform: translate( calc( 2 * var(--page-offset-hover) ) , calc( 2 * var(--page-offset-hover) ) );
      }

      .article:hover .page:nth-child(4) {
        transform: translate( calc( 3 * var(--page-offset-hover) ) , calc( 3 * var(--page-offset-hover) ) );
      }

      .article img {
        max-width: 100%;
        margin: 0;
        padding: 0;
      }

      .article .page {
        border: 1px solid #119A80;
        border-radius: 1px;
        position: absolute;
        width: 210px;
        height: 297px;
        background-color: #fff;
        transition: transform .2s ease-in-out;
      }

      .article .page:nth-child(1) {
        z-index: 5;
      }

      .article .page:nth-child(2) {
        z-index: 4;
        transform: translate( calc( 1 * var(--page-offset) ) , calc( 1 * var(--page-offset) ) );
      }

      .article .page:nth-child(3) {
        z-index: 3;
        transform: translate( calc( 2 * var(--page-offset) ) , calc( 2 * var(--page-offset) ) );
      }

      .article .page:nth-child(4) {
        z-index: 2;
        transform: translate( calc( 3 * var(--page-offset) ) , calc( 3 * var(--page-offset) ) );
      }
    </style>
  </head>
  <body>

    <div class="wrapper">
      <h1>Documentation</h1>
      <p>Requestor was built with an academic and user-centered mind-set, and is consequently based on desk research and user tests. On this page, you'll find the the documents with findings and insights that I compiled in the design process of creating Requestor.</p>

      <section class="literature-rows">
        <article class="article"><img class="page" src="https://placehold.it/210x297" alt="placeholder"><div class="page"></div><div class="page"></div><div class="page"></div></article>
        <article class="article"><img class="page" src="https://placehold.it/210x297" alt="placeholder"><div class="page"></div><div class="page"></div><div class="page"></div></article>
        <article class="article"><img class="page" src="https://placehold.it/210x297" alt="placeholder"><div class="page"></div><div class="page"></div><div class="page"></div></article>

      </section>

    </div>

  </body>
</html>
