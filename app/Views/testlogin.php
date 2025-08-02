<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Three.js in Custom Canvas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap');

        :root {
            --mainFont: "Sofia Sans", sans-serif;
            --mainColor: rebeccapurple;
            --subColor: "";
        }

        button,
        input,
        h1,
        h2,
        input,
        label,
        a {
            font-family: var(--mainFont);
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
            /* border: 2px solid white; */
            position: relative;
        }

        canvas {
            width: 100%;
            height: 100%;
            display: block;
        }

        /* Transparent Login Form */
        #loginForm {
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
        }

        #loginForm input {
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border-style: solid;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            transition: border-color 0.5s ease;
        }

        #loginForm input:focus {
            border-color: var(--mainColor);
            outline: none;
            box-shadow: none;
            border-color: inherit;
        }

        #loginForm button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 8px;
            background-color: #535353ff;
            transition: background-color 0.3s ease;
        }

        #loginForm .login:hover {
            background-color: green;
        }

        #loginForm .recover-account:hover {
            background-color: var(--mainColor);
        }

        #loginForm .register {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        #loginForm .register:hover {
            color: var(--mainColor);
        }

            header, footer {
        position: absolute;
        left: 0;
        width: 100%;
        text-align: center;
        font-family: var(--mainFont);
        z-index: 2;
        color: white;
        pointer-events: none;
    }

    /* Header and Footer */
     header, footer {
        position: absolute;
        width: 100%;
        z-index: 2;
        color: white;
        font-family: var(--mainFont);
        pointer-events: none;
    }

    header {
        top: 0;
        left: 0;
        padding: 10px 20px;
        text-align: left;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent);
    }

    footer {
        bottom: 0;
        text-align: center;
        padding: 10px 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
    }

    header h1,
    footer h1 {
        margin: 0;
        font-size: 1.5rem;
    }
    </style>
</head>

<body>
    <header>
        <h1 style="color:white">Ignite Start</h1>
    </header>
    <div id="container">
        <canvas id="myCanvas"></canvas>

        <!-- Login Form -->
        <div id="loginForm">
            <h2>Login</h2>
            <input type="text" id="username" placeholder="Username" />
            <input type="password" id="password" placeholder="Password" />
            <button onclick="login()" id="login" class="login" name="ignite-login">Login</button>
            <button onclick="login()" id="recover-account" class="recover-account" name="recover-account">Recover Account</button>
            <a href="asdad" class="register">register</a>
        </div>
    </div>

    <script type="module">
        import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.160.1/+esm';

        let scene, camera, renderer, stars, starGeo;
        let starData = [];

        function init() {
            const canvas = document.getElementById('myCanvas');
            const container = document.getElementById('container');
            const width = container.clientWidth;
            const height = container.clientHeight;

            scene = new THREE.Scene();
            camera = new THREE.PerspectiveCamera(60, width / height, 1, 1000);
            camera.position.z = 1;
            camera.rotation.x = Math.PI / 2;

            renderer = new THREE.WebGLRenderer({
                canvas
            });
            renderer.setSize(width, height);

            const vertices = [];

            for (let i = 0; i < 6000; i++) {
                let star = {
                    x: Math.random() * 600 - 300,
                    y: Math.random() * 600 - 300,
                    z: Math.random() * 600 - 300,
                    velocity: 0,
                    acceleration: 0.0001,
                };
                starData.push(star);
                vertices.push(star.x, star.y, star.z);
            }

            starGeo = new THREE.BufferGeometry();
            starGeo.setAttribute('position', new THREE.Float32BufferAttribute(vertices, 3));

            const sprite = new THREE.TextureLoader().load('images/circle.png');
            const starMaterial = new THREE.PointsMaterial({
                color: 0xffffff,
                size: 0.7,
                map: sprite,
                transparent: true,
                depthWrite: false,
                blending: THREE.AdditiveBlending, // makes them glow
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
                star.velocity += star.acceleration;
                star.y -= star.velocity;

                if (star.y < -200) {
                    star.y = 200;
                    star.velocity = 0;
                }

                positions[i * 3 + 0] = star.x;
                positions[i * 3 + 1] = star.y;
                positions[i * 3 + 2] = star.z;
            }

            starGeo.attributes.position.needsUpdate = true;
            stars.rotation.y += 0.0005;

            renderer.render(scene, camera);
            requestAnimationFrame(animate);
        }

        // Function to handle login action
        function login() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username && password) {
                alert(`Logged in as: ${username}`);
            } else {
                alert('Please fill in both fields');
            }
        }

        init();
    </script>

    <footer>
        <p style="color:white">© 2025 Ignite Start. All rights reserved.</p>
    </footer>
</body>

</html>