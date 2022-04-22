-----| PDO

       PDO = PHP Extension That defines an Interface for accessing Databases in PHP To execute queries and fetch data

       $host_name = 'localhost';
       $db_name = 'test_db';
       $user_name = 'root';
       $user_password = '';

       $dsn = "mysql:host=$host_name;dbname=$db_name";

       $pdo = new PDO($dsn, $user_name, $user_password);

       $sql = "SELECT * FROM users";

       $stmt = $pdo->prepare($sql);

       $stmt = $pdo->execute();

       $users = $stmt->fetchAll();               => return array of arrays
       $users = $stmt->fetchAll(PDO::FETCH_OBJ); => return array of objects
