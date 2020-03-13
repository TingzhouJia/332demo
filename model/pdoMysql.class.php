<?php
define("DB_HOST",'localhost');
define("DB_USER",'root');
define('DB_PWD','123456');
define('DB_NAME','332demo');
define('DB_PORT','3306');
define('DB_TYPE','mysql');
define('DB_CHARSET','utf8');

class PdoMySQL{
	public static $config=array();
	public static $link=null;
	public static $pconnect=false;

	public static $connected=false;
	public static $PDOStatement=null;
	public static $queryStr=null;//last query 
	public static $error=null;//errmsg
	public static $numRows=0;//last influenced
	/**
	 * @param string $dbConfig
	 * @return boolean
	 */
	public function __construct($dbConfig=''){
		if(!class_exists("PDO")){
			self::throw_exception('no support');
		}
		if(!is_array($dbConfig)){
			$dbConfig=array(
					'hostname'=>DB_HOST,
					'username'=>DB_USER,
					'password'=>DB_PWD,
					'database'=>DB_NAME,
					'hostport'=>DB_PORT,
					'dbms'=>DB_TYPE,
					'dsn'=>DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME
			);
		}
		if(empty($dbConfig['hostname']))self::throw_exception('not setup yet');
		self::$config=$dbConfig;
		if(empty(self::$config['params']))self::$config['params']=array();
		if(!isset(self::$link)){
			$configs=self::$config;
			if(self::$pconnect){
				//long connect
				$configs['params'][constant("PDO::ATTR_PERSISTENT")]=true;
			}
			try{
				self::$link=new PDO($configs['dsn'],$configs['username'],$configs['password'],$configs['params']);
			}catch(PDOException $e){
				self::throw_exception($e->getMessage());
			}
			if(!self::$link){
				self::throw_exception('wrong conect');
				return false;
			}
			self::$link->exec('SET NAMES '.DB_CHARSET);
			self::$connected=true;
			unset($configs);
		}
	}

	/**
	 * @param string $sql
	 * @return unknown
	 */
	public static function getAll($sql=null){
		if($sql!=null){
			self::query($sql);
		}
		$result=self::$PDOStatement->fetchAll(constant("PDO::FETCH_ASSOC"));
		return $result;
	}
	/**
	 * @param string $sql
	 * @return mixed
	 */
	public static function getRow($sql=null){
		if($sql!=null){
			self::query($sql);
		}
		$result=self::$PDOStatement->fetch(constant("PDO::FETCH_ASSOC"));
		return $result;
	}
	/**
	 * @param string $tabName
	 * @param int $priId
	 * @param string $fields
	 * @return mixed
	 */
	public static function findById($tabName,$priId,$fields='*'){
		$sql='SELECT %s FROM %s WHERE id=%d';
		return self::getRow(sprintf($sql,self::parseFields($fields),$tabName,$priId));
	}

	/**
	 * @param unknown $tables
	 * @param string $where
	 * @param string $fields
	 * @param string $group
	 * @param string $having
	 * @param string $order
	 * @param string $limit
	 * @return Ambigous <unknown, unknown, multitype:>
	 */
	public static function find($tables,$where=null,$fields='*',$group=null,$having=null,$order=null,$limit=null){
		$sql='SELECT '.self::parseFields($fields).' FROM '.'`'.$tables.'`'
				.self::parseWhere($where)
				.self::parseGroup($group)
				.self::parseHaving($having)
				.self::parseOrder($order)
				.self::parseLimit($limit);
//		echo $sql;
		$dataAll=self::getAll($sql);
//		return count($dataAll)==1?$dataAll[0]:$dataAll;
		return $dataAll;
	}

	/**
	 * @param array $data
	 * @param string $table
	 * @return Ambigous <boolean, unknown, number>
	 */
	public static function add($data,$table){
		$keys=array_keys($data);
		array_walk($keys,array('PdoMySQL','addSpecialChar'));
		$fieldsStr=join(',',$keys);
		$values="'".join("','",array_values($data))."'";
		$sql="INSERT INTO `{$table}`({$fieldsStr}) VALUES({$values})";
//		echo $sql;
		return self::execute($sql);
	}

	/**
	 * 
	 * @param array $data
	 * @param string $table
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @return Ambigous <boolean, unknown, number>
	 */
	public static function update($data,$table,$where=null,$order=null,$limit=0){
		foreach($data as $key=>$val){
			$sets.="`".$key."`='".$val."',";
		}
		$sets=rtrim($sets,',');
		$sql="UPDATE {$table} SET {$sets} ".self::parseWhere($where).self::parseOrder($order).self::parseLimit($limit);
//		echo $sql;
		return self::execute($sql);
	}
	/**
	 * 
	 * @param string $table
	 * @param string $where
	 * @param string $order
	 * @param number $limit
	 * @return Ambigous <boolean, unknown, number>
	 */
	public static function delete($table,$where=null,$order=null,$limit=0){
		$sql="DELETE FROM `{$table}` ".self::parseWhere($where).self::parseOrder($order).self::parseLimit($limit);
		return self::execute($sql);
	}


