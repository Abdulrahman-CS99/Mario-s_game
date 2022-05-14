// Daniel Shiffman
// https://thecodingtrain.com/CodingChallenges/147-chrome-dinosaur.html
// https://youtu.be/l0HoJHc-63Q

// Google Chrome Dinosaur Game (Unicorn, run!)
// https://editor.p5js.org/codingtrain/sketches/v3thq2uhk

class Enemie {
  constructor() {
    this.r = 100; // size of coming enemie
    this.x = width;
    this.y = height - this.r;
  }

  move() {
    this.x -= 16; // speed of coming enemie
  }

  show() {
    image(enemie, this.x, this.y, this.r, this.r);

    // fill(255, 50);
    // ellipseMode(CORNER);
    // ellipse(this.x, this.y, this.r, this.r);
  }
}