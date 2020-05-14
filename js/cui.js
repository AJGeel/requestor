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
    "chatWindow", { // ...and name of the function as a parameter

    inputCallbackFn: function(obj) {
      // add error conversation block & recall it if no answer matched
      var miss = function() {

        // console.log(obj.convo[obj.standingAnswer]);
        console.log(obj.input);

        if (currentQuestion == "issue") {
          // Store user input in hidden form
          updateFormValue(`heu_${currentHeuristic}_issue`, obj.input);

          // Initialize next dialog
          askHeuristicSuggestion();

        } else if (currentQuestion == "suggestion") {
          // Store user input in hidden form
          updateFormValue(`heu_${currentHeuristic}_suggestion`, obj.input);

          // Reset currentQuestion variable
          currentQuestion = "";

          // Hide textarea element
          inputText.classList.add("inactive");

          // Initialize next dialog
          if (currentHeuristic < 10) {
            goToHeuristic(currentHeuristic+1)
          } else {
            // Record time taken for evaluation and update form
            timeSpentOnEvaluation = checkTimeElapsed() - timeSpentOnScenario - timeSpentOnOnboarding;
            updateFormValue('time_spent_on_evaluation', timeSpentOnEvaluation);
            // Record time taken for full process
            timeSpentTotal = checkTimeElapsed();
            updateFormValue('time_spent_total', timeSpentTotal);

            // Timeout for five seconds, after which the data is submitted to the database
            // And the user is re-directed to the data-display screen.
            setTimeout(function() {
              submitForm();
            }, 5000);

            //
            chatWindow.talk(convo, "closing_1");
          }

        } else {
          // Fallback option in case the currentQuestion is not defined.
          chatWindow.talk(
            {
              "i-dont-get-it": {
                says: [
                  "Sorry, I don't quite understand what you mean."
                ],
                reply: obj.convo[obj.standingAnswer].reply
              }
            },
            "i-dont-get-it"
          )
        }
      }

      // do this if answer found
      var match = function(key) {
        setTimeout(function() {
          chatWindow.talk(convo, key) // restart current convo from point found in the answer
        }, 600)
      }

      // sanitize text for search function
      var strip = function(text) {
        return text.toLowerCase().replace(/[\s.,\/#!$%\^&\*;:{}=\-_'"`~()]/g, "")
      }

      // search function
      var found = false
      obj.convo[obj.standingAnswer].reply.forEach(function(e, i) {
        // 'e' stands for convo.{active}.reply[e], and lists both questions and answers
        // 'i' stands for the question's content

        strip(e.question).includes(strip(obj.input)) && obj.input.length > 0
          ? (found = e.answer)
          : found ? null : (found = false)
      })

      // If no match is found, go to the 'miss' function
      found ? match(found) : miss()
    }

});

// Variable that prevents multiple chat instances from occurring at the same time.
let startedPlaying = false;

// Variable that keeps track of the current heuristic
let currentHeuristic;
// Variable that keeps track of open-ended questions
let currentQuestion;


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
    "says" : [ "See? The interface just became a whole lot more visible.", "If you want, you can get a general impression of the design: try moving your cursor to the frame and scroll.", "If you're ready to continue the evaluation, just let me know!"],
    "reply": [
      {
        "question": "I’m ready!", /* Careful: framework does not support ' characters in question. Use the ’ character instead. */
        "answer": "tasks_1"
      }
    ]
  }, // end conversation object

  "tasks_1" : {
    "says" : [ "Fantastic. I'll explain what you should do.", "We ask you to perform a <i>Heuristic Evaluation</i> of the design you see on the left.", "This means that you envision yourself to be the user while acting out a scenario, and share your opinion on the design's usability at the end, basing your opinion on ten general rules.", "This may seem like a lot, but don't worry, I'll guide you through the process."],
    "reply": [
      {
        "question": "Let’s do it!",
        "answer": "tasks_2"
      }
    ]
  }, // end conversation object

  "tasks_2" : {
    "says" : [ "Here's the scenario you should act out using the prototype:", "<i>Your name is Frederic — a 62 year old Dutch male from the Veldhoven area. Your Epson printer just broke down for the last time, and is in dire need of replacement.</i>", "1. You opened the Bol.com page to order a new one. However, there are some restrictions: The printer should <span class='underlined'>cost less than €90</span>. It should be able to <span class='underlined'>print in full-colour</span>. Finally, <span class='underlined'>you don't want an Epson brand printer</span>.", "2. Your task is to use the Bol.com website to find a suitable new printer, and add it to your shopping basket.", "When you’re ready to start the task, click on the button. "],
    "reply": [
      {
        "question": "I’m ready.",
        "answer": "tasks_3"
      }
    ]
  }, // end conversation object

  "tasks_3" : {
    "says" : [ "You can now navigate through the page by clicking on things. Good luck! Please use either of the buttons when you’ve completed the scenario."],
    "reply": [
      {
        "question": "I’m done!",
        "answer": "didCompleteScenario"
      },
      {
        "question": "I got stuck...",
        "answer": "didNotCompleteScenario"
      }
    ]
  }, // end conversation object

  "tasks_4a" : {
    "says" : [ "That's awesome!", "I have a few questions about how you experienced using the prototype.", "I will be sharing <b>ten general principles</b> on what make a user interface usable. For each principle, please state <b>whether you think there is a problem.</b>", "You can do so using the scale of <b>0 to 4</b>, where '0' means <b>no problem</b> and '4' signifies <b>a usability catastrophe</b>. Hover over the ratings with your cursor to see a more elaborate description.", "Finally, if you believe the question is irrelevant or cannot be answered, please answer ’0’."],
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
    "says" : [ "<b>1/10 — 'Visibility of System Status'</b>", "The system should always keep users informed about what is going on, through appropriate feedback within reasonable time."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_1_0"
      },
      {
        "question": "1",
        "answer": "heu_1_1"
      },
      {
        "question": "2",
        "answer": "heu_1_2"
      },
      {
        "question": "3",
        "answer": "heu_1_3"
      },
      {
        "question": "4",
        "answer": "heu_1_4"
      },
    ]
  }, // end conversation object

  "heuristic_2" : {
    "says" : [ "<b>2/10 — 'Match between the System and the Real World'</b>", "The system should speak the users' language, with words, phrases and concepts familiar to the user, rather than system-oriented terms. Follow real-world conventions, making information appear in a natural and logical order."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_2_0"
      },
      {
        "question": "1",
        "answer": "heu_2_1"
      },
      {
        "question": "2",
        "answer": "heu_2_2"
      },
      {
        "question": "3",
        "answer": "heu_2_3"
      },
      {
        "question": "4",
        "answer": "heu_2_4"
      },
    ]
  }, // end conversation object

  "heuristic_3" : {
    "says" : [ "<b>3/10 — 'User Control and Freedom'</b>", "Users often choose system functions by mistake and will need a clearly marked 'emergency exit' to leave the unwanted state without having to go through an extended dialogue."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_3_0"
      },
      {
        "question": "1",
        "answer": "heu_3_1"
      },
      {
        "question": "2",
        "answer": "heu_3_2"
      },
      {
        "question": "3",
        "answer": "heu_3_3"
      },
      {
        "question": "4",
        "answer": "heu_3_4"
      },
    ]
  }, // end conversation object

  "heuristic_4" : {
    "says" : [ "<b>4/10 — 'Consistency and Standards'</b>", "Users should not have to wonder whether different words, situations, or actions mean the same thing. Follow platform conventions."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_4_0"
      },
      {
        "question": "1",
        "answer": "heu_4_1"
      },
      {
        "question": "2",
        "answer": "heu_4_2"
      },
      {
        "question": "3",
        "answer": "heu_4_3"
      },
      {
        "question": "4",
        "answer": "heu_4_4"
      },
    ]
  }, // end conversation object

  "heuristic_5" : {
    // "says" : [ "<i>You're halfway there! We just have five heuristics left!</i>", "insert_gif_here.jpg", "<b>5/10 — 'Error Prevention'</b>", "Even better than good error messages is a careful design which prevents a problem from occurring in the first place. Either eliminate error-prone conditions or check for them and present users with a confirmation option before they commit to the action."],
    "says" : [ "<i>You're halfway there! We just have five heuristics left!</i>", "<b>5/10 — 'Error Prevention'</b>", "Even better than good error messages is a careful design which prevents a problem from occurring in the first place. Either eliminate error-prone conditions or check for them and present users with a confirmation option before they commit to the action."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_5_0"
      },
      {
        "question": "1",
        "answer": "heu_5_1"
      },
      {
        "question": "2",
        "answer": "heu_5_2"
      },
      {
        "question": "3",
        "answer": "heu_5_3"
      },
      {
        "question": "4",
        "answer": "heu_5_4"
      },
    ]
  }, // end conversation object

  "heuristic_6" : {
    "says" : [ "<b>6/10 — 'Recognition rather than Recall'</b>", "Minimize the user's memory load by making objects, actions, and options visible. The user should not have to remember information from one part of the dialogue to another. Instructions for use of the system should be visible or easily retrievable whenever appropriate."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_6_0"
      },
      {
        "question": "1",
        "answer": "heu_6_1"
      },
      {
        "question": "2",
        "answer": "heu_6_2"
      },
      {
        "question": "3",
        "answer": "heu_6_3"
      },
      {
        "question": "4",
        "answer": "heu_6_4"
      },
    ]
  }, // end conversation object

  "heuristic_7" : {
    "says" : [ "<b>7/10 — 'Flexibility and Efficiency of Use'</b>", "Accelerators — unseen by the novice user — may often speed up the interaction for the expert user such that the system can cater to both inexperienced and experienced users. Allow users to tailor frequent actions."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_7_0"
      },
      {
        "question": "1",
        "answer": "heu_7_1"
      },
      {
        "question": "2",
        "answer": "heu_7_2"
      },
      {
        "question": "3",
        "answer": "heu_7_3"
      },
      {
        "question": "4",
        "answer": "heu_7_4"
      },
    ]
  }, // end conversation object

  "heuristic_8" : {
    "says" : [ "<b>8/10 — 'Aesthetic and Minimalist Design'</b>", "Dialogues should not contain information which is irrelevant or rarely needed. Every extra unit of information in a dialogue competes with the relevant units of information and diminishes their relative visibility."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_8_0"
      },
      {
        "question": "1",
        "answer": "heu_8_1"
      },
      {
        "question": "2",
        "answer": "heu_8_2"
      },
      {
        "question": "3",
        "answer": "heu_8_3"
      },
      {
        "question": "4",
        "answer": "heu_8_4"
      },
    ]
  }, // end conversation object

  "heuristic_9" : {
    "says" : [ "<b>9/10 — Help users Recognize, Diagnose, and Recover from Errors</b>", "Error messages should be expressed in plain language (no codes), precisely indicate the problem, and constructively suggest a solution."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_9_0"
      },
      {
        "question": "1",
        "answer": "heu_9_1"
      },
      {
        "question": "2",
        "answer": "heu_9_2"
      },
      {
        "question": "3",
        "answer": "heu_9_3"
      },
      {
        "question": "4",
        "answer": "heu_9_4"
      },
    ]
  }, // end conversation object

  "heuristic_10" : {
    "says" : [ "<i>We have one more heuristic.</i>", "<b>10/10 — Help and Documentation</b>", "Even though it is better if the system can be used without documentation, it may be necessary to provide help and documentation. Any such information should be easy to search, focused on the user's task, list concrete steps to be carried out, and not be too large."],
    "reply": [
      {
        "question": "0",
        "answer": "heu_10_0"
      },
      {
        "question": "1",
        "answer": "heu_10_1"
      },
      {
        "question": "2",
        "answer": "heu_10_2"
      },
      {
        "question": "3",
        "answer": "heu_10_3"
      },
      {
        "question": "4",
        "answer": "heu_10_4"
      },
    ]
  }, // end conversation object

  "closing_1" : {
    "says" : [ "You've reached the end of this evaluation! 🎉", "All your input has been saved.", "You will be re-directed shortly. Thank you for your efforts!"],
    // "reply": [
    //   {
    //     "question": "0",
    //     "answer": "foo"
    //   }
    //]
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

  "heuristicIssue" : {
    "says" : [ "Could you tell us what the issue is? If you want, you can type your input in the text area below."],
    "reply": [
      {
        "question": "I’d like to skip this one.",
        "answer": "heuristicSuggestion"
      }
    ]
  },

  "heuristicSuggestion" : {
    "says" : [ "Perhaps you have a suggestion on how we may fix this issue? Once more, you can type your input in the text area below."],
    "reply": [
      {
        "question": "I’d like to skip this one.",
        "answer": "handleSuggestion"
      }
    ]
  },

} // end conversation object


