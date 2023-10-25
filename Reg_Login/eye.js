// function togglePasswordVisibility() {
//     const passwordInput = document.getElementById("password");
//     const toggleButton = document.querySelector(".toggle-password");
    
//     if (passwordInput.type === "password") {
//         passwordInput.type = "text";
//         toggleButton.innerHTML = '<i class="material-symbols-sharp">visibility_off</i>';
//     } else {
//         passwordInput.type = "password";
//         toggleButton.innerHTML = '<i class="material-symbols-sharp">visibility</i>';
//     }
// }

// function togglePasswordVisibility_1() {
//     const passwordInput = document.getElementById("c_password");
//     const toggleButton = document.querySelector(".toggle-password");
    
//     if (passwordInput.type === "c_password") {
//         passwordInput.type = "text";
//         toggleButton.innerHTML = '<i class="material-symbols-sharp">visibility_off</i>';
//     } else {
//         passwordInput.type = "c_password";
//         toggleButton.innerHTML = '<i class="material-symbols-sharp">visibility</i>';
//     }
// }

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


