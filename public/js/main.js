function openSidebar() {
    document.querySelector(".sidebar").classList.toggle("hidden");
}

function previewImage() {
    const inputImage = document.querySelector('#lampiran');
    const previewImage = document.querySelector('.previewImage');

    previewImage.classList.add('w-[200px]');
    previewImage.classList.add('mb-2');
    previewImage.classList.add('block');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(inputImage.files[0]);
    oFReader.onload = function(oFRevent) {
        previewImage.src = oFRevent.target.result;
    }
}

const alertBtn = document.querySelectorAll('.closealertbutton');
alertBtn.forEach(btn => {
    const pid = btn.parentElement;
    btn.addEventListener('click', () => {
        pid.classList.toggle('hidden');
    });

    setTimeout(() => {
        pid.classList.toggle('hidden');
    }, 5000);
});

var openDetail = document.querySelectorAll('.openDetail');
var closeDialogDetail = document.getElementById('closeDialogDetail');
var overlay = document.getElementById('overlay');
var dialogDetail = document.getElementById('dialogDetail');
var body = document.querySelector('.dialog-body');

openDetail.forEach(o => {
    o.addEventListener('click', () => {
        overlay.classList.remove('hidden');
        dialogDetail.classList.remove('hidden');
        body.innerHTML = `
            <div class="flex">
                <div class="font-semibold text-sm uppercase text-danger mr-8 [&>p]:mb-5">
                    <p>Nama</p>
                    ${o.dataset.username ? `<p>Username</p>` : ``}
                    <p>Telepon</p>
                    <p>Role</p>
                </div>
                <div class="[&>p]:mb-5 text-dark text-sm">
                    <p>${o.dataset.nama}</p>
                    ${o.dataset.username ? `<p>${o.dataset.username}</p>` : ``}
                    <p>${o.dataset.telepon}</p>
                    <p class="capitalize">${o.dataset.level}</p>
                </div>
            </div>
        `;
    })
});

closeDialogDetail.addEventListener('click', () => {
    dialogDetail.classList.add('hidden');
    overlay.classList.add('hidden');
});

var deleteBtn = document.querySelectorAll('.deleteBtn');
var dialogDelete = document.getElementById('dialogDelete');
var closeDialogDelete = document.getElementById('closeDialogDelete');
const formDelete = document.querySelector('#formDelete');

deleteBtn.forEach(o => {
    o.addEventListener('click', () => {
        overlay.classList.remove('hidden');
        dialogDelete.classList.remove('hidden');
        formDelete.setAttribute('action', '/masyarakat/'+o.dataset.id);
    });
});

var deletePengaduan = document.querySelectorAll('.deletePengaduan');
deletePengaduan.forEach(o => {
    o.addEventListener('click', () => {
        overlay.classList.remove('hidden');
        dialogDelete.classList.remove('hidden');
        formDelete.setAttribute('action', '/pengaduan/'+o.dataset.id);
    });
});

var deleteTanggapan = document.querySelectorAll('.deleteTanggapan');
deleteTanggapan.forEach(o => {
    o.addEventListener('click', () => {
        overlay.classList.remove('hidden');
        dialogDelete.classList.remove('hidden');
        formDelete.setAttribute('action', '/tanggapan/'+o.dataset.id);
    });
});

var deletePengguna = document.querySelectorAll('.deletePengguna');
deletePengguna.forEach(o => {
    o.addEventListener('click', () => {
        overlay.classList.remove('hidden');
        dialogDelete.classList.remove('hidden');
        formDelete.setAttribute('action', '/pengguna/'+o.dataset.id);
    });
});

closeDialogDelete.addEventListener('click', () => {
    dialogDelete.classList.add('hidden');
    overlay.classList.add('hidden');
});
