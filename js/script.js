// Show/Hide password feature
const showPassword = () => {
    const passwordField = document.querySelectorAll('#password')
    const showPassword = document.querySelectorAll('.showPassword')
    if (showPassword.innerText == 'Show Password') {
        showPassword.innerText = 'Hide Password'
        passwordField.type = 'text'
    } else if (showPassword.innerText == 'Hide Password') {
        passwordField.type = 'password'
        showPassword.innerText = 'Show Password'
    }
}