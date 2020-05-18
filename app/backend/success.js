// DOM Calls
let btnInterested = document.getElementById('interested');
let btnNotInterested = document.getElementById('notInterested');
let nextQuestionnaireBtn = document.getElementById('nextQuestionnaire');

// Global variables
let interestedBool = 0;
let interfaceVariant;

// EventListener for clicking the 'interested' button
btnInterested.addEventListener('click', function() {
  if (btnInterested.classList.contains('active') != true) {
    btnInterested.classList.add('active');
  }

  btnNotInterested.classList.remove('active');
  // Update variable value
  interestedBool = 1;

  // Submit to database
  updateInterested();
});

// EventListener for clicking the 'not interested' button
btnNotInterested.addEventListener('click', function() {
  if (btnNotInterested.classList.contains('active') != true) {
    btnNotInterested.classList.add('active');
  }

  btnInterested.classList.remove('active');
  // Update variable value
  interestedBool = 0;

  // Submit to database
  updateInterested();
});

// EventListener for the 'Continue to Questionnaire' button
nextQuestionnaireBtn.addEventListener('click', function() {
  toNextPage();
});

// Function to get a cookie
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function toNextPage() {
  // Navigate to the correct follow-up page
  location.href = `../../nasa-tlx/${interfaceVariant}.html`;
}

// Function to check the amount of right answers
function checkUserPerformance() {
  let numberCorrect = 0;
  let tempAnswerArr = userData.input.split(',');
  let userAnswers = [];

  // Go through full user input, isolate their answers into an array
  for (i = 0; i < tempAnswerArr.length-1; i += 3) {
    // Replace "'" signs
    let ans = tempAnswerArr[i].replace(/'/g, '');
    // Append to array
    userAnswers.push(ans);
  }

  // For this case, the 'right' answers are problems in heuristics [1,4] and [9].
  let faultyHeuristics = [0, 1, 2, 3, 8];
  // Compare userAnswers to right answers
  for (i = 0; i < faultyHeuristics.length; i++) {
    // For each
    let ans = userAnswers[faultyHeuristics[i]];

    // Check if user has specified there is an issue with the heuristic
    if (ans >= 1 && ans <= 4) {
      // If so: add one to their tally.
      numberCorrect += 1;
    }
  }

  return numberCorrect;
}

function checkPrototypeVariant() {
  if (prototypeID == 0) {
    interfaceVariant = 'gui';
  } else {
    interfaceVariant = 'cui';
  }
}

function updatePerformanceIndicators() {
  // Check- and update time spent
  let statTimeSpent = document.getElementById('timeSpent');
  // Calculate amount of minutes spent on the total evaluation
  let minutes = Math.floor(userData.timeSpent.total / 60); // (60 seconds in every minute)
  // Update DOM content to match
  statTimeSpent.innerHTML = minutes;
  // Then: provide correct appraisal
  // Get the correct DOM Element in which we will update
  let timeSpentAppraisal = document.getElementById('timeSpentAppraisal');
  if (minutes < 15) {
    timeSpentAppraisal.innerHTML = 'That\'s quite a bit faster than the average!';
  } else if (minutes < 20) {
    timeSpentAppraisal.innerHTML = 'You\'re faster than the average. Nice one!';
  } else {
    timeSpentAppraisal.innerHTML = 'That\'s more than most do. Thank you for being so thorough!';
  }

  // Check and update issues found
  let statIssuesFound = document.getElementById('issuesFound');

  // Retrieve total amount of issues found
  let issuesFound = checkUserPerformance();
  // Update DOM content to match.
  statIssuesFound.innerHTML = issuesFound;

  // Then: provide correct appraisal
  // Get the correct DOM Element in which we will update
  let issuesFoundAppraisal = document.getElementById('issuesFoundAppraisal');
  if (issuesFound <= 2) {
    issuesFoundAppraisal.innerHTML = 'Better luck next time!';
  } else if (issuesFound <= 3) {
    issuesFoundAppraisal.innerHTML = 'You found most of the issues!';
  } else if (issuesFound <= 5) {
    issuesFoundAppraisal.innerHTML = 'That\'s fantastic!';
  }

}

checkPrototypeVariant();
updatePerformanceIndicators();

/* Function that POSTS the user's ID and interestedBool values to our PHP
handler. This validates its contents, and updates it in the database.
*/
function updateInterested() {
  var url = 'interested.php';
  var formData = new FormData();
  formData.append('user_id', userData.ID);
  formData.append('interested', interestedBool);

  fetch(url, { method: 'POST', body: formData })
  .then(function (response) {
    return response.text();
  })
  .then(function (body) {
    console.log(body);
  });
}
