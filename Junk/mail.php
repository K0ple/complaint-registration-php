<body>
<form method="POST" name="email_form_with_php" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data">
<label for='name'>Name: </label>
<input type="text" name="name" >
<label for='email'>Email: </label>
<input type="text" name="email" >
<label for='message'>Message:</label>
<textarea name="message"></textarea>
<label for='uploaded_file'>Select A File To Upload:</label>
<input type="file" name="uploaded_file">
<input type="submit" value="Submit" name='submit'>
</form>
<?php 
    include_once('Mail.php');
    include_once('Mail_Mime/mime.php');
    
    $name_of_uploaded_file = basename($_FILES['uploaded_file']['name']);
    $type_of_uploaded_file = substr($name_of_uploaded_file,
    strrpos($name_of_uploaded_file, '.') + 1);
    $size_of_uploaded_file = $_FILES["uploaded_file"]["size"]/1024;
    $max_allowed_file_size = 100;
    $allowed_extensions = array("jpg", "jpeg", "gif", "bmp");
    if($size_of_uploaded_file > $max_allowed_file_size )
    {
    $errors .= "\n Size of file should be less than $max_allowed_file_size";
    }
    $allowed_ext = false;
    for($i=0; $i<sizeof($allowed_extensions); $i++)
    {
    if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
    {
        $allowed_ext = true;
    }
    }
    if(!$allowed_ext)
    {
        $errors .= "\n The uploaded file is not supported file type. "." Only the following file types are supported: ".implode(',',$allowed_extensions);
        $path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
        $tmp_path = $_FILES["uploaded_file"]["tmp_name"];
        if(is_uploaded_file($tmp_path))
        {
            if(!copy($tmp_path,$path_of_uploaded_file))
            {
                $errors .= '\n error while copying the uploaded file';
            }
        }    
    }
    $message = new Mail_mime();
    $message->setTXTBody($text);
    $message->addAttachment($path_of_uploaded_file);
    $body = $message->get();
    $extraheaders = array("From"=>$from, "Subject"=>$subject,"Reply-To"=>$visitor_email);
    $headers = $message->headers($extraheaders);
    $mail = Mail::factory("mail");
    $mail->send($to, $headers, $body);

?>
</body>




