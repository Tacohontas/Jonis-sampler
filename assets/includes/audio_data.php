<div data-key="<?php $sounds->convertToKeyCode($preset['Keyname']) ?>" class="key">
      <kbd><?= $preset['Keyname'] ?></kbd>
      <span class="sound"><?= $preset['Name'] ?></span>
<audio data-key="<?php $sounds->convertToKeyCode($preset['Keyname']) ?>" src="<?= $preset['FileURL'] ?>"></audio>
</div>