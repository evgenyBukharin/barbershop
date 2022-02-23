const modal = document.getElementById('modal__background')
const modalData = document.getElementById('data')
const modalBtn = document.getElementById('closeModal')

function createModal(data) {
    modal.classList.remove('unvisible')
    modalData.innerHTML = data
    document.body.style.overflow = 'hidden'
}

modalBtn.addEventListener('click', () => {
    modal.classList.add('unvisible')
    document.body.style.overflow = 'visible'
})