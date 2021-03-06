<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Residência</h2>

<form action="edit.php?id=<?php echo $residencia['id']; ?>" method="post">
  <hr />

  <div class="row">
    <div class="form-group col-md-5">
      <label for="campo1">Endereço</label>
      <input type="text" class="form-control" name="residencia['address']" value="<?php echo $residencia['address']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Bairro</label>
      <input type="text" class="form-control" name="residencia['hood']" value="<?php echo $residencia['hood']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">CEP</label>
      <input type="text" class="form-control" name="residencia['zip_code']" value="<?php echo $residencia['zip_code']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="residencia['created']" disabled value="<?php echo $residencia['created']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Município</label>
      <input type="text" class="form-control" name="residencia['city']" value="<?php echo $residencia['city']; ?>">
    </div>

    <div class="form-group col-md-1">
      <label for="campo3">UF</label>
      <input type="text" class="form-control" name="residencia['state']" value="<?php echo $residencia['state']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Inscrição Estadual</label>
      <input type="text" class="form-control" name="residencia['ie']" value="<?php echo $residencia['ie']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">UF</label>
      <input type="text" class="form-control">
    </div>


    <div class="form-group col-md-2">
      <label for="campo3">Data Início</label>
      <input type="text" class="form-control" name="residencia['begindate']" value="<?php echo $residencia['begindate']; ?>">
    </div>
  </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data Fim</label>
      <input type="text" class="form-control" name="residencia['enddate']" value="<?php echo $residencia['enddate']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Cliente</label>
      <input type="text" class="form-control" name="residencia['idcliente']" value="<?php echo $residencia['idcliente']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Responsável</label>
      <input type="text" class="form-control" name="residencia['idresp']" value="<?php echo $residencia['idresp']; ?>">
    </div>

  </div>

<div class="col-md-12">
  <dt>Etapas Cliente:</dt>
<dd> <?php
      $conn =   mysqli_connect("localhost", "root", "", "tohomecrud");  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id_resi = $_GET['id'];
$sql = "SELECT name, details FROM tbl_name where id_residencia like '".mysqli_real_escape_string($conn, $_GET["id"])."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          //  echo "" . $row["name"]. " " . $row["details"]. "<br>"; 
           ?> 

<div class="table-responsive">  
      <table class="table table-bordered" id="dynamic_field">  
      <tr>  

    <td><input type="text" name="tbl_name['name']" value="<?php echo $row['name']; ?>" class="form-control name_list" /></td> 
    <td><input type="text" name="tbl_name['details']" value="<?php echo $row['details']; ?>" class="form-control name_list" /></td> 

                                        
    </tr>  
        </table> 

    <?php
            

    }
} else {
    echo "0 results";
}
//$conn->close();

 ?> </dd>

 </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>

