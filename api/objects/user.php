<?php
class User
{
    private $conn;
    private $table_name = "usuario";

    public $id;
    public $usuario;
    public $usuario2;
    public $password;
    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;
    public $accion;
    public $fecha;
    public $rol;
    public $estado;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function signup()
    {
        if ($this->isAlreadyExist()) {
            return false;
        }

        $query = "INSERT INTO {$this->table_name} 
            SET usuario=:usuario, password2=:password2, nombre=:nombre, apellido=:apellido, correo=:correo, telefono=:telefono, rol=:rol, estado=:estado";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':usuario' => $this->usuario,
            ':password2' => $this->password,
            ':nombre' => $this->nombre,
            ':apellido' => $this->apellido,
            ':correo' => $this->correo,
            ':telefono' => $this->telefono,
            ':rol' => $this->rol,
            ':estado' => $this->estado,
        ]);

        if ($stmt->rowCount() > 0) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    public function listar()
    {
        try {
            $result = array();
            $stm = $this->conn->prepare("SELECT * FROM " . $this->table_name);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminar($id)
    {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function inactivar($id)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET estado = 'Inactivo' WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function activar($id)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET estado = 'Activo' WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function login()
    {
        $query = "SELECT id, usuario, password2 FROM {$this->table_name} WHERE usuario=:usuario AND password2=:password2";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':usuario' => $this->usuario,
            ':password2' => $this->password,
        ]);

        return $stmt;
    }

    public function log($accion)
    {
        try {
            $fecha = date('Y-m-d H:i:s');
            $stmt = $this->conn->prepare('INSERT INTO log (usuario, accion, fecha) VALUES (:usuario, :accion, :fecha)');
            $stmt->execute([
                ':usuario' => $this->usuario,
                ':accion' => $accion,
                ':fecha' => $fecha,
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $stmt;
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE usuario SET 
                    nombre = :nombre, 
                    apellido = :apellido,
                    usuario = :usuario,
                    correo = :correo,
                    telefono = :telefono,
                    password2 = :password2
                WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nombre", $data->nombre);
            $stmt->bindParam(":apellido", $data->apellido);
            $stmt->bindParam(":usuario", $data->usuario2);
            $stmt->bindParam(":correo", $data->correo);
            $stmt->bindParam(":telefono", $data->telefono);
            $stmt->bindParam(":password2", $data->password);
            $stmt->bindParam(":id", $data->id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            die("Error al ejecutar la consulta de actualización: " . $e->getMessage());
        }
    }



    private function isAlreadyExist()
    {
        $query = "SELECT COUNT(*) as count FROM {$this->table_name} WHERE usuario=:usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':usuario' => $this->usuario,
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }
}
