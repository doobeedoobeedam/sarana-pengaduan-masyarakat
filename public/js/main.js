function openSidebar() {
    document.querySelector(".sidebar").classList.toggle("hidden");
}

const alertBtn = document.querySelectorAll('.closealertbutton');
alertBtn.forEach(btn => {
    btn.addEventListener('click', function() {
        const pid = btn.parentElement;
        // console.log(pid)
        pid.classList.toggle('hidden');
    })
});