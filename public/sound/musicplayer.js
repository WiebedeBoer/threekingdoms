//music player
var aud = document.getElementById("imperia"); 

//change music
function changeImperium(){
        //var rand = Math.floor((Math.random() * 7) + 1);

        var rand = parseInt(document.getElementById("number").rand, 14);
        rand = isNaN(rand) ? 2 : rand;    
        //rand++;
        if(rand ==1){
                document.getElementById("parade").src = "music/1000_goliard_Tempus_Est_Iocundum.mp3";
                rand++;
        } 
        else if(rand ==2){
                document.getElementById("parade").src = "music/1000_gregorian_Byzantine.mp3";
                rand++;
        } 
        else if(rand ==3){
                document.getElementById("parade").src = "music/1000_gregorian_Te_Deum.mp3";
                rand++;
        } 
        else if (rand ==4){
                document.getElementById("parade").src = "music/1000_maqam_bayati_Taqsim.mp3";
                rand++;
        }
        else if(rand ==5){
                document.getElementById("parade").src = "music/1000_maqam_rast_Shuruq.mp3";
                rand++;
        }
        else if(rand ==6){
                document.getElementById("parade").src = "music/1000_mozarabic_Terra_Terra.mp3";
                rand++;
        }
        else if(rand ==7){
                document.getElementById("parade").src = "music/1000_viking_folk_Helvegen.mp3";
                rand++;
        }
        else if(rand ==8){
                document.getElementById("parade").src = "music/1100_estampie_La_Quarte.mp3";
                rand++;
        } 
        else if(rand ==9){
                document.getElementById("parade").src = "music/1100_troubadour_A_Chanter_M_er.mp3";
                rand++;
        } 
        else if(rand ==10){
                document.getElementById("parade").src = "music/1200_ductia_Alfonso_el_Sabio.mp3";
                rand++;
        } 
        else if(rand ==11){
                document.getElementById("parade").src = "music/1200_minnesang_Palastinesong.mp3";
                rand++;
        } 
		else if(rand ==12){
                document.getElementById("parade").src = "music/1200_tarab_andalusi.mp3";
                rand++;
        } 
        else if(rand ==13){
                document.getElementById("parade").src = "music/1300_saltarello.mp3";
                rand++;
        } 
        else if(rand ==14){
                document.getElementById("parade").src = "music/1300_virelai_Dame_Jolie.mp3";
                rand =1;
        }
        document.getElementById('number').rand = rand;
        document.getElementById("imperia").load();
        aud.play(); 
        aud.volume = 0.1;  
}

//pause music
function pauseImperium(){        
        aud.pause(); 
}

//play music
function playImperium(){        
        aud.play(); 
        aud.volume = 0.1;        
}

//load music
function loadImperium(){        
        aud.play(); 
        aud.volume = 0.1;        
}