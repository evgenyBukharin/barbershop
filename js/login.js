const loginForm = document.getElementById('loginForm')
if (loginForm !== null) {
    loginForm.addEventListener('submit', (event) => {
        event.preventDefault()
        let orderData = {
            login: loginForm.querySelector('#login').value,
            password: loginForm.querySelector('#password').value,
        }
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest()
            xhr.open('POST', '/php/scripts/auth.php')

            xhr.onload = () => {
                if (xhr.status >= 400) {
                    reject(xhr.response)
                } else {
                    resolve(xhr.response)
                }
            }

            xhr.send(JSON.stringify(orderData))
        }).then((data) => {
            if (data == 'Вы успешно авторизированны!') {
                window.location.href = '/'
            } else {
                createModal(data)
            }
        })
    })
}