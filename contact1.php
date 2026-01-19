<?php


function custom_error_handler($errno, $errstr, $errfile, $errline) {
    echo "Ndodhi nje gabim: $errstr ne $errfile ne rreshtin $errline";
}

set_error_handler("custom_error_handler");


function custom_exception_handler($exception) {
    echo "Ndodhi një gabim: " . $exception->getMessage();
}


set_exception_handler("custom_exception_handler");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $emri = $_POST["name"];
        $email = $_POST["email"];
        $mesazhi = $_POST["message"];

       
        if (empty($emri) || empty($email) || empty($mesazhi)) {
            throw new Exception("Mbushni te gjitha fushat");
        }

        
        $to = "adealluhani@gmail.com";
        $subjekti = "Dergimi i Formes";
        $trupi = "Emri: $emri\nEmail: $email\nMesazhi:\n$mesazhi";

        if (!mail($to, $subjekti, $trupi)) {
            throw new Exception("Gabim: Mesazhi juaj nuk u dergua me sukses");
        }

        //folder_paekzistues/mesazhet.txt
        $file_path = "contact_messages.txt";
        $file_content = "Emri: $emri\nEmail: $email\nMesazhi: $mesazhi\n\n";

       
        $file = fopen($file_path, "a");
        if (!$file) {
            throw new Exception("Gabim: Nuk mund te hapet file per ruajtjen e mesazhit.");
        }

       
        if (!fwrite($file, $file_content)) {
            throw new Exception("Gabim: Nuk mund te shkruhet ne file per ruajtjen e mesazhit.");
        } else {
            fclose($file);
        }

      
        echo "Ju faleminderit! Mesazhi u dergua dhe u ruajt.";
    } catch (Exception $e) {
        
        custom_exception_handler($e);
    }
}

?>




