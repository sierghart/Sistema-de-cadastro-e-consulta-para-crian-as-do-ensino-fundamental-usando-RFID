
<?php
//sesion
session_start();

if(isset($_SESSION['mensagem'])): ?>

<script>
    window.onload = function(){
     M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
    };
</script>

<?php
endif;

unset($_SESSION['mensagem']);