@extends('layouts.apps')

@push('panggil_css')
<link rel="stylesheet" href="{{ asset('app-assets/vendors/select2/select2.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('app-assets/vendors/select2/select2-materialize.css') }}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/form-select2.css') }}">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

<style>
  #map {  }

</style>
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.bubble.css') }}">


{{-- css --}}
<link type="text/css" rel="stylesheet" href="{{ asset('visual/main.css') }}">

{{-- css --}}
@endpush

@section('konten')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        manfaat
                    </h4>
                    <form action="#" method="post">
                        <div class="input-field">

                        </div>
                        <div class="input-field">
                          <select class="select2 browser-default">
                            @foreach ($datas['manfaat'] as $pil )
                            <option value="{{ $pil->kode_manfaat }}">{{ $pil->nama_manfaat }}</option>
                            @endforeach
                          </select>
                        </div>
                         <!-- Snow Editor start -->
  <section class="snow-editor">
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Keluhan Pasien</h4>
            <p class="mb-1">Pertama</p>
            <div class="row">
              <div class="col s12">
                <div id="snow-wrapper">
                  <div id="snow-container">
                    <div class="quill-toolbar">
                      <span class="ql-formats">
                        <select class="ql-header browser-default">
                          <option value="1">Heading</option>
                          <option value="2">Subheading</option>
                          <option selected>Normal</option>
                        </select>
                        <select class="ql-font browser-default">
                          <option selected>Sailec Light</option>
                          <option value="sofia">Sofia Pro</option>
                          <option value="slabo">Slabo 27px</option>
                          <option value="roboto">Roboto Slab</option>
                          <option value="inconsolata">Inconsolata</option>
                          <option value="ubuntu">Ubuntu Mono</option>
                        </select>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-formula"></button>
                        <button class="ql-code-block"></button>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-clean"></button>
                      </span>
                    </div>
                    <div class="editor">
                      <h1 class="ql-align-center">Keluhan Pasien </h1>
                      <p><br></p>
                      <p>
                        Quill is a free, <a href="https://github.com/quilljs/quill/">open source</a> WYSIWYG editor
                        built for the modern web. With its <a href="http://quilljs.com/docs/modules/">modular
                          architecture</a> and expressive <a href="http://quilljs.com/docs/api/">API</a>, it is
                        completely customizable to fit any need.
                      </p>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Snow Editor end -->
                        <div class="input-field">
                            {{-- <button>teest</button> --}}
                        </div>
                    </form>

                  


                </div>
            </div>
        </div>
    </div>
    {{-- maps --}}
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Peta</h4>
            <div id="map" style="width: auto; height: 400px;"></div>
          </div>
        </div>
      </div>
      
    </div>
    {{-- maps --}}

    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <h4 class="card-title">Visual</h4>
            <div id="container"></div>
            <div id="info_mp24">
                <a href="https://threejs.org" target="_blank" rel="noopener">MP24</a> - Visual MP24<br/>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@include('v_part.kananSidebar')

@push('panggil_js')
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/select2/select2.full.min.js') }}"></script>
  <!-- END PAGE VENDOR JS-->
 <script>
 
     var map = L.map('map').setView([-7.250445, 112.768845], 15);
 
     var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
         maxZoom: 19,
         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
     }).addTo(map);
 
     var marker = L.marker([-7.250445, 112.768845]).addTo(map)
         .bindPopup('<b>{{ auth()->user()->nama }}</b><br />I am a popup.').openPopup();
 
     var circle = L.circle([-7.250445, 112.768845], {
         color: 'red',
         fillColor: '#f03',
         fillOpacity: 0.5,
         radius: 500
     }).addTo(map).bindPopup('I am a circle.');

     function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent('You clicked the map at ' + e.latlng.toString())
			.openOn(map);
	}

	map.on('click', onMapClick);


    // Basic Select2 select
$(".select2").select2({
    dropdownAutoWidth: true,
    width: '100%'
});
 </script>

