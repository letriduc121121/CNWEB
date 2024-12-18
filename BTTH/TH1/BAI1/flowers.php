<?php
class Flowers {
    private $conn;
    private $table_name = "flowers";

    public $id;
    public $name;
    public $description;
    public $image;

    // Constructor nhận kết nối database
    public function __construct($db) {
        $this->conn = $db;
    }

    // Phương thức thêm mới một bông hoa
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, description, image) 
                  VALUES (:name, :description, :image)";
        $stmt = $this->conn->prepare($query);

        // Ràng buộc dữ liệu
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Phương thức xóa một bông hoa
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Ràng buộc dữ liệu
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Phương thức sửa thông tin một bông hoa
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET name = :name, description = :description, image = :image 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Ràng buộc dữ liệu
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
