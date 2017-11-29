<?php

namespace classes;

abstract class model {
    protected $tableName;
    public function save() {
        if ($this->id == '') {
            $this->insert();
        } else {
            $this->update($this->id);
        }
    }
    public function insert() {
        $db= dbConn::getConnection();
        $this->id=33;
        $tableName= $this->tableName;
        $array = get_object_vars($this);
        array_pop($array);
        $head = array_keys($array);
        $columnString = implode(',',$head);
        $valueString = "'".implode("',' ",$array)."'";
        $sql = 'INSERT INTO ' . $tableName. ' (' . $columnString . ') VALUES (' . $valueString . ')' ;
        $statement = $db->prepare($sql);
        $statement->execute();
    }
    public function update($id) {
        $db = dbConn::getConnection();
        $tableName= $this->tableName;
        $array = get_object_vars($this);
        array_pop($array);
        $space=' ';
        $arr1='';
        foreach($array as $key=>$value){
            $arr1.=$space.$key.'="'.$value.'"';
            $space=", ";
        }
        $sql= 'UPDATE '. $tableName .' SET'. $arr1 .' WHERE id='. $id;
        $statement = $db->prepare($sql);
        $statement->execute();
    }
    public function delete($id){
        $tableName= $this->tableName;
        $sql = ' DELETE FROM ' . $tableName . ' WHERE id= '. $id;
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
    }
    public function header() {
        $db= dbConn::getConnection();
        $tableName = $this->tableName;
        $sql = 'SHOW COLUMNS FROM ' . $tableName;
        $statement = $db->prepare($sql);
        $statement->execute();
        $head = $statement->fetchAll(\PDO::FETCH_COLUMN);
        return $head;
    }
}

?>