unveilDesign = function() {
  startEvaluation();

  setTimeout(function() {
    chatWindow.talk(convo, "intro_3")
  }, 2000)
}

// CONTINUE HERE
// FOR SOME REASON, THE PROGRAM BREAKS HERE.
didCompleteScenario = function() {
  // Store the time taken to perform the scenario
  timeSpentOnScenario = checkTimeElapsed() - timeSpentOnOnboarding;
  // Update hidden form value for time spent
  updateFormValue('time_spent_on_scenario', timeSpentOnScenario);

  // Also update the hidden form value for completing the scenario
  updateFormValue('completed_scenario', 1);

  // Progress the dialog to the next text
  chatWindow.talk(convo, "tasks_4a");
}

didNotCompleteScenario = function() {
  // Store the time taken to perform the scenario
  timeSpentOnScenario = checkTimeElapsed() - timeSpentOnOnboarding;
  // Update hidden form value for time spent
  updateFormValue('time_spent_on_scenario', timeSpentOnScenario);
  // Progress the dialog to the next text
  chatWindow.talk(convo, "tasks_4b");
}

handleSuggestion = function() {
  // Reset currentQuestion variable
  currentQuestion = "";

  // Hide textarea element
  inputText.classList.add("inactive");

  // Initialize next dialog
  if (currentHeuristic < 10) {
    goToHeuristic(currentHeuristic+1)
  } else {
    // Record time taken for evaluation and update form
    timeSpentOnEvaluation = checkTimeElapsed() - timeSpentOnScenario - timeSpentOnOnboarding;
    updateFormValue('time_spent_on_evaluation', timeSpentOnEvaluation);
    // Record time taken for full process
    timeSpentTotal = checkTimeElapsed();
    updateFormValue('time_spent_total', timeSpentTotal);

    setTimeout(function() {
      // Timeout for five seconds, after which the data is submitted to the database
      // And the user is re-directed to the data-display screen.
      submitForm();
    }, 5000)

    chatWindow.talk(convo, "closing_1");
  }
}



