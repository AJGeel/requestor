/* modalOverlay allows us to keep track of modals */
  let modalOverlay = document.getElementById('modalOverlay');

  /* Modal that is shown when the user accesses the page */
  const helloThere =
    `<div class="small-modal">
        <div class="small-modal--image">
          <img src="/i/modal-example.png" alt="Suggestion on what information to provide">
        </div>
        <div class="small-modal--content">
          <h1 class="small-modal--header">Hello there!</h1>
          <p class="small-modal--text">Thank you for your interest in this project. The page you are currently on is not yet live to the public. Most of the features such as  authentication and creating projects are not accessible. However, you are free to look around the app!</p>
          <div class="small-modal--actions" style="justify-content: flex-end">
            <button class="small-modal--button" type="button" name="button" onclick="closeModal();" style="width: 100%">Oh man, that's a shame. But I understand!</button>
          </div>
        </div>
      </div>`;

      // First: update modal contents with the splash message to provide positive feedback
     updateModalContent(helloThere);

     // Then: show the modal on the screen ... after a timeout, that is.
     setTimeout(function() {
      showModal();
    }, 2000)

     /* Functionality that updates the modal content with pre-made templates */
function updateModalContent(newContent) {
  // First: delete all innerHTML
  removeModalContent();

  // Then: update the content with the selected template
  modalOverlay.insertAdjacentHTML('beforeEnd', newContent);
}

function removeModalContent() {
  modalOverlay.innerHTML = "";
}

/* Functionality that shows the modal */
function showModal() {
  // Unhide modal overlay's display style
  modalOverlay.parentNode.style.visibility = "visible";

  // Change the modal overlay's opacity from 0 to 1, with a 200ms fade
  modalOverlay.style.opacity = "1";
}

/* Functionality that closes the selected modal */
function closeModal() {
  // Change the modal overlay's opacity from 1 to 0, with a 200ms fade
  modalOverlay.style.opacity = "0";

  // Use a timeout to change the 'visibility' after the 200ms. Also: delete its contents.
  setTimeout(function() {
    modalOverlay.parentNode.style.visibility = "hidden";
    removeModalContent();
  }, 200);
}
