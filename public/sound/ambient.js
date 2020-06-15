//ambient vars
var soundType = "false";

var audi = document.getElementById("soundpar"); 
audi.volume = 0.5; 

//sound gathering
function ambientGathering(){
    var x_sound = Math.floor((camera.position.x + 1785) / 90); //1785 good
    var z_sound = Math.floor((camera.position.z + 1845) / 90); //1845 good
    //x limits
    if (x_sound >40){
        x_sound = 40;
    }
    else if (x_sound <1){
        x_sound = 1;
    }
    else {
        x_sound = x_sound;
    }
    //z limits
    if (z_sound >40){
        z_sound = 40;
    }
    else if (z_sound <1){
        z_sound = 1;
    }
    else {
        z_sound = z_sound;
    }

    var mtag = ((z_sound - 1) * 40) + x_sound; //((z - 1) * 40) +x = good
    var ambients = xtag[mtag].getElementsByTagName("BUSINESS")[0].childNodes[0].nodeValue;
    
    //small ambients checks
    if (ambients =="smithy" && soundType !="smithy"){    
        ambientSmithy();
    }
    if (ambients =="tavern" && soundType !="tavern"){
        ambientTavern();
    }
    if (ambients =="templum" && soundType !="temple"){
        ambientTemple();
    }
    if (ambients =="hortus" && soundType !="garden"){
       ambientGarden();
    }
    if ((ambients =="forum" && soundType !="market") || (ambients=="venalium" && soundType !="market")){
       ambientMarket();
    }
    if (ambients =="bank" && soundType !="bank"){    
        ambientBank();
    }
    if (ambients =="villa" && soundType !="villa"){     
        ambientStable();
    }
    //large ambients checks
    if (ambients =="unknown"){
        
        var localsound = xtag[mtag].getElementsByTagName("SOUND")[0].childNodes[0].nodeValue;
        if (localsound =="racetrack" && soundType !="circus"){
            ambientCircus();
        }
        if (localsound =="arena" && soundType !="amphitheatre"){
            ambientTheatre();
        }
        if (localsound =="baths" && soundType !="baths"){
            ambientBaths();
        }
        if (localsound =="barracks" && soundType !="barracks"){        
            ambientBarracks();
        }
        if (localsound =="docks" && soundType !="harbor"){   
            ambientHarbor();
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

function ambientBank(){         
    document.getElementById("soundscape").src = "sfx/miscellaneous/coinsdrop.mp3";
    document.getElementById("soundpar").load();
    soundType = "bank";
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

//large ambient
function ambientBaths(){         
    document.getElementById("soundscape").src = "sfx/miscellaneous/baths.mp3";
    document.getElementById("soundpar").load();
    soundType = "baths";
} 

function ambientCircus(){         
    document.getElementById("soundscape").src = "sfx/miscellaneous/circus.mp3";
    document.getElementById("soundpar").load();
    soundType = "circus";
} 

function ambientTheatre(){         
    document.getElementById("soundscape").src = "sfx/miscellaneous/amphitheatre.mp3";
    document.getElementById("soundpar").load();
    soundType = "amphitheatre";
} 

function ambientBarracks(){
    var randsound = Math.floor((Math.random() * 2) + 1);
    if (randsound ==1){
        document.getElementById("soundscape").src = "sfx/combat/horn.mp3";
    }
    else if (randsound ==2){
        document.getElementById("soundscape").src = "sfx/combat/march02.mp3";
    }
    document.getElementById("soundpar").load();
    soundType = "barracks";
} 

function ambientHarbor(){         
    document.getElementById("soundscape").src = "sfx/atmosphere/seagulls.mp3";
    document.getElementById("soundpar").load();
    soundType = "harbor";
} 

