const loginForm = document.getElementById("login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const username = loginForm.nomeUsuario.value;
    const password = loginForm.senha.value;

    if (username === "usuario" && password === "senha") {
        window.location.replace("nova_partida.php");
    } else {
        loginErrorMsg.style.opacity = 1;
    }
})