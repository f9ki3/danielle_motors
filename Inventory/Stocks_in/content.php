<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
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
    <form id="product_stockin_form" action="" method="POST">
        <input type="text" id="product_id">
        <input type="text" id="product_name" readonly>
        <input type="text" id="product_model">

    </form>
</div>