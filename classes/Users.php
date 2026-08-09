<?php
require_once 'Connection.php';

class Users extends Dbh
{
    //PHOTO MANAGEMENT 
    private function ensureStaffPhotoColumn($conn) {
        $result = $conn->query("SHOW COLUMNS FROM users LIKE 'photo'");
        if ($result && $result->num_rows === 0) {
            $conn->query("ALTER TABLE users ADD COLUMN photo VARCHAR(255) NULL AFTER role");
        }
    }
    //----------------------------------------------------------------------------//

    //LOG IN 
    public function login($email, $password) {
        $conn = $this->connect();
        $this->ensureStaffPhotoColumn($conn);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) return 2; // user not found

        $user = $result->fetch_assoc();

        if (!password_verify($password, $user['password'])) return 3; // wrong password

        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Regenerate session ID to prevent session fixation attacks
        session_regenerate_id(true);

        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['first_name'] = $user['first_name'] ?? '';
        $_SESSION['last_name'] = $user['last_name'] ?? '';
        $_SESSION['photo'] = $user['photo'] ?? '';

        return ($user['role'] === 'admin')
            ? '/NexaStock/public/Admin/home.php'
            : '/NexaStock/public/Staff/home.php';
    }

    //---------------------------------------------------------------//

    // DISPLAY STAFF
    public function getAllStaff() {
    $conn = $this->connect();
    $this->ensureStaffPhotoColumn($conn);
    $result = $conn->query("SELECT * FROM users ORDER BY id DESC");
    return $result;
    }

    //------------------------------------------------------------------//

    // ADD STAFF //
    public function addStaff($fname, $lname, $email, $password, $role, $photo = null) {
        $conn = $this->connect();
        $this->ensureStaffPhotoColumn($conn);

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (first_name,last_name,email,password,role,photo) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $fname, $lname, $email, $hashed, $role, $photo);

        return $stmt->execute();
    }

    //---------------------------------------------------------------------------//

    // UPDATE STAFF 
    public function updateStaff($id, $fname, $lname, $email, $role, $password=null, $photo = null) {
        $conn = $this->connect();
        $this->ensureStaffPhotoColumn($conn);
        if($password && $photo !== null){
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, role=?, password=?, photo=? WHERE id=?");
            $stmt->bind_param("ssssssi", $fname,$lname,$email,$role,$hashed,$photo,$id);
        } elseif($password){
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, role=?, password=? WHERE id=?");
            $stmt->bind_param("sssssi", $fname,$lname,$email,$role,$hashed,$id);
        } elseif($photo !== null) {
            $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, role=?, photo=? WHERE id=?");
            $stmt->bind_param("sssssi", $fname,$lname,$email,$role,$photo,$id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, role=? WHERE id=?");
            $stmt->bind_param("ssssi", $fname,$lname,$email,$role,$id);
        }
        return $stmt->execute();
    }

    //---------------------------------------------------------------------------//

    //DELETE STAFF //
    public function deleteStaff($id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    //STAFF PHOTO //
    public function getStaffById($id) {
        $conn = $this->connect();
        $this->ensureStaffPhotoColumn($conn);
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

     //---------------------------------------------------------------------------//

    // DISPLAY PRODUCT //
    public function getAllProducts() {
        $conn = $this->connect();
        $sql = "SELECT * FROM products ORDER BY id DESC";
        return $conn->query($sql);
    }

     //---------------------------------------------------------------------------//

     // ADD PRODUCT //
    public function addProduct($productName, $sku, $category, $price, $stock) {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO products (product_name, sku, category, price, stock) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssdi", $productName, $sku, $category, $price, $stock);
        return $stmt->execute();
    }

    //---------------------------------------------------------------------------//

    // UPDATE PRODUCT
    public function updateProduct($id, $productName, $sku, $category, $price, $stock) {
        $conn = $this->connect();
        $stmt = $conn->prepare("UPDATE products SET product_name=?, sku=?, category=?, price=?, stock=? WHERE id=?");
        $stmt->bind_param("sssdii", $productName, $sku, $category, $price, $stock, $id);
        return $stmt->execute();
    }

    //---------------------------------------------------------------------------//

    //DELETE PRODUCT
    public function deleteProduct($id) {
        $conn = $this->connect();
        $conn->begin_transaction();

        try {
            $stmt = $conn->prepare("DELETE FROM stock_movements WHERE product_id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $deleted = $stmt->affected_rows > 0;

            if ($deleted) {
                $conn->commit();
                return true;
            }

            $conn->rollback();
            return false;
        } catch (Throwable $e) {
            $conn->rollback();
            return false;
        }
    }

    //---------------------------------------------------------------------------//

    //STOCK MOVEMENT
    public function recordStockMovement($productId, $type, $quantity, $notes, $movementDate, $createdBy = null) {
        $conn = $this->connect();

        $change = $type === 'out' ? -$quantity : $quantity;
        $stmt = $conn->prepare("UPDATE products SET stock = stock + ? WHERE id=? AND stock + ? >= 0");
        $stmt->bind_param("iii", $change, $productId, $change);
        $stmt->execute();

        if ($stmt->affected_rows < 1) {
            return false;
        }

        $stmt = $conn->prepare("INSERT INTO stock_movements (product_id, movement_type, quantity, notes, movement_date, created_by) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("isisss", $productId, $type, $quantity, $notes, $movementDate, $createdBy);
        return $stmt->execute();
    }

    //---------------------------------------------------------------------------//

    // DISPALY STOCK MOVEMENT
    public function getStockMovements() {
        $conn = $this->connect();
        return $conn->query("SELECT sm.*, p.product_name, p.sku FROM stock_movements sm LEFT JOIN products p ON p.id = sm.product_id ORDER BY sm.id DESC");
    }

    //---------------------------------------------------------------------------//

    //DISPLAY STATS
    public function getDashboardStats() {
        $conn = $this->connect();

        $products = [
            'total_products' => 0,
            'inventory_value' => 0,
            'low_stock' => 0
        ];
        $users = ['active_users' => 0];
        $today = [
            'inbound_today' => 0,
            'outbound_today' => 0
        ];

        $productsResult = $conn->query("SELECT COUNT(*) total_products, COALESCE(SUM(price * stock),0) inventory_value, SUM(CASE WHEN stock <= 5 THEN 1 ELSE 0 END) low_stock FROM products");
        if ($productsResult) {
            $products = $productsResult->fetch_assoc();
        }

        $usersResult = $conn->query("SELECT COUNT(*) active_users FROM users");
        if ($usersResult) {
            $users = $usersResult->fetch_assoc();
        }

        $todayResult = $conn->query("SELECT 
            COALESCE(SUM(CASE WHEN movement_type='in' THEN quantity ELSE 0 END),0) inbound_today,
            COALESCE(SUM(CASE WHEN movement_type='out' THEN quantity ELSE 0 END),0) outbound_today
            FROM stock_movements WHERE movement_date = CURDATE()");
        if ($todayResult) {
            $today = $todayResult->fetch_assoc();
        }

        return [...$products, ...$users, ...$today];
    }

    //---------------------------------------------------------------------------//
}
