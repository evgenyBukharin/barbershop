cards = document.querySelectorAll('.card')
cards.forEach(card => {
    card.addEventListener('submit', (event) => {
        event.preventDefault();
        document.location.href = "/php/pages/service.php?serviceId=" + card.serviceId.value
    })
});