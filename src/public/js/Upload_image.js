

 function Upload_image() {

    document.getElementById('upload1').addEventListener('change', handleFileUpload);

    const dropArea = document.getElementById('dropArea');
    const dragg = document.querySelectorAll('.drag');

    dropArea.addEventListener('dragover', handleDragOver);
    dropArea.addEventListener('dragleave', handleDragLeave);
    dropArea.addEventListener('drop', handleDrop);

    function handleFileUpload(event) {
        const files = event.target.files;
        handleFiles(files);
    }

    function handleDragOver(event) {
        event.preventDefault();
        dropArea.classList.add('bg-gray-100');
    }

    function handleDragLeave(event) {
        event.preventDefault();
        dropArea.classList.remove('bg-gray-100');
    }

    function handleDrop(event) {
        event.preventDefault();
        dropArea.classList.remove('bg-gray-100');

        const files = event.dataTransfer.files;
        handleFiles(files);
    }

    function handleFiles(files) {
        if (files.length > 0) {
            const file = files[0];
            const progressBarContainer = document.getElementById('progressBar');
            const previewImage = document.getElementById('previewImage');

            progressBarContainer.classList.remove('hidden');

            const fileSize = file.size;
            const chunkSize = 1024 * 1024; // 1MB
            let offset = 0;

            const progressBar = new ProgressBar.Line(progressBarContainer, {
                strokeWidth: 3,
                easing: 'easeInOut',
                duration: 1400,
                color: '#FF7918',
                trailColor: '#eee',
                trailWidth: 1,
                svgStyle: { width: '100%', height: '100%', borderRadius: '5px' },

                step: (state, bar) => {

                    if (bar.value() === 1) {
                     
                        progressBar.destroy(); 
                        displayImage(file);
                    }
                }
            });

            function readChunk() {
                const reader = new FileReader();
                const chunk = file.slice(offset, offset + chunkSize);

                reader.onloadend = function () {
                    if (reader.result) {
                     
                        setTimeout(() => {
                            offset += chunkSize;

                            const percentCompleted = Math.min((offset / fileSize), 1);
                            progressBar.animate(percentCompleted); 

                            if (offset < fileSize) {
                                // Read the next chunk
                                readChunk();
                            }
                        }, 500); // Simulated delay
                    }
                };

                reader.readAsArrayBuffer(chunk);
            }

            readChunk();
        }
    }

    function displayImage(file) {
        const previewImage = document.getElementById('previewImage');

        const reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;
           
        };

        dragg[1].classList.add('hidden')
        dragg[2].classList.add('hidden')
        dragg[0].classList.remove('border-[5px]')

        reader.readAsDataURL(file);
        
    }
}

export default Upload_image

