class Jug extends THREE.Group {

    init (){

        var dGun = this;
        loadOBJModel("props/jug/","Jug_505.obj","props/jug/","Jug_505.mtl", (mesh) => {
            mesh.scale.x = 0.2;
            mesh.scale.y = 0.2;
            mesh.scale.z = 0.2;
            dGun.position.x = this.pX;
            dGun.position.y = this.pY;
            dGun.position.z = this.pZ;
            dGun.rotation.y = this.pYr;
            dGun.add(mesh);

        });
    }    
            
    constructor(pX,pY,pZ,pYr){
        super();
        this.pX = pX;
        this.pY = pY;
        this.pZ = pZ;
        this.pYr = pYr;
        this.init();
    }
}