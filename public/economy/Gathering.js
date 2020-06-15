//prop gathering: health packs, ammo packs
var selectedProp;
function propGathering(){
    
    breadGathering();
        
}

//bread gathering
function breadGathering(){
    //origin point
    var originPlayerPoint = MovingCube.position.clone();
    var propHit = 0;

    //gathering collision
    for (var vertexPropIndex = 0; vertexPropIndex < MovingCube.geometry.vertices.length; vertexPropIndex++)
    {
        var localVertex = MovingCube.geometry.vertices[vertexPropIndex].clone();
        var globalVertex = localVertex.applyMatrix4( MovingCube.matrix );
        var directionVector = globalVertex.sub( MovingCube.position );

        var rayProp = new THREE.Raycaster( originPlayerPoint, directionVector.clone().normalize() );
        var collisionResults = rayProp.intersectObjects( collidablePropMeshList );
        //check collision props
        if ( collisionResults.length > 0 && collisionResults[0].distance < directionVector.length() ){
            clearText();
            appendText(" Grab ");
            propHit = 1;
            let indexProp = collidablePropMeshList.map(e => e.uuid).indexOf(collisionResults[0]['object']['uuid']);
            selectedProp = propTypes[indexProp];

        }
    }
    
        //check particle hit
        if (propHit >0){
            
            if (selectedProp !="templum" || selectedProp !="bird"){
                //gather prop 
                Gather();
                //amend economy 
                var soundcut="grab"; playSound(soundcut);
            }

        }
}

function Gather(){ 

    if (selectedProp =="coin"){
        totalItem = totalCoin + 1;
        totalCoin = totalCoin + 1;
    }
    else if (selectedProp =="bread"){
        totalItem = totalBread + 1;
        totalBread = totalBread + 1;
    }
    else if (selectedProp =="bow"){
        totalItem = totalArrow + 1;
        totalArrow = totalArrow + 1;
    }
    else if (selectedProp =="sauce"){
        totalItem = totalSauce + 1;
        totalSauce = totalSauce + 1;
    }
    else if (selectedProp =="oil"){
        totalItem = totalOil + 1;
        totalOil = totalOil + 1;
    }
    else if (selectedProp =="wine"){
        totalItem = totalWine + 1;
        totalWine = totalWine + 1;
    }
    else if (selectedProp =="pottery"){
        totalItem = totalPottery + 1;
        totalPottery = totalPottery + 1;
    }
    else if (selectedProp =="cheese"){
        totalItem = totalCheese + 1;
        totalCheese = totalCheese + 1;
    }

    if (totalItem <25){           
        eItem =selectedProp;
        //update weapon in HUD
        appendCoin();
        //update ammo in HUD
        appendItem();
    }

}  