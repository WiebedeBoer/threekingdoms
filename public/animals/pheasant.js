class Pheasant extends THREE.Group {

    init (){

        var dChurch = this;
        loadOBJModel("pheasant/","PheasantsRingNecked.obj","pheasant/","PheasantsRingNecked.mtl", (mesh) => {
            mesh.scale.x = 0.3;
            mesh.scale.y = 0.3;
            mesh.scale.z = 0.3;
            dChurch.position.x = this.pX;
            dChurch.position.y = 1.0;
            dChurch.position.z = this.pZ;
            dChurch.add(mesh);
            collidableMeshList.push(mesh);

        });
    }    
            
    constructor(pX,pY,pZ){
        super();
        this.pX = pX;
        this.pY = pY;
        this.pZ = pZ;
        this.init();
    }
}