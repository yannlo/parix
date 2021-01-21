<?php




include('../admin/function/connexion_bdd.php');


if (!empty($_POST["var"])) {
    # code...
    
    $var = json_decode($_POST["var"]);
    
    $section= '';
    
    $prix=[];
    
    for ($i=0; $i < count($var); $i++) { 
        # code...
        
        $get_plat = $bdd -> prepare("SELECT * FROM menu WHERE id = :id");
        
        
        $get_plat -> execute(array(
            "id" => $var[$i][0],
        ));
        # code...
        
        
        while ($plat = $get_plat -> fetch()){
            
            
            
            $section .= ' <div class="menu_elt" id="meo'.$plat["id"].'" >
            <p>
            <img src="images/plats/'.$plat["photoPlat"].'" alt=""/>
            </p>
            
            <div class="menu_center" >
            <h3>'.$plat["nomPlat"].'</h3>
            <p>
            <label for="quantite'.$plat["id"].'">Quantité :</label>
            <input type="number" min="1" max= "20" name="quantite" value="'.$var[$i][1].'" id="quantite'.$plat["id"].'" onchange="multiplication(\''.$plat["id"].'\',\'quantite'.$plat["id"].'\');" />
            </p>
            
            </div>
            
            <table>
            <tr>
            <th>prix</th>
            </tr>
            <tr>
            <td>'.$plat["prix"].' fcfa</td>
            </tr>
            </table>
            
            </div> ';
            
            $prix[] = $plat["prix"];
        }
        
    }
    
    $return = ["retour" => $section, "prix" => $prix ];
    
    echo(json_encode($return));
    
}else{
    $return = ["erreur" => 'probleme' ];
    echo(json_encode($return));
}


    

?>