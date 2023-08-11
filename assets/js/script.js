const signUpButton = document.getElementById("signUp"); //Get the DOM of signUp button
const signInButton = document.getElementById("signIn"); //Get the DOM of signIn button
const container = document.getElementById("container"); //Get the DOM of the container

// If the signUpButton is clicked, we will add a class on container.
signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

// If the signInButton is clicked, we will remove a class on container.
signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
