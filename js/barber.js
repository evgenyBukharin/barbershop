const barbers = document.querySelectorAll(".card");

barbers.forEach((barber) => {
    barber.querySelector("#date").addEventListener("change", () => {
        barber.querySelector("#timeContainer").style = "display: block";
        let formData = new FormData();
        formData.append("date", formatDate(new Date(barber.querySelector("#date").value)));
        formData.append("masterId", barber.querySelector("#barber_id").value);
        fetch("/php/scripts/getNotFreeTime.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((response) => {
                let timeTable = ["9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00"];
                response.forEach((time) => {
                    timeTable.splice(timeTable.findIndex(checkTime), 1);
                    function checkTime(t) {
                        return t == time.time;
                    }
                });
                let innerHTML = "";
                timeTable.forEach((time) => {
                    innerHTML += '<option value="' + time + '">' + time + "</option>";
                });
                barber.querySelector("#time").innerHTML = innerHTML;
            });
    });
    barber.addEventListener("submit", (event) => {
        event.preventDefault();
        let formDate = new Date(barber.querySelector("#date").value);
        let orderData = {
            barber_id: barber.querySelector("#barber_id").value,
            user_id: barber.querySelector("#user_id").value,
            service_id: barber.querySelector("#service_id").value,
            date: formatDate(formDate),
            time: barber.querySelector("#time").value,
        };
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "/php/scripts/makeOrder.php");
            xhr.onload = () => {
                if (xhr.status >= 400) {
                    reject(xhr.response);
                } else {
                    resolve(xhr.response);
                }
            };
            xhr.send(JSON.stringify(orderData));
        }).then((data) => {
            createModal(data);
        });
    });
});

function formatDate(date) {
    let dd = date.getDate();
    if (dd < 10) dd = "0" + dd;
    let mm = date.getMonth() + 1;
    if (mm < 10) mm = "0" + mm;
    let yy = date.getFullYear() % 100;
    if (yy < 10) yy = "0" + yy;
    return dd + "-" + mm + "-" + yy;
}
