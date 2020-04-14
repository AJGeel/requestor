/*
  Functionality that handles the unique name generator, similar to how GFYCat handles theirs.
  This software is based on Hearto's gfycat_name_generator, MIT licensed at
  https://github.com/HeartoLazor/gfycat_name_generator/blob/master/LICENSE

  The names are generated in the [Adjective][Adjective][Object] format, where the objects
  are UX-related terms. In total, there are [1500]x[1500]x[120] = 270M possible combinations.
*/


// Variable that will store an array of adjectives
let adjectives;

// Variable that will store an array of objects
let objects;

// Variable that will store the eventual filename
let fileName;

/* Fetch function for UX Objects Dictionary */
fetch('ux-objects.js')
  .then((response) => {
    // Handle the response as a text file
    return response.text();
  })
  .then((data) => {
    // Render the data as a one-dimensional array
    objects = textToArray(data);
    // Remove the last empty line
    removeLast(objects);
  })
  .catch((error) => {
    // Log errors, if any
    console.log(error);
  })

/* Fetch function for Adjectives Dictionary */
fetch('adjectives.js')
  .then((response) => {
    // Handle the response as a text file
    return response.text();
  })
  .then((data) => {
    // Render the data as a one-dimensional array
    adjectives = textToArray(data);
    // Remove the last empty line
    removeLast(adjectives);
    updateFileName();
  })
  .catch((error) => {
    // Log errors, if any
    console.log(error);
  })

const nameDOM = document.getElementById('nameDOM');
const nameDOM2 = document.getElementById('nameDOM2');

function generateRandomName() {
  // Pick a random value for all of them
  try {
    let firstAdjective = capitalizeFirstLetter(adjectives[randomInt(0, adjectives.length)]);
    let secondAdjective = capitalizeFirstLetter(adjectives[randomInt(0, adjectives.length)]);
    let object = capitalizeFirstLetter(objects[randomInt(0, objects.length)]);

    // Return the [Adjective][Adjective][Object] string
    return `${firstAdjective}${secondAdjective}${object}`;

  } catch (error) {

  }
}

/* Turns the text file into an array by splitting at newline characters */
function textToArray(str) {
  return str.split("\n");
}

/* Removes the empty array entry that is standard present at the end */
function removeLast(arr) {
  arr.pop();
}

/* Generates a random integer in [min, max] */
function randomInt(min, max) {
  return Math.floor((Math.random() * max) + min);
}

/* Capitalizes the first letter of a string */
function capitalizeFirstLetter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

/* Generates a new name, and updates DOM elements accordingly */
function updateFileName() {
  fileName = generateRandomName();
  nameDOM.innerHTML = fileName;
  nameDOM2.innerHTML = 'https://requestor.nl/app/' + fileName;
}
