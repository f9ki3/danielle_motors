window.addEventListener('DOMContentLoaded', () => {
    const image = document.getElementById('image');
    const input = document.getElementById('inputImage');
    const cropButton = document.getElementById('cropButton');
    let cropper;

    input.addEventListener('change', (e) => {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = () => {
            if (cropper) {
                cropper.destroy();
            }
            image.src = reader.result;
            cropper = new Cropper(image, {
                aspectRatio: 1, // Set aspect ratio if needed
                viewMode: 2, // Set the view mode (0, 1, 2, 3)
                dragMode: 'move', // Set drag mode (move, crop, none)
                crop(event) {
                    // You can access crop box data here
                    // console.log(event.detail.x);
                    // console.log(event.detail.y);
                    // console.log(event.detail.width);
                    // console.log(event.detail.height);
                },
            });
        };

        reader.readAsDataURL(file);
    });

    cropButton.addEventListener('click', () => {
        // Get the cropped canvas
        const canvas = cropper.getCroppedCanvas({
            width: 300, // Set width of the cropped image
            height: 300, // Set height of the cropped image
        });

        // Convert canvas to data URL
        const croppedImageDataURL = canvas.toDataURL('image/jpeg', 0.8);

        // Send cropped image data to PHP script via AJAX
        saveImage(croppedImageDataURL);
    });

    function saveImage(dataURL) {
        // Send cropped image data to PHP script via AJAX
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Show success toast
                    showToast('Image saved successfully', 'success');
                } else {
                    // Show error toast
                    showToast('Failed to save image', 'danger');
                }
            }
        };
        xhr.open('POST', 'upload.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('imageData=' + encodeURIComponent(dataURL));
    }

    function showToast(message, type) {
        const liveToast = document.getElementById('liveToast');
        const toastHeader = liveToast.querySelector('.toast-header');
        const toastBody = liveToast.querySelector('.toast-body');
        const toastTime = liveToast.querySelector('.text-800');
        const closeButton = liveToast.querySelector('[data-bs-dismiss="toast"]');
    
        // Update toast content and styling
        toastBody.textContent = message;
        liveToast.classList.remove('bg-success', 'bg-danger');
        liveToast.classList.add('bg-' + type);
        toastHeader.classList.remove('bg-success', 'bg-danger');
        toastHeader.classList.add('bg-' + type);
        
        // Update timestamp
        const timestamp = new Date();
        const hours = timestamp.getHours();
        const minutes = timestamp.getMinutes();
        const timeString = (hours < 10 ? '0' + hours : hours) + ':' + (minutes < 10 ? '0' + minutes : minutes);
        toastTime.textContent = timeString;
    
        // Close the modal
        const modal = document.getElementById('cropImage');
        const bsModal = bootstrap.Modal.getInstance(modal);
        bsModal.hide();
    
        // Create a new bootstrap Toast instance and show it
        const bsToast = new bootstrap.Toast(liveToast);
        bsToast.show();
    
        // Close the toast after 5 seconds
        setTimeout(function () {
            bsToast.hide();
        }, 5000);
    
        // Redirect to hot.php 1 second after the toast has been shown
        setTimeout(function () {
            window.location.href = 'refresh_session.php';
        }, 1000);
    }
    
    

    
});
