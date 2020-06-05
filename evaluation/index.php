<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Requestor &mdash; The Online Platform to Easily Share UX Works-in-Progress</title>
    <meta name="description" content="Requestor enables digital creators to collaborate on design prototypes, and provide actionable feedback.">
    <meta name="author" content="Arthur Geel, hello@arthurgeel.com">
    <meta name="color-scheme" content="light dark">

    <!-- Links and CSS -->
    <link rel="shortcut icon" href="/i/requestor.svg" type="image/png" id="favicon">
    <link rel="stylesheet" href="https://latex.now.sh/style.min.css" />
    <style media="screen">
      a, a:visited {
        color: hsla(165, 100%, 26%, 1);
        /* transition: color .1s ease-in-out; */
      }

      a:hover {
        color: #000;
        text-decoration: none;
      }

      /* .external-link::after {
        content: url('/i/feather/green/external-link.png');
      } */

      .note {
        background-color: #fff;
        background: linear-gradient(125deg, hsl(170, 33%, 96%), hsl(170, 40%, 90%));
        padding: 2em;
        box-shadow: 0 2px 12px rgba(0,153,114,.4);
        margin: 4em 2em;
        border-radius: 4px;
      }

      .author {
        font-variant-caps: normal;
      }

      .center-1 tr > td:nth-child(1) {
        text-align: center;
      }

      .center-3 tr > td:nth-child(3) {
        text-align: center;
      }

      .em-2 tr > td:nth-child(2) {
        font-style: italic;
      }

      tr {
        transition: background-color: .1s ease-in-out;
      }

      tr:hover {
        background-color: #fff;
      }

      .time-table samp {
        font-weight: bold;
      }

      .time-table tr > td {
        font-family: monospace;
      }
    </style>

  </head>
  <body>

    <body id="top">
  <header>
    <h1>Requestor &mdash; The Online Platform to Easily Share Works-in-Progress</h1>
    <p class="author">
      A.J. Geel <br />
      Eindhoven University of Technology<br />
      Department of Industrial Design<br />
      Utrecht, the Netherlands<br />
      June 2020
    </p>
  </header>

  <div class="abstract">
    <h2>Abstract</h2>
    We see an increasing industry interest in User Experience (UX) Design for its potential Return on Investments. However, the process of UX Design requires understanding and involvement by the environment — if these are absent, the process can be disrupted. This project is guided by the question: <em>"How may we create a better collaborative space for UX Designers and their environment?"</em><br/><br/>
    Requestor is an online platform that makes sharing UX works-in-progress fast and easy. The platform allows you to import interactive prototypes from Figma, Adobe Xd and InVision within minutes, ready to share. Projects shared through Requestor contain interactive guidance to enable anyone to give meaningful design feedback. Various design evaluation frameworks can be included to ensure you get the feedback you need. Requestor is currently being evaluated in an ongoing study to learn more about its viability as a tool for design.<br/><br/>
  </div>

  <nav role="navigation" class="toc">
    <h3>Contents</h3>
    <ol>
      <!-- <li>
        <a href="#Project-Context">Project Context</a>
        <ol>
          <li><a href="#Rise-of-UX">The Rise of UX Design</a></li>
          <li><a href="#Current-Challenges">Current Challenges in UX</a></li>
          <li><a href="#Design-Concept">Design Concept</a></li>
        </ol>
      </li> -->
      <li>
        <a href="#Study-Setup">Study Setup</a>
        <ol>
          <li><a href="#Overall-Setup">Overall Setup</a></li>
          <li><a href="#Sample-Design-Case">Fictional Design Case</a></li>
          <li>
            <a href="#Prototype-Variants">Prototype Overview and Variants</a>
            <ol>
              <li><a href="#Traditional-UI">Variant A: Traditional UI</a></li>
              <li><a href="#Conversational-UI">Variant B: Conversational UI</a></li>
            </ol>
          </li>
          <li><a href="#Post-Test-Questionnaire">Post-Test Questionnaire</a></li>
        </ol>
      </li>
      <li>
        <a href="#Results">Results</a>
        <ol>
          <li><a href="#Participant-Overview">Participant Overview</a></li>
          <li><a href="#Time-Related-Performance">Time-Related Performance</a></li>
          <li><a href="#Perceived-Task-Load-Index">Perceived Task Load</a></li>
          <li><a href="#Repeated-Participation">Attitude Towards Repeated Participation</a></li>
        </ol>
      </li>
      <li><a href="#Analysis">Analysis</a></li>
      <li><a href="#Conclusion">Conclusion</a></li>
      <!-- <li>
        <a href="#class-based-elements">Class-based Elements</a>
        <ol>
          <li><a href="#author-abstract">Author and Abstract</a></li>
          <li>
            <a href="#tdpl">Theorems, Definitions and Proofs</a>
            <ol>
              <li><a href="#proofs-theorems">Proofs & Theorems</a></li>
              <li><a href="#lemmas">Lemmas</a></li>
              <li><a href="#definitions">Definitions</a></li>
            </ol>
          </li>
        </ol>
      </li> -->
    </ol>
  </nav>

  <main>
    <article>
      <!-- <h2 id="Project-Context">Project Context</h2>

      <h3 id="Rise-of-UX">The Rise of UX Design</h3>
      <p>The increasing importance of computers and the internet in our daily lives has resulted in a discipline that specialises in designing for this context, known as User Experience (UX) Design. UX Design is characterized by its process which integrates research, ideation and prototyping to create a product, system or service that creates meaningful and relevant experiences for its end- user. Often, UX Design goes hand in hand with Design Thinking [4] due to the similarity of their natures [15].</p>
      <p>An emphasis on UX Design during product development processes is known to increase business success: Returns on Investments are achieved through a reduction in costs for critical areas such as development time [8, 29], maintenance [28] and providing user support [6], while increases are seen in areas such as user adoption, user satisfaction, revenue growth and productivity [27, 28]. However, for these benefits to surface, a degree of understanding and involvement in UX by enterprise is required [18].</p>

      <h3 id="Current-Challenges">Current Challenges in UX</h3>
      <p>As the awareness on the impact that UX has on business has grown significantly over the past decade, so has the demand for UX Designers [5]. The introduction of a new discipline came with its challenges, as there is ambiguity about what UX Design actually is and how it impacts the industry workflows [18]. For example, while the Design Thinking framework [4] has five main stages (empathising, defining, ideating, prototyping, testing), the enterprise commonly misconceives designers to merely conceptualize and create the designs (i.e. ideating & prototyping), failing to recognize that this progression is facilitated by the other Design Thinking stages. This misunderstanding brings forth organisational challenges that result in imbalanced design processes with shortened phases and misaligned priorities, ultimately impacting the UX Designer’s ability to perform [8, 27, 28]</p>
      <p>This (lack of) understanding with respect to UX Design and UX Designers was recognised by Nielsen in 1996, who defined eight stages of Corporate UX Maturity, ranging from ‘hostility towards usability’ to a ‘user-driven corporation’ [21, 22]. Beyond descriptions of these stages, Nielsen offers advice on how to improve Corporate UX Maturity. More recently, others have built upon this work to create robust models to measure and improve UX Maturity in an effort to help the industry adapt to this new discipline [7, 26, 19].</p>
      <p>However, recent industry surveys demonstrate that the problems outlined by Nielsen in 1996 are still prevalent. A recent survey among over 3,000 designers saw professionals tie their top challenges to UX Maturity [34]: challenges included improving UX consistency (59%); testing designs with end-users (53%); securing UX budget or resources (40%) and getting buy-in or understandingfrom executives (38%). Furthermore, the 2019 edition of an annual UX Designer survey saw similar results [33]: prevailing challenges were including research within the product development process (64%); sourcing the right participants (50%), securing resources or budget (49%) and getting executive buy-in about UX research (49%).</p>
      <p>Even though some challenges are becoming less pressing, (the challenge of securing resources or budget decreased from 60% to 49% over the past year [32, 33] ) it is evident that the challenges resulting from low UX Maturity will continue to impact the industry for the foreseeable future, especially when one realizes that new in-house UX teams are on the rise [19], increasing the amount of environments where UX is newly introduced.</p>
      <p>In summary, the problem identified in the section above is the following:</p>
      <ul>
        <li><em>User Experience Designers working in corporate enterprises are inhibited in their ability to perform well due to challenges stemming from low UX Maturity.</em></p></li>
      </ul>

      <h3 id="Design-Concept">Design Concept</h3>
      <p>Text to be added later.</p> -->

      <!-- Start Chapter -->
      <h2 id="Overview">1 Study Setup</h2>
      <h3 id="Overall-Setup">1.1 Overall Setup</h3>
      <p>The aims for this study are bifold: firstly, we seek to evaluate the <em>viability</em> of the Requestor platform as a tool for design. Secondly, we seek to explore the <em>effects</em> that User Interfaces (UIs) with <em>different styles of interactions</em> have on a person's <em>ability to perform an evaluation</em> of a design prototype.</p>
      <p>In order to progress towards these aims, a study was designed that contains a realistic design case which would be evaluated by eventual participants. For this evaluation, the users made use of the <em>Requestor</em> tool to support them in this. In this experiment, the tool was developed to keep track of performance-related stats of participants. After the participants had completed the sample design case, they were asked to complete a questionnaire on their perceived task load.</p>
      <p>To summarise, this study consisted participants taking part in an unmoderated session that consisted of two activities:</p>
      <ol>
        <li>Conducting <em>heuristic evaluation</em> of a fictional design case, using one out of two variants of the <em>Requestor</em> prototype.</li>
        <li>Completing a <em>post-task questionnaire</em> to evaluate the work load (NASA-TLX) they perceived for the prototype variant used.</li>
      </ol>

      <h3 id="Sample-Design-Case">1.2 Fictional Design Case</h3>
      <p>The design case that was selected for this study was a fictional case involving <em>the Dutch Government</em> and their website <em>Government.nl</em>. In this sample case, the participants were asked to perform a <em>Heuristic Evaluation</em> of the website's usability. In the tumultuous time of a pandemic, this website is important to find reliable official information on pressing issues and their legislation, which made it an interesting case for this project.</p>
      <p>As part of the design case, the participants were asked to empathise with a fictional end-user, and carry out a number of tasks from their perspective. The scenario is as follows — the participants were asked to empathise with Frederic: a 44 year old expat living in the Eindhoven area. As the owner of a business without employees (ZZP), the uncertain times caused by the Corona Crisis have put a strain on his financial situation. Frederic recalled that the Government discussed measures for financial support in a press conference, but was unsure what that exactly implied for him. In this scenario, Frederic had the goal to use the Government.nl website to find <em>reliable information</em> on the financial support offered by the government.</p>
      <p>For this scenario, screenshots of the original Government.nl website were scraped and imported into the Figma prototyping tool. An expert review of the website found that there were little to no usability issues in this website. This is no surprise, seeing as the Government's goal for the website is to provide online information that is user-friendly and accessible to all types of visitors.</p>
      <p>For that reason, the screenshots were adjusted to introduce a number of usability issues. Examples of these issues were related to <em>low contrast</em>, <em>unpredictable website behaviour</em> and poorly suited <em>copywriting</em>.</p>

      <figure>
        <img src="i/government-website.png" loading="lazy" alt="Government Website" width="600" height="400">
        <figcaption><b>Figure 1:</b> The edited <a href="https://government.nl" target="_blank">Government.nl</a> design case for this study. The edited version can be accessed through <a class="external-link" href="https://www.figma.com/proto/DYhe8z0n3I6fEFmD7PyJCa/Government.nl-Design-Case?node-id=27%3A43&scaling=scale-down-width&viewport=-80%2C198%2C0.2307339608669281&hotspot-hints=0&hide-ui=1" target="_blank">this link</a>.</figcaption>
      </figure>

      <h3 id="Prototype-Variants">1.3 Prototype Overview and Variants</h3>
      <p>The participants were asked to use the custom built Requestor tool to help them perform this evaluation. In its essence, Requestor does two things:</p>
      <ol>
        <li>It displays an <em>interactive demonstrator</em> of the design project on the left. Users of the tool can use their mouse to scroll and click to browse the project as if it were a fully operational website.</li>
        <li>An interactive module that is used to <em>provide onboarding</em> for the evaluators is displayed on the right. This interactive module guides the evaluators through the process of conducting a design evaluation, and contains questions the evaluators can answer to assess the design project on the left.</li>
      </ol>

      <figure id="Figure-2">
        <img src="i/requestor-gui.png" loading="lazy" alt="Requestor GUI" width="600" height="600">
        <figcaption><b>Figure 2:</b> An overview of the Requestor tool. We can see the two modules: the interactive embedded prototype on the left, and the module used to conduct the evaluation on the right. This variant of the User Interface can be accessed by clicking on <a class="external-link" href="https://requestor.nl/app/gui.php" target="_blank">this link</a>.</figcaption>
      </figure>

      <p>From feedback gathered during the iterative, user-centered design process of this platform, we found that key factors for the tool to succeed were:</p>
      <ol>
        <li><em>Its ability to motivate</em> evaluators to take part in evaluations of this kind;</li>
        <li><em>Its ability to enable</em> evaluators of varying levels of expertise to succesfully conduct the design evaluation.</p></li>
      </ol>

      <p>After reviewing design trends on user interfaces that seek to accomplish these qualities for different use cases, we found two potential <em>interaction styles</em> that fit in the context of this project. The modular approach taken in the design of the platform meant that it was easy to implement variations in the 'interactive evaluation module' without requiring a considerable investment in development time.</p>

      <h4 id="Traditional-UI">1.3.1 Variant A: Traditional UI</h4>
      <p>The first variant of Requestor is a 'Traditional' <em>Graphical User Interface</em> (GUI), depicted in <a href="#Figure-2">Figure 2</a>. The GUI provides its users with feedforward and feedback through mostly graphical elements: the user is presented with a (mostly static) collection of headers, paragraphs, buttons and input fields which guides them through the evaluation process.</p>
      <p>The Traditional UI contains a list of contextual information about the project, and a list of ten questions which allow the evaluator to share their opinion on potential errors in usability in the ten heuristics.</p>
      <p>The design pattern of <em>Progressive Disclosure</em> was utilised to lower the perceived cognitive load. Progressive disclosure is a gradual presentation of content in steps which reduces the chances that users are overwhelmed by too much information or irrelevant information. For example, the Traditional UI only asks for additional information on a heuristic when there is an error.</p>

      <h4 id="Conversational-UI">1.3.2 Variant B: Conversational UI</h4>
      <p>The second variant of Requestor is a <em>'Conversational' User Interface</em> (CUI). Rather than a traditional interaction, this interaction style allows evaluators to interact with the system based on principles that more closely align with real-life human communication. Instead of the traditional 'point-and-click' interaction, evaluators can operate the interface by providing textual answers to the conversational agent.</p>
      <p>The contents of the conversation between the CUI and the evaluation is very much in line with the Traditional UI: initially, the evaluator is greeted and onboarded with contextual information. Subsequently, the CUI guides the evaluator </p>

      <figure id="Figure-3">
        <img src="i/requestor-cui.png" loading="lazy" alt="Requestor CUI" width="600" height="400">
        <figcaption><b>Figure 3:</b> An overview of the Requestor Conversational UI Variant. Instead of a traditionally formatted page, the evaluation module is designed to mimic a chat conversation with an agent. This variant of the User Interface can be accessed by clicking on <a class="external-link" href="https://requestor.nl/app/cui.php" target="_blank">this link</a>.</figcaption>
      </figure>

      <h3 id="Post-Test-Questionnaire">1.4 Post-Test Questionnaire</h3>
      <p>A custom implementation of the The NASA Task Load Index (NASA-TLX) questionnaire was used to evaluate the task load perceived by participants of this study. After completing the evaluation of the fictional design case, participants of this research were automatically transferred to the NASA-TLX questionnaire, where they were asked to share their thoughts on constructs such as <em>Mental Demand</em>, <em>Temporal Demand</em>, <em>Performance</em>, <em>Effort</em> and <em>Frustration</em>.</p>

      <figure id="Figure-4">
        <img src="i/nasa-tlx.png" loading="lazy" alt="NASA-TLX" width="600" height="400">
        <figcaption><b>Figure 4:</b> The digital implementation of the NASA-TLX questionnaire.</figcaption>
      </figure>

      <!-- Start Chapter -->
      <h2 id="Results">2. Results</h2>
      <h3 id="">2.1 Participant Overview</h3>
      <p>After the study proposal had been <a href="/documents/Approval-letter-ERB2020ID97-Geel.pdf" target="_blank">reviewed and approved</a> by the local Ethical Review Board (ERB) from the Industrial Design department, the research study was advertised on social media channels (i.e. LinkedIn, Facebook Groups and Whatsapp) to recruit eligible participants.</p>
      <p>A total of <b>33 individuals</b> consented to participating in this research by submitting the <a href="https://requestor.nl/research.php" target="_blank">Informed Consent Form</a>. They shared their perceived knowledge of User Experience Design by answering the following question:</p>
      <ul>
        <li><em>Please select the option that best indicates how you perceive your knowledge of User Experience (UX) Design below</em></li>
      </ul>
      <p>An overview of composition of the the sample group for this study can be seen in the table below.</p>

      <figure>
        <table class="center-1 em-2 center-3">
          <thead>
            <tr>
              <th>Category</th>
              <th>Description</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>I am unaware of what UX involves and the added value it may bring.</td>
              <td>4</td>
            </tr>
            <tr>
              <td>2</td>
              <td>I have some understanding of what UX is, but have no experience in practical application.</td>
              <td>10</td>
            </tr>
            <tr>
              <td>3</td>
              <td>I know what UX is and have limited experience in practical application.</td>
              <td>8</td>
            </tr>
            <tr>
              <td>4</td>
              <td>I know what UX is and have considerable experience in practical application.</td>
              <td>6</td>
            </tr>
            <tr>
              <td>5</td>
              <td>I am known as an expert and have professional experience in practical application.</td>
              <td>5</td>
            </tr>
          </tbody>
        </table>
        <figcaption><b>Table 1:</b> Participant distribution for the five self-perceived expertise groups.</figcaption>
      </figure>

      <p>Out of the <b>33 total</b> participants, <b>24</b> completed the design evaluation using the Requestor tool, of which <b>22</b> completed the post-task questionnaire on perceived workload. From this, we established that the mode of the participants was category 2, self-identifying as <em>I have some understanding of what UX is, but have no experience in practical application</em>.</p>

      <h3 id="Time-Related-Performance">2.2 Time-Related Performance</h3>
      <p>Both Requestor variants are equipped with features that allow the time taken to complete tasks to be measured. Four different time intervals were specified for the evaluation: <samp>time_spent_total</samp>, <samp>time_spent_on_onboarding</samp>, <samp>time_spent_on_scenario</samp> and <samp>time_spent_on_evaluation</samp>.</p>
      <p>Table 2 shows the descriptive statistics for the dataset. From this, we can see that most participants spent from roughly <em>ten-</em> to <em>thirty minutes</em> on conducting the design evaluation. We see a great variance in this stat: the fastest evaluation was conducted <em>within five minutes</em>, while the longest evaluation spanned over <em>one and a half hours</em>.</p>

      <figure>
        <table class="time-table">
          <thead>
            <tr>
              <th class="not-visible"></th>
              <th>Min.</th>
              <th>Q1</th>
              <th>Median</th>
              <th>Mean</th>
              <th>Q3</th>
              <th>Max.</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="variable"><samp>t_total</samp></td>
              <td>00:04:32</td>
              <td>00:10:22</td>
              <td>00:15:15</td>
              <td>00:24:56</td>
              <td>00:31:24</td>
              <td>01:32:43</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_onboarding</samp></td>
              <td>00:00:05</td>
              <td>00:00:42</td>
              <td>00:01:17</td>
              <td>00:02:57</td>
              <td>00:01:57</td>
              <td>00:20:40</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_scenario</samp></td>
              <td>00:00:32</td>
              <td>00:00:42</td>
              <td>00:01:17</td>
              <td>00:02:57</td>
              <td>00:01:57</td>
              <td>00:20:40</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_evaluation</samp></td>
              <td>00:01:47</td>
              <td>00:05:18</td>
              <td>00:10:25</td>
              <td>00:18:04</td>
              <td>00:25:46</td>
              <td>00:59:40</td>
            </tr>
          </tbody>

        </table>
        <figcaption><b>Table 2:</b> Descriptive statistics for tasks performed in <b>both Requestor variants</b> by participants (n = 24 &mdash; displayed in hh:mm:ss).</figcaption>
      </figure>

      <p>In the next two tables we show the results per prototype variant (Tables 3 &amp; 4). When comparing both tables, we see that the median and mean for the Traditional UI (<samp>t_total; M = 00:18:48, &mu; = 00:32:18</samp>) are greater than those of the Conversational UI (<samp>t_total; M = 00:14:45, &mu; = 00:16:14</samp>).</p>
      <p>A more thorough analysis of the time-related performance indicators and their implications will be included in <em>Section 3</em>.</p>

      <figure>
        <table class="time-table">
          <thead>
            <tr>
              <th class="not-visible"></th>
              <th>Min.</th>
              <th>Q1</th>
              <th>Median</th>
              <th>Mean</th>
              <th>Q3</th>
              <th>Max.</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="variable"><samp>t_total</samp></td>
              <td>00:07:29</td>
              <td>00:10:21</td>
              <td>00:18:48</td>
              <td>00:32:18</td>
              <td>00:51:24</td>
              <td>01:32:43</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_onboarding</samp></td>
              <td>00:00:05</td>
              <td>00:01:09</td>
              <td>00:01:44</td>
              <td>00:03:30</td>
              <td>00:02:36</td>
              <td>00:20:40</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_scenario</samp></td>
              <td>00:01:13</td>
              <td>00:01:58</td>
              <td>00:02:21</td>
              <td>00:04:28</td>
              <td>00:03:27</td>
              <td>00:25:35</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_evaluation</samp></td>
              <td>00:04:33</td>
              <td>00:07:34</td>
              <td>00:15:00</td>
              <td>00:24:20</td>
              <td>00:46:28</td>
              <td>00:59:40</td>
            </tr>
          </tbody>

        </table>
        <figcaption><b>Table 3:</b> Descriptive statistics for tasks performed in the <b>Traditional UI</b> by participants (n = 13 &mdash; displayed in hh:mm:ss).</figcaption>
      </figure>

      <figure>
        <table class="time-table">
          <thead>
            <tr>
              <th class="not-visible"></th>
              <th>Min.</th>
              <th>Q1</th>
              <th>Median</th>
              <th>Mean</th>
              <th>Q3</th>
              <th>Max.</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="variable"><samp>t_total</samp></td>
              <td>00:04:32</td>
              <td>00:10:22</td>
              <td>00:14:45</td>
              <td>00:16:14</td>
              <td>00:19:21</td>
              <td>00:34:22</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_onboarding</samp></td>
              <td>00:00:26</td>
              <td>00:00:35</td>
              <td>00:00:43</td>
              <td>00:02:19</td>
              <td>00:01:14</td>
              <td>00:17:04</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_scenario</samp></td>
              <td>00:00:32</td>
              <td>00:01:56</td>
              <td>00:02:39</td>
              <td>00:03:16</td>
              <td>00:03:54</td>
              <td>00:08:28</td>
            </tr>
            <tr>
              <td class="variable"><samp>t_evaluation</samp></td>
              <td>00:01:47</td>
              <td>00:04:39</td>
              <td>00:08:37</td>
              <td>00:10:40</td>
              <td>00:11:59</td>
              <td>00:27:04</td>
            </tr>
          </tbody>

        </table>
        <figcaption><b>Table 4:</b> Descriptive statistics for tasks performed in the <b>Conversational UI</b> by participants (n = 11 &mdash; displayed in hh:mm:ss).</figcaption>
      </figure>

      <h3 id="Perceived-Task-Load">2.3 Perceived Task Load</h3>

      <h3 id="Repeated-Participation">2.4 Attitude Towards Repeated Participation</h3>

      <h2 id="Analysis">3. Analysis</h2>
      <p>Vivamus rhoncus suscipit artem, nec interdum nisl bibendum et. Arturius nulla urna, tempus sed pellentesque ac, malesuada ut ligula. Maecenas ac imperdiet tellus, vitae efficitur lacus. Aenean pulvinar mollis fringilla. Quisque dignissim in sapien nec semper. Quisque tellus enim, consequat sed laoreet quis, efficitur ut magna. Donec placerat tincidunt diam, sed semper nunc. Artusce ac mauris vitae est condimentum vestibulum eget id turpis. Maecenas interdum dui eu dignissim volutpat.</p>




  </body>
</html>
