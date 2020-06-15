class Duck extends THREE.Group {

    init (){

        var dChurch = this;
        loadOBJModel("mallard_duck/","MallardDuck.obj","mallard_duck/","MallardDuck.mtl", (mesh) => {
            mesh.scale.x = 1.5;
            mesh.scale.y = 1.5;
            mesh.scale.z = 1.5;
            dChurch.position.x = this.pX;
            dChurch.position.y = 0.1;
            dChurch.position.z = this.pZ;
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