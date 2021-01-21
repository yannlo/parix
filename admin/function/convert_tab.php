<?php
function convert_tab(string $element){
    $com = explode("[",$element);
    $table=[];
    foreach($com as $valeur){
        $com2 = explode("]",$valeur);
        foreach($com2 as $valeur2){
            if(preg_match("#[0-9]{1,},[0-9]{1,}#",$valeur2) != 0){
                $table[]=$valeur2;
            }
        }
    }
    $tab=[];
    foreach($table as $valeur3){
        $tab[]= explode(",",$valeur3);
    }
    return $tab;
}
?>