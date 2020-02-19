<?php
require "DBController.php";
class ProjectManagement {
    function getProjectTaskByStatus($statusId, $projectName) {
        $db_handle = new DBController();
        $query = "SELECT * FROM tbl_task WHERE status_id= ? AND project_name = ?";
        $result = $db_handle->runQuery($query, 'is', array($statusId, $projectName));
        return $result;
    }
    //add card
    public function addcard($user)
    {
        
        return $this->db->insert('tbl_status', $user);
        
    }
    
    //delete card
    public function delete_user($task_id)
    {
        $this->db->where('task_id', $id);
        $this->db->delete('tbl_status');
    }
    
    function getAllStatus() {
        $db_handle = new DBController();
        $query = "SELECT * FROM tbl_status";
        $result = $db_handle->runBaseQuery($query);
        return $result;
    }
    
    function addToCard($task) {
        $db_handle = new DBController();
        "INSERT INTO tbl_status ('title','description','project_name','status_id','created_at')
                VALUES ($task,$task,'project',1,'date');";
        $result = $db_handle->runBaseQuery($query);
        return $result;
    }
    
    function editTaskStatus($status_id, $task_id) {
        $db_handle = new DBController();
        $query = "UPDATE tbl_task SET status_id = ? WHERE id = ?";
        $result = $db_handle->update($query, 'ii', array($status_id, $task_id));
        return $result;
    }
}
?>