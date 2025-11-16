<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Teknologi Nusantara - Inovasi Digital Indonesia</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lucide Icons (via CDN) -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4361ee;
            --secondary: #7209b7;
            --dark: #1e293b;
            --light: #f8fafc;
        }
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        .hero-slider {
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .slide {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            opacity: 0;
            transition: opacity 1s ease;
            background-size: cover;
            background-position: center;
        }
        .slide.active { opacity: 1; }
        .gradient-overlay {
            background: linear-gradient(to right, rgba(0,0,0,0.7), rgba(0,0,0,0.4));
        }
        .stat-card {
            background: linear-gradient(135deg, #dbeafe 0%, #e0e7ff 100%);
        }
        .vision-card { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .mission-card { background: linear-gradient(135deg, #7c3aed, #6d28d9); }
        .service-card:hover { transform: translateY(-8px); }
        .team-card:hover { transform: translateY(-4px); }
        .navbar-scrolled {
            background-color: rgba(255,255,255,0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .nav-link.active {
            color: var(--primary) !important;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-slate-50">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm" id="mainNav">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 bg-gradient-primary bg-clip-text text-transparent"
               style="background: linear-gradient(to right, #4361ee, #7209b7); -webkit-background-clip: text; color: transparent;">
                PT Teknologi Nusantara
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i data-lucide="menu" class="text-dark"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#activities">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Tim</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif --}}
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Slider -->
    <section id="home" class="hero-slider">
        <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200');">
            <div class="gradient-overlay position-absolute w-100 h-100"></div>
        </div>
        <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200');">
            <div class="gradient-overlay position-absolute w-100 h-100"></div>
        </div>
        <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=1200');">
            <div class="gradient-overlay position-absolute w-100 h-100"></div>
        </div>

        <div class="container h-100 position-relative d-flex align-items-center">
            <div class="text-center text-white">
                <h1 class="display-3 fw-bold mb-4 slide-title">Transformasi Digital Untuk Indonesia</h1>
                <p class="lead mb-5 slide-subtitle">Solusi teknologi terdepan untuk bisnis modern</p>
                <div>
                    <a href="#about" class="btn btn-primary btn-lg px-5 py-3 rounded-pill me-3">Pelajari Lebih Lanjut</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill">Hubungi Kami</a>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <button class="btn btn-light btn-lg rounded-circle position-absolute start-4 top-50 translate-middle-y shadow" id="prevSlide">
            <i data-lucide="chevron-left"></i>
        </button>
        <button class="btn btn-light btn-lg rounded-circle position-absolute end-4 top-50 translate-middle-y shadow" id="nextSlide">
            <i data-lucide="chevron-right"></i>
        </button>

        <!-- Indicators -->
        <div class="position-absolute bottom-0 start-50 translate-x-50 mb-4">
            <div id="slideIndicators" class="d-flex gap-2"></div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Tentang Kami</h2>
                <hr class="w-25 mx-auto bg-primary" style="height: 4px;">
            </div>

            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-6">
                    <p class="lead text-muted">
                        PT Teknologi Nusantara adalah perusahaan teknologi informasi terkemuka yang berdedikasi untuk membawa transformasi digital ke seluruh Indonesia. Dengan pengalaman lebih dari 8 tahun, kami telah melayani ratusan klien dari berbagai industri.
                    </p>
                    <p class="text-muted">
                        Kami percaya bahwa teknologi adalah kunci untuk membuka potensi penuh dari setiap bisnis. Dengan tim yang berdedikasi dan metodologi yang terbukti, kami siap menjadi partner terpercaya dalam perjalanan digital transformation Anda.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4">
                        @php
                            $stats = [
                                ['8+', 'Tahun Pengalaman'],
                                ['200+', 'Proyek Selesai'],
                                ['150+', 'Klien Puas'],
                                ['50+', 'Tim Profesional']
                            ];
                        @endphp
                        @foreach($stats as $stat)
                        <div class="col-6">
                            <div class="stat-card p-4 rounded-3 text-center shadow-sm">
                                <h3 class="fw-bold text-primary">{{ $stat[0] }}</h3>
                                <p class="mb-0 text-dark">{{ $stat[1] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="vision-card text-white p-5 rounded-4">
                        <div class="d-flex align-items-center mb-3">
                            <i data-lucide="eye" class="me-3" style="width:40px;height:40px;"></i>
                            <h3 class="h4 fw-bold">Visi</h3>
                        </div>
                        <p>Menjadi perusahaan teknologi terdepan di Indonesia yang memberikan solusi inovatif dan berkelanjutan untuk mendorong transformasi digital nasional.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mission-card text-white p-5 rounded-4">
                        <div class="d-flex align-items-center mb-3">
                            <i data-lucide="target" class="me-3" style="width:40px;height:40px;"></i>
                            <h3 class="h4 fw-bold">Misi</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2">• Mengembangkan produk berkualitas tinggi</li>
                            <li class="mb-2">• Memberdayakan talenta digital Indonesia</li>
                            <li class="mb-2">• Membangun ekosistem digital inklusif</li>
                            <li>• Menjalin kemitraan strategis</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Layanan Kami</h2>
                <hr class="w-25 mx-auto bg-primary" style="height: 4px;">
                <p class="lead text-muted">Solusi teknologi komprehensif untuk pertumbuhan bisnis Anda</p>
            </div>
            <div class="row g-4">
                @php
                    $services = [
                        ['💻', 'Software Development', 'Aplikasi web & mobile custom'],
                        ['☁️', 'Cloud Solutions', 'Migrasi & manajemen cloud'],
                        ['🎨', 'UI/UX Design', 'Desain intuitif & menarik'],
                        ['📊', 'Data Analytics', 'Insight bisnis dari data'],
                        ['🔒', 'Cybersecurity', 'Keamanan aset digital'],
                        ['🤖', 'AI & Machine Learning', 'Otomasi cerdas']
                    ];
                @endphp
                @foreach($layanan as $s)
                <div class="col-md-6 col-lg-4">
                    <div class="card service-card border-0 shadow h-100 p-4">
                        <img src="{{ asset('storage/'.$s->image) }}" class="card-img-top" alt="{{ $s->name }}" style="height:200px; object-fit:cover;">
                        <h5 class="fw-bold">{{ $s->name }}</h5>
                        <p class="text-muted">{{ $s->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Activities -->
    <section id="activities" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Kegiatan Kami</h2>
                <hr class="w-25 mx-auto bg-primary" style="height: 4px;">
            </div>
            <div class="row g-4">
                @php
                    $activities = [
                        ['Workshop Teknologi AI', '15 Okt 2024', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600', 'Pelatihan AI untuk 50+ peserta'],
                        ['Tech Conference 2024', '22 Sep 2024', 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=600', '500+ peserta nasional'],
                        ['CSR - Donasi Komputer', '5 Agt 2024', 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600', '20 unit untuk sekolah terpencil']
                    ];
                @endphp
                @foreach($activity as $a)
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 shadow h-100 overflow-hidden">
                        <img src="{{ asset('storage/'.$a->image) }}" class="card-img-top" alt="{{ $a->name }}" style="height:200px; object-fit:cover;">
                        <div class="card-body">
                            <small class="text-primary"><i data-lucide="calendar"></i> {{ $a->date }}</small>
                            <h5 class="mt-2 fw-bold">{{ $a->name }}</h5>
                            <p class="text-muted small">{{ $a->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team -->
    <section id="team" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Tim Kami</h2>
                <hr class="w-25 mx-auto bg-primary" style="height: 4px;">
            </div>

            <!-- CEO -->
            {{-- <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg p-4" style="background: linear-gradient(135deg, #dbeafe, #ddd6fe);">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-4">
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400" class="rounded-circle w-100" alt="CEO">
                            </div>
                            <div class="col-md-8">
                                <h3 class="fw-bold">Budi Santoso</h3>
                                <p class="text-primary fw-bold">CEO & Founder</p>
                                <p>Visioner dengan 15+ tahun pengalaman di industri teknologi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Leadership -->
            <div class="row g-4">
                @php
                    $leaders = [
                        ['Andi Wijaya', 'CTO', 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400'],
                        ['Siti Nurhaliza', 'CFO', 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400'],
                        ['Rudi Hartono', 'Head of Engineering', 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400']
                    ];
                @endphp
                @foreach($team as $l)
                <div class="col-md-6 col-lg-4">
                    <div class="card team-card border-0 shadow h-100">
                        <img src="{{ asset('storage/'.$l->image) }}" class="card-img-top" alt="{{ $l->title }}" style="height:280px; object-fit:cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $l->name }}</h5>
                            <p class="text-primary">{{ $l->title }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Clients -->
    {{-- <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Klien Kami</h2>
                <hr class="w-25 mx-auto bg-primary" style="height: 4px;">
            </div>
            <div class="row g-4 text-center">
                @foreach(['🏦 Bank Nusantara', '🛒 Retail Group', '📱 Telco Indonesia', '🏥 Healthcare Plus', '📚 Edu Tech', '🚚 Logistics Pro'] as $client)
                <div class="col-4 col-md-2">
                    <div class="p-4 bg-light rounded-3 shadow-sm">
                        <div class="display-4">{{ explode(' ', $client)[0] }}</div>
                        <small class="text-muted">{{ explode(' ', $client, 2)[1] ?? '' }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    <!-- Contact -->
    <section id="contact" class="py-5 text-white" style="background: linear-gradient(135deg, #4361ee, #7209b7);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Hubungi Kami</h2>
                <hr class="w-25 mx-auto bg-white" style="height: 4px;">
                <p class="lead">Mari diskusikan transformasi digital bisnis Anda</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white bg-opacity-10 rounded-4-4">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex p-3 mb-3">
                            <i data-lucide="phone" class="text-white"></i>
                        </div>
                        <h5>Telepon</h5>
                        <p>+62 31 1234 5678</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white bg-opacity-10 rounded-4">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex p-3 mb-3">
                            <i data-lucide="mail" class="text-white"></i>
                        </div>
                        <h5>Email</h5>
                        <p>info@teknusantara.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white bg-opacity-10 rounded-4">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex p-3 mb-3">
                            <i data-lucide="map-pin" class="text-white"></i>
                        </div>
                        <h5>Alamat</h5>
                        <p>Jl. Raya Darmo No. 123, Surabaya</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#" class="text-white mx-2"><i data-lucide="facebook" class="display-6"></i></a>
                <a href="#" class="text-white mx-2"><i data-lucide="instagram" class="display-6"></i></a>
                <a href="#" class="text-white mx-2"><i data-lucide="linkedin" class="display-6"></i></a>
                <a href="#" class="text-white mx-2"><i data-lucide="twitter" class="display-6"></i></a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="fw-bold">PT Teknologi Nusantara</h5>
                    <p class="small">Innovating Indonesia's Digital Future<br>Didirikan 2015</p>
                </div>
                <div class="col-md-3">
                    <h6>Link Cepat</h6>
                    <ul class="list-unstyled">
                        <li><a href="#about" class="text-light text-decoration-none">Tentang</a></li>
                        <li><a href="#services" class="text-light text-decoration-none">Layanan</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Kontak</h6>
                    <p class="small">+62 31 1234 5678<br>info@teknusantara.com</p>
                </div>
                <div class="col-md-3">
                    <p class="small">&copy; 2024 PT Teknologi Nusantara. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            lucide.createIcons();

            // Slider
            let current = 0;
            const slides = $('.slide');
            const titles = [
                "Transformasi Digital Untuk Indonesia",
                "Tim Profesional & Berpengalaman",
                "Inovasi Tanpa Batas"
            ];
            const subtitles = [
                "Solusi teknologi terdepan untuk bisnis modern",
                "Lebih dari 100 project berhasil diselesaikan",
                "Menciptakan solusi untuk masa depan yang lebih baik"
            ];

            function showSlide(n) {
                slides.removeClass('active').eq(n).addClass('active');
                $('.slide-title').text(titles[n]);
                $('.slide-subtitle').text(subtitles[n]);
            }

            $('#nextSlide').click(() => {
                current = (current + 1) % slides.length;
                showSlide(current);
            });
            $('#prevSlide').click(() => {
                current = (current - 1 + slides.length) % slides.length;
                showSlide(current);
            });

            // Auto slide
            setInterval(() => {
                current = (current + 1) % slides.length;
                showSlide(current);
            }, 5000);

            // Navbar active
            $(window).scroll(function() {
                $('section').each(function() {
                    if ($(window).scrollTop() >= $(this).offset().top - 100) {
                        let id = $(this).attr('id');
                        $('.nav-link').removeClass('active');
                        $(`.nav-link[href="#${id}"]`).addClass('active');
                    }
                });

                // Navbar shadow
                if ($(this).scrollTop() > 50) {
                    $('#mainNav').addClass('navbar-scrolled');
                } else {
                    $('#mainNav').removeClass('navbar-scrolled');
                }
            });

            // Smooth scroll
            $('.nav-link, a[href^="#"]').click(function(e) {
                if (this.hash !== "") {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 800);
                }
            });
        });
    </script>
</body>
</html>
