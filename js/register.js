const regForm = document.getElementById('regForm')
regForm.addEventListener('submit', (event) => {
    event.preventDefault()
    let orderData = {
        name: regForm.querySelector('#name').value,
        surname: regForm.querySelector('#surname').value,
        login: regForm.querySelector('#login').value,
        password: regForm.querySelector('#password').value,
        email: regForm.querySelector('#email').value,
    }
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open('POST', '/php/scripts/reg.php')
        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response)
            } else {
                resolve(xhr.response)
            }
        }
        xhr.send(JSON.stringify(orderData))
    }).then(() => {
        window.location.href = '/php/pages/login.php'
    })
})