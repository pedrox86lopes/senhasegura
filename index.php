<?php
if (isset($_POST) && !empty($_POST)){
    $senhaGerada = substr(base64_encode($_POST['service'].$_POST['passphrase']), 0, $_POST['size']);
}
?>

<html>
<title>SENHA SEGURA - PEDRO LOPES PERICIAS TECNICAS</title>
<head>
		<link rel="stylesheet" href="main.css" />
</head>
<body>
<center><img src="../logo-pedro-01.png" alt="" height="235" width="235"/><center>
<form method="post">
    <table>
        <tr>
            <td colspan="2"><h1><p class="custom">Gerador de senha</h1></td>
        </tr>
        <tr>
            <td><p class="custom">Serviço (minúsculo)</td>
            <td><input type="text" id="service" name="service" value="<?=$_POST['service']?>" /></td>
        </tr>
        <tr>
            <td><p class="custom">Contra-senha</td>
            <td><input type="password" id="passphrase" name="passphrase" /></td>
        </tr>

        <tr>
            <td><p class="custom">Quantidade caracteres</td>
            <td>
                <select name="size" id="size">
                    <?php
                    for ($i=18; $i<=25; $i++) { ?>
                        <option value="<?=$i?>"
                            <?php
                            if (isset($_POST['size']) && $_POST['size'] == $i)
                                echo 'selected';
                            else if (!isset($_POST['size']) && $i == 10)
                                echo 'selected';
                            ?>>
                            <?=$i?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <button><p class="custom">Gerar!</button>
            </td>
        </tr>
    </table>
</form>

<label for="senha"></label>
<input type="text" id="senha" value="<?=$senhaGerada?>" readonly />
<button id="copy" data-clipboard-target="#senha">
    Copiar senha
</button>
<span id="copy_box" style="display: none">Senha copiada!</span>

<p class="byline"><strong>Teste sua senha e veja se você está seguro!</strong></p>
<p class="byline">
<!-- iframe plugin v.4.3 wordpress.org/plugins/iframe/ -->
<iframe src="http://speedypassword.com/checker/" width="100%" height="370px" scrolling="no" id="indicator_frame" class="iframe-class" frameborder="0"></iframe>
</p>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.8/clipboard.min.js"></script>
<script language="JavaScript">
    var clipboard = new Clipboard('#copy');
    clipboard.on('success', function(e) {
        $('#copy_box').fadeIn();
        setTimeout(function() {
            $('#copy_box').fadeOut();
        }, 2000);
        e.clearSelection();
    });
</script>
</html>
