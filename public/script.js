const ALPINE_DATA = (function () {
    document.addEventListener('alpine:init', init);

    function init() {
        Alpine.data('imageUpload', IMAGE_UPLOADER);
    }

    const IMAGE_UPLOADER = function () {
        return {
            imageUrl: '',
            imageName: '',
            imageSize: '',
            imageError: '',

            previewImage(event) {
                let image = event.target.files[0];

                if (!this.validateImage(image)) return;

                this.imageUrl = URL.createObjectURL(image);
                this.imageName = image.name;
                this.imageSize = (image.size / (1024 * 1024)).toFixed(2) + ' MB';
            },

            validateImage(image) {
                const validExtension = ['image/jpeg', 'image/jpg', 'image/png'];
                const maxSize = 5 * 1024 * 1024;

                if (!image) {
                    this.imageError = 'The image field is required.';
                    return false;
                }

                if (!validExtension.includes(image.type)) {
                    this.removeImage();
                    this.imageError = 'The image must be a file of type: jpeg, jpg, png.';
                    return false;
                }

                if (image.size > maxSize) {
                    this.removeImage();
                    this.imageError = `The image may not be greater than ${maxSize / 1024} kilobytes.`;
                    return false;
                }

                this.imageError = '';
                return true;
            },

            removeImage() {
                this.imageUrl = '';
                this.imageName = '';
                this.imageSize = '';
                this.$refs.imageInput.value = '';
                this.imageError = 'The image field is required.';
            },
        };
    };

    return {}
})();
