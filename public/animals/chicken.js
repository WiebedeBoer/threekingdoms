class Chicken extends THREE.Group {

    init (){

        var dChurch = this;
        loadOBJModel("chicken/","Mesh_Hen.obj","chicken/","Mesh_Hen.mtl", (mesh) => {
            mesh.scale.x = 0.05;
            mesh.scale.y = 0.05;
            mesh.scale.z = 0.05;
            dChurch.position.x = this.pX;
            dChurch.position.y = 2.0;
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