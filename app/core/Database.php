<?php

namespace MyApp;

use PDO;
use PDOException;

/**
 * Database Class
 * 
 * A simple PDO wrapper for database operations.
 */
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    private $dbh; // PDO instance
    private $stmt; // PDOStatement instance

    /**
     * Constructor
     * 
     * Establishes a database connection using PDO.
     */
    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->name;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Prepare a SQL query for execution.
     * 
     * @param string $sql The SQL query.
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind values to parameters in a prepared statement.
     * 
     * @param mixed $param The parameter identifier.
     * @param mixed $value The value to bind to the parameter.
     * @param int $type Data type of the parameter.
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement.
     * 
     * @return bool True on success, false on failure.
     */
    public function execute()
    {
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            // Handle the exception (log, display an error message, etc.)
            die($e->getMessage());
        }
    }

    /**
     * Fetch all rows from the result set.
     * 
     * @return array An array containing all of the remaining rows in the result set.
     */
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fetch a single row from the result set.
     * 
     * @return mixed An array representing the fetched row.
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Start a transaction.
     */
    public function beginTransaction()
    {
        $this->dbh->beginTransaction();
    }

    /**
     * Commit a transaction.
     */
    public function commit()
    {
        $this->dbh->commit();
    }

    /**
     * Roll back a transaction.
     */
    public function rollBack()
    {
        $this->dbh->rollBack();
    }

    /**
     * Get the ID of the last inserted row.
     * 
     * @return string The ID of the last inserted row.
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
