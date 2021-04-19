<?php 
    class Task extends CI_Model {
        
        /*DOCU: Fetch all tasks on the database: Owner:Philip */
        public function get_tasks() {
            $sql = "SELECT * FROM tasks";
            $query = $this->db->query($sql);
            if($query->num_rows() > 0) {
                return $query->result();
            }
            else {
                return "No tasks yet";
            }
        }

        /* DOCU: This function saves a task to the database and return its id. Owner:Philip*/
        public function save_task($task) {
            $sql = "INSERT INTO tasks (name, completed) VALUES (?,?)";
            $this->db->query($sql,array($task,"false"));
            return $this->db->insert_id();
        }

        /*DOCU: This function gets a single task with an id: Owner:Philip */
        public function get_task($id) {
            $sql = "SELECT * FROM tasks WHERE id = ?";
            $query = $this->db->query($sql,array($id));
            return $query->result();
        }

        /* DOCU: This function toggles if the task is complete or not. Owner:Philip*/
        public function toggle_task($id) {
            $sql = "UPDATE tasks SET completed = 'true' WHERE id = ?";
            return $this->db->query($sql,array($id));
        }

        /* DOCU: This function updates the selected task. Owner:Philip*/
        public function update_task($data,$id) {
            $sql = "UPDATE tasks SET name = ? WHERE id = ?";
            return $this->db->query($sql,array($data,$id));
        }

        public function remove_task($id){
            $sql = "DELETE FROM tasks WHERE id = ?";
            return $this->db->query($sql,array($id));
        }
    }
?>