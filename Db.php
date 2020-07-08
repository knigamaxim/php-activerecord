/**
 * 
 */
class Db
{
	protected $dbh;
	
	public function __construct()
	{
		$this->dbh = new PDO('mysql:host=127.0.0.1;dbname=foo', 'root', '');
	}

        public function execute($sql, $params = [])
        {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            return $res;
        }

	public function query($sql, $params = [])
	{
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute($params);
		if($res) return $sth->fetchAll();
		return [];
	}



}
