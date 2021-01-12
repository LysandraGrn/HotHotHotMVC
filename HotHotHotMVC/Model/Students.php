<?php


final class Students
{

    //Fonction qui convertit un fichier Json et affiche la liste des étudiants
    public function jsonToArray() {
        $file = 'C:\xampp\php\www\Students\Model\students_list.json';
        $data = file_get_contents($file);
        $_A_list = json_decode($data, true);

        shuffle($_A_list);
        foreach(array_slice($_A_list, 0 , 4) as $students) {
            echo implode(" ",$students);
            echo "<br/>";
        }
        echo "<br/>" . "Students' list" . "<br/>";
        foreach ($_A_list as $_S_students) {
            echo $_S_students['Civilité']."<br/>";
            echo $_S_students['Nom']."<br/>";
            echo $_S_students['Prénom']."<br/>";
            echo "<br/>";
        }


        //echo '<pre>';
        //print_r($list);
        //echo '</pre>';
    }

}