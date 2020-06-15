class Camel extends THREE.Group {

    init (){

        var dChurch = this;
        loadOBJModel("dromedary/","DromedaryCamels.obj","dromedary/","DromedaryCamels.mtl", (mesh) => {
            mesh.scale.x = 1.7;
            mesh.scale.y = 1.7;
            mesh.scale.z = 1.7;
            dChurch.position.x = this.pX;
            dChurch.position.y = 0;
            dChurch.position.z = this.pZ;
            dChurch.rotation.y = Math.PI / 2;
            dChurch.add(mesh);
            collidableMeshList.push(mesh);

        });
    }    
            
    constructor(pX,pZ){
        super();
        this.pX = pX;
        this.pZ = pZ;
        this.init();
    }
}