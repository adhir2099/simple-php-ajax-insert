<?php

include('./dbcon.php');

if(isset($_POST["action"])){

    //Load data
    if($_POST["action"] == "Load"){

        $statement = $connect->prepare("SELECT * FROM employees ORDER BY name ASC");
        $statement->execute();
        $result = $statement->fetchAll();
        $output = '';
        $output .= '
        <table id="tech-companies-1" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
        ';

        if(sizeof($result) > 0){
            
            foreach($result as $row){

                $output .= '
                <tr>
                    <td>'.$row["name"].'</td>
                    <td>'.$row['address'].'</td>
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['age'].'</td>
                </tr>';
            }
        }else{
            $output .= '
                <tr>
                    <td align="center">No records found</td>
                </tr>';
        }

        $output .= '</tbody></table>';

        echo $output;

    }
}

//Create-Insert
if($_POST["action"] == "Save"){
    
    $statement = $connect->prepare("INSERT INTO employees (name,address,gender,age) VALUES (:name,:address,:gender,:age)");
    $statement->bindParam(':name', $_POST["name"]);
    $statement->bindParam(':address', $_POST["address"]);
    $statement->bindParam(':gender', $_POST["gender"]);
    $statement->bindParam(':age', $_POST["age"]);

    if($statement->execute()){
        echo 'recordInserted';
    }
}