const finishOrderBtns = document.querySelectorAll('.finishOrderBtn')
const confirmBtns = document.querySelectorAll('.confirmOrderBtn')

finishOrderBtns.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()
        let orderData = {
            barber_id: btn.parentNode.parentNode.querySelector('.master').attributes.value.value,
            user_id: btn.parentNode.parentNode.querySelector('.user').attributes.value.value,
            date: btn.parentNode.parentNode.querySelector('.date').attributes.value.value,
            time: btn.parentNode.parentNode.querySelector('.time').attributes.value.value,
        }
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
            btn.parentNode.parentNode.remove()
        })
    })
})

confirmBtns.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()
        let orderData = {
            date: btn.parentNode.parentNode.querySelector('.date').attributes.value.value,
            time: btn.parentNode.parentNode.querySelector('.time').attributes.value.value,
        }
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest()
            xhr.open('POST', '/php/scripts/confirmOrder.php')

            xhr.onload = () => {
                if (xhr.status >= 400) {
                    reject(xhr.response)
                } else {
                    resolve(xhr.response)
                }
            }

            xhr.send(JSON.stringify(orderData))
        }).then((data) => {
            if (data == "Запись подтверждена") {
                window.location.reload()
            } else {
                createModal(data)
            }
        })
    })
})