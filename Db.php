/**
 * 
 */
class Db
{
	
 	use TSingleton;
	
	protected $dbh;
	
	public function __construct()
	{
		$this->dbh = new PDO('mysql:host=127.0.0.1;dbname=foo', 'root', '');
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}

	public function execute($sql, $params = [])
	{
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);
		return (bool) $sth->rowCount();
	}

	public function query($sql, $params = [])
	{
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute($params);
		if($res) return $sth->fetchAll();
		return [];
	}



}
