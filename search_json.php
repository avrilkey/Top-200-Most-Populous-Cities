<?php
//get the pasing variable
$searchTxt = $_GET["searchKey"];
//json file
$jsonfile = "data.json";

//load json file
$loadFile = file_get_contents($jsonfile);

//parse through json file - turn file to an array
$decodeJson = json_decode($loadFile,true);

//print name of the first record
//print "First City: ".$decodeJson[0]["name"];

//number of records in the json file
$numrecs = count($decodeJson);

//start sending select elemenT to HTML
print "<select id= 'nameList' size='10' onchange='showinfo()'";

//loop through all json file records using for loop\
for($i =0; $i < $numrecs; $i++)
{ 
    //if you type in the search
    if($searchTxt != "")
    {
        if (strtoupper(substr($decodeJson[$i]["name"],0,strlen($searchTxt))) == strtoupper($searchTxt))
        {
            $name = $decodeJson[$i]["name"];
            $state = $decodeJson[$i]["usps"];
            $pop2022 = $decodeJson[$i]["pop2022"];
            
            $optionValue = $name.",".$state.",".$pop2022;
        
            //send selec option to HTML
            print"<option value='".$optionValue."'>".$name."</option>";
        }
    }

    //if you dont type anything in the search
    else 
    {
        $name = $decodeJson[$i]["name"];
        $state = $decodeJson[$i]["usps"];
        $pop2022 = $decodeJson[$i]["pop2022"];

        $optionValue = $name.",".$state.",".$pop2022;
    
        //send selec option to HTML
        print"<option value='".$optionValue."'>".$name."</option>";
    }

}
//send close select to HTML
print"</select>";

?>
