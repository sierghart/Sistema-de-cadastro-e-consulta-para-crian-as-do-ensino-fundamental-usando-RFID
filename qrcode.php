<?php
session_start();
//Header
include_once 'includes/header.php';

//check if the session is exists
if (!isset($_SESSION['nome'])) :
    header('Location: login');
endif;

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

    <!--  create QRcode-->
    <div id="qrcode" class="center-align">

        <script src="qrcode.min.js"></script>
        <script>
            <?php $nome = $_SESSION['nome']; ?>
            new QRCode(document.getElementById("qrcode"), {
                text: "<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/escola/php_action/consultar?nome='.urlencode($nome).'&btn-consultar='; ?>",
                width: 100,
                height: 100,

            });
        </script>

    </div>


    <!--cetralization field -->
    <style>
        .center-align {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

</body>

</html>

<?php
//Footer
include_once 'includes/footer.php';
?>