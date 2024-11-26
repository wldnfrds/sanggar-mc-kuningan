<!-- Footer-->
<footer>
    <div class="container text-center">
        <p>&copy; 2024 Sanggar MC Kuningan. All rights reserved.</p>
        <div class="social-links">
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/sanggarmckuningan/"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>
<!-- Portfolio Modals-->
<!-- Portfolio item 1 modal popup-->
<!-- Portfolio item 2 modal popup-->
<!-- Portfolio item 3 modal popup-->
<!-- Portfolio item 4 modal popup-->
<!-- Portfolio item 5 modal popup-->
<!-- Portfolio item 6 modal popup-->
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Jika ada modal sukses, tampilkan dan tutup setelah 1 detik
        if (document.getElementById('successModal')) {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
            setTimeout(function() {
                successModal.hide();
            }, 1000); // Tutup modal setelah 1 detik
        }

        // Jika ada modal error, tampilkan dan tutup setelah 1 detik
        if (document.getElementById('errorModal')) {
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
            setTimeout(function() {
                errorModal.hide();
            }, 1000); // Tutup modal setelah 1 detik
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const elements = document.querySelectorAll(".break-on-number");
        elements.forEach(el => {
            el.innerHTML = el.innerHTML.replace(/(\d+)/g, '<br>$1');
        });
    });
</script>



</body>

</html>
