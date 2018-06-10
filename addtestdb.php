<?php
$name=$_FILES['file']['name'];
echo exec("python myself.py $name");
echo "Success";


?>