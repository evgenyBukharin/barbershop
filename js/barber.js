const barbers = document.querySelectorAll('.card')

barbers.forEach((barber) => {
    barber.addEventListener('submit', (event) => {
        event.preventDefault()
        let formDate = new Date(barber.querySelector('#date').value)
        if (barber.querySelector('#date').value == '') {
            // тут вызов модалки
            return
        }
        let orderData = {
            barber_id: barber.querySelector('#barber_id').value,
            service_id: barber.querySelector('#service_id').value,
            date: formatDate(formDate),
            time: barber.querySelector('#time').value,
        }
        const xhr = new XMLHttpRequest()

        xhr.open('POST', '/php/scripts/makeOrder.php')

        xhr.send(JSON.stringify(orderData))
    })
})

function formatDate(date) {
    let dd = date.getDate();
    if (dd < 10) dd = '0' + dd;
    let mm = date.getMonth() + 1;
    if (mm < 10) mm = '0' + mm;
    let yy = date.getFullYear() % 100;
    if (yy < 10) yy = '0' + yy;
    return dd + '-' + mm + '-' + yy;
}