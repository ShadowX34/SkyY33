<?php
require 'includes/db_connect.php';
$adminPhotos = $pdo->query("SELECT filename FROM gallery_photos ORDER BY id DESC")->fetchAll(PDO::FETCH_COLUMN);
$adminPhotosJson = json_encode(array_values($adminPhotos), JSON_UNESCAPED_UNICODE);
?>
<?php
$pageCss = 'gallery.css';
require_once 'includes/header.php';
?>


    <!-- ===== ОСНОВНОЙ КОНТЕНТ ===== -->
    <main class="gallery-page">

        <h1 class="page-title">ГАЛЕРЕЯ</h1>

        <!-- Сетка фотографий (динамически подставляется JS) -->
        <div class="photo-grid" id="photoGrid">
             <!-- Заполняется через JavaScript -->
        </div>

        <!-- Пагинация -->
        <nav class="gallery-pagination" id="pagination">
            <!-- Заполняется через JavaScript -->
        </nav>

        <!-- Разделитель -->
        <div class="section-divider"></div>

        <!-- ===== ВИДЕО ===== -->
        <h2 class="video-section-title">ВИДЕО</h2>


        <!-- Ряд 1 -->
        <div class="video-grid">
            <div class="video-card">
                <div class="video-year">2022</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/ZKb-3bqPpvQ"
                        title="Видео 2024 - 1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2022</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/G4-eBddF4Xo"
                        title="Видео 2024 - 2"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2022</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/N6MBwWyoxs4"
                        title="Видео 2024 - 3"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Ряд 2 -->
        <div class="video-grid" style="margin-top:30px;">
            <div class="video-card">
                <div class="video-year">2022</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/pE1s0u3yS2A"
                        title="Видео 2023 - 1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2021</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/Iuxp6tCWA6A"
                        title="Видео 2023 - 2"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2021</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/-3lxkTTXc1Q"
                        title="Видео 2023 - 3"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Ряд 3 -->
        <div class="video-grid" style="margin-top:30px;">
            <div class="video-card">
                <div class="video-year">2021</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/sXaws0VfiwM"
                        title="Видео 2022 - 1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2021</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/OJiq3GQcbZQ"
                        title="Видео 2022 - 2"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2020</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/jnwGj5PE_b8"
                        title="Видео 2022 - 3"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Ряд 4 -->
        <div class="video-grid" style="margin-top:30px;">
            <div class="video-card">
                <div class="video-year">2020</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/Fn3rI7Tnr4U"
                        title="Видео 2021 - 1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2019</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/PnB6G9mAqDs"
                        title="Видео 2021 - 2"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

    </main>

    <!-- ===== ПОДВАЛ ===== -->
    

    <!-- ===== ЛАЙТБОКС ===== -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-inner">
            <button class="lightbox-close" id="lightboxClose"><i class="fas fa-times"></i></button>
            <button class="lightbox-nav lightbox-prev" id="lightboxPrev"><i class="fas fa-chevron-left"></i></button>
            <img src="" alt="Фото" id="lightboxImg">
            <button class="lightbox-nav lightbox-next" id="lightboxNext"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <script>

    const PHOTOS_PER_PAGE_DEFAULT = 24; // 6 рядов × 4

    const PHOTOS = [];

    for (let i = 1; i <= 328; i++) {
        PHOTOS.push(`images/gallery/${i}.jpg`);
    }
    // Admin-uploaded photos
    const adminPhotos = <?= $adminPhotosJson ?>;
    adminPhotos.forEach(f => PHOTOS.push(`images/gallery/${f}`));

    const TOTAL_PAGES = Math.ceil(PHOTOS.length / PHOTOS_PER_PAGE_DEFAULT);

    // ЛОГИКА ПАГИНАЦИИ

    let currentPage = 1;
    let lightboxIndex = 0;
    let currentPagePhotos = [];

    function getPhotosForPage(page) {
        const start = (page - 1) * PHOTOS_PER_PAGE_DEFAULT;
        return PHOTOS.slice(start, start + PHOTOS_PER_PAGE_DEFAULT);
    }

    function renderGrid(page) {
        const grid = document.getElementById('photoGrid');
        currentPagePhotos = getPhotosForPage(page);
        grid.innerHTML = '';

        currentPagePhotos.forEach((src, idx) => {
            const item = document.createElement('div');
            item.className = 'photo-item';
            item.innerHTML = `
                <div class="photo-placeholder">
                    <i class="fas fa-image"></i>
                    <span>${src.split('/').pop()}</span>
                </div>`;
           
            const img = new Image();
            img.onload = () => {
                item.innerHTML = `<img src="${src}" alt="Фото ${idx + 1}" loading="lazy">`;
                item.querySelector('img').addEventListener('click', () => openLightbox(idx));
            };
            img.onerror = () => { /* placeholder остаётся */ };
            img.src = src;

            item.addEventListener('click', () => openLightbox(idx));
            grid.appendChild(item);
        });

        // Плавный скролл к галерее
        if (page !== 1) {
            document.querySelector('.page-title').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function renderPagination(activePage) {
        const nav = document.getElementById('pagination');
        nav.innerHTML = '';

        // Кнопка «назад»
        const prev = document.createElement('button');
        prev.className = 'page-btn arrow';
        prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prev.disabled = activePage === 1;
        prev.style.opacity = activePage === 1 ? '0.4' : '1';
        prev.addEventListener('click', () => { if (currentPage > 1) goToPage(currentPage - 1); });
        nav.appendChild(prev);

        for (let i = 1; i <= TOTAL_PAGES; i++) {
            const btn = document.createElement('button');
            btn.className = 'page-btn' + (i === activePage ? ' active' : '');
            btn.textContent = i;
            btn.addEventListener('click', () => goToPage(i));
            nav.appendChild(btn);
        }

        // Кнопка «вперёд»
        const next = document.createElement('button');
        next.className = 'page-btn arrow';
        next.innerHTML = '<i class="fas fa-chevron-right"></i>';
        next.disabled = activePage === TOTAL_PAGES;
        next.style.opacity = activePage === TOTAL_PAGES ? '0.4' : '1';
        next.addEventListener('click', () => { if (currentPage < TOTAL_PAGES) goToPage(currentPage + 1); });
        nav.appendChild(next);
    }

    function goToPage(page) {
        currentPage = page;
        renderGrid(page);
        renderPagination(page);
    }

    // ЛАЙТБОКС 
    function openLightbox(idx) {
        lightboxIndex = idx;
        const src = currentPagePhotos[idx];
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('open');
        document.body.style.overflow = '';
    }

    document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) closeLightbox();
    });

    document.getElementById('lightboxPrev').addEventListener('click', () => {
        lightboxIndex = (lightboxIndex - 1 + currentPagePhotos.length) % currentPagePhotos.length;
        document.getElementById('lightboxImg').src = currentPagePhotos[lightboxIndex];
    });

    document.getElementById('lightboxNext').addEventListener('click', () => {
        lightboxIndex = (lightboxIndex + 1) % currentPagePhotos.length;
        document.getElementById('lightboxImg').src = currentPagePhotos[lightboxIndex];
    });

    document.addEventListener('keydown', (e) => {
        if (!document.getElementById('lightbox').classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') document.getElementById('lightboxPrev').click();
        if (e.key === 'ArrowRight') document.getElementById('lightboxNext').click();
    });

    // БУРГЕР-МЕНЮ

    document.addEventListener('DOMContentLoaded', function () {
        // Инициализация галереи
        goToPage(1);
    });
    </script>

    




<?php require_once 'includes/footer.php'; ?>
