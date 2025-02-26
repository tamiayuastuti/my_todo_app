<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true"> <!--div di gunakan untuk membungkus suatu isi content -->
    <div class="modal-dialog ">
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content"> <!-- from action di gunakan  untuk mengarahkan data ke validasi store -->
            @method('POST')
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1> <!---->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer">{{--Membungkus bagian footer dari modal,yaitu area di bagian bawah modal tempat tombol berada. --}}
                <button type="button" class="btn btn-primary-subtle" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary ">Tambah</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST')
            @csrf
            <div class="modal-header bg-primary-subtle">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-secondary">
                <input type="text" id="taskListId" name="list_id" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
                <div class="mb-3">
                    <label for="description " class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi"></textarea>
                </div>
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-control bg-white" name="priority" id="priority">
                       <option value="low">Low</option>        {{-- rendah  --}}
                        <option value="medium">Medium</option> {{-- sedang --}}
                        <option value="high">High</option>     {{-- tinggi --}}
                    </select>
                </div>
            </div>
            <div class="modal-footer bg-primary-subtle">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-primary">Tambah</button>
            </div>
        </form>
</div>
</div>