async function handleImageUpload(image, maxSize = 2, maxWidth = 1024) {
    try {
        const options = {
            maxSizeMB: maxSize,
            maxWidthOrHeight: maxWidth,
            useWebWorker: true
        }

        const compressedFile = await imageCompression(image, options);
        return compressedFile;
    } catch (error) {
        console.error('Error compressing image:', error);
    }
}