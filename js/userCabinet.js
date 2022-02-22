const deleteBtns = document.querySelectorAll('.deleteOrderBtn')
const changePassForm = document.getElementById('changePassForm')

deleteBtns.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()

        let orderData = {
            barber_id: btn.parentNode.querySelector('.master').attributes.value.value,
            user_id: btn.parentNode.querySelector('.user').attributes.value.value,
            date: btn.parentNode.querySelector('.date').attributes.value.value,
            time: btn.parentNode.querySelector('.time').attributes.value.value,
        }
        console.log(orderData);
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest()
            xhr.open('POST', '/php/scripts/deleteOrder.php')

            xhr.onload = () => {
                if (xhr.status >= 400) {
                    reject(xhr.response)
                } else {
                    resolve(xhr.response)
                }
            }

            xhr.send(JSON.stringify(orderData))
        }).then((data) => {
            createModal(data)
            btn.parentNode.remove()
        })
    })
})

changePassForm.addEventListener('submit', (event) => {
    event.preventDefault()
    let passData = {
        last_pass: changePassForm.querySelector('#last_pass').value,
        new_pass: changePassForm.querySelector('#new_pass').value,
    }
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open('POST', '/php/scripts/changePass.php')

        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response)
            } else {
                resolve(xhr.response)
            }
        }

        xhr.send(JSON.stringify(passData))
    }).then((data) => {
        createModal(data)
    })
})