/* Due to how the Bubbles.js library is built, we need to have a messy, repetitive
   block of code: parameters are not accepted in chat reply functions for security
   reasons. I don't like the code below either.
*/

/* Heuristic 1 answer response functions */
heu_1_0 = function() { handleHeuristicResponse(1, 0); }
heu_1_1 = function() { handleHeuristicResponse(1, 1); }
heu_1_2 = function() { handleHeuristicResponse(1, 2); }
heu_1_3 = function() { handleHeuristicResponse(1, 3); }
heu_1_4 = function() { handleHeuristicResponse(1, 4); }

/* Heuristic 2 answer response functions */
heu_2_0 = function() { handleHeuristicResponse(2, 0); }
heu_2_1 = function() { handleHeuristicResponse(2, 1); }
heu_2_2 = function() { handleHeuristicResponse(2, 2); }
heu_2_3 = function() { handleHeuristicResponse(2, 3); }
heu_2_4 = function() { handleHeuristicResponse(2, 4); }

/* Heuristic 3 answer response functions */
heu_3_0 = function() { handleHeuristicResponse(3, 0); }
heu_3_1 = function() { handleHeuristicResponse(3, 1); }
heu_3_2 = function() { handleHeuristicResponse(3, 2); }
heu_3_3 = function() { handleHeuristicResponse(3, 3); }
heu_3_4 = function() { handleHeuristicResponse(3, 4); }

