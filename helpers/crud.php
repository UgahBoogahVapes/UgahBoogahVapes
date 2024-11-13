<?php
require_once(__DIR__."/aes.php");
date_default_timezone_set('Asia/Manila');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function conn() {
    include(dirname(__FILE__)."/config.php");
    return $conn;
}

class Crud {
    private $db;
    private $pdo;
    private $aes;

    public function __construct($db_conn, $aes_fun) {
        $conn = conn();
        $this->db = $db_conn;
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $this->aes = $aes_fun;
        try {
        $this->pdo = new PDO("mysql:host=".$conn['host'].";dbname=".$conn['dbname']."", $conn['user'], $conn['password'], $options);
        } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
        }
    }

    public function create($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $set_values = '';
    
        foreach($data as $key => $value) {
            $set_values .= $key.'=:'.$key.', ';
        }
    
        if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_content = file_get_contents($_FILES['file']['tmp_name']);
            $columns .= ', file';
            $values .= ', :file';
        }
    
        $set_values = rtrim($set_values, ', ');
    
        $stmt = $this->pdo->prepare("INSERT INTO $table ($columns) VALUES ($values)");
    
        foreach($data as $key => $value) {
            $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
        }
    
        if(isset($file_name) && isset($file_type) && isset($file_size) && isset($file_content)) {
            $stmt->bindParam(':file', $file_content, PDO::PARAM_LOB);
        }
    
        $result = $stmt->execute();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function read($table, $id) {
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = $this->pdo->query($query);

        if ($result && $result->rowCount() > 0) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function read_all($table) {
    
        $query = "SELECT * FROM $table ORDER BY id DESC";
    
        $result = $this->db->query($query);
    
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        if ($rows) {
            return $rows;
        } else {
            return false;
        }
    }

    public function search($table, $search_term, $select) {
        $selected_term = "";
        $index = 1;

        foreach($select as $selected) {
            $selected_term .= $selected . " LIKE :search_term ";
            if(++$index <= count($select)) {
                $selected_term .= "OR ";
            }
        }
        
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $selected_term ORDER BY id DESC");
        $stmt->bindValue(':search_term', "%$search_term%", PDO::PARAM_STR);
        $stmt->execute();
    
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM $table WHERE $selected_term");
        $stmt->bindValue(':search_term', "%$search_term%", PDO::PARAM_STR);
        $stmt->execute();
    
        if ($records) {
            return $records;
        } else {
            return false;
        }
    }

    public function update($table, $id, $data) {
        $columns = implode(', ', array_keys($data));
        $values = implode(', :', array_keys($data));
        $set_values = '';
    
        foreach($data as $key => $value) {
            $set_values .= $key.'=:'.$key.', ';
        }
    
        $set_values = rtrim($set_values, ', ');
    
        $stmt = $this->pdo->prepare("UPDATE $table SET $set_values WHERE id=:id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
        foreach($data as $key => $value) {
            $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
        }
    
        if(isset($file_name) && isset($file_type) && isset($file_size) && isset($file_content)) {
            $stmt->bindParam(':file', $file_content, PDO::PARAM_LOB);
        }
    
        $stmt->execute();
    }

    public function delete($table, $id) {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->pdo->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function login($table, $username, $password) {
        $users = $this->read_all($table);
        $fetched_users = [];
        foreach ($users as $user) {
            if ($this->aes->decrypt($user["password"]) == $this->aes->decrypt($password) && $user['username'] == $username) {
                array_push($fetched_users, $user);
            }
        }
    
        if (count($fetched_users) == 1) {
            return $fetched_users[0];
        } else {
            return false;
        }
    }

    public function register($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->db->query($query);
    }

    
    // Add new functions
    function getAllMunicipalityPlaces($municipality)
    {
        $mysqli = connect();
        $municipality = $mysqli->real_escape_string($municipality);
        $res = $mysqli->query("SELECT * FROM places WHERE municipality = '$municipality' ORDER BY RAND()");
        $places = [];
        while ($row = $res->fetch_assoc()) {
            $places[] = $row;
        }
        return $places;
    }
    
    function getPlacesByCategoryAndMunicipality($category, $municipality)
    {
        $mysqli = connect();
        $category = $mysqli->real_escape_string($category);
        $municipality = $mysqli->real_escape_string($municipality);
        $res = $mysqli->query("SELECT * FROM places WHERE category = '$category' AND municipality = '$municipality'");
        $places = [];
        while ($row = $res->fetch_assoc()) {
            $places[] = $row;
        }
        return $places;
    }
    
    


}
$conn = conn();
$db_conn = new mysqli($conn['host'], $conn['user'], $conn['password'], $conn['dbname']);
    
$crud = new Crud($db_conn, $aes);
?>