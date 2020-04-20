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
    "says" : [ "Exactly, well done.", "Now let's get to business. Here's what you should know about the project before you see the design:", "<b class='with-image'><img src='/i/feather/tag.svg' alt='Tag icon'>About this Project</b> Bol.com is the leading online shop in the Netherlands for books, toys and electronics that serve over 10.5 million customers."],
    "reply": [
      {
        "question": "Tell me more.",
        "answer": "intro_2"
      }
    ]
  }, // end conversation object

  "intro_2" : {
    "says" : [ "<b class='with-image'><img src='/i/feather/users.svg' alt='Users icon'>Target Users</b> Bol.com mainly serves customers in the Netherlands (72%) and Belgium (14%), across all age groups.", "That's all for now. Whenever you're ready, you can click on the next button to unveil the design."],
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
        "answer": "tasks_1"
      }
    ]
  }, // end conversation object

  "tasks_1" : {
    "says" : [ "Fantastic. I'll explain what you should do.", "We ask you to perform a <i>Heuristic Evaluation</i> of the design you see on left.", "This means that you envision yourself to be the user while acting out a scenario, and share your opinion on the design's usability at the end, basing your opinion on ten general rules."],
    "reply": [
      {
        "question": "Let’s go!",
        "answer": "tasks_2"
      }
    ]
  }, // end conversation object

  "tasks_2" : {
    "says" : [ "Here's the scenario you should act out using the prototype:", "<i>Your name is Frederic — a 62 year old Dutch male from the Veldhoven area. Your Epson printer just broke down for the last time, and is in dire need of replacement.</i>", "1. You opened the Bol.com page to order a new one. However, there are some restrictions: The printer should <span class='underlined'>cost less than €90</span>. It should be able to <span class='underlined'>print in full-colour</span>. Finally, <span class='underlined'>you don't want an Epson brand printer</span>.", "2. Your task is to use the Bol.com website to find a suitable new printer, and add it to your shopping basket.", "When you’re ready to start the task, click on the button."],
    "reply": [
      {
        "question": "I’m ready.",
        "answer": "tasks_3"
      }
    ]
  }, // end conversation object

  "tasks_3" : {
    "says" : [ "Good luck! Please use either of the buttons when you’re done."],
    "reply": [
      {
        "question": "I’m done!",
        "answer": "tasks_4a"
      },
      {
        "question": "I got stuck...",
        "answer": "tasks_4b"
      }
    ]
  }, // end conversation object

  "tasks_4a" : {
    "says" : [ "That's awesome!", "I have a few questions about how you experienced using this design.", "I will be sharing ten global rules of what makes a design good. We ask you to state whether you think there was an error for each of these rules."],
    "reply": [
      {
        "question": "Let’s go!",
        "answer": "heuristic_1"
      }
    ]
  }, // end conversation object

  "tasks_4b" : {
    "says" : [ "That's not a problem at all, this project is not finished and therefore not perfect.", "As we’re working on improving it, we value your experiencees greatly, and would like to ask you a few questions to help us understand.", "I will be sharing ten global rules of what makes a design good. We ask you to state whether you think there was an error for each of these rules."],
    "reply": [
      {
        "question": "Let’s go!",
        "answer": "heuristic_1"
      }
    ]
  }, // end conversation object

  "heuristic_1" : {
    "says" : [ "<b>#1: Visibility of System Status</b>", "<i>The system kept me informed about what was going on, through appropriate feedback within reasonable time.</i>", "Was there an usability problem? Hover over the answers to see elaborate descriptions."],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_2"
      },
      {
        "question": "1",
        "answer": "heuristic_2"
      },
      {
        "question": "2",
        "answer": "heuristic_2"
      },
      {
        "question": "3",
        "answer": "heuristic_2"
      },
      {
        "question": "4",
        "answer": "heuristic_2"
      },
    ]
  }, // end conversation object

  "heuristic_2" : {
    "says" : [ "<b>#2: Match between the system and the real world</b>", "<i>The system should speak the users' language, with words, phrases and concepts familiar to the user, rather than system-oriented terms. Follow real-world conventions, making information appear in a natural and logical order.</i>", "Once more, please share your input below."],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_3"
      },
      {
        "question": "1",
        "answer": "heuristic_3"
      },
      {
        "question": "2",
        "answer": "heuristic_3"
      },
      {
        "question": "3",
        "answer": "heuristic_3"
      },
      {
        "question": "4",
        "answer": "heuristic_3"
      },
    ]
  }, // end conversation object

  "heuristic_3" : {
    "says" : [ "<b>#3: User control and freedom</b>", "<i>Users often choose system functions by mistake and will need a clearly marked 'emergency exit' to leave the unwanted state without having to go through an extended dialogue. Support undo and redo.</i>"],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_4"
      },
      {
        "question": "1",
        "answer": "heuristic_4"
      },
      {
        "question": "2",
        "answer": "heuristic_4"
      },
      {
        "question": "3",
        "answer": "heuristic_4"
      },
      {
        "question": "4",
        "answer": "heuristic_4"
      },
    ]
  }, // end conversation object

  "heuristic_4" : {
    "says" : [ "<b>#4: Consistency and standards</b>", "<i>Users should not have to wonder whether different words, situations, or actions mean the same thing. Follow platform conventions.</i>"],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_5"
      },
      {
        "question": "1",
        "answer": "heuristic_5"
      },
      {
        "question": "2",
        "answer": "heuristic_5"
      },
      {
        "question": "3",
        "answer": "heuristic_5"
      },
      {
        "question": "4",
        "answer": "heuristic_5"
      },
    ]
  }, // end conversation object

  "heuristic_5" : {
    "says" : [ "<b>#5: Error Prevention</b>", "<i>Even better than good error messages is a careful design which prevents a problem from occurring in the first place. Either eliminate error-prone conditions or check for them and present users with a confirmation option before they commit to the action.</i>"],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_6"
      },
      {
        "question": "1",
        "answer": "heuristic_6"
      },
      {
        "question": "2",
        "answer": "heuristic_6"
      },
      {
        "question": "3",
        "answer": "heuristic_6"
      },
      {
        "question": "4",
        "answer": "heuristic_6"
      },
    ]
  }, // end conversation object

  "heuristic_6" : {
    "says" : [ "<b>#6: Recognition rather than recall</b>", "<i>Minimize the user's memory load by making objects, actions, and options visible. The user should not have to remember information from one part of the dialogue to another. Instructions for use of the system should be visible or easily retrievable whenever appropriate.</i>"],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_7"
      },
      {
        "question": "1",
        "answer": "heuristic_7"
      },
      {
        "question": "2",
        "answer": "heuristic_7"
      },
      {
        "question": "3",
        "answer": "heuristic_7"
      },
      {
        "question": "4",
        "answer": "heuristic_7"
      },
    ]
  }, // end conversation object

  "heuristic_7" : {
    "says" : [ "<b>#7: Flexibility and efficiency of use</b>", "<i>Accelerators — unseen by the novice user — may often speed up the interaction for the expert user such that the system can cater to both inexperienced and experienced users. Allow users to tailor frequent actions.</i>"],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_8"
      },
      {
        "question": "1",
        "answer": "heuristic_8"
      },
      {
        "question": "2",
        "answer": "heuristic_8"
      },
      {
        "question": "3",
        "answer": "heuristic_8"
      },
      {
        "question": "4",
        "answer": "heuristic_8"
      },
    ]
  }, // end conversation object

  "heuristic_8" : {
    "says" : [ "<b>#8: Aesthetic and minimalist design</b>", "<i>Dialogues should not contain information which is irrelevant or rarely needed. Every extra unit of information in a dialogue competes with the relevant units of information and diminishes their relative visibility.</i>"],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_9"
      },
      {
        "question": "1",
        "answer": "heuristic_9"
      },
      {
        "question": "2",
        "answer": "heuristic_9"
      },
      {
        "question": "3",
        "answer": "heuristic_9"
      },
      {
        "question": "4",
        "answer": "heuristic_9"
      },
    ]
  }, // end conversation object

  "heuristic_9" : {
    "says" : [ "<b>#9: Help users recognize, diagnose, and recover from errors</b>", "<i>Error messages should be expressed in plain language (no codes), precisely indicate the problem, and constructively suggest a solution.</i>"],
    "reply": [
      {
        "question": "0",
        "answer": "heuristic_10"
      },
      {
        "question": "1",
        "answer": "heuristic_10"
      },
      {
        "question": "2",
        "answer": "heuristic_10"
      },
      {
        "question": "3",
        "answer": "heuristic_10"
      },
      {
        "question": "4",
        "answer": "heuristic_10"
      },
    ]
  }, // end conversation object

  "heuristic_10" : {
    "says" : [ "<b>#10: Help and documentation</b>", "<i>Even though it is better if the system can be used without documentation, it may be necessary to provide help and documentation. Any such information should be easy to search, focused on the user's task, list concrete steps to be carried out, and not be too large.</i>"],
    "reply": [
      {
        "question": "0",
        "answer": "foo"
      },
      {
        "question": "1",
        "answer": "foo"
      },
      {
        "question": "2",
        "answer": "foo"
      },
      {
        "question": "3",
        "answer": "foo"
      },
      {
        "question": "4",
        "answer": "foo"
      },
    ]
  }, // end conversation object

  "foo" : {
    "says" : [ "[object Object]"],
    "reply": [
      {
        "question": "[object Object]",
        "answer": "foo"
      }
    ]
  }, // end conversation object



  "object" : {
    "says" : [ "[object Object]"],
    "reply": [
      {
        "question": "[object Object]",
        "answer": "rating"
      },
      {
        "question": "[object Object]",
        "answer": "rating"
      },
      {
        "question": "[object Object]",
        "answer": "rating"
      }
    ]
  }, // end conversation object

} // end conversation object

