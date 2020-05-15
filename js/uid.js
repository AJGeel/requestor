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
    btnXp1 = document.getElementById("xp_1"),
    btnXp2 = document.getElementById("xp_2"),
    btnXp3 = document.getElementById("xp_3"),
    btnXp4 = document.getElementById("xp_4"),
    btnXp5 = document.getElementById("xp_5"),
    toStudy = document.getElementById("toStudy"),
    consent = 0,
    experienceLevel = 0;
    p = getParams(window.location.href);
if ("0" == p.v) interfaceVariant = "gui";
else if ("1" == p.v) interfaceVariant = "cui";
else {
    let t = Math.round(Math.random());
    0 == t ? interfaceVariant = "gui" : 1 == t && (interfaceVariant = "cui")
}

function toNextPage() {
  if (consent) {
    location.href = `app/${interfaceVariant}.php`
  } else {
    alert("Unfortunately, we are not allowed to perform this study with persons who do not consent to the terms of this research. \n\nWe urge you to read through the 'Subject information for participation' letter again and decide whether you would like to consent to participating in this study.")
  }
}
btnConsent.addEventListener("click", function() {
    1 != btnConsent.classList.contains("active") && btnConsent.classList.add("active"), toStudy.classList.contains("inactive") && toStudy.classList.remove("inactive"), btnNoConsent.classList.remove("active"), consent = !0
}), btnNoConsent.addEventListener("click", function() {
    1 != btnNoConsent.classList.contains("active") && btnNoConsent.classList.add("active"), 0 == toStudy.classList.contains("inactive") && toStudy.classList.add("inactive"), btnConsent.classList.remove("active"), consent = !1
}), toStudy.addEventListener("click", function() {
    toNextPage()
});

// Function for setting cookies
function setCookie(cookie_name, cookie_value, num_days) {
  let d = new Date();
  d.setTime(d.getTime() + num_days*24*60*60*1000);
  let expires = `expires=${d.toUTCString()}`;
  document.cookie = `${cookie_name}=${cookie_value};${expires};path=/`;
}


// Function for getting cookies
function getCookie(cookie_name) {
  let name = `${cookie_name}=`;
  let decodedCookie = decodeURIComponent(document.cookie);

  let ca = decodedCookie.split(';');

  for(var i = 0; i < ca.length; i++) {
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

function checkCookiesAccepted() {
  // Check if the visitor has accepted cookies from Requestor
  let accepted_cookies = getCookie("accepted_cookies");

  // If they did not respond yet
  if (accepted_cookies == "" || accepted_cookies == null) {

  } else if (accepted_cookies == "true" ){
    // Do not display the cookie modal.
  }
}

function generateRandom(max) {
  return Math.floor(Math.random()*max);
}

checkUID();
