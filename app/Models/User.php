<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class User extends Model
{
    protected $table = 'utilisateurs';

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function getCountAllUsers()
    {
        $stmt = $this->db->query("SELECT COUNT(*) AS total FROM utilisateurs WHERE role = 'user'");
        $row = $stmt->fetch();
        return $row['total'];
    }
    public function emailExists($email, $excludeId = null)
    {
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE email = ?";
        $params = [$email];

        if ($excludeId) {
            $sql .= " AND id != ?";
            $params[] = $excludeId;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }

    public function updatePassword($id, $password)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET motdepasse = ? WHERE id = ?");
        return $stmt->execute([password_hash($password, PASSWORD_DEFAULT), $id]);
    }

    public function createUser($data)
    {
        $data['motdepasse'] = password_hash($data['motdepasse'], PASSWORD_DEFAULT);
        return $this->create($data);
    }
    public function deleteUser($id) 
    {
        $stmt = $this->db->prepare("DELETE FROM utilisateurs WHERE id = ?");
        if ($stmt ) {
           return $stmt->execute([$id]);
        }
        return false;
    }
}
?>