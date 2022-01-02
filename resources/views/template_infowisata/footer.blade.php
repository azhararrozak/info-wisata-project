      <!-- FOOTER -->
        <footer class="bg-dark text-center text-white">
          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-white" href="#">WisataKu.com</a>
          </div>
          <!-- Copyright -->
        </footer>
     </section> 
    <!-- Script JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script>
      var nav = document.querySelector("nav");
      window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) {
          nav.classList.add("bg-dark", "shadow");
        } else {
          nav.classList.remove("bg-dark", "shadow");
        }
      });
    </script>
  </body>
</html>