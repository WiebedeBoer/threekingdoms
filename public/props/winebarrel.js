class WineBarrel extends THREE.Group {

    init (){

        var dChurch = this;
        loadOBJModel("props/winebarrel/","winebarrel.obj","props/winebarrel/","winebarrel.mtl", (mesh) => {
            mesh.scale.x = 15.2;
            mesh.scale.y = 15.2;
            mesh.scale.z = 15.2;
            dChurch.position.x = this.pX;
            dChurch.position.y = this.pY;
            dChurch.position.z = this.pZ;
            dChurch.rotation.y = this.yR;
            dChurch.add(mesh);
            collidableMeshList.push(mesh);

        });
    }    
            
    constructor(pX,pY,pZ,yR){
        super();
        this.pX = pX;
        this.pY = pY;
        this.pZ = pZ;
        this.yR = yR;
        this.init();
       
    }
}