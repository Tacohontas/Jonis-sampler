<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jonis sampler</title>
  <link rel="stylesheet" href="assets/style/style.css">
  <script src="assets/app.js" defer></script>

<body>


  <div class="keys">
    <div data-key="65" class="key">
      <kbd>A</kbd>
      <span class="sound">clap</span>
    </div>
    <div data-key="83" class="key">
      <kbd>S</kbd>
      <span class="sound">hihat</span>
    </div>
    <div data-key="68" class="key">
      <kbd>D</kbd>
      <span class="sound">kick</span>
    </div>
    <div data-key="70" class="key">
      <kbd>F</kbd>
      <span class="sound">openhat</span>
    </div>
    <div data-key="71" class="key">
      <kbd>G</kbd>
      <span class="sound">boom</span>
    </div>
    <div data-key="72" class="key">
      <kbd>H</kbd>
      <span class="sound">ride</span>
    </div>
    <div data-key="74" class="key">
      <kbd>J</kbd>
      <span class="sound">snare</span>
    </div>
    <div data-key="75" class="key">
      <kbd>K</kbd>
      <span class="sound">tom</span>
    </div>
    <div data-key="76" class="key">
      <kbd>L</kbd>
      <span class="sound">tink</span>
    </div>
  </div>


<!-- Hämta ljud här med en include -->
  <audio data-key="65" src="assets/sounds/clap.wav"></audio>
  <audio data-key="83" src="assets/sounds/hihat.wav"></audio>
  <audio data-key="68" src="assets/sounds/kick.wav"></audio>
  <audio data-key="70" src="assets/sounds/openhat.wav"></audio>
  <audio data-key="71" src="assets/sounds/boom.wav"></audio>
  <audio data-key="72" src="assets/sounds/ride.wav"></audio>
  <audio data-key="74" src="assets/sounds/snare.wav"></audio>
  <audio data-key="75" src="assets/sounds/tom.wav"></audio>
  <audio data-key="76" src="assets/sounds/tink.wav"></audio>


</body>

</html>