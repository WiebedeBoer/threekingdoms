function Lighter(){
//lighting
var light = new THREE.HemisphereLight( 0xfffff0, 0x101020, 0.25 );
light.position.set( 0, 1000, 0 );
scene.add( light );

//directional
var directionalLight = new THREE.DirectionalLight( 0xfffff0, 0.5 );
directionalLight.position.set(-2000, 500, -2000);
directionalLight.castShadow = true;
directionalLight.shadowMapWidth = 5500;
directionalLight.shadowMapHeight = 5500;
directionalLight.shadowCameraNear = 5;
directionalLight.shadowCameraFar = 200;
directionalLight.shadowCameraLeft = -10;
directionalLight.shadowCameraRight = 10;
directionalLight.shadowCameraTop = 30;
directionalLight.shadowCameraBottom = -10;
scene.add(directionalLight);

//lantern props

var lantern = new Lantern(17,6,20,0,0,0); //vestal
scene.add(lantern);
var lantern2 = new Lantern(18,6,20,0,0,0); //vestal
scene.add(lantern2);

}