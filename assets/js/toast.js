var button__ = document.getElementById('button')
var toasts__ = document.getElementById('toasts')

// button__.addEventListener('click', () => createNotification())

function createNotification(message) {
    const notif = document.createElement('div')
    notif.classList.add('toast')

    notif.innerText = message;

    toasts__.appendChild(notif)

    setTimeout(() => {
       notif.remove()
    }, 1000);
}