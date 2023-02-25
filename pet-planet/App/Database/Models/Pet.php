<?php 
namespace App\Database\Models;

use App\Database\Models\Contract\MakeCrud;
use App\Database\Models\Model;

class Pet extends Model implements MakeCrud {
    private $id,
    $name,
    $type,
    $family,
    $age,
    $gender,
    $image,
    $user_id;
    
    public function create() :bool
    { 
        $query = "INSERT INTO pets (name,type,
        family,gender,age,image,user_id) 
        
        VALUES (? , ? , ? , ? , ? , ? , ? )";
        
        $returned_stmt = $this->connect->prepare($query);
        if(! $returned_stmt){
            return false;
        }
        
        $returned_stmt->bind_param('ssssisi',$this->name,$this->type,$this->family,
        $this->gender, $this->age, $this->image,
        $this->user_id);

        return $returned_stmt->execute();
    }

    public function read() :\mysqli_result
    {
        # code...
    }

    public function update() :bool
    {
        # code...
    }

    public function delete() :bool
    {
        # code...
    }

    public function getPetInfo()
    {
        $query = "SELECT * FROM pets WHERE id = ? ";

        $returned_stmt = $this->connect->prepare($query);
        if(! $returned_stmt){
            return false;
        }

        $returned_stmt->bind_param('i',$this->id);
        $returned_stmt->execute();
        return $returned_stmt->get_result();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of family
     */ 
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set the value of family
     *
     * @return  self
     */ 
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}
?>