<?php

class SQLiteConnection {
    /**
     * PDO instance
     * @var type
     */
    private $db;

    function __construct($sqlFilePath){
        $this->db = new SQLite3($sqlFilePath);
    }

    public function query($query) {
        $result = $this->db->query($query);

        $rows = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $rows[] = $row;
        }

        return $rows[0];
    }

    public function queryAll($query) {
        $result = $this->db->query($query);

        $rows = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $rows[] = $row;
        }

        return $rows;
    }
}