unveilDesign = function() {

  /* For security purposes, the full function HAS to be defined within this file.
     The GitHub repo suggests that these functions cannot accept parameters for security reasons,
     Although I have to try this out myself.

     A function with a parameter in this formulation would be:

     unveilDesign = function(param) {
        console.log(param);
     }
  */
  startEvaluation();

  setTimeout(function() {
    chatWindow.talk(convo, "intro_3")
  }, 2000)
}

// heuristicFunc1 = function() {
//
//   /* Time out for 5 seconds to ensure hover tooltips are added to the newly introduce DOM elements */
//   // setTimeout(function() {
//   //   updateBalloonHovers();
//   // }, 5000);
//
//   chatWindow.talk(convo, "heuristic_1");
//   // updateBalloonHovers();
// }
//
// heuristicFunc2 = function() {
//
//     /* Time out for 5 seconds to ensure hover tooltips are added to the newly introduce DOM elements */
//     // setTimeout(function() {
//     //   updateBalloonHovers();
//     // }, 5000);
//
//     chatWindow.talk(convo, "heuristic_2");
//     // updateBalloonHovers();
// }


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
      // chatWindow.talk(convo, "icebreaker");
      chatWindow.talk(convo, "tasks_4a");
    }, 1000);

    // Update conditional hold
    startedPlaying = true;
  }
}

function updateAttr(target, ariaLabel, balloonPos, balloonLen) {
  target.setAttribute('aria-label', ariaLabel);
  target.setAttribute('data-balloon-pos', balloonPos);
  target.setAttribute('data-balloon-length', balloonLen);
}
