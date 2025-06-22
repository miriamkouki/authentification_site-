// JavaScript to handle form toggle
document.getElementById("show-signup").addEventListener("click", function(e) {
    e.preventDefault(); // Prevent the default anchor action
    document.getElementById("login-form").style.display = "none";
    document.getElementById("signup-form").style.display = "block";
});

document.getElementById("show-login").addEventListener("click", function(e) {
    e.preventDefault(); // Prevent the default anchor action
    document.getElementById("signup-form").style.display = "none";
    document.getElementById("login-form").style.display = "block";
});
