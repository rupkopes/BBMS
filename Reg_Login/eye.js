function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const toggleButton = passwordInput.nextElementSibling.querySelector("i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.textContent = "visibility_off";
    } else {
        passwordInput.type = "password";
        toggleButton.textContent = "visibility";
    }
}


