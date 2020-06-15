function worldLighter(){
//lighting
var light = new THREE.HemisphereLight( 0xfffff0, 0x101020, 1.0 );
light.position.set( 0, 900, 100 );
scene.add( light );

}