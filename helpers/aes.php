<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
    $dotenv->safeLoad();
    class AES {
        private $key;
        private $cipher;
        private $iv_length;

        public function __construct($key) {
            $this->key = $key;
            $this->cipher = 'aes-256-cbc';
            $this->iv_length = openssl_cipher_iv_length($this->cipher);
        }

        public function encrypt($data) {
            $iv = openssl_random_pseudo_bytes($this->iv_length);
            $encrypted = openssl_encrypt($data, $this->cipher, $this->key, 0, $iv);
            return base64_encode($iv . $encrypted);
        }

        // Function to decrypt data
        public function decrypt($encryptedData) {
            $data = base64_decode($encryptedData);
            $iv = substr($data, 0, $this->iv_length);
            $encrypted = substr($data, $this->iv_length);
            return openssl_decrypt($encrypted, $this->cipher, $this->key, 0, $iv);
        }
    }

    $key = $_ENV["ENCRYPTION_KEY"];
    $aes = new AES($key);

    // $encryptedUsername = $crud->read("users", 1)["username"];
    // $encryptedPassword = $crud->read("users", 1)["password"];
    // $encryptedUsername = $aes->encrypt("admin");
    // $encryptedPassword = $aes->encrypt("admin");
    // echo "username: " . $encryptedUsername . "\n";
    // echo "password: " . $encryptedPassword . "\n";

    // $decryptedData = $aes->decrypt($encryptedData);
    // echo "Decrypted: " . $decryptedData . "\n";
    // echo $aes->decrypt($encryptedUsername);
    // echo $aes->decrypt($encryptedPassword);
?>
