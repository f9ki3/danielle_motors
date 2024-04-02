document.addEventListener("DOMContentLoaded", function(){
    const emailInput = document.getElementById("email");

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    emailInput.addEventListener("input", function() {
        const inputText = emailInput.value;

        // Check if the input matches the email format
        if (!emailRegex.test(inputText)) {
            emailInput.setCustomValidity("Please enter a valid email address.");
        } else {
            emailInput.setCustomValidity("");
        }
    });
})


document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const errorMessage1 = document.getElementById("error-message1");
    const errorMessage2 = document.getElementById("error-message");
    const loginForm = document.getElementById("loginform");

    // Check if the password input field exists
    if (passwordInput) {
        passwordInput.addEventListener("input", function() {
            const password = this.value;
            const regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,13}$/;
            const isValid = regex.test(password);

            if (isValid) {
                errorMessage1.textContent = '';
            } else {
                errorMessage1.textContent = 'Password must be 6-13 characters long and contain at least one special character and one numerical character.';
            }
        });
    }

    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener("input", function() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (password !== confirmPassword) {
                errorMessage2.textContent = "Passwords do not match.";
            } else {
                errorMessage2.textContent = "";
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            const password = passwordInput ? passwordInput.value : "";
            const confirmPassword = confirmPasswordInput ? confirmPasswordInput.value : "";
            const isValidPassword = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,13}$/.test(password);

            if (password !== confirmPassword) {
                errorMessage2.textContent = "Passwords do not match.";
                event.preventDefault(); // Prevent form submission
            } else if (!isValidPassword) {
                errorMessage1.textContent = "Password must be 6-13 characters long and contain at least one special character and one numerical character.";
                event.preventDefault(); // Prevent form submission
            } else {
                errorMessage1.textContent = "";
                errorMessage2.textContent = "";
            }
        });
    }
});



document.addEventListener("DOMContentLoaded", function() {
    const contactInput = document.getElementById("contactInput");

    // Regular expressions to validate Philippine mobile numbers in the format 09xxxxxxxxx
    // and PLDT landline numbers in the format 02xxxxxxx or 0xxxxxxxxx
    const philippineMobileRegex = /^09\d{9}$/;
    const pldtLandlineRegex = /^(02\d{7}|0\d{9})$/;

    contactInput.addEventListener("input", function() {
        const inputText = contactInput.value;

        // Check if the input matches either the Philippine mobile number format or PLDT landline number format
        if (!philippineMobileRegex.test(inputText) && !pldtLandlineRegex.test(inputText)) {
            contactInput.setCustomValidity("Please enter a valid Philippine mobile number in the format 09xxxxxxxxx or a valid PLDT landline number.");
        } else {
            contactInput.setCustomValidity("");
        }
    });
});

