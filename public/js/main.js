function openSidebar() {
    document.querySelector(".sidebar").classList.toggle("hidden");
}

const alertBtn = document.querySelectorAll('.closealertbutton');
alertBtn.forEach(btn => {
    const pid = btn.parentElement;
    btn.addEventListener('click', function () {
        pid.classList.toggle('hidden');
    });

    setTimeout(function () {
        pid.classList.toggle('hidden');
    }, 3000);
});

var openDetail = document.querySelectorAll('.openDetail');
var closeDialogDetail = document.getElementById('closeDialogDetail');
var overlay = document.getElementById('overlay');
var dialogDetail = document.getElementById('dialogDetail');
var body = document.querySelector('.dialog-body');

openDetail.forEach(o => {
    o.addEventListener('click', function() {
        overlay.classList.remove('hidden');
        dialogDetail.classList.remove('hidden');
        body.innerHTML = `
            <div class="flex">
                <div class="font-semibold text-danger mr-10 [&>p]:mb-5">
                    <p>Nama</p>
                    <p>Username</p>
                    <p>Telepon</p>
                </div>
                <div class="[&>p]:mb-5 text-secondary">
                    <p>${o.dataset.nama}</p>
                    <p>${o.dataset.username}</p>
                    <p>${o.dataset.telepon}</p>
                </div>
            </div>
        `;
    })
});

closeDialogDetail.addEventListener('click', function () {
    dialogDetail.classList.add('hidden');
    overlay.classList.add('hidden');
});

var deleteBtn = document.querySelectorAll('.deleteBtn');
var dialogDelete = document.getElementById('dialogDelete');
var closeDialogDelete = document.getElementById('closeDialogDelete');
const formDelete = document.querySelector('#formDelete');

deleteBtn.forEach(o => {
    o.addEventListener('click', function() {
        overlay.classList.remove('hidden');
        dialogDelete.classList.remove('hidden');
        formDelete.setAttribute('action', '/masyarakat/'+o.dataset.id);
    });
});

closeDialogDelete.addEventListener('click', function () {
    dialogDelete.classList.add('hidden');
    overlay.classList.add('hidden');
});
