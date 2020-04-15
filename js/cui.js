// initialize by constructing a named function...
const chatWindow = new Bubbles(
    document.getElementById('chat'), // ...passing HTML container element...
    "chatWindow" // ...and name of the function as a parameter
);

let startedPlaying = false;

function commenceTalking() {

  if (startedPlaying) {
    // Conditional hold: we don't want multiple conversations at the same time.
  } else {
    // Update the conditional flag
    startedPlaying = true;

    // `.talk()` will get your bot to begin the conversation
    chatWindow.talk(
      // pass your JSON/JavaScript object to `.talk()` function where
      // you define how the conversation between the bot and user will go
      {
        // "ice" (as in "breaking the ice") is a required conversation object
        // that maps the first thing the bot will say to the user
        "ice": {

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
          "says" : [ "<b><img src='/i/feather/users.svg' alt='Users icon'>Target Users</b> Bol.com mainly serves customers in the Netherlands (72%) and Belgium (14%), across all age groups.", "That's all for now. You can click on the next button to see the interface clearly."],
          "reply": [
            {
              "question": "Show me!",
              "answer": "intro_3"
            }
          ]
        }, // end conversation object

        "intro_3" : {
          "says" : [ "Text goes here"],
          "reply": [
            {
              "question": "Let's start!",
              "answer": "intro_3"
            }
          ]
        }, // end conversation object

      } // end conversation object
    );
  }

}
