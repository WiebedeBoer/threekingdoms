class Lantern extends THREE.Group {

    init (){

        var dLantern = this;
        loadOBJModel("props/torch/","model.obj","props/torch/","materials.mtl", (mesh) => {
            dLantern.position.x = (1800 - 3600) + (this.pX * 90) - 75;
            dLantern.position.y = this.pY;
            dLantern.position.z = (1800 - 3600) + (this.pZ * 90) - 30;
            dLantern.rotation.x = this.pXr;
            dLantern.rotation.y = this.pYr;
            dLantern.rotation.z = this.pZr;
            mesh.scale.x = 10;
            mesh.scale.y = 50;
            mesh.scale.z = 10;
            dLantern.add(mesh);
            addPointLight(dLantern,0xf8eabb, 0.1, 13.3, 0.1, 2.5, 35); //lantern light
            var g = new THREE.BoxGeometry(1,1,1);
            var m = new THREE.MeshBasicMaterial({color: 0xf8eabb});
            dLantern._meshLight = new THREE.Mesh(g, m);
            dLantern._meshLight.position.set(0.1,13.3,0.1);
            dLantern._meshLight.visible = false;
            dLantern.add(dLantern._meshLight);            
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