/* Heuristic 4 answer response functions */
heu_4_0 = function() { handleHeuristicResponse(4, 0); }
heu_4_1 = function() { handleHeuristicResponse(4, 1); }
heu_4_2 = function() { handleHeuristicResponse(4, 2); }
heu_4_3 = function() { handleHeuristicResponse(4, 3); }
heu_4_4 = function() { handleHeuristicResponse(4, 4); }

/* Heuristic 5 answer response functions */
heu_5_0 = function() { handleHeuristicResponse(5, 0); }
heu_5_1 = function() { handleHeuristicResponse(5, 1); }
heu_5_2 = function() { handleHeuristicResponse(5, 2); }
heu_5_3 = function() { handleHeuristicResponse(5, 3); }
heu_5_4 = function() { handleHeuristicResponse(5, 4); }

/* Heuristic 6 answer response functions */
heu_6_0 = function() { handleHeuristicResponse(6, 0); }
heu_6_1 = function() { handleHeuristicResponse(6, 1); }
heu_6_2 = function() { handleHeuristicResponse(6, 2); }
heu_6_3 = function() { handleHeuristicResponse(6, 3); }
heu_6_4 = function() { handleHeuristicResponse(6, 4); }

/* Heuristic 7 answer response functions */
heu_7_0 = function() { handleHeuristicResponse(7, 0); }
heu_7_1 = function() { handleHeuristicResponse(7, 1); }
heu_7_2 = function() { handleHeuristicResponse(7, 2); }
heu_7_3 = function() { handleHeuristicResponse(7, 3); }
heu_7_4 = function() { handleHeuristicResponse(7, 4); }

