class Collider extends THREE.Group {

  init (){

    var mCity = this;

    //city mesh
    var geometry = new THREE.CubeGeometry(1, 1, 1 );

    // translate the geometry to place the pivot point at the bottom instead of the center
    geometry.applyMatrix( new THREE.Matrix4().makeTranslation( 0, 0.5, 0 ) );

    var params = { opacity: 0.9 };
    var opaq = { opacity: 0.0 };    

    //material
    var hallMaterials = [
        new THREE.MeshBasicMaterial({ map: new THREE.TextureLoader().load("textures/tree/eagle.png"), side: THREE.FrontSide, opacity: params.opacity,transparent: true }), //LEFT
        new THREE.MeshBasicMaterial({ map: new THREE.TextureLoader().load("textures/tree/eagle.png"), side: THREE.FrontSide, opacity: params.opacity,transparent: true  }), //RIGHT
        new THREE.MeshBasicMaterial({ map: new THREE.TextureLoader().load("textures/ground/ground_mud.jpg"), side: THREE.FrontSide, opacity: opaq.opacity,transparent: true }), //TOP
        new THREE.MeshBasicMaterial({ map: new THREE.TextureLoader().load("textures/ground/ground_mud.jpg"), side: THREE.FrontSide, opacity: opaq.opacity,transparent: true  }), //BOTTOM
        new THREE.MeshBasicMaterial({ map: new THREE.TextureLoader().load("textures/tree/eagle.png"), side: THREE.FrontSide, opacity: params.opacity,transparent: true  }), //FRONT 
        new THREE.MeshBasicMaterial({ map: new THREE.TextureLoader().load("textures/tree/eagle.png"), side: THREE.FrontSide, opacity: params.opacity,transparent: true  }), //BACK
        ];
    var comMaterial  = new THREE.MeshFaceMaterial(hallMaterials);
    
   
    var buildingMesh = new THREE.Mesh(geometry,comMaterial);

    // put a position
    buildingMesh.position.x = this.pX -halfsize; 
    buildingMesh.position.y = 5;
    buildingMesh.position.z = this.pZ -halfsize; 
    //put a rotation
    buildingMesh.rotation.y = 0;
    //building scale
    buildingMesh.scale.x = this.length;
    buildingMesh.scale.y = this.height;
    buildingMesh.scale.z = this.width;  
    //add to class
    mCity.add(buildingMesh);  
    //push
    collidableMeshList.push(buildingMesh); 
    townTypes.push(this.tid);
    townNames.push(this.name);

}

  //constructor: building type, front texture, back texture, right texture, left texture, top texture, building height, width, length, x position,y position,z position, y rotation
  constructor(id,name,height,width,length,pX,pZ){
    super();
    this.tid = id; 
    this.name = name;  
    this.height = height;
    this.width = width;
    this.length = length;
    this.pX = pX;
    this.pZ = pZ;
    this.init();
  }

}