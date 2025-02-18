@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Saya - Navbar</title>
    </head>

    <body>
        <!-- Halaman Profil -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary-subtle text-center">
                            <h3>Profil Pengguna</h3>
                        </div>
                        <div class="card-body bg-primary">
                            <div class="text-center mb-4">
                                <img src="assests/images/bg1.jpg" alt="Profile Image" class="rounded-circle" width="150px" height="140px">
                            </div>
                            <h4 class="text-center">Tami Ayu Astuti</h4>
                            <p class="text-center text-muted">Web Developer</p>
                            <hr>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="tami@example.com"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="phone" value="081234567890" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="bio" rows="3" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula ut nisi vel scelerisque.</textarea>
                            </div>
                            <div class="text-center">
                                <a href="edit-profile.html" class="btn btn-secondary">Edit Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS dan dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

    </body>

    </html>
@endsection
