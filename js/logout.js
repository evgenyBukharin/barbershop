const logoutBtn = document.getElementById('logoutBtn')
logoutBtn.addEventListener('click', (event) => {
    event.preventDefault()
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open('POST', '/php/scripts/logout.php')

        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response)
            } else {
                resolve(xhr.response)
            }
        }

        xhr.send()
    }).then((data) => {
        if (data == 'Вы вышли из аккаунта') {
            window.location.href = '/'
        } else {
            createModal(data)
        }
    })
})