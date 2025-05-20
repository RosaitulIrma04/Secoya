document.addEventListener('DOMContentLoaded', function () {
    const showRegister = document.getElementById('show-register');
    const showLogin = document.getElementById('show-login');
    const backToLogin = document.getElementById('back-to-login');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    if (showRegister) {
        showRegister.onclick = function(e) {
            e.preventDefault();
            loginForm.style.display = 'none';
            registerForm.style.display = 'flex';
        };
    }
    if (showLogin) {
        showLogin.onclick = function(e) {
            e.preventDefault();
            registerForm.style.display = 'none';
            loginForm.style.display = 'flex';
        };
    }
    if (backToLogin) {
        backToLogin.onclick = function(e) {
            e.preventDefault();
            registerForm.style.display = 'none';
            loginForm.style.display = 'flex';
        };
    }
});
