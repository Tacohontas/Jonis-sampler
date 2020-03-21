// -- Play sound from pads -- //

function playSound(e) {
  // console.log("playSound() running!");

  const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
  const key = document.querySelector(`.key[data-key="${e.keyCode}"]`);
  if (!audio) return; // stop the function from running.
  audio.currentTime = 0; // Här rewindar vi filen till start ifall ljudfilen körs.
  audio.play(); // Kommer inte spelas igen ifall vi ljudfilen redan körs.
  key.classList.add("playing");
}

function removeTransition(e) {
  console.log("RemoveTransition(e) running!");
  if (e.propertyName !== "transform") return; // skip it if its not a transform
  this.classList.remove("playing");
}

const keys = document.querySelectorAll(".key");
keys.forEach(key => key.addEventListener("transitionend", removeTransition));

window.addEventListener("keydown", playSound);
// -- Create mode (create.php) -- //

// Add a drum_pad to the area.
function createPad() {
    const padContainer = document.querySelector(".create_area");
  
    // Maximum pads allowed = 16.
    if (padContainer.childElementCount < 16) {
      /* create <div class="key"> 
      Then add static HTML to it.  
      */
      const div_key = document.createElement("div");
      div_key.className = "key create_key";
      div_key.id = `key_${padContainer.childElementCount}`;
      // div_key.setAttribute("data-key","#");
      div_key.innerHTML = `
  <p>Pad ${padContainer.childElementCount}</p>
  <p>Choose sound</p>
  
      <select name="sound_${padContainer.childElementCount}" id="${padContainer.childElementCount}" onchange="getSoundFromPHP(this.value, this.id)">
          <option value="boom">boom</option>
          <option value="clap">clap</option>
          <option value="hihat">hihat</option>
          <option value="kick">kick</option>
          <option value="openhat">openhat</option>
          <option value="ride">ride</option>
          <option value="snare">snare</option>
          <option value="tink">tink</option>
          <option value="tom">tom</option>
          <input type="submit" name="submit" value="Load sample">
      </select>
      <p>Upload</p>
      <input type="file" name="file_to_upload_${padContainer.childElementCount}" id="${padContainer.childElementCount}" onchange="preview_sound(event, this.id)">
      <audio src="#" id="audio_${padContainer.childElementCount}"></audio>
  
      <p>Choose keybind</p>
      </div>
      `;
  
      // input type="file" har ett ID så vi skall kunna hämta det sen i JS.
  
      // Append child-elements that has input that we need to save if we add another drum pad.
      const input_text = document.createElement("INPUT");
      input_text.setAttribute("type", "text");
      input_text.setAttribute(
        "name",
        `keybind_${padContainer.childElementCount}`
      );
      input_text.setAttribute(
        "onchange",
        "preview_setKeybind(this.value, this.id)"
      );
      input_text.setAttribute("id", `${padContainer.childElementCount}`);
      input_text.setAttribute("maxlength", 1);
  
      div_key.appendChild(input_text);
  
      // Append all to padcontainer
      padContainer.appendChild(div_key);
      // ADD transitionend eventlistener since JS doesnt find this in the beginning of script.
      div_key.addEventListener("transitionend", removeTransition);
    } else {
      alert("Du kan max ha 16 pads!");
    }
  }
  
  const submitBtn = document.querySelector(".create_btn");
  submitBtn.addEventListener("click", createPad);
  
  // Preview and try sound before uploading.
  function preview_sound(event, id) {
    let reader = new FileReader();
    reader.onload = () => {
      const audioPreviewOutput = document.querySelector(`#audio_${id}`);
      audioPreviewOutput.src = reader.result;
  
      // FIX : Se filnamnet på ljudfilen.
      // let imageName = document.querySelector(".upload_preview__text");
      // getFileName = () => {
      //   let input = document.querySelector("#file");
      //   return input.value.split("\\").pop();
      // };
      // imageName.innerHTML = getFileName();
    };
  
    reader.readAsDataURL(event.target.files[0]);
  }
  
  // Set keybind in preview
  function preview_setKeybind(value, id) {
    const div_key = document.querySelector(`#key_${id}`);
    const audioPreviewOutput = document.querySelector(`#audio_${id}`);
  
    // set data-key on <div> and <audio> to the chosen keybind.
    value = value.toUpperCase();
    audioPreviewOutput.setAttribute("data-key", value.charCodeAt(0));
    div_key.setAttribute("data-key", value.charCodeAt(0));
  }
  
 