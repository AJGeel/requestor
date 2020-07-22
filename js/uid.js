let interfaceVariant;
let getParams = function(t) {
  let e = {},
    n = document.createElement("a");
  n.href = t;
  let o = n.search.substring(1).split("&");
  for (let t = 0; t < o.length; t++) {
    let n = o[t].split("=");
    e[n[0]] = decodeURIComponent(n[1])
  }
  return e
};

let btnConsent = document.getElementById("consent"),
  btnNoConsent = document.getElementById("noConsent"),
  consent = 0,
  experienceLevelDOM = document.getElementById("experienceLevel"),
  noveltyFamiliarityDOM = document.getElementById("noveltyFamiliarity"),
  noveltyFrequencyDOM = document.getElementById("noveltyFrequency");

p = getParams(window.location.href);
if ("0" == p.v) interfaceVariant = "gui";
else if ("1" == p.v) interfaceVariant = "cui";
else {
  let t = Math.round(Math.random());
  0 == t ? interfaceVariant = "gui" : 1 == t && (interfaceVariant = "cui")
}

function toNextPage() {
  // Check whether consent has been given to participate in the study
  if (consent) {
    // If so: check if the 'Experience Level' question has been answered (Changed from "" to any value)
    if (experienceLevelDOM.value == "") {
      // Question has not been answered:
      alert("Please share how you perceive your understanding and ability in UX Design.");
      experienceLevelDOM.focus();
    } else {
      // If so: check if the 'Novelty > Familiarity' has been answered.
      if (noveltyFamiliarityDOM.value == "") {
        // Question has not been answered:
        alert("Please share your familiarity with Conversational User Interfaces.");
        noveltyFamiliarityDOM.focus();
      } else {
        // If so: check if the 'Novelty > Frequency' has been answered.
        if (noveltyFrequencyDOM.value == "") {
          // Question has not been answered:
          alert("Please share your frequency of use of Conversational User Interfaces.");
          noveltyFrequencyDOM.focus();
        } else {
          // All conditions are met. Send data to the database and go to the next page
          saveExperienceToDB();
        }
      }
    }
  } else {
    alert("Unfortunately, we are not allowed to perform this study with persons who do not consent to the terms of this research. \n\nWe urge you to read through the 'Subject information for participation' letter again and decide whether you would like to consent to participating in this study.")
  }
}

// Eventlistener for clicking on the 'consent' button
btnConsent.addEventListener("click", function() {
  // Check whether the button is already active. If not, add the active tag
  if (btnConsent.classList.contains("active") == false) {
    btnConsent.classList.add("active");
  }

  // Check the other button. If it contains the active tag, remove it.
  if (btnNoConsent.classList.contains("active")) {
    btnNoConsent.classList.remove("active");
  }

  // Update consent variable to 'true'
  consent = true;

  // Check if 'continue to study' button should be unlocked.
  if (experienceLevelDOM.value != "" && noveltyFamiliarityDOM.value != "" && noveltyFrequencyDOM.value != "") {
    // Unlock button
    toStudy.classList.remove("inactive");
  }
})

// Eventlistener for clicking on the 'no consent' button
btnNoConsent.addEventListener("click", function() {
  // Check whether the button is already active. If not, add the active tag
  if (btnNoConsent.classList.contains("active") == false) {
    btnNoConsent.classList.add("active");
  }

  // Check the other button. If it contains the active tag, remove it.
  if (btnConsent.classList.contains("active")) {
    btnConsent.classList.remove("active");
  }

  // Update consent variable to 'false'
  consent = false;

  // Check if 'continue to study' button is locked. If not, lock it.
  if (toStudy.classList.contains("inactive") == false) {
    toStudy.classList.add("inactive");
  }
})

// EventListener for changing values within the 'perceived understanding of UX' select
experienceLevelDOM.addEventListener("change", function() {
  // Check if 'continue to study' button should be unlocked.
  if (experienceLevelDOM.value != "" && noveltyFamiliarityDOM.value != "" && noveltyFrequencyDOM.value != "") {
    // Unlock button
    toStudy.classList.remove("inactive");
  }
})

// EventListener for changing values within the 'CUI Novelty > Familiarity' select
noveltyFamiliarityDOM.addEventListener("change", function() {
  // Check if 'continue to study' button should be unlocked.
  if (experienceLevelDOM.value != "" && noveltyFamiliarityDOM.value != "" && noveltyFrequencyDOM.value != "") {
    // Unlock button
    toStudy.classList.remove("inactive");
  }
})

// EventListener for changing values within the 'CUI Novelty > Frequency' select
noveltyFrequencyDOM.addEventListener("change", function() {
  // Check if 'continue to study' button should be unlocked.
  if (experienceLevelDOM.value != "" && noveltyFamiliarityDOM.value != "" && noveltyFrequencyDOM.value != "") {
    // Unlock button
    toStudy.classList.remove("inactive");
  }
})

// EventListener for the 'Continue to Study' button
toStudy.addEventListener("click", function() {
  toNextPage();
})

// Function for setting cookies
function setCookie(cookie_name, cookie_value, num_days) {
  let d = new Date();
  d.setTime(d.getTime() + num_days * 24 * 60 * 60 * 1000);
  let expires = `expires=${d.toUTCString()}`;
  document.cookie = `${cookie_name}=${cookie_value};${expires};path=/`;
}


// Function for getting cookies
function getCookie(cookie_name) {
  let name = `${cookie_name}=`;
  let decodedCookie = decodeURIComponent(document.cookie);

  let ca = decodedCookie.split(';');

  for (var i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }

    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }

  }
  return "";
}

/* Function that checks whether the user has already been assigned an anonymous
   unique identifier. If not, it assigns one.
*/
function checkUID() {
  // Get the user's unique id
  let temp_uid = getCookie("temp_uid");

  // If it is not defined yet
  if (temp_uid == "" || temp_uid == null) {
    // Generate a random user id.
    setCookie("temp_uid", generateRandom(9999999), 7 /* We only keep this temporary cookie for 7 days. */ );
  }

}

// function checkCookiesAccepted() {
//   // Check if the visitor has accepted cookies from Requestor
//   let accepted_cookies = getCookie("accepted_cookies");
//
//   // If they did not respond yet
//   if (accepted_cookies == "" || accepted_cookies == null) {
//
//   } else if (accepted_cookies == "true") {
//     // Do not display the cookie modal.
//   }
// }

function generateRandom(max) {
  return Math.floor(Math.random() * max);
}

/* Function that POSTS the user's ID and interestedBool values to our PHP
handler. This validates its contents, and updates it in the database.
*/
function saveExperienceToDB() {
  let user_id = getCookie('temp_uid');
  let experience_level = experienceLevelDOM.value;
  let novelty_familiarity = noveltyFamiliarityDOM.value;
  let novelty_frequency = noveltyFrequencyDOM.value;

  let url = '/app/backend/experience.php';
  let formData = new FormData();
  formData.append('user_id', user_id);
  formData.append('experience_level', experience_level);
  formData.append('novelty_familiarity', novelty_familiarity);
  formData.append('novelty_frequency', novelty_frequency);

  fetch(url, { method: 'POST', body: formData })
  .then(function (response) {
    console.log(response.status);
    return response.text();
  })
  .then(function (body) {
    console.log(body);
    // Go to the next page
    location.href = `app/${interfaceVariant}.php`
  });
}

checkUID();