/* Heuristic 8 answer response functions */
heu_8_0 = function() { handleHeuristicResponse(8, 0); }
heu_8_1 = function() { handleHeuristicResponse(8, 1); }
heu_8_2 = function() { handleHeuristicResponse(8, 2); }
heu_8_3 = function() { handleHeuristicResponse(8, 3); }
heu_8_4 = function() { handleHeuristicResponse(8, 4); }

/* Heuristic 9 answer response functions */
heu_9_0 = function() { handleHeuristicResponse(9, 0); }
heu_9_1 = function() { handleHeuristicResponse(9, 1); }
heu_9_2 = function() { handleHeuristicResponse(9, 2); }
heu_9_3 = function() { handleHeuristicResponse(9, 3); }
heu_9_4 = function() { handleHeuristicResponse(9, 4); }

/* Heuristic 10 answer response functions */
heu_10_0 = function() { handleHeuristicResponse(10, 0); }
heu_10_1 = function() { handleHeuristicResponse(10, 1); }
heu_10_2 = function() { handleHeuristicResponse(10, 2); }
heu_10_3 = function() { handleHeuristicResponse(10, 3); }
heu_10_4 = function() { handleHeuristicResponse(10, 4); }



/*--------------------------------------------------
03. Custom Functions
---------------------------------------------------*/


