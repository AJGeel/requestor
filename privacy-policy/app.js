// Function that updates all 'last updated' timestamps across the full document.
function updateDate(input) {

  // Make DOM call to retrieve all 'last updated' timestamps in the page
  let lastUpdated = document.querySelectorAll('.last-updated');

  // We know that the innerHTML of elements 1 and 2 should be updated. Additionally, we also update their 'title' tag
  for (i = 1; i < lastUpdated.length; i++) {
    lastUpdated[i].innerHTML = `${input}`;
    lastUpdated[i].title = `Full timestamp of the last update:
${newDate}`;
  }
}

// Function that uses an XMLHttpRequest to retrieve the last modified date of this html document
function fetchHeader(url, header) {
    try {
        let request = new XMLHttpRequest();
        request.open("HEAD", url, false);
        request.send(null);
        if (request.status == 200) {
            return request.getResponseHeader(header);
        }
        else return false;
    } catch(error) {
        return error.message;
    }
}

// Use the function above to determine when the document was last edited
let newDate = fetchHeader(location.href, 'Last-Modified');

// Grab a copy of this year
let thisYear = new Date().getFullYear();

// Trim the unneeded "HH:MM:SS Timezone" at the end of the string
let newDateFormatted = newDate.split(` ${thisYear}`)[0] + ` ${thisYear}`;

// Change the input of this function any time the document is updated.
updateDate(newDateFormatted);
