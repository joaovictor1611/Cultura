<?php
$hostname_db = "localhost";
$database_db = "teste";
$username_db = "root";
$password_db = "qwe123";


error_reporting(0);

$mysqli = mysqli_connect("$hostname_db", "$username_db", "$password_db", "$database_db") or die("Ocorreu um na conexao com o banco de dados! ");
if ($mysqli) {
    echo 'Conectado';
} else {
    echo 'Nao conectado';
}
?>

<form method="post" action="">

    <form name="form" method="post" action="enviar_processo.php" >
        <select name="rrrcliente">
            <option disabled="disabled" selected="selectd">Selecione</option>
            <?php
            $q2 = "SELECT * FROM cliente";
            $r = mysqli_query($mysqli, $q2);
            $total = mysqli_num_rows($r);

            if ($r) {
                while ($ro = mysqli_fetch_assoc($r)) {
                    ?>
                    <option value="<?php echo $ro['id']; ?>"><?php echo $ro['nome']; ?></option>
                    <?php
                }
            }
            ?>
        </select>

        <?php
        if (!isset($_POST['rrrcliente'])) {
            echo '<input type="submit" name="Buscar" value="Buscar"></form>'
            . '<input type="text" name="nome" value=""><br>
              <input type="text" name="end" value=""><br>
              <input type="text" name="fone" value=""><br>';
        } else {
            $q2 = "SELECT * FROM cliente WHERE id = $_POST[rrrcliente]";
            $r = mysqli_query($mysqli, $q2);
            $total = mysqli_num_rows($r);
            $ro = mysqli_fetch_assoc($r);
            // aqui é onde vai imprimir o restante dos dados do cliente
            echo '<input type="submit" name="Buscar" value="Buscar"></form>'
            . '<input type="text" name="nome" value="' . $ro['nome'] . '"><br>
              <input type="text" name="end" value="' . $ro['end'] . '"><br>
              <input type="text" name="fone" value="' . $ro['fone'] . '"><br>';
        }
        ?>





        <form>


            <?php
            if (!isset($_POST['rrrcliente'])) {
                echo '<input type="submit" name="Buscar" value="Buscar"></form>'
                . '<input type="text" name="nome" value=""><br>
              <input type="text" name="end" value=""><br>
              <input type="text" name="fone" value=""><br>';
            } else {
                $q2 = "SELECT * FROM cliente WHERE id = $_POST[rrrcliente]";
                $r = mysqli_query($mysqli, $q2);
                $total = mysqli_num_rows($r);
                $ro = mysqli_fetch_assoc($r);
                // aqui é onde vai imprimir o restante dos dados do cliente
                echo '<input type="submit" name="Buscar" value="Buscar"></form>'
                . '<input type="text" name="nome" value="' . $ro['nome'] . '"><br>
              <input type="text" name="end" value="' . $ro['end'] . '"><br>
              <input type="text" name="fone" value="' . $ro['fone'] . '"><br>';
            }
            ?>




            --------------------------------------
            <tr>
                <th>Nome</th>
                <td><?php echo "<p></p>", $row['nome_interessado']; ?></td>

            </tr>
            <tr>
                <th>Órgão</th>

                <td><?php echo "<p></p>", $row['orgao_interessado']; ?></td>

            </tr>


            <tr>
                <th>CPF</th>
                <td><?php echo "<p></p>", $row['cpf_interessado']; ?></td>

            </tr>
            <tr>
                <th>CNPJ</th>
                <td><?php echo "<p></p>", $row['cnpj_interessado']; ?></td>

            </tr>
            <tr>
                <th>Bairro</th>
                <td><?php echo "<p></p>", $row['bairro_interessado']; ?></td>

            </tr>
            <tr>
                <th>Cidade</th>
                <td><?php echo "<p></p>", $row['cidade_interessado']; ?></td>

            </tr>
            <tr>
                <th>Endereço</th>
                <td><?php echo "<p></p>", $row['endereco_interessado']; ?></td>

            </tr>
            <tr>
                <th>Telefone</th>
                <td><?php echo "<p></p>", $row['telefone_interessado']; ?></td>

            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo "<p></p>", $row['email_interessado']; ?></td>

            </tr>



            <th>


                ------------------------------------------------
                <div class="form-group">

                    <div class="col-lg-11">
                        <select name="destino" style="float: right">
                            <option disabled="disabled" selected="selectd">Destino</option>
                            <?php
                            $q2 = "SELECT * FROM tb_usuario WHERE idtb_usuario <> $_SESSION[id1] AND tipo_usuario='USER'";
                            $r = mysqli_query($mysqli, $q2);
                            $total = mysqli_num_rows($r);

                            if ($r) {
                                while ($ro = mysqli_fetch_assoc($r)) {
                                    ?>
                                    <option value="<?php echo $ro['idtb_usuario']; ?>"><?php echo $ro['nome_usuario']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>
                
                
                <tr><td  style="vertical-align: top">DATA<br>__/__/__</td> <td>DESTINO<br>________________</td> <td>DESPACHO<br>______________________________________________________________</td> </tr>