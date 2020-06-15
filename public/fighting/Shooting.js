//shooting
function Shot(){
    //shoot ammo check
        if (totalArrow >1){
            
            var soundcut="shoot"; playSound(soundcut);
            //less ammo
            totalArrow = totalArrow - 1;
            totalItem = totalArrow - 1;                        
            //create ammo particle
            var ammoGeometry = new THREE.CubeGeometry(3,3,3,1,1,1);
            var ammoMaterial = new THREE.MeshBasicMaterial( { color: 0xff0000, wireframe:true, visible:false } );
            var ammoCube = new THREE.Mesh( ammoGeometry, ammoMaterial );
            //set particle position
            ammoCube.position.set(camera.position.x, camera.position.y - 3, camera.position.z);
            //set rotation to that of the camera (player)
            ammoCube.rotation.x = camera.rotation.x;
            ammoCube.rotation.y = camera.rotation.y;
            ammoCube.rotation.z = camera.rotation.z;
            //add particle
            scene.add( ammoCube );
            collidableBulletMeshList.push(ammoCube); 
            bullets.push(ammoCube);            
            //create bullet mesh
            var bulletmesh;
            //set rotation and position to that of the camera (player)
            bulletmesh = new Arrow(camera.position.x, camera.position.y-3, camera.position.z,camera.rotation.x,camera.rotation.y,camera.rotation.z); 
            //push in list
            bulletmeshes.push(bulletmesh);
            //add to scene
            scene.add(bulletmesh);       
            //set timeout bullet
            ammoCube.alive = true;
            setTimeout(function(){
                let indexBullet = bullets.map(e => e.uuid).indexOf(ammoCube.uuid);                
                if(indexBullet !== -1){
                    bullets.splice(indexBullet,1);
                    scene.remove(ammoCube);                    
                }
                let indexBulletmesh = bulletmeshes.map(m => m.uuid).indexOf(bulletmesh.uuid);
                if(indexBulletmesh !== -1){
                    bulletmeshes.splice(indexBullet,1);                    
                    scene.remove(bulletmesh);
                }
            }, 3000);

        }
        else {
            totalCoin = 0;  
        }
        //update coin in HUD
        appendCoin();
        eItem ="Bow";
        appendItem();
    
} 
//move bullet cube
function BulletTravel(delta){
    bullets.forEach(element => {
        element.translateZ(-10);
    });
    bulletmeshes.forEach(element => {
        element.translateZ(-10); 
    });
}

