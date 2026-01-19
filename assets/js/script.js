document.addEventListener('DOMContentLoaded', function() {
    const backToTopBtn = document.getElementById('back-to-top');

    if (!backToTopBtn) return;

    // スクロール量に応じてボタンの表示/非表示を切り替え
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) { // 300pxスクロールしたら表示
            backToTopBtn.classList.add('is-visible');
        } else {
            backToTopBtn.classList.remove('is-visible');
        }
    });

    // ボタンクリック時にページ上部へスムーススクロール
    backToTopBtn.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});