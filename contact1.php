<?php


function custom_exception_handler($exception) {
    
    echo "An error occurred: " . $exception->getMessage();
}


set_exception_handler("custom_exception_handler");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
       
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        
        if (empty($name) || empty($email) || empty($message)) {
            throw new Exception("Mbushni te gjitha fushat");
        }

       
        $to = "?";
        $subject = "Form Submission";
        $body = "Emri: $name\nEmail: $email\nMesazhi:\n$message";

        
        if (!mail($to, $subject, $body)) {
            throw new Exception("Gabim: Mesazhi i juaj nuk u dergua me sukses");
        }

        //nonexistent_folder/messages.txt
        $file_path = "nonexistent_folder/messages.txt";
        $file_content = "Emri: $name\nEmail: $email\nMesazhi: $message\n\n";

       
        $file = fopen($file_path, "a");
        if (!$file) {
            
            throw new Exception("Gabim: Nuk mund të hapet file për ruajtjen e mesazhit.");
        }

        
        if (!fwrite($file, $file_content)) {
           
            throw new Exception("Gabim: Nuk mund të shkruhet në file për ruajtjen e mesazhit.");
        } else {
           
            fclose($file);
        }

        
        echo "Ju faleminderit! Mesazhi u dergua dhe u ruajt.";
    } catch (Exception $e) {
       
        custom_exception_handler($e);
    }
}

?>



