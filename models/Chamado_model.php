<?php
  require_once 'CategoriaChamado_model.php';
  require_once 'Mensagem_model.php';
/**
 * Chamado
 */
class Chamado{

  protected $link;
  protected $idChamado;
  protected $dtChamado;
  protected $assunto;
  protected $CategoriaChamado; #Objeto da classe CategoriaChamado
  protected $dtResolucao;
  protected $mensagens;

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
    return $this->CategoriaChamado->get_dsCategoria();
  }

  function get_mensagens(){
    return $this->mensagens;
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

  function set_dtResolucao($dtR){
   $this->dtResolucao = $dtR;
  }


  function carregar($id) {
   $sql = "SELECT * FROM Chamado WHERE idChamado = $id";
   $query = mysqli_query($this->link, $sql);
   $registro = mysqli_fetch_array($query);
   $this->set_idChamado($registro['idChamado']);
   $this->set_dtChamado($registro['dtChamado']);
   $this->set_assunto($registro['assunto']);
   $this->CategoriaChamado = new CategoriaChamado($this->link);
   $this->CategoriaChamado->carregar($registro['idCategoria']);
   $mensagem = new Mensagem($this->link);
   $this->mensagens = $mensagem->carregarTodas($this->get_idChamado());
   $this->set_dtResolucao($registro['dtResolucao']);
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
