<?php 
namespace Models;
use \Core\Db;

class Tag extends Model
{
    function getUrl() {
        return '/tagpostlist/'.$this->getField('id');
    }

    public function getPosts() {
        $id = $this->getField('id');
        $sql = "
            SELECT posts.* 
            FROM post_tag 
            LEFT JOIN posts 
                ON posts.id=post_tag.post_id 
            WHERE tag_id=$id
        ";
        $rows = Db::getInstance()->query($sql);
        $models = [];

        foreach ($rows as $row) {
            $models[] = new Post($row);
        }
        
        return $models;
    }

    static function get ($id) {
        $rows = Db::getInstance()->query("SELECT * FROM tags WHERE id=$id");
        $row = $rows[0];

        return new self($row);
    }

    static function getAllTags() {
        $rows = Db::getInstance()->query("SELECT * FROM tags");
        foreach ($rows as $row) {
            $models[] = new self($row);
        }
        
        return $models;
    }


    
}

?>