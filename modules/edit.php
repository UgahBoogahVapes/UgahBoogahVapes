<?php
    include("../helpers/crud.php");

    $inputs = $_POST;
    $id = $_POST["id"];
    $table = $_POST['table'];

    // Initialize an array to store the updated data
    $data = array();

    // Iterate through the input data and filter out location and table key
    foreach ($inputs as $key => $value) {
        if ($key != "location" && $key != "table") {
            $data[$key] = $value;
        }
    }

    // If referring to user table, execute this code so that the image will also be updated
    if ($table == "places") {
        // if ($inputs['transportation']) {
        //     $transportation = "";
        //     $i = 1;
        //     $numItems = count($inputs["transportation"]);
        //     foreach($inputs["transportation"] as $transpo) {
        //         $transportation .= $transpo;
        //         if ($i<$numItems) {
        //             $transportation.=", ";
        //         }
        //         $i++;
        //     }
        //     $data["transportation"] = $transportation;
        //     if ($transportation != $crud->read("places", $id)["transportation"]) {
        //         $crud->create("logs", ["log" => ucwords($data['transportation'])." is now set for transportation in ".$data['name'].".", "date" => date("F j, Y", strtotime("now"))]);
        //     }
        // }
        
        // Check if an image file is uploaded
        $images = "";
        if ($_FILES && ($_FILES['image']['name'][0] != "")) {
            for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
                $target_dir = "../assets/img/places/";
                $file = $_FILES['image']['name'][$i];
                $path = pathinfo($file);
                $filename = $data['name'] . $i;
                $ext = $path['extension'];
                $temp_name = $_FILES['image']['tmp_name'][$i];
                $path_filename_ext = $target_dir . $filename . "." . $ext;
                if (rename($temp_name, $path_filename_ext)) {
                    echo "File Replaced Successfully.";
                } else {
                    echo "Error replacing the file.";
                }
        
                $images .= $filename . "." . $ext;
                if ($i < count($_FILES['image']['name']) - 1) {
                    $images .= "%^&";
                }
            }
            $crud->create("logs", ["log" => "Image has been uploaded in " . $data['name'] . ".", "date" => date("F j, Y", strtotime("now"))]);
        }
        echo $images;
        $data['image'] = ($_FILES['image']['name'][0] != "") ? $images : $crud->read($table, $id)['image'];
    }
    
    $crud->update($table, $id, $data);

    header("Location: ../index.php?page=" . $_POST['location'] . "&status=updated");
    exit;
?>