	public static function truncate($table){
		$sql="TRUNCATE TABLE `{$table}` ";
		return self::execute($sql);
	}


	
	public static function showTables(){
		$tables=array();
		if(self::query("SHOW TABLES")){
			$result=self::getAll();
			foreach($result as $key=>$val){
				$tables[$key]=current($val);
			}
		}
		return $tables;
	}
	
	public static function parseWhere($where){
		$whereStr='';
		if(is_string($where)&&!empty($where)){
			$whereStr=$where;
		}
		return empty($whereStr)?'':' WHERE '.$whereStr;
	}
//parse group by 
	public static function parseGroup($group){
		$groupStr='';
		if(is_array($group)){
			$groupStr.=' GROUP BY '.implode(',',$group);
		}elseif(is_string($group)&&!empty($group)){
			$groupStr.=' GROUP BY '.$group;
		}
		return empty($groupStr)?'':$groupStr;
	}

	public static function parseHaving($having){
		$havingStr='';
		if(is_string($having)&&!empty($having)){
			$havingStr.=' HAVING '.$having;
		}
		return $havingStr;
	}

	public static function parseOrder($order){
		$orderStr='';
		if(is_array($order)){
			$orderStr.=' ORDER BY '.join(',',$order);
		}elseif(is_string($order)&&!empty($order)){
			$orderStr.=' ORDER BY '.$order;
		}
		return $orderStr;
	}
//parse limit
	public static function parseLimit($limit){
		$limitStr='';
		if(is_array($limit)){
			if(count($limit)>1){
				$limitStr.=' LIMIT '.$limit[0].','.$limit[1];
			}else{
				$limitStr.=' LIMIT '.$limit[0];
			}
		}elseif(is_string($limit)&&!empty($limit)){
			$limitStr.=' LIMIT '.$limit;
		}
		return $limitStr;
	}

	public static function parseFields($fields){
		if(is_array($fields)){
			array_walk($fields,array('PdoMySQL','addSpecialChar'));
			$fieldsStr=implode(',',$fields);
		}elseif(is_string($fields)&&!empty($fields)){
			if(strpos($fields,'`')===false){
				$fields=explode(',',$fields);
				array_walk($fields,array('PdoMySQL','addSpecialChar'));
				$fieldsStr=implode(',',$fields);
			}else{
				$fieldsStr=$fields;
			}
		}else{
			$fieldsStr='*';
		}
		return $fieldsStr;
	}
//avoid collision
	public static function addSpecialChar(&$value){
		if($value==='*'||strpos($value,'.')!==false||strpos($value,'`')!==false){
		
		}elseif(strpos($value,'`')===false){
			$value='`'.trim($value).'`';
		}
		return $value;
	}
//excution and return influenced number of query
	public static function execute($sql=null){
		$link=self::$link;
		if(!$link) return false;
		self::$queryStr=$sql;
		if(!empty(self::$PDOStatement))self::free();
		$result=$link->exec(self::$queryStr);
		self::haveErrorThrowException();
		if($result || $result==0){
			
			self::$numRows=$result;
			return self::$numRows;
		}else{
			return false;
		}
	}
	
	public static function free(){
		self::$PDOStatement=null;
	}
	public static function query($sql=''){
		$link=self::$link;
		if(!$link) return false;
		
		if(!empty(self::$PDOStatement))self::free();
		self::$queryStr=$sql;
		self::$PDOStatement=$link->prepare(self::$queryStr);
		$res=self::$PDOStatement->execute();
		self::haveErrorThrowException();
		return $res;
	}
	public static function haveErrorThrowException(){
		$obj=empty(self::$PDOStatement)?self::$link: self::$PDOStatement;
		$arrError=$obj->errorInfo();
		//print_r($arrError);
		if($arrError[0]!='00000'){
			self::$error='SQLSTATE: '.$arrError[0].' <br/>SQL Error: '.$arrError[2].'<br/>Error SQL:'.self::$queryStr;
			self::throw_exception(self::$error);
			return false;
		}
		if(self::$queryStr==''){
			self::throw_exception('no sql');
			return false;
		}
	}

	public static function throw_exception($errMsg){
		echo '<div style="width:80%;background-color:#ABCDEF;color:black;font-size:20px;padding:20px 0px;">
				'.$errMsg.'
		</div>';
	}


	public static function close(){
		self::$link=null;
	}

}
$MyPDO=new PdoMySQL();
return $MyPDO;
?>
