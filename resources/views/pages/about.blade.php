@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg" style="width: 400px; border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #a2d2ff, #cde7f7); color: white;">
            <div class="card-header text-center p-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2); font-family: 'Comic Sans MS', cursive;">
                <h3 class="mb-0">💙My Biodata💙</h3>
            </div>
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <img src="assests/images/mii.jpg" alt="Profile Image" class="rounded-circle border border-3 border-light shadow" width="120px" height="120px" style="object-fit: cover; border: 5px solid #87cefa;">
                </div>
                <h4 class="fw-bold" style="color: #4682b4;" id="name">Tami Ayu Astuti 🐰</h4>
                <p class="text-light-50" id="role">💻 Web Developer ✨</p>
                <hr style="border-color: rgba(255, 255, 255, 0.3);">
                <div class="text-start px-3">
                    <p>📧 <strong>Email:</strong> <span id="email">tami@gmail.com</span></p>
                    <p>📞 <strong>No. Telepon:</strong> <span id="phone">081213911015</span></p>
                    <p>💖 <strong>Bio:</strong> <span id="bio">Aku suka minuman boba🧋</span></p>
                </div>
                <button class="btn btn-light w-100 mt-3" style="background: #4682b4; color: white; border-radius: 25px;" onclick="editProfile()">✨ Edit Profil ✨</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit Profil -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="editName" class="form-label">Nama</label>
                    <input type="text" id="editName" class="form-control" value="Tami Ayu Astuti">
                    
                    <label for="editRole" class="form-label mt-2">Pekerjaan</label>
                    <input type="text" id="editRole" class="form-control" value="Web Developer">
                    
                    <label for="editEmail" class="form-label mt-2">Email</label>
                    <input type="email" id="editEmail" class="form-control" value="tami@gmail.com">
                    
                    <label for="editPhone" class="form-label mt-2">No. Telepon</label>
                    <input type="text" id="editPhone" class="form-control" value="081213911015">
                    
                    <label for="editBio" class="form-label mt-2">Bio</label>
                    <textarea id="editBio" class="form-control">Aku suka minum boba!🧋</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="saveProfile()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    
    <script>
        function editProfile() {
            $('#editProfileModal').modal('show');
        }
        
        function saveProfile() {
            document.getElementById('name').innerText = document.getElementById('editName').value;
            document.getElementById('role').innerText = document.getElementById('editRole').value;
            document.getElementById('email').innerText = document.getElementById('editEmail').value;
            document.getElementById('phone').innerText = document.getElementById('editPhone').value;
            document.getElementById('bio').innerText = document.getElementById('editBio').value;
            $('#editProfileModal').modal('hide');
        }
    </script>
@endsection
