<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <!-- --------------- -->

    <section class="container" id="demo-content">
      <h1 class="title">Scan 1D/2D Code from Video Camera</h1>

      <div>
        <a class="button" id="startButton">Start</a>
        <a class="button" id="resetButton">Reset</a>
      </div>

      <div>
        <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
      </div>

      <div id="sourceSelectPanel" style="display:none">
        <label for="sourceSelect">Change video source:</label>
        <select id="sourceSelect" style="max-width:400px">
        </select>
      </div>

      <label>Result:</label>
      <pre><code id="result"></code></pre>
      <form id="barcodeForm" action="action.php" method="post">
        <input type="text" name="barcode" id="barcodeInput" value="">
      </form>

      <!-- Sound effect -->
      <audio id="successSound">
        <source src="success.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>

    </section>

  

    <!-- --------------- -->
</div>