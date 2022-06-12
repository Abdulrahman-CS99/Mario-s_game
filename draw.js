
let mario;
let player;
let enemie; // enemie
let backgroundImg; // background
let Enemies = []; // Enemies
var score = 0; // score
var highest = 0;

function preload() {
  const options = {
    probabilityThreshold: 0.95
  };
  player = loadImage('mario.png');
  enemie = loadImage('enemie.png');
  backgroundImg = loadImage('M-bg.webp');
}

function mousePressed() {
  
  Enemies.push(new Enemie());
}

function setup() {

  createCanvas(1280, 609); // height and width
  mario = new Mario();
}

function gotCommand(error, results) {

  if (error) {
    console.error(error);
  }
  console.log(results[0].label, results[0].confidence);
  if (results[0].label == 'up') {
    mario.jump();
  }
}

function keyPressed() {

  if (key == ' ') {
    mario.jump();
  }
}

function draw() {

  if (random(1) < 0.005) {
    Enemies.push(new Enemie());
  }

  background(backgroundImg);
  for (let b of Enemies) {
    b.move();
    b.show();
    score++;
    if (mario.hits(b)) {
      console.log('game over'); 
      noLoop();
      document.getElementById( "key" ).value= (score);
    }
  }

  mario.show();
  mario.move();
}

