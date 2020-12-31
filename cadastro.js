// inicializar variáveis a vazio
$check0 = $check1 = $check2 = $check3 = $check4 = "";

/* verificar qual o valor contido na variável $TipoBeneficiario
 * e preencher a variável de marcação com o atributo "selected"
 */
switch ($sexo) {
  case "Selecione": {
    $check0 = "selected";
    break;
  }
  case "Feminino": {
    $check1 = "f";
    break;
  }
  case "Masculino": {
    $check2 = "m";
    break;
  }
}
