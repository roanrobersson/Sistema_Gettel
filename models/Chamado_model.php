<?php
  require_once 'CategoriaChamado_model.php';
  require_once 'Mensagem_model.php';
  require_once 'UsuarioCliente_Model.php';
/**
 * Chamado
 */
class Chamado{

  protected $link;
  protected $idChamado;
  protected $dtChamado;
  protected $assunto;
  protected $dsCategoria;
  protected $dtResolucao;
  protected $nmUsuario;
  protected $mensagens;
  protected $countMensagens;

  function __construct($linkGlobal)
  {
    $this->link = $linkGlobal;
  }

  /**
   * Getters
   */
  function get_idChamado(){
    return $this->idChamado;
  }

  function get_dtChamado(){
    return $this->dtChamado;
  }

  function get_assunto(){
    return $this->assunto;
  }

  function get_dtResolucao(){
    return $this->dtResolucao;
  }

  function get_dsCategoria(){
    return $this->dsCategoria;
  }

  function get_idUsuario(){
    return $this->idUsuario;
  }

  function get_nmUsuario(){
    return $this->nmUsuario;
  }

  function get_mensagens(){
    return $this->mensagens;
  }

  function get_countMensagens(){
    return $this->countMensagens;
  }

  /**
  * Setters
  */
  function set_idChamado($id){
    $this->idChamado = $id;
  }

  function set_dtChamado($dtC){
    $this->dtChamado = $dtC;
  }

  function set_assunto($a){
    $this->assunto = $a;
  }

  function set_dsCategoria($dsC){
    $this->dsCategoria = $dsC;
  }

  function set_idUsuario($idU){
    $this->idUsuario = $idU;
  }

  function set_nmUsuario($nmU){
    $this->nmUsuario = $nmU;
  }

  function set_dtResolucao($dtR){
    $this->dtResolucao = $dtR;
  }

  function set_countMensagens($cM){
    $this->countMensagens = $cM;
  }

  function criarChamado($nmUsuario, $email, $assunto, $idCategoria, $texto){

    $UsuarioCliente = new UsuarioCliente($this->link);
    $idUsuarioCriador = $UsuarioCliente-> criarUsuarioCliente($nmUsuario, $email);

    $idChamadoGerado = rand(11111, 99999); //Adicionar gerador de ID aleatorio

    $sql = "INSERT INTO Chamado(idChamado, dtChamado, assunto, idCategoria, idUsuarioCriador )
            VALUES
            ('$idChamadoGerado',
             current_timestamp(),
             '$assunto',
             '$idCategoria',
             '$idUsuarioCriador');
             ";
    $query = mysqli_query($this->link, $sql);

    $Mensagem  = new Mensagem($this->link);
    $Mensagem->criarMensagem($texto, $idChamadoGerado, $idUsuarioCriador);

    return $idChamadoGerado;

  }




  function carregar($id) {
    $sql = "SELECT *, COUNT(*) AS countMensagens FROM Chamado
    JOIN CategoriaChamado ON Chamado.idCategoria = CategoriaChamado.idCategoria
    JOIN UsuarioCliente ON idUsuarioCriador = UsuarioCliente.idCliente
    JOIN Usuario ON UsuarioCliente.idCliente= Usuario.idUsuario
    JOIN Mensagem ON Chamado.idChamado = Mensagem.idChamado
    WHERE Chamado.idChamado = '$id'
    GROUP BY (Chamado.idChamado)";

    $query = mysqli_query($this->link, $sql);
    $registro = mysqli_fetch_array($query);

    $this->set_idChamado($registro['idChamado']);
    $this->set_dtChamado($registro['dtChamado']);
    $this->set_assunto($registro['assunto']);
    $this->set_dsCategoria($registro['dsCategoria']);
    $this->set_idUsuario($registro['idUsuario']);
    $this->set_nmUsuario($registro['nmUsuario']);
    $this->set_dtResolucao($registro['dtResolucao']);
    $this->set_countMensagens($registro['countMensagens']);
    $Mensagem = new Mensagem($this->link);
    $this->mensagens = $Mensagem->carregarTodas($this->get_idChamado());
  }

  function chamado_existe ($p, $e){
   $sql = "SELECT idChamado FROM Chamado
          JOIN UsuarioCliente ON Chamado.idUsuarioCriador = UsuarioCliente.idCliente
          WHERE Chamado.idChamado = '$p' AND UsuarioCliente.email = '$e'
          ";
   $query = mysqli_query($this->link, $sql);
   $result = mysqli_fetch_array($query);
   if ( $result ){
      return true;
    }else return false;

  }





}

?>
