class Rooster extends THREE.Group {

    init (){

        var dChurch = this;
        loadOBJModel("rooster/","Rooster.obj","rooster/","Rooster.mtl", (mesh) => {
            mesh.scale.x = 1.2;
            mesh.scale.y = 1.2;
            mesh.scale.z = 1.2;
            dChurch.position.x = this.pX;
            dChurch.position.y = 0.1;
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