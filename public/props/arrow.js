class Arrow extends THREE.Group {

    init (){

        var dGun = this;
        loadOBJModel("props/arrow/","CHAHIN_ARROW.obj","props/arrow/","CHAHIN_ARROW.mtl", (mesh) => {
            mesh.scale.set (2.5, 2.5, 2.5);
            dGun.position.x = this.pX;
            dGun.position.y = this.pY;
            dGun.position.z = this.pZ;
            dGun.rotation.x = this.pXr;
            dGun.rotation.y = this.pYr;
            dGun.rotation.z = this.pZr;
            dGun.add(mesh);

        });
    }    
            
    constructor(pX,pY,pZ,pXr,pYr,pZr){
        super();
        this.pX = pX;
        this.pY = pY;
        this.pZ = pZ;
        this.pXr = pXr;
        this.pYr = pYr;
        this.pZr = pZr;
        this.init();
    }
}