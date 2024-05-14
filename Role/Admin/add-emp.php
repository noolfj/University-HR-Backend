<?php

// Инициализация переменных для ошибок и значений полей
$Full_NameErr = $Date_of_BirthErr = $Place_of_BirthErr = $Position_IdErr = $Degree_IdErr = $Faculty_IdErr = $Department_IdErr = $User_Role_IdErr = $EmailErr = $Phone_NumberErr = $Employee_NumberErr = $UsernameErr = $PasswordErr = "";
$Full_Name = $Date_of_Birth = $Place_of_Birth = $Position_Id = $Degree_Id = $Faculty_Id = $Department_Id = $User_Role_Id = $Email = $Phone_Number = $Employee_Number = $Username = $Password = "";

// Проверка отправки формы методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["Full_Name"])) {
        $Full_NameErr = "Требуется  ФИО";
    } else {
        $Full_Name = $_POST["Full_Name"];
    }

    if (empty($_POST["Date_of_Birth"])) {
        $Date_of_BirthErr = "Требуется  дата рождения";
    } else {
        $Date_of_Birth = $_POST["Date_of_Birth"];
    }

    if (empty($_POST["Place_of_Birth"])) {
        $Place_of_BirthErr = "Требуется  место рождения";
    } else {
        $Place_of_Birth = $_POST["Place_of_Birth"];
    }

    if (empty($_POST["Position_Id"])) {
        $Position_IdErr = "Требуется  должность";
    } else {
        $Position_Id = $_POST["Position_Id"];
    }

    if (empty($_POST["Degree_Id"])) {
        $Degree_IdErr = "Требуется  степень";
    } else {
        $Degree_Id = $_POST["Degree_Id"];
    }

    if (empty($_POST["Faculty_Id"])) {
        $Faculty_IdErr = "Требуется  факультет";
    } else {
        $Faculty_Id = $_POST["Faculty_Id"];
    }

    if (empty($_POST["Department_Id"])) {
        $Department_IdErr = "Требуется  кафедру";
    } else {
        $Department_Id = $_POST["Department_Id"];
    }
    
    if (empty($_POST["User_Role_Id"])) {
        $User_Role_IdErr = "Требуется  роль пользователя";
    } else {
        $User_Role_Id = $_POST["User_Role_Id"];
    }

    if (empty($_POST["Email"])) {
        $EmailErr = "Требуется Email";
    } else {
        $Email = $_POST["Email"];
    }

    if (empty($_POST["Phone_Number"])) {
        $Phone_NumberErr = "Требуется номер телефона";
    } else {
        $Phone_Number = $_POST["Phone_Number"];
    }
    
    if (empty($_POST["Employee_Number"])) {
        $Employee_NumberErr = "Требуется табельный номер";
    } else {
        $Employee_Number = $_POST["Employee_Number"];
    }

    if (empty($_POST["Username"])) {
        $UsernameErr = "Требуется Логин";
    } else {
        $Username = $_POST["Username"];
    }

    if (empty($_POST["Password"])) {
        $PasswordErr = "Требуется  пароль";
    } else {
        $Password = $_POST["Password"];
    }

    // Проверка других полей также...

       // Проверка наличия ошибок перед выполнением запроса в базу данных
       if (empty($Full_NameErr) && empty($Date_of_BirthErr) && empty($Place_of_BirthErr) && empty($Position_IdErr) && empty($Degree_IdErr) && empty($Faculty_IdErr) && empty($Department_IdErr) && empty($User_Role_IdErr) && empty($EmailErr) && empty($Phone_NumberErr) && empty($Employee_NumberErr) && empty($UsernameErr) && empty($PasswordErr)) {
        // Подключение к базе данных
        require_once "conn.php";

        // Формирование SQL запроса для вставки данных в таблицу employees
        $sql = "INSERT INTO employees (Full_Name, Date_of_Birth, Place_of_Birth, Position_Id, Degree_Id, Faculty_Id, Department_Id, User_Role_Id, Email, Phone_Number, Employee_Number, Username, Password, Date_Added) 
                VALUES ('$Full_Name', '$Date_of_Birth', '$Place_of_Birth', '$Position_Id', '$Degree_Id', '$Faculty_Id', '$Department_Id', '$User_Role_Id', '$Email', '$Phone_Number', '$Employee_Number', '$Username', '$Password', NOW())";

        // Выполнение запроса к базе данных
        if (mysqli_query($conn, $sql)) {
            echo "Запись успешно создана!!";
            header("Location: index.php");
            exit();
            // Сброс полей после успешной отправки
            $Full_Name = $Date_of_Birth = $Place_of_Birth = $Position_Id = $Degree_Id = $Faculty_Id = $Department_Id = $User_Role_Id = $Email = $Phone_Number = $Employee_Number = $Username = $Password = ""; 
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Закрытие соединения с базой данных
        mysqli_close($conn);
    }
}
?>