class Table extends THREE.Group {

    init (){

        var dGun = this;
        loadOBJModel("props/table/","Table_Large_Rectangular_01.obj","props/table/","Table_Large_Rectangular_01.mtl", (mesh) => {
            mesh.scale.set (1.1, 1.2, 1.1);
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