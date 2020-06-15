class Barrel extends THREE.Group {

    init (){

        var dChurch = this;
        loadOBJModel("props/barrel/","barrel.obj","props/barrel/","barrel.mtl", (mesh) => {
            mesh.scale.x = 11.2;
            mesh.scale.y = 11.8;
            mesh.scale.z = 11.2;
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