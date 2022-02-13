<?php
include_once "Env.php";
include_once "Log.php";

class Db
{
    private $pdo = null;

    public function __construct()
    {
        if(!$this->pdo) {
            $this->init();
        }
    }

    private function init()
    {
        $connection = Env::get('DB_CONNECTION', 'mysql');
        $host = Env::get('DB_HOST');
        $port = Env::get('DB_PORT');
        $database = Env::get('DB_DATABASE');
        $username = Env::get('DB_USERNAME');
        $password = Env::get('DB_PASSWORD');

        // print_r([$database, $host, $port, $username, $password]);

        $options= [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];

        $dsn = "{$connection}:host={$host};dbname={$database};port={$port};charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            //  throw new \PDOException($e->getMessage(), (int)$e->getCode());
            Log::write("db connection failed");
        }
    }

    // a query to create a tabel
    public function migrate()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS posts( 
            id   INT AUTO_INCREMENT,
            title  VARCHAR(100) NOT NULL, 
            body VARCHAR(50) NULL, 
            PRIMARY KEY(id)
        )';

        $this->pdo->exec($sql);
    }


    // a query to write st to table
    public function insert($title, $body)
    {
        $query = 'INSERT INTO `posts` VALUES (NULL, :title, :body)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':body', $title, PDO::PARAM_STR);
        $stmt->execute();
    }

    // a query to fetch data
    public function getAll()
    {
        $query = 'SELECT * FROM `posts`';

        return $this->pdo->query($query)->fetchAll();
    }
}