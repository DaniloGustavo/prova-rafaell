

<?php	
//github.com/rafaelflorindo/InformaticaIntegrado/
	
class carro{
	public $id, $modelo, $valor, $cor, $ano, $ipva, $dados;
	
	public function setId($id){
		$this->id = $id;	
	}
	public function setModelo($modelo){
		$this->modelo = $modelo;
	}
	public function setValor($valor){
		$this->valor = $valor;
	}
	public function setCor($cor){
		$this->cor = $cor;
	}
	public function setAno($ano){
		$this->ano = $ano;
	}
	public function setIpva($ipva){
		$this->ipva = $ipva;
	}
	
	
	/********************************************************/
	public function getId(){
		return $this->id;
	}
	public function getModelo(){
		return $this->modelo;
	}
	public function getValor(){
		return $this->valor;
	}
	public function getCor(){
		return $this->cor;
	}
	public function getAno(){
		return $this->ano;
	}
	
	public function getIpva(){
		return $this->ipva;
	}}

	public function carros($dados){
		
		list($modelo, $valor, $cor, $ano, $ipva) = $dados;
		
		$this->setModelo($modelo);
		$this->setValor($valor);
		$this->setCor($cor);
		$this->setAno($ano);
		$this->setIpva($ipva);
		
		
		$conectar = new mysqli("localhost","root","","veiculos");
		$sql = "insert into carro
					(modelo, valor, cor, ano, ipva)
					values (
					'{$this->getModelo()}', 
					'{$this->getValor()}',
					'{$this->getCor()}', 
					'{$this->getAno()}',
					'{$this->getIpva()}'
	";		
		$gravar = $conectar->query($sql);
		#verificar quantos registros foram afetados com o $sql
		$num = $conectar->affected_rows;
		if($num==1) {
			echo "<fieldset>";
			echo "<h2>Os dados abaixo foram armazenados na classe com sucesso!!!</h2>";
			echo "<br>Modelo: ". $this->getModelo();
			echo "<br>Valor: ". $this->getValor();
			echo "<br>Cor: ". $this->getCor();	
			echo "<br>Ano: ". $this->getAno();
			echo "<br>Ipva: ". $this->getIpva();

			echo "</fieldset>";
		}else {
			echo "<fieldset>";
			echo "Erro ao gravar os dados";	
			echo "</fieldset>";
		}
	}
	
		 $sql = "update carros set
					ativo=" . $this->getSituacao() . " where id= " . $this->getId();		
		
		$conectar = new mysqli("localhost","root","","veiculos");
		$executar = $conectar->query($sql);
		$num = $conectar->affected_rows;
		if ($num==1) {
			return 1;
		}else {
			return 0;
			
		}
	}
	
	public function buscarUm($id){}//fecha método buscarUm
	public function buscarTodos(){
		$sql = "select * from carro ORDER by nome desc ";
		$conectar = new mysqli("localhost","root","","veiculos");
		$listar = $conectar->query($sql);
		$noticias = array();
		while($linha = $listar->fetch_array()) {
			$noticias[] = $linha;
		}
		return $noticias;
	}//fecha método buscarTodos
}//fecha classe
?>