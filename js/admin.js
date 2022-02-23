const barberForm = document.getElementById('barberForm')
const deleteBarberForm = document.getElementById('deleteBarberForm')
const serviceForm = document.getElementById('serviceForm')
const deleteServiceForm = document.getElementById('deleteServiceForm')

barberForm.addEventListener('submit', (event) => {
    event.preventDefault()
    let barberData = {
        name: barberForm.querySelector('#name').value,
        surname: barberForm.querySelector('#surname').value,
        login: barberForm.querySelector('#login').value,
        password: barberForm.querySelector('#password').value,
        email: barberForm.querySelector('#email').value,
        role: barberForm.querySelector('#role').value,
        expierence: barberForm.querySelector('#expierence').value,
    }
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open('POST', '/php/scripts/addBarber.php')

        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response)
            } else {
                resolve(xhr.response)
            }
        }

        xhr.send(JSON.stringify(barberData))
    }).then((data) => {
        createModal(data)
    })
})

deleteBarberForm.addEventListener('submit', (event) => {
    event.preventDefault()
    let barberData = {
        barber_login: deleteBarberForm.querySelector('#barber_login').value,
    }
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open('POST', '/php/scripts/deleteBarber.php')

        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response)
            } else {
                resolve(xhr.response)
            }
        }

        xhr.send(JSON.stringify(barberData))
    }).then((data) => {
        createModal(data)
    })
})

serviceForm.addEventListener('submit', (event) => {
    event.preventDefault()
    let serviceData = new FormData(serviceForm)
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open('POST', '/php/scripts/addService.php')

        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response)
            } else {
                resolve(xhr.response)
            }
        }

        xhr.send(serviceData)
    }).then((data) => {
        createModal(data)
    })
})

deleteServiceForm.addEventListener('submit', (event) => {
    event.preventDefault()
    let serviceData = {
        service_id: deleteServiceForm.querySelector('#service_id').value,
    }
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open('POST', '/php/scripts/deleteService.php')

        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response)
            } else {
                resolve(xhr.response)
            }
        }

        xhr.send(JSON.stringify(serviceData))
    }).then((data) => {
        createModal(data)
    })
})