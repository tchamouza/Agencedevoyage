<?php
namespace App\Models;

use App\Core\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    public function findAllOrdered()
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} ORDER BY date_envoi DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function markAsProcessed($id)
    {
        return $this->update($id, ['traite' => 1]);
    }

    public function getCountAllMessages()
    {
        $stmt = $this->db->query("SELECT COUNT(*) AS total FROM contacts");
        $row = $stmt->fetch();
        return $row['total'];
    }
}
?>