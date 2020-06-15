function basilicaLighter(LightHeight){
//lighting
var hemilight = new THREE.HemisphereLight( 0xfffff0, 0x101020, 0.6 );
hemilight.position.set( 0, LightHeight -5, 0 );
scene.add( hemilight );

var light1 = new THREE.PointLight(0xfffff0, 0.9, 80);
light1.position.set(149,40,225);
scene.add(light1);
var light2 = new THREE.PointLight(0xfffff0, 0.9, 80);
light2.position.set(149,40,175);
scene.add(light2);
var light3 = new THREE.PointLight(0xfffff0, 0.9, 80);
light3.position.set(149,40,125);
scene.add(light3);
var light4 = new THREE.PointLight(0xfffff0, 0.9, 80);
light4.position.set(149,40,75);
scene.add(light4);
var light5 = new THREE.PointLight(0xfffff0, 0.9, 80);
light5.position.set(149,40,25);
scene.add(light5);
var light6 = new THREE.PointLight(0xfffff0, 0.9, 80);
light6.position.set(149,40,-25);
scene.add(light6);
var light7 = new THREE.PointLight(0xfffff0, 0.9, 80);
light7.position.set(149,40,-75);
scene.add(light7);
var light8 = new THREE.PointLight(0xfffff0, 0.9, 80);
light8.position.set(149,40,-125);
scene.add(light8);
var light9 = new THREE.PointLight(0xfffff0, 0.9, 80);
light9.position.set(149,40,-175);
scene.add(light9);
var light10 = new THREE.PointLight(0xfffff0, 0.9, 80);
light10.position.set(149,40,-225);
scene.add(light10);

var light11 = new THREE.PointLight(0xfffff0, 0.75, 80);
light11.position.set(-149,40,225);
scene.add(light11);
var light12 = new THREE.PointLight(0xfffff0, 0.75, 80);
light12.position.set(-149,40,175);
scene.add(light12);
var light13 = new THREE.PointLight(0xfffff0, 0.75, 80);
light13.position.set(-149,40,125);
scene.add(light13);
var light14 = new THREE.PointLight(0xfffff0, 0.75, 80);
light14.position.set(-149,40,75);
scene.add(light14);
var light15 = new THREE.PointLight(0xfffff0, 0.75, 80);
light15.position.set(-149,40,25);
scene.add(light15);
var light16 = new THREE.PointLight(0xfffff0, 0.75, 80);
light16.position.set(-149,40,-25);
scene.add(light16);
var light17 = new THREE.PointLight(0xfffff0, 0.75, 80);
light17.position.set(-149,40,-75);
scene.add(light17);
var light18 = new THREE.PointLight(0xfffff0, 0.75, 80);
light18.position.set(-149,40,-125);
scene.add(light18);
var light19 = new THREE.PointLight(0xfffff0, 0.75, 80);
light19.position.set(-149,40,-175);
scene.add(light19);
var light20 = new THREE.PointLight(0xfffff0, 0.75, 80);
light20.position.set(-149,40,-225);
scene.add(light20);

}