function startEvaluation() {
  // Evaluation starts: unblur the prototype frame.
  const frame = document.getElementById("frame");
  frame.style.transition = "filter 2s ease-in-out, opacity 2s ease-in-out";
  frame.style.filter = "blur(0px)";
  frame.style.opacity = "1";

  // Update the hidden form value to store how much time the user spent on the onboarding sequence.
  timeSpentOnOnboarding = checkTimeElapsed();
  updateFormValue('time_spent_on_onboarding', timeSpentOnOnboarding);
}

/* Function that continues the conversation in any heuristic*/
function goToHeuristic(heuristicNo) {
  chatWindow.talk(convo, `heuristic_${heuristicNo}`);
}

function handleHeuristicResponse(heuristicNo, input) {
  // First: update the hidden form value
  updateFormValue(`heu_${heuristicNo}`, input);

  currentHeuristic = heuristicNo;

  // Check if the heuristic is the last of the set

  if (heuristicNo != 10) {
    // No issue detected, heurstic does not require follow-up questions.
    if (input == 0) {
      goToHeuristic(heuristicNo+1);
    } else {
      // Prompt the user to input more on this: what the issue is, and a suggestion on how to fix it.
      // However, for now we keep it simple;
      askHeuristicIssue();
      // goToHeuristic(heuristicNo+1);
      // TODO integrate 'heuristic_n_issue' and 'heuristic_n_suggestion' dialogs.
    }
  } else if (heuristicNo == 10) {
    // Record time taken for evaluation and update form
    timeSpentOnEvaluation = checkTimeElapsed() - timeSpentOnScenario - timeSpentOnOnboarding;
    updateFormValue('time_spent_on_evaluation', timeSpentOnEvaluation);
    // Record time taken for full process
    timeSpentTotal = checkTimeElapsed();
    updateFormValue('time_spent_total', timeSpentTotal);

    setTimeout(function() {
      // Timeout for five seconds, after which the data is submitted to the database
      // And the user is re-directed to the data-display screen.
      submitForm();
    }, 5000)

    // Go to the closing statements
    chatWindow.talk(convo, 'closing_1');
  } else {
    // This should never occur. However, we do want to gracefully handle this exception.
    console.log("We could not handle your request at this time.");
    chatWindow.talk(convo, 'closing_1');
  }
}

function askHeuristicIssue() {
  setTimeout(function() {
    // Make textarea input visible...
    // ... After a well-timed delay, of course.
    inputText.classList.remove("inactive");
    // Autofocus the element for a more convenient typing experience
    inputText.focus();
  }, 2000);

  // Update currentQuestion variable
  currentQuestion = "issue";
  // Summon heuristic issue dialog
  chatWindow.talk(convo, "heuristicIssue");
}

function askHeuristicSuggestion() {
  setTimeout(function() {
    // Make textarea input visible...
    // ... After a well-timed delay, of course.
    // However, this most likely was already visible, hence this is just a way to ensure that it is.
    inputText.classList.remove("inactive");
    // Autofocus the element for a more convenient typing experience
    inputText.focus();
  }, 2000);

  // Update currentQuestion variable
  currentQuestion = "suggestion";
  // Summon heuristic issue dialog
  chatWindow.talk(convo, "heuristicSuggestion");
}

function startTalking() {
  /* We only want to start a new conversation if there are no other simulaneous conversations */
  if (startedPlaying == false) {

    // Time out for a second to improve flow
    setTimeout(function() {
      chatWindow.talk(convo, "icebreaker");
      // chatWindow.talk(convo, "tasks_3");
    }, 1000);

    // Update conditional
    startedPlaying = true;
  }
}

// Update the numerical input items with the respective balloon tooltips
function updateAttr(target, ariaLabel, balloonPos, balloonLen) {
  target.setAttribute('aria-label', ariaLabel);
  target.setAttribute('data-balloon-pos', balloonPos);
  target.setAttribute('data-balloon-length', balloonLen);
}

function submitForm() {
  document.getElementsByTagName('form')[0].submit();
}
