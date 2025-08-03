<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Three.js Starfield Circle</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap');

    :root {
      --mainFont: "Sofia Sans", sans-serif;
      --mainColor: rebeccapurple;
    }

    body {
      margin: 0;
      background: black;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      position: relative;
    }

    #container {
      width: 90vw;
      height: 90vh;
      position: relative;
    }

    canvas {
      width: 100%;
      height: 100%;
      display: block;
    }

    #loginForm,
    #registerForm {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(15, 15, 15, 0.7);
      padding: 20px;
      border-radius: 8px;
      color: white;
      text-align: center;
      width: 300px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
      opacity: 0;
      transition: opacity 0.5s ease;
      pointer-events: none;
      visibility: hidden;
    }

    .show {
      opacity: 1 !important;
      pointer-events: auto !important;
      visibility: visible !important;
    }

    input,
    button {
      font-family: var(--mainFont);
    }

    input {
      width: 93%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 4px;
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
      border: 1px solid gray;
    }

    button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      background-color: #535353;
      border: none;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }

    .register {
      color: white;
      cursor: pointer;
      display: inline-block;
      margin-top: 10px;
    }

    header,
    footer {
      position: absolute;
      width: 100%;
      text-align: center;
      color: white;
      z-index: 2;
      font-family: var(--mainFont);
    }

    header {
      top: 0;
      padding: 10px;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent);
    }

    footer {
      bottom: 0;
      padding: 10px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
    }
  </style>
</head>

<body>
  <header>
    <h1>Ignite Start</h1>
  </header>

  <div id="container">
    <canvas id="myCanvas"></canvas>

    <div id="loginForm">
      <h2>Login</h2>
      <input type="text" id="loginUsername" placeholder="Username" />
      <input type="password" id="loginPassword" placeholder="Password" />
      <button id="loginBtn" class="login">Login</button>
      <button id="recoverAccountBtn">Recover Account</button>
      <a class="register" id="showRegister">register</a>
    </div>

    <div id="registerForm">
      <h2>Register</h2>
      <input type="text" id="registerName" placeholder="Name" />
      <input type="email" id="registerEmail" placeholder="Email" />
      <input type="password" id="registerPassword" placeholder="Password" />
      <button id="registerBtn">Register</button>
      <a class="register" id="showLogin">login</a>
    </div>
  </div>

  <footer>
    <p>© 2025 Ignite Start. All rights reserved.</p>
  </footer>

  <script type="module">
    import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.160.1/+esm';

    let scene, camera, renderer, stars, starGeo;
    let starData = [];
    let velocityBoost = 0;
    let animationId;

    const canvas = document.getElementById("myCanvas");
    const container = document.getElementById("container");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");

    function init() {
      const width = container.clientWidth;
      const height = container.clientHeight;

      scene = new THREE.Scene();
      camera = new THREE.PerspectiveCamera(60, width / height, 1, 1000);
      camera.position.z = 1;
      camera.rotation.x = Math.PI / 2;

      renderer = new THREE.WebGLRenderer({ canvas });
      renderer.setSize(width, height);

      const vertices = [];
      starData = [];

      for (let i = 0; i < 6000; i++) {
        let star = {
          x: Math.random() * 600 - 300,
          y: Math.random() * 600 - 300,
          z: Math.random() * 600 - 300,
          velocity: 0,
          acceleration: 0.0001
        };
        starData.push(star);
        vertices.push(star.x, star.y, star.z);
      }

      starGeo = new THREE.BufferGeometry();
      starGeo.setAttribute("position", new THREE.Float32BufferAttribute(vertices, 3));

      const sprite = new THREE.TextureLoader().load('https://threejs.org/examples/textures/sprites/circle.png');
      const starMaterial = new THREE.PointsMaterial({
        color: 0xffffff,
        size: 0.7,
        map: sprite,
        transparent: true,
        depthWrite: false,
        blending: THREE.AdditiveBlending,
        opacity: 1
      });

      stars = new THREE.Points(starGeo, starMaterial);
      scene.add(stars);

      animate();
    }

    function animate() {
      const positions = starGeo.attributes.position.array;

      for (let i = 0; i < starData.length; i++) {
        let star = starData[i];
        star.velocity += star.acceleration + velocityBoost;
        star.y -= star.velocity;

        if (star.y < -200) {
          star.y = 200;
          star.velocity = 0;
        }

        positions[i * 3] = star.x;
        positions[i * 3 + 1] = star.y;
        positions[i * 3 + 2] = star.z;
      }

      starGeo.attributes.position.needsUpdate = true;
      stars.rotation.y += 0.0005;

      renderer.render(scene, camera);
      animationId = requestAnimationFrame(animate);
    }

    function disposeScene() {
      if (stars) {
        scene.remove(stars);
        stars.geometry.dispose();
        stars.material.dispose();
        stars = null;
      }
      if (renderer) {
        renderer.dispose();
      }
      cancelAnimationFrame(animationId);
    }

    function registerBurstThenReinit() {
      registerForm.classList.add("show");
      loginForm.classList.remove("show");

      velocityBoost = 0.5;

      setTimeout(() => {
        velocityBoost = 0;
        disposeScene();
        init();
      }, 500);
    }

    document.getElementById("showRegister").addEventListener("click", registerBurstThenReinit);
    document.getElementById("showLogin").addEventListener("click", () => {
      registerForm.classList.remove("show");
      loginForm.classList.add("show");
    });

    // Initialize
    init();
    loginForm.classList.add("show");
  </script>
</body>
</html>
