 <?php
 //define enviroment
switch($_SERVER["HTTP_HOST"])
{
        case "localhost":
       {//set error reporting when its on development
       HTTP_HOST        error_reporting(E_ALL); 
               ini_set('display_errors', 1);
           define('ENVIROMENT', 'development',true);
            break;
       }
        default:
           define('ENVIROMENT', 'production',true);
        break;
}

?>