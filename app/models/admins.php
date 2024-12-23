<?php

class admins extends Database {
    public function getUserByUsername($username) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
