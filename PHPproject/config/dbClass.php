<?php
class dbClass
{ //Used to create connection to DB
  public $host;
  public $db;
  public $charset;
  public $user;
  public $pass;
  public $opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  );
  public $connection;

  public function __construct(
    string $host = "localhost",
    string $db = "gpu-order",
    string $charset = "utf8",
    string $user = "root",
    string $pass = ""
  ) { //Creates a DB connection
    $this->host = $host;
    $this->db = $db;
    $this->charset = $charset;
    $this->user = $user;
    $this->pass = $pass;
  }
  public function connect()
  { //Connects to a DB
    $dns = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
    $this->connection = new PDO($dns, $this->user, $this->pass, $this->opt);
  }
  public function disconnect()
  { //Disconnects from DB
    $this->connection = null;
  }
}
