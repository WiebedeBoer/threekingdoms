//prop gathering: health packs, ammo packs
var soundProp;

//ambient vars
var soundType = "false";

var audi = document.getElementById("soundpar"); 
audi.volume = 0.5; 

//bread gathering
function soundGathering(){
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
            soundProp = propTypes[indexProp];

        }
    }
    
        //check particle hit
        if (propHit >0){

            //small ambients checks
            if (soundProp =="bow" && soundType !="smithy"){    
                ambientSmithy();
            }
            if (soundProp =="wine" && soundType !="tavern"){
                ambientTavern();
            }
            if (soundProp =="templum" && soundType !="temple"){
                ambientTemple();
            }
            if (soundProp =="bird" && soundType !="garden"){
                ambientGarden();
            }
            if ((soundProp =="bread" && soundType !="market") || (soundProp =="sauce" && soundType !="market") ) {
                ambientMarket();
            }
            if (soundProp =="oil" && soundType !="villa"){     
                ambientStable();
            }

        }
}


//small ambient
function ambientTavern(){         
    document.getElementById("soundscape").src = "sfx/miscellaneous/tavern.mp3";
    document.getElementById("soundpar").load();
    soundType = "tavern";
} 

function ambientSmithy(){         
    document.getElementById("soundscape").src = "sfx/miscellaneous/blacksmith.mp3";
    document.getElementById("soundpar").load();
    soundType = "smithy";
}

function ambientStable(){         
    document.getElementById("soundscape").src = "sfx/miscellaneous/harvest.mp3";
    document.getElementById("soundpar").load();
    soundType = "villa";
} 

function ambientTemple(){         
    document.getElementById("soundscape").src = "sfx/miscellaneous/temple.mp3";
    document.getElementById("soundpar").load();
    soundType = "temple";
} 

function ambientGarden(){         
    document.getElementById("soundscape").src = "sfx/atmosphere/birds.mp3";
    document.getElementById("soundpar").load();
    soundType = "garden";
} 

function ambientMarket(){         
    document.getElementById("soundscape").src = "sfx/atmosphere/population_4_city.mp3";
    document.getElementById("soundpar").load();
    soundType = "market";
} 
