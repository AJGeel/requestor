/*------------------------------------------------------------------

01. DOM Calls & Global Vars
02. Bubbles Core & Script
03. Custom Functions

-------------------------------------------------------------------*/

/*--------------------------------------------------
01. DOM Calls & Global Vars
---------------------------------------------------*/

// initialize by constructing a named function...
const chatWindow = new Bubbles(
    document.getElementById('chat'), // ...passing HTML container element...
    "chatWindow" // ...and name of the function as a parameter
);

// Variable that prevents multiple chat instances from occurring at the same time.
let startedPlaying = false;


/*--------------------------------------------------
02. Bubbles Core & Script
---------------------------------------------------*/

// pass your JSON/JavaScript object to `.talk()` function where
// you define how the conversation between the bot and user will go
let convo = {
  // "ice" (as in "breaking the ice") is a required conversation object
  // that maps the first thing the bot will say to the user
  "icebreaker": {

    // "says" defines an array of sequential bubbles
    // that the bot will produce
    // "says": [ "Hey!", "Can I have a banana?", ".. aha ha, just kidding..", "unless..?" ],
    "says": ["Hi there! Welcome to the Requestor app.", "I was trained to help you evaluate the design you see on the left 👈🏻", "You can respond by clicking on coloured buttons on the right."],

    // "reply" is an array of possible options the user can pick from
    // as a reply
    "reply" : [
      {
        "question" : "Like this? I get it!",  // label for the reply option
        "answer" : "intro_1",  // key for the next conversation object
      }
      // },
      // {
      //   "question" : "Hang on..",
      //   "answer" : "intro_2",
      // }
    ]
  }, // end required "ice" conversation object

  "intro_1" : {
    "says" : [ "Exactly, well done.", "Now let's get to business. Here's what you should know about the project before you see the design:", "<b><img src='/i/feather/tag.svg' alt='Tag icon'>About this Project</b> Bol.com is the leading online shop in the Netherlands for books, toys and electronics that serve over 10.5 million customers."],
    "reply": [
      {
        "question": "Tell me more.",
        "answer": "intro_2"
      }
    ]
  }, // end conversation object

  "intro_2" : {
    "says" : [ "<b><img src='/i/feather/users.svg' alt='Users icon'>Target Users</b> Bol.com mainly serves customers in the Netherlands (72%) and Belgium (14%), across all age groups.", "That's all for now. Whenever you're ready, you can click on the next button to unveil the design."],
    "reply": [
      {
        "question": "Show me!",
        "answer": "unveilDesign"
      }
    ]
  }, // end conversation object

  "intro_3" : {
    "says" : [ "See? The interface just became a whole lot more visible.", "If you want, you can get a general impression of the design: try scrolling and clicking on things to see where they take you.", "If you're ready to continue the evaluation, just let me know!"],
    "reply": [
      {
        "question": "I’m ready!", /* Careful: framework does not support ' characters in question. Use the ’ character instead. */
        "answer": "tasks"
      }
    ]
  }, // end conversation object

  "tasks" : {
    "says" : [ "Fantastic. I'll explain what you should do.", "[object Object]"],
    "reply": [
      {
        "question": "[object Object]",
        "answer": "object"
      }
    ]
  }, // end conversation object

  "object" : {
    "says" : [ "[object Object]"],
    "reply": [
      {
        "question": "[object Object]",
        "answer": "object"
      }
    ]
  }, // end conversation object

} // end conversation object

unveilDesign = function() {

  /* For security purposes, the full function HAS to be defined within this file. */
  startEvaluation();

  setTimeout(function() {
    chatWindow.talk(convo, "intro_3")
  }, 2000)
}


/*--------------------------------------------------
03. Custom Functions
---------------------------------------------------*/


function startEvaluation() {
  // Unblur the prototype frame.
  const frame = document.getElementById("frame");
  frame.style.transition = "filter 2s ease-in-out, opacity 2s ease-in-out";
  frame.style.filter = "blur(0px)";
  frame.style.opacity = "1";
}


function startTalking() {
  /* We only want to start a new conversation if there are no other simulaneous conversations */
  if (startedPlaying == false) {

    // Time out for a second to improve flow
    setTimeout(function() {
      chatWindow.talk(convo, "icebreaker");
    }, 1000);

    // Update conditional hold
    startedPlaying = true;
  }
}
