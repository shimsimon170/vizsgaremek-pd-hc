document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.querySelector("#signUpForm form");

    registerForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission until we validate

        const password = document.querySelector("#registerPassword").value;
        const confirmPassword = document.querySelector("#registerRePassword").value;

        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return;
        }

        // If validation passes, submit the form normally
        registerForm.submit();

        // Redirect after a short delay to allow processing
        setTimeout(() => {
            window.location.href = "fullmenu.php"; // Redirect after submission
        }, 1000); 
    });
});
