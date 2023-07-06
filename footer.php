<footer class="pt-5 text-center">
  <hr>
  <p class="text-success">Your Unique Session ID on <em class="text-primary" id="browser"></em>: <?php echo $_COOKIE['sessionID']?><b
      class="text-danger"></b></p>
  <p>Copyright © 2019-2020 <a class="text-decoration-none" href="https://sanjaykm.me">Sanjay Kumar</a></p>
</footer>

</main>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
  integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

</body>

</html>

<script>
  let userAgent = navigator.userAgent;
  let browserName;

  if (userAgent.match(/chrome|chromium|crios/i)) {
    browserName = "chrome";
  } else if (userAgent.match(/firefox|fxios/i)) {
    browserName = "firefox";
  } else if (userAgent.match(/safari/i)) {
    browserName = "safari";
  } else if (userAgent.match(/opr\//i)) {
    browserName = "opera";
  } else if (userAgent.match(/edg/i)) {
    browserName = "edge";
  } else {
    browserName = "No browser detection";
  }

  document.getElementById("browser").innerText = browserName + " ";         
</script>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  })
  $('#qTable').DataTable();
</script>