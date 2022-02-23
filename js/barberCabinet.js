const confirmBtns = document.querySelectorAll('.confirmOrderBtn')

confirmBtns.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()

        let orderData = {
            date: btn.parentNode.querySelector('.date').attributes.value.value,
            time: btn.parentNode.querySelector('.time').attributes.value.value,
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
            createModal(data)
        })
    })
})