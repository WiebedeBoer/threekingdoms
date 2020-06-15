class PartPlane extends THREE.Group {
    init(){
        var plane, geometry, material, mPlane, texture;

        mPlane = this;
        
        texture = new THREE.TextureLoader().load( "textures/plane/"+this.tex+".jpg" );
        material = new THREE.MeshBasicMaterial( { map: texture, side: THREE.DoubleSide} );      
        geometry = new THREE.PlaneGeometry( this.width, this.length );
        plane = new THREE.Mesh( geometry, material );
        plane.rotation.x= - 90 * Math.PI / 180;
        plane.position.x= this.xPos;
        plane.position.y= this.yPos;
        plane.position.z= this.zPos;
        mPlane.add(plane);
    }
    constructor(width,length,tex,xPos,yPos,zPos){
        super();
        this.width = width;
        this.tex =tex;
        this.length = length;
        this.xPos = xPos;
        this.yPos =yPos;
        this.zPos = zPos;
        this.init();
    }
}