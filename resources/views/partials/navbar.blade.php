<!DOCTYPE html>
<html lang="id">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Saya - Navbar</title>
    <style>
        /* CSS untuk indikator titik merah */
        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;   
            width: 10px;
            height: 10px;
            background-color: red;
            border-radius: 50%;
            display: none; /* Default tidak ditampilkan */
        }

        .notification-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            background-color: #333;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item a {
            color: #fff;
            text-decoration: none;
        }
    </style>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-primary navbar-dark sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <div class="row my-3">
            <div class="col-10 mx-auto">
                <form action="{{ route('home') }}" method="GET" class="d-flex gap-2">
                    <input type="text" class="form-control" name="query" placeholder="Cari tugas atau list..."
                        value="{{ request()->query('query') }}">
                    <button type="submit" class="btn btn-outline-white text-white"><i class="bi bi-search-heart"></i></button>
                </form>
            </div>
        </div>

        <div class="navbar-nav align-items-center ms-auto">
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="notificationToggle">
                        <i class="bi bi-bell" id="bellIcon">
                            <!-- Indikator notifikasi baru (titik merah) -->
                            <span id="notificationBadge" class="notification-badge"></span>
                        </i>
                        <span class="d-none d-lg-inline-flex text-white">Notifikasi</span>
                    </a>
                    <div id="notificationDropdown"
                        class="dropdown-menu dropdown-menu-end bg-primary-subtle text-black border-primary-subtle border-7 border-color rounded-3 rounded-bottom m-0">
                        <!-- Menampilkan notifikasi baru yang baru ditambahkan -->
                        @if(session('newTaskList'))
                            <div class="notification-item bg-primary">
                                <a href="#">list {{ session('newTaskList')->name }} berhasil di buat</a>
                            </div>
                        @else
                            <p>Tidak ada notifikasi.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="assests/images/bg1.jpg" alt=""
                        style="width: 40px; height: 40px" />
                    <span class="d-none d-lg-inline-flex text-white">Tami Ayu Astuti</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{ route('about') }}">My Profile</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

    <script>
        // Fungsi untuk menampilkan titik merah
        function showNotificationBadge() {
            document.getElementById("notificationBadge").style.display = "block";
        }

        // Fungsi untuk menghilangkan titik merah ketika notifikasi diklik
        function hideNotificationBadge() {
            document.getElementById("notificationBadge").style.display = "none";
        }

        // Menampilkan titik merah setelah 3 detik, menandakan notifikasi baru
        setTimeout(function () {
            showNotificationBadge(); // Tampilkan titik merah setelah 3 detik
        }, 3000);

        // Event listener untuk menghilangkan titik merash ketika ikon lonceng diklik
        document.getElementById("bellIcon").addEventListener("click", function() {
            hideNotificationBadge(); // Menghilangkan titik merah ketika ikon lonceng diklik
        });
    </script>

</body>

</html>