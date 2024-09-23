
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Mentor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.php" class="logo d-flex align-items-center me-auto">
            <h2 class="sitename">Interactive Learning</h2>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="nav-link font-weight-bold">Home</a></li>
                <li><a href="#about" class="nav-link font-weight-bold">About</a></li>
                <li><a href="#contact" class="nav-link font-weight-bold">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="btn-getstarted" href="{{route('register')}}">Get Started</a>
    </div>
</header>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="assets/img/main1.jpg" alt="" data-aos="fade-in">
        <div class="container">
{{--            <?php--}}
{{--            alertMessage();--}}
{{--            success();--}}
{{--            ?>--}}

            <h2 data-aos="fade-up" data-aos-delay="100">Education For A<br>Brighter Tomorrow</h2>
            <p data-aos="fade-up" data-aos-delay="200"></p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="{{route('login')}}" class="btn-get-started">Get Started</a>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="assets/img/students.jpg" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <h3 id="about">About Interactive Learning</h3>
                    <p class="fst-italic">
                        It is an online platform that allows a teacher to communicate with their class and students.
                        It offers the following services:
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Uploading assignments to a lecture</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Downloading uploaded data from the lecture</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Viewing results</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->
</main>

<footer id="contact" class="footer position-relative light-background">
    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Interactive Learning</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Designed and developed by <a href="">Final Year students</a>
        </div>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<!-- Intersection Observer JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');

        const options = {
            threshold: 0.5
        };

        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navLinks.forEach(link => {
                        link.classList.remove('active', 'text-danger');
                        if (link.getAttribute('href').substring(1) === entry.target.id) {
                            link.classList.add('active', 'text-danger');
                        }
                    });
                }
            });
        }, options);

        sections.forEach(section => {
            observer.observe(section);
        });
    });
</script>
</body>
</html>
