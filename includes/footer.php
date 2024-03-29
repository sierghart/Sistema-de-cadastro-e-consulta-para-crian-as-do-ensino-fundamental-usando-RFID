<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
      M.AutoInit();
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {
          coverTrigger: false,
        });
      });

      document.addEventListener('DOMContentLoaded', function() {
        const counter = document.querySelectorAll(".validate");
        M.CharacterCounter.init(counter);
        
      });

      //modal
      const elemsModal = document.querySelectorAll(".modal");
      const instancesModal = M.Modal.init(elemsModal, {
        preventScrolling: false,
        opacity: 0.8,
      }); 


    </script>

    </body>
  </html>