<script src="{{ asset('app-assets/vendors/quill/katex.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/quill/highlight.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/quill/quill.min.js') }}"></script>
<!-- END PAGE VENDOR JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 <script src="{{ asset('app-assets/js/scripts/form-editor.js') }}"></script>
 <!-- END PAGE LEVEL JS-->

{{-- js  --}}
   <!-- Import maps polyfill -->
		<!-- Remove this when import maps will be widely supported -->
		<script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>

		<script type="importmap">
			{
				"imports": {
					"three": "{{ asset('visual/build/three.module.js') }}"
				}
			}
		</script>

		<script type="module">

			import * as THREE from 'three';

			import Stats from "{{ asset('visual/jsm/libs/stats.module.js')}}";
			import { GUI } from "{{ asset('visual/jsm/libs/lil-gui.module.min.js') }}";

			import { OrbitControls } from "{{ asset('visual/jsm/controls/OrbitControls.js') }}";
			import { GLTFLoader } from "{{ asset('visual/jsm/loaders/GLTFLoader.js') }}";
			import { DecalGeometry } from "{{ asset('visual/jsm/geometries/DecalGeometry.js') }}";

			const container = document.getElementById( 'container' );

			let renderer, scene, camera, stats;
			let mesh;
			let raycaster;
			let line;

			const intersection = {
				intersects: false,
				point: new THREE.Vector3(),
				normal: new THREE.Vector3()
			};
			const mouse = new THREE.Vector2();
			const intersects = [];

			const textureLoader = new THREE.TextureLoader();
			const decalDiffuse = textureLoader.load( "{{ asset('visual/textures/decal/decal-diffuse.png') }}" );
			const decalNormal = textureLoader.load( "{{ asset('visual/textures/decal/decal-normal.jpg') }}" );

			const decalMaterial = new THREE.MeshPhongMaterial( {
				specular: 0x444444,
				map: decalDiffuse,
				normalMap: decalNormal,
				normalScale: new THREE.Vector2( 1, 1 ),
				shininess: 30,
				transparent: true,
				depthTest: true,
				depthWrite: false,
				polygonOffset: true,
				polygonOffsetFactor: - 4,
				wireframe: false
			} );

			const decals = [];
			let mouseHelper;
			const position = new THREE.Vector3();
			const orientation = new THREE.Euler();
			const size = new THREE.Vector3( 10, 10, 10 );

			const params = {
				minScale: 10,
				maxScale: 20,
				rotate: true,
				clear: function () {

					removeDecals();

				}
			};

			window.addEventListener( 'load', init );

			function init() {

				renderer = new THREE.WebGLRenderer( { antialias: true } );
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				container.appendChild( renderer.domElement );

				stats = new Stats();
				container.appendChild( stats.dom );

				scene = new THREE.Scene();

				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 1000 );
				camera.position.z = 120;

				const controls = new OrbitControls( camera, renderer.domElement );
				controls.minDistance = 50;
				controls.maxDistance = 200;

				scene.add( new THREE.AmbientLight( 0x443333 ) );

				const dirLight1 = new THREE.DirectionalLight( 0xffddcc, 1 );
				dirLight1.position.set( 1, 0.75, 0.5 );
				scene.add( dirLight1 );

				const dirLight2 = new THREE.DirectionalLight( 0xccccff, 1 );
				dirLight2.position.set( - 1, 0.75, - 0.5 );
				scene.add( dirLight2 );

				const geometry = new THREE.BufferGeometry();
				geometry.setFromPoints( [ new THREE.Vector3(), new THREE.Vector3() ] );

				line = new THREE.Line( geometry, new THREE.LineBasicMaterial() );
				scene.add( line );

				loadLeePerrySmith();

				raycaster = new THREE.Raycaster();

				mouseHelper = new THREE.Mesh( new THREE.BoxGeometry( 1, 1, 10 ), new THREE.MeshNormalMaterial() );
				mouseHelper.visible = false;
				scene.add( mouseHelper );

				window.addEventListener( 'resize', onWindowResize );

				let moved = false;

				controls.addEventListener( 'change', function () {

					moved = true;

				} );

				window.addEventListener( 'pointerdown', function () {

					moved = false;

				} );

				window.addEventListener( 'pointerup', function ( event ) {

					if ( moved === false ) {

						checkIntersection( event.clientX, event.clientY );

						if ( intersection.intersects ) shoot();

					}

				} );

				window.addEventListener( 'pointermove', onPointerMove );

				function onPointerMove( event ) {

					if ( event.isPrimary ) {

						checkIntersection( event.clientX, event.clientY );

					}

				}

				function checkIntersection( x, y ) {

					if ( mesh === undefined ) return;

					mouse.x = ( x / window.innerWidth ) * 2 - 1;
					mouse.y = - ( y / window.innerHeight ) * 2 + 1;

					raycaster.setFromCamera( mouse, camera );
					raycaster.intersectObject( mesh, false, intersects );

					if ( intersects.length > 0 ) {

						const p = intersects[ 0 ].point;
						mouseHelper.position.copy( p );
						intersection.point.copy( p );

						const n = intersects[ 0 ].face.normal.clone();
						n.transformDirection( mesh.matrixWorld );
						n.multiplyScalar( 10 );
						n.add( intersects[ 0 ].point );

						intersection.normal.copy( intersects[ 0 ].face.normal );
						mouseHelper.lookAt( n );

						const positions = line.geometry.attributes.position;
						positions.setXYZ( 0, p.x, p.y, p.z );
						positions.setXYZ( 1, n.x, n.y, n.z );
						positions.needsUpdate = true;

						intersection.intersects = true;

						intersects.length = 0;

					} else {

						intersection.intersects = false;

					}

				}

				// const gui = new GUI();

				// gui.add( params, 'minScale', 1, 30 );
				// gui.add( params, 'maxScale', 1, 30 );
				// gui.add( params, 'rotate' );
				// gui.add( params, 'clear' );
				// gui.open();

				// onWindowResize();
				animate();

			}

			function loadLeePerrySmith() {

				const loader = new GLTFLoader();

				loader.load(  "{{ asset('visual/models/gltf/LeePerrySmith/LeePerrySmith.glb') }}", function ( gltf ) {

					mesh = gltf.scene.children[ 0 ];
					mesh.material = new THREE.MeshPhongMaterial( {
						specular: 0x111111,
						map: textureLoader.load(  "{{ asset('visual/models/gltf/LeePerrySmith/Map-COL.jpg') }}" ),
						specularMap: textureLoader.load(  "{{ asset('visual/models/gltf/LeePerrySmith/Map-SPEC.jpg') }}"  ),
						normalMap: textureLoader.load(  "{{ asset('visual/models/gltf/LeePerrySmith/Infinite-Level_02_Tangent_SmoothUV.jpg') }}"  ),
						shininess: 25
					} );

					scene.add( mesh );
					mesh.scale.set( 10, 10, 10 );

				} );

			}

			function shoot() {

				position.copy( intersection.point );
				orientation.copy( mouseHelper.rotation );

				if ( params.rotate ) orientation.z = Math.random() * 2 * Math.PI;

				const scale = params.minScale + Math.random() * ( params.maxScale - params.minScale );
				size.set( scale, scale, scale );

				const material = decalMaterial.clone();
				material.color.setHex( Math.random() * 0xffffff );

				const m = new THREE.Mesh( new DecalGeometry( mesh, position, orientation, size ), material );

				decals.push( m );
				scene.add( m );

			}

			function removeDecals() {

				decals.forEach( function ( d ) {

					scene.remove( d );

				} );

				decals.length = 0;

			}

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}

			function animate() {

				requestAnimationFrame( animate );

				renderer.render( scene, camera );

				stats.update();

			}

		</script>
{{-- js  --}}
@endpush

@endsection