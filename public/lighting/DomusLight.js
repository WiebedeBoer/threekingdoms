function domusLighter(LightHeight){
//lighting
var light = new THREE.HemisphereLight( 0xfffff0, 0x101020, 0.1 );
light.position.set( 0, LightHeight, 0 );
scene.add( light );
//directional
var directionalLight = new THREE.DirectionalLight( 0xfffff0, 0.2 );
directionalLight.position.set(-49, 30, 25);
//directionalLight.target(26, 12, 21);
directionalLight.castShadow = true;
directionalLight.shadowMapWidth = 100;
directionalLight.shadowMapHeight = 100;
directionalLight.shadowCameraNear = 5;
directionalLight.shadowCameraFar = 90;
directionalLight.shadowCameraLeft = -10;
directionalLight.shadowCameraRight = 10;
directionalLight.shadowCameraTop = 30;
directionalLight.shadowCameraBottom = -10;
scene.add(directionalLight);
//point
var vestibulumlight = new THREE.PointLight(0xfffff0, 0.8, 50);
vestibulumlight.position.set(-49,23,29.5);
scene.add(vestibulumlight);
var atriumlight = new THREE.PointLight(0xfffff0, 1.5, 70);
atriumlight.position.set(100,36,0);
scene.add(atriumlight);
var peristyliumlight = new THREE.PointLight(0xfffff0, 1.5, 70);
peristyliumlight.position.set(300,36,0);
scene.add(peristyliumlight);
var exedralight1 = new THREE.PointLight(0xfffff0, 0.8, 50);
exedralight1.position.set(449,23,29.5);
scene.add(exedralight1);
var exedralight2 = new THREE.PointLight(0xfffff0, 0.8, 50);
exedralight2.position.set(449,23,-29.5);
scene.add(exedralight2);
var kliniaLight1 = new THREE.PointLight(0xfffff0, 0.8, 50);
kliniaLight1.position.set(329.5,23,149);
scene.add(kliniaLight1);
var kliniaLight2 = new THREE.PointLight(0xfffff0, 0.8, 50);
kliniaLight2.position.set(270.5,23,149);
scene.add(kliniaLight2);
}