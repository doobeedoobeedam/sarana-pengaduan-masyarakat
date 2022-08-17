<div id="dialogDetail"
class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl font-semibold text-dark mb-4">Detail</h1>
    <div class="dialog-body mb-4"></div>
    <div class="flex justify-end">
        <button id="closeDialogDetail" class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Close</button>
    </div>
</div>

<div id="dialogDelete"
class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl font-semibold text-dark">Delete</h1>
    <p class="mb-4 text-lg text-secondary">Yakin ingin menghapus?</p>
    <form action="" method="post" id="formDelete">
        @csrf
        @method('delete')
        <div class="flex justify-end">
            <button type="button" id="closeDialogDelete" class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">Close</button>
            <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus</button>
        </div>
    </form